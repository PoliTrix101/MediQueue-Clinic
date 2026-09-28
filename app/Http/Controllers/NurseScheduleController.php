<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NurseScheduleController extends Controller
{
    public function nurseSchedule()
    {
        $nurse = auth()->user();

        $schedules = DB::table('nurse_schedules')
            ->where('nurse_id', $nurse->id)
            ->orderBy('schedule_date', 'asc')
            ->get();

        return view('nurse.schedule', compact('schedules', 'nurse'));
    }

    public function saveSchedule(Request $request)
    {
        $request->validate([
            'schedule_date' => 'required|date',
            'status' => 'required|in:in,out',
        ]);

        $nurse = auth()->user();

        $existing = DB::table('nurse_schedules')
            ->where('nurse_id', $nurse->id)
            ->where('schedule_date', $request->schedule_date)
            ->first();

        if ($existing) {
            DB::table('nurse_schedules')
                ->where('id', $existing->id)
                ->update([
                    'status' => $request->status,
                    'updated_at' => now(),
                ]);
        } else {
            DB::table('nurse_schedules')
                ->insert([
                    'nurse_id' => $nurse->id,
                    'schedule_date' => $request->schedule_date,
                    'status' => $request->status,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }

        return redirect()
            ->route('nurse.schedule')
            ->with('success', 'Nurse schedule updated successfully.');
    }

    public function studentSchedule()
    {
        $nurses = DB::table('users')
            ->where('role', 'nurse')
            ->select(
                'id',
                'name',
                'profile_photo',
                'nurse_status',
                'nurse_position'
            )
            ->orderBy('name', 'asc')
            ->get();

        $schedules = DB::table('nurse_schedules')
            ->join(
                'users',
                'nurse_schedules.nurse_id',
                '=',
                'users.id'
            )
            ->select(
                'nurse_schedules.*',
                'users.name as nurse_name',
                'users.nurse_position',
                'users.nurse_status'
            )
            ->orderBy('nurse_schedules.schedule_date', 'asc')
            ->get();

        return view(
            'student.nurse-schedule',
            compact('nurses', 'schedules')
        );
    }
}

