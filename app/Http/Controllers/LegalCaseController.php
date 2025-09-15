<?php

// app/Http/Controllers/LegalCaseController.php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\Client;
use Illuminate\Http\Request;

class LegalCaseController extends Controller
{
    public function index()
    {
        $cases = LegalCase::with('client')->latest()->paginate(10);
        return view('legal-cases.index', compact('cases'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('legal-cases.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'case_number' => 'required|string|unique:legal_cases,case_number',
            'description' => 'nullable|string',
            'status' => 'required|in:open,closed,pending,archived',
            'filing_date' => 'nullable|date',
            'closing_date' => 'nullable|date|after_or_equal:filing_date',
        ]);

        LegalCase::create($validated);
        return redirect()->route('legal-cases.index')->with('success', 'Case created successfully.');
    }

    public function show(LegalCase $legalCase)
    {
        return view('legal-cases.show', compact('legalCase'));
    }

    public function edit(LegalCase $legalCase)
    {
        $clients = Client::all();
        return view('legal-cases.edit', compact('legalCase', 'clients'));
    }

    public function update(Request $request, LegalCase $legalCase)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'case_number' => 'required|string|unique:legal_cases,case_number,' . $legalCase->id,
            'description' => 'nullable|string',
            'status' => 'required|in:open,closed,pending,archived',
            'filing_date' => 'nullable|date',
            'closing_date' => 'nullable|date|after_or_equal:filing_date',
        ]);

        $legalCase->update($validated);
        return redirect()->route('legal-cases.index')->with('success', 'Case updated successfully.');
    }

    public function destroy(LegalCase $legalCase)
    {
        $legalCase->delete();
        return redirect()->route('legal-cases.index')->with('success', 'Case deleted.');
    }
}
