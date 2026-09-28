<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediQueue — Nurse Profile</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #1f2937;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

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
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px;
            margin-bottom: 35px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
            box-shadow: 0 6px 15px rgba(37, 99, 235, .2);
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
            letter-spacing: .6px;
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
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            box-shadow: 0 7px 18px rgba(37, 99, 235, .18);
        }

        .nav-icon {
            width: 20px;
            text-align: center;
        }

        /* =====================================================
           MAIN
        ===================================================== */

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

        .top-user {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .top-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #dbeafe;
        }

        .top-avatar-letter {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .top-name {
            font-size: 14px;
            font-weight: 700;
        }

        .top-role {
            font-size: 12px;
            color: #64748b;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            padding: 32px 35px;
            max-width: 1300px;
        }

        .welcome {
            margin-bottom: 24px;
        }

        .welcome h1 {
            font-size: 25px;
            margin-bottom: 6px;
        }

        .welcome p {
            color: #6b7280;
            font-size: 14px;
        }

        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
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

        /* =====================================================
           PROFILE HEADER
        ===================================================== */

        .profile-header {
            position: relative;
            min-height: 245px;

            background:
                linear-gradient(
                    135deg,
                    #1e40af 0%,
                    #2563eb 55%,
                    #60a5fa 100%
                );

            border-radius: 20px;
            margin-bottom: 23px;
            overflow: hidden;

            box-shadow: 0 15px 35px rgba(37, 99, 235, .20);
        }

        .profile-header::before {
            content: "";
            position: absolute;

            width: 330px;
            height: 330px;

            border-radius: 50%;

            background: rgba(255,255,255,.07);

            right: -110px;
            top: -170px;
        }

        .profile-header::after {
            content: "";
            position: absolute;

            width: 190px;
            height: 190px;

            border-radius: 50%;

            background: rgba(255,255,255,.05);

            right: 220px;
            bottom: -130px;
        }

        .profile-header-content {
            position: relative;
            z-index: 2;

            min-height: 245px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 32px 38px;
        }

        /* =====================================================
           PROFILE INFORMATION
        ===================================================== */

        .profile-info {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .profile-small-icon {
            width: 65px;
            height: 65px;

            border-radius: 16px;

            background: rgba(255,255,255,.13);

            border: 1px solid rgba(255,255,255,.20);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 28px;

            box-shadow: 0 8px 20px rgba(0,0,0,.10);
        }

        .profile-info h2 {
            font-size: 29px;
            color: white;
            margin-bottom: 7px;
        }

        .profile-info p {
            color: rgba(255,255,255,.82);
            font-size: 14px;
            margin-bottom: 13px;
        }

        /* =====================================================
           DYNAMIC STATUS BADGE
        ===================================================== */

        .active-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 7px 13px;

            border-radius: 20px;

            background: rgba(255,255,255,.14);

            border: 1px solid rgba(255,255,255,.12);

            font-size: 12px;
            font-weight: 700;

            color: white;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .status-in {
            background: #22c55e;
            box-shadow: 0 0 8px rgba(34,197,94,.8);
        }

        .status-out {
            background: #ef4444;
            box-shadow: 0 0 8px rgba(239,68,68,.8);
        }

        .status-busy {
            background: #92400e;
            box-shadow: 0 0 8px rgba(146,64,14,.8);
        }

        /* =====================================================
           PROFILE PHOTO BOX
        ===================================================== */

        .photo-box {
            width: 205px;
            height: 180px;

            background: rgba(255,255,255,.12);

            border: 1px solid rgba(255,255,255,.28);

            border-radius: 18px;

            padding: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow:
                0 15px 30px rgba(0,0,0,.13),
                inset 0 1px 0 rgba(255,255,255,.15);

            backdrop-filter: blur(5px);
        }

        .profile-photo {
            width: 100%;
            height: 100%;

            object-fit: cover;

            border-radius: 12px;

            background: #dbeafe;

            border: 3px solid rgba(255,255,255,.9);

            box-shadow: 0 8px 20px rgba(0,0,0,.18);
        }

        .profile-letter {
            width: 100%;
            height: 100%;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255,255,255,.13);

            border: 3px solid rgba(255,255,255,.9);

            color: white;

            font-size: 55px;
            font-weight: 800;
        }

        .photo-label {
            position: absolute;

            right: 16px;
            bottom: 12px;

            background: white;
            color: #2563eb;

            padding: 5px 9px;

            border-radius: 7px;

            font-size: 10px;
            font-weight: 800;

            box-shadow: 0 4px 12px rgba(0,0,0,.15);
        }

        .photo-container {
            position: relative;
        }

        /* =====================================================
           GRID
        ===================================================== */

        .grid {
            display: grid;
            grid-template-columns: 1.3fr .7fr;
            gap: 22px;
        }

        .card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 15px;

            padding: 24px;

            box-shadow: 0 5px 18px rgba(15,23,42,.04);
        }

        .card-header {
            margin-bottom: 20px;
        }

        .card-header h3 {
            font-size: 18px;
            color: #111827;
        }

        .card-header p {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
        }

        /* =====================================================
           FORM
        ===================================================== */

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            font-size: 12px;
            font-weight: 700;

            color: #475569;

            margin-bottom: 7px;
        }

        .form-control {
            width: 100%;

            padding: 12px 13px;

            border: 1px solid #d1d5db;

            border-radius: 9px;

            font-size: 14px;

            outline: none;

            transition: .2s;
        }

        .form-control:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37,99,235,.08);
        }

        /* =====================================================
           AVAILABILITY
        ===================================================== */

        .availability-card {
            margin-top: 22px;
        }

        .status-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .status-option {
            position: relative;
        }

        .status-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .status-option label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            min-height: 105px;

            border: 2px solid #e5e7eb;
            border-radius: 13px;

            background: #fff;

            cursor: pointer;

            transition: .2s;

            text-align: center;
        }

        .status-option label:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(15,23,42,.08);
        }

        .status-circle {
            width: 18px;
            height: 18px;

            border-radius: 50%;

            margin-bottom: 8px;
        }

        .status-option .in-circle {
            background: #22c55e;
        }

        .status-option .out-circle {
            background: #ef4444;
        }

        .status-option .busy-circle {
            background: #92400e;
        }

        .status-option strong {
            font-size: 14px;
            color: #334155;
        }

        .status-option small {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 10px;
        }

        /* SELECTED STATES */

        .status-option input[value="in"]:checked + label {
            border-color: #22c55e;
            background: #f0fdf4;
            box-shadow: 0 5px 15px rgba(34,197,94,.12);
        }

        .status-option input[value="out"]:checked + label {
            border-color: #ef4444;
            background: #fef2f2;
            box-shadow: 0 5px 15px rgba(239,68,68,.12);
        }

        .status-option input[value="busy"]:checked + label {
            border-color: #92400e;
            background: #fff7ed;
            box-shadow: 0 5px 15px rgba(146,64,14,.12);
        }

        /* =====================================================
           POSITION
        ===================================================== */

        .position-section {
            margin-top: 20px;
        }

        .position-section label {
            display: block;

            font-size: 12px;
            font-weight: 700;

            color: #475569;

            margin-bottom: 7px;
        }

        .position-select {
            width: 100%;

            padding: 13px;

            border: 1px solid #d1d5db;

            border-radius: 9px;

            background: white;

            font-size: 14px;

            color: #334155;

            cursor: pointer;

            outline: none;
        }

        .position-select:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37,99,235,.08);
        }

        .availability-info {
            margin-top: 15px;

            padding: 12px 14px;

            border-radius: 10px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            font-size: 12px;

            color: #64748b;

            line-height: 1.6;
        }

        /* =====================================================
           PHOTO UPLOAD
        ===================================================== */

        .photo-upload {
            border: 2px dashed #bfdbfe;

            background: #f8fbff;

            border-radius: 12px;

            padding: 18px;

            text-align: center;

            margin-bottom: 20px;
        }

        .photo-upload-icon {
            width: 45px;
            height: 45px;

            margin: 0 auto 8px;

            border-radius: 12px;

            background: #dbeafe;
            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
        }

        .photo-upload-title {
            font-size: 14px;
            font-weight: 700;
            color: #334155;
        }

        .photo-upload input {
            margin-top: 10px;
            font-size: 13px;
        }

        .photo-help {
            color: #94a3b8;
            font-size: 11px;
            margin-top: 7px;
        }

        /* =====================================================
           BUTTONS
        ===================================================== */

        .save-btn {
            width: 100%;

            border: none;

            background: linear-gradient(
                135deg,
                #2563eb,
                #3b82f6
            );

            color: white;

            padding: 13px;

            border-radius: 9px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 7px 18px rgba(37,99,235,.2);

            transition: .2s;
        }

        .save-btn:hover {
            transform: translateY(-1px);

            box-shadow:
                0 10px 22px rgba(37,99,235,.25);
        }

        .remove-btn {
            width: 100%;

            margin-top: 10px;

            border: 1px solid #fecaca;

            background: #fff5f5;

            color: #dc2626;

            padding: 11px;

            border-radius: 9px;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;
        }

        .remove-btn:hover {
            background: #fee2e2;
        }

        /* =====================================================
           ROLE CARD
        ===================================================== */

        .role-box {
            background: #eff6ff;

            border: 1px solid #dbeafe;

            border-radius: 12px;

            padding: 18px;
        }

        .role-title {
            font-size: 15px;

            font-weight: 700;

            color: #1e40af;

            margin-bottom: 7px;
        }

        .role-text {
            font-size: 12px;

            color: #64748b;

            line-height: 1.7;
        }

        /* =====================================================
           ACCOUNT
        ===================================================== */

        .account-item {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 13px 0;

            border-bottom: 1px solid #f1f5f9;
        }

        .account-item:last-child {
            border-bottom: none;
        }

        .account-icon {
            width: 36px;
            height: 36px;

            background: #f1f5f9;

            color: #64748b;

            border-radius: 9px;

            display: flex;

            align-items: center;
            justify-content: center;
        }

        .account-label {
            font-size: 11px;

            color: #94a3b8;

            margin-bottom: 3px;
        }

        .account-value {
            font-size: 13px;

            font-weight: 600;

            color: #334155;

            word-break: break-word;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width:1000px) {

            .grid {
                grid-template-columns: 1fr;
            }

        }

        @media(max-width:700px) {

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
            }

            .content {
                padding: 20px 15px;
            }

            .profile-header-content {
                flex-direction: column;

                align-items: flex-start;

                gap: 25px;
            }

            .profile-info {
                width: 100%;
            }

            .photo-container {
                width: 100%;

                display: flex;
                justify-content: center;
            }

            .photo-box {
                width: 190px;
                height: 160px;
            }

            .status-options {
                grid-template-columns: 1fr;
            }

        }

    </style>
