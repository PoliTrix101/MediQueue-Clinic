
@extends('admin.layout')

@section('title', 'Nurses')
@section('page-title', 'Nurses')

@section('content')

<style>
    .nurses-page {
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
        min-width: 260px;
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
        min-width: 800px;
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

    .nurse-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #dcfce7;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
    }

    .nurse-name {
        font-weight: 600;
        color: #111827;
    }

    .nurse-email {
        margin-top: 2px;
        font-size: 12px;
        color: #6b7280;
    }

    .role-badge {
        display: inline-flex;
        padding: 5px 10px;
        border-radius: 999px;
        background: #dcfce7;
        color: #15803d;
        font-size: 12px;
        font-weight: 600;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-verified {
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

    @media (max-width: 768px) {
        .search-box {
            width: 100%;
            min-width: unset;
        }
    }
</style>

<div class="nurses-page">

    <div class="page-header">

        <div>
            <h2>Registered Nurses</h2>

            <p>
                View and monitor Nurse accounts registered in MediQueue.
            </p>
        </div>

        <div class="search-box">

            <span>🔍</span>

            <input
                type="text"
                id="nurseSearch"
                placeholder="Search nurses..."
                onkeyup="searchNurses()"
            >

        </div>

    </div>


    <div class="card">

        <div class="table-container">

            <table id="nursesTable">

                <thead>

                    <tr>
                        <th>Nurse</th>
                        <th>Role</th>
                        <th>Email Status</th>
                        <th>Registered</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($nurses as $nurse)

                        @php
                            $name = $nurse->name ?? 'Unknown Nurse';

                            $initials = collect(
                                preg_split('/\s+/', trim($name))
                            )
                            ->filter()
                            ->map(function ($part) {
                                return strtoupper(
                                    substr($part, 0, 1)
                                );
                            })
                            ->take(2)
                            ->implode('');
                        @endphp

                        <tr>

                            <td>

                                <div class="nurse-info">

                                    <div class="avatar">
                                        {{ $initials ?: 'N' }}
                                    </div>

                                    <div>

                                        <div class="nurse-name">
                                            {{ $name }}
                                        </div>

                                        <div class="nurse-email">
                                            {{ $nurse->email }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            <td>

                                <span class="role-badge">
                                    Nurse
                                </span>

                            </td>


                            <td>

                                @if($nurse->email_verified_at)

                                    <span class="status-badge status-verified">

                                        <span class="status-dot"></span>

                                        Verified

                                    </span>

                                @else

                                    <span class="status-badge status-unverified">

                                        <span class="status-dot"></span>

                                        Not Verified

                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $nurse->created_at?->format('M d, Y') ?? '—' }}
                            </td>


                            <td>

                                <a
                                    href="{{ route('admin.nurses.show', $nurse) }}"
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
                                        👩‍⚕️
                                    </div>

                                    <strong>
                                        No nurses found
                                    </strong>

                                    <p>
                                        There are currently no Nurse
                                        accounts registered in MediQueue.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($nurses->hasPages())

            <div class="pagination-wrapper">
                {{ $nurses->links() }}
            </div>

        @endif

    </div>

</div>


<script>
    function searchNurses() {

        const input =
            document.getElementById('nurseSearch');

        const filter =
            input.value.toLowerCase();

        const rows =
            document.querySelectorAll(
                '#nursesTable tbody tr'
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

