<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History - MediQueue</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f5f8fc;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #fff;
            border-right: 1px solid #e7edf5;
            padding: 24px 16px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 12px 28px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: #0d6efd;
            color: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
        }

        .logo-text h2 {
            color: #0d6efd;
            font-size: 20px;
        }

        .logo-text span {
            display: block;
            color: #8a94a6;
            font-size: 11px;
            margin-top: 2px;
        }

        .menu-title {
            color: #9aa4b2;
            font-size: 11px;
            font-weight: bold;
            padding: 0 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 6px;
            color: #607087;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: #eaf3ff;
            color: #0d6efd;
        }

        .menu a.active {
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
        }

        .sidebar-bottom {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 20px;
        }

        .sidebar-user {
            background: #f7f9fc;
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .sidebar-user strong {
            display: block;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .sidebar-user span {
            color: #8a94a6;
            font-size: 11px;
        }

        .logout-btn {
            width: 100%;
            padding: 11px 14px;
            border: none;
            background: transparent;
            color: #e05252;
            text-align: left;
            border-radius: 10px;
            cursor: pointer;
            font-size: 13px;
        }

        .main {
            margin-left: 250px;
            flex: 1;
            padding: 28px 34px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .page-title h1 {
            font-size: 25px;
            color: #202938;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #8a94a6;
            font-size: 13px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #dfeaff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(23, 43, 77, .04);
            overflow: hidden;
        }

        .card-header {
            padding: 22px 25px;
            border-bottom: 1px solid #edf1f5;
        }

        .card-header h2 {
            font-size: 17px;
            color: #293449;
            margin-bottom: 4px;
        }

        .card-header p {
            color: #8a94a6;
            font-size: 12px;
        }

        .record {
            padding: 22px 25px;
            border-bottom: 1px solid #edf1f5;
        }

        .record:last-child {
            border-bottom: none;
        }

        .record-top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .record-date {
            color: #0d6efd;
            font-size: 12px;
            font-weight: 700;
        }

        .record-service {
            color: #293449;
            font-size: 15px;
            font-weight: 600;
            margin-top: 5px;
        }

        .record-section {
            margin-top: 14px;
        }

        .record-section strong {
            display: block;
            color: #687487;
            font-size: 11px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .record-section p {
            color: #596579;
            font-size: 13px;
            line-height: 1.6;
        }

        .empty {
            text-align: center;
            padding: 60px 25px;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            background: #eaf3ff;
            color: #0d6efd;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 28px;
        }

        .empty h2 {
            font-size: 18px;
            color: #293449;
            margin-bottom: 7px;
        }

        .empty p {
            max-width: 420px;
            margin: auto;
            color: #8a94a6;
            font-size: 12px;
            line-height: 1.6;
        }

        @media (max-width: 750px) {
            .sidebar {
                position: relative;
                width: 100%;
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
        }
    </style>
</head>

<body>

<div class="layout">

    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">M</div>

            <div class="logo-text">
                <h2>MediQueue</h2>
                <span>LLCC School Clinic</span>
            </div>
        </div>

        <div class="menu-title">Student Menu</div>

        <nav class="menu">

            <a href="{{ route('user.dashboard') }}">
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>

            <a href="{{ route('student.appointments.create') }}">
                <span class="menu-icon">＋</span>
                Book Appointment
            </a>

            <a href="{{ route('student.appointments') }}">
                <span class="menu-icon">▣</span>
                My Appointments
            </a>

            

            <a href="{{ route('student.history') }}" class="active">
                <span class="menu-icon">▤</span>
                Medical History
            </a>

            <a href="{{ route('student.profile') }}">
                <span class="menu-icon">◉</span>
                My Profile
            </a>

        </nav>

        <div class="sidebar-bottom">

            <div class="sidebar-user">
                <strong>{{ auth()->user()->name ?? 'Student' }}</strong>
                <span>Student Account</span>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="logout-btn" type="submit">
                    ⇥ &nbsp; Logout
                </button>
            </form>

        </div>

    </aside>


    <main class="main">

        <div class="topbar">

            <div class="page-title">
                <h1>Medical History</h1>
                <p>View your previous clinic consultations and treatments.</p>
            </div>

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

        </div>


        <div class="card">

            <div class="card-header">
                <h2>My Medical Records</h2>
                <p>Your clinic consultation history is displayed here.</p>
            </div>


            @if($records->count())

                @foreach($records as $record)

                    <div class="record">

                        <div class="record-top">

                            <div>
                                <div class="record-date">
                                    {{ $record->created_at->format('M d, Y') }}
                                </div>

                                <div class="record-service">
                                    {{ $record->appointment?->service?->name ?? 'Clinic Consultation' }}
                                </div>
                            </div>

                        </div>


                        @if($record->symptoms)

                            <div class="record-section">
                                <strong>Symptoms</strong>
                                <p>{{ $record->symptoms }}</p>
                            </div>

                        @endif


                        @if($record->diagnosis)

                            <div class="record-section">
                                <strong>Diagnosis</strong>
                                <p>{{ $record->diagnosis }}</p>
                            </div>

                        @endif


                        @if($record->treatment)

                            <div class="record-section">
                                <strong>Treatment</strong>
                                <p>{{ $record->treatment }}</p>
                            </div>

                        @endif


                        @if($record->notes)

                            <div class="record-section">
                                <strong>Notes</strong>
                                <p>{{ $record->notes }}</p>
                            </div>

                        @endif

                    </div>

                @endforeach

            @else

                <div class="empty">

                    <div class="empty-icon">
                        ▤
                    </div>

                    <h2>No Medical Records</h2>

                    <p>
                        You don't have any medical records yet.
                        Your consultation history will appear here
                        after a clinic visit has been completed.
                    </p>

                </div>

            @endif

        </div>

    </main>

</div>

</body>
</html>

