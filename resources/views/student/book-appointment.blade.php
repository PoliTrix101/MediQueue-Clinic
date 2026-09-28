<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - MediQueue</title>

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

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #ffffff;
            border-right: 1px solid #e7edf5;
            padding: 24px 16px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 10;
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
            border-radius: 12px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .logo-text h2 {
            color: #0d6efd;
            font-size: 20px;
        }

        .logo-text span {
            display: block;
            font-size: 11px;
            color: #8a94a6;
            margin-top: 2px;
        }

        .menu-title {
            color: #9aa4b2;
            font-size: 11px;
            font-weight: bold;
            padding: 0 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: .6px;
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
            transition: .2s;
        }

        .menu a:hover {
            background: #f1f6ff;
            color: #0d6efd;
        }

        .menu a.active {
            background: #eaf3ff;
            color: #0d6efd;
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 20px;
        }

        .sidebar-user {
            padding: 14px;
            background: #f7f9fc;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .sidebar-user strong {
            display: block;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .sidebar-user span {
            font-size: 11px;
            color: #8a94a6;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: transparent;
            color: #e05252;
            padding: 11px 14px;
            text-align: left;
            cursor: pointer;
            border-radius: 10px;
            font-size: 13px;
        }

        .logout-btn:hover {
            background: #fff1f1;
        }

        /* MAIN */
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
            margin-bottom: 5px;
            color: #202938;
        }

        .page-title p {
            color: #8a94a6;
            font-size: 13px;
        }

        .profile {
            display: flex;
            align-items: center;
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
            object-fit: cover;
        }

        .avatar-image {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* CONTENT */
        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 290px;
            gap: 22px;
            align-items: start;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e8edf4;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(23, 43, 77, 0.04);
        }

        .form-card {
            padding: 28px;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 26px;
        }

        .header-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #eaf3ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .card-header h2 {
            font-size: 18px;
            color: #253046;
            margin-bottom: 3px;
        }

        .card-header p {
            color: #8a94a6;
            font-size: 12px;
            line-height: 1.5;
        }

        .clinic-banner {
            background: #f1f7ff;
            border: 1px solid #d9e9ff;
            border-radius: 12px;
            padding: 15px 17px;
            margin-bottom: 24px;
        }

        .clinic-banner-title {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #0d6efd;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .clinic-banner-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: #e0efff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .clinic-banner p {
            margin-left: 40px;
            color: #718096;
            font-size: 11px;
            line-height: 1.5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .form-group {
            margin-bottom: 2px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #394559;
            margin-bottom: 8px;
        }

        .required {
            color: #e05252;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #dfe5ed;
            background: #fbfcfe;
            border-radius: 10px;
            padding: 12px 13px;
            outline: none;
            font-size: 13px;
            color: #263143;
            transition: .2s;
        }

        input:focus,
        textarea:focus {
            background: #ffffff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, .08);
        }

        textarea {
            min-height: 125px;
            resize: vertical;
        }

        .hint {
            font-size: 11px;
            color: #98a1b0;
            margin-top: 6px;
            line-height: 1.5;
        }

        .field-error {
            margin-top: 6px;
            color: #d14949;
            font-size: 11px;
        }

        /* =====================================================
           CUSTOM TIME PICKER
        ===================================================== */

        .time-picker-wrapper {
            position: relative;
        }

        .time-display {
            width: 100%;
            min-height: 42px;
            border: 1px solid #dfe5ed;
            background: #fbfcfe;
            border-radius: 10px;
            padding: 12px 13px;
            outline: none;
            font-size: 13px;
            color: #263143;
            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: space-between;

            transition: .2s;
        }

        .time-display:hover {
            border-color: #0d6efd;
            background: #ffffff;
        }

        .time-display.open {
            border-color: #0d6efd;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, .08);
        }

        .time-display.placeholder {
            color: #98a1b0;
        }

        .clock-icon {
            color: #0d6efd;
            font-size: 18px;
        }

        .time-dropdown {
            display: none;

            position: absolute;
            top: calc(100% + 7px);
            left: 0;

            width: 100%;
            min-width: 320px;

            background: #ffffff;
            border: 1px solid #dfe5ed;
            border-radius: 12px;

            box-shadow: 0 10px 30px rgba(23, 43, 77, .12);

            z-index: 100;

            padding: 12px;
        }

        .time-dropdown.show {
            display: block;
        }

        .time-picker-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .time-column {
            border: 1px solid #e5eaf0;
            border-radius: 10px;
            overflow: hidden;
            background: #fbfcfe;
        }

        .time-column-title {
            padding: 10px;
            text-align: center;
            background: #f4f7fb;
            border-bottom: 1px solid #e5eaf0;

            color: #667085;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .time-options {
            height: 230px;
            overflow-y: auto;
            padding: 5px;
        }

        .time-option {
            width: 100%;
            min-height: 36px;

            border: none;
            background: transparent;

            border-radius: 7px;

            padding: 8px 10px;

            text-align: center;

            font-size: 12px;
            color: #394559;

            cursor: pointer;

            transition: .15s;

            margin-bottom: 2px;
        }

        .time-option:hover {
            background: #eaf3ff;
            color: #0d6efd;
        }

        .time-option.selected {
            background: #0d6efd;
            color: #ffffff;
            font-weight: 600;
        }

        .time-option.disabled {
            color: #c5cbd4;
            background: #f3f4f6;
            cursor: not-allowed;
            text-decoration: line-through;
        }

        .time-option.disabled:hover {
            background: #f3f4f6;
            color: #c5cbd4;
        }

        .selected-time-preview {
            margin-top: 10px;
            padding: 11px 12px;

            background: #f1f7ff;
            border: 1px solid #d9e9ff;
            border-radius: 9px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            font-size: 12px;
            color: #718096;
        }

        .selected-time-preview strong {
            color: #0d6efd;
            font-size: 13px;
        }

        .confirm-time-btn {
            width: 100%;

            margin-top: 10px;

            border: none;
            border-radius: 9px;

            background: #0d6efd;
            color: #ffffff;

            padding: 11px;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }

        .confirm-time-btn:hover {
            background: #0b5ed7;
        }

        /* ACTIONS */

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 26px;
            padding-top: 22px;
            border-top: 1px solid #edf1f5;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-secondary {
            background: #f1f3f6;
            color: #667085;
        }

        .btn-secondary:hover {
            background: #e8ebf0;
        }

        .btn-primary {
            background: #0d6efd;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #0b5ed7;
        }

        /* RIGHT CARDS */

        .info-card {
            padding: 22px;
            margin-bottom: 18px;
        }

        .info-card h3 {
            font-size: 15px;
            margin-bottom: 15px;
            color: #293449;
        }

        .info-item {
            display: flex;
            gap: 11px;
            margin-bottom: 15px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #f0f5ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 14px;
        }

        .info-text strong {
            display: block;
            font-size: 12px;
            color: #394559;
            margin-bottom: 3px;
        }

        .info-text span {
            font-size: 11px;
            color: #8b95a4;
            line-height: 1.5;
        }

        .steps {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .step {
            display: flex;
            gap: 11px;
        }

        .step-number {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #eaf3ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .step-text strong {
            display: block;
            font-size: 12px;
            color: #394559;
            margin-bottom: 3px;
        }

        .step-text span {
            color: #8b95a4;
            font-size: 11px;
            line-height: 1.4;
        }

        /* ALERTS */

        .alert {
            border-radius: 10px;
            padding: 13px 15px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #eaf9f0;
            color: #207245;
            border: 1px solid #ccefd9;
        }

        .alert-danger {
            background: #fff1f1;
            color: #b53f3f;
            border: 1px solid #f4d0d0;
        }

        .alert-danger ul {
            margin: 7px 0 0 18px;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 750px) {

            .sidebar {
                position: relative;
                width: 100%;
                padding-bottom: 20px;
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }

        @media (max-width: 500px) {

            .topbar {
                align-items: flex-start;
            }

            .profile {
                display: none;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }

            .time-dropdown {
                min-width: 280px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">

            <div class="logo-icon">
                M
            </div>

            <div class="logo-text">
                <h2>MediQueue</h2>
                <span>LLCC School Clinic</span>
            </div>

        </div>

        <div class="menu-title">
            Student Menu
        </div>

        <nav class="menu">

            <a href="{{ route('user.dashboard') }}">
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>

            <a
                href="{{ route('student.appointments.create') }}"
                class="active"
            >
                <span class="menu-icon">＋</span>
                Book Appointment
            </a>

            <a href="{{ route('student.appointments') }}">
                <span class="menu-icon">▣</span>
                My Appointments
            </a>

            <a href="{{ route('student.history') }}">
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

                <strong>
                    {{ $student->first_name ?? auth()->user()->name ?? 'Student' }}
                    {{ $student->last_name ?? '' }}
                </strong>

                <span>
                    Student Account
                </span>

            </div>

            <form
                method="POST"
                action="{{ route('logout') }}"
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

        <div class="topbar">

            <div class="page-title">

                <h1>
                    Book an Appointment
                </h1>

                <p>
                    Schedule your visit to the Lapu-Lapu City College School Clinic.
                </p>

            </div>

            <div class="profile">

                @if(isset($student) && $student->profile_photo)

                    <img
                        src="{{ asset('storage/' . $student->profile_photo) }}"
                        alt="Profile"
                        class="avatar-image"
                    >

                @else

                    <div class="avatar">

                        {{ strtoupper(substr($student->first_name ?? auth()->user()->name ?? 'S', 0, 1)) }}

                    </div>

                @endif

            </div>

        </div>


        <!-- ALERTS -->

        @if(session('success'))

            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Please correct the following:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="content-grid">


            <!-- APPOINTMENT FORM -->

            <section class="card form-card">

                <div class="card-header">

                    <div class="header-icon">
                        +
                    </div>

                    <div>

                        <h2>
                            Appointment Details
                        </h2>

                        <p>
                            Fill in the information below to request
                            an appointment.
                        </p>

                    </div>

                </div>


                <!-- CLINIC -->

                <div class="clinic-banner">

                    <div class="clinic-banner-title">

                        <div class="clinic-banner-icon">
                            +
                        </div>

                        Lapu-Lapu City College School Clinic

                    </div>

                    <p>
                        This MediQueue system is exclusively for the
                        Lapu-Lapu City College School Clinic.
                    </p>

                </div>


                <!-- FORM -->

                <form
                    method="POST"
                    action="{{ route('student.appointments.store') }}"
                    id="appointmentForm"
                >

                    @csrf


                    <div class="form-grid">


                        <!-- DATE -->

                        <div class="form-group">

                            <label for="appointment_date">

                                Appointment Date

                                <span class="required">
                                    *
                                </span>

                            </label>

                            <input
                                type="date"
                                id="appointment_date"
                                name="appointment_date"
                                value="{{ old('appointment_date') }}"
                                min="{{ date('Y-m-d') }}"
                                required
                            >

                            <div class="hint">
                                Choose your preferred clinic visit date.
                            </div>

                            @error('appointment_date')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- CUSTOM TIME -->

                        <div class="form-group">

                            <label for="appointment_time">

                                Appointment Time

                                <span class="required">
                                    *
                                </span>

                            </label>

                            <div class="time-picker-wrapper">

                                <!-- Hidden value sent to Laravel -->

                                <input
                                    type="hidden"
                                    id="appointment_time"
                                    name="appointment_time"
                                    value="{{ old('appointment_time') }}"
                                    required
                                >


                                <!-- Visible time field -->

                                <div
                                    class="time-display placeholder"
                                    id="timeDisplay"
                                    tabindex="0"
                                >

                                    <span id="selectedTime">
                                        Select appointment time
                                    </span>

                                    <span class="clock-icon">
                                        ◷
                                    </span>

                                </div>


                                <!-- TIME DROPDOWN -->

                                <div
                                    class="time-dropdown"
                                    id="timeDropdown"
                                >

                                    <div class="time-picker-columns">


                                        <!-- HOUR COLUMN -->

                                        <div class="time-column">

                                            <div class="time-column-title">
                                                Hour
                                            </div>

                                            <div
                                                class="time-options"
                                                id="hourOptions"
                                            >

                                                <!-- JavaScript generates hours -->

                                            </div>

                                        </div>


                                        <!-- MINUTE COLUMN -->

                                        <div class="time-column">

                                            <div class="time-column-title">
                                                Minute
                                            </div>

                                            <div
                                                class="time-options"
                                                id="minuteOptions"
                                            >

                                                <!-- JavaScript generates minutes -->

                                            </div>

                                        </div>


                                    </div>


                                    <!-- SELECTED TIME -->

                                    <div class="selected-time-preview">

                                        <span>
                                            Selected:
                                        </span>

                                        <strong id="timePreview">
                                            Select time
                                        </strong>

                                    </div>


                                    <!-- CONFIRM -->

                                    <button
                                        type="button"
                                        class="confirm-time-btn"
                                        id="confirmTime"
                                    >
                                        Select Time
                                    </button>

                                </div>

                            </div>


                            <div class="hint">
                                Nurse availability: 8:00 AM - 11:29 AM and 1:00 PM - 4:30 PM.
                            </div>


                            @error('appointment_time')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- REASON -->

                        <div class="form-group full">

                            <label for="reason">
                                Reason / Health Concern
                            </label>

                            <textarea
                                id="reason"
                                name="reason"
                                maxlength="1000"
                                placeholder="Describe your reason for visiting the clinic..."
                            >{{ old('reason') }}</textarea>

                            <div class="hint">
                                Briefly describe your concern so the
                                clinic nurse knows what your visit is about.
                            </div>

                            @error('reason')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                    </div>


                    <!-- BUTTONS -->

                    <div class="actions">

                        <a
                            href="{{ route('user.dashboard') }}"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Submit Appointment
                        </button>

                    </div>

                </form>

            </section>


            <!-- RIGHT SIDE -->

            <aside>


                <!-- CLINIC INFO -->

                <div class="card info-card">

                    <h3>
                        Clinic Information
                    </h3>


                    <div class="info-item">

                        <div class="info-icon">
                            +
                        </div>

                        <div class="info-text">

                            <strong>
                                Lapu-Lapu City College
                            </strong>

                            <span>
                                School Clinic
                            </span>

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-icon">
                            ◷
                        </div>

                        <div class="info-text">

                            <strong>
                                Clinic Hours
                            </strong>

                            <span>
                                Monday - Friday<br>
                                8:00 AM - 5:00 PM
                            </span>

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-icon">
                            !
                        </div>

                        <div class="info-text">

                            <strong>
                                Important
                            </strong>

                            <span>
                                Your appointment request must be
                                approved by the clinic nurse before
                                you receive a queue number.
                            </span>

                        </div>

                    </div>

                </div>


                <!-- HOW IT WORKS -->

                <div class="card info-card">

                    <h3>
                        How It Works
                    </h3>


                    <div class="steps">


                        <div class="step">

                            <div class="step-number">
                                1
                            </div>

                            <div class="step-text">

                                <strong>
                                    Choose Date & Time
                                </strong>

                                <span>
                                    Select when you would like
                                    to visit the clinic.
                                </span>

                            </div>

                        </div>


                        <div class="step">

                            <div class="step-number">
                                2
                            </div>

                            <div class="step-text">

                                <strong>
                                    Submit Request
                                </strong>

                                <span>
                                    Tell us the reason for your
                                    clinic visit.
                                </span>

                            </div>

                        </div>


                        <div class="step">

                            <div class="step-number">
                                3
                            </div>

                            <div class="step-text">

                                <strong>
                                    Nurse Approval
                                </strong>

                                <span>
                                    The clinic nurse reviews
                                    your appointment.
                                </span>

                            </div>

                        </div>


                        <div class="step">

                            <div class="step-number">
                                4
                            </div>

                            <div class="step-text">

                                <strong>
                                    Receive Queue Number
                                </strong>

                                <span>
                                    Once approved, your queue
                                    number will be assigned.
                                </span>

                            </div>

                        </div>


                    </div>

                </div>


            </aside>

        </div>

    </main>

</div>


<!-- =====================================================
     CUSTOM TIME PICKER JAVASCRIPT
===================================================== -->

<script>

    const timeDisplay =
        document.getElementById('timeDisplay');

    const timeDropdown =
        document.getElementById('timeDropdown');

    const selectedTime =
        document.getElementById('selectedTime');

    const appointmentTime =
        document.getElementById('appointment_time');

    const hourOptions =
        document.getElementById('hourOptions');

    const minuteOptions =
        document.getElementById('minuteOptions');

    const timePreview =
        document.getElementById('timePreview');

    const confirmTime =
        document.getElementById('confirmTime');

    const appointmentForm =
        document.getElementById('appointmentForm');


    let selectedHour = null;
    let selectedMinute = null;


    /*
    =====================================================
    ALLOWED HOURS

    8 AM
    9 AM
    10 AM
    11 AM
    ----------------
    1 PM
    2 PM
    3 PM
    4 PM

    12 PM IS NOT AVAILABLE.
    =====================================================
    */

    const allowedHours = [

        {
            hour: 8,
            display: '8 AM',
            value: 8
        },

        {
            hour: 9,
            display: '9 AM',
            value: 9
        },

        {
            hour: 10,
            display: '10 AM',
            value: 10
        },

        {
            hour: 11,
            display: '11 AM',
            value: 11
        },

        {
            separator: true
        },

        {
            hour: 1,
            display: '1 PM',
            value: 13
        },

        {
            hour: 2,
            display: '2 PM',
            value: 14
        },

        {
            hour: 3,
            display: '3 PM',
            value: 15
        },

        {
            hour: 4,
            display: '4 PM',
            value: 16
        }

    ];


    /*
    =====================================================
    CREATE HOUR BUTTONS
    =====================================================
    */

    allowedHours.forEach(function(item) {

        if (item.separator) {

            const separator =
                document.createElement('div');

            separator.style.height = '1px';
            separator.style.background = '#dfe5ed';
            separator.style.margin = '6px 4px';

            hourOptions.appendChild(separator);

            return;
        }


        const button =
            document.createElement('button');

        button.type = 'button';

        button.className = 'time-option';

        button.dataset.hour =
            item.value;

        button.dataset.display =
            item.display;

        button.textContent =
            item.display;


        button.addEventListener('click', function() {

            /*
             Remove previous hour selection
            */

            document
                .querySelectorAll('#hourOptions .time-option')
                .forEach(function(option) {

                    option.classList.remove('selected');

                });


            /*
             Select current hour
            */

            this.classList.add('selected');


            selectedHour =
                Number(this.dataset.hour);


            /*
             Update available minutes.
            */

            updateMinuteAvailability();

            updatePreview();

        });


        hourOptions.appendChild(button);

    });


    /*
    =====================================================
    CREATE MINUTE BUTTONS

    00
    01
    02
    ...
    59
    =====================================================
    */

    for (let minute = 0; minute <= 59; minute++) {

        const button =
            document.createElement('button');

        button.type = 'button';

        button.className = 'time-option';

        button.dataset.minute =
            minute;

        button.textContent =
            String(minute).padStart(2, '0');


        button.addEventListener('click', function() {

            if (this.classList.contains('disabled')) {
                return;
            }


            /*
             Remove previous minute selection
            */

            document
                .querySelectorAll('#minuteOptions .time-option')
                .forEach(function(option) {

                    option.classList.remove('selected');

                });


            /*
             Select minute
            */

            this.classList.add('selected');


            selectedMinute =
                Number(this.dataset.minute);


            updatePreview();

        });


        minuteOptions.appendChild(button);

    }


    /*
    =====================================================
    MINUTE AVAILABILITY

    8 AM - 10 AM
    00-59 available

    11 AM
    00-29 available
    30-59 unavailable

    1 PM - 3 PM
    00-59 available

    4 PM
    00-30 available
    31-59 unavailable
    =====================================================
    */

    function updateMinuteAvailability() {

        const minuteButtons =
            document.querySelectorAll(
                '#minuteOptions .time-option'
            );


        minuteButtons.forEach(function(button) {

            const minute =
                Number(button.dataset.minute);


            let disabled = false;


            /*
             11:30 AM - 11:59 AM unavailable
            */

            if (
                selectedHour === 11 &&
                minute >= 30
            ) {

                disabled = true;

            }


            /*
             4:31 PM - 4:59 PM unavailable
            */

            if (
                selectedHour === 16 &&
                minute > 30
            ) {

                disabled = true;

            }


            if (disabled) {

                button.classList.add('disabled');

                button.classList.remove('selected');


                if (selectedMinute === minute) {

                    selectedMinute = null;

                }

            } else {

                button.classList.remove('disabled');

            }

        });


        updatePreview();

    }


    /*
    =====================================================
    UPDATE PREVIEW
    =====================================================
    */

    function updatePreview() {

        if (
            selectedHour === null ||
            selectedMinute === null
        ) {

            timePreview.textContent =
                'Select time';

            return;

        }


        const displayHour =
            convertTo12Hour(selectedHour);


        const period =
            selectedHour >= 12
                ? 'PM'
                : 'AM';


        const formattedMinute =
            String(selectedMinute)
                .padStart(2, '0');


        timePreview.textContent =
            displayHour +
            ':' +
            formattedMinute +
            ' ' +
            period;

    }


    /*
    =====================================================
    CONVERT 24-HOUR TO 12-HOUR
    =====================================================
    */

    function convertTo12Hour(hour) {

        if (hour === 0) {
            return 12;
        }

        if (hour > 12) {
            return hour - 12;
        }

        return hour;

    }


    /*
    =====================================================
    OPEN / CLOSE PICKER
    =====================================================
    */

    timeDisplay.addEventListener('click', function(event) {

        event.stopPropagation();

        timeDropdown.classList.toggle('show');

        timeDisplay.classList.toggle('open');

    });


    /*
    =====================================================
    CONFIRM TIME
    =====================================================
    */

    confirmTime.addEventListener('click', function() {

        /*
         Make sure hour and minute are selected.
        */

        if (
            selectedHour === null ||
            selectedMinute === null
        ) {

            alert('Please select both an hour and minute.');

            return;

        }


        /*
         BLOCK 11:30 AM - 12:59 PM
        */

        if (
            selectedHour === 11 &&
            selectedMinute >= 30
        ) {

            alert(
                'The nurse is unavailable from 11:30 AM to 1:00 PM.'
            );

            return;

        }


        /*
         BLOCK 12 PM

         This is also protected here in case
         someone manually modifies the page.
        */

        if (selectedHour === 12) {

            alert(
                'The nurse is unavailable from 11:30 AM to 1:00 PM.'
            );

            return;

        }


        /*
         BLOCK AFTER 4:30 PM
        */

        if (
            selectedHour === 16 &&
            selectedMinute > 30
        ) {

            alert(
                'The latest appointment time is 4:30 PM.'
            );

            return;

        }


        /*
         Convert selected time to 24-hour format.

         Example:

         9:15 AM
         =
         09:15

         2:20 PM
         =
         14:20
        */

        const hour24 =
            selectedHour;


        /*
         Store actual value for Laravel.
        */

        appointmentTime.value =
            String(hour24).padStart(2, '0') +
            ':' +
            String(selectedMinute).padStart(2, '0');


        /*
         Display nice format.
        */

        const displayHour =
            convertTo12Hour(hour24);

        const period =
            hour24 >= 12
                ? 'PM'
                : 'AM';


        const formattedMinute =
            String(selectedMinute)
                .padStart(2, '0');


        selectedTime.textContent =
            displayHour +
            ':' +
            formattedMinute +
            ' ' +
            period;


        timeDisplay.classList.remove(
            'placeholder'
        );

        timeDisplay.classList.remove(
            'open'
        );


        timeDropdown.classList.remove(
            'show'
        );

    });


    /*
    =====================================================
    CLOSE WHEN CLICKING OUTSIDE
    =====================================================
    */

    document.addEventListener('click', function(event) {

        if (
            !timeDisplay.contains(event.target) &&
            !timeDropdown.contains(event.target)
        ) {

            timeDropdown.classList.remove(
                'show'
            );

            timeDisplay.classList.remove(
                'open'
            );

        }

    });


    /*
    =====================================================
    RESTORE OLD TIME AFTER VALIDATION ERROR
    =====================================================
    */

    const oldTime =
        appointmentTime.value;


    if (oldTime) {

        const parts =
            oldTime.split(':');


        if (parts.length === 2) {

            let hour =
                parseInt(parts[0], 10);

            let minute =
                parseInt(parts[1], 10);


            /*
             Only restore valid available times.
            */

            const validTime =

                (
                    hour >= 8 &&
                    hour <= 10
                )

                ||

                (
                    hour === 11 &&
                    minute <= 29
                )

                ||

                (
                    hour >= 13 &&
                    hour <= 15
                )

                ||

                (
                    hour === 16 &&
                    minute <= 30
                );


            if (validTime) {

                selectedHour =
                    hour;

                selectedMinute =
                    minute;


                /*
                 Find matching hour.
                */

                document
                    .querySelectorAll(
                        '#hourOptions .time-option'
                    )
                    .forEach(function(option) {

                        if (
                            Number(option.dataset.hour) === hour
                        ) {

                            option.classList.add(
                                'selected'
                            );

                        }

                    });


                /*
                 Find matching minute.
                */

                document
                    .querySelectorAll(
                        '#minuteOptions .time-option'
                    )
                    .forEach(function(option) {

                        if (
                            Number(option.dataset.minute) === minute
                        ) {

                            option.classList.add(
                                'selected'
                            );

                        }

                    });


                updateMinuteAvailability();


                const displayHour =
                    convertTo12Hour(hour);

                const period =
                    hour >= 12
                        ? 'PM'
                        : 'AM';


                selectedTime.textContent =
                    displayHour +
                    ':' +
                    String(minute).padStart(2, '0') +
                    ' ' +
                    period;


                timeDisplay.classList.remove(
                    'placeholder'
                );


                updatePreview();

            }

        }

    }


    /*
    =====================================================
    PREVENT FORM SUBMISSION WITHOUT VALID TIME
    =====================================================
    */

    appointmentForm.addEventListener(
        'submit',
        function(event) {

            if (!appointmentTime.value) {

                event.preventDefault();

                alert(
                    'Please select an available appointment time.'
                );

                timeDropdown.classList.add(
                    'show'
                );

                timeDisplay.classList.add(
                    'open'
                );

            }

        }
    );

</script>

</body>
</html>