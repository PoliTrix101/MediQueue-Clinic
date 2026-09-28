
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consultation - MediQueue</title>

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

        /* APPOINTMENT */
        .appointment-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 22px;
        }

        .section-title {
            font-size: 17px;
            color: #0f172a;
            margin-bottom: 18px;
            font-weight: 700;
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
            background: #dbeafe;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
            text-transform: capitalize;
        }

        /* FORM */
        .form-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #334155;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .required {
            color: #dc2626;
        }

        textarea {
            width: 100%;
            min-height: 120px;
            resize: vertical;
            border: 1px solid #dbe1ea;
            border-radius: 10px;
            padding: 13px 14px;
            font-size: 14px;
            color: #334155;
            outline: none;
            transition: .2s;
        }

        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        textarea::placeholder {
            color: #94a3b8;
        }

        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* ALERT */
        .alert {
            padding: 14px 17px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .error-list {
            margin-top: 7px;
            padding-left: 20px;
        }

        /* BUTTONS */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
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

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
        }

        .btn-complete {
            background: #2563eb;
            color: white;
        }

        .btn-complete:hover {
            background: #1d4ed8;
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

            .two-column {
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

        <a href="{{ route('nurse.dashboard') }}" class="nav-link">
            <span class="nav-icon">⌂</span>
            Dashboard
        </a>

        <a href="{{ route('nurse.queue') }}" class="nav-link">
            <span class="nav-icon">☷</span>
            Queue
        </a>

        <a href="{{ route('nurse.students') }}" class="nav-link">
            <span class="nav-icon">♙</span>
            Students
        </a>

        <a href="{{ route('nurse.appointments') }}" class="nav-link">
            <span class="nav-icon">▣</span>
            Appointments
        </a>

        <a href="{{ route('nurse.consultations') }}" class="nav-link active">
            <span class="nav-icon">✚</span>
            Consultation
        </a>

        <a href="{{ route('nurse.clinic.records') }}" class="nav-link">
            <span class="nav-icon">▤</span>
            Clinic Records
        </a>

        <a href="{{ route('nurse.profile') }}" class="nav-link">
            <span class="nav-icon">⚙</span>
            Profile
        </a>

        <div class="logout-area">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
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
                    Consultation
                </h1>

                <p>
                    Student medical consultation
                </p>

            </div>


            <div class="user-area">

                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'N', 0, 1)) }}
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
            <a href="{{ route('nurse.consultations') }}" class="back-btn">
                ← Back to Consultation List
            </a>


            <!-- SUCCESS MESSAGE -->
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            <!-- VALIDATION ERRORS -->
            @if($errors->any())

                <div class="alert alert-error">

                    <strong>
                        Please check the following:
                    </strong>

                    <ul class="error-list">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- STUDENT INFORMATION -->
            <div class="student-card">

                <div class="student-header">

                    <div class="student-avatar">

                        {{ strtoupper(substr($appointment->first_name ?? 'S', 0, 1)) }}

                    </div>

                    <div class="student-name">

                        <h2>
                            {{ $appointment->first_name }}
                            {{ $appointment->last_name }}
                        </h2>

                        <p>
                            Student ID:
                            {{ $appointment->student_number ?? 'N/A' }}
                        </p>

                    </div>

                </div>


                <div class="student-grid">

                    <div class="info-box">

                        <div class="info-label">
                            Student ID
                        </div>

                        <div class="info-value">
                            {{ $appointment->student_number ?? 'N/A' }}
                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Course
                        </div>

                        <div class="info-value">
                            {{ $appointment->course ?? 'N/A' }}
                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Year Level
                        </div>

                        <div class="info-value">
                            {{ $appointment->year_level ?? 'N/A' }}
                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Contact Number
                        </div>

                        <div class="info-value">
                            {{ $appointment->contact_number ?? 'N/A' }}
                        </div>

                    </div>

                </div>

            </div>


            <!-- APPOINTMENT INFORMATION -->
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

                            {{ \Carbon\Carbon::parse(
                                $appointment->appointment_date
                            )->format('F d, Y') }}

                        </div>

                    </div>


                    <div class="appointment-item">

                        <label>
                            Appointment Time
                        </label>

                        <div class="appointment-value">

                            {{ \Carbon\Carbon::parse(
                                $appointment->appointment_time
                            )->format('h:i A') }}

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
                                    $appointment->status
                                ) }}

                            </span>

                        </div>

                    </div>


                    <div class="appointment-item">

                        <label>
                            Reason for Visit
                        </label>

                        <div class="appointment-value">

                            {{ $appointment->reason ?? 'No reason provided.' }}

                        </div>

                    </div>

                </div>

            </div>


            <!-- CONSULTATION FORM -->
            <div class="form-card">

                <div class="section-title">
                    Consultation Notes
                </div>


                <form
                    action="{{ route(
                        'nurse.consultation.complete',
                        $appointment->id
                    ) }}"
                    method="POST"
                >

                    @csrf


                    <!-- SYMPTOMS + DIAGNOSIS -->
                    <div class="two-column">

                        <div class="form-group">

                            <label for="symptoms">
                                Symptoms
                            </label>

                            <textarea
                                id="symptoms"
                                name="symptoms"
                                placeholder="Enter the student's symptoms..."
                            >{{ old(
                                'symptoms',
                                $medicalRecord->symptoms ?? ''
                            ) }}</textarea>

                        </div>


                        <div class="form-group">

                            <label for="diagnosis">
                                Diagnosis
                            </label>

                            <textarea
                                id="diagnosis"
                                name="diagnosis"
                                placeholder="Enter the diagnosis..."
                            >{{ old(
                                'diagnosis',
                                $medicalRecord->diagnosis ?? ''
                            ) }}</textarea>

                        </div>

                    </div>


                    <!-- TREATMENT + NOTES -->
                    <div class="two-column">

                        <div class="form-group">

                            <label for="treatment">
                                Treatment
                            </label>

                            <textarea
                                id="treatment"
                                name="treatment"
                                placeholder="Enter the treatment or medication instructions..."
                            >{{ old(
                                'treatment',
                                $medicalRecord->treatment ?? ''
                            ) }}</textarea>

                        </div>


                        <div class="form-group">

                            <label for="notes">
                                Additional Notes
                            </label>

                            <textarea
                                id="notes"
                                name="notes"
                                placeholder="Enter additional notes..."
                            >{{ old(
                                'notes',
                                $medicalRecord->notes ?? ''
                            ) }}</textarea>

                        </div>

                    </div>


                    <!-- ACTIONS -->
                    <div class="form-actions">

                        <a
                            href="{{ route('nurse.consultations') }}"
                            class="btn btn-cancel"
                        >
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="btn btn-complete"
                            onclick="return confirm('Are you sure you want to complete this consultation?');"
                        >
                            ✓ Complete Consultation
                        </button>

                    </div>

                </form>

            </div>

        </section>

    </main>

</body>
</html>

