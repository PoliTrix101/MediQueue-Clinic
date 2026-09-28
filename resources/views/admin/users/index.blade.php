@extends('admin.layout')

@section('title', 'User Management')
@section('page-title', 'User Management')

@section('content')

<style>
    .users-page {
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
        min-width: 250px;
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
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 750px;
    }

    thead {
        background: #f8fafc;
    }

    th {
        text-align: left;
        padding: 15px 18px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #6b7280;
        border-bottom: 1px solid #e5e7eb;
    }

    td {
        padding: 16px 18px;
        border-bottom: 1px solid #f1f5f9;
        color: #374151;
        font-size: 14px;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    .user-info {
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
        font-size: 14px;
        flex-shrink: 0;
    }

    .user-name {
        font-weight: 600;
        color: #111827;
    }

    .user-email {
        font-size: 12px;
        color: #6b7280;
        margin-top: 2px;
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
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

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-active {
        background: #dcfce7;
        color: #15803d;
    }

    .status-inactive {
        background: #fee2e2;
        color: #b91c1c;
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
        padding: 50px 20px;
        color: #6b7280;
    }

    .empty-icon {
        font-size: 40px;
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
        .page-header {
            align-items: stretch;
        }

        .search-box {
            width: 100%;
            min-width: unset;
        }
    }
</style>

<div class="users-page">

    <div class="page-header">

        <div>
            <h2>System Users</h2>
            <p>
                View and monitor all registered MediQueue users.
            </p>
        </div>

        <div class="search-box">
            <span>🔍</span>
            <input
                type="text"
                id="userSearch"
                placeholder="Search users..."
                onkeyup="searchUsers()"
            >
        </div>

    </div>

    <div class="card">

        <div class="table-container">

            <table id="usersTable">

                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Registered</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $user)

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
                        @endphp

                        <tr>

                            <td>
                                <div class="user-info">

                                    <div class="avatar">
                                        {{ $initials ?: 'U' }}
                                    </div>

                                    <div>
                                        <div class="user-name">
                                            {{ $name }}
                                        </div>

                                        <div class="user-email">
                                            {{ $user->email }}
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <td>

                                @php
                                    $role = $user->role ?? 'user';
                                @endphp

                                <span class="role-badge role-{{ $role }}">
                                    {{ ucfirst($role) }}
                                </span>

                            </td>

                            <td>

                                @if($user->email_verified_at)
                                    <span class="status-badge status-active">
                                        <span class="status-dot"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="status-badge status-inactive">
                                        <span class="status-dot"></span>
                                        Unverified
                                    </span>
                                @endif

                            </td>

                            <td>
                                {{ $user->created_at?->format('M d, Y') ?? '—' }}
                            </td>

                            <td>

                                <a
                                    href="{{ route('admin.users.show', $user) }}"
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
                                        👥
                                    </div>

                                    <strong>
                                        No users found
                                    </strong>

                                    <p>
                                        There are currently no registered users.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if($users->hasPages())

            <div class="pagination-wrapper">
                {{ $users->links() }}
            </div>

        @endif

    </div>

</div>

<script>
    function searchUsers() {

        const input =
            document.getElementById('userSearch');

        const filter =
            input.value.toLowerCase();

        const rows =
            document.querySelectorAll('#usersTable tbody tr');

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

