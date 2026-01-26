<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();

        $cases = $client->cases()
            ->with('courtSpecification')
            ->latest()
            ->get();

        return view('dashboard.client', [
            // 🔢 KPIs
            'stats' => [
                'total_cases'  => $cases->count(),
                'open_cases'   => $cases->where('status', 'open')->count(),
                'closed_cases' => $cases->where('status', 'closed')->count(),
            ],

            // 📂 Case list
            'cases' => $cases,
        ]);
    }
}
