@extends('Student.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/batches.css') }}">
@endpush

@section('content')

    <div class="page-wrap">
        <!-- Header -->
        <div class="page-title">
            <h3>My Batches</h3>
        </div>

        <!-- Premium Tabs -->
        <div class="tabbar">
            <div class="row g-0">
                <div class="col-12">
                    <button class="tabbtn active" type="button">
                        <i class="bi bi-laptop"></i>
                        IT BATCH
                    </button>
                </div>
            </div>
        </div>

        <!-- Batch Card -->
        <div class="batch-card">

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

        </div>

    </div>


    <!--=========Premium Attendance Modal==========-->

    <div class="modal fade premium-modal" id="attendanceModal" tabindex="-1" aria-hidden="true">
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
    </div>

@endsection
