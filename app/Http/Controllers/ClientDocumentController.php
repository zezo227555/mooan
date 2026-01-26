<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class ClientDocumentController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();

        $documents = Document::whereHas('Case', function ($q) use ($client) {
            $q->where('client_id', $client->id);
        })
            ->with('Case')
            ->latest()
            ->get();

        return view('client.documents.index', compact('documents'));
    }
}
