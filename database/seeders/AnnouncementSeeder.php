<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;
use App\Models\User;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // Utilise le premier utilisateur, ajuste selon ton besoin
        Announcement::create([
            'user_id' => $user->id,
            'title' => 'Exemple d\'annonce 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Announcement::create([
            'user_id' => $user->id,
            'title' => 'Profil artisan 1',
            'created_at' => now()->subDay(),
            'updated_at' => now()->subDay(),
        ]);
        Announcement::create([
            'user_id' => $user->id,
            'title' => 'Message récent',
            'created_at' => now()->subHours(2),
            'updated_at' => now()->subHours(2),
        ]);
    }
}