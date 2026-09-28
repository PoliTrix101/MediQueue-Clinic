<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $users = User::latest()->paginate(15);

        return view('admin.users.index', compact('users'));
    }


    /*
    |--------------------------------------------------------------------------
    | VIEW USER
    |--------------------------------------------------------------------------
    */

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}

