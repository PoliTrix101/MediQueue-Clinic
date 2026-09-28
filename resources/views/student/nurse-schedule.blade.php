<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediQueue - Nurse Schedule</title>

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
            transition: .2s;
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

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h2 {
            font-size: 21px;
            color: #111827;
        }

        .page-header p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 6px;
        }

        /* =========================
           NURSE CARDS
        ========================= */

        .nurse-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .nurse-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;

            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nurse-photo {
            width: 58px;
            height: 58px;
            border-radius: 50%;

            background: #eff6ff;
            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
            font-weight: bold;

            overflow: hidden;
            flex-shrink: 0;
        }

        .nurse-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .nurse-info {
            flex: 1;
        }

        .nurse-info h3 {
            font-size: 16px;
            color: #111827;
            margin-bottom: 4px;
        }

        .nurse-position {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        /* =========================
           LIVE STATUS
        ========================= */

        .live-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 5px 9px;
            border-radius: 20px;

            font-size: 11px;
            font-weight: 700;
        }

        .live-status.in {
            background: #dcfce7;
            color: #166534;
        }

        .live-status.out {
            background: #fee2e2;
            color: #991b1b;
        }

        .live-status.busy {
            background: #fef3c7;
            color: #92400e;
        }

        .live-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .in .live-dot {
            background: #22c55e;
        }

        .out .live-dot {
            background: #ef4444;
        }

        .busy .live-dot {
            background: #92400e;
        }

        /* =========================
           CALENDAR PANEL
        ========================= */

        .calendar-panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        .calendar-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .calendar-header h2 {
            font-size: 18px;
            color: #111827;
        }

        .calendar-header p {
            margin-top: 4px;
            color: #6b7280;
            font-size: 13px;
        }

        .view-only {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 7px 11px;
            border-radius: 20px;

            font-size: 11px;
            font-weight: 700;
        }

        /* =========================
           SCHEDULE LIST
        ========================= */

        .schedule-list {
            padding: 20px 25px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .schedule-item {
            border: 1px solid #e5e7eb;
            border-radius: 10px;

            padding: 16px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            transition: .2s;
        }

        .schedule-item:hover {
            background: #f9fafb;
            border-color: #dbeafe;
        }

        .schedule-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .date-icon {
            width: 45px;
            height: 45px;

            background: #eff6ff;
            color: #2563eb;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
        }

        .date-info strong {
            display: block;
            color: #111827;
            font-size: 14px;
        }

        .date-info span {
            display: block;
            margin-top: 4px;

            color: #6b7280;
            font-size: 12px;
        }

        .schedule-right {
            text-align: right;
        }

        /* =========================
           SCHEDULE STATUS
        ========================= */

        .schedule-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 7px 11px;

            border-radius: 20px;

            font-size: 12px;
            font-weight: 700;
        }

        .schedule-status.in {
            background: #dcfce7;
            color: #166534;
        }

        .schedule-status.out {
            background: #fee2e2;
            color: #991b1b;
        }

        .schedule-status .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .schedule-status.in .dot {
            background: #22c55e;
        }

        .schedule-status.out .dot {
            background: #ef4444;
        }

        .nurse-name-small {
            margin-top: 5px;
            color: #9ca3af;
            font-size: 11px;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty h3 {
            color: #374151;
            font-size: 18px;
            margin-bottom: 6px;
        }

        .empty p {
            color: #9ca3af;
            font-size: 13px;
        }

        /* =========================
           LEGEND
        ========================= */

        .legend {
            padding: 18px 25px;
            border-top: 1px solid #e5e7eb;

            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 7px;

            font-size: 12px;
            color: #6b7280;
        }

        .legend-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }

        .legend-green {
            background: #22c55e;
        }

        .legend-red {
            background: #ef4444;
        }

        .legend-brown {
            background: #92400e;
        }

        /* =========================
           MOBILE
        ========================= */

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

            .calendar-header {
                align-items: flex-start;
                gap: 10px;
            }

            .schedule-item {
                align-items: flex-start;
                gap: 15px;
            }

            .schedule-right {
                text-align: left;
            }
        }
    </style>
</head>

<body>

<!-- =========================
     SIDEBAR
========================= -->

<aside class="sidebar">

    <div class="logo">

        <div class="logo-icon">
            M
        </div>

        <div class="logo-text">
            <h2>MediQueue</h2>
            <p>LLCC School Clinic</p>
        </div>

    </div>


    <nav class="menu">

        <a href="{{ route('user.dashboard') }}">
            <span class="menu-icon">🏠</span>
            Dashboard
        </a>

        <a href="{{ route('student.appointments') }}">
            <span class="menu-icon">📅</span>
            Appointments
        </a>

        

        <a href="{{ route('student.history') }}">
            <span class="menu-icon">📁</span>
            History
        </a>

        <a href="{{ route('student.nurse.schedule') }}" class="active">
            <span class="menu-icon">📆</span>
            Nurse Schedule
        </a>

        <a href="{{ route('student.profile') }}">
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


