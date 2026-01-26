<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientCaseController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();

        $cases = $client->Cases()
            ->with('courtSpecification')
            ->latest()
            ->get();

        return view('client.cases.index', compact('cases'));
    }
}
