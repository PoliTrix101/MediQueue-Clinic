
@extends('admin.layout')

@section('title', 'Students')
@section('page-title', 'Students')

@section('content')

<style>
    .students-page {
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
        width: 280px;
        transition: 0.2s;
    }

    .search-box:focus-within {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    .search-box span {
        margin-right: 8px;
        color: #6b7280;
        font-size: 15px;
    }

    .search-box input {
        border: none;
        outline: none;
        width: 100%;
        font-size: 14px;
        color: #111827;
        background: transparent;
    }

    .search-box input::placeholder {
        color: #9ca3af;
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
        min-width: 850px;
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
        white-space: nowrap;
    }

    td {
        padding: 16px 18px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 14px;
        color: #374151;
        vertical-align: middle;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    .student-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
        text-transform: uppercase;
    }

    .student-name {
        font-weight: 600;
        color: #111827;
    }

    .student-email {
        margin-top: 3px;
        font-size: 12px;
        color: #6b7280;
    }

    .student-id {
        display: inline-block;
        font-weight: 600;
        color: #2563eb;
        background: #eff6ff;
        padding: 4px 8px;
        border-radius: 6px;
    }

    .course {
        color: #374151;
    }

    .year-level {
        color: #6b7280;
    }

    .contact {
        color: #374151;
        white-space: nowrap;
    }

    .view-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 7px;
        background: #eff6ff;
        color: #2563eb;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
        white-space: nowrap;
    }

    .view-btn:hover {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6b7280;
    }

    .empty-icon {
        font-size: 42px;
        margin-bottom: 10px;
    }

    .empty-state strong {
        display: block;
        color: #374151;
        font-size: 16px;
    }

    .empty-state p {
        margin: 7px 0 0;
        font-size: 14px;
    }

    .no-results {
        display: none;
        text-align: center;
        padding: 45px 20px;
        color: #6b7280;
    }

    .no-results-icon {
        font-size: 35px;
        margin-bottom: 8px;
    }

    .no-results strong {
        display: block;
        color: #374151;
        font-size: 15px;
    }

    .no-results p {
        margin: 6px 0 0;
        font-size: 13px;
    }

    .pagination-wrapper {
        padding: 18px;
        border-top: 1px solid #f1f5f9;
    }

    .pagination-wrapper nav {
        display: flex;
        justify-content: center;
    }

    @media (max-width: 768px) {

        .page-header {
            align-items: stretch;
        }

        .search-box {
            width: 100%;
        }

        .page-header h2 {
            font-size: 21px;
        }
    }
</style>

<div class="students-page">

    {{-- PAGE HEADER --}}
    <div class="page-header">

        <div>
            <h2>Registered Students</h2>

            <p>
                View student information registered in MediQueue.
            </p>
        </div>

        {{-- SEARCH --}}
        <div class="search-box">

            <span>🔍</span>

            <input
                type="text"
                id="studentSearch"
                placeholder="Search students..."
                autocomplete="off"
            >

        </div>

    </div>


    {{-- STUDENTS TABLE --}}
    <div class="card">

        <div class="table-container">

            <table id="studentsTable">

                <thead>

                    <tr>
                        <th>Student</th>
                        <th>Student ID</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody id="studentsTableBody">

                    @forelse($students as $student)

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

                            if ($initials === '') {
                                $initials = 'S';
                            }

                            $email = '';

                            if ($student->user) {
                                $email = $student->user->email ?? '';
                            }

                        @endphp

                        <tr class="student-row">

                            {{-- STUDENT --}}
                            <td>

                                <div class="student-info">

                                    <div class="avatar">
                                        {{ $initials }}
                                    </div>

                                    <div>

                                        <div class="student-name">
                                            {{ $fullName }}
                                        </div>

                                        @if($email)
                                            <div class="student-email">
                                                {{ $email }}
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </td>


                            {{-- STUDENT ID --}}
                            <td>

                                <span class="student-id">
                                    {{ $student->student_id ?: '—' }}
                                </span>

                            </td>


                            {{-- COURSE --}}
                            <td>

                                <span class="course">
                                    {{ $student->course ?: '—' }}
                                </span>

                            </td>


                            {{-- YEAR LEVEL --}}
                            <td>

                                <span class="year-level">
                                    {{ $student->year_level ?: '—' }}
                                </span>

                            </td>


                            {{-- CONTACT --}}
                            <td>

                                <span class="contact">
                                    {{ $student->contact_number ?: '—' }}
                                </span>

                            </td>


                            {{-- VIEW --}}
                            <td>

                                <a
                                    href="{{ route('admin.students.show', $student) }}"
                                    class="view-btn"
                                >
                                    👁 View
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        👨‍🎓
                                    </div>

                                    <strong>
                                        No students found
                                    </strong>

                                    <p>
                                        There are currently no registered
                                        students in the system.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse


                    {{-- SEARCH NO RESULTS --}}
                    <tr id="noSearchResults" style="display: none;">

                        <td colspan="6">

                            <div class="no-results" style="display: block;">

                                <div class="no-results-icon">
                                    🔍
                                </div>

                                <strong>
                                    No matching students
                                </strong>

                                <p>
                                    Try searching using a different name,
                                    student ID, course, or contact number.
                                </p>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($students->hasPages())

            <div class="pagination-wrapper">

                {{ $students->links() }}

            </div>

        @endif

    </div>

</div>


<script>

    const studentSearch =
        document.getElementById('studentSearch');

    const studentRows =
        document.querySelectorAll('.student-row');

    const noSearchResults =
        document.getElementById('noSearchResults');


    studentSearch.addEventListener('input', function () {

        const searchValue =
            this.value.toLowerCase().trim();

        let visibleRows = 0;


        studentRows.forEach(function (row) {

            const rowText =
                row.textContent.toLowerCase();

            if (rowText.includes(searchValue)) {

                row.style.display = '';

                visibleRows++;

            } else {

                row.style.display = 'none';

            }

        });


        if (searchValue !== '' && visibleRows === 0) {

            noSearchResults.style.display = 'table-row';

        } else {

            noSearchResults.style.display = 'none';

        }

    });

</script>

@endsection

