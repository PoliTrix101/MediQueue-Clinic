
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NurseClinicRecordController;
/*
|--------------------------------------------------------------------------
| Authentication Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Student Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;

/*
|--------------------------------------------------------------------------
| Nurse Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\NurseController;
use App\Http\Controllers\NurseScheduleController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\NurseController as AdminNurseController;
use App\Http\Controllers\Admin\ClinicRecordController;


/*
|--------------------------------------------------------------------------
| LOGIN / AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [
    AuthController::class,
    'showLogin'
])->name('login');

Route::post('/login', [
    AuthController::class,
    'login'
]);

Route::post('/logout', [
    AuthController::class,
    'logout'
])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
| Admin responsibilities:
|
| - Dashboard
| - User Management
| - Students
| - Nurses
| - Clinic Records monitoring
| - Reports
| - Activity Logs
| - Notifications
| - System Settings
| - Own Profile
|
| Admin does NOT handle:
|
| - Queue
| - Consultation
| - Consultation Form
| - Medicine Inventory
| - Nurse Schedule
| - Individual appointment workflow
|
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | USER MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::get('/users', [
            UserController::class,
            'index'
        ])->name('users.index');

        Route::get('/users/{user}', [
            UserController::class,
            'show'
        ])->name('users.show');


        /*
        |--------------------------------------------------------------------------
        | STUDENTS
        |--------------------------------------------------------------------------
        */

        Route::get('/students', [
            AdminStudentController::class,
            'index'
        ])->name('students.index');

        Route::get('/students/{student}', [
            AdminStudentController::class,
            'show'
        ])->name('students.show');


        /*
        |--------------------------------------------------------------------------
        | NURSES
        |--------------------------------------------------------------------------
        */

        Route::get('/nurses', [
            AdminNurseController::class,
            'index'
        ])->name('nurses.index');

        Route::get('/nurses/{nurse}', [
            AdminNurseController::class,
            'show'
        ])->name('nurses.show');


        /*
        |--------------------------------------------------------------------------
        | CLINIC RECORDS
        |--------------------------------------------------------------------------
        |
        | Admin can VIEW clinic records.
        |
        | Nurse is responsible for creating and managing
        | actual clinical records.
        |
        */

        Route::get('/clinic-records', [
            ClinicRecordController::class,
            'index'
        ])->name('clinic-records.index');

        Route::get('/clinic-records/{clinicRecord}', [
            ClinicRecordController::class,
            'show'
        ])->name('clinic-records.show');

    });


/*
|--------------------------------------------------------------------------
| NURSE
|--------------------------------------------------------------------------
|
| Nurse is the main clinic operator.
|
| Nurse handles:
|
| - Dashboard
| - Queue
| - Students
| - Appointments
| - Consultations
| - Clinic Records
| - Medicine
| - Nurse Schedule
| - Own Profile
|
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:nurse'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/dashboard', [
        NurseController::class,
        'dashboard'
    ])->name('nurse.dashboard');


    /*
    |--------------------------------------------------------------------------
    | QUEUE
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/queue', [
        NurseController::class,
        'queue'
    ])->name('nurse.queue');


    /*
    |--------------------------------------------------------------------------
    | STUDENTS
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/students', [
        StudentController::class,
        'index'
    ])->name('nurse.students');

    Route::get('/nurse/students/{student}', [
        StudentController::class,
        'show'
    ])->name('nurse.students.show');


    /*
    |--------------------------------------------------------------------------
    | APPOINTMENTS
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/appointments', [
        NurseController::class,
        'appointments'
    ])->name('nurse.appointments');


    /*
    |--------------------------------------------------------------------------
    | CONSULTATIONS
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/consultations', [
        NurseController::class,
        'consultations'
    ])->name('nurse.consultations');


    /*
    |--------------------------------------------------------------------------
    | INDIVIDUAL CONSULTATION
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/consultation/{id}', [
        NurseController::class,
        'consultation'
    ])->name('nurse.consultation');


    /*
    |--------------------------------------------------------------------------
    | COMPLETE CONSULTATION
    |--------------------------------------------------------------------------
    */

    Route::post('/nurse/consultation/{id}/complete', [
        NurseController::class,
        'completeConsultation'
    ])->name('nurse.consultation.complete');


    /*
    |--------------------------------------------------------------------------
    | CANCEL APPOINTMENT
    |--------------------------------------------------------------------------
    */

    Route::post('/nurse/appointments/{id}/cancel', [
        NurseController::class,
        'cancelAppointment'
    ])->name('nurse.appointment.cancel');


    /*
    |--------------------------------------------------------------------------
    | CLINIC RECORDS
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/clinic-records', [
        NurseController::class,
        'clinicRecords'
    ])->name('nurse.clinic.records');


    /*
    |--------------------------------------------------------------------------
    | NURSE PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/profile', [
        NurseController::class,
        'profile'
    ])->name('nurse.profile');

    Route::put('/nurse/profile', [
        NurseController::class,
        'updateProfile'
    ])->name('nurse.profile.update');

    Route::delete('/nurse/profile/photo', [
        NurseController::class,
        'removeProfilePhoto'
    ])->name('nurse.profile.photo.remove');


    /*
    |--------------------------------------------------------------------------
    | NURSE SCHEDULE
    |--------------------------------------------------------------------------
    */

    Route::get('/nurse/schedule', [
        NurseScheduleController::class,
        'nurseSchedule'
    ])->name('nurse.schedule');

    Route::post('/nurse/schedule', [
        NurseScheduleController::class,
        'saveSchedule'
    ])->name('nurse.schedule.save');

});


