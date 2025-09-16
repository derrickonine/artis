<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];
    protected $table = 'announcements'; // Explicitement défini pour éviter des confusions
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}