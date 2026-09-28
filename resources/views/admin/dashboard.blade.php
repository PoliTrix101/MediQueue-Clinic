@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('content')

<style>
    .dashboard-header {
        margin-bottom: 25px;
    }

    .dashboard-header h3 {
        font-size: 22px;
        color: #111827;
        margin-bottom: 5px;
    }

    .dashboard-header p {
        font-size: 13px;
        color: #6b7280;
    }

    /* STAT CARDS */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-info p {
        font-size: 12px;
        color: #6b7280;
        margin-bottom: 8px;
    }

    .stat-info h2 {
        font-size: 26px;
        color: #111827;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .blue-icon {
        background: #eff6ff;
    }

    .green-icon {
        background: #ecfdf5;
    }

    .purple-icon {
        background: #f5f3ff;
    }

    .orange-icon {
        background: #fff7ed;
    }

    /* REPORT CARDS */

    .dashboard-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
        margin-bottom: 25px;
    }

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 20px;
    }

    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .card-header h3 {
        font-size: 16px;
        color: #111827;
    }

    .card-header p {
        font-size: 12px;
        color: #6b7280;
        margin-top: 4px;
    }

    .year-label {
        font-size: 12px;
        color: #6b7280;
    }

    /* CHART */

    .chart-container {
        height: 300px;
        position: relative;
    }

    /* APPOINTMENT STATUS */

    .status-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .status-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .status-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .status-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    .pending-dot {
        background: #f59e0b;
    }

    .completed-dot {
        background: #10b981;
    }

    .cancelled-dot {
        background: #ef4444;
    }

    .status-name {
        font-size: 13px;
        color: #4b5563;
    }

    .status-number {
        font-size: 14px;
        font-weight: bold;
        color: #111827;
    }

    /* RECENT SECTION */

    .recent-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .empty-message {
        text-align: center;
        padding: 30px 10px;
        color: #9ca3af;
        font-size: 13px;
    }

    /* RESPONSIVE */

    @media (max-width: 1100px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .recent-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- ============================
     HEADER
============================= -->

<div class="dashboard-header">


<h3>Welcome, {{ auth()->user()->name ?? 'Administrator' }}!</h3>

<p>
    Here's an overview of the MediQueue school clinic system.
</p>


</div>

<!-- ============================
     STATISTICS
============================= -->

<div class="stats-grid">


<!-- USERS -->

<div class="stat-card">

    <div class="stat-info">

        <p>Total Users</p>

        <h2>
            {{ $totalUsers }}
        </h2>

    </div>

    <div class="stat-icon blue-icon">
        👥
    </div>

</div>


<!-- STUDENTS -->

<div class="stat-card">

    <div class="stat-info">

        <p>Total Students</p>

        <h2>
            {{ $totalStudents }}
        </h2>

    </div>

    <div class="stat-icon green-icon">
        👨‍🎓
    </div>

</div>


<!-- NURSES -->

<div class="stat-card">

    <div class="stat-info">

        <p>Total Nurses</p>

        <h2>
            {{ $totalNurses }}
        </h2>

    </div>

    <div class="stat-icon purple-icon">
        👩‍⚕️
    </div>

</div>


<!-- CLINIC RECORDS -->

<div class="stat-card">

    <div class="stat-info">

        <p>Clinic Records</p>

        <h2>
            {{ $totalClinicRecords }}
        </h2>

    </div>

    <div class="stat-icon orange-icon">
        📋
    </div>

</div>


</div>

<!-- ============================
     CHART + APPOINTMENT STATUS
============================= -->

<div class="dashboard-grid">


<!-- MONTHLY APPOINTMENTS -->

<div class="dashboard-card">

    <div class="card-header">

        <div>
            <h3>Appointments per Month</h3>

            <p>
                Number of appointments recorded this year
            </p>
        </div>

        <span class="year-label">
            {{ now()->year }}
        </span>

    </div>

    <div class="chart-container">

        <canvas id="appointmentChart"></canvas>

    </div>

</div>


<!-- APPOINTMENT STATUS -->

<div class="dashboard-card">

    <div class="card-header">

        <div>
            <h3>Appointment Status</h3>

            <p>
                Current appointment summary
            </p>
        </div>

    </div>


    <div class="status-list">

        <!-- PENDING -->

        <div class="status-row">

            <div class="status-left">

                <span class="status-dot pending-dot"></span>

                <span class="status-name">
                    Pending
                </span>

            </div>

            <span class="status-number">
                {{ $pendingAppointments }}
            </span>

        </div>


        <!-- COMPLETED -->

        <div class="status-row">

            <div class="status-left">

                <span class="status-dot completed-dot"></span>

                <span class="status-name">
                    Completed
                </span>

            </div>

            <span class="status-number">
                {{ $completedAppointments }}
            </span>

        </div>


        <!-- CANCELLED -->

        <div class="status-row">

            <div class="status-left">

                <span class="status-dot cancelled-dot"></span>

                <span class="status-name">
                    Cancelled
                </span>

            </div>

            <span class="status-number">
                {{ $cancelledAppointments }}
            </span>

        </div>


        <!-- TOTAL -->

        <div style="
            border-top: 1px solid #e5e7eb;
            padding-top: 15px;
            margin-top: 5px;
        ">

            <div class="status-row">

                <span class="status-name">
                    Total Appointments
                </span>

                <span class="status-number">
                    {{ $totalAppointments }}
                </span>

            </div>

        </div>

    </div>

</div>


</div>

<!-- ============================
     RECENT DATA
============================= -->

<div class="recent-grid">


<!-- RECENT APPOINTMENTS -->

<div class="dashboard-card">

    <div class="card-header">

        <div>
            <h3>Recent Appointments</h3>

            <p>
                Latest appointment activity
            </p>
        </div>

    </div>


    @if($recentAppointments->count() > 0)

        <div class="table-container">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($recentAppointments as $appointment)

                        <tr>

                            <td>
                                #{{ $appointment->id }}
                            </td>

                            <td>
                                {{ $appointment->appointment_date
                                    ? \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y')
                                    : 'N/A'
                                }}
                            </td>

                            <td>

                                @if($appointment->status === 'completed')

                                    <span class="badge badge-green">
                                        Completed
                                    </span>

                                @elseif($appointment->status === 'pending')

                                    <span class="badge badge-yellow">
                                        Pending
                                    </span>

                                @elseif($appointment->status === 'cancelled')

                                    <span class="badge badge-red">
                                        Cancelled
                                    </span>

                                @else

                                    <span class="badge badge-gray">
                                        {{ ucfirst($appointment->status ?? 'Unknown') }}
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty-message">
            No appointments found.
        </div>

    @endif

</div>


<!-- RECENT CLINIC RECORDS -->

<div class="dashboard-card">

    <div class="card-header">

        <div>
            <h3>Recent Clinic Records</h3>

            <p>
                Latest clinic records
            </p>
        </div>

    </div>


    @if($recentClinicRecords->count() > 0)

        <div class="table-container">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($recentClinicRecords as $record)

                        <tr>

                            <td>
                                #{{ $record->id }}
                            </td>

                            <td>
                                {{ $record->created_at
                                    ? $record->created_at->format('M d, Y')
                                    : 'N/A'
                                }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty-message">
            No clinic records found.
        </div>

    @endif

</div>


</div>

@endsection

<!-- ============================
     CHART.JS
============================= -->

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const monthLabels = @json($monthLabels);

    const monthData = @json($monthData);


    const ctx = document
        .getElementById('appointmentChart')
        .getContext('2d');


    new Chart(ctx, {

        type: 'line',

        data: {

            labels: monthLabels,

            datasets: [{

                label: 'Appointments',

                data: monthData,

                borderWidth: 2,

                tension: 0.3,

                fill: false,

                pointRadius: 4

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {
                    display: false
                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {
                        precision: 0
                    }

                }

            }

        }

    });

</script>

@endpush
