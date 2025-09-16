<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Logique pour lister les notifications
        return view('notifications.index'); // Crée une vue notifications/index.blade.php si besoin
    }
}