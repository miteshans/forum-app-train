<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // list users
    public function view()
    {
        $users = User::all();
        return view('user-list', compact('users'));
    }

    // delete user
    public function delete(Request $request)
    {
        // delete
        $selectedUserIds = $request->input('selected_users');
        User::whereIn('id', $selectedUserIds)->delete();
        
        $users = User::all();
        return view('/user-list', compact('users'))->with('success', 'Selected users deleted successfully');
    }
}
