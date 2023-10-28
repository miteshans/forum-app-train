<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model
{
    use HasFactory;

    // Get all users who have Liked a Post
    // public function likes(): HasMany
    // {
    //     return $this->hasMany(Postlike::class);    
    // }
}
