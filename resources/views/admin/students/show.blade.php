
@extends('admin.layout')

@section('title', 'Student Details')
@section('page-title', 'Student Details')

@section('content')

<style>
    .student-details-page {
        max-width: 1050px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 20px;
        color: #2563eb;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .back-link:hover {
        text-decoration: underline;
    }

    .profile-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 28px;
        margin-bottom: 20px;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e5e7eb;
    }

    .large-avatar {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .profile-name {
        margin: 0 0 6px;
        font-size: 25px;
        color: #111827;
    }

    .student-number {
        color: #2563eb;
        font-size: 14px;
        font-weight: 600;
    }

    .section-title {
        margin: 0 0 18px;
        font-size: 17px;
        color: #111827;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .info-item {
        background: #f8fafc;
        border-radius: 8px;
        padding: 15px;
    }

    .info-label {
        display: block;
        margin-bottom: 6px;
        font-size: 11px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .info-value {
        color: #111827;
        font-size: 14px;
        font-weight: 500;
        word-break: break-word;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    .account-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 5px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-active {
        background: #dcfce7;
        color: #15803d;
    }

    .status-unverified {
        background: #fef3c7;
        color: #b45309;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .system-note {
        padding: 16px 18px;
        background: #eff6ff;
        border-left: 4px solid #2563eb;
        border-radius: 6px;
        color: #374151;
        font-size: 14px;
        line-height: 1.6;
    }

    .system-note strong {
        color: #111827;
    }

    @media (max-width: 700px) {
        .info-grid {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: auto;
        }

        .profile-header {
            align-items: flex-start;
        }

        .large-avatar {
            width: 65px;
            height: 65px;
            font-size: 21px;
        }

        .profile-name {
            font-size: 20px;
        }
    }
</style>

<div class="student-details-page">

    <a
         href="{{ route('admin.students.index') }}"
        class="back-link"
    >
        ← Back to Students
    </a>


    @php
        $firstName = $student->first_name ?? '';
        $lastName = $student->last_name ?? '';

        $fullName = trim(
            $firstName . ' ' . $lastName
        );

        if ($fullName === '') {
            $fullName = 'Unknown Student';
        }

        $initials = '';

        if ($firstName !== '') {
            $initials .= strtoupper(
                substr($firstName, 0, 1)
            );
        }

        if ($lastName !== '') {
            $initials .= strtoupper(
                substr($lastName, 0, 1)
            );
        }
    @endphp


    <!-- Student Profile Header -->

    <div class="profile-card">

        <div class="profile-header">

            <div class="large-avatar">
                {{ $initials ?: 'S' }}
            </div>

            <div>

                <h2 class="profile-name">
                    {{ $fullName }}
                </h2>

                <div class="student-number">
                    Student ID:
                    {{ $student->student_id ?? '—' }}
                </div>

            </div>

        </div>

    </div>


    <!-- Personal Information -->

    <div class="profile-card">

        <h3 class="section-title">
            Personal Information
        </h3>

        <div class="info-grid">

            <div class="info-item">

                <span class="info-label">
                    First Name
                </span>

                <span class="info-value">
                    {{ $student->first_name ?: '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Last Name
                </span>

                <span class="info-value">
                    {{ $student->last_name ?: '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Contact Number
                </span>

                <span class="info-value">
                    {{ $student->contact_number ?: '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Date of Birth
                </span>

                <span class="info-value">
                    @if($student->date_of_birth)
                        {{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}
                    @else
                        —
                    @endif
                </span>

            </div>


            <div class="info-item full-width">

                <span class="info-label">
                    Address
                </span>

                <span class="info-value">
                    {{ $student->address ?: '—' }}
                </span>

            </div>

        </div>

    </div>


    <!-- Academic Information -->

    <div class="profile-card">

        <h3 class="section-title">
            Academic Information
        </h3>

        <div class="info-grid">

            <div class="info-item">

                <span class="info-label">
                    Student ID
                </span>

                <span class="info-value">
                    {{ $student->student_id ?: '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Course
                </span>

                <span class="info-value">
                    {{ $student->course ?: '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Year Level
                </span>

                <span class="info-value">
                    {{ $student->year_level ?: '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Student Record ID
                </span>

                <span class="info-value">
                    #{{ $student->id }}
                </span>

            </div>

        </div>

    </div>


    <!-- Account Information -->

    <div class="profile-card">

        <h3 class="section-title">
            Account Information
        </h3>

        <div class="info-grid">

            <div class="info-item">

                <span class="info-label">
                    Linked User ID
                </span>

                <span class="info-value">
                    {{ $student->user_id ?? '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Email Address
                </span>

                <span class="info-value">

                    @if($student->user)
                        {{ $student->user->email }}
                    @else
                        —
                    @endif

                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Account Name
                </span>

                <span class="info-value">

                    @if($student->user)
                        {{ $student->user->name }}
                    @else
                        —
                    @endif

                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Email Verification
                </span>

                <span class="info-value">

                    @if($student->user?->email_verified_at)

                        <span class="account-status status-active">
                            <span class="status-dot"></span>
                            Verified
                        </span>

                    @else

                        <span class="account-status status-unverified">
                            <span class="status-dot"></span>
                            Not Verified
                        </span>

                    @endif

                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Student Record Created
                </span>

                <span class="info-value">
                    {{ $student->created_at?->format('F d, Y h:i A') ?? '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Last Updated
                </span>

                <span class="info-value">
                    {{ $student->updated_at?->format('F d, Y h:i A') ?? '—' }}
                </span>

            </div>

        </div>

    </div>


    <!-- Admin Access Notice -->

    <div class="system-note">

        <strong>Admin Access Policy:</strong>

        This page allows the administrator to view student
        information for system monitoring and management.
        Clinic operations such as consultation, queue management,
        medical assessment, and medicine management remain under
        the Nurse role.

    </div>

</div>

@endsection

