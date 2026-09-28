<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>MediQueue - Appointments</title>

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

    /* LOGOUT */
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

    /* PAGE HEADER */
    .page-header {
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

    /* FILTER CARD */
    .filter-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .filter-form {
        display: flex;
        align-items: flex-end;
        gap: 15px;
        flex-wrap: wrap;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .filter-group label {
        font-size: 12px;
        font-weight: 600;
        color: #374151;
    }

    .filter-group select,
    .filter-group input {
        height: 40px;
        min-width: 180px;
        padding: 0 12px;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        outline: none;
        font-size: 13px;
        background: white;
    }

    .filter-group select:focus,
    .filter-group input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px #dbeafe;
    }

    .filter-btn {
        height: 40px;
        padding: 0 18px;
        border: none;
        border-radius: 7px;
        background: #2563eb;
        color: white;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .filter-btn:hover {
        background: #1d4ed8;
    }

    .clear-btn {
        height: 40px;
        padding: 0 18px;
        border-radius: 7px;
        background: #f3f4f6;
        color: #374151;
        text-decoration: none;
        display: flex;
        align-items: center;
        font-size: 13px;
        font-weight: 600;
    }

    .clear-btn:hover {
        background: #e5e7eb;
    }

    /* TABLE */
    .table-container {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    .table-header {
        padding: 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .table-header h3 {
        font-size: 16px;
        color: #111827;
    }

    .table-header p {
        font-size: 12px;
        color: #6b7280;
        margin-top: 4px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 950px;
    }

    thead {
        background: #f8fafc;
    }

    th {
        text-align: left;
        padding: 14px 18px;
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    td {
        padding: 16px 18px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f3f4f6;
        vertical-align: middle;
    }

    tbody tr:hover {
        background: #f9fafb;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    /* STUDENT */
    .student-name {
        color: #111827;
        font-weight: 600;
    }

    .student-number {
        color: #6b7280;
        font-size: 11px;
        margin-top: 3px;
    }

    /* STATUS */
    .status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-consultation {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .status-completed {
        background: #dcfce7;
        color: #166534;
    }

    .status-cancelled {
        background: #fee2e2;
        color: #991b1b;
    }

    .status-default {
        background: #f3f4f6;
        color: #374151;
    }

    /* ACTION */
    .cancel-btn {
        display: inline-block;
        padding: 7px 12px;
        border: none;
        border-radius: 6px;
        background: #fee2e2;
        color: #dc2626;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .cancel-btn:hover {
        background: #fecaca;
    }

    .no-action {
        color: #9ca3af;
        font-size: 12px;
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

    /* EMPTY */
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

        <div class="logo-icon">
            M
        </div>

        <div class="logo-text">
            <h2>MediQueue</h2>
            <p>LLCC School Clinic</p>
        </div>

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

            <h1>Appointments</h1>

            <p>
                View and manage student clinic appointments.
            </p>

        </div>


        <div class="profile">

            <div class="avatar">
                N
            </div>

            <div class="profile-info">

                <strong>Nurse</strong>

                <span>
                    School Clinic Nurse
                </span>

            </div>

        </div>

    </header>


    <!-- CONTENT -->
    <section class="content">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        <!-- PAGE HEADER -->
        <div class="page-header">

            <h2>
                Appointment Management
            </h2>

            <p>
                Review scheduled appointments and their current status.
            </p>

        </div>


        <!-- FILTER -->
        <div class="filter-card">

            <form
                method="GET"
                action="{{ route('nurse.appointments') }}"
                class="filter-form"
            >

                <!-- STATUS -->
                <div class="filter-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        name="status"
                        id="status"
                    >

                        <option
                            value="all"
                            {{ request('status', 'all') === 'all' ? 'selected' : '' }}
                        >
                            All Status
                        </option>

                        <option
                            value="pending"
                            {{ request('status') === 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="in_consultation"
                            {{ request('status') === 'in_consultation' ? 'selected' : '' }}
                        >
                            In Consultation
                        </option>

                        <option
                            value="completed"
                            {{ request('status') === 'completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>

                        <option
                            value="cancelled"
                            {{ request('status') === 'cancelled' ? 'selected' : '' }}
                        >
                            Cancelled
                        </option>

                    </select>

                </div>


                <!-- DATE -->
                <div class="filter-group">

                    <label for="date">
                        Appointment Date
                    </label>

                    <input
                        type="date"
                        name="date"
                        id="date"
                        value="{{ request('date') }}"
                    >

                </div>


                <!-- FILTER -->
                <button
                    type="submit"
                    class="filter-btn"
                >
                    Filter
                </button>


                <!-- CLEAR -->
                <a
                    href="{{ route('nurse.appointments') }}"
                    class="clear-btn"
                >
                    Clear
                </a>

            </form>

        </div>


        <!-- APPOINTMENTS TABLE -->
        <div class="table-container">

            <div class="table-header">

                <h3>
                    All Appointments
                </h3>

                <p>
                    Appointments are loaded directly from the clinic database.
                </p>

            </div>


            @if($appointments->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Student
                                </th>

                                <th>
                                    Course
                                </th>

                                <th>
                                    Year
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

                            @foreach($appointments as $appointment)

                                <tr>

                                    <!-- STUDENT -->
                                    <td>

                                        <div class="student-name">

                                            {{ $appointment->first_name ?? 'Unknown' }}
                                            {{ $appointment->last_name ?? '' }}

                                        </div>

                                        <div class="student-number">

                                            {{ $appointment->student_number ?? 'No ID' }}

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

                                            <span class="status status-pending">
                                                Pending
                                            </span>

                                        @elseif($appointment->status === 'in_consultation')

                                            <span class="status status-consultation">
                                                In Consultation
                                            </span>

                                        @elseif($appointment->status === 'completed')

                                            <span class="status status-completed">
                                                Completed
                                            </span>

                                        @elseif($appointment->status === 'cancelled')

                                            <span class="status status-cancelled">
                                                Cancelled
                                            </span>

                                        @else

                                            <span class="status status-default">
                                                {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                                            </span>

                                        @endif

                                    </td>


                                    <!-- ACTION -->
                                    <td>

                                        @if(
                                            $appointment->status === 'pending' ||
                                            $appointment->status === 'in_consultation'
                                        )

                                            <form
                                                method="POST"
                                                action="{{ route('nurse.appointment.cancel', $appointment->id) }}"
                                                onsubmit="return confirm('Are you sure you want to cancel this appointment?');"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="cancel-btn"
                                                >
                                                    Cancel
                                                </button>

                                            </form>

                                        @else

                                            <span class="no-action">
                                                No action
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        📅
                    </div>

                    <h3>
                        No Appointments Found
                    </h3>

                    <p>
                        There are no appointments matching your selected filters.
                    </p>

                </div>

            @endif

        </div>

    </section>

</main>


</body>
</html>
