<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediQueue - Student Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f8fc;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 240px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 24px 16px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            overflow-y: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 10px 28px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: #2563eb;
            color: white;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .logo-text h2 {
            color: #1d4ed8;
            font-size: 20px;
        }

        .logo-text span {
            display: block;
            color: #9ca3af;
            font-size: 11px;
            margin-top: 2px;
        }

        .menu-title {
            color: #9ca3af;
            font-size: 11px;
            font-weight: bold;
            padding: 0 12px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 13px;
            margin-bottom: 5px;
            color: #64748b;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .menu a.active {
            background: #eaf3ff;
            color: #2563eb;
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* =========================
           SIDEBAR BOTTOM
        ========================= */

        .sidebar-bottom {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 18px;
        }

        .sidebar-user {
            background: #f7f9fc;
            padding: 13px;
            border-radius: 10px;
            margin-bottom: 9px;
        }

        .sidebar-user strong {
            display: block;
            font-size: 13px;
            color: #293449;
            margin-bottom: 3px;
        }

        .sidebar-user span {
            color: #8a94a6;
            font-size: 11px;
        }

        .logout-btn {
            width: 100%;
            padding: 11px 13px;
            border: none;
            background: #fff1f2;
            color: #dc2626;
            text-align: left;
            border-radius: 9px;
            cursor: pointer;
            font-size: 13px;
        }

        .logout-btn:hover {
            background: #ffe4e6;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 240px;
            flex: 1;
            padding: 30px 34px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .page-title h1 {
            font-size: 26px;
            color: #202938;
            margin-bottom: 6px;
        }

        .page-title p {
            color: #8a94a6;
            font-size: 13px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info strong {
            display: block;
            font-size: 14px;
            color: #293449;
        }

        .profile-info span {
            color: #9ca3af;
            font-size: 11px;
        }

        /* =========================
           WELCOME CARD
        ========================= */

        .welcome-card {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border-radius: 16px;
            padding: 25px 28px;
            margin-bottom: 22px;
            position: relative;
            overflow: hidden;
        }

        .welcome-card::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            right: -50px;
            top: -60px;
        }

        .welcome-card h2 {
            font-size: 21px;
            margin-bottom: 7px;
            position: relative;
            z-index: 1;
        }

        .welcome-card p {
            font-size: 13px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        /* =========================
           STATS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e7edf5;
            border-radius: 14px;
            padding: 19px;
            box-shadow: 0 3px 12px rgba(23, 43, 77, .035);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            background: #eaf3ff;
            color: #2563eb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-label {
            color: #8a94a6;
            font-size: 11px;
        }

        .stat-value {
            color: #293449;
            font-size: 24px;
            font-weight: bold;
        }

        /* =========================
           GRID
        ========================= */

        .content-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border: 1px solid #e7edf5;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(23, 43, 77, .035);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 22px;
            border-bottom: 1px solid #edf1f5;
        }

        .card-header h2 {
            color: #293449;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .card-header p {
            color: #8a94a6;
            font-size: 11px;
        }

        .card-body {
            padding: 21px 22px;
        }

        /* =========================
           APPOINTMENT
        ========================= */

        .appointment-box {
            background: #f8fbff;
            border: 1px solid #e1edff;
            border-radius: 12px;
            padding: 17px;
        }

        .appointment-date {
            color: #2563eb;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .appointment-time {
            color: #293449;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .appointment-reason {
            color: #697586;
            font-size: 12px;
            line-height: 1.5;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            margin-top: 12px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-approved {
            background: #dcfce7;
            color: #15803d;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #dc2626;
        }

        .status-completed {
            background: #dbeafe;
            color: #1d4ed8;
        }

        /* =========================
           QUICK ACTIONS
        ========================= */

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .quick-action {
            text-decoration: none;
            border: 1px solid #e5eaf1;
            border-radius: 10px;
            padding: 14px;
            color: #536174;
            transition: 0.2s;
        }

        .quick-action:hover {
            border-color: #bfdbfe;
            background: #f8fbff;
            color: #2563eb;
        }

        .quick-action-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #eaf3ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 9px;
        }

        .quick-action strong {
            display: block;
            font-size: 12px;
            margin-bottom: 3px;
        }

        .quick-action span {
            display: block;
            font-size: 10px;
            color: #9ca3af;
        }

        /* =========================
           CLINIC INFO
        ========================= */

        .clinic-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .info-item {
            background: #f8fafc;
            border-radius: 10px;
            padding: 14px;
        }

        .info-item strong {
            display: block;
            color: #536174;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .info-item span {
            color: #8a94a6;
            font-size: 11px;
        }

        /* =========================
           NOTICE
        ========================= */

        .notice {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            background: #eff6ff;
            border: 1px solid #dbeafe;
            border-radius: 12px;
            padding: 15px 17px;
            margin-bottom: 22px;
        }

        .notice-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .notice strong {
            display: block;
            color: #1e40af;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .notice p {
            color: #64748b;
            font-size: 11px;
            line-height: 1.5;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1050px) {

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 750px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
            }

            .sidebar-bottom {
                position: static;
                margin-top: 20px;
            }

            .layout {
                display: block;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .topbar {
                gap: 15px;
            }

            .profile-info {
                display: none;
            }

            .clinic-info {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

            .welcome-card {
                padding: 20px;
            }
        }
    </style>

</head>

<body>

<div class="layout">

    <!-- ==========================================
         SIDEBAR
    =========================================== -->

    <aside class="sidebar">

        <div class="logo">

            <div class="logo-icon">
                M
            </div>

            <div class="logo-text">

                <h2>MediQueue</h2>

                <span>
                    LLCC School Clinic
                </span>

            </div>

        </div>


        <div class="menu-title">
            Student Menu
        </div>


        <nav class="menu">

            <!-- Dashboard -->

            <a
                href="{{ route('user.dashboard') }}"
                class="active"
            >

                <span class="menu-icon">
                    ⌂
                </span>

                Dashboard

            </a>


            <!-- Book Appointment -->

            <a href="{{ route('student.appointments.create') }}">

                <span class="menu-icon">
                    ＋
                </span>

                Book Appointment

            </a>


            <!-- My Appointments -->

            <a href="{{ route('student.appointments') }}">

                <span class="menu-icon">
                    ▣
                </span>

                My Appointments

            </a>


            <!-- Medical History -->

            <a href="{{ route('student.history') }}">

                <span class="menu-icon">
                    ▤
                </span>

                Medical History

            </a>


            <!-- My Profile -->

            <a href="{{ route('student.profile') }}">

                <span class="menu-icon">
                    ◉
                </span>

                My Profile

            </a>


            <!-- Nurse Schedule -->

            <a href="{{ route('student.nurse.schedule') }}">

                <span class="menu-icon">
                    🗓
                </span>

                Nurse Schedule

            </a>

        </nav>


        <!-- ==========================================
             SIDEBAR BOTTOM
        =========================================== -->

        <div class="sidebar-bottom">

            <div class="sidebar-user">

                <strong>
                    {{ auth()->user()->name ?? 'Student' }}
                </strong>

                <span>
                    Student Account
                </span>

            </div>


            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >

                    ⇥ &nbsp; Logout

                </button>

            </form>

        </div>

    </aside>


    <!-- ==========================================
         MAIN CONTENT
    =========================================== -->

    <main class="main">


        <!-- ==========================================
             TOPBAR
        =========================================== -->

        <div class="topbar">

            <div class="page-title">

                <h1>
                    Student Dashboard
                </h1>

                <p>
                    Welcome back! Here's your clinic overview.
                </p>

            </div>


            <div class="profile">

                @php

                    $studentName =
                        auth()->user()->name ?? 'Student';

                    $initial =
                        strtoupper(
                            substr(
                                $studentName,
                                0,
                                1
                            )
                        );

                @endphp


                <div class="avatar">

                    @if(
                        isset($student) &&
                        $student->profile_photo
                    )

                        <img
                            src="{{ asset('storage/' . $student->profile_photo) }}"
                            alt="Student Profile"
                        >

                    @else

                        {{ $initial }}

                    @endif

                </div>


                <div class="profile-info">

                    <strong>
                        {{ $studentName }}
                    </strong>

                    <span>
                        Student
                    </span>

                </div>

            </div>

        </div>


        <!-- ==========================================
             WELCOME
        =========================================== -->

        <div class="welcome-card">

            <h2>
                Hello, {{ $student->first_name ?? 'Student' }}! 👋
            </h2>

            <p>
                Manage your clinic appointments,
                medical records, and nurse schedule
                from your dashboard.
            </p>

        </div>


        <!-- ==========================================
             CLINIC NOTICE
        =========================================== -->

        <div class="notice">

            <div class="notice-icon">
                !
            </div>

            <div>

                <strong>
                    Clinic Notice
                </strong>

                <p>
                    Please arrive at the clinic on time for
                    your approved appointment. Check your
                    appointment status regularly for updates.
                </p>

            </div>

        </div>


        <!-- ==========================================
             STATISTICS
        =========================================== -->

        <div class="stats">


            <!-- Appointments -->

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">
                        📅
                    </div>

                    <span class="stat-label">
                        Appointments
                    </span>

                </div>

                <div class="stat-value">

                    {{ $appointments }}

                </div>

            </div>


            <!-- Upcoming Appointment -->

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">
                        🗓
                    </div>

                    <span class="stat-label">
                        Upcoming
                    </span>

                </div>

                <div class="stat-value">

                    @if($appointment)
                        1
                    @else
                        0
                    @endif

                </div>

            </div>


        </div>


        <!-- ==========================================
             UPCOMING APPOINTMENT + CLINIC INFO
        =========================================== -->

        <div class="content-grid">


            <!-- UPCOMING APPOINTMENT -->

            <div class="card">

                <div class="card-header">

                    <h2>
                        Upcoming Appointment
                    </h2>

                    <p>
                        Your nearest scheduled clinic visit.
                    </p>

                </div>


                <div class="card-body">

                    @if($appointment)

                        <div class="appointment-box">

                            <div class="appointment-date">

                                {{ \Carbon\Carbon::parse(
                                    $appointment->appointment_date
                                )->format('F d, Y') }}

                            </div>


                            <div class="appointment-time">

                                {{ \Carbon\Carbon::parse(
                                    $appointment->appointment_time
                                )->format('h:i A') }}

                            </div>


                            <div class="appointment-reason">

                                <strong>
                                    Reason:
                                </strong>

                                {{ $appointment->reason ?? 'Clinic consultation' }}

                            </div>


                            @if(
                                $appointment->status === 'pending'
                            )

                                <span class="status-badge status-pending">
                                    PENDING
                                </span>

                            @elseif(
                                $appointment->status === 'approved'
                            )

                                <span class="status-badge status-approved">
                                    APPROVED
                                </span>

                            @elseif(
                                $appointment->status === 'cancelled'
                            )

                                <span class="status-badge status-cancelled">
                                    CANCELLED
                                </span>

                            @elseif(
                                $appointment->status === 'completed'
                            )

                                <span class="status-badge status-completed">
                                    COMPLETED
                                </span>

                            @else

                                <span class="status-badge status-pending">
                                    {{ strtoupper($appointment->status) }}
                                </span>

                            @endif

                        </div>

                    @else

                        <div class="queue-empty">

                            📅

                            <br><br>

                            You don't have an upcoming appointment.

                        </div>

                    @endif

                </div>

            </div>


            <!-- CLINIC INFORMATION -->

            <div class="card">

                <div class="card-header">

                    <h2>
                        Clinic Information
                    </h2>

                    <p>
                        Lapu-Lapu City College School Clinic.
                    </p>

                </div>


                <div class="card-body">

                    <div class="clinic-info">


                        <div class="info-item">

                            <strong>
                                🏥 Location
                            </strong>

                            <span>
                                LLCC School Clinic
                            </span>

                        </div>


                        <div class="info-item">

                            <strong>
                                🕐 Clinic Hours
                            </strong>

                            <span>
                                Monday - Friday
                            </span>

                        </div>


                        <div class="info-item">

                            <strong>
                                📞 Contact
                            </strong>

                            <span>
                                School Clinic
                            </span>

                        </div>


                    </div>

                </div>

            </div>


        </div>


        <!-- ==========================================
             QUICK ACTIONS
        =========================================== -->

        <div class="card">

            <div class="card-header">

                <h2>
                    Quick Actions
                </h2>

                <p>
                    Frequently used clinic features.
                </p>

            </div>


            <div class="card-body">

                <div class="quick-actions">


                    <!-- Book Appointment -->

                    <a
                        href="{{ route('student.appointments.create') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            ＋
                        </div>

                        <strong>
                            Book Appointment
                        </strong>

                        <span>
                            Schedule a clinic visit
                        </span>

                    </a>


                    <!-- My Appointments -->

                    <a
                        href="{{ route('student.appointments') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            📅
                        </div>

                        <strong>
                            My Appointments
                        </strong>

                        <span>
                            View appointment requests
                        </span>

                    </a>


                    <!-- Medical History -->

                    <a
                        href="{{ route('student.history') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            ▤
                        </div>

                        <strong>
                            Medical History
                        </strong>

                        <span>
                            View previous consultations
                        </span>

                    </a>


                    <!-- Nurse Schedule -->

                    <a
                        href="{{ route('student.nurse.schedule') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            🗓
                        </div>

                        <strong>
                            Nurse Schedule
                        </strong>

                        <span>
                            Check nurse availability
                        </span>

                    </a>


                    <!-- My Profile -->

                    <a
                        href="{{ route('student.profile') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            ◉
                        </div>

                        <strong>
                            My Profile
                        </strong>

                        <span>
                            Manage your information
                        </span>

                    </a>

                </div>

            </div>

        </div>


    </main>

</div>

</body>

</html>