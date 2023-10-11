<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class ThreadController extends Controller
{
    public function index() 
    {
        return view('add-a-thread');
    }

    public function store(Request $request)
    {
        // validate input
        $validatedData = $request->validate([
            'thetitle' => 'required|max:100',
            'thebody' => 'required|max:2000',
        ]);

        $uid = Auth::id();

        $thread = new Thread();
        $thread->title = $request->thetitle;
        $thread->body = $request->thebody;
        $thread->userid = $uid;
        $thread->save();

        return redirect('add-a-thread')->with('success','Thread saved successfully!');
    }

    public function view()
    {
        // Get threads for id=1 and assocated posts
        $threadbyid = Thread::find(1)->first();
        $posts = $threadbyid->posts;

        // get all threads
        $allthreads = Thread::with('posts')->get();

        // threads for this user
        $userThreads = Thread::with('posts')->where('userid',1)->get();

        return view('view-threads',['userthreads'=>$userThreads]);
    }
}
