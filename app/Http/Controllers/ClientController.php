<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // GET /clients
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('clients.index', compact('clients'));
    }

    // GET /clients/create
    public function create()
    {
        return view('clients.create');
    }

    // POST /clients
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:clients,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ]);

        Client::create($validated);
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    // GET /clients/{client}
    public function show(Client $client)
    {
        $client->load([
            'cases' => fn($q) => $q->latest(),
        ]);

        return view('clients.show', compact('client'));
    }

    // GET /clients/{client}/edit
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // PUT /clients/{client}
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ]);

        $client->update($validated);
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    // DELETE /clients/{client}
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted.');
    }
}
