<?php

// app/Http/Controllers/CaseNoteController.php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\CaseNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseNoteController extends Controller
{
    public function index(LegalCase $legalCase)
    {
        $notes = $legalCase->notes()->latest()->get();
        return view('case-notes.index', compact('legalCase', 'notes'));
    }

    public function create(LegalCase $legalCase)
    {
        return view('case-notes.create', compact('legalCase'));
    }

    public function store(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'body' => 'required|string',
        ]);

        $legalCase->notes()->create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('case-notes.index', $legalCase->id)->with('success', 'Note added.');
    }

    public function show(LegalCase $legalCase, CaseNote $caseNote)
    {
        return view('case-notes.show', compact('legalCase', 'caseNote'));
    }

    public function edit(LegalCase $legalCase, CaseNote $caseNote)
    {
        return view('case-notes.edit', compact('legalCase', 'caseNote'));
    }

    public function update(Request $request, LegalCase $legalCase, CaseNote $caseNote)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'body' => 'required|string',
        ]);

        $caseNote->update($request->only('title', 'body'));

        return redirect()->route('case-notes.index', $legalCase->id)->with('success', 'Note updated.');
    }

    public function destroy(LegalCase $legalCase, CaseNote $caseNote)
    {
        $caseNote->delete();
        return redirect()->route('case-notes.index', $legalCase->id)->with('success', 'Note deleted.');
    }
}
