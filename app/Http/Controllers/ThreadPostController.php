<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;
use App\Models\Post;

class ThreadPostController extends Controller
{
    // display All Threads & Posts but current user
    public function allThreadsPosts() 
    {
        $uid = Auth::id();
        
        // get threads by user
        $threads = Thread::where('fk_user_id',$uid)->get();
        
        // get posts by user
        $posts = Post::where('fk_user_id', $uid)->get();

        return view ('threadposts', ['threads'=>$threads, 'posts'=>$posts]);
    }
}