/*
|--------------------------------------------------------------------------
| STUDENT
|--------------------------------------------------------------------------
|
| Student can:
|
| - Dashboard
| - Book Appointment
| - View My Appointments
| - Cancel Appointment
| - Medical History
| - My Profile
| - View Nurse Schedule
|
| Student does NOT manage:
|
| - Queue
| - Consultation
| - Clinic Records
| - Medicine
|
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:user'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/student/dashboard', [
        StudentDashboardController::class,
        'dashboard'
    ])->name('user.dashboard');


    /*
    |--------------------------------------------------------------------------
    | BOOK APPOINTMENT
    |--------------------------------------------------------------------------
    */

    Route::get('/student/appointments/book', [
        StudentDashboardController::class,
        'createAppointment'
    ])->name('student.appointments.create');


    /*
    |--------------------------------------------------------------------------
    | STORE APPOINTMENT
    |--------------------------------------------------------------------------
    */

    Route::post('/student/appointments', [
        StudentDashboardController::class,
        'storeAppointment'
    ])->name('student.appointments.store');


    /*
    |--------------------------------------------------------------------------
    | MY APPOINTMENTS
    |--------------------------------------------------------------------------
    */

    Route::get('/student/appointments', [
        StudentDashboardController::class,
        'appointments'
    ])->name('student.appointments');


    /*
    |--------------------------------------------------------------------------
    | CANCEL APPOINTMENT
    |--------------------------------------------------------------------------
    */

    Route::patch('/student/appointments/{appointment}/cancel', [
        StudentDashboardController::class,
        'cancelAppointment'
    ])->name('student.appointments.cancel');


    /*
    |--------------------------------------------------------------------------
    | MEDICAL HISTORY
    |--------------------------------------------------------------------------
    */

    Route::get('/student/history', [
        StudentDashboardController::class,
        'history'
    ])->name('student.history');


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/student/profile', [
        StudentDashboardController::class,
        'profile'
    ])->name('student.profile');

    Route::put('/student/profile', [
        StudentDashboardController::class,
        'updateProfile'
    ])->name('student.profile.update');


    /*
    |--------------------------------------------------------------------------
    | NURSE SCHEDULE
    |--------------------------------------------------------------------------
    */

    Route::get('/student/nurse-schedule', [
        NurseScheduleController::class,
        'studentSchedule'
    ])->name('student.nurse.schedule');

});


/*
|--------------------------------------------------------------------------
| GOOGLE AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [
    GoogleController::class,
    'redirect'
])->name('google.redirect');

Route::get('/auth/google/callback', [
    GoogleController::class,
    'callback'
])->name('google.callback');

/////////////////////////////////////////
Route::middleware(['auth'])->group(function () { Route::get( '/nurse/clinic-records', [NurseClinicRecordController::class, 'index'] )->name('nurse.clinic.records'); Route::get( '/nurse/clinic-records/{id}', [NurseClinicRecordController::class, 'show'] )->name('nurse.clinic.records.show'); });