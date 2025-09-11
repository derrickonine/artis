<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@artismaroc.test'],
            [
                'prenom' => 'Admin',
                'nom' => 'Artis',
                'password' => Hash::make('AdminPass123!'),
                'role' => 'particulier',
                'is_admin' => true,
                'status' => 'active'
            ]
        );
    }
}
