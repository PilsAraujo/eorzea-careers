<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    /** @use HasFactory<\Database\Factories\FactionFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
