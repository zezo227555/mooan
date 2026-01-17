<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\LegalCase;
use App\Models\Setting;
use App\Models\TimeEntry;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function main()
    {
        $user = auth()->user();

        return match ($user->role) {
            User::ROLE_ADMIN => $this->adminDashboard(),
            User::ROLE_ATTORNEY => $this->attorneyDashboard(),
            User::ROLE_RECEPTION => $this->receptionDashboard(),
        };
    }

    protected function adminDashboard()
    {
        $user = auth()->user();

        if ($user->role !== User::ROLE_ADMIN) {
            abort(403);
        }

        return view('dashboard.admin', [
            // 🔢 KPI NUMBERS
            'stats' => [
                'users' => User::count(),
                'clients' => Client::count(),
                'cases' => LegalCase::count(),
                'invoices' => Invoice::count(),
            ],

            // 📊 CHART DATA
            'charts' => [
                // 1️⃣ Cases by Status
                'cases_by_status' => LegalCase::selectRaw('status, COUNT(*) as total')->groupBy('status')->pluck('total', 'status'),

                // 2️⃣ New Cases (Last 30 Days)
                'cases_last_30_days' => LegalCase::where('created_at', '>=', now()->subDays(30))
                    ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('total', 'day'),

                // 3️⃣ Time Logged (Last 7 Days)
                'time_last_7_days' => TimeEntry::where('work_date', '>=', now()->subDays(7))
                    ->selectRaw('work_date, SUM(duration_minutes) as total')
                    ->groupBy('work_date')
                    ->orderBy('work_date')
                    ->pluck('total', 'work_date'),

                // 4️⃣ Invoices by Status
                'invoices_by_status' => Invoice::selectRaw('status, COUNT(*) as total')->groupBy('status')->pluck('total', 'status'),
            ],
        ]);
    }

    protected function attorneyDashboard()
    {
        $user = auth()->user();

        return view('dashboard.attorney', [
            // 🔢 KPIs
            'stats' => [
                'assigned_cases' => $user->legalCases()->count(),
                'open_cases' => $user->legalCases()->where('status', 'open')->count(),
                'total_time' => TimeEntry::where('user_id', $user->id)->sum('duration_minutes'),
                'invoices' => Invoice::whereHas('legalCase', function ($q) use ($user) {
                    $q->whereHas('users', fn($u) => $u->where('users.id', $user->id));
                })->count(),
            ],

            // 📊 Charts
            'charts' => [
                // Time logged – last 7 days
                'time_last_7_days' => TimeEntry::where('user_id', $user->id)
                    ->where('work_date', '>=', now()->subDays(7))
                    ->selectRaw('work_date, SUM(duration_minutes) as total')
                    ->groupBy('work_date')
                    ->orderBy('work_date')
                    ->pluck('total', 'work_date'),

                // Assigned cases by status
                'cases_by_status' => $user->legalCases()->selectRaw('status, COUNT(*) as total')->groupBy('status')->pluck('total', 'status'),
            ],
        ]);
    }

    protected function receptionDashboard()
    {
        return view('dashboard.reception', [
            // 🔢 KPIs
            'stats' => [
                'clients' => Client::count(),
                'total_cases' => LegalCase::count(),
                'open_cases' => LegalCase::where('status', 'open')->count(),
                'cases_today' => LegalCase::whereDate('created_at', today())->count(),
            ],

            // 📊 Charts
            'charts' => [
                // New clients – last 30 days
                'clients_last_30_days' => Client::where('created_at', '>=', now()->subDays(30))
                    ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('total', 'day'),

                // New cases – last 30 days
                'cases_last_30_days' => LegalCase::where('created_at', '>=', now()->subDays(30))
                    ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('total', 'day'),
            ],
        ]);
    }
}
