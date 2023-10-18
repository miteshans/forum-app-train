<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Thread extends Model
{
    use HasFactory;
    
    // Get all Posts for a Thread
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    // Get all users who have Liked a Thread
    public function likes(): HasMany
    {
        return $this->hasMany(Threadlike::class);    
    }
}

