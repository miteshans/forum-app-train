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
            // ### TO DO: Can't Like More than once by same user, Switch to UNLike if already Liked  ###
            // Code here
            // Will Be a Delete from the Model
            // ###

            $uid = Auth::id();

            // $postlike = new Postlike();
            // $postlike->post_id = $postid;
            // $postlike->user_id = $uid;
            // $postlike->save();

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
