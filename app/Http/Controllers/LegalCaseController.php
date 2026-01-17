<?php

// app/Http/Controllers/LegalCaseController.php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\Client;
use App\Models\CourtSpecification;
use App\Models\LegalCaseTransfer;
use Illuminate\Http\Request;

class LegalCaseController extends Controller
{
    public function index(Request $request)
    {
        $courtSpecifications = CourtSpecification::where('active', true)->get();

        $cases = LegalCase::with(['client', 'courtSpecification'])
            ->when($request->court_specification_id, function ($query) use ($request) {
                $query->where('court_specification_id', $request->court_specification_id);
            })
            ->latest()
            ->get();
        return view('legal-cases.index', compact('cases', 'courtSpecifications'));
    }

    public function create()
    {
        $clients = Client::all();
        $courtSpecifications = CourtSpecification::where('active', true)->get();
        return view('legal-cases.create', compact('clients', 'courtSpecifications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'case_number' => 'required|string|max:100|unique:legal_cases,case_number',
            'status' => 'required|in:open,closed,suspended',
            'court_specification_id' => 'required|exists:court_specifications,id',
        ]);

        $legalCase = LegalCase::create([
            'client_id' => $request->client_id,
            'title' => $request->title,
            'case_number' => $request->case_number,
            'status' => $request->status,
            'court_specification_id' => $request->court_specification_id,
        ]);

        return redirect()->route('legal-cases.show', $legalCase->id)->with('success', 'تم إنشاء القضية بنجاح');
    }

    public function show(LegalCase $legalCase)
    {
        $legalCase->load(['invoices.items', 'client', 'courtSpecification', 'documents', 'notes', 'timeEntries', 'users', 'transfers' => fn($query) => $query->with(['fromCourt', 'toCourt', 'user'])->latest()]);

        $courts = CourtSpecification::all();

        $stats = [
            'documents' => $legalCase->documents->count(),
            'notes' => $legalCase->notes->count(),
            'team' => $legalCase->users->count(),
            'total_time' => $legalCase->timeEntries->sum('duration_minutes'),
        ];

        return view('legal-cases.show', compact('legalCase', 'stats', 'courts'));
    }

    public function edit(LegalCase $legalCase)
    {
        $clients = Client::all();
        $courtSpecifications = CourtSpecification::where('active', true)->get();
        return view('legal-cases.edit', compact('legalCase', 'clients', 'courtSpecifications'));
    }

    public function update(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'case_number' => 'required|string|max:100|unique:legal_cases,case_number,' . $legalCase->id,
            'status' => 'required|in:open,closed,suspended',
            'court_specification_id' => 'required|exists:court_specifications,id',
        ]);

        $legalCase->update([
            'client_id' => $request->client_id,
            'title' => $request->title,
            'case_number' => $request->case_number,
            'status' => $request->status,
            'court_specification_id' => $request->court_specification_id,
        ]);

        return redirect()->route('legal-cases.show', $legalCase->id)->with('success', 'تم تحديث بيانات القضية بنجاح');
    }

    public function destroy(LegalCase $legalCase)
    {
        $legalCase->delete();
        return redirect()->route('legal-cases.index')->with('success', 'Case deleted.');
    }

    public function transfer(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'to_court_id' => 'required|exists:court_specifications,id|different:court_specification_id',
            'reason' => 'nullable|string|max:500',
        ]);

        $fromCourtId = $legalCase->court_specification_id;

        $legalCase->update([
            'court_specification_id' => $request->to_court_id,
        ]);

        // Log the transfer
        LegalCaseTransfer::create([
            'legal_case_id' => $legalCase->id,
            'from_court_id' => $fromCourtId,
            'to_court_id' => $request->to_court_id,
            'user_id' => auth()->id(),
            'reason' => $request->reason,
        ]);

        return redirect()->route('legal-cases.show', $legalCase->id)->with('success', 'تم نقل القضية بنجاح إلى المحكمة الجديدة');
    }
}
