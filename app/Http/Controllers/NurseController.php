<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ClinicRecord;

class NurseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function dashboard()
    {
        $today = today();

        $todayAppointments = DB::table('appointments')
            ->leftJoin(
                'students',
                'appointments.student_id',
                '=',
                'students.id'
            )
            ->select(
                'appointments.*',
                'students.student_id as student_number',
                'students.first_name',
                'students.last_name'
            )
            ->whereDate('appointments.appointment_date', $today)
            ->orderBy('appointments.appointment_time', 'asc')
            ->get();

        $waitingStudents = DB::table('appointments')
            ->where('status', 'pending')
            ->count();

        $todayAppointmentsCount = DB::table('appointments')
            ->whereDate('appointment_date', $today)
            ->count();

        $inConsultation = DB::table('appointments')
            ->where('status', 'in_consultation')
            ->count();

        $completed = DB::table('appointments')
            ->where('status', 'completed')
            ->count();

        return view(
            'nurse.dashboard',
            compact(
                'todayAppointments',
                'waitingStudents',
                'todayAppointmentsCount',
                'inConsultation',
                'completed'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | QUEUE
    |--------------------------------------------------------------------------
    */
    public function queue()
    {
        $appointments = DB::table('appointments')
            ->leftJoin(
                'students',
                'appointments.student_id',
                '=',
                'students.id'
            )
            ->select(
                'appointments.*',
                'students.student_id as student_number',
                'students.first_name',
                'students.last_name'
            )
            ->whereDate(
                'appointments.appointment_date',
                '>=',
                today()
            )
            ->orderBy(
                'appointments.appointment_date',
                'asc'
            )
            ->orderBy(
                'appointments.appointment_time',
                'asc'
            )
            ->get();

        return view(
            'nurse.queue',
            compact('appointments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STUDENTS
    |--------------------------------------------------------------------------
    */
    public function students(Request $request)
    {
        $query = DB::table('students');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'student_id',
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    'first_name',
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    'last_name',
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    'course',
                    'like',
                    "%{$search}%"
                );
            });
        }

        $students = $query
            ->orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->get();

        return view(
            'nurse.students',
            compact('students')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | APPOINTMENTS
    |--------------------------------------------------------------------------
    */
    public function appointments(Request $request)
    {
        $query = DB::table('appointments')
            ->leftJoin(
                'students',
                'appointments.student_id',
                '=',
                'students.id'
            )
            ->select(
                'appointments.*',
                'students.student_id as student_number',
                'students.first_name',
                'students.last_name',
                'students.course',
                'students.year_level'
            );

        if (
            $request->filled('status') &&
            $request->status !== 'all'
        ) {
            $query->where(
                'appointments.status',
                $request->status
            );
        }

        if ($request->filled('date')) {
            $query->whereDate(
                'appointments.appointment_date',
                $request->date
            );
        }

        $appointments = $query
            ->orderBy(
                'appointments.appointment_date',
                'desc'
            )
            ->orderBy(
                'appointments.appointment_time',
                'asc'
            )
            ->get();

        return view(
            'nurse.appointments',
            compact('appointments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CONSULTATION LIST
    |--------------------------------------------------------------------------
    */
    public function consultations()
    {
        $appointments = DB::table('appointments')
            ->leftJoin(
                'students',
                'appointments.student_id',
                '=',
                'students.id'
            )
            ->select(
                'appointments.*',
                'students.student_id as student_number',
                'students.first_name',
                'students.last_name',
                'students.course',
                'students.year_level',
                'students.contact_number'
            )
            ->whereIn(
                'appointments.status',
                [
                    'pending',
                    'in_consultation'
                ]
            )
            ->orderBy(
                'appointments.appointment_date',
                'asc'
            )
            ->orderBy(
                'appointments.appointment_time',
                'asc'
            )
            ->get();

        return view(
            'nurse.consultation',
            compact('appointments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | INDIVIDUAL CONSULTATION
    |--------------------------------------------------------------------------
    */
    public function consultation($id)
    {
        $appointment = DB::table('appointments')
            ->leftJoin(
                'students',
                'appointments.student_id',
                '=',
                'students.id'
            )
            ->select(
                'appointments.*',
                'students.id as actual_student_id',
                'students.student_id as student_number',
                'students.first_name',
                'students.last_name',
                'students.course',
                'students.year_level',
                'students.contact_number',
                'students.date_of_birth',
                'students.address'
            )
            ->where(
                'appointments.id',
                $id
            )
            ->first();

        if (!$appointment) {
            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | FIND EXISTING CLINIC RECORD
        |--------------------------------------------------------------------------
        */

        $clinicRecord = ClinicRecord::where(
            'student_id',
            $appointment->student_id
        )
        ->whereDate(
            'visit_date',
            $appointment->appointment_date
        )
        ->latest()
        ->first();


        /*
        |--------------------------------------------------------------------------
        | CHANGE PENDING TO IN CONSULTATION
        |--------------------------------------------------------------------------
        */

        if ($appointment->status === 'pending') {

            DB::table('appointments')
                ->where(
                    'id',
                    $id
                )
                ->update([
                    'status' => 'in_consultation',
                    'updated_at' => now(),
                ]);

            $appointment->status = 'in_consultation';
        }


        return view(
            'nurse.consultation-form',
            compact(
                'appointment',
                'clinicRecord'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | COMPLETE CONSULTATION
    |--------------------------------------------------------------------------
    */
    public function completeConsultation(
        Request $request,
        $id
    ) {
        $request->validate([
            'symptoms' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);


        /*
        |--------------------------------------------------------------------------
        | FIND APPOINTMENT
        |--------------------------------------------------------------------------
        */

        $appointment = DB::table('appointments')
            ->where(
                'id',
                $id
            )
            ->first();

        if (!$appointment) {
            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | FIND EXISTING CLINIC RECORD
        |--------------------------------------------------------------------------
        */

        $existingRecord = ClinicRecord::where(
            'student_id',
            $appointment->student_id
        )
        ->whereDate(
            'visit_date',
            $appointment->appointment_date
        )
        ->first();


        /*
        |--------------------------------------------------------------------------
        | PREPARE CLINIC RECORD
        |--------------------------------------------------------------------------
        */

        $recordData = [

            'student_id' =>
                $appointment->student_id,

            'visit_date' =>
                $appointment->appointment_date,

            'chief_complaint' =>
                $appointment->reason,

            'symptoms' =>
                $request->symptoms,

            'assessment' =>
                $request->diagnosis,

            'treatment' =>
                $request->treatment,

            'notes' =>
                $request->notes,

            'nurse_id' =>
                auth()->id(),

            'updated_at' =>
                now(),
        ];


        /*
        |--------------------------------------------------------------------------
        | CREATE OR UPDATE CLINIC RECORD
        |--------------------------------------------------------------------------
        */

        if ($existingRecord) {

            $existingRecord->update(
                $recordData
            );

        } else {

            $recordData['created_at'] = now();

            ClinicRecord::create(
                $recordData
            );
        }


        /*
        |--------------------------------------------------------------------------
        | MARK APPOINTMENT AS COMPLETED
        |--------------------------------------------------------------------------
        */

        DB::table('appointments')
            ->where(
                'id',
                $id
            )
            ->update([
                'status' => 'completed',
                'updated_at' => now(),
            ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('nurse.clinic.records')
            ->with(
                'success',
                'Consultation completed and clinic record saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CANCEL APPOINTMENT
    |--------------------------------------------------------------------------
    */
    public function cancelAppointment($id)
    {
        $appointment = DB::table('appointments')
            ->where(
                'id',
                $id
            )
            ->first();

        if (!$appointment) {
            abort(404);
        }

        DB::table('appointments')
            ->where(
                'id',
                $id
            )
            ->update([
                'status' => 'cancelled',
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('nurse.appointments')
            ->with(
                'success',
                'Appointment cancelled.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CLINIC RECORDS
    |--------------------------------------------------------------------------
    */
    public function clinicRecords(Request $request)
    {
        $query = DB::table('clinic_records')
            ->leftJoin(
                'students',
                'clinic_records.student_id',
                '=',
                'students.id'
            )
            ->leftJoin(
                'users',
                'clinic_records.nurse_id',
                '=',
                'users.id'
            )
            ->select(
                'clinic_records.*',

                /*
                | The existing Blade file expects
                | appointment_date and appointment_time.
                |
                | appointment_date comes from visit_date.
                */
                'clinic_records.visit_date as appointment_date',

                'students.student_id as student_number',
                'students.first_name',
                'students.last_name',
                'students.course',
                'students.year_level',

                'users.name as nurse_name'
            );


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'students.student_id',
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    'students.first_name',
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    'students.last_name',
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    'clinic_records.chief_complaint',
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    'clinic_records.assessment',
                    'like',
                    "%{$search}%"
                );
            });
        }


        /*
        |--------------------------------------------------------------------------
        | GET RECORDS
        |--------------------------------------------------------------------------
        */

        $records = $query
            ->orderBy(
                'clinic_records.visit_date',
                'desc'
            )
            ->orderBy(
                'clinic_records.created_at',
                'desc'
            )
            ->get();


        return view(
            'nurse.clinic-records',
            compact('records')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    public function profile()
    {
        $user = auth()->user();

        return view(
            'nurse.profile',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFILE
    |--------------------------------------------------------------------------
    */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([

            'name' =>
                'nullable|string|max:255',

            'email' =>
                'nullable|email|max:255|unique:users,email,' . $user->id,

            'profile_photo' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'nurse_status' =>
                'nullable|in:in,out,busy',

            'nurse_position' =>
                'nullable|string|max:255',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE NAME
        |--------------------------------------------------------------------------
        */

        if ($request->filled('name')) {
            $user->name =
                $validated['name'];
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE EMAIL
        |--------------------------------------------------------------------------
        */

        if ($request->filled('email')) {
            $user->email =
                $validated['email'];
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE NURSE STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->has('nurse_status')) {
            $user->nurse_status =
                $validated['nurse_status'];
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE NURSE POSITION
        |--------------------------------------------------------------------------
        */

        if ($request->has('nurse_position')) {
            $user->nurse_position =
                $validated['nurse_position'];
        }


        /*
        |--------------------------------------------------------------------------
        | PROFILE PHOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            if (
                $user->profile_photo &&
                Storage::disk('public')->exists(
                    $user->profile_photo
                )
            ) {
                Storage::disk('public')->delete(
                    $user->profile_photo
                );
            }

            $user->profile_photo =
                $request
                    ->file('profile_photo')
                    ->store(
                        'nurse-profiles',
                        'public'
                    );
        }


        /*
        |--------------------------------------------------------------------------
        | SAVE
        |--------------------------------------------------------------------------
        */

        $user->save();


        /*
        |--------------------------------------------------------------------------
        | RETURN
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('nurse.profile')
            ->with(
                'success',
                'Profile, availability and position updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | REMOVE PROFILE PHOTO
    |--------------------------------------------------------------------------
    */
    public function removeProfilePhoto()
    {
        $user = auth()->user();

        if (
            $user->profile_photo &&
            Storage::disk('public')->exists(
                $user->profile_photo
            )
        ) {
            Storage::disk('public')->delete(
                $user->profile_photo
            );
        }

        $user->profile_photo = null;

        $user->save();

        return redirect()
            ->route('nurse.profile')
            ->with(
                'success',
                'Profile picture removed.'
            );
    }
}

