<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class ClientInvoiceController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();

        $invoices = Invoice::whereHas('legalCase', function ($q) use ($client) {
            $q->where('client_id', $client->id);
        })
            ->with('legalCase')
            ->latest()
            ->get();

        return view('client.invoices.index', compact('invoices'));
    }
}
