<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirect()
    {
        return redirect()->away(
            'https://accounts.google.com'
        );
    }

    public function callback(Request $request)
    {
        return redirect()->route('login');
    }
}