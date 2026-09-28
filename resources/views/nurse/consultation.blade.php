<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediQueue - Consultation</title>

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

        /* MAIN */
        .main {
            margin-left: 240px;
            min-height: 100vh;
        }

        /* TOPBAR */
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
        }

        .profile-info span {
            font-size: 12px;
            color: #6b7280;
        }

        /* CONTENT */
        .content {
            padding: 30px;
        }

        /* HEADER */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-header h2 {
            font-size: 20px;
            color: #111827;
        }

        .page-header p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 5px;
        }

        /* ALERT */
        .alert {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        /* TABLE */
        .table-container {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th {
            text-align: left;
            padding: 15px 18px;
            font-size: 13px;
            color: #6b7280;
            font-weight: 600;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 16px 18px;
            font-size: 14px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .student-name {
            font-weight: 600;
            color: #111827;
        }

        .student-number {
            font-size: 12px;
            color: #6b7280;
            margin-top: 3px;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-waiting {
            background: #fef3c7;
            color: #92400e;
        }

        .status-consulting {
            background: #dbeafe;
            color: #1d4ed8;
        }

        /* BUTTON */
        .consult-btn {
            display: inline-block;
            padding: 8px 14px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
        }

        .consult-btn:hover {
            background: #1d4ed8;
        }

        /* EMPTY STATE */
        .empty-state {
            padding: 60px 30px;
            text-align: center;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            color: #111827;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #6b7280;
            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 850px;
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

            .content {
                padding: 20px;
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
        <div class="logo-icon">M</div>

        <div class="logo-text">
            <h2>MediQueue</h2>
            <p>LLCC School Clinic</p>
        </div>
    </div>

    <nav class="menu">

        <a href="{{ route('nurse.dashboard') }}">
            <span class="menu-icon">🏠</span>
            Dashboard
        </a>

        <a href="{{ route('nurse.queue') }}">
            <span class="menu-icon">📋</span>
            Queue
        </a>

        <a href="{{ route('nurse.students') }}">
            <span class="menu-icon">👨‍🎓</span>
            Students
        </a>

        <a href="{{ route('nurse.appointments') }}">
            <span class="menu-icon">📅</span>
            Appointments
        </a>

        <!-- ACTIVE: CONSULTATION -->
        <a href="{{ route('nurse.consultations') }}" class="active">
            <span class="menu-icon">🩺</span>
            Consultation
        </a>

        <a href="{{ route('nurse.clinic.records') }}">
            <span class="menu-icon">📁</span>
            Clinic Records
        </a>

        <!-- CALENDAR -->
        <a href="{{ route('nurse.schedule') }}">
            <span class="menu-icon">📆</span>
            Calendar
        </a>

        <a href="{{ route('nurse.profile') }}">
            <span class="menu-icon">👤</span>
            Profile
        </a>

    </nav>

    <!-- LOGOUT -->
    <div class="logout">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit">
                🚪 &nbsp; Logout
            </button>

        </form>

    </div>

</aside>


<!-- MAIN -->
<main class="main">

    <!-- TOPBAR -->
    <header class="topbar">

        <div>
            <h1>Consultation</h1>
            <p>Manage students who are ready for consultation.</p>
        </div>

        <div class="profile">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'N', 0, 1)) }}
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


    <!-- CONTENT -->
    <section class="content">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        <div class="page-header">

            <div>

                <h2>
                    Students for Consultation
                </h2>

                <p>
                    Students with pending or ongoing consultations are shown below.
                </p>

            </div>

        </div>


        <div class="table-container">

            @if($appointments->count() > 0)

                <table>

                    <thead>

                        <tr>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($appointments as $appointment)

                            <tr>

                                <!-- STUDENT -->
                                <td>

                                    <div class="student-name">
                                        {{ $appointment->first_name }}
                                        {{ $appointment->last_name }}
                                    </div>

                                    <div class="student-number">
                                        {{ $appointment->student_number }}
                                    </div>

                                </td>


                                <!-- COURSE -->
                                <td>
                                    {{ $appointment->course ?? 'N/A' }}
                                </td>


                                <!-- YEAR -->
                                <td>
                                    {{ $appointment->year_level ?? 'N/A' }}
                                </td>


                                <!-- DATE -->
                                <td>
                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                </td>


                                <!-- TIME -->
                                <td>
                                    {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                </td>


                                <!-- REASON -->
                                <td>
                                    {{ $appointment->reason ?? 'No reason provided' }}
                                </td>


                                <!-- STATUS -->
                                <td>

                                    @if($appointment->status === 'pending')

                                        <span class="status status-waiting">
                                            Waiting
                                        </span>

                                    @elseif($appointment->status === 'in_consultation')

                                        <span class="status status-consulting">
                                            In Consultation
                                        </span>

                                    @else

                                        <span class="status">
                                            {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                                        </span>

                                    @endif

                                </td>


                                <!-- ACTION -->
                                <td>

                                    <a
                                        href="{{ route('nurse.consultation', $appointment->id) }}"
                                        class="consult-btn"
                                    >

                                        @if($appointment->status === 'in_consultation')
                                            Continue
                                        @else
                                            Consult
                                        @endif

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        🩺
                    </div>

                    <h3>
                        No Students for Consultation
                    </h3>

                    <p>
                        There are currently no pending or ongoing consultations.
                    </p>

                </div>

            @endif

        </div>

    </section>

</main>

</body>
</html>