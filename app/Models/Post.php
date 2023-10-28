<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model
{
    use HasFactory;

    /**
     * Get all of the posts's likes.
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
