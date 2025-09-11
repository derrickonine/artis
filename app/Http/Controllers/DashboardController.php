<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function accueil()
    {
        $user = Auth::user();
        return view('accueil', compact('user'));
    }

    public function dashboard()
    {
        // page générique dashboard (ex: liste, messages)
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
