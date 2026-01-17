<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();

        return view('client.dashboard', [
            'cases' => $client->legalCases()->latest()->get(),
        ]);
    }
}
