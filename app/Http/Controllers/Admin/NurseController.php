<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class NurseController extends Controller
{
    /**
     * Display all registered nurses.
     */
    public function index()
    {
        $nurses = User::where('role', 'nurse')
            ->latest()
            ->paginate(15);

        return view('admin.nurses.index', compact('nurses'));
    }

    /**
     * Display a specific nurse's system account information.
     */
    public function show(User $nurse)
    {
        // Make sure the selected account is actually a nurse.
        abort_unless($nurse->role === 'nurse', 404);

        return view('admin.nurses.show', compact('nurse'));
    }
}

