
@extends('admin.layout')

@section('title', 'Clinic Record Details')
@section('page-title', 'Clinic Record Details')

@section('content')

<div class="page-header">
    <div>
        <a href="{{ route('admin.clinic-records.index') }}" class="back-link">
            ← Back to Clinic Records
        </a>

        <h1>Clinic Record #{{ $clinicRecord->id }}</h1>
        <p>View clinic record information.</p>
    </div>
</div>

<div class="record-grid">

    {{-- Student Information --}}
    <div class="card">
        <div class="card-header">
            <h2>Student Information</h2>
        </div>

        <div class="info-list">

            <div class="info-row">
                <span class="label">Student ID</span>
                <span class="value">
                    {{ $clinicRecord->student->student_id ?? 'N/A' }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Student Name</span>
                <span class="value">
                    @if($clinicRecord->student)
                        {{ $clinicRecord->student->first_name }}
                        {{ $clinicRecord->student->last_name }}
                    @else
                        N/A
                    @endif
                </span>
            </div>

            <div class="info-row">
                <span class="label">Course</span>
                <span class="value">
                    {{ $clinicRecord->student->course ?? 'N/A' }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Year Level</span>
                <span class="value">
                    {{ $clinicRecord->student->year_level ?? 'N/A' }}
                </span>
            </div>

        </div>
    </div>


    {{-- Visit Information --}}
    <div class="card">
        <div class="card-header">
            <h2>Visit Information</h2>
        </div>

        <div class="info-list">

            <div class="info-row">
                <span class="label">Record ID</span>
                <span class="value">
                    #{{ $clinicRecord->id }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Visit Date</span>
                <span class="value">
                    @if($clinicRecord->visit_date)
                        {{ \Carbon\Carbon::parse($clinicRecord->visit_date)->format('F d, Y') }}
                    @else
                        N/A
                    @endif
                </span>
            </div>

            <div class="info-row">
                <span class="label">Created</span>
                <span class="value">
                    {{ $clinicRecord->created_at ? $clinicRecord->created_at->format('F d, Y h:i A') : 'N/A' }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Last Updated</span>
                <span class="value">
                    {{ $clinicRecord->updated_at ? $clinicRecord->updated_at->format('F d, Y h:i A') : 'N/A' }}
                </span>
            </div>

        </div>
    </div>


    {{-- Optional Record Information --}}
    <div class="card full-width">
        <div class="card-header">
            <h2>Clinic Record Information</h2>
        </div>

        <div class="notice">
            <strong>Read-only access</strong>

            <p>
                This clinic record is managed by the Nurse.
                Admin can view the record for monitoring, reporting,
                and system administration purposes, but cannot modify
                the patient's clinical information.
            </p>
        </div>

        @if(isset($clinicRecord->notes))
            <div class="detail-section">
                <h3>Notes</h3>

                <div class="detail-box">
                    {{ $clinicRecord->notes ?: 'No notes recorded.' }}
                </div>
            </div>
        @endif

        @if(isset($clinicRecord->remarks))
            <div class="detail-section">
                <h3>Remarks</h3>

                <div class="detail-box">
                    {{ $clinicRecord->remarks ?: 'No remarks recorded.' }}
                </div>
            </div>
        @endif

    </div>

</div>


<style>

.page-header {
    margin-bottom: 24px;
}

.page-header h1 {
    margin: 8px 0 6px;
    font-size: 28px;
    color: #111827;
}

.page-header p {
    margin: 0;
    color: #6b7280;
}

.back-link {
    display: inline-block;
    color: #2563eb;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
}

.back-link:hover {
    text-decoration: underline;
}

.record-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

.card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 22px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.full-width {
    grid-column: 1 / -1;
}

.card-header {
    border-bottom: 1px solid #e5e7eb;
    padding-bottom: 14px;
    margin-bottom: 16px;
}

.card-header h2 {
    margin: 0;
    font-size: 18px;
    color: #111827;
}

.info-list {
    display: flex;
    flex-direction: column;
}

.info-row {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    padding: 13px 0;
    border-bottom: 1px solid #f3f4f6;
}

.info-row:last-child {
    border-bottom: none;
}

.label {
    color: #6b7280;
    font-size: 14px;
}

.value {
    color: #111827;
    font-weight: 600;
    text-align: right;
    font-size: 14px;
}

.notice {
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 10px;
    padding: 16px;
    color: #1e3a8a;
}

.notice strong {
    display: block;
    margin-bottom: 6px;
}

.notice p {
    margin: 0;
    line-height: 1.6;
    font-size: 14px;
}

.detail-section {
    margin-top: 22px;
}

.detail-section h3 {
    margin: 0 0 10px;
    font-size: 15px;
    color: #111827;
}

.detail-box {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 15px;
    min-height: 50px;
    color: #374151;
    line-height: 1.6;
}

@media (max-width: 800px) {
    .record-grid {
        grid-template-columns: 1fr;
    }

    .full-width {
        grid-column: auto;
    }

    .info-row {
        flex-direction: column;
        gap: 5px;
    }

    .value {
        text-align: left;
    }
}

</style>

@endsection

