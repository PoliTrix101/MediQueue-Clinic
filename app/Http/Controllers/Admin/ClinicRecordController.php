<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicRecord;

class ClinicRecordController extends Controller
{
    /**
     * Display clinic records.
     *
     * Admin can view and monitor records,
     * but does not create or edit them.
     */
    public function index()
    {
        $records = ClinicRecord::latest()
            ->paginate(15);

        return view('admin.clinic-records.index', compact('records'));
    }

    /**
     * Display a single clinic record.
     */
    public function show(ClinicRecord $clinicRecord)
    {
        return view(
            'admin.clinic-records.show',
            compact('clinicRecord')
        );
    }
}

