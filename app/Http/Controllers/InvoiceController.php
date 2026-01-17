<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\LegalCase;
use App\Models\TimeEntry;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function create(LegalCase $legalCase)
    {
        return view('invoices.create', compact('legalCase'));
    }

    public function store(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'issue_date' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:issue_date',
        ]);

        $invoice = Invoice::create([
            'legal_case_id' => $legalCase->id,
            'invoice_number' => 'INV-' . now()->format('Ymd') . '-' . rand(1000, 9999),
            'issue_date' => $request->issue_date,
            'due_date' => $request->due_date,
            'status' => 'draft',
            'total_amount' => 0,
        ]);

        return redirect()->route('invoices.show', $invoice->id)->with('success', 'تم إنشاء الفاتورة بنجاح');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['legalCase.client', 'items']);

        return view('invoices.show', compact('invoice'));
    }
}
