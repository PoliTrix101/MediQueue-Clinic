<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Appointments - MediQueue</title>

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
        font-weight: bold;
        font-size: 20px;
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

    .profile {
        display: flex;
        align-items: center;
        gap: 10px;
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
    }

    /* HEADER ACTION */

    .page-actions {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 11px 17px;
        border-radius: 10px;
        border: none;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-primary {
        background: #0d6efd;
        color: white;
    }

    .btn-primary:hover {
        background: #0b5ed7;
    }

    .btn-danger {
        background: #fff0f0;
        color: #d64949;
    }

    .btn-danger:hover {
        background: #ffe2e2;
    }

    .btn-disabled {
        background: #f1f3f6;
        color: #9aa4b2;
        cursor: not-allowed;
    }

    /* ALERT */

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

    /* TABLE CARD */

    .card {
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(23, 43, 77, .04);
        overflow: hidden;
    }

    .card-header {
        padding: 22px 25px;
        border-bottom: 1px solid #edf1f5;
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

    .table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 760px;
        table-layout: auto;
    }

    thead {
        background: #f8fafc;
    }

    th {
        text-align: left;
        color: #7b8798;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 14px 18px;
        border-bottom: 1px solid #edf1f5;
        white-space: nowrap;
    }

    td {
        padding: 17px 18px;
        border-bottom: 1px solid #f0f3f7;
        vertical-align: middle;
        font-size: 13px;
        color: #465164;
    }

    tbody tr:hover {
        background: #fbfcfe;
    }

    /* SERVICE */

    .service-name {
        color: #263143;
        font-weight: 600;
        white-space: nowrap;
    }

    .service-description {
        color: #98a1b0;
        font-size: 11px;
        margin-top: 3px;
    }

    /* DATE */

    .date {
        color: #374151;
        font-weight: 600;
        white-space: nowrap;
    }

    .time {
        color: #8a94a6;
        font-size: 12px;
        margin-top: 3px;
        white-space: nowrap;
    }

    /* REASON */

    .reason-preview {
        color: #465164;
    }

    .reason-more {
        color: #0d6efd;
        font-size: 11px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap;
        margin-left: 3px;
    }

    .reason-more:hover {
        text-decoration: underline;
    }

    .no-reason {
        color: #a1a9b5;
        font-size: 11px;
        white-space: nowrap;
    }

    /* STATUS */

    .status {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .status-pending {
        background: #fff6dd;
        color: #ad7a00;
    }

    .status-approved {
        background: #eaf9f0;
        color: #207245;
    }

    .status-cancelled {
        background: #fff0f0;
        color: #c54646;
    }

    .status-completed {
        background: #eef0f4;
        color: #697586;
    }

    .status-in_consultation {
        background: #eaf3ff;
        color: #0d6efd;
    }

    .status-called {
        background: #eaf3ff;
        color: #0d6efd;
    }

    .status-waiting {
        background: #fff6dd;
        color: #ad7a00;
    }

    /* QUEUE */

    .queue-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #eaf3ff;
        color: #0d6efd;
        padding: 6px 9px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .no-queue {
        color: #a1a9b5;
        font-size: 11px;
        white-space: nowrap;
    }

    /* EMPTY */

    .empty {
        text-align: center;
        padding: 55px 20px;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: #eaf3ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 25px;
    }

    .empty h3 {
        color: #293449;
        font-size: 16px;
        margin-bottom: 6px;
    }

    .empty p {
        color: #8a94a6;
        font-size: 12px;
        margin-bottom: 18px;
    }

    .action-cell {
        white-space: nowrap;
    }

    .cancel-form {
        display: inline;
    }


    /* =========================================================
       FULL REASON MODAL
    ========================================================= */

    .reason-modal {
        position: fixed;
        inset: 0;

        background: rgba(15, 23, 42, .45);

        /*
         * Blur everything behind the popup.
         * The popup itself remains sharp.
         */
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);

        z-index: 9999;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 20px;

        /*
         * Hidden state.
         * We use opacity/visibility instead of display:none
         * so the opening and closing can animate.
         */
        opacity: 0;
        visibility: hidden;
        pointer-events: none;

        transition:
            opacity .25s ease,
            visibility .25s ease;
    }


    /*
     * OPEN MODAL
     */

    .reason-modal.show {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }


    /*
     * POPUP BOX
     */

    .reason-modal-box {
        width: 100%;
        max-width: 560px;

        max-height: 80vh;

        background: #ffffff;

        border-radius: 18px;

        box-shadow:
            0 25px 70px rgba(15, 23, 42, .25),
            0 8px 25px rgba(15, 23, 42, .12);

        overflow: hidden;

        /*
         * Initial state:
         * small + slightly lower + invisible
         */
        opacity: 0;

        transform:
            scale(.72)
            translateY(25px);

        /*
         * Smooth balloon/zoom animation.
         */
        transition:
            transform .32s cubic-bezier(.22, 1, .36, 1),
            opacity .25s ease;
    }


    /*
     * ZOOM INTO PLACE
     */

    .reason-modal.show .reason-modal-box {
        opacity: 1;

        transform:
            scale(1)
            translateY(0);
    }


    /*
     * HEADER
     */

    .reason-modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 18px 20px;

        border-bottom: 1px solid #edf1f5;

        background: #ffffff;
    }

    .reason-modal-header h3 {
        color: #293449;
        font-size: 16px;
    }


    /*
     * CLOSE BUTTON
     */

    .reason-modal-close {
        width: 34px;
        height: 34px;

        border: none;
        border-radius: 50%;

        background: #f3f5f8;
        color: #697586;

        font-size: 22px;
        line-height: 1;

        cursor: pointer;

        display: flex;
        align-items: center;
        justify-content: center;

        transition:
            background .2s ease,
            color .2s ease,
            transform .2s ease;
    }


    /*
     * CLOSE HOVER
     */

    .reason-modal-close:hover {
        background: #fee2e2;
        color: #dc2626;

        transform: rotate(90deg);
    }


    /*
     * CLOSE CLICK
     */

    .reason-modal-close:active {
        transform:
            rotate(90deg)
            scale(.90);
    }


    /*
     * MODAL BODY
     *
     * The scrollbar belongs to the popup,
     * NOT the page.
     *
     * The page's right scrollbar remains visible.
     */

    .reason-modal-body {
        padding: 20px;

        max-height: calc(80vh - 70px);

        overflow-y: auto;
        overflow-x: hidden;

        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 transparent;
    }


    /*
     * CHROME / EDGE SCROLLBAR
     */

    .reason-modal-body::-webkit-scrollbar {
        width: 7px;
    }

    .reason-modal-body::-webkit-scrollbar-track {
        background: transparent;
    }

    .reason-modal-body::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .reason-modal-body::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }


    /*
     * LABEL
     */

    .reason-modal-label {
        color: #8a94a6;

        font-size: 11px;
        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .5px;

        margin-bottom: 9px;
    }


    /*
     * FULL REASON TEXT
     */

    .reason-full-text {
        background: #f8fafc;

        border: 1px solid #e5eaf0;

        border-radius: 10px;

        padding: 15px;

        color: #374151;

        font-size: 13px;

        line-height: 1.6;

        white-space: pre-wrap;

        overflow-wrap: anywhere;
        word-break: break-word;
    }


    /* RESPONSIVE */

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

        .reason-modal-box {
            max-width: 95%;
        }
    }


    @media (max-width: 500px) {

        .profile {
            display: none;
        }

        .topbar {
            align-items: flex-start;
        }

        .reason-modal {
            padding: 12px;
        }

        .reason-modal-box {
            max-width: 100%;
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

                <h2>
                    MediQueue
                </h2>

                <span>
                    LLCC School Clinic
                </span>

            </div>

        </div>


        <div class="menu-title">
            Student Menu
        </div>


        <nav class="menu">

            <a href="{{ route('user.dashboard') }}">

                <span class="menu-icon">
                    ⌂
                </span>

                Dashboard

            </a>


            <a href="{{ route('student.appointments.create') }}">

                <span class="menu-icon">
                    ＋
                </span>

                Book Appointment

            </a>


            <a
                href="{{ route('student.appointments') }}"
                class="active"
            >

                <span class="menu-icon">
                    ▣
                </span>

                My Appointments

            </a>


            <a href="{{ route('student.history') }}">

                <span class="menu-icon">
                    ▤
                </span>

                Medical History

            </a>


            <a href="{{ route('student.profile') }}">

                <span class="menu-icon">
                    ◉
                </span>

                My Profile

            </a>

        </nav>


        <div class="sidebar-bottom">

            <div class="sidebar-user">

                <strong>
                    {{ auth()->user()->name ?? 'Student' }}
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
                    My Appointments
                </h1>

                <p>
                    View and manage your clinic appointment requests.
                </p>

            </div>


            <div class="profile">

                <div class="avatar">

                    {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}

                </div>

            </div>

        </div>


        @if(session('success'))

            <div class="alert alert-success">

                ✓ {{ session('success') }}

            </div>

        @endif


        <div class="page-actions">

            <a
                href="{{ route('student.appointments.create') }}"
                class="btn btn-primary"
            >
                + Book New Appointment
            </a>

        </div>


        <div class="card">

            <div class="card-header">

                <h2>
                    Appointment History
                </h2>

                <p>
                    Your appointment requests and their current status.
                </p>

            </div>


            @if($appointments->count())

                <div class="table-wrap">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Service
                                </th>

                                <th>
                                    Date & Time
                                </th>

                                <th>
                                    Reason
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Queue
                                </th>

                                <th>
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($appointments as $appointment)

                                <tr>


                                    <!-- SERVICE -->

                                    <td>

                                        <div class="service-name">

                                            {{ $appointment->service->name ?? 'Unknown Service' }}

                                        </div>


                                        @if($appointment->service?->description)

                                            <div class="service-description">

                                                {{ $appointment->service->description }}

                                            </div>

                                        @endif

                                    </td>


                                    <!-- DATE/TIME -->

                                    <td>

                                        <div class="date">

                                            {{ $appointment->appointment_date->format('M d, Y') }}

                                        </div>


                                        <div class="time">

                                            {{ date('h:i A', strtotime($appointment->appointment_time)) }}

                                        </div>

                                    </td>


                                    <!-- REASON -->

                                    <td>

                                        @if($appointment->reason)

                                            @php

                                                $reason = $appointment->reason;

                                                $reasonLimit = 35;

                                            @endphp


                                            @if(mb_strlen($reason) > $reasonLimit)

                                                <span class="reason-preview">

                                                    {{ \Illuminate\Support\Str::limit($reason, $reasonLimit) }}

                                                </span>


                                                <a
                                                    href="#"
                                                    class="reason-more"
                                                    data-reason="{{ base64_encode($reason) }}"
                                                    onclick="openReasonModal(this); return false;"
                                                >
                                                    (See full reason)
                                                </a>

                                            @else

                                                <span class="reason-preview">

                                                    {{ $reason }}

                                                </span>

                                            @endif

                                        @else

                                            <span class="no-reason">

                                                No reason provided

                                            </span>

                                        @endif

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        @php

                                            $statusLabels = [

                                                'pending' => 'Pending',

                                                'approved' => 'Approved',

                                                'cancelled' => 'Cancelled',

                                                'completed' => 'Completed',

                                                'in_consultation' => 'In Consultation',

                                                'called' => 'Called',

                                                'waiting' => 'Waiting',

                                            ];

                                            $statusLabel =
                                                $statusLabels[$appointment->status]
                                                ?? ucfirst(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $appointment->status
                                                    )
                                                );

                                        @endphp


                                        <span
                                            class="status status-{{ $appointment->status }}"
                                        >

                                            {{ $statusLabel }}

                                        </span>

                                    </td>


                                    <!-- QUEUE -->

                                    <td>

                                        @if($appointment->queueTicket)

                                            <span class="queue-badge">

                                                #{{ $appointment->queueTicket->queue_number }}

                                            </span>

                                        @else

                                            <span class="no-queue">

                                                Not assigned

                                            </span>

                                        @endif

                                    </td>


                                    <!-- ACTION -->

                                    <td class="action-cell">

                                        @if($appointment->status === 'pending')

                                            <form
                                                method="POST"
                                                action="{{ route(
                                                    'student.appointments.cancel',
                                                    $appointment->id
                                                ) }}"
                                                class="cancel-form"
                                                onsubmit="return confirm(
                                                    'Are you sure you want to cancel this appointment?'
                                                );"
                                            >

                                                @csrf

                                                @method('PATCH')


                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                >
                                                    Cancel
                                                </button>

                                            </form>


                                        @elseif($appointment->status === 'approved')

                                            <a
                                                href="{{ route('student.queue') }}"
                                                class="btn btn-primary"
                                            >
                                                View Queue
                                            </a>


                                        @else

                                            <span class="btn btn-disabled">
                                                No Action
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


            @else

                <div class="empty">

                    <div class="empty-icon">
                        ▣
                    </div>


                    <h3>
                        No appointments yet
                    </h3>


                    <p>
                        You haven't booked an appointment with the clinic.
                    </p>


                    <a
                        href="{{ route('student.appointments.create') }}"
                        class="btn btn-primary"
                    >
                        + Book Your First Appointment
                    </a>

                </div>

            @endif

        </div>

    </main>

