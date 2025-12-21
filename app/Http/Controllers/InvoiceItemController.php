<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
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
        $invoice->update(['total_amount' => $invoice->items->sum('total_price')]);

        return redirect()->route('invoices.show', $invoice->id)->with('success', 'تم حذف بند الفاتورة بنجاح.');
    }
}
