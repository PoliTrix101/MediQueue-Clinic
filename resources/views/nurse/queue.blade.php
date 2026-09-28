<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>MediQueue - Clinic Queue</title>

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

    /* =========================
       SIDEBAR
    ========================= */

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 240px;
        height: 100vh;
        background: white;
        border-right: 1px solid #e5e7eb;
        padding: 25px 15px;
        z-index: 1000;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0 10px;
        margin-bottom: 35px;
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
        font-weight: bold;
        font-size: 20px;
    }

    .logo-text h2 {
        font-size: 18px;
        color: #111827;
    }

    .logo-text p {
        font-size: 11px;
        color: #6b7280;
        margin-top: 2px;
    }

    .menu {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .menu a {
        text-decoration: none;
        color: #6b7280;
        padding: 12px 14px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
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
        font-size: 16px;
    }

    /* =========================
       LOGOUT
    ========================= */

    .logout {
        margin-top: auto;
        position: absolute;
        bottom: 25px;
        left: 15px;
        right: 15px;
    }

    .logout button {
        width: 100%;
        border: none;
        background: transparent;
        color: #6b7280;
        padding: 12px 14px;
        border-radius: 8px;
        text-align: left;
        cursor: pointer;
        font-size: 14px;
    }

    .logout button:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    /* =========================
       MAIN
    ========================= */

    .main {
        margin-left: 240px;
        min-height: 100vh;
    }

    /* =========================
       TOPBAR
    ========================= */

    .topbar {
        background: white;
        border-bottom: 1px solid #e5e7eb;
        padding: 20px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .topbar h1 {
        font-size: 24px;
        color: #111827;
        margin-bottom: 5px;
    }

    .topbar p {
        color: #6b7280;
        font-size: 14px;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #2563eb;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .profile-info strong {
        display: block;
        font-size: 14px;
        color: #111827;
    }

    .profile-info span {
        font-size: 12px;
        color: #6b7280;
    }

    /* =========================
       CONTENT
    ========================= */

    .content {
        padding: 30px;
    }

    /* =========================
       NOTICE
    ========================= */

    .notice {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 12px;
        padding: 18px 20px;
        margin-bottom: 25px;
    }

    .notice h3 {
        color: #1d4ed8;
        font-size: 15px;
        margin-bottom: 5px;
    }

    .notice p {
        color: #4b5563;
        font-size: 13px;
    }

    /* =========================
       STATISTICS
    ========================= */

    .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
    }

    .stat-card p {
        font-size: 13px;
        color: #6b7280;
        margin-bottom: 8px;
    }

    .stat-card h2 {
        font-size: 28px;
        color: #111827;
    }

    /* =========================
       PANEL
    ========================= */

    .panel {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    .panel-header {
        padding: 20px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .panel-header h2 {
        font-size: 17px;
        color: #111827;
    }

    .panel-header p {
        font-size: 13px;
        color: #6b7280;
        margin-top: 4px;
    }

    .current-date {
        font-size: 13px;
        color: #6b7280;
        font-weight: 600;
    }

    /* =========================
       TABLE
    ========================= */

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #f9fafb;
        color: #6b7280;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        text-align: left;
        padding: 14px 18px;
        border-bottom: 1px solid #e5e7eb;
    }

    td {
        padding: 16px 18px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
        color: #374151;
        vertical-align: middle;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover {
        background: #f9fafb;
    }

    .student-name {
        font-weight: 600;
        color: #111827;
    }

    .student-id {
        font-size: 12px;
        color: #6b7280;
    }

    .reason {
        max-width: 250px;
    }

    /* =========================
       STATUS
    ========================= */

    .status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status.waiting {
        background: #fef3c7;
        color: #92400e;
    }

    .status.consultation {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .status.completed {
        background: #dcfce7;
        color: #166534;
    }

    .status.cancelled {
        background: #fee2e2;
        color: #991b1b;
    }

    .status.pending {
        background: #fef3c7;
        color: #92400e;
    }

    /* =========================
       ACTION BUTTONS
    ========================= */

    .action-btn {
        display: inline-block;
        text-decoration: none;
        background: #2563eb;
        color: white;
        padding: 8px 14px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        transition: 0.2s;
    }

    .action-btn:hover {
        background: #1d4ed8;
    }

    .action-btn.open {
        background: #0ea5e9;
    }

    .action-btn.open:hover {
        background: #0284c7;
    }

    .action-btn.view {
        background: #6b7280;
    }

    .action-btn.view:hover {
        background: #4b5563;
    }

    /* =========================
       EMPTY STATE
    ========================= */

    .empty {
        text-align: center;
        padding: 50px 20px;
    }

    .empty-icon {
        font-size: 40px;
        margin-bottom: 12px;
    }

    .empty h3 {
        font-size: 17px;
        color: #374151;
        margin-bottom: 5px;
    }

    .empty p {
        color: #9ca3af;
        font-size: 13px;
    }

    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 900px) {

        .sidebar {
            width: 200px;
        }

        .main {
            margin-left: 200px;
        }

        .stats {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {

        .sidebar {
            position: relative;
            width: 100%;
            height: auto;
            border-right: none;
            border-bottom: 1px solid #e5e7eb;
        }

        .main {
            margin-left: 0;
        }

        .logout {
            position: static;
            margin-top: 20px;
        }

        .topbar {
            padding: 20px;
        }

        .content {
            padding: 20px;
        }

        .profile-info {
            display: none;
        }

        .stats {
            grid-template-columns: 1fr;
        }
    }
</style>
```

</head>

<body>

```
<!-- ==========================================
     SIDEBAR
=========================================== -->

<aside class="sidebar">

    <div class="logo">

        <div class="logo-icon">
            M
        </div>

        <div class="logo-text">

            <h2>
                MediQueue
            </h2>

            <p>
                LLCC School Clinic
            </p>

        </div>

    </div>


    <nav class="menu">

        <!-- DASHBOARD -->

        <a href="{{ route('nurse.dashboard') }}">

            <span class="menu-icon">
                🏠
            </span>

            Dashboard

        </a>


        <!-- QUEUE -->

        <a
            href="{{ route('nurse.queue') }}"
            class="active"
        >

            <span class="menu-icon">
                📋
            </span>

            Queue

        </a>


        <!-- STUDENTS -->

        <a href="{{ route('nurse.students') }}">

            <span class="menu-icon">
                👨‍🎓
            </span>

            Students

        </a>


        <!-- APPOINTMENTS -->

        <a href="{{ route('nurse.appointments') }}">

            <span class="menu-icon">
                📅
            </span>

            Appointments

        </a>


        <!-- CONSULTATION -->

        <a href="{{ route('nurse.consultations') }}">

            <span class="menu-icon">
                🩺
            </span>

            Consultation

        </a>


        <!-- CLINIC RECORDS -->

        <a href="{{ route('nurse.clinic.records') }}">

            <span class="menu-icon">
                📁
            </span>

            Clinic Records

        </a>


        <!-- CALENDAR -->

        <a href="{{ route('nurse.schedule') }}">

            <span class="menu-icon">
                📆
            </span>

            Calendar

        </a>


        <!-- PROFILE -->

        <a href="{{ route('nurse.profile') }}">

            <span class="menu-icon">
                👤
            </span>

            Profile

        </a>

    </nav>


    <!-- LOGOUT -->

    <div class="logout">

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button type="submit">

                🚪 &nbsp; Logout

            </button>

        </form>

    </div>

</aside>


<!-- ==========================================
     MAIN
=========================================== -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">

        <div>

            <h1>
                Clinic Queue
            </h1>

            <p>
                Manage today's student queue and appointments.
            </p>

        </div>


        <div class="profile">

            <div class="avatar">

                {{ strtoupper(
                    substr(
                        auth()->user()->name ?? 'N',
                        0,
                        1
                    )
                ) }}

            </div>

            <div class="profile-info">

                <strong>

                    {{ auth()->user()->name ?? 'Nurse' }}

                </strong>

                <span>
                    School Clinic Nurse
                </span>

            </div>

        </div>

    </header>


    <!-- ==========================================
         CONTENT
    =========================================== -->

    <section class="content">


        <!-- NOTICE -->

        <div class="notice">

            <h3>
                🏥 LLCC School Clinic
            </h3>

            <p>
                Review upcoming appointments and manage students waiting
                for consultation.
            </p>

        </div>


        <!-- ======================================
             STATISTICS
        ======================================= -->

        <div class="stats">


            <!-- TOTAL -->

            <div class="stat-card">

                <p>
                    Total Appointments
                </p>

                <h2>
                    {{ $appointments->count() }}
                </h2>

            </div>


            <!-- WAITING -->

            <div class="stat-card">

                <p>
                    Waiting
                </p>

                <h2>
                    {{ $appointments->where('status', 'pending')->count() }}
                </h2>

            </div>


            <!-- COMPLETED -->

            <div class="stat-card">

                <p>
                    Completed
                </p>

                <h2>
                    {{ $appointments->where('status', 'completed')->count() }}
                </h2>

            </div>

        </div>


        <!-- ======================================
             QUEUE TABLE
        ======================================= -->

        <div class="panel">


            <!-- PANEL HEADER -->

            <div class="panel-header">

                <div>

                    <h2>
                        Appointment Queue
                    </h2>

                    <p>
                        Today's and upcoming student appointments
                    </p>

                </div>


                <div class="current-date">

                    {{ now()->format('F d, Y') }}

                </div>

            </div>


            <!-- TABLE -->

            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Student
                            </th>

                            <th>
                                Student ID
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Time
                            </th>

                            <th>
                                Reason
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($appointments as $index => $appointment)

                            <tr>


                                <!-- NUMBER -->

                                <td>

                                    {{ $index + 1 }}

                                </td>


                                <!-- STUDENT -->

                                <td>

                                    <div class="student-name">

                                        @if(
                                            !empty($appointment->first_name)
                                            ||
                                            !empty($appointment->last_name)
                                        )

                                            {{ $appointment->first_name }}
                                            {{ $appointment->last_name }}

                                        @else

                                            Student #{{ $appointment->student_id }}

                                        @endif

                                    </div>

                                </td>


                                <!-- STUDENT ID -->

                                <td>

                                    <div class="student-id">

                                        {{
                                            $appointment->student_number
                                            ??
                                            $appointment->student_id
                                        }}

                                    </div>

                                </td>


                                <!-- DATE -->

                                <td>

                                    {{
                                        \Carbon\Carbon::parse(
                                            $appointment->appointment_date
                                        )->format('M d, Y')
                                    }}

                                </td>


                                <!-- TIME -->

                                <td>

                                    {{
                                        \Carbon\Carbon::parse(
                                            $appointment->appointment_time
                                        )->format('h:i A')
                                    }}

                                </td>


                                <!-- REASON -->

                                <td class="reason">

                                    {{ $appointment->reason }}

                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if($appointment->status === 'pending')

                                        <span class="status waiting">
                                            Waiting
                                        </span>

                                    @elseif($appointment->status === 'in_consultation')

                                        <span class="status consultation">
                                            In Consultation
                                        </span>

                                    @elseif($appointment->status === 'completed')

                                        <span class="status completed">
                                            Completed
                                        </span>

                                    @elseif($appointment->status === 'cancelled')

                                        <span class="status cancelled">
                                            Cancelled
                                        </span>

                                    @else

                                        <span class="status pending">

                                            {{ ucfirst($appointment->status) }}

                                        </span>

                                    @endif

                                </td>


                                <!-- ACTION -->

                                <td>

                                    @if($appointment->status === 'pending')

                                        <a
                                            href="{{ route('nurse.consultation', $appointment->id) }}"
                                            class="action-btn"
                                        >
                                            Consult
                                        </a>

                                    @elseif($appointment->status === 'in_consultation')

                                        <a
                                            href="{{ route('nurse.consultation', $appointment->id) }}"
                                            class="action-btn open"
                                        >
                                            Open
                                        </a>

                                    @elseif($appointment->status === 'completed')

                                        <a
                                            href="{{ route('nurse.consultation', $appointment->id) }}"
                                            class="action-btn view"
                                        >
                                            View
                                        </a>

                                    @elseif($appointment->status === 'cancelled')

                                        <span style="color:#9ca3af;">
                                            —
                                        </span>

                                    @else

                                        <span style="color:#9ca3af;">
                                            —
                                        </span>

                                    @endif

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="8">

                                    <div class="empty">

                                        <div class="empty-icon">
                                            📋
                                        </div>

                                        <h3>
                                            No appointments found
                                        </h3>

                                        <p>
                                            There are no upcoming appointments
                                            in the queue.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</main>


</body>
</html>
