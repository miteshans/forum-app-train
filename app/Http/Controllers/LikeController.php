<?php

namespace App\Http\Controllers;
use App\Models\Thread;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likethread(string $threadid)
    {
        $uid = Auth::id();

        $like = new Like();
        $like->likeable_id = $threadid;
        $like->likeable_type = Thread::class;
        $like->user_id = $uid;
        $like->save();

        // display given thread
        $thread = Thread::with('posts')->with('likes')->where('id',$threadid)->first();
        return view('view-thread', ['thread'=>$thread]);
    }

    public function likepost(string $postid,string $threadid)
    {
        $uid = Auth::id();

        $like = new Like();
        $like->likeable_id = $postid;
        $like->likeable_type = Post::class;
        $like->user_id = $uid;
        $like->save();

        // display given thread
        $thread = Thread::with('posts')->with('likes')->where('id',$threadid)->first();
        return view('view-thread', ['thread'=>$thread]);
    }
}
