<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::with('user')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('student_id', 'like', "%{$search}%")
                        ->orWhere('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('course', 'like', "%{$search}%")
                        ->orWhere('year_level', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view(
            'nurse.students',
            compact('students')
        );
    }

    public function create()
    {
        return view('nurse.students-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'student_id' => 'required|string|max:50|unique:students,student_id',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'course' => 'nullable|string|max:100',
            'year_level' => 'nullable|string|max:50',
            'contact_number' => 'nullable|string|max:30',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ]);

        Student::create($validated);

        return redirect()
            ->route('nurse.students')
            ->with(
                'success',
                'Student added successfully.'
            );
    }

    public function show(Student $student)
    {
        $student->load('user');

        return view(
            'nurse.student',
            compact('student')
        );
    }

    public function edit(Student $student)
    {
        $student->load('user');

        return view(
            'nurse.students-edit',
            compact('student')
        );
    }

    public function update(
        Request $request,
        Student $student
    ) {
        $validated = $request->validate([
            'student_id' => 'required|string|max:50|unique:students,student_id,' . $student->id,
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'course' => 'nullable|string|max:100',
            'year_level' => 'nullable|string|max:50',
            'contact_number' => 'nullable|string|max:30',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ]);

        $student->update($validated);

        return redirect()
            ->route('nurse.students')
            ->with(
                'success',
                'Student updated successfully.'
            );
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('nurse.students')
            ->with(
                'success',
                'Student deleted successfully.'
            );
    }
}