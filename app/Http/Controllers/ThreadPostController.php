<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;
use App\Models\Post;

class ThreadPostController extends Controller
{
    // display All Threads & Posts by current user
    public function userThreadsPosts() 
    {
        $uid = Auth::id();
        
        // get threads by user
        $threads = Thread::where('userid',$uid)->get();

        // get posts by user
        $posts = Post::where('userid', $uid)->get();

        return view ('user-threads-posts', ['threads'=>$threads, 'posts'=>$posts]);
    }

    // Get all Threads and their corresponding Posts
    public function ThreadsWithPosts()
    {
        // the functionality of this needs to be a Model
        // and returns a nested array of Threads/posts
        // Eloquent 1-M Relationships?
    }
}
