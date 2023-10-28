<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

use App\Models\Thread;

class Like extends Model
{
    use HasFactory;

    /**
     * Relationship between Like model and other models that can be liked, i.e. Threads and Posts
     */
    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }
}
