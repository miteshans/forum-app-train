<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    // delete user
    public function delete()
    {
        return view('delete-user');
    }
}
