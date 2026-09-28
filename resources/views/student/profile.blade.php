<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - MediQueue</title>

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
            background: #fff;
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
            border-radius: 12px;
            background: #0d6efd;
            color: #fff;
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
            color: #202938;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #8a94a6;
            font-size: 13px;
        }

        .top-avatar {
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

        /* PROFILE HEADER */
        .profile-header {
            background: linear-gradient(135deg, #0d6efd, #3b8dff);
            border-radius: 16px;
            padding: 28px;
            color: #fff;
            margin-bottom: 22px;
            box-shadow: 0 5px 18px rgba(13, 110, 253, .12);
        }

        .profile-header-inner {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        /* CLICKABLE PROFILE PHOTO */
        .profile-photo-wrap {
            position: relative;
            width: 80px;
            height: 80px;
            flex-shrink: 0;
        }

        .profile-photo-label {
            position: relative;
            display: block;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            cursor: pointer;
        }

        .profile-photo,
        .profile-photo-placeholder {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid rgba(255, 255, 255, .7);
        }

        .profile-photo-placeholder {
            background: rgba(255,255,255,.2);
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        .photo-overlay {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: rgba(0, 0, 0, .42);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: bold;
            opacity: 0;
            transition: .2s;
        }

        .profile-photo-label:hover .photo-overlay {
            opacity: 1;
        }

        .camera-button {
            position: absolute;
            right: -2px;
            bottom: -2px;
            width: 29px;
            height: 29px;
            border-radius: 50%;
            background: #ffffff;
            color: #0d6efd;
            border: 3px solid #3b8dff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            z-index: 2;
        }

        .photo-help {
            margin-top: 5px;
            font-size: 10px;
            opacity: .8;
        }

        .profile-header h2 {
            font-size: 21px;
            margin-bottom: 5px;
        }

        .profile-header p {
            font-size: 12px;
            opacity: .9;
        }

        /* CARD */
        .card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(23, 43, 77, .04);
        }

        .form-card {
            padding: 28px;
        }

        .card-header {
            margin-bottom: 24px;
        }

        .card-header h2 {
            color: #293449;
            font-size: 17px;
            margin-bottom: 4px;
        }

        .card-header p {
            color: #8a94a6;
            font-size: 12px;
        }

        .alert {
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #eaf9f0;
            border: 1px solid #ccefd9;
            color: #207245;
        }

        .alert-danger {
            background: #fff1f1;
            border: 1px solid #f4d0d0;
            color: #b53f3f;
        }

        .alert-danger ul {
            margin: 7px 0 0 18px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 19px;
        }

        .form-group {
            margin-bottom: 3px;
        }

        .full {
            grid-column: 1 / -1;
        }

        label.form-label {
            display: block;
            color: #394559;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #dfe5ed;
            background: #fbfcfe;
            border-radius: 10px;
            padding: 12px 13px;
            color: #263143;
            font-size: 13px;
            outline: none;
            transition: .2s;
        }

        input:focus,
        textarea:focus {
            background: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13,110,253,.08);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input[readonly] {
            background: #f3f5f8;
            color: #8b95a4;
            cursor: not-allowed;
        }

        .hint {
            color: #98a1b0;
            font-size: 11px;
            margin-top: 6px;
        }

        .field-error {
            color: #d14949;
            font-size: 11px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 22px;
            border-top: 1px solid #edf1f5;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 19px;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-secondary {
            background: #f1f3f6;
            color: #667085;
        }

        .btn-primary {
            background: #0d6efd;
            color: #fff;
        }

        .btn-primary:hover {
            background: #0b5ed7;
        }

        .upload-status {
            display: none;
            margin-top: 10px;
            font-size: 12px;
            color: #0d6efd;
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }

        @media (max-width: 500px) {
            .profile {
                display: none;
            }

            .profile-header-inner {
                align-items: flex-start;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
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

            

            <a href="{{ route('student.history') }}">
                <span class="menu-icon">▤</span>
                Medical History
            </a>

            <a href="{{ route('student.profile') }}" class="active">
                <span class="menu-icon">◉</span>
                My Profile
            </a>

        </nav>

        <div class="sidebar-bottom">

            <div class="sidebar-user">
                <strong>
                    {{ $student->first_name }}
                    {{ $student->last_name }}
                </strong>

                <span>Student Account</span>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-btn">
                    ⇥ &nbsp; Logout
                </button>
            </form>

        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <div class="topbar">

            <div class="page-title">
                <h1>My Profile</h1>
                <p>View and update your student information.</p>
            </div>

            <div>
                @if($student->profile_photo)
                    <img
                        src="{{ asset('storage/' . $student->profile_photo) }}"
                        alt="Profile"
                        class="top-avatar"
                    >
                @else
                    <div class="top-avatar">
                        {{ strtoupper(substr($student->first_name ?? 'S', 0, 1)) }}
                    </div>
                @endif
            </div>

        </div>


        @if(session('success'))

            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Please correct the following:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <!-- PROFILE HEADER -->
        <div class="profile-header">

            <div class="profile-header-inner">

                <!-- CLICK PROFILE PHOTO TO CHANGE -->
                <div class="profile-photo-wrap">

                    <label
                        for="profile_photo"
                        class="profile-photo-label"
                    >

                        @if($student->profile_photo)

                            <img
                                src="{{ asset('storage/' . $student->profile_photo) }}"
                                alt="Profile Photo"
                                class="profile-photo"
                                id="profilePreview"
                            >

                        @else

                            <div
                                class="profile-photo-placeholder"
                                id="profilePreview"
                            >
                                {{ strtoupper(substr($student->first_name ?? 'S', 0, 1)) }}
                            </div>

                        @endif

                        <div class="photo-overlay">
                            Change Photo
                        </div>

                        <div class="camera-button">
                            📷
                        </div>

                    </label>

                    <input
                        type="file"
                        name="profile_photo"
                        id="profile_photo"
                        accept="image/png,image/jpeg,image/jpg,image/webp"
                        hidden
                    >

                </div>


                <div>

                    <h2>
                        {{ $student->first_name }}
                        {{ $student->last_name }}
                    </h2>

                    <p>
                        Student ID:
                        {{ $student->student_id }}
                    </p>

                    <div class="photo-help">
                        Click your photo to change it
                    </div>

                </div>

            </div>

        </div>


        <!-- PROFILE FORM -->
        <div class="card form-card">

            <div class="card-header">

                <h2>Personal Information</h2>

                <p>
                    Keep your student information accurate and up to date.
                </p>

            </div>


            <form
                method="POST"
                action="{{ route('student.profile.update') }}"
                enctype="multipart/form-data"
                id="profileForm"
            >

                @csrf
                @method('PUT')


                <!-- Hidden photo field inside the actual form -->
                <input
                    type="file"
                    name="profile_photo"
                    id="profile_photo_form"
                    accept="image/png,image/jpeg,image/jpg,image/webp"
                    hidden
                >


                <div class="form-grid">

                    <!-- STUDENT ID -->
                    <div class="form-group">

                        <label
                            for="student_id"
                            class="form-label"
                        >
                            Student ID
                        </label>

                        <input
                            type="text"
                            id="student_id"
                            value="{{ $student->student_id }}"
                            readonly
                        >

                        <div class="hint">
                            Your student ID cannot be changed here.
                        </div>

                    </div>


                    <!-- EMAIL -->
                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            value="{{ $student->user->email ?? '' }}"
                            readonly
                        >

                        <div class="hint">
                            Your account email is managed by the system.
                        </div>

                    </div>


                    <!-- FIRST NAME -->
                    <div class="form-group">

                        <label
                            for="first_name"
                            class="form-label"
                        >
                            First Name
                        </label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name', $student->first_name) }}"
                            required
                        >

                        @error('first_name')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- LAST NAME -->
                    <div class="form-group">

                        <label
                            for="last_name"
                            class="form-label"
                        >
                            Last Name
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name', $student->last_name) }}"
                            required
                        >

                        @error('last_name')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- COURSE -->
                    <div class="form-group">

                        <label
                            for="course"
                            class="form-label"
                        >
                            Course / Program
                        </label>

                        <input
                            type="text"
                            id="course"
                            name="course"
                            value="{{ old('course', $student->course) }}"
                            placeholder="e.g. Hospitality Management"
                        >

                        @error('course')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- YEAR -->
                    <div class="form-group">

                        <label
                            for="year_level"
                            class="form-label"
                        >
                            Year Level
                        </label>

                        <input
                            type="text"
                            id="year_level"
                            name="year_level"
                            value="{{ old('year_level', $student->year_level) }}"
                            placeholder="e.g. 1st Year"
                        >

                        @error('year_level')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- CONTACT -->
                    <div class="form-group">

                        <label
                            for="contact_number"
                            class="form-label"
                        >
                            Contact Number
                        </label>

                        <input
                            type="text"
                            id="contact_number"
                            name="contact_number"
                            value="{{ old('contact_number', $student->contact_number) }}"
                            placeholder="09XXXXXXXXX"
                        >

                        @error('contact_number')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- DOB -->
                    <div class="form-group">

                        <label
                            for="date_of_birth"
                            class="form-label"
                        >
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            value="{{ old(
                                'date_of_birth',
                                $student->date_of_birth
                                    ? $student->date_of_birth->format('Y-m-d')
                                    : ''
                            ) }}"
                        >

                        @error('date_of_birth')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- ADDRESS -->
                    <div class="form-group full">

                        <label
                            for="address"
                            class="form-label"
                        >
                            Address
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            placeholder="Enter your current address..."
                        >{{ old('address', $student->address) }}</textarea>

                        @error('address')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                <div
                    class="upload-status"
                    id="uploadStatus"
                >
                    Uploading profile picture...
                </div>


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
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>


<script>
    const profilePhoto = document.getElementById('profile_photo');
    const profilePhotoForm = document.getElementById('profile_photo_form');
    const profileForm = document.getElementById('profileForm');
    const profilePreview = document.getElementById('profilePreview');
    const uploadStatus = document.getElementById('uploadStatus');

    profilePhoto.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        // Basic client-side validation
        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            alert('Please select a JPG, PNG, or WEBP image.');
            this.value = '';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('The image must be smaller than 2MB.');
            this.value = '';
            return;
        }

        // Show preview
        const reader = new FileReader();

        reader.onload = function (event) {

            if (profilePreview.tagName === 'IMG') {

                profilePreview.src = event.target.result;

            } else {

                const img = document.createElement('img');

                img.src = event.target.result;
                img.id = 'profilePreview';
                img.className = 'profile-photo';

                profilePreview.replaceWith(img);
            }
        };

        reader.readAsDataURL(file);


        // Copy selected file into the actual form input
        const dataTransfer = new DataTransfer();

        dataTransfer.items.add(file);

        profilePhotoForm.files = dataTransfer.files;


        // Automatically submit
        uploadStatus.style.display = 'block';

        profileForm.submit();
    });
</script>

</body>
</html>

