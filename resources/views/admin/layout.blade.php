<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin Dashboard') - MediQueue
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #111827;
        }

        a {
            text-decoration: none;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: 240px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #e5e7eb;

            display: flex;
            flex-direction: column;

            z-index: 1000;
        }


        /* =========================================
           BRAND
        ========================================= */

        .brand {
            padding: 24px 20px;

            border-bottom: 1px solid #e5e7eb;
        }

        .brand h1 {
            color: #2563eb;

            font-size: 23px;

            margin-bottom: 5px;
        }

        .brand p {
            color: #6b7280;

            font-size: 12px;
        }


        /* =========================================
           ADMIN LABEL
        ========================================= */

        .admin-label {
            padding: 18px 20px 8px;

            font-size: 11px;

            font-weight: bold;

            color: #9ca3af;

            text-transform: uppercase;

            letter-spacing: 0.7px;
        }


        /* =========================================
           SIDEBAR MENU
        ========================================= */

        .sidebar-menu {
            flex: 1;

            padding: 0 12px;

            overflow-y: auto;
        }


        /* =========================================
           NAVIGATION LINKS
        ========================================= */

        .nav-link {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            margin-bottom: 4px;

            border-radius: 8px;

            color: #4b5563;

            font-size: 14px;

            font-weight: 500;

            transition: 0.2s;
        }

        .nav-link:hover {
            background: #eff6ff;

            color: #2563eb;
        }

        .nav-link.active {
            background: #eff6ff;

            color: #2563eb;

            font-weight: 600;
        }

        .nav-icon {
            width: 20px;

            text-align: center;

            font-size: 16px;

            flex-shrink: 0;
        }


        /* =========================================
           SIDEBAR BOTTOM
        ========================================= */

        .sidebar-bottom {
            padding: 12px;

            border-top: 1px solid #e5e7eb;
        }


        /* =========================================
           LOGOUT
        ========================================= */

        .logout-button {
            width: 100%;

            border: none;

            background: transparent;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            border-radius: 8px;

            color: #dc2626;

            font-size: 14px;

            font-weight: 500;

            cursor: pointer;

            text-align: left;
        }

        .logout-button:hover {
            background: #fef2f2;
        }


        /* =========================================
           MAIN AREA
        ========================================= */

        .main {
            margin-left: 240px;

            min-height: 100vh;
        }


        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {
            height: 70px;

            background: #ffffff;

            border-bottom: 1px solid #e5e7eb;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 28px;
        }

        .topbar-title {
            font-size: 18px;

            font-weight: 600;

            color: #111827;
        }


        /* =========================================
           ADMIN USER
        ========================================= */

        .admin-user {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .admin-avatar {
            width: 38px;

            height: 38px;

            border-radius: 50%;

            background: #2563eb;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 14px;

            font-weight: bold;
        }

        .admin-user-info {
            display: flex;

            flex-direction: column;
        }

        .admin-user-name {
            font-size: 14px;

            font-weight: 600;

            color: #111827;
        }

        .admin-user-role {
            font-size: 11px;

            color: #6b7280;
        }


        /* =========================================
           CONTENT
        ========================================= */

        .content {
            padding: 28px;
        }


        /* =========================================
           ALERTS
        ========================================= */

        .alert {
            padding: 13px 16px;

            border-radius: 8px;

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


        /* =========================================
           CARDS
        ========================================= */

        .card {
            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            padding: 20px;

            box-shadow:
                0 2px 8px rgba(0, 0, 0, 0.03);
        }


        /* =========================================
           TABLE
        ========================================= */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;
        }

        th {
            background: #f9fafb;

            padding: 13px 15px;

            text-align: left;

            font-size: 12px;

            color: #6b7280;

            text-transform: uppercase;

            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 14px 15px;

            border-bottom: 1px solid #f3f4f6;

            font-size: 14px;

            color: #374151;
        }

        tr:hover td {
            background: #fafafa;
        }


        /* =========================================
           BUTTONS
        ========================================= */

        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 6px;

            padding: 9px 14px;

            border-radius: 7px;

            border: none;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;

            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #f3f4f6;

            color: #374151;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .btn-danger {
            background: #dc2626;

            color: white;
        }


        /* =========================================
           FORMS
        ========================================= */

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;

            margin-bottom: 7px;

            font-size: 13px;

            font-weight: 600;

            color: #374151;
        }

        .form-control {
            width: 100%;

            padding: 10px 12px;

            border: 1px solid #d1d5db;

            border-radius: 7px;

            outline: none;

            font-size: 14px;

            background: #ffffff;
        }

        .form-control:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.1);
        }


        /* =========================================
           BADGES
        ========================================= */

        .badge {
            display: inline-block;

            padding: 5px 9px;

            border-radius: 999px;

            font-size: 11px;

            font-weight: 600;
        }

        .badge-blue {
            background: #dbeafe;

            color: #1d4ed8;
        }

        .badge-green {
            background: #dcfce7;

            color: #15803d;
        }

        .badge-yellow {
            background: #fef9c3;

            color: #a16207;
        }

        .badge-red {
            background: #fee2e2;

            color: #b91c1c;
        }

        .badge-gray {
            background: #f3f4f6;

            color: #4b5563;
        }


        /* =========================================
           PAGINATION
        ========================================= */

        .pagination-wrapper {
            margin-top: 20px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

        }


        @media (max-width: 700px) {

            .sidebar {
                position: relative;

                width: 100%;

                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .sidebar-menu {
                max-height: none;
            }

            .topbar {
                padding: 0 16px;
            }

            .content {
                padding: 18px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


    {{-- =========================================
         SIDEBAR
    ========================================== --}}

    <aside class="sidebar">


        {{-- BRAND --}}
        <div class="brand">

            <h1>
                MediQueue
            </h1>

            <p>
                LLCC School Clinic
            </p>

        </div>


        {{-- ADMIN LABEL --}}
        <div class="admin-label">
            Admin Panel
        </div>


        {{-- NAVIGATION --}}
        <nav class="sidebar-menu">


            {{-- =====================================
                 DASHBOARD
            ====================================== --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="nav-link
                    {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    📊
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- =====================================
                 USER MANAGEMENT
            ====================================== --}}

            <a
                href="{{ route('admin.users.index') }}"
                class="nav-link
                    {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    👥
                </span>

                <span>
                    User Management
                </span>

            </a>


            {{-- =====================================
                 STUDENTS
            ====================================== --}}

            <a
                href="{{ route('admin.students.index') }}"
                class="nav-link
                    {{ request()->routeIs('admin.students.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    👨‍🎓
                </span>

                <span>
                    Students
                </span>

            </a>


            {{-- =====================================
                 NURSES
            ====================================== --}}

            <a
                href="{{ route('admin.nurses.index') }}"
                class="nav-link
                    {{ request()->routeIs('admin.nurses.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    👩‍⚕️
                </span>

                <span>
                    Nurses
                </span>

            </a>


            {{-- =====================================
                 CLINIC RECORDS
            ====================================== --}}

            <a
                href="{{ route('admin.clinic-records.index') }}"
                class="nav-link
                    {{ request()->routeIs('admin.clinic-records.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    📋
                </span>

                <span>
                    Clinic Records
                </span>

            </a>


            {{-- =====================================
                 REPORTS
            ====================================== --}}

            @if(Route::has('admin.reports.index'))

                <a
                    href="{{ route('admin.reports.index') }}"
                    class="nav-link
                        {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}"
                >

                    <span class="nav-icon">
                        📈
                    </span>

                    <span>
                        Reports
                    </span>

                </a>

            @endif


            {{-- =====================================
                 ACTIVITY LOGS
            ====================================== --}}

            @if(Route::has('admin.activity-logs.index'))

                <a
                    href="{{ route('admin.activity-logs.index') }}"
                    class="nav-link
                        {{ request()->routeIs('admin.activity-logs.*') ? 'active' : '' }}"
                >

                    <span class="nav-icon">
                        📝
                    </span>

                    <span>
                        Activity Logs
                    </span>

                </a>

            @endif


            {{-- =====================================
                 NOTIFICATIONS
            ====================================== --}}

            @if(Route::has('admin.notifications.index'))

                <a
                    href="{{ route('admin.notifications.index') }}"
                    class="nav-link
                        {{ request()->routeIs('admin.notifications.*') ? 'active' : '' }}"
                >

                    <span class="nav-icon">
                        🔔
                    </span>

                    <span>
                        Notifications
                    </span>

                </a>

            @endif


            {{-- =====================================
                 SYSTEM SETTINGS
            ====================================== --}}

            @if(Route::has('admin.settings.index'))

                <a
                    href="{{ route('admin.settings.index') }}"
                    class="nav-link
                        {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"
                >

                    <span class="nav-icon">
                        ⚙️
                    </span>

                    <span>
                        System Settings
                    </span>

                </a>

            @endif


            {{-- =====================================
                 ADMIN PROFILE
            ====================================== --}}

            @if(Route::has('admin.profile'))

                <a
                    href="{{ route('admin.profile') }}"
                    class="nav-link
                        {{ request()->routeIs('admin.profile*') ? 'active' : '' }}"
                >

                    <span class="nav-icon">
                        👤
                    </span>

                    <span>
                        My Profile
                    </span>

                </a>

            @endif


        </nav>


        {{-- =========================================
             LOGOUT
        ========================================== --}}

        <div class="sidebar-bottom">

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <span class="nav-icon">
                        🚪
                    </span>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- =========================================
         MAIN AREA
    ========================================== --}}

    <main class="main">


        {{-- =========================================
             TOPBAR
        ========================================== --}}

        <header class="topbar">


            <div class="topbar-title">

                @yield(
                    'page-title',
                    'Admin Dashboard'
                )

            </div>


            @auth

                <div class="admin-user">


                    {{-- ADMIN AVATAR --}}
                    <div class="admin-avatar">

                        {{ strtoupper(
                            substr(
                                auth()->user()->name ?? 'A',
                                0,
                                1
                            )
                        ) }}

                    </div>


                    {{-- ADMIN INFORMATION --}}
                    <div class="admin-user-info">

                        <span class="admin-user-name">

                            {{ auth()->user()->name }}

                        </span>


                        <span class="admin-user-role">

                            Administrator

                        </span>

                    </div>


                </div>

            @endauth


        </header>


        {{-- =========================================
             PAGE CONTENT
        ========================================== --}}

        <section class="content">


            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR MESSAGE --}}
            @if(session('error'))

                <div class="alert alert-error">

                    {{ session('error') }}

                </div>

            @endif


            {{-- VALIDATION ERRORS --}}
            @if($errors->any())

                <div class="alert alert-error">

                    <ul style="margin-left: 18px;">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- PAGE CONTENT --}}
            @yield('content')


        </section>


    </main>


    {{-- CUSTOM SCRIPTS --}}
    @stack('scripts')


</body>

</html>

