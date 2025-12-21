<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\LegalCase;
use App\Models\TimeEntry;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of invoices.
     */
    public function index()
    {
        $invoices = Invoice::with('case', 'client')->latest()->get();

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     */
    public function create(LegalCase $legalCase)
    {
        // Fetch all billable time entries not yet invoiced
        $billableEntries = $legalCase->timeEntries()
            ->where('billable', true)
            ->whereDoesntHave('invoiceItem')
            ->get();

        return view('invoices.create', compact('legalCase', 'billableEntries'));
    }

    /**
     * Store a newly created invoice in storage.
     */
    public function store(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'issue_date' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:issue_date',
            'notes' => 'nullable|string',
        ]);

        $invoice = Invoice::create([
            'legal_case_id' => $legalCase->id,
            'client_id' => $request->client_id,
            'issue_date' => $request->issue_date,
            'due_date' => $request->due_date,
            'status' => 'draft',
            'notes' => $request->notes,
        ]);

        // Optional: attach selected time entries as invoice items
        if ($request->filled('time_entries')) {
            foreach ($request->time_entries as $entryId) {
                $entry = TimeEntry::findOrFail($entryId);

                $invoice->items()->create([
                    'description' => "Time entry by {$entry->user->name} on {$entry->work_date->format('Y-m-d')}",
                    'quantity' => $entry->duration_hours,
                    'unit_price' => $entry->hourly_rate ?? 0,
                    'total_price' => ($entry->duration_hours) * ($entry->hourly_rate ?? 0),
                    'time_entry_id' => $entry->id,
                ]);
            }
        }

        // Recalculate total
        $invoice->total_amount = $invoice->items->sum('total_price');
        $invoice->save();

        return redirect()->route('invoices.show', $invoice->id)
            ->with('success', 'تم إنشاء الفاتورة بنجاح.');
    }

    /**
     * Display the specified invoice.
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('items', 'client', 'case');

        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified invoice.
     */
    public function edit(Invoice $invoice)
    {
        $invoice->load('items', 'client', 'case');

        return view('invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified invoice in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'issue_date' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:issue_date',
            'status' => 'required|in:draft,sent,paid,overdue',
            'notes' => 'nullable|string',
        ]);

        $invoice->update($request->only('issue_date', 'due_date', 'status', 'notes'));

        // Recalculate total
        $invoice->total_amount = $invoice->items->sum('total_price');
        $invoice->save();

        return redirect()->route('invoices.show', $invoice->id)
            ->with('success', 'تم تحديث الفاتورة بنجاح.');
    }

    /**
     * Remove the specified invoice from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'تم حذف الفاتورة بنجاح.');
    }
}
