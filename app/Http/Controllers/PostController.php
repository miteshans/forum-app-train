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
            $post->userid = $uid;
            $post->body = $request->newpost;
            $post->save();

            return redirect('view-thread/'.$tid)->with('success','Post saved successfully!');
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
