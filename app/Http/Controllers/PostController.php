<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Postlike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;
use App\Models\Like;

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
            $post->user_id = $uid;
            $post->body = $request->newpost;
            $post->save();

            return redirect('view-thread/'.$tid)->with('success','Post saved successfully!');
        }
}
