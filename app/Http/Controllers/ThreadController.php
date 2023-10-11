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
        $thread = Thread::find(1)->first();
        $posts = $thread->posts;
        echo($thread);
        echo('<hr>');
        //echo($posts);
        return view('view-threads');
    }
}