</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

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

        <a href="{{ route('nurse.students') }}">
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

        <a href="{{ route('nurse.profile') }}" class="active">
            <span class="nav-icon">⚙</span>
            Profile
        </a>

    </nav>

</aside>


<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">

        <div>

            <div class="page-title">
                Nurse Profile
            </div>

            <div class="page-subtitle">
                Manage your account and availability
            </div>

        </div>


        <div class="top-user">

            @if($user->profile_photo)

                <img
                    src="{{ asset('storage/' . $user->profile_photo) }}"
                    class="top-avatar"
                    alt="Profile"
                >

            @else

                <div class="top-avatar-letter">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

            @endif


            <div>

                <div class="top-name">
                    {{ $user->name }}
                </div>

                <div class="top-role">
                    {{ $user->nurse_position ?? 'Nurse' }}
                </div>

            </div>

        </div>

    </header>


    <!-- =================================================
         CONTENT
    ================================================= -->

    <section class="content">


        <div class="welcome">

            <h1>
                Your Profile
            </h1>

            <p>
                Manage your account, position, and clinic availability.
            </p>

        </div>


        <!-- ALERTS -->

        @if(session('success'))

            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-error">

                <ul style="padding-left:18px;">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =================================================
             PROFILE HEADER
        ================================================= -->

        <div class="profile-header">

            <div class="profile-header-content">


                <!-- LEFT -->

                <div class="profile-info">

                    <div class="profile-small-icon">
                        ✚
                    </div>


                    <div>

                        <h2>
                            {{ $user->name }}
                        </h2>

                        <p>
                            {{ $user->nurse_position ?? 'MediQueue Clinic Nurse' }}
                        </p>


                        <div class="active-status">

                            @if(($user->nurse_status ?? 'in') === 'in')

                                <span class="status-dot status-in"></span>
                                IN — Available

                            @elseif(($user->nurse_status ?? 'in') === 'out')

                                <span class="status-dot status-out"></span>
                                OUT — Unavailable

                            @else

                                <span class="status-dot status-busy"></span>
                                BUSY — With Student

                            @endif

                        </div>

                    </div>

                </div>


                <!-- RIGHT PHOTO -->

                <div class="photo-container">

                    <div class="photo-box">

                        @if($user->profile_photo)

                            <img
                                src="{{ asset('storage/' . $user->profile_photo) }}"
                                class="profile-photo"
                                alt="Nurse Profile"
                            >

                        @else

                            <div class="profile-letter">

                                {{ strtoupper(substr($user->name, 0, 1)) }}

                            </div>

                        @endif

                    </div>

                    <div class="photo-label">
                        PROFILE PHOTO
                    </div>

                </div>


            </div>

        </div>


        <!-- =================================================
             GRID
        ================================================= -->

        <div class="grid">


            <!-- =================================================
                 LEFT SIDE
            ================================================= -->

            <div>


                <!-- EDIT PROFILE -->

                <div class="card">

                    <div class="card-header">

                        <h3>
                            Edit Profile
                        </h3>

                        <p>
                            Update your personal information and profile picture.
                        </p>

                    </div>


                    <form
                        action="{{ route('nurse.profile.update') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


                        <!-- PHOTO -->

                        <div class="photo-upload">

                            <div class="photo-upload-icon">
                                📷
                            </div>

                            <div class="photo-upload-title">
                                Change Profile Picture
                            </div>

                            <input
                                type="file"
                                name="profile_photo"
                                accept="image/png,image/jpeg,image/webp"
                            >

                            <div class="photo-help">
                                JPG, PNG or WEBP • Maximum 2MB
                            </div>

                        </div>


                        <!-- NAME -->

                        <div class="form-group">

                            <label>
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $user->name) }}"
                                required
                            >

                        </div>


                        <!-- EMAIL -->

                        <div class="form-group">

                            <label>
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $user->email) }}"
                                required
                            >

                        </div>


                        <!-- ROLE -->

                        <div class="form-group">

                            <label>
                                Account Role
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="Nurse"
                                disabled
                            >

                        </div>


                        <button
                            type="submit"
                            class="save-btn"
                        >
                            ✓ &nbsp; Save Profile Changes
                        </button>

                    </form>


                    <!-- REMOVE PHOTO -->

                    @if($user->profile_photo)

                        <form
                            action="{{ route('nurse.profile.photo.remove') }}"
                            method="POST"
                            onsubmit="return confirm('Remove your profile picture?');"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="remove-btn"
                            >
                                Remove Profile Picture
                            </button>

                        </form>

                    @endif

                </div>


                <!-- =================================================
                     AVAILABILITY CARD
                ================================================= -->

                <div class="card availability-card">

                    <div class="card-header">

                        <h3>
                            Nurse Availability
                        </h3>

                        <p>
                            Let students know your current clinic status.
                        </p>

                    </div>


                    <form
                        action="{{ route('nurse.profile.update') }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        <!-- STATUS -->

                        <div class="form-group">

                            <label>
                                Current Status
                            </label>


                            <div class="status-options">


                                <!-- IN -->

                                <div class="status-option">

                                    <input
                                        type="radio"
                                        name="nurse_status"
                                        id="status-in"
                                        value="in"
                                        {{ old('nurse_status', $user->nurse_status ?? 'in') === 'in' ? 'checked' : '' }}
                                    >

                                    <label for="status-in">

                                        <span class="status-circle in-circle"></span>

                                        <strong>
                                            IN
                                        </strong>

                                        <small>
                                            Available
                                        </small>

                                    </label>

                                </div>


                                <!-- OUT -->

                                <div class="status-option">

                                    <input
                                        type="radio"
                                        name="nurse_status"
                                        id="status-out"
                                        value="out"
                                        {{ old('nurse_status', $user->nurse_status ?? 'in') === 'out' ? 'checked' : '' }}
                                    >

                                    <label for="status-out">

                                        <span class="status-circle out-circle"></span>

                                        <strong>
                                            OUT
                                        </strong>

                                        <small>
                                            Unavailable
                                        </small>

                                    </label>

                                </div>


                                <!-- BUSY -->

                                <div class="status-option">

                                    <input
                                        type="radio"
                                        name="nurse_status"
                                        id="status-busy"
                                        value="busy"
                                        {{ old('nurse_status', $user->nurse_status ?? 'in') === 'busy' ? 'checked' : '' }}
                                    >

                                    <label for="status-busy">

                                        <span class="status-circle busy-circle"></span>

                                        <strong>
                                            BUSY
                                        </strong>

                                        <small>
                                            With Student
                                        </small>

                                    </label>

                                </div>


                            </div>

                        </div>


                        <!-- POSITION -->

                        <div class="position-section">

                            <label for="nurse_position">
                                Current Position
                            </label>

                            <select
                                name="nurse_position"
                                id="nurse_position"
                                class="position-select"
                            >

                                <option
                                    value=""
                                    {{ old('nurse_position', $user->nurse_position) == '' ? 'selected' : '' }}
                                >
                                    Select your position
                                </option>

                                <option
                                    value="Clinic Nurse"
                                    {{ old('nurse_position', $user->nurse_position) == 'Clinic Nurse' ? 'selected' : '' }}
                                >
                                    Clinic Nurse
                                </option>

                                <option
                                    value="Head Nurse"
                                    {{ old('nurse_position', $user->nurse_position) == 'Head Nurse' ? 'selected' : '' }}
                                >
                                    Head Nurse
                                </option>

                                <option
                                    value="School Nurse"
                                    {{ old('nurse_position', $user->nurse_position) == 'School Nurse' ? 'selected' : '' }}
                                >
                                    School Nurse
                                </option>

                                <option
                                    value="Clinic Assistant"
                                    {{ old('nurse_position', $user->nurse_position) == 'Clinic Assistant' ? 'selected' : '' }}
                                >
                                    Clinic Assistant
                                </option>

                            </select>

                        </div>


                        <div class="availability-info">

                            💡 Your status will be shown to students so they know
                            whether the nurse is available before booking or visiting
                            the clinic.

                        </div>


                        <button
                            type="submit"
                            class="save-btn"
                            style="margin-top:15px;"
                        >
                            ✓ &nbsp; Update Availability
                        </button>

                    </form>

                </div>

            </div>


            <!-- =================================================
                 RIGHT SIDE
            ================================================= -->

            <div>


                <!-- NURSE ROLE -->

                <div class="card">

                    <div class="card-header">

                        <h3>
                            Nurse Role
                        </h3>

                        <p>
                            Your responsibility in MediQueue
                        </p>

                    </div>


                    <div class="role-box">

                        <div class="role-title">
                            ✚ {{ $user->nurse_position ?? 'Clinic Nurse' }}
                        </div>

                        <div class="role-text">

                            Manage student clinic visits,
                            appointments, queue operations,
                            consultations and medical records.

                        </div>

                    </div>

                </div>


                <!-- CURRENT AVAILABILITY -->

                <div
                    class="card"
                    style="margin-top:22px;"
                >

                    <div class="card-header">

                        <h3>
                            Current Availability
                        </h3>

                        <p>
                            What students currently see
                        </p>

                    </div>


                    <div class="role-box">

                        @if(($user->nurse_status ?? 'in') === 'in')

                            <div
                                class="role-title"
                                style="color:#16a34a;"
                            >
                                🟢 IN — Available
                            </div>

                            <div class="role-text">
                                The nurse is currently available
                                at the clinic.
                            </div>

                        @elseif(($user->nurse_status ?? 'in') === 'out')

                            <div
                                class="role-title"
                                style="color:#dc2626;"
                            >
                                🔴 OUT — Unavailable
                            </div>

                            <div class="role-text">
                                The nurse is currently unavailable.
                                Students should check again later.
                            </div>

                        @else

                            <div
                                class="role-title"
                                style="color:#92400e;"
                            >
                                🟤 BUSY — With Student
                            </div>

                            <div class="role-text">
                                The nurse is currently attending
                                to a student.
                            </div>

                        @endif

                    </div>

                </div>


                <!-- ACCOUNT DETAILS -->

                <div
                    class="card"
                    style="margin-top:22px;"
                >

                    <div class="card-header">

                        <h3>
                            Account Details
                        </h3>

                        <p>
                            Current account information
                        </p>

                    </div>


                    <!-- NAME -->

                    <div class="account-item">

                        <div class="account-icon">
                            ♙
                        </div>

                        <div>

                            <div class="account-label">
                                Name
                            </div>

                            <div class="account-value">
                                {{ $user->name }}
                            </div>

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div class="account-item">

                        <div class="account-icon">
                            ✉
                        </div>

                        <div>

                            <div class="account-label">
                                Email
                            </div>

                            <div class="account-value">
                                {{ $user->email }}
                            </div>

                        </div>

                    </div>


                    <!-- POSITION -->

                    <div class="account-item">

                        <div class="account-icon">
                            ★
                        </div>

                        <div>

                            <div class="account-label">
                                Position
                            </div>

                            <div class="account-value">
                                {{ $user->nurse_position ?? 'Not set' }}
                            </div>

                        </div>

                    </div>


                    <!-- STATUS -->

                    <div class="account-item">

                        <div class="account-icon">
                            ●
                        </div>

                        <div>

                            <div class="account-label">
                                Availability
                            </div>

                            <div
                                class="account-value"
                                style="
                                    @if(($user->nurse_status ?? 'in') === 'in')
                                        color:#16a34a;
                                    @elseif(($user->nurse_status ?? 'in') === 'out')
                                        color:#dc2626;
                                    @else
                                        color:#92400e;
                                    @endif
                                "
                            >

                                @if(($user->nurse_status ?? 'in') === 'in')
                                    IN
                                @elseif(($user->nurse_status ?? 'in') === 'out')
                                    OUT
                                @else
                                    BUSY
                                @endif

                            </div>

                        </div>

                    </div>


                    <!-- ROLE -->

                    <div class="account-item">

                        <div class="account-icon">
                            ★
                        </div>

                        <div>

                            <div class="account-label">
                                Account Role
                            </div>

                            <div class="account-value">
                                {{ ucfirst($user->role) }}
                            </div>

                        </div>

                    </div>


                    <!-- MEMBER SINCE -->

                    @if($user->created_at)

                        <div class="account-item">

                            <div class="account-icon">
                                ◷
                            </div>

                            <div>

                                <div class="account-label">
                                    Member Since
                                </div>

                                <div class="account-value">
                                    {{ $user->created_at->format('F d, Y') }}
                                </div>

                            </div>

                        </div>

                    @endif


                </div>

            </div>


        </div>


    </section>

</main>


</body>
</html>

