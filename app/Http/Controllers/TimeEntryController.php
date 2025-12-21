<?php
namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\TimeEntry;
use Illuminate\Http\Request;

class TimeEntryController extends Controller
{
    public function index(LegalCase $legalCase)
    {
        $entries = $legalCase->timeEntries()->with('user')->latest('work_date')->get();

        return view('time-entries.index', compact('legalCase', 'entries'));
    }

    public function create(LegalCase $legalCase)
    {
        return view('time-entries.create', compact('legalCase'));
    }

    public function store(Request $request, LegalCase $legalCase)
    {
        $validated = $request->validate([
            'work_date' => 'required|date',
            'duration_minutes' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $legalCase->timeEntries()->create([
            'user_id' => auth()->id(),
            ...$validated,
        ]);

        return redirect()->route('time-entries.index', $legalCase->id)->with('success', 'Time entry recorded.');
    }

    public function edit(LegalCase $legalCase, TimeEntry $timeEntry)
    {
        return view('time-entries.edit', compact('legalCase', 'timeEntry'));
    }

    public function update(Request $request, LegalCase $legalCase, TimeEntry $timeEntry)
    {
        $validated = $request->validate([
            'work_date' => 'required|date',
            'duration_minutes' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $timeEntry->update($validated);

        return redirect()->route('time-entries.index', $legalCase->id)->with('success', 'Time entry updated.');
    }

    public function destroy(LegalCase $legalCase, TimeEntry $timeEntry)
    {
        $timeEntry->delete();

        return redirect()->route('time-entries.index', $legalCase->id)->with('success', 'Time entry deleted.');
    }
}
