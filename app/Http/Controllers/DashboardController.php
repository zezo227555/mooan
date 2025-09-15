<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function main() {
        return view('dashboard.main');
    }
}
