<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function accueil()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('message', 'Veuillez vous connecter.');
        }
        return view('accueil', compact('user'));
    }

    public function dashboard(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('message', 'Veuillez vous connecter.');
        }

        // Récupérer les annonces dynamiques
        $announcements = Announcement::where('user_id', $user->id)->get();
        if ($announcements->isEmpty()) {
            $announcements = collect([
                ['id' => 1, 'user_id' => $user->id, 'title' => 'Exemple d\'annonce 1', 'created_at' => now()],
                ['id' => 2, 'user_id' => $user->id, 'title' => 'Profil artisan 1', 'created_at' => now()->subDay()],
                ['id' => 3, 'user_id' => $user->id, 'title' => 'Message récent', 'created_at' => now()->subHours(2)],
            ])->map(function ($item) {
                return (object) $item;
            });
        }

        // Ajouter des IDs aux demandes simulées
        $requests = collect([
            ['id' => 1, 'title' => 'Réparation plomberie', 'date' => '14/09/2025', 'status' => 'En attente'],
            ['id' => 2, 'title' => 'Peinture salon', 'date' => '12/09/2025', 'status' => 'En cours'],
        ]);

        // Ajouter des IDs aux artisans suggérés
        $suggestedArtisans = collect([
            ['id' => 1, 'name' => 'Mohammed - Plombier', 'location' => 'Casablanca', 'phone' => '+212600123456'],
            ['id' => 2, 'name' => 'Fatima - Peintre', 'location' => 'Rabat', 'phone' => '+212600654321'],
        ]);

        $notifications = collect([
            ['message' => 'Nouveau message de Mohammed - 15/09/2025 11:00', 'created_at' => now()],
            ['message' => 'Votre demande de plomberie a été acceptée - 14/09/2025', 'created_at' => now()->subDay()],
        ]);

        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $announcements = $announcements->filter(function ($item) use ($searchTerm) {
                return stripos($item->title ?? $item['title'], $searchTerm) !== false;
            });
        }

        return view('dashboard', compact('user', 'announcements', 'requests', 'suggestedArtisans', 'notifications'));
    }
}