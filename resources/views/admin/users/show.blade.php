
@extends('admin.layout')

@section('title', 'User Details')
@section('page-title', 'User Details')

@section('content')

<style>
    .user-details-page {
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
        width: 80px;
        height: 80px;
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
        font-size: 24px;
        color: #111827;
    }

    .profile-email {
        color: #6b7280;
        font-size: 14px;
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 11px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 10px;
        text-transform: capitalize;
    }

    .role-admin {
        background: #ede9fe;
        color: #6d28d9;
    }

    .role-nurse {
        background: #dcfce7;
        color: #15803d;
    }

    .role-user {
        background: #dbeafe;
        color: #1d4ed8;
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
        padding: 15px;
        background: #f8fafc;
        border-radius: 8px;
    }

    .info-label {
        display: block;
        font-size: 12px;
        color: #6b7280;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .info-value {
        font-size: 14px;
        color: #111827;
        font-weight: 500;
        word-break: break-word;
    }

    .status-active {
        color: #15803d;
        font-weight: 600;
    }

    .status-unverified {
        color: #b45309;
        font-weight: 600;
    }

    .system-note {
        margin-top: 20px;
        padding: 15px 18px;
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

        .profile-header {
            align-items: flex-start;
        }

        .large-avatar {
            width: 65px;
            height: 65px;
            font-size: 22px;
        }

        .profile-name {
            font-size: 20px;
        }
    }
</style>

<div class="user-details-page">

    <a
        href="{{ route('admin.users.index') }}"
        class="back-link"
    >
        ← Back to User Management
    </a>

    @php
        $name = $user->name ?? 'Unknown User';

        $initials = collect(
            preg_split('/\s+/', trim($name))
        )
        ->filter()
        ->map(function ($part) {
            return strtoupper(substr($part, 0, 1));
        })
        ->take(2)
        ->implode('');

        $role = $user->role ?? 'user';
    @endphp

    <!-- Profile Header -->
    <div class="profile-card">

        <div class="profile-header">

            <div class="large-avatar">
                {{ $initials ?: 'U' }}
            </div>

            <div>

                <h2 class="profile-name">
                    {{ $name }}
                </h2>

                <div class="profile-email">
                    {{ $user->email }}
                </div>

                <span class="role-badge role-{{ $role }}">
                    {{ ucfirst($role) }}
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
                    {{ $user->id }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Full Name
                </span>

                <span class="info-value">
                    {{ $user->name ?? '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Email Address
                </span>

                <span class="info-value">
                    {{ $user->email }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Role
                </span>

                <span class="info-value">
                    {{ ucfirst($role) }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Email Verification
                </span>

                <span class="info-value">

                    @if($user->email_verified_at)

                        <span class="status-active">
                            ✓ Verified
                        </span>

                    @else

                        <span class="status-unverified">
                            ⚠ Not Verified
                        </span>

                    @endif

                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Registered
                </span>

                <span class="info-value">
                    {{ $user->created_at?->format('F d, Y h:i A') ?? '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Last Updated
                </span>

                <span class="info-value">
                    {{ $user->updated_at?->format('F d, Y h:i A') ?? '—' }}
                </span>

            </div>


            <div class="info-item">

                <span class="info-label">
                    Account ID
                </span>

                <span class="info-value">
                    #{{ $user->id }}
                </span>

            </div>

        </div>

    </div>


    <!-- Role Information -->
    <div class="profile-card">

        <h3 class="section-title">
            Role & Access
        </h3>

        <div class="info-grid">

            @if($role === 'admin')

                <div class="info-item">
                    <span class="info-label">Access Level</span>
                    <span class="info-value">
                        System Administrator
                    </span>
                </div>

                <div class="info-item">
                    <span class="info-label">Main Responsibility</span>
                    <span class="info-value">
                        System and user management
                    </span>
                </div>

            @elseif($role === 'nurse')

                <div class="info-item">
                    <span class="info-label">Access Level</span>
                    <span class="info-value">
                        Clinic Nurse
                    </span>
                </div>

                <div class="info-item">
                    <span class="info-label">Main Responsibility</span>
                    <span class="info-value">
                        Clinic operations and student healthcare
                    </span>
                </div>

            @else

                <div class="info-item">
                    <span class="info-label">Access Level</span>
                    <span class="info-value">
                        Student / User
                    </span>
                </div>

                <div class="info-item">
                    <span class="info-label">Main Responsibility</span>
                    <span class="info-value">
                        Appointment and clinic service requests
                    </span>
                </div>

            @endif

        </div>

    </div>


    <!-- Admin Notice -->
    <div class="system-note">

        <strong>Admin Access Policy:</strong>

        This page is for viewing and monitoring system account
        information. Personal clinic operations such as consultation,
        queue management, medicine inventory, and nurse scheduling
        remain under the Nurse role.

    </div>

</div>

@endsection

