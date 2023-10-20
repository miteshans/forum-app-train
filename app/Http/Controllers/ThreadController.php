<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Threadlike;

class ThreadController extends Controller
{
    // ### TODO : FIX CODE TYPO - NO NEED PULLBACK POSTS, THERE ARE NONE!
    // get latest threads
    public function index() 
    {
        $threads = Thread::with('posts')->get();        
        return view('add-a-thread', ['threads'=>$threads]);
    }
    // ### END TODO

    // view a given thread
    public function view(string $id) 
    {
        //$thread = Thread::with('posts')->with('likes')->where('id',$id)->first();

        // get Posts with likes as well
        $thread = Thread::with('posts.likes')->where('id',$id)->first();

        //echo $thread;
        //dd();
        // Add +1 to views count
        $thread->viewcount = $thread->viewcount +1; 
        $thread->save();
        
        return view('view-thread', ['thread'=>$thread]);
    }

    public function lockthreads() 
    {
        // get latest threads
        $threads = Thread::with('posts')->get();
        return view('lock-threads', ['threads'=>$threads]);
    }

    public function lockthreadstore(Thread $thread)
    {
        // unlock/lock the given thread
        if($thread->locked==1)
        {
            $thread->locked = 0;
        }
        else
        {
            $thread->locked = 1;
        }
        $thread->save();

        $threads = Thread::with('posts')->get();
        return view('lock-threads', ['threads'=>$threads]);
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

    public function userthreads()
    {
        $uid = Auth::id();
        $threads = Thread::with('posts')->where('userid',$uid)->get();
        return view('user-threads',['threads'=>$threads]);
    }

    public function latestthreads()
    {
        // get latest threads
        $threads = Thread::with('posts')->get();
        return view('latest-threads', ['threads'=>$threads]);
    }

    public function likethread(string $threadid)
    {
        // ### TO DO: Can't Like More than once by same user, Switch to UNLike if already Liked  ###
        // Code here
        // Will Be a Delete from the Model
        // ###

        $uid = Auth::id();

        $threadlike = new Threadlike();
        $threadlike->thread_id = $threadid;
        $threadlike->user_id = $uid;
        $threadlike->save();

        // display given thread
        $thread = Thread::with('posts')->with('likes')->where('id',$threadid)->first();
        return view('view-thread', ['thread'=>$thread]);
    }
}
