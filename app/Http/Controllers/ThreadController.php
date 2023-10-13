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
        // get latest threads
        $threads = Thread::with('posts')->get();        
        return view('add-a-thread', ['threads'=>$threads]);
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
}
