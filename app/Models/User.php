<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'password',
        'role', // 'particulier'|'auto'|'entreprise'
        'adresse',
        'phone',
        'phone_verified_at',
        'phone_verification_code',
        'status', // 'active' or 'pending' (artisan)
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'phone_verification_code',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];
}
