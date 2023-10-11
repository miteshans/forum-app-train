<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;
use App\Models\Post;

class ThreadPostController extends Controller
{
    // display All Threads & Posts by current user
    public function allThreadsPosts() 
    {
        $uid = Auth::id();
        
        // get threads by user
        $threads = Thread::where('fk_user_id',$uid)->get();

        //$mPosts = Thread::find(1)->posts()->first();
        //var_dump($mPosts);

        // get posts by user
        $posts = Post::where('fk_user_id', $uid)->get();

        return view ('threadposts', ['threads'=>$threads, 'posts'=>$posts]);
    }

    // Get all Threads and their corresponding Posts
    public function ThreadsWithPosts()
    {
        // the functionality of this needs to be a Model
        // and returns a nested array of Threads/posts
        // Eloquent 1-M Relationships?
    }
}
