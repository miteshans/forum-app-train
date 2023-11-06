<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Thread extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];
    
    // Get all Posts for a Thread
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all of the thread's likes.
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /*
    * A Thread belongs to a User
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);   
    }
    
    /**
     * Check if Thread is Locked
     */
    public function isLocked(Thread $thread)
    {
        if($thread->locked==1) {
            return true;
        }
        else {
            return false;
        }
    }
}

