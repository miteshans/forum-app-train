<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function index() 
    {
        return view('add-a-thread');
    }

    public function store(Request $request): RedirectResponse
    {

        // validate input
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'body' => 'required|max:2000',
        ]);

        $uid = Auth::id();

        $thread = new Thread();
        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->userid = $uid;
        $thread->save();

        return redirect('add-a-thread');
    }

}
