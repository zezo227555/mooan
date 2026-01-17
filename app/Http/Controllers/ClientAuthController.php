<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('client-auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('client.dashboard');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة',
        ]);
    }

    public function logout(Request $request)
    {
        auth('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.login');
    }
}
