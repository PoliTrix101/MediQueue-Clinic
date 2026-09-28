
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Clinic Records - MediQueue</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #1e293b;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: white;
            border-right: 1px solid #e5e7eb;
            padding: 25px 18px;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 35px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: #2563eb;
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: bold;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
        }

        .nav-title {
            font-size: 11px;
            font-weight: 700;
            color: #94a3b8;
            margin: 0 12px 10px;
            text-transform: uppercase;
            letter-spacing: .8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            text-decoration: none;
            color: #64748b;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 500;
            transition: .2s;
        }

        .nav-link:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .nav-link.active {
            background: #2563eb;
            color: white;
        }

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .logout-area {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: #fef2f2;
            color: #dc2626;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        /* MAIN */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            height: 75px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .page-title h1 {
            font-size: 23px;
            color: #0f172a;
        }

        .page-title p {
            margin-top: 4px;
            font-size: 13px;
            color: #64748b;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: #dbeafe;
            color: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-info strong {
            display: block;
            font-size: 14px;
            color: #1e293b;
        }

        .user-info span {
            font-size: 12px;
            color: #64748b;
        }

        /* CONTENT */

        .content {
            padding: 30px 35px 50px;
            max-width: 1250px;
        }

        /* HEADER */

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .content-header h2 {
            font-size: 20px;
            color: #0f172a;
        }

        .content-header p {
            margin-top: 5px;
            color: #64748b;
            font-size: 13px;
        }

        /* SEARCH */

        .search-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 22px;
        }

        .search-form {
            display: flex;
            gap: 12px;
        }

        .search-input {
            flex: 1;
            border: 1px solid #dbe1ea;
            border-radius: 10px;
            padding: 13px 15px;
            font-size: 14px;
            outline: none;
        }

        .search-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        .search-btn {
            border: none;
            background: #2563eb;
            color: white;
            border-radius: 10px;
            padding: 0 22px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .search-btn:hover {
            background: #1d4ed8;
        }

        .clear-btn {
            display: flex;
            align-items: center;
            padding: 0 15px;
            background: #f1f5f9;
            color: #475569;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        /* RECORD CARD */

        .records-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
        }

        .records-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e5e7eb;
        }

        .records-header h3 {
            font-size: 17px;
            color: #0f172a;
        }

        .records-header p {
            margin-top: 5px;
            font-size: 13px;
            color: #64748b;
        }

        /* TABLE */

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 14px 18px;
            text-align: left;
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        td {
            padding: 16px 18px;
            border-top: 1px solid #eef2f7;
            font-size: 13px;
            color: #334155;
        }

        tr:hover td {
            background: #f8fafc;
        }

        /* STUDENT */

        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
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

        .student-name {
            font-weight: 700;
            color: #1e293b;
        }

        .student-id {
            margin-top: 3px;
            font-size: 11px;
            color: #94a3b8;
        }

        /* BADGES */

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #dbeafe;
            color: #2563eb;
            font-size: 11px;
            font-weight: 700;
        }

        .diagnosis {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* VIEW BUTTON */

        .view-btn {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            background: #eff6ff;
            color: #2563eb;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
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
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .empty h3 {
            color: #334155;
            font-size: 17px;
            margin-bottom: 6px;
        }

        .empty p {
            color: #94a3b8;
            font-size: 13px;
        }

        /* PAGINATION */

        .pagination-area {
            padding: 18px 25px;
            border-top: 1px solid #e5e7eb;
        }

        .pagination-area nav {
            display: flex;
            justify-content: center;
        }

        .pagination-area svg {
            width: 18px;
        }

        .pagination-area a,
        .pagination-area span {
            margin: 0 3px;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .content {
                padding: 25px;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }

            .user-info {
                display: none;
            }

            .search-form {
                flex-direction: column;
            }

            .search-btn,
            .clear-btn {
                height: 43px;
                justify-content: center;
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


    <div class="nav-title">
        Main Menu
    </div>


    <a
        href="{{ route('nurse.dashboard') }}"
        class="nav-link"
    >
        <span class="nav-icon">⌂</span>
        Dashboard
    </a>


    <a
        href="{{ route('nurse.queue') }}"
        class="nav-link"
    >
        <span class="nav-icon">☷</span>
        Queue
    </a>


    <a
        href="{{ route('nurse.students') }}"
        class="nav-link"
    >
        <span class="nav-icon">♙</span>
        Students
    </a>


    <a
        href="{{ route('nurse.appointments') }}"
        class="nav-link"
    >
        <span class="nav-icon">▣</span>
        Appointments
    </a>


    <a
        href="{{ route('nurse.consultations') }}"
        class="nav-link"
    >
        <span class="nav-icon">✚</span>
        Consultation
    </a>


    <a
        href="{{ route('nurse.clinic.records') }}"
        class="nav-link active"
    >
        <span class="nav-icon">▤</span>
        Clinic Records
    </a>


    <a
        href="{{ route('nurse.profile') }}"
        class="nav-link"
    >
        <span class="nav-icon">⚙</span>
        Profile
    </a>


    <div class="logout-area">

        <form
            action="{{ route('logout') }}"
            method="POST"
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



<!-- MAIN -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">

        <div class="page-title">

            <h1>
                Clinic Records
            </h1>

            <p>
                Student medical history and clinic records
            </p>

        </div>


        <div class="user-area">

            <div class="user-avatar">

                {{ strtoupper(
                    substr(
                        auth()->user()->name ?? 'N',
                        0,
                        1
                    )
                ) }}

            </div>


            <div class="user-info">

                <strong>
                    {{ auth()->user()->name ?? 'Nurse' }}
                </strong>

                <span>
                    Nurse
                </span>

            </div>

        </div>

    </header>



    <!-- CONTENT -->

    <section class="content">


        <div class="content-header">

            <div>

                <h2>
                    Medical Records
                </h2>

                <p>
                    View previous student clinic visits and medical information.
                </p>

            </div>

        </div>



        <!-- SEARCH -->

        <div class="search-card">

            <form
                action="{{ route('nurse.clinic.records') }}"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    class="search-input"
                    placeholder="Search student name or student ID..."
                >


                <button
                    type="submit"
                    class="search-btn"
                >
                    🔍 Search
                </button>


                @if(!empty($search))

                    <a
                        href="{{ route('nurse.clinic.records') }}"
                        class="clear-btn"
                    >
                        Clear
                    </a>

                @endif

            </form>

        </div>



        <!-- RECORDS -->

        <div class="records-card">


            <div class="records-header">

                <h3>
                    Clinic Visit Records
                </h3>

                <p>
                    {{ $records->total() }}
                    record(s) found
                </p>

            </div>



            @if($records->count() > 0)


                <div class="table-container">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Student
                                </th>

                                <th>
                                    Date
                                </th>

                                <th>
                                    Symptoms
                                </th>

                                <th>
                                    Diagnosis
                                </th>

                                <th>
                                    Treatment
                                </th>

                                <th>
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($records as $record)

                                @php

                                    $student =
                                        $record->student;

                                    $studentName =
                                        $student->name
                                        ?? 'Unknown Student';

                                    $initial =
                                        strtoupper(
                                            substr(
                                                $studentName,
                                                0,
                                                1
                                            )
                                        );

                                @endphp


                                <tr>


                                    <!-- STUDENT -->

                                    <td>

                                        <div class="student-info">

                                            <div class="student-avatar">

                                                {{ $initial }}

                                            </div>


                                            <div>

                                                <div class="student-name">

                                                    {{ $studentName }}

                                                </div>


                                                <div class="student-id">

                                                    ID:
                                                    {{ $student->student_id ?? 'N/A' }}

                                                </div>

                                            </div>

                                        </div>

                                    </td>



                                    <!-- DATE -->

                                    <td>

                                        {{ $record->created_at
                                            ? $record->created_at->format('M d, Y')
                                            : 'N/A'
                                        }}

                                    </td>



                                    <!-- SYMPTOMS -->

                                    <td>

                                        {{ \Illuminate\Support\Str::limit(
                                            $record->symptoms ?? 'None',
                                            40
                                        ) }}

                                    </td>



                                    <!-- DIAGNOSIS -->

                                    <td>

                                        <div class="diagnosis">

                                            {{ $record->diagnosis ?? 'Not recorded' }}

                                        </div>

                                    </td>



                                    <!-- TREATMENT -->

                                    <td>

                                        <span class="badge">

                                            {{ \Illuminate\Support\Str::limit(
                                                $record->treatment ?? 'None',
                                                25
                                            ) }}

                                        </span>

                                    </td>



                                    <!-- ACTION -->

                                    <td>

                                        <a
                                            href="{{ route(
                                                'nurse.clinic.records.show',
                                                $record->id
                                            ) }}"
                                            class="view-btn"
                                        >
                                            View Record →
                                        </a>

                                    </td>


                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>



                <!-- PAGINATION -->

                <div class="pagination-area">

                    {{ $records->links() }}

                </div>


            @else


                <!-- EMPTY -->

                <div class="empty">

                    <div class="empty-icon">
                        ▤
                    </div>

                    <h3>
                        No Clinic Records Found
                    </h3>

                    <p>

                        @if(!empty($search))

                            No medical records match
                            "{{ $search }}".

                        @else

                            There are currently no clinic records.

                        @endif

                    </p>

                </div>


            @endif


        </div>


    </section>


</main>


</body>

</html>

