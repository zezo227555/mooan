<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function create(Invoice $invoice)
    {
        // 🔒 Safety check: only draft invoices can be edited
        if ($invoice->status !== 'draft') {
            return redirect()->route('invoices.show', $invoice->id)->with('error', 'لا يمكن إضافة بنود إلى فاتورة غير مسودة');
        }

        // Load related case for context (optional but useful)
        $invoice->load('legalCase');

        return view('invoice-items.create', compact('invoice'));
    }

    public function store(Request $request, Invoice $invoice)
    {
        // 🔒 Safety: only draft invoices are editable
        if ($invoice->status !== 'draft') {
            return redirect()->route('invoices.show', $invoice->id)->with('error', 'لا يمكن إضافة بنود إلى فاتورة غير مسودة');
        }

        // ✅ Validation
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0.01',
            'unit_price' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($validated, $invoice) {
            // 🧮 Calculate item total (server-side only)
            $itemTotal = $validated['quantity'] * $validated['unit_price'];

            // ➕ Create invoice item
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $validated['description'],
                'quantity' => $validated['quantity'],
                'unit_price' => $validated['unit_price'],
                'total_amount' => $itemTotal,
            ]);

            // 🔄 Recalculate invoice total (authoritative)
            $invoice->update([
                'total_amount' => $invoice->items()->sum('total_amount'),
            ]);
        });

        return redirect()->route('invoices.show', $invoice->id)->with('success', 'تم إضافة البند وتحديث إجمالي الفاتورة بنجاح');
    }

    public function edit(InvoiceItem $invoiceItem)
    {
        return view('invoice-items.edit', compact('invoiceItem'));
    }

    public function update(Request $request, InvoiceItem $invoiceItem)
    {
        $request->validate([
            'description' => 'required|string',
            'quantity' => 'required|numeric|min:0',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $invoiceItem->update([
            'description' => $request->description,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_price' => $request->quantity * $request->unit_price,
        ]);

        // Update parent invoice total
        $invoiceItem->invoice->update([
            'total_amount' => $invoiceItem->invoice->items->sum('total_price'),
        ]);

        return redirect()->route('invoices.show', $invoiceItem->invoice_id)->with('success', 'تم تحديث بند الفاتورة بنجاح.');
    }

    public function destroy(InvoiceItem $invoiceItem)
    {
        $invoice = $invoiceItem->invoice;
        $invoiceItem->delete();

        // Recalculate total
        $invoice->update(['total_amount' => $invoice->items->sum('total_price') ?? 0]);

        return redirect()->route('invoices.show', $invoice->id)->with('success', 'تم حذف بند الفاتورة بنجاح.');
    }
}
