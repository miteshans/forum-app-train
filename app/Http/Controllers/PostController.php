<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // store post against a thread
    public function store(Request $request)
    {
        // validate input
        $validatedData = $request->validate([
            'newpost' => 'required|max:2000',
        ]);

        $tid = $request->threadid;
        $uid = Auth::id();
        
        $post = new Post();
        $post->thread_id = $tid;
        $post->userid = $uid;
        $post->body = $request->newpost;
        $post->save();
    }
}
