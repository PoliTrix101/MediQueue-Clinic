<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Medical Record - MediQueue</title>


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
            max-width: 1200px;
        }


        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #2563eb;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 22px;
        }


        .back-btn:hover {
            text-decoration: underline;
        }



        /* STUDENT CARD */

        .student-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            padding: 25px;
            margin-bottom: 22px;
        }


        .student-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 22px;
        }


        .student-avatar {
            width: 65px;
            height: 65px;
            background: #dbeafe;
            color: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            font-weight: 700;
        }


        .student-name h2 {
            font-size: 21px;
            color: #0f172a;
            margin-bottom: 5px;
        }


        .student-name p {
            font-size: 13px;
            color: #64748b;
        }


        .student-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }


        .info-box {
            background: #f8fafc;
            border-radius: 10px;
            padding: 14px;
        }


        .info-label {
            font-size: 11px;
            color: #94a3b8;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 6px;
        }


        .info-value {
            font-size: 14px;
            color: #334155;
            font-weight: 600;
        }



        /* MEDICAL RECORD */

        .record-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 22px;
        }


        .section-title {
            font-size: 17px;
            color: #0f172a;
            margin-bottom: 20px;
            font-weight: 700;
        }


        .record-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }


        .record-item {
            margin-bottom: 5px;
        }


        .record-item.full {
            grid-column: 1 / -1;
        }


        .record-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 700;
            margin-bottom: 8px;
        }


        .record-value {
            background: #f8fafc;
            border: 1px solid #eef2f7;
            border-radius: 10px;
            padding: 14px;
            min-height: 50px;
            font-size: 14px;
            color: #334155;
            line-height: 1.6;
        }



        /* APPOINTMENT */

        .appointment-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 22px;
        }


        .appointment-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }


        .appointment-item label {
            display: block;
            font-size: 12px;
            color: #64748b;
            margin-bottom: 7px;
            font-weight: 600;
        }


        .appointment-value {
            padding: 12px 14px;
            background: #f8fafc;
            border-radius: 9px;
            font-size: 14px;
            color: #334155;
            min-height: 43px;
        }


        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: 700;
            text-transform: capitalize;
        }



        /* RECORD DATE */

        .record-date {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #eff6ff;
            border: 1px solid #dbeafe;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }


        .record-date strong {
            color: #1e3a8a;
            font-size: 13px;
        }


        .record-date span {
            color: #2563eb;
            font-size: 13px;
            font-weight: 700;
        }



        /* BUTTONS */

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }


        .btn {
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }


        .btn-back {
            background: #f1f5f9;
            color: #475569;
        }


        .btn-back:hover {
            background: #e2e8f0;
        }



        /* RESPONSIVE */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .student-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .appointment-grid {
                grid-template-columns: 1fr;
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

            .student-grid {
                grid-template-columns: 1fr;
            }

            .record-grid {
                grid-template-columns: 1fr;
            }

            .record-item.full {
                grid-column: auto;
            }

            .user-info {
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
                Medical Record
            </h1>

            <p>
                Student clinic record details
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


        <!-- BACK -->

        <a
            href="{{ route('nurse.clinic.records') }}"
            class="back-btn"
        >
            ← Back to Clinic Records
        </a>



        <!-- STUDENT INFORMATION -->

        <div class="student-card">


            <div class="student-header">

                <div class="student-avatar">

                    {{ strtoupper(
                        substr(
                            $record->student->name ?? 'S',
                            0,
                            1
                        )
                    ) }}

                </div>


                <div class="student-name">

                    <h2>

                        {{ $record->student->name
                            ?? 'Unknown Student'
                        }}

                    </h2>


                    <p>

                        Student ID:
                        {{ $record->student->student_id
                            ?? 'N/A'
                        }}

                    </p>

                </div>

            </div>



            <div class="student-grid">


                <div class="info-box">

                    <div class="info-label">
                        Student ID
                    </div>

                    <div class="info-value">

                        {{ $record->student->student_id
                            ?? 'N/A'
                        }}

                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Course
                    </div>

                    <div class="info-value">

                        {{ $record->student->course
                            ?? 'N/A'
                        }}

                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Year Level
                    </div>

                    <div class="info-value">

                        {{ $record->student->year_level
                            ?? 'N/A'
                        }}

                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Contact Number
                    </div>

                    <div class="info-value">

                        {{ $record->student->contact_number
                            ?? 'N/A'
                        }}

                    </div>

                </div>


            </div>

        </div>



        <!-- MEDICAL RECORD -->

        <div class="record-card">


            <div class="section-title">
                Medical Information
            </div>


            <div class="record-date">

                <strong>
                    Clinic Visit Date
                </strong>

                <span>

                    {{ $record->created_at
                        ? $record->created_at->format('F d, Y h:i A')
                        : 'N/A'
                    }}

                </span>

            </div>



            <div class="record-grid">


                <!-- SYMPTOMS -->

                <div class="record-item">

                    <div class="record-label">
                        Symptoms
                    </div>

                    <div class="record-value">

                        {{ $record->symptoms
                            ?? 'No symptoms recorded.'
                        }}

                    </div>

                </div>



                <!-- DIAGNOSIS -->

                <div class="record-item">

                    <div class="record-label">
                        Diagnosis
                    </div>

                    <div class="record-value">

                        {{ $record->diagnosis
                            ?? 'No diagnosis recorded.'
                        }}

                    </div>

                </div>



                <!-- TREATMENT -->

                <div class="record-item">

                    <div class="record-label">
                        Treatment
                    </div>

                    <div class="record-value">

                        {{ $record->treatment
                            ?? 'No treatment recorded.'
                        }}

                    </div>

                </div>



                <!-- NOTES -->

                <div class="record-item">

                    <div class="record-label">
                        Additional Notes
                    </div>

                    <div class="record-value">

                        {{ $record->notes
                            ?? 'No additional notes.'
                        }}

                    </div>

                </div>


            </div>

        </div>



        <!-- APPOINTMENT INFORMATION -->

        @if($record->appointment)

            <div class="appointment-card">


                <div class="section-title">
                    Appointment Information
                </div>


                <div class="appointment-grid">


                    <div class="appointment-item">

                        <label>
                            Appointment Date
                        </label>

                        <div class="appointment-value">

                            {{ $record->appointment->appointment_date
                                ? \Carbon\Carbon::parse(
                                    $record->appointment->appointment_date
                                )->format('F d, Y')
                                : 'N/A'
                            }}

                        </div>

                    </div>



                    <div class="appointment-item">

                        <label>
                            Appointment Time
                        </label>

                        <div class="appointment-value">

                            {{ $record->appointment->appointment_time
                                ? \Carbon\Carbon::parse(
                                    $record->appointment->appointment_time
                                )->format('h:i A')
                                : 'N/A'
                            }}

                        </div>

                    </div>



                    <div class="appointment-item">

                        <label>
                            Status
                        </label>

                        <div class="appointment-value">

                            <span class="status">

                                {{ str_replace(
                                    '_',
                                    ' ',
                                    $record->appointment->status
                                    ?? 'completed'
                                ) }}

                            </span>

                        </div>

                    </div>



                    <div class="appointment-item">

                        <label>
                            Reason for Visit
                        </label>

                        <div class="appointment-value">

                            {{ $record->appointment->reason
                                ?? 'No reason provided.'
                            }}

                        </div>

                    </div>


                </div>

            </div>

        @endif



        <!-- ACTION -->

        <div class="actions">

            <a
                href="{{ route('nurse.clinic.records') }}"
                class="btn btn-back"
            >
                ← Back to Records
            </a>

        </div>


    </section>


</main>


</body>

</html>
