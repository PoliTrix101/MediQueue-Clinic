<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Appointment;
use App\Models\ClinicRecord;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ============================
        // TOTAL USERS
        // ============================

        $totalUsers = User::count();

        // ============================
        // TOTAL STUDENTS
        // ============================

        $totalStudents = Student::count();

        // ============================
        // TOTAL NURSES
        // ============================

        $totalNurses = User::where('role', 'nurse')->count();

        // ============================
        // TOTAL ADMIN
        // ============================

        $totalAdmins = User::where('role', 'admin')->count();

        // ============================
        // APPOINTMENT STATISTICS
        // ============================

        $totalAppointments = Appointment::count();

        $pendingAppointments = Appointment::where('status', 'pending')->count();

        $completedAppointments = Appointment::where('status', 'completed')->count();

        $cancelledAppointments = Appointment::where('status', 'cancelled')->count();

        // ============================
        // CLINIC RECORDS
        // ============================

        $totalClinicRecords = ClinicRecord::count();

        // ============================
        // MONTHLY APPOINTMENTS
        // ============================

        $monthlyAppointments = Appointment::select(
                DB::raw('MONTH(appointment_date) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('appointment_date', now()->year)
            ->groupBy(DB::raw('MONTH(appointment_date)'))
            ->orderBy(DB::raw('MONTH(appointment_date)'))
            ->get();

        // ============================
        // MONTH NAMES FOR CHART
        // ============================

        $monthLabels = [];
        $monthData = [];

        for ($month = 1; $month <= 12; $month++) {

            $monthLabels[] = date('F', mktime(0, 0, 0, $month, 1));

            $record = $monthlyAppointments
                ->firstWhere('month', $month);

            $monthData[] = $record ? $record->total : 0;
        }

        // ============================
        // RECENT APPOINTMENTS
        // ============================

        $recentAppointments = Appointment::latest()
            ->take(5)
            ->get();

        // ============================
        // RECENT CLINIC RECORDS
        // ============================

        $recentClinicRecords = ClinicRecord::latest()
            ->take(5)
            ->get();

        // ============================
        // RETURN DASHBOARD
        // ============================

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalStudents',
            'totalNurses',
            'totalAdmins',

            'totalAppointments',
            'pendingAppointments',
            'completedAppointments',
            'cancelledAppointments',

            'totalClinicRecords',

            'monthLabels',
            'monthData',

            'recentAppointments',
            'recentClinicRecords'
        ));
    }
}