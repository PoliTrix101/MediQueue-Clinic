<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display all registered students.
     */
    public function index()
    {
        $students = Student::latest()->paginate(15);

        return view('admin.students.index', compact('students'));
    }

    /**
     * Display a specific student's information.
     */
    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }
}

