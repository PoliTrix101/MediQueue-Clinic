
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediQueue - Nurse Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 25px 18px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 10px 30px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: #2563eb;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .logo h2 {
            color: #1d4ed8;
            font-size: 20px;
        }

        .logo span {
            display: block;
            font-size: 11px;
            color: #9ca3af;
            margin-top: 2px;
        }

        .menu-title {
            font-size: 11px;
            color: #9ca3af;
            text-transform: uppercase;
            margin: 10px 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            margin: 5px 0;
            border-radius: 8px;
            text-decoration: none;
            color: #6b7280;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout button {
            width: 100%;
            border: none;
            background: #fff1f2;
            color: #dc2626;
            padding: 11px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: #ffe4e6;
        }

        /* MAIN */

        .main {
            margin-left: 240px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 26px;
            margin-bottom: 6px;
        }

        .welcome p {
            color: #6b7280;
            font-size: 14px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .profile-info strong {
            display: block;
            font-size: 14px;
        }

        .profile-info span {
            font-size: 12px;
            color: #9ca3af;
        }

        /* CARDS */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e5e7eb;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-title {
            color: #6b7280;
            font-size: 13px;
        }

        .card-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-number {
            font-size: 28px;
            font-weight: bold;
            color: #111827;
        }

        .card-sub {
            margin-top: 5px;
            font-size: 12px;
            color: #9ca3af;
        }

        /* CONTENT */

        .content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 22px;
        }

        .panel-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .panel-title h3 {
            font-size: 17px;
        }

        .panel-title a {
            color: #2563eb;
            text-decoration: none;
            font-size: 13px;
        }

        .panel-title a:hover {
            text-decoration: underline;
        }

        /* TABLE */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 12px;
            background: #f8fafc;
            color: #6b7280;
            font-size: 12px;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 13px;
        }

        .status {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .waiting {
            background: #fef3c7;
            color: #92400e;
        }

        .in-consultation {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .completed {
            background: #dcfce7;
            color: #15803d;
        }

        .cancelled {
            background: #fee2e2;
            color: #b91c1c;
        }

        .action-btn {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 7px;
            text-decoration: none;
            background: #2563eb;
            color: white;
            font-size: 11px;
            font-weight: 600;
        }

        .action-btn:hover {
            background: #1d4ed8;
        }

        /* QUICK ACTIONS */

        .quick-actions {
            display: grid;
            gap: 10px;
        }

        .quick-action {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px;
            background: #f8fafc;
            border-radius: 8px;
            text-decoration: none;
            color: #374151;
            font-size: 13px;
            transition: 0.2s;
        }

        .quick-action:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .quick-icon {
            width: 34px;
            height: 34px;
            background: #dbeafe;
            color: #2563eb;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* NOTICE */

        .clinic-notice {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 20px;
            color: #1e40af;
            font-size: 13px;
        }

        .clinic-notice strong {
            display: block;
            margin-bottom: 4px;
        }

        /* EMPTY */

        .empty-state {
            text-align: center;
            padding: 25px 10px;
            color: #9ca3af;
            font-size: 13px;
        }

        /* MOBILE */

        @media (max-width: 1000px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .logout {
                position: static;
                margin-top: 20px;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
            }

            .profile-info {
                display: none;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->

<aside class="sidebar">

    <div class="logo">

        <div class="logo-icon">
            M
        </div>

        <div>
            <h2>MediQueue</h2>

            <span>
                LLCC School Clinic
            </span>
        </div>

    </div>

    <div class="menu-title">
        Nurse Menu
    </div>

    <nav class="menu">

    <a href="{{ route('nurse.dashboard') }}">
        🏠 Dashboard
    </a>

    <a href="{{ route('nurse.queue') }}">
        🎫 Queue
    </a>

    <a href="{{ route('nurse.students') }}">
        👨‍🎓 Students
    </a>

    <a href="{{ route('nurse.appointments') }}">
        📅 Appointments
    </a>

    <a href="{{ route('nurse.consultations') }}">
        🩺 Consultations
    </a>

    <a href="{{ route('nurse.clinic.records') }}">
        📋 Clinic Records
    </a>

    <!-- CALENDAR -->
    <a href="{{ route('nurse.schedule') }}">
        🗓️ Calendar
    </a>

    <a href="{{ route('nurse.profile') }}">
        👤 Profile
    </a>

</nav>

    <!-- LOGOUT -->

    <div class="logout">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit">
                ⇥ &nbsp; Logout
            </button>

        </form>

    </div>

</aside>


<!-- MAIN -->

<main class="main">

    <!-- TOP BAR -->

    <div class="topbar">

        <div class="welcome">

            <h1>
                Nurse Dashboard
            </h1>

            <p>
                Welcome, Nurse! Here's what's happening in the clinic today.
            </p>

        </div>

        <div class="profile">

            <div class="avatar">
                N
            </div>

            <div class="profile-info">

                <strong>
                    Nurse
                </strong>

                <span>
                    School Clinic Nurse
                </span>

            </div>

        </div>

    </div>


    <!-- CLINIC NOTICE -->

    <div class="clinic-notice">

        <strong>
            🏥 Lapu-Lapu City College School Clinic
        </strong>

        Manage student appointments, queue, consultations,
        and clinic activities from this dashboard.

    </div>


    <!-- STATISTICS -->

    <section class="cards">

        <!-- WAITING -->

        <div class="card">

            <div class="card-header">

                <span class="card-title">
                    Waiting Students
                </span>

                <div class="card-icon">
                    👥
                </div>

            </div>

            <div class="card-number">
                {{ $waitingStudents }}
            </div>

            <div class="card-sub">
                Students waiting for consultation
            </div>

        </div>


        <!-- TODAY -->

        <div class="card">

            <div class="card-header">

                <span class="card-title">
                    Today's Appointments
                </span>

                <div class="card-icon">
                    📅
                </div>

            </div>

            <div class="card-number">
                {{ $todayAppointmentsCount }}
            </div>

            <div class="card-sub">
                Scheduled for today
            </div>

        </div>


        <!-- CONSULTATION -->

        <div class="card">

            <div class="card-header">

                <span class="card-title">
                    In Consultation
                </span>

                <div class="card-icon">
                    🩺
                </div>

            </div>

            <div class="card-number">
                {{ $inConsultation }}
            </div>

            <div class="card-sub">
                Currently being attended
            </div>

        </div>


        <!-- COMPLETED -->

        <div class="card">

            <div class="card-header">

                <span class="card-title">
                    Completed
                </span>

                <div class="card-icon">
                    ✓
                </div>

            </div>

            <div class="card-number">
                {{ $completed }}
            </div>

            <div class="card-sub">
                Completed appointments
            </div>

        </div>

    </section>


    <!-- LOWER CONTENT -->

    <section class="content">

        <!-- TODAY'S QUEUE -->

        <div class="panel">

            <div class="panel-title">

                <h3>
                    Today's Queue
                </h3>

                <a href="{{ route('nurse.queue') }}">
                    View All
                </a>

            </div>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Student</th>
                            <th>Student ID</th>
                            <th>Time</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($todayAppointments as $appointment)

                            @php

                                $status = strtolower(
                                    $appointment->status ?? 'pending'
                                );

                                $statusClass = match($status) {

                                    'pending' => 'waiting',

                                    'waiting' => 'waiting',

                                    'in_consultation' => 'in-consultation',

                                    'completed' => 'completed',

                                    'cancelled' => 'cancelled',

                                    default => 'waiting'

                                };

                                $statusLabel = match($status) {

                                    'pending' => 'Waiting',

                                    'waiting' => 'Waiting',

                                    'in_consultation' => 'In Consultation',

                                    'completed' => 'Completed',

                                    'cancelled' => 'Cancelled',

                                    default => ucfirst(
                                        str_replace('_', ' ', $status)
                                    )

                                };

                            @endphp

                            <tr>

                                <td>
                                    <strong>
                                        {{ $appointment->first_name ?? 'Student' }}
                                        {{ $appointment->last_name ?? '' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $appointment->student_number ?? 'N/A' }}
                                </td>

                                <td>

                                    @if($appointment->appointment_time)

                                        {{ date(
                                            'h:i A',
                                            strtotime($appointment->appointment_time)
                                        ) }}

                                    @else

                                        N/A

                                    @endif

                                </td>

                                <td>
                                    {{ $appointment->reason ?? 'No reason provided' }}
                                </td>

                                <td>

                                    <span class="status {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>

                                </td>

                                <td>

                                    @if($status === 'pending' || $status === 'waiting')

                                        <a
                                            href="{{ route('nurse.consultation', $appointment->id) }}"
                                            class="action-btn"
                                        >
                                            Consult
                                        </a>

                                    @elseif($status === 'in_consultation')

                                        <a
                                            href="{{ route('nurse.consultation', $appointment->id) }}"
                                            class="action-btn"
                                        >
                                            Continue
                                        </a>

                                    @elseif($status === 'completed')

                                        <a
                                            href="{{ route('nurse.clinic.records') }}"
                                            class="action-btn"
                                        >
                                            Record
                                        </a>

                                    @else

                                        <a
                                            href="{{ route('nurse.queue') }}"
                                            class="action-btn"
                                        >
                                            Open
                                        </a>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6">

                                    <div class="empty-state">
                                        No appointments scheduled for today.
                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- QUICK ACTIONS -->

        <div class="panel">

            <div class="panel-title">

                <h3>
                    Quick Actions
                </h3>

            </div>

            <div class="quick-actions">

                <!-- MANAGE QUEUE -->

                <a
                    href="{{ route('nurse.queue') }}"
                    class="quick-action"
                >

                    <div class="quick-icon">
                        🎫
                    </div>

                    <span>
                        Manage Queue
                    </span>

                </a>


                <!-- VIEW STUDENTS -->

                <a
                    href="{{ route('nurse.students') }}"
                    class="quick-action"
                >

                    <div class="quick-icon">
                        👨‍🎓
                    </div>

                    <span>
                        View Students
                    </span>

                </a>


                <!-- START CONSULTATION -->

                <a
                    href="{{ route('nurse.consultations') }}"
                    class="quick-action"
                >

                    <div class="quick-icon">
                        🩺
                    </div>

                    <span>
                        Start Consultation
                    </span>

                </a>


                <!-- CLINIC RECORDS -->

                <a
                    href="{{ route('nurse.clinic.records') }}"
                    class="quick-action"
                >

                    <div class="quick-icon">
                        📁
                    </div>

                    <span>
                        Clinic Records
                    </span>

                </a>

            </div>

        </div>


        <!-- CLINIC INFORMATION -->

        <div class="panel">

            <div class="panel-title">

                <h3>
                    Clinic Information
                </h3>

            </div>

            <div class="quick-actions">

                <div class="quick-action">

                    <div class="quick-icon">
                        🏥
                    </div>

                    <span>
                        Lapu-Lapu City College School Clinic
                    </span>

                </div>

                <div class="quick-action">

                    <div class="quick-icon">
                        🕐
                    </div>

                    <span>
                        Clinic Hours: 8:00 AM – 5:00 PM
                    </span>

                </div>

                <div class="quick-action">

                    <div class="quick-icon">
                        ℹ
                    </div>

                    <span>
                        Manage student clinic appointments and queue.
                    </span>

                </div>

            </div>

        </div>

    </section>

</main>

</body>
</html>

