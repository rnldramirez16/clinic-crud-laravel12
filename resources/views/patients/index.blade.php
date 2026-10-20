
@extends('layouts.app')

@section('title', 'Patient Records')

@section('content')

<style>
    .patient-page {
        color: #1e293b;
        padding-bottom: 30px;
    }

    .patient-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
        flex-wrap: wrap;
    }

    .patient-heading h2 {
        font-size: 28px;
        font-weight: 750;
        color: #142b4a;
        margin: 0 0 7px;
    }

    .patient-heading p {
        color: #718096;
        margin: 0;
        font-size: 14px;
    }

    .btn-register {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 19px;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        border-radius: 9px;
        font-weight: 600;
        font-size: 14px;
        border: 1px solid #2563eb;
        transition: .2s;
    }

    .btn-register:hover {
        background: #1d4ed8;
        color: #fff;
        transform: translateY(-1px);
    }

    .patient-summary {
        background: linear-gradient(120deg, #ffffff, #f1f7ff);
        border: 1px solid #e0eaf8;
        border-radius: 15px;
        padding: 23px 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
        box-shadow: 0 5px 18px rgba(15, 45, 85, .04);
    }

    .summary-label {
        font-size: 14px;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 10px;
    }

    .summary-number {
        font-size: 36px;
        line-height: 1;
        font-weight: 800;
        color: #1d4ed8;
        margin: 0;
    }

    .summary-description {
        color: #94a3b8;
        font-size: 12px;
        margin-top: 9px;
    }

    .summary-icon {
        height: 60px;
        width: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dbeafe;
        color: #2563eb;
        font-size: 28px;
        flex-shrink: 0;
    }

    .patient-panel {
        background: #fff;
        border: 1px solid #e7edf5;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(15, 45, 85, .045);
    }

    .panel-heading {
        padding: 23px 24px 18px;
        border-bottom: 1px solid #edf1f6;
    }

    .panel-heading h4 {
        color: #172b4d;
        font-size: 18px;
        font-weight: 750;
        margin: 0 0 6px;
    }

    .panel-heading p {
        font-size: 13px;
        color: #8492a6;
        margin: 0;
    }

    .patient-toolbar {
        padding: 18px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        flex-wrap: wrap;
    }

    .patient-search {
        display: flex;
        align-items: center;
        gap: 10px;
        flex: 1;
        max-width: 550px;
    }

    .patient-search input {
        min-width: 0;
        height: 43px;
        border: 1px solid #dce4ee;
        border-radius: 8px;
        padding: 0 14px;
        font-size: 14px;
        outline: none;
        flex: 1;
        background: #fff;
    }

    .patient-search input:focus {
        border-color: #60a5fa;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
    }

    .btn-search {
        height: 43px;
        padding: 0 18px;
        border: 0;
        border-radius: 8px;
        background: #2563eb;
        color: white;
        font-weight: 600;
        font-size: 13px;
    }

    .btn-search:hover {
        background: #1d4ed8;
    }

    .btn-clear {
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-clear:hover {
        color: #2563eb;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .patient-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 760px;
        margin: 0;
    }

    .patient-table thead th {
        background: #f8fafc;
        color: #64748b;
        padding: 15px 20px;
        font-size: 11px;
        font-weight: 750;
        letter-spacing: .6px;
        text-transform: uppercase;
        border-top: 1px solid #edf1f6;
        border-bottom: 1px solid #edf1f6;
        white-space: nowrap;
    }

    .patient-table tbody td {
        padding: 17px 20px;
        color: #475569;
        font-size: 13px;
        border-bottom: 1px solid #f0f3f8;
        vertical-align: middle;
    }

    .patient-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .patient-table tbody tr:hover {
        background: #f8fbff;
    }

    .patient-number {
        color: #2563eb;
        font-weight: 700;
        white-space: nowrap;
    }

    .patient-name {
        color: #1e293b;
        font-weight: 650;
    }

    .sex-badge {
        display: inline-block;
        background: #eff6ff;
        color: #1d4ed8;
        border-radius: 20px;
        padding: 5px 10px;
        font-size: 11px;
        font-weight: 700;
    }

    .action-links {
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
    }

    .action-btn {
        display: inline-block;
        text-decoration: none;
        border-radius: 6px;
        padding: 7px 10px;
        font-size: 12px;
        font-weight: 600;
    }

    .action-view {
        background: #eff6ff;
        color: #2563eb;
    }

    .action-edit {
        background: #fff7ed;
        color: #c2410c;
    }

    .action-view:hover {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .action-edit:hover {
        background: #ffedd5;
        color: #9a3412;
    }

    .empty-state {
        text-align: center;
        padding: 55px 20px !important;
    }

    .empty-icon {
        width: 68px;
        height: 68px;
        margin: 0 auto 16px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        color: #3b82f6;
        font-size: 29px;
    }

    .empty-state h5 {
        font-size: 16px;
        font-weight: 750;
        color: #334155;
        margin-bottom: 8px;
    }

    .empty-state p {
        font-size: 13px;
        color: #94a3b8;
        margin-bottom: 18px;
    }

    .patient-pagination {
        padding: 17px 24px;
        border-top: 1px solid #edf1f6;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
        color: #8492a6;
        font-size: 12px;
    }

    .patient-pagination nav p {
        margin: 0;
    }

    .patient-pagination nav {
        margin-left: auto;
    }

    .success-message {
        border: 1px solid #bbf7d0;
        background: #f0fdf4;
        color: #166534;
        border-radius: 9px;
        padding: 13px 16px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .validation-message {
        border: 1px solid #fecaca;
        background: #fef2f2;
        color: #b91c1c;
        border-radius: 9px;
        padding: 13px 16px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    @media (max-width: 600px) {
        .patient-heading h2 {
            font-size: 23px;
        }

        .patient-heading .btn-register {
            width: 100%;
        }

        .patient-summary {
            padding: 19px;
        }

        .summary-number {
            font-size: 30px;
        }

        .patient-toolbar {
            padding: 16px;
        }

        .patient-search {
            width: 100%;
            max-width: none;
            flex-wrap: wrap;
        }

        .patient-search input {
            flex-basis: 100%;
        }

        .btn-search {
            flex: 1;
        }

        .panel-heading {
            padding: 20px 16px;
        }

        .patient-pagination {
            padding: 16px;
        }
    }
</style>

<div class="patient-page">

    <div class="patient-heading">
        <div>
            <h2>Patient Records</h2>
            <p>Manage and organize your clinic's registered patients.</p>
        </div>

        <a href="{{ route('patients.create') }}" class="btn-register">
            <span>＋</span> Register New Patient
        </a>
    </div>

    @if (session('success'))
        <div class="success-message">
            ✓ {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="validation-message">
            <strong>Please check the following:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="patient-summary">
        <div>
            <div class="summary-label">Total Registered Patients</div>
            <h3 class="summary-number">
                {{ number_format($totalPatients ?? 0) }}
            </h3>
            <div class="summary-description">
                All patient records registered in your clinic
            </div>
        </div>

        <div class="summary-icon" aria-hidden="true">
            ♙
        </div>
    </div>

    <div class="patient-panel">

        <div class="panel-heading">
            <h4>Patient Directory</h4>
            <p>View, search, and manage patient information.</p>
        </div>

        <div class="patient-toolbar">
            <form method="GET"
                  action="{{ route('patients.index') }}"
                  class="patient-search">

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? request('search') }}"
                    placeholder="Search by patient number, name, or contact..."
                    aria-label="Search patient records">

                <button type="submit" class="btn-search">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ route('patients.index') }}"
                       class="btn-clear">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <div class="table-responsive">
            <table class="patient-table">
                <thead>
                    <tr>
                        <th>Patient No.</th>
                        <th>Full Name</th>
                        <th>Birth Date</th>
                        <th>Sex</th>
                        <th>Contact Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($patients as $patient)
                        <tr>
                            <td class="patient-number">
                                {{ $patient->patient_number }}
                            </td>

                            <td class="patient-name">
                                {{ trim(($patient->first_name ?? '') . ' ' . ($patient->last_name ?? '')) ?: '—' }}
                            </td>

                            <td>
                                @if ($patient->birth_date)
                                    {{ \Carbon\Carbon::parse($patient->birth_date)->format('M d, Y') }}
                                @else
                                    —
                                @endif
                            </td>

                            <td>
                                @if ($patient->sex)
                                    <span class="sex-badge">
                                        {{ $patient->sex }}
                                    </span>
                                @else
                                    —
                                @endif
                            </td>

                            <td>{{ $patient->contact_number ?: '—' }}</td>

                            <td>
                                <div class="action-links">
                                    <a href="{{ route('patients.show', $patient) }}"
                                       class="action-btn action-view">
                                        View
                                    </a>

                                    <a href="{{ route('patients.edit', $patient) }}"
                                       class="action-btn action-edit">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-state">
                                <div class="empty-icon" aria-hidden="true">
                                    ♙
                                </div>

                                <h5>
                                    {{ request('search') ? 'No matching patients found' : 'No patient records yet' }}
                                </h5>

                                <p>
                                    {{ request('search')
                                        ? 'Try a different search term.'
                                        : 'Your registered patients will appear here once you add your first record.' }}
                                </p>

                                @unless (request('search'))
                                    <a href="{{ route('patients.create') }}"
                                       class="btn-register">
                                        ＋ Register First Patient
                                    </a>
                                @endunless
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="patient-pagination">
            <span>
                Showing {{ $patients->firstItem() ?? 0 }}
                to {{ $patients->lastItem() ?? 0 }}
                of {{ $patients->total() }} records
            </span>

            @if ($patients->hasPages())
                <div>
                    {{ $patients->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>

    </div>
</div>

@endsection
