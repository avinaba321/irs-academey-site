@extends('Student.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/batches.css') }}">
    <style>
        .btn-join-class {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            font-weight: 600;
            padding: 1px 8px;
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-join-class:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
            color: #fff;
        }

        .btn-join-class:active {
            transform: translateY(0);
        }

        .btn-join-class i {
            font-size: 18px;
        }

        /* Alternative: Outline style */
        .btn-join-outline {
            background: transparent;
            border: 2px solid #10b981;
            color: #10b981;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-join-outline:hover {
            background: #10b981;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        /* Dark theme variant */
        .btn-join-dark {
            background: #10b981;
            border: none;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .btn-join-dark:hover {
            background: #059669;
            transform: scale(1.05);
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.5);
            color: #fff;
        }

        /* Pulsing animation (optional) */
        @keyframes pulse-green {

            0%,
            100% {
                box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            }

            50% {
                box-shadow: 0 4px 20px rgba(16, 185, 129, 0.6);
            }
        }

        .btn-join-pulse {
            animation: pulse-green 2s infinite;
        }

        /* Badge Styles */
        .badge-status {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .badge-status.running {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #fff;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .badge-status.upcoming {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #fff;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
        }

        .badge-status.completed {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: #fff;
            box-shadow: 0 2px 8px rgba(107, 114, 128, 0.3);
        }


        /* =========================
           Responsive Improvements
        ========================= */

        @media (max-width: 768px) {

            .batch-head .chip-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .chip {
                font-size: 12px;
                padding: 6px 10px;
            }

            .batch-table th,
            .batch-table td {
                font-size: 13px;
                padding: 10px 8px;
                white-space: nowrap;
            }

            .table-wrap {
                overflow-x: auto;
            }

            .batch-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .batch-footer .btn {
                width: 93%;
                justify-content: center;
                text-align: center;
            }

            .page-title h3 {
                font-size: 20px;
            }

            .tabbtn {
                font-size: 14px;
                padding: 8px;
            }
        }
        @media (max-width: 768px) {

    .action-buttons {
        flex-direction: column;
        align-items: stretch;
    }

    .action-buttons .btn,
    .btn-join-class {
        padding: 7px;
        width: 93%;
        justify-content: center;
        text-align: center;
        margin-left: 14px;
    }

    .upcoming-message {
        justify-content: center;
        text-align: center;
        width: 100%;
    }
}
    </style>
@endpush

@section('content')

    <div class="page-wrap">
        <!-- Header -->
        <div class="page-title">
            <h3>My Batches</h3>
        </div>


        <!-- Batch Card -->
        {{-- <div class="batch-card">

            <!-- head chips -->
            <div class="batch-head">
                <div class="chip-row">
                    <span class="chip green">
                        <i class="bi bi-patch-check-fill"></i> COURSE : FULL FULLSTACK COURSE & TRAINING
                    </span>
                </div>

                <div class="chip-row">
                    <span class="chip blue">
                        <i class="bi bi-calendar2-week-fill"></i> Weekly Mode : OFFLINE (12 Jan 2026 to 18 Jan 2026)
                    </span>
                    <span class="chip gray">
                        <i class="bi bi-calendar-event-fill"></i> Batch Start Date : <b>10-12-2024</b>
                    </span>
                </div>
            </div>

            <!-- table -->
            <div class="table-wrap">
                <div class="scroll-x">
                    <table class="batch-table">
                        <thead>
                            <tr>
                                <th style="width: 18%;">Day</th>
                                <th style="width: 18%;">Time</th>
                                <th style="width: 22%;">Batch ID</th>
                                <th style="width: 10%;">Today's Class</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Tuesday</td>
                                <td>11:00 AM - 1:00 PM</td>
                                <td>WA-087-RAKA-IT-FRJCT-JUL-2025-1</td>
                                <td>
                                    <span class="mode-pill offline"><i class="bi bi-wifi-off"></i> OFFLINE</span>
                                </td>
                            </tr>

                            <tr>
                                <td>Thursday</td>
                                <td>11:00 AM - 1:00 PM</td>
                                <td>WA-087-RAKA-IT-FRJCT-JUL-2025-1</td>
                                <td>
                                    <span class="mode-pill offline"><i class="bi bi-wifi-off"></i> OFFLINE</span>
                                </td>
                            </tr>

                            <tr>
                                <td>Friday</td>
                                <td>11:00 AM - 1:00 PM</td>
                                <td>WA-087-RAKA-IT-FRJCT-JUL-2025-1</td>
                                <td>
                                    <span class="mode-pill offline"><i class="bi bi-wifi-off"></i> OFFLINE</span>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <!-- footer -->
            <div class="batch-footer">
                <div class="footer-panel">
                    <div>
                        <p class="fc-title mb-0">Faculty Contact Details</p>
                        <div class="fc-email">
                            <i class="bi bi-envelope-fill"></i>
                            irsdesign@academy.info
                        </div>
                    </div>

                    <div class="d-flex gap-2 flex-wrap">
                        <button class="btn btn-soft" data-bs-toggle="modal" data-bs-target="#attendanceModal">
                            <i class="bi bi-eye-fill"></i> View Attendance
                        </button>
                    </div>
                </div>
            </div>

        </div> --}}

        @forelse($batches as $batch)

            <div class="batch-card">

                <!-- Header -->
                <div class="batch-head">
                    <div class="chip-row">
                        <span class="chip green">
                            <i class="bi bi-patch-check-fill"></i>
                            COURSE : {{ $batch->course->title }}
                        </span>
                    </div>

                    <div class="chip-row">
                        <span class="chip blue">
                            <i class="bi bi-calendar2-week-fill"></i>
                            Batch : {{ $batch->batch_name }}
                        </span>

                        <span class="chip gray">
                            <i class="bi bi-calendar-event-fill"></i>
                            Start Date : <b>{{ \Carbon\Carbon::parse($batch->start_date)->format('d-m-Y') }}</b>
                        </span>
                    </div>
                </div>

                <!-- Timing -->
                @php
                    $statusText = match ($batch->status) {
                        1 => 'RUNNING',
                        2 => 'UPCOMING',
                        3 => 'COMPLETED',
                        default => 'UNKNOWN',
                    };

                    $statusClass = match ($batch->status) {
                        1 => 'running',
                        2 => 'upcoming',
                        3 => 'completed',
                        default => 'unknown',
                    };
                @endphp
                <div class="table-wrap">
                    <table class="batch-table">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Trainer</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ implode(', ', $batch->batch_days ?? []) }}</td>
                                <td>{{ $batch->batch_timing }}</td>
                                <td>{{ $batch->trainer_name }}</td>
                                <td>
                                    <span class="badge-status {{ $statusClass }}">
                                        {{ $statusText }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Attendance Button -->
                <div class="batch-footer d-flex gap-2 flex-wrap">

                    {{-- ✅ Join Button (Only if Running & Meeting Link Exists) --}}
                    <button class="btn btn-soft" data-bs-toggle="modal"
                        data-bs-target="#attendanceModal{{ $batch->id }}">
                        <i class="bi bi-eye-fill"></i>
                        View Attendance
                    </button>
                    @if ($batch->status == 1 && !empty($batch->meeting_link))
                        <a href="{{ $batch->meeting_link }}" target="_blank" class="btn-join-class">
                            <i class="bi bi-camera-video-fill"></i>
                            Join Class
                        </a>
                    @else
                    <div class="upcoming-message mt-2">
                            <i class="bi bi-clock-history"></i>
                            <span>Starts on {{ \Carbon\Carbon::parse($batch->start_date)->format('d M Y') }}</span>
                        </div>
                    @endif
                    

                    {{-- Attendance Button --}}


                </div>


            </div>

            {{-- Attendance Modal --}}
            <div class="modal fade" id="attendanceModal{{ $batch->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="att-modal-head">
                            <h6>Attendance Details</h6>
                        </div>

                        <div class="att-modal-body">

                            @php
                                $present = $batch->attendances->where('status', 'present')->count();
                                $absent = $batch->attendances->where('status', 'absent')->count();
                                $postpone = $batch->attendances->where('status', 'postpone')->count();
                            @endphp

                            <div class="att-chips">
                                Present : {{ $present }} |
                                Absent : {{ $absent }} |
                                Postpone : {{ $postpone }}
                            </div>

                            <table class="att-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Login</th>
                                        <th>Logout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($batch->attendances as $att)
                                        <tr>
                                            <td>{{ $att->date }}</td>
                                            <td>{{ $att->login_time ?? '-' }}</td>
                                            <td>{{ $att->logout_time ?? '-' }}</td>
                                            <td>{{ ucfirst($att->status) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No attendance records</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        @empty

            <div class="text-center py-5">
                <h5>No Batches Assigned</h5>
            </div>

        @endforelse


    </div>


    <!--=========Premium Attendance Modal==========-->

    {{-- <div class="modal fade premium-modal" id="attendanceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="att-modal-head">
                    <div class="d-flex align-items-center gap-10">
                        <h6 class="att-title mb-0">Attendance Details</h6>
                    </div>

                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <div class="att-chips">
                            <span class="stat-chip present"><i class="bi bi-check-circle-fill"></i> Present :
                                42</span>
                            <span class="stat-chip absent"><i class="bi bi-x-circle-fill"></i> Absent : 21</span>
                            <span class="stat-chip postpone"><i class="bi bi-clock-fill"></i> Postpone : 0</span>
                        </div>

                        <button class="btn-close-premium" type="button" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="att-modal-body">

                    <div class="att-scroll">
                        <table class="att-table">
                            <thead>
                                <tr>
                                    <th style="width: 18%;">Date</th>
                                    <th style="width: 18%;">Login</th>
                                    <th style="width: 18%;">Logout</th>
                                    <th style="width: 18%;">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>2024-12-20</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td><span class="status-pill absent">Absent</span></td>
                                </tr>

                                <tr>
                                    <td>2024-12-20</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td><span class="status-pill absent">Absent</span></td>
                                </tr>

                                <tr>
                                    <td>2024-12-19</td>
                                    <td>11:02 AM</td>
                                    <td>12:59 PM</td>
                                    <td><span class="status-pill present">Present</span></td>
                                </tr>

                                <tr>
                                    <td>2024-12-18</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td><span class="status-pill absent">Absent</span></td>
                                </tr>

                                <tr>
                                    <td>2024-12-17</td>
                                    <td>11:04 AM</td>
                                    <td>01:00 PM</td>
                                    <td><span class="status-pill present">Present</span></td>
                                </tr>

                                <tr>
                                    <td>2024-12-16</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td><span class="status-pill postpone">Postpone</span></td>
                                </tr>

                                <tr>
                                    <td>2024-12-15</td>
                                    <td>11:08 AM</td>
                                    <td>12:55 PM</td>
                                    <td><span class="status-pill present">Present</span></td>
                                </tr>

                                <tr>
                                    <td>2024-12-14</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td><span class="status-pill absent">Absent</span></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div> --}}

@endsection
