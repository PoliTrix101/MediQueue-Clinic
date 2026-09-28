<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\QueueTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Get Logged-in Student
    |--------------------------------------------------------------------------
    */

    private function getStudent()
    {
        $user = auth()->user();

        if (!$user) {
            abort(401, 'You must be logged in.');
        }

        $student = $user->student;

        if (!$student) {
            abort(403, 'This account does not have a student profile.');
        }

        return $student;
    }


    /*
    |--------------------------------------------------------------------------
    | Student Dashboard
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $student = $this->getStudent();


        /*
        |--------------------------------------------------------------------------
        | Count ALL Appointments
        |--------------------------------------------------------------------------
        |
        | This counts every appointment belonging to the logged-in student.
        |
        */

        $appointments = Appointment::where(
            'student_id',
            $student->id
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Get Nearest Upcoming Appointment
        |--------------------------------------------------------------------------
        */

        $appointment = Appointment::where(
            'student_id',
            $student->id
        )
            ->whereIn('status', [
                'pending',
                'approved'
            ])
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Get Student's Active Queue
        |--------------------------------------------------------------------------
        */

        $queue = QueueTicket::whereHas(
            'appointment',
            function ($query) use ($student) {

                $query->where(
                    'student_id',
                    $student->id
                );

            }
        )
            ->whereIn('status', [
                'waiting',
                'called',
                'in_consultation'
            ])
            ->with('appointment')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Get Currently Called Queue Number
        |--------------------------------------------------------------------------
        */

        $currentQueue = QueueTicket::where(
            'status',
            'called'
        )
            ->orderBy('queue_number')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Number of People Ahead
        |--------------------------------------------------------------------------
        */

        $peopleAhead = 0;

        if ($queue) {

            $peopleAhead = QueueTicket::where(
                'status',
                'waiting'
            )
                ->where(
                    'queue_number',
                    '<',
                    $queue->queue_number
                )
                ->count();
        }


        /*
        |--------------------------------------------------------------------------
        | Get Nurses
        |--------------------------------------------------------------------------
        */

        $nurses = DB::table('users')
            ->where(
                'role',
                'nurse'
            )
            ->select(
                'id',
                'name',
                'profile_photo',
                'nurse_status',
                'nurse_position'
            )
            ->orderBy(
                'name',
                'asc'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Get Nurse Calendar Schedules
        |--------------------------------------------------------------------------
        */

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
            ->orderBy(
                'nurse_schedules.schedule_date',
                'asc'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Send Data To Student Dashboard
        |--------------------------------------------------------------------------
        */

        return view(
            'student.dashboard',
            compact(
                'student',
                'appointments',
                'appointment',
                'queue',
                'currentQueue',
                'peopleAhead',
                'nurses',
                'schedules'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | My Appointments
    |--------------------------------------------------------------------------
    */

    public function appointments()
    {
        $student = $this->getStudent();

        $appointments = Appointment::with(
            'queueTicket'
        )
            ->where(
                'student_id',
                $student->id
            )
            ->latest()
            ->get();

        return view(
            'student.appointments',
            compact('appointments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Book Appointment Page
    |--------------------------------------------------------------------------
    */

    public function createAppointment()
    {
        $student = $this->getStudent();

        return view(
            'student.book-appointment',
            compact('student')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Save Appointment
    |--------------------------------------------------------------------------
    */

    public function storeAppointment(Request $request)
    {
        $student = $this->getStudent();

        $validated = $request->validate([

            'appointment_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'appointment_time' => [
                'required',
            ],

            'reason' => [
                'nullable',
                'string',
                'max:1000',
            ],

        ]);


        Appointment::create([

            'student_id' =>
                $student->id,

            'appointment_date' =>
                $validated['appointment_date'],

            'appointment_time' =>
                $validated['appointment_time'],

            'reason' =>
                $validated['reason'] ?? null,

            'status' =>
                'pending',

        ]);


        return redirect()
            ->route('student.appointments')
            ->with(
                'success',
                'Appointment request submitted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | My Queue
    |--------------------------------------------------------------------------
    */

    public function queue()
    {
        $student = $this->getStudent();


        /*
        | Get student's active queue
        */

        $queue = QueueTicket::whereHas(
            'appointment',
            function ($query) use ($student) {

                $query->where(
                    'student_id',
                    $student->id
                );

            }
        )
            ->whereIn('status', [
                'waiting',
                'called',
                'in_consultation'
            ])
            ->with('appointment')
            ->first();


        /*
        | Get currently called queue
        */

        $currentQueue = QueueTicket::where(
            'status',
            'called'
        )
            ->orderBy('queue_number')
            ->first();


        /*
        | Calculate people ahead
        */

        $peopleAhead = 0;


        if ($queue) {

            $peopleAhead = QueueTicket::where(
                'status',
                'waiting'
            )
                ->where(
                    'queue_number',
                    '<',
                    $queue->queue_number
                )
                ->count();
        }


        return view(
            'student.queue',
            compact(
                'queue',
                'currentQueue',
                'peopleAhead'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Medical History
    |--------------------------------------------------------------------------
    */

    public function history()
    {
        $student = $this->getStudent();


        $records = MedicalRecord::with(
            'appointment'
        )
            ->where(
                'student_id',
                $student->id
            )
            ->latest()
            ->get();


        return view(
            'student.history',
            compact('records')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        $student = $this->getStudent();

        return view(
            'student.profile',
            compact('student')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Profile + Profile Picture
    |--------------------------------------------------------------------------
    */

    public function updateProfile(Request $request)
    {
        $student = $this->getStudent();


        $validated = $request->validate([

            'first_name' => [
                'required',
                'string',
                'max:100',
            ],

            'last_name' => [
                'required',
                'string',
                'max:100',
            ],

            'course' => [
                'nullable',
                'string',
                'max:100',
            ],

            'year_level' => [
                'nullable',
                'string',
                'max:50',
            ],

            'contact_number' => [
                'nullable',
                'string',
                'max:30',
            ],

            'date_of_birth' => [
                'nullable',
                'date',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload New Profile Picture
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            /*
            | Delete old photo
            */

            if (
                $student->profile_photo &&
                Storage::disk('public')->exists(
                    $student->profile_photo
                )
            ) {

                Storage::disk('public')->delete(
                    $student->profile_photo
                );
            }


            /*
            | Save new photo
            */

            $validated['profile_photo'] =
                $request
                    ->file('profile_photo')
                    ->store(
                        'profile-photos',
                        'public'
                    );
        }


        /*
        |--------------------------------------------------------------------------
        | Update Student
        |--------------------------------------------------------------------------
        */

        $student->update(
            $validated
        );


        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Cancel Appointment
    |--------------------------------------------------------------------------
    */

    public function cancelAppointment(
        Appointment $appointment
    ) {

        $student = $this->getStudent();


        /*
        | Prevent cancelling another student's appointment
        */

        abort_unless(
            $appointment->student_id === $student->id,
            403
        );


        /*
        | Only pending appointments can be cancelled
        */

        if (
            $appointment->status === 'pending'
        ) {

            $appointment->update([
                'status' => 'cancelled',
            ]);
        }


        return back()->with(
            'success',
            'Appointment cancelled successfully.'
        );
    }
}