<!-- =========================
     MAIN
========================= -->

<main class="main">


    <!-- =========================
         TOPBAR
    ========================= -->

    <header class="topbar">

        <div>

            <h1>
                Nurse Schedule
            </h1>

            <p>
                View the clinic nurse's availability and schedule.
            </p>

        </div>


        <div class="profile">

            <div class="avatar">

                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

            </div>

            <div class="profile-info">

                <strong>
                    {{ auth()->user()->name ?? 'Student' }}
                </strong>

                <span>
                    Student
                </span>

            </div>

        </div>

    </header>


    <!-- =========================
         CONTENT
    ========================= -->

    <section class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <h2>
                Clinic Nurse Availability
            </h2>

            <p>
                Check when the nurse is scheduled to be available at the school clinic.
            </p>

        </div>


        <!-- =========================
             NURSES
        ========================= -->

        @if($nurses->count() > 0)

            <div class="nurse-grid">

                @foreach($nurses as $nurse)

                    <div class="nurse-card">


                        <!-- PROFILE PHOTO -->

                        <div class="nurse-photo">

                            @if(!empty($nurse->profile_photo))

                                <img
                                    src="{{ asset('storage/' . $nurse->profile_photo) }}"
                                    alt="{{ $nurse->name }}"
                                >

                            @else

                                {{ strtoupper(substr($nurse->name ?? 'N', 0, 1)) }}

                            @endif

                        </div>


                        <!-- NURSE INFO -->

                        <div class="nurse-info">

                            <h3>
                                {{ $nurse->name }}
                            </h3>

                            <div class="nurse-position">

                                {{ $nurse->nurse_position ?? 'School Clinic Nurse' }}

                            </div>


                            <!-- CURRENT LIVE STATUS -->

                            @if($nurse->nurse_status === 'in')

                                <span class="live-status in">

                                    <span class="live-dot"></span>

                                    IN — Available

                                </span>

                            @elseif($nurse->nurse_status === 'busy')

                                <span class="live-status busy">

                                    <span class="live-dot"></span>

                                    BUSY — Attending Student

                                </span>

                            @elseif($nurse->nurse_status === 'out')

                                <span class="live-status out">

                                    <span class="live-dot"></span>

                                    OUT — Unavailable

                                </span>

                            @else

                                <span class="live-status out">

                                    <span class="live-dot"></span>

                                    Unknown

                                </span>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @endif


        <!-- =========================
             CALENDAR PANEL
        ========================= -->

        <div class="calendar-panel">


            <!-- HEADER -->

            <div class="calendar-header">

                <div>

                    <h2>
                        Scheduled Dates
                    </h2>

                    <p>
                        Nurse-controlled clinic availability
                    </p>

                </div>


                <div class="view-only">
                    VIEW ONLY
                </div>

            </div>


            <!-- =========================
                 SCHEDULES
            ========================= -->

            @if($schedules->count() > 0)

                <div class="schedule-list">

                    @foreach($schedules as $schedule)

                        <div class="schedule-item">


                            <!-- DATE -->

                            <div class="schedule-left">

                                <div class="date-icon">
                                    📅
                                </div>


                                <div class="date-info">

                                    <strong>

                                        {{
                                            \Carbon\Carbon::parse(
                                                $schedule->schedule_date
                                            )->format('F d, Y')
                                        }}

                                    </strong>

                                    <span>

                                        {{
                                            \Carbon\Carbon::parse(
                                                $schedule->schedule_date
                                            )->format('l')
                                        }}

                                    </span>

                                </div>

                            </div>


                            <!-- STATUS -->

                            <div class="schedule-right">

                                @if($schedule->status === 'in')

                                    <div class="schedule-status in">

                                        <span class="dot"></span>

                                        IN — Available

                                    </div>

                                @else

                                    <div class="schedule-status out">

                                        <span class="dot"></span>

                                        OUT — Unavailable

                                    </div>

                                @endif


                                <div class="nurse-name-small">

                                    {{ $schedule->nurse_name }}

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty">

                    <div class="empty-icon">
                        📆
                    </div>

                    <h3>
                        No Schedule Available
                    </h3>

                    <p>
                        The clinic nurse has not created a schedule yet.
                    </p>

                </div>

            @endif


            <!-- =========================
                 LEGEND
            ========================= -->

            <div class="legend">

                <div class="legend-item">

                    <span class="legend-dot legend-green"></span>

                    IN — Nurse available

                </div>


                <div class="legend-item">

                    <span class="legend-dot legend-red"></span>

                    OUT — Nurse unavailable

                </div>


                <div class="legend-item">

                    <span class="legend-dot legend-brown"></span>

                    BUSY — Currently attending a student

                </div>

            </div>

        </div>

    </section>

</main>

</body>
</html>