<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Threadlike;

use App\Models\Like;
use Illuminate\Support\Facades\DB;


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
        $thread = Thread::find($id); 

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
        $thread->user_id = $uid;
        $thread->save();

        return redirect('add-a-thread')->with('success','Thread saved successfully!');
    }

    public function userthreads()
    {
        $uid = Auth::id();
        $threads = Thread::with('posts')->where('user_id',$uid)->get();
        return view('user-threads',['threads'=>$threads]);
    }

    public function latestthreads()
    {
        // get latest threads
        $threads = Thread::with('posts')->get();
        
        // $t = Thread::find(1);
        // echo $t->user->name;
        // dd();
        return view('latest-threads', ['threads'=>$threads]);
    }
}
