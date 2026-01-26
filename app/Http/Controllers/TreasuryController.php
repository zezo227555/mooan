<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class TreasuryController extends Controller
{
    public function index()
    {
        $paidInvoices = Invoice::with('legalCase.client')->where('status', 'paid')->latest()->get();

        $unpaidInvoices = Invoice::with('legalCase.client')
            ->whereIn('status', ['issued'])
            ->latest()
            ->get();

        return view('treasury.index', [
            'paidInvoices' => $paidInvoices,
            'unpaidInvoices' => $unpaidInvoices,

            // Totals
            'totalPaid' => $paidInvoices->sum('total_amount'),
            'totalUnpaid' => $unpaidInvoices->sum('total_amount'),
        ]);
    }
}
