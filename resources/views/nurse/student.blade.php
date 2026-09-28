<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Student Profile - MediQueue</title>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background: #f5f8fc;
        color: #1f2937;
    }

    /* =========================
       SIDEBAR
    ========================= */

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 250px;
        height: 100vh;
        background: white;
        border-right: 1px solid #e5e7eb;
        padding: 25px 18px;
        z-index: 1000;
    }

    .logo {
        text-align: center;
        color: #2563eb;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 35px;
    }

    .menu-title {
        font-size: 12px;
        color: #9ca3af;
        margin: 20px 12px 10px;
        text-transform: uppercase;
    }

    .menu {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .menu a {
        display: block;
        padding: 13px 15px;
        margin-bottom: 6px;
        text-decoration: none;
        color: #4b5563;
        border-radius: 10px;
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

    /* =========================
       LOGOUT
    ========================= */

    .logout {
        position: absolute;
        bottom: 25px;
        left: 18px;
        right: 18px;
    }

    .logout button {
        width: 100%;
        border: none;
        background: transparent;
        color: #6b7280;
        padding: 13px 15px;
        border-radius: 10px;
        text-align: left;
        cursor: pointer;
        font-size: 14px;
        transition: 0.2s;
    }

    .logout button:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    /* =========================
       MAIN
    ========================= */

    .main {
        margin-left: 250px;
        min-height: 100vh;
    }

    /* =========================
       TOPBAR
    ========================= */

    .topbar {
        height: 75px;
        background: white;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 35px;
    }

    .topbar h2 {
        font-size: 22px;
        color: #111827;
    }

    .nurse-info {
        text-align: right;
    }

    .nurse-info strong {
        display: block;
        color: #111827;
    }

    .nurse-info span {
        font-size: 13px;
        color: #6b7280;
    }

    /* =========================
       CONTENT
    ========================= */

    .content {
        padding: 35px;
    }

    /* =========================
       BACK BUTTON
    ========================= */

    .back-btn {
        display: inline-block;
        text-decoration: none;
        background: white;
        border: 1px solid #d1d5db;
        color: #374151;
        padding: 10px 16px;
        border-radius: 8px;
        margin-bottom: 25px;
        transition: 0.2s;
    }

    .back-btn:hover {
        background: #f3f4f6;
    }

    /* =========================
       PROFILE CARD
    ========================= */

    .profile-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    /* =========================
       PROFILE HEADER
    ========================= */

    .profile-header {
        display: flex;
        align-items: center;
        gap: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e5e7eb;
    }

    .profile-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #dbeafe;
    }

    .photo-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        font-weight: bold;
    }

    .profile-header h1 {
        font-size: 26px;
        margin-bottom: 7px;
        color: #111827;
    }

    .student-id {
        color: #2563eb;
        font-weight: bold;
    }

    /* =========================
       SECTION
    ========================= */

    .section {
        margin-top: 30px;
    }

    .section h3 {
        font-size: 18px;
        margin-bottom: 20px;
        color: #111827;
    }

    /* =========================
       INFORMATION GRID
    ========================= */

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .info-box {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 16px;
    }

    .label {
        font-size: 12px;
        color: #6b7280;
        margin-bottom: 6px;
    }

    .value {
        font-size: 15px;
        font-weight: 600;
        color: #111827;
        word-break: break-word;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 800px) {

        .sidebar {
            width: 200px;
        }

        .main {
            margin-left: 200px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 600px) {

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

        .profile-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

    }

</style>


</head>

<body>


<!-- ==========================================
     SIDEBAR
=========================================== -->

<aside class="sidebar">

    <div class="logo">
        MediQueue
    </div>


    <div class="menu-title">
        Nurse Menu
    </div>


    <nav class="menu">


        <!-- DASHBOARD -->

        <a href="{{ route('nurse.dashboard') }}">

            🏠 Dashboard

        </a>


        <!-- QUEUE -->

        <a href="{{ route('nurse.queue') }}">

            🎫 Queue

        </a>


        <!-- STUDENTS -->

        <a
            href="{{ route('nurse.students') }}"
            class="active"
        >

            👨‍🎓 Students

        </a>


        <!-- APPOINTMENTS -->

        <a href="{{ route('nurse.appointments') }}">

            📅 Appointments

        </a>


        <!-- CONSULTATIONS -->

        <a href="{{ route('nurse.consultations') }}">

            🩺 Consultations

        </a>


        <!-- CLINIC RECORDS -->

        <a href="{{ route('nurse.clinic.records') }}">

            📋 Clinic Records

        </a>


        <!-- CALENDAR -->

        <a href="{{ route('nurse.schedule') }}">

            📆 Calendar

        </a>


        <!-- PROFILE -->

        <a href="{{ route('nurse.profile') }}">

            👤 Profile

        </a>


    </nav>


    <!-- ======================================
         LOGOUT
    ======================================= -->

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


    <!-- ======================================
         TOPBAR
    ======================================= -->

    <header class="topbar">

        <h2>
            Student Profile
        </h2>


        <div class="nurse-info">

            <strong>

                {{ auth()->user()->name }}

            </strong>

            <span>
                Nurse
            </span>

        </div>

    </header>



    <!-- ======================================
         CONTENT
    ======================================= -->

    <section class="content">


        <!-- BACK BUTTON -->

        <a
            href="{{ route('nurse.students') }}"
            class="back-btn"
        >

            ← Back to Students

        </a>



        <!-- ==================================
             PROFILE CARD
        =================================== -->

        <div class="profile-card">


            <!-- PROFILE HEADER -->

            <div class="profile-header">


                @if($student->profile_photo)

                    <img
                        src="{{ asset('storage/' . $student->profile_photo) }}"
                        class="profile-photo"
                        alt="Student Photo"
                    >

                @else

                    <div class="photo-placeholder">

                        {{ strtoupper(
                            substr(
                                $student->first_name,
                                0,
                                1
                            )
                        ) }}

                    </div>

                @endif


                <div>

                    <h1>

                        {{ $student->first_name }}

                        {{ $student->last_name }}

                    </h1>


                    <div class="student-id">

                        {{ $student->student_id }}

                    </div>

                </div>

            </div>



            <!-- ==================================
                 STUDENT INFORMATION
            =================================== -->

            <div class="section">


                <h3>
                    Student Information
                </h3>


                <div class="info-grid">


                    <!-- FIRST NAME -->

                    <div class="info-box">

                        <div class="label">
                            First Name
                        </div>

                        <div class="value">

                            {{ $student->first_name }}

                        </div>

                    </div>



                    <!-- LAST NAME -->

                    <div class="info-box">

                        <div class="label">
                            Last Name
                        </div>

                        <div class="value">

                            {{ $student->last_name }}

                        </div>

                    </div>



                    <!-- STUDENT ID -->

                    <div class="info-box">

                        <div class="label">
                            Student ID
                        </div>

                        <div class="value">

                            {{ $student->student_id }}

                        </div>

                    </div>



                    <!-- COURSE -->

                    <div class="info-box">

                        <div class="label">
                            Course
                        </div>

                        <div class="value">

                            {{ $student->course ?? 'Not provided' }}

                        </div>

                    </div>



                    <!-- YEAR LEVEL -->

                    <div class="info-box">

                        <div class="label">
                            Year Level
                        </div>

                        <div class="value">

                            {{ $student->year_level ?? 'Not provided' }}

                        </div>

                    </div>



                    <!-- CONTACT NUMBER -->

                    <div class="info-box">

                        <div class="label">
                            Contact Number
                        </div>

                        <div class="value">

                            {{ $student->contact_number ?? 'Not provided' }}

                        </div>

                    </div>



                    <!-- DATE OF BIRTH -->

                    <div class="info-box">

                        <div class="label">
                            Date of Birth
                        </div>

                        <div class="value">

                            {{ $student->date_of_birth ?? 'Not provided' }}

                        </div>

                    </div>



                    <!-- EMAIL -->

                    <div class="info-box">

                        <div class="label">
                            Email
                        </div>

                        <div class="value">

                            {{ $student->user->email ?? 'Not provided' }}

                        </div>

                    </div>



                    <!-- ADDRESS -->

                    <div
                        class="info-box"
                        style="grid-column: 1 / -1;"
                    >

                        <div class="label">
                            Address
                        </div>

                        <div class="value">

                            {{ $student->address ?? 'Not provided' }}

                        </div>

                    </div>


                </div>

            </div>


        </div>

    </section>

</main>


</body>
</html>
