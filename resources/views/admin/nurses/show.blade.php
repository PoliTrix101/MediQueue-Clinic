
@extends('admin.layout')

@section('title', 'Nurse Details')
@section('page-title', 'Nurse Details')

@section('content')

<style>
    .nurse-details-page {
        max-width: 1000px;
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
        background: #dcfce7;
        color: #15803d;
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

    .profile-email {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 11px;
        border-radius: 999px;
        background: #dcfce7;
        color: #15803d;
        font-size: 12px;
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

    .status-badge {
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

    .access-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .access-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px 15px;
        background: #f8fafc;
        border-radius: 8px;
        color: #374151;
        font-size: 14px;
    }

    .access-icon {
        width: 30px;
        height: 30px;
        border-radius: 7px;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
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
        .info-grid,
        .access-list {
            grid-template-columns: 1fr;
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

<div class="nurse-details-page">

    <a
        href="{{ route('admin.nurses.index') }}"
        class="back-link"
    >
        ← Back to Nurses
    </a>


    @php
        $name = $nurse->name ?? 'Unknown Nurse';

        $initials = collect(
            preg_split('/\s+/', trim($name))
        )
        ->filter()
        ->map(function ($part) {
            return strtoupper(substr($part, 0, 1));
        })
        ->take(2)
        ->implode('');
    @endphp


    <!-- Nurse Profile Header -->

    <div class="profile-card">

        <div class="profile-header">

            <div class="large-avatar">
                {{ $initials ?: 'N' }}
            </div>

            <div>

                <h2 class="profile-name">
                    {{ $name }}
                </h2>

                <div class="profile-email">
                    {{ $nurse->email }}
                </div>

                <span class="role-badge">
                    👩‍⚕️ Nurse
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
                    User ID
                </span>

                <span class="info-value">
                    {{ $nurse->id }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Full Name
                </span>

                <span class="info-value">
                    {{ $nurse->name ?? '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Email Address
                </span>

                <span class="info-value">
                    {{ $nurse->email }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Role
                </span>

                <span class="info-value">
                    Nurse
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Email Verification
                </span>

                <span class="info-value">

                    @if($nurse->email_verified_at)

                        <span class="status-badge status-active">
                            <span class="status-dot"></span>
                            Verified
                        </span>

                    @else

                        <span class="status-badge status-unverified">
                            <span class="status-dot"></span>
                            Not Verified
                        </span>

                    @endif

                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Registered
                </span>

                <span class="info-value">
                    {{ $nurse->created_at?->format('F d, Y h:i A') ?? '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Last Updated
                </span>

                <span class="info-value">
                    {{ $nurse->updated_at?->format('F d, Y h:i A') ?? '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Account ID
                </span>

                <span class="info-value">
                    #{{ $nurse->id }}
                </span>

            </div>

        </div>

    </div>


    <!-- Nurse Access -->

    <div class="profile-card">

        <h3 class="section-title">
            Nurse System Access
        </h3>

        <div class="access-list">

            <div class="access-item">
                <div class="access-icon">📅</div>
                <span>Appointments</span>
            </div>

            <div class="access-item">
                <div class="access-icon">🔢</div>
                <span>Queue Management</span>
            </div>

            <div class="access-item">
                <div class="access-icon">🩺</div>
                <span>Consultations</span>
            </div>

            <div class="access-item">
                <div class="access-icon">📋</div>
                <span>Clinic Records</span>
            </div>

            <div class="access-item">
                <div class="access-icon">💊</div>
                <span>Medicine Inventory</span>
            </div>

            <div class="access-item">
                <div class="access-icon">👨‍🎓</div>
                <span>Student Information</span>
            </div>

            <div class="access-item">
                <div class="access-icon">🗓️</div>
                <span>Nurse Schedule</span>
            </div>

            <div class="access-item">
                <div class="access-icon">👤</div>
                <span>Own Profile</span>
            </div>

        </div>

    </div>


    <!-- Admin Policy -->

    <div class="system-note">

        <strong>Admin Access Policy:</strong>

        This page is for viewing the Nurse's system account.
        The Nurse is responsible for managing their own profile
        and clinic operations. The administrator does not directly
        edit the Nurse's personal profile, schedule, queue,
        consultations, or medicine inventory from this page.

    </div>

</div>

@endsection