</div>


<!-- =========================================================
     FULL REASON MODAL
========================================================= -->

<div
    class="reason-modal"
    id="reasonModal"
    onclick="closeReasonModalOutside(event)"
>


    <div
        class="reason-modal-box"
        onclick="event.stopPropagation()"
    >


        <div class="reason-modal-header">

            <h3>
                Full Appointment Reason
            </h3>


            <button
                type="button"
                class="reason-modal-close"
                onclick="closeReasonModal()"
                aria-label="Close"
                title="Close"
            >
                ×
            </button>

        </div>


        <div class="reason-modal-body">

            <div class="reason-modal-label">
                Student's Reason
            </div>


            <div
                class="reason-full-text"
                id="reasonFullText"
            ></div>

        </div>

    </div>

</div>


<script>


    /*
    =========================================================
    OPEN FULL REASON MODAL
    =========================================================
    */

    function openReasonModal(element) {

        const modal =
            document.getElementById('reasonModal');

        const fullText =
            document.getElementById('reasonFullText');


        /*
         * Get encoded reason.
         */

        const encodedReason =
            element.getAttribute('data-reason');


        try {

            /*
             * Decode original full reason.
             */

            const reason =
                decodeURIComponent(
                    escape(
                        window.atob(encodedReason)
                    )
                );


            /*
             * Put complete reason
             * into the popup.
             */

            fullText.textContent = reason;

        } catch (error) {

            fullText.textContent =
                'Unable to display the full reason.';

        }


        /*
         * Add SHOW class.
         *
         * CSS performs:
         *
         * fade in
         * zoom in
         * background blur
         */

        modal.classList.add('show');


        /*
         * IMPORTANT:
         *
         * We intentionally DO NOT use:
         *
         * document.body.style.overflow = 'hidden';
         *
         * This keeps the main page scrollbar visible.
         */

    }


    /*
    =========================================================
    CLOSE FULL REASON MODAL
    =========================================================
    */

    function closeReasonModal() {

        const modal =
            document.getElementById('reasonModal');


        /*
         * Removing SHOW triggers:
         *
         * fade out
         * zoom out
         */

        modal.classList.remove('show');

    }


    /*
    =========================================================
    CLOSE WHEN CLICKING OUTSIDE
    =========================================================
    */

    function closeReasonModalOutside(event) {

        /*
         * Only close when the actual dark/blurred
         * background is clicked.
         *
         * Clicking the popup itself does nothing.
         */

        if (
            event.target === event.currentTarget
        ) {

            closeReasonModal();

        }

    }


    /*
    =========================================================
    ESC KEY
    =========================================================
    */

    document.addEventListener(
        'keydown',
        function(event) {

            if (
                event.key === 'Escape'
            ) {

                closeReasonModal();

            }

        }
    );


</script>

</body>
</html>