<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function index() 
    {
        return view('add-a-thread');
    }

    public function store(Request $request)
    {
        $uid = Auth::id();

        $thread = new Thread();
        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->userid = $uid;
        $thread->save();

        return view('add-a-thread');
    }

}
