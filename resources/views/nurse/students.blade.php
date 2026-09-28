<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediQueue — Students</title>

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

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 25px 18px;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px;
            margin-bottom: 35px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: #2563eb;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .logo-text {
            font-size: 21px;
            font-weight: 700;
            color: #1e3a8a;
        }

        .menu-title {
            font-size: 11px;
            font-weight: 700;
            color: #9ca3af;
            padding: 0 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .nav a {
            text-decoration: none;
            color: #64748b;
            padding: 12px 14px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            font-weight: 500;
            transition: .2s;
        }

        .nav a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .nav a.active {
            background: #2563eb;
            color: white;
        }

        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* TOPBAR */
        .topbar {
            height: 75px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 13px;
            margin-top: 4px;
        }

        .nurse-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .nurse-name {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
        }

        .nurse-role {
            font-size: 12px;
            color: #6b7280;
            margin-top: 2px;
        }

        /* CONTENT */
        .content {
            padding: 30px 35px;
        }

        .header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .header-row h2 {
            font-size: 20px;
            color: #111827;
        }

        .header-description {
            color: #6b7280;
            font-size: 13px;
            margin-top: 5px;
        }

        /* SEARCH */
        .search-box {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-input {
            flex: 1;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 11px 13px;
            font-size: 14px;
            outline: none;
        }

        .search-input:focus {
            border-color: #2563eb;
        }

        .search-btn {
            border: none;
            background: #2563eb;
            color: white;
            padding: 0 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .search-btn:hover {
            background: #1d4ed8;
        }

        /* ALERT */
        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        /* TABLE */
        .table-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
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
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .4px;
            color: #64748b;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        td {
            padding: 16px 18px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #374151;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .student-id {
            font-weight: 700;
            color: #2563eb;
        }

        .student-name {
            font-weight: 600;
            color: #111827;
        }

        .course,
        .year,
        .contact {
            color: #64748b;
        }

        /* VIEW BUTTON */
        .actions {
            display: flex;
            align-items: center;
        }

        .view-btn {
            display: inline-block;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            background: #eff6ff;
            color: #2563eb;
            transition: .2s;
        }

        .view-btn:hover {
            background: #dbeafe;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 12px;
        }

        .empty h3 {
            font-size: 17px;
            color: #374151;
            margin-bottom: 7px;
        }

        .empty p {
            color: #9ca3af;
            font-size: 14px;
        }

        /* MOBILE */
        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .content {
                padding: 25px 20px;
            }

            .topbar {
                padding: 0 20px;
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

            .nav {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .topbar {
                height: auto;
                padding: 18px;
                gap: 15px;
            }

            .content {
                padding: 20px 15px;
            }

            .header-row {
                align-items: flex-start;
            }

            .search-form {
                flex-direction: column;
            }

            .search-btn {
                height: 42px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">
                +
            </div>

            <div class="logo-text">
                MediQueue
            </div>
        </div>

        <div class="menu-title">
            Nurse Menu
        </div>

        <nav class="nav">

            <a href="{{ route('nurse.dashboard') }}">
                <span class="nav-icon">⌂</span>
                Dashboard
            </a>

            <a href="{{ route('nurse.queue') }}">
                <span class="nav-icon">☷</span>
                Queue
            </a>

            <!-- ACTIVE: STUDENTS -->
            <a
                href="{{ route('nurse.students') }}"
                class="active"
            >
                <span class="nav-icon">♙</span>
                Students
            </a>

            <a href="{{ route('nurse.appointments') }}">
                <span class="nav-icon">▣</span>
                Appointments
            </a>

            <a href="{{ route('nurse.consultations') }}">
                <span class="nav-icon">♡</span>
                Consultation
            </a>

            <a href="{{ route('nurse.clinic.records') }}">
                <span class="nav-icon">▤</span>
                Clinic Records
            </a>

            <!-- CALENDAR -->
            <a href="{{ route('nurse.schedule') }}">
                <span class="nav-icon">📆</span>
                Calendar
            </a>

            <a href="{{ route('nurse.profile') }}">
                <span class="nav-icon">⚙</span>
                Profile
            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div>
                <div class="page-title">
                    Students
                </div>

                <div class="page-subtitle">
                    View registered student information
                </div>
            </div>

            <div class="nurse-info">

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'N', 0, 1)) }}
                </div>

                <div>

                    <div class="nurse-name">
                        {{ auth()->user()->name ?? 'Nurse' }}
                    </div>

                    <div class="nurse-role">
                        Nurse
                    </div>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            <div class="header-row">

                <div>

                    <h2>
                        Student Records
                    </h2>

                    <div class="header-description">
                        View registered student information and clinic-related details.
                    </div>

                </div>

            </div>


            <!-- SUCCESS MESSAGE -->
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            <!-- ERROR MESSAGE -->
            @if(session('error'))

                <div class="alert alert-error">
                    {{ session('error') }}
                </div>

            @endif


            <!-- VALIDATION ERRORS -->
            @if($errors->any())

                <div class="alert alert-error">

                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach

                </div>

            @endif


            <!-- SEARCH -->
            <div class="search-box">

                <form
                    method="GET"
                    action="{{ route('nurse.students') }}"
                    class="search-form"
                >

                    <input
                        type="text"
                        name="search"
                        class="search-input"
                        placeholder="Search student ID, name, course, or year level..."
                        value="{{ request('search') }}"
                    >

                    <button
                        type="submit"
                        class="search-btn"
                    >
                        Search
                    </button>

                </form>

            </div>


            <!-- STUDENT TABLE -->
            <div class="table-card">

                @if($students->count() > 0)

                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>
                                        Student ID
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Course
                                    </th>

                                    <th>
                                        Year Level
                                    </th>

                                    <th>
                                        Contact
                                    </th>

                                    <th>
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($students as $student)

                                    <tr>

                                        <td>
                                            <span class="student-id">
                                                {{ $student->student_id }}
                                            </span>
                                        </td>


                                        <td>
                                            <span class="student-name">
                                                {{ $student->first_name }}
                                                {{ $student->last_name }}
                                            </span>
                                        </td>


                                        <td>
                                            <span class="course">
                                                {{ $student->course ?? '—' }}
                                            </span>
                                        </td>


                                        <td>
                                            <span class="year">
                                                {{ $student->year_level ?? '—' }}
                                            </span>
                                        </td>


                                        <td>
                                            <span class="contact">
                                                {{ $student->contact_number ?? '—' }}
                                            </span>
                                        </td>


                                        <td>

                                            <div class="actions">

                                                <a
                                                    href="{{ route('nurse.students.show', $student) }}"
                                                    class="view-btn"
                                                >
                                                    👁 View
                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty">

                        <div class="empty-icon">
                            ♙
                        </div>

                        @if(request('search'))

                            <h3>
                                No students found
                            </h3>

                            <p>
                                No student matched
                                "{{ request('search') }}".
                            </p>

                        @else

                            <h3>
                                No student records yet
                            </h3>

                            <p>
                                There are currently no registered students.
                            </p>

                        @endif

                    </div>

                @endif

            </div>

        </section>

    </main>

</body>
</html>