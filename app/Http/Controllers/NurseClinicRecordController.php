<?php

namespace App\Http\Controllers;

use App\Models\ClinicRecord;
use Illuminate\Http\Request;

class NurseClinicRecordController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $records = ClinicRecord::with([
            'student',
            'appointment'
        ])
        ->when($search, function ($query) use ($search) {

            $query->whereHas('student', function ($studentQuery) use ($search) {

                $studentQuery
                    ->where('name', 'like', "%{$search}%")
                    ->orWhere('student_id', 'like', "%{$search}%");

            });

        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('nurse.clinic-records', compact(
            'records',
            'search'
        ));
    }

    public function show($id)
    {
        $record = ClinicRecord::with([
            'student',
            'appointment'
        ])->findOrFail($id);

        return view(
            'nurse.clinic-record-show',
            compact('record')
        );
    }
}

