<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;

class PostController extends Controller
{
    // // add a post against a given thread
    // public function addpost(Request $request) 
    // {
    //     $tid = $request->tid;
    //     $thread = Thread::with('posts')->where('id',$tid)->get();
    //     return view('add-a-post', ['threads'=>$thread]);
    // }

    // add a post against a given thread
    public function index(Request $request) 
    {
        $tid = $request->tid;
        $thread = Thread::with('posts')->where('id',$tid)->get();
        return view('view-thread', ['threads'=>$thread]);
    }

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

        return redirect('view-thread?tid='. $tid)->with('success','Post saved successfully!');
    }
}
