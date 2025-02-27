<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }

    public function tag(string $name)
    {
        $name = trim($name); // Remove extra spaces
        $name = strtolower($name); // Make sure casing is consistent
        
        $tag = Tag::firstOrCreate(['name'=> $name]);
        $this->tags()->syncWithoutDetaching([$tag->id]);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
