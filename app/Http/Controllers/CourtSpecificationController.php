<?php

namespace App\Http\Controllers;

use App\Models\CourtSpecification;
use Illuminate\Http\Request;

class CourtSpecificationController extends Controller
{
    public function index()
    {
        $courts = CourtSpecification::withCount('legalCases')->latest()->get();
        return view('court-specifications.index', compact('courts'));
    }

    public function create()
    {
        return view('court-specifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:court_specifications,code',
            'description' => 'nullable|string',
        ]);

        CourtSpecification::create($request->all());

        return redirect()->route('court-specifications.index')->with('success', 'تم إضافة المحكمة بنجاح');
    }

    public function edit(CourtSpecification $courtSpecification)
    {
        return view('court-specifications.edit', compact('courtSpecification'));
    }

    public function update(Request $request, CourtSpecification $courtSpecification)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:court_specifications,code,' . $courtSpecification->id,
            'description' => 'nullable|string',
            'active' => 'boolean',
        ]);

        $courtSpecification->update($request->all());

        return redirect()->route('court-specifications.index')->with('success', 'تم تحديث المحكمة بنجاح');
    }

    public function show(CourtSpecification $courtSpecification)
    {
        $courtSpecification->loadCount(['legalCases as total_cases', 'legalCases as open_cases' => fn($query) => $query->where('status', 'open'), 'legalCases as closed_cases' => fn($query) => $query->where('status', 'closed'), 'legalCases as suspended_cases' => fn($query) => $query->where('status', 'suspended')]);

        return view('court-specifications.show', compact('courtSpecification'));
    }

    public function destroy(CourtSpecification $courtSpecification)
    {
        // Hard delete is a bad idea here — disable instead
        $courtSpecification->update(['active' => false]);

        return redirect()->route('court-specifications.index')->with('success', 'تم تعطيل المحكمة');
    }
}
