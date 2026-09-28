<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nurse Schedule - MediQueue</title>

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
        }

        .nurse-info {
            text-align: right;
        }

        .nurse-info strong {
            display: block;
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
           SUCCESS MESSAGE
        ========================= */

        .success-message {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;

            padding: 14px 18px;
            border-radius: 10px;

            margin-bottom: 25px;

            font-size: 14px;
        }


        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .page-header p {
            color: #6b7280;
            font-size: 14px;
        }


        /* =========================
           CALENDAR CARD
        ========================= */

        .calendar-card {
            background: white;
            border-radius: 16px;

            padding: 25px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }


        /* =========================
           CALENDAR HEADER
        ========================= */

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 25px;
        }

        .calendar-header h2 {
            font-size: 22px;
        }

        .calendar-buttons {
            display: flex;
            gap: 8px;
        }

        .calendar-buttons button {
            border: none;

            width: 38px;
            height: 38px;

            border-radius: 8px;

            background: #eff6ff;
            color: #2563eb;

            font-size: 18px;

            cursor: pointer;
        }

        .calendar-buttons button:hover {
            background: #dbeafe;
        }


        /* =========================
           WEEK DAYS
        ========================= */

        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);

            margin-bottom: 8px;
        }

        .weekday {
            text-align: center;

            font-size: 12px;
            font-weight: bold;

            color: #6b7280;

            padding: 10px;
        }


        /* =========================
           CALENDAR GRID
        ========================= */

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);

            gap: 8px;
        }


        /* =========================
           DAY
        ========================= */

        .day {
            min-height: 95px;

            border: 1px solid #e5e7eb;

            border-radius: 10px;

            padding: 10px;

            cursor: pointer;

            position: relative;

            transition: 0.2s;

            background: white;
        }

        .day:hover {
            border-color: #93c5fd;
            background: #f8fbff;
        }

        .day.empty {
            background: #f9fafb;
            border: none;
            cursor: default;
        }

        .day-number {
            font-size: 14px;
            font-weight: bold;
        }


        /* TODAY */

        .day.today {
            border: 2px solid #2563eb;
        }

        .day.today .day-number {
            color: #2563eb;
        }


        /* =========================
           STATUS DOT
        ========================= */

        .status {
            margin-top: 15px;

            display: inline-flex;
            align-items: center;

            gap: 5px;

            font-size: 11px;
            font-weight: bold;

            padding: 5px 8px;

            border-radius: 20px;
        }

        .status-in {
            background: #dcfce7;
            color: #166534;
        }

        .status-out {
            background: #fee2e2;
            color: #991b1b;
        }


        /* =========================
           LEGEND
        ========================= */

        .legend {
            display: flex;
            gap: 20px;

            margin-top: 25px;

            padding-top: 20px;

            border-top: 1px solid #e5e7eb;
        }

        .legend-item {
            display: flex;
            align-items: center;

            gap: 7px;

            font-size: 13px;

            color: #4b5563;
        }

        .legend-dot {
            width: 10px;
            height: 10px;

            border-radius: 50%;
        }

        .green {
            background: #22c55e;
        }

        .red {
            background: #ef4444;
        }

        .blue {
            background: #2563eb;
        }


        /* =========================
           MODAL
        ========================= */

        .modal-overlay {
            position: fixed;

            inset: 0;

            background: rgba(0, 0, 0, 0.45);

            display: none;

            align-items: center;
            justify-content: center;

            z-index: 1000;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal {
            width: 420px;
            max-width: 90%;

            background: white;

            border-radius: 16px;

            padding: 30px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .modal h2 {
            margin-bottom: 8px;
        }

        .modal-date {
            color: #6b7280;

            font-size: 14px;

            margin-bottom: 25px;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            font-size: 13px;

            font-weight: bold;

            margin-bottom: 8px;
        }

        .date-display {
            width: 100%;

            padding: 12px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            background: #f9fafb;

            color: #374151;
        }


        /* =========================
           STATUS OPTIONS
        ========================= */

        .status-options {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;
        }

        .status-option input {
            display: none;
        }

        .status-option label {
            display: block;

            padding: 14px;

            border: 2px solid #e5e7eb;

            border-radius: 10px;

            text-align: center;

            cursor: pointer;

            font-size: 14px;

            transition: 0.2s;
        }

        .status-option.in-option label {
            color: #166534;
        }

        .status-option.out-option label {
            color: #991b1b;
        }

        .status-option input:checked + label {
            border-color: #2563eb;

            background: #eff6ff;
        }


        /* =========================
           MODAL BUTTONS
        ========================= */

        .modal-buttons {
            display: flex;

            gap: 10px;

            margin-top: 25px;
        }

        .modal-buttons button {
            flex: 1;

            padding: 12px;

            border-radius: 8px;

            cursor: pointer;

            font-weight: bold;
        }

        .cancel-btn {
            border: 1px solid #d1d5db;

            background: white;

            color: #374151;
        }

        .save-btn {
            border: none;

            background: #2563eb;

            color: white;
        }

        .save-btn:hover {
            background: #1d4ed8;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .calendar {
                gap: 5px;
            }

            .day {
                min-height: 75px;
            }
        }


        @media (max-width: 700px) {

            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
            }

            .content {
                padding: 20px;
            }

            .day {
                min-height: 65px;
                padding: 6px;
            }

            .status {
                font-size: 9px;
                padding: 3px 5px;
            }

            .page-header {
                display: block;
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
        MediQueue
    </div>

    <div class="menu-title">
        Nurse Menu
    </div>

    <nav class="menu">

        <a href="{{ route('nurse.dashboard') }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('nurse.queue') }}">
            🎫 Queue
        </a>

        <a href="{{ route('nurse.students') }}">
            👨‍🎓 Students
        </a>

        <a href="{{ route('nurse.appointments') }}">
            📅 Appointments
        </a>

        <a href="{{ route('nurse.consultations') }}">
            🩺 Consultations
        </a>

        <a href="{{ route('nurse.clinic.records') }}">
            📋 Clinic Records
        </a>

        <a href="{{ route('nurse.schedule') }}" class="active">
            🗓️ Calendar
        </a>

        <a href="{{ route('nurse.profile') }}">
            👤 Profile
        </a>

    </nav>

</aside>


<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">

        <h2>
            Nurse Schedule
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


    <!-- CONTENT -->

    <section class="content">


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="success-message">

                ✓ {{ session('success') }}

            </div>

        @endif


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <h1>
                    📅 Calendar Schedule
                </h1>

                <p>
                    Select a date to set your clinic availability.
                </p>

            </div>

        </div>


        <!-- CALENDAR -->

        <div class="calendar-card">


            <!-- CALENDAR HEADER -->

            <div class="calendar-header">

                <h2 id="monthYear">
                    September 2026
                </h2>

                <div class="calendar-buttons">

                    <button
                        type="button"
                        onclick="previousMonth()"
                    >
                        ‹
                    </button>

                    <button
                        type="button"
                        onclick="goToday()"
                    >
                        ●
                    </button>

                    <button
                        type="button"
                        onclick="nextMonth()"
                    >
                        ›
                    </button>

                </div>

            </div>


            <!-- WEEK DAYS -->

            <div class="weekdays">

                <div class="weekday">Sun</div>
                <div class="weekday">Mon</div>
                <div class="weekday">Tue</div>
                <div class="weekday">Wed</div>
                <div class="weekday">Thu</div>
                <div class="weekday">Fri</div>
                <div class="weekday">Sat</div>

            </div>


            <!-- CALENDAR DAYS -->

            <div
                class="calendar"
                id="calendar"
            ></div>


            <!-- LEGEND -->

            <div class="legend">

                <div class="legend-item">

                    <span class="legend-dot green"></span>

                    IN — Available

                </div>

                <div class="legend-item">

                    <span class="legend-dot red"></span>

                    OUT — Unavailable

                </div>

                <div class="legend-item">

                    <span class="legend-dot blue"></span>

                    Today

                </div>

            </div>

        </div>

    </section>

</main>



<!-- =====================================================
     MODAL
===================================================== -->

<div
    class="modal-overlay"
    id="scheduleModal"
>

    <div class="modal">


        <h2>
            Set Schedule
        </h2>


        <div
            class="modal-date"
            id="selectedDateText"
        >
            Select a date
        </div>


        <form
            method="POST"
            action="{{ route('nurse.schedule.save') }}"
        >

            @csrf


            <!-- DATE -->

            <div class="form-group">

                <label>
                    Selected Date
                </label>

                <input
                    type="text"
                    class="date-display"
                    id="dateDisplay"
                    readonly
                >

                <input
                    type="hidden"
                    name="schedule_date"
                    id="scheduleDate"
                >

            </div>


            <!-- STATUS -->

            <div class="form-group">

                <label>
                    Availability
                </label>


                <div class="status-options">


                    <!-- IN -->

                    <div class="status-option in-option">

                        <input
                            type="radio"
                            name="status"
                            value="in"
                            id="statusIn"
                            checked
                        >

                        <label for="statusIn">
                            🟢 IN<br>
                            <small>Available</small>
                        </label>

                    </div>


                    <!-- OUT -->

                    <div class="status-option out-option">

                        <input
                            type="radio"
                            name="status"
                            value="out"
                            id="statusOut"
                        >

                        <label for="statusOut">
                            🔴 OUT<br>
                            <small>Unavailable</small>
                        </label>

                    </div>

                </div>

            </div>


            <!-- BUTTONS -->

            <div class="modal-buttons">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeModal()"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="save-btn"
                >
                    Save Schedule
                </button>

            </div>

        </form>

    </div>

</div>



<script>

    /* =====================================================
       EXISTING DATABASE SCHEDULES
    ===================================================== */

    const schedules = @json($schedules);


    /* =====================================================
       CURRENT CALENDAR DATE
    ===================================================== */

    let currentDate = new Date();


    /* =====================================================
       MONTH NAMES
    ===================================================== */

    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];


    /* =====================================================
       RENDER CALENDAR
    ===================================================== */

    function renderCalendar() {

        const calendar = document.getElementById("calendar");

        const monthYear = document.getElementById("monthYear");

        calendar.innerHTML = "";


        const year = currentDate.getFullYear();

        const month = currentDate.getMonth();


        monthYear.textContent =
            monthNames[month] + " " + year;


        /*
        First day of month
        */

        const firstDay =
            new Date(year, month, 1).getDay();


        /*
        Number of days
        */

        const daysInMonth =
            new Date(year, month + 1, 0).getDate();


        /*
        Empty cells before first day
        */

        for (let i = 0; i < firstDay; i++) {

            const emptyDay =
                document.createElement("div");

            emptyDay.className = "day empty";

            calendar.appendChild(emptyDay);

        }


        /*
        Create days
        */

        for (let day = 1; day <= daysInMonth; day++) {

            const dayElement =
                document.createElement("div");

            dayElement.className = "day";


            /*
            Date string
            */

            const dateString =
                year + "-" +
                String(month + 1).padStart(2, "0") + "-" +
                String(day).padStart(2, "0");


            /*
            Check today
            */

            const today = new Date();

            const todayString =
                today.getFullYear() + "-" +
                String(today.getMonth() + 1).padStart(2, "0") + "-" +
                String(today.getDate()).padStart(2, "0");


            if (dateString === todayString) {

                dayElement.classList.add("today");

            }


            /*
            Find saved schedule
            */

            const schedule =
                schedules.find(
                    item => item.schedule_date === dateString
                );


            /*
            Day number
            */

            const number =
                document.createElement("div");

            number.className = "day-number";

            number.textContent = day;

            dayElement.appendChild(number);


            /*
            Status
            */

            if (schedule) {

                const status =
                    document.createElement("div");

                status.className =
                    "status " +
                    (
                        schedule.status === "in"
                            ? "status-in"
                            : "status-out"
                    );


                if (schedule.status === "in") {

                    status.innerHTML =
                        "🟢 IN";

                } else {

                    status.innerHTML =
                        "🔴 OUT";

                }


                dayElement.appendChild(status);

            }


            /*
            Click date
            */

            dayElement.addEventListener(
                "click",
                function () {

                    openModal(
                        dateString,
                        day,
                        month,
                        year,
                        schedule
                    );

                }
            );


            calendar.appendChild(dayElement);

        }

    }


    /* =====================================================
       OPEN MODAL
    ===================================================== */

    function openModal(
        dateString,
        day,
        month,
        year,
        schedule
    ) {

        const modal =
            document.getElementById("scheduleModal");


        const displayDate =
            monthNames[month] +
            " " +
            day +
            ", " +
            year;


        document.getElementById(
            "selectedDateText"
        ).textContent = displayDate;


        document.getElementById(
            "dateDisplay"
        ).value = displayDate;


        document.getElementById(
            "scheduleDate"
        ).value = dateString;


        /*
        Existing status
        */

        if (
            schedule &&
            schedule.status === "out"
        ) {

            document.getElementById(
                "statusOut"
            ).checked = true;

        } else {

            document.getElementById(
                "statusIn"
            ).checked = true;

        }


        modal.classList.add("show");

    }


    /* =====================================================
       CLOSE MODAL
    ===================================================== */

    function closeModal() {

        document
            .getElementById("scheduleModal")
            .classList.remove("show");

    }


    /* =====================================================
       PREVIOUS MONTH
    ===================================================== */

    function previousMonth() {

        currentDate.setMonth(
            currentDate.getMonth() - 1
        );

        renderCalendar();

    }


    /* =====================================================
       NEXT MONTH
    ===================================================== */

    function nextMonth() {

        currentDate.setMonth(
            currentDate.getMonth() + 1
        );

        renderCalendar();

    }


    /* =====================================================
       TODAY
    ===================================================== */

    function goToday() {

        currentDate = new Date();

        renderCalendar();

    }


    /* =====================================================
       CLOSE MODAL WHEN CLICKING OUTSIDE
    ===================================================== */

    document
        .getElementById("scheduleModal")
        .addEventListener(
            "click",
            function(event) {

                if (
                    event.target === this
                ) {

                    closeModal();

                }

            }
        );


    /* =====================================================
       INITIALIZE
    ===================================================== */

    renderCalendar();

</script>

</body>
</html>