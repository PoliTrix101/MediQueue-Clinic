
@extends('admin.layout')

@section('title', 'Clinic Records')
@section('page-title', 'Clinic Records')

@section('content')

<style>
    .records-page {
        width: 100%;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 15px;
        flex-wrap: wrap;
    }

    .page-header h2 {
        margin: 0;
        font-size: 24px;
        color: #111827;
    }

    .page-header p {
        margin: 5px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .search-box {
        display: flex;
        align-items: center;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 0 12px;
        height: 42px;
        min-width: 270px;
    }

    .search-box span {
        margin-right: 8px;
        color: #6b7280;
    }

    .search-box input {
        border: none;
        outline: none;
        width: 100%;
        font-size: 14px;
    }

    .card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    thead {
        background: #f8fafc;
    }

    th {
        text-align: left;
        padding: 15px 18px;
        font-size: 12px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        border-bottom: 1px solid #e5e7eb;
    }

    td {
        padding: 16px 18px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 14px;
        color: #374151;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    .student-info {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
    }

    .student-name {
        font-weight: 600;
        color: #111827;
    }

    .student-id {
        margin-top: 2px;
        font-size: 12px;
        color: #6b7280;
    }

    .record-id {
        font-weight: 600;
        color: #2563eb;
    }

    .date-text {
        color: #374151;
    }

    .view-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 7px;
        background: #eff6ff;
        color: #2563eb;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
    }

    .view-btn:hover {
        background: #dbeafe;
    }

    .empty-state {
        text-align: center;
        padding: 55px 20px;
        color: #6b7280;
    }

    .empty-icon {
        font-size: 42px;
        margin-bottom: 10px;
    }

    .pagination-wrapper {
        padding: 18px;
        border-top: 1px solid #f1f5f9;
    }

    .pagination-wrapper nav {
        display: flex;
        justify-content: center;
    }

    .notice {
        margin-bottom: 20px;
        padding: 15px 18px;
        background: #eff6ff;
        border-left: 4px solid #2563eb;
        border-radius: 6px;
        color: #374151;
        font-size: 14px;
        line-height: 1.5;
    }

    .notice strong {
        color: #111827;
    }

    @media (max-width: 768px) {
        .search-box {
            width: 100%;
            min-width: unset;
        }
    }
</style>

<div class="records-page">

    <div class="page-header">

        <div>
            <h2>Clinic Records</h2>

            <p>
                View and monitor student clinic records.
            </p>
        </div>

        <div class="search-box">

            <span>🔍</span>

            <input
                type="text"
                id="recordSearch"
                placeholder="Search records..."
                onkeyup="searchRecords()"
            >

        </div>

    </div>


    <div class="notice">

        <strong>Read-only access:</strong>

        Clinic records are created and managed by the Nurse.
        Administrators can view records for system monitoring
        and reporting purposes.

    </div>


    <div class="card">

        <div class="table-container">

            <table id="recordsTable">

                <thead>

                    <tr>
                        <th>Record</th>
                        <th>Student</th>
                        <th>Visit Date</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($records as $record)

                        @php
                            /*
                             * The exact student relationship/columns
                             * may depend on your ClinicRecord model.
                             */
                            $student = $record->student ?? null;

                            $firstName = $student->first_name ?? '';
                            $lastName = $student->last_name ?? '';

                            $studentName = trim(
                                $firstName . ' ' . $lastName
                            );

                            if ($studentName === '') {
                                $studentName = 'Unknown Student';
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

                        <tr>

                            <td>

                                <span class="record-id">
                                    #{{ $record->id }}
                                </span>

                            </td>


                            <td>

                                <div class="student-info">

                                    <div class="avatar">
                                        {{ $initials ?: 'S' }}
                                    </div>

                                    <div>

                                        <div class="student-name">
                                            {{ $studentName }}
                                        </div>

                                        @if($student)
                                            <div class="student-id">
                                                ID:
                                                {{ $student->student_id ?? '—' }}
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </td>


                            <td>

                                <span class="date-text">

                                    @if($record->visit_date)

                                        {{ \Carbon\Carbon::parse($record->visit_date)->format('M d, Y') }}

                                    @elseif($record->created_at)

                                        {{ $record->created_at->format('M d, Y') }}

                                    @else

                                        —

                                    @endif

                                </span>

                            </td>


                            <td>

                                {{ $record->created_at?->format('M d, Y') ?? '—' }}

                            </td>


                            <td>

                                <a
                                    href="{{ route('admin.clinic-records.show', $record) }}"
                                    class="view-btn"
                                >
                                    👁 View
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        📋
                                    </div>

                                    <strong>
                                        No clinic records found
                                    </strong>

                                    <p>
                                        There are currently no clinic
                                        records available.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($records->hasPages())

            <div class="pagination-wrapper">

                {{ $records->links() }}

            </div>

        @endif

    </div>

</div>


<script>
    function searchRecords() {

        const input =
            document.getElementById('recordSearch');

        const filter =
            input.value.toLowerCase();

        const rows =
            document.querySelectorAll(
                '#recordsTable tbody tr'
            );

        rows.forEach(function(row) {

            const text =
                row.textContent.toLowerCase();

            if (text.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });

    }
</script>

@endsection

