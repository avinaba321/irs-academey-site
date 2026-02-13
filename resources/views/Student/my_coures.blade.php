{{-- @extends('Student.layouts.app')
@section('title', 'My Courses | IrsDesign Academy')
@push('styles')
<link rel="stylesheet" href="{{ asset('student/css/myCourse.css') }}">
@endpush

@section('content')

<div class="page-wrap">

            <!-- Header -->
            <div class="page-title">
                <h3>My Courses</h3>
                <span class="attempt-pill">
                    <i class="bi bi-lightning-charge-fill"></i> Attempt No : 1
                </span>
            </div>

            <!-- Premium Course Card -->
            <div class="course-card">

                <!-- header -->
                <div class="course-head">
                    <div class="left">
                        <h5>Course Fee Summary</h5>
                        <p>All fees shown below include GST & payment breakdown.</p>
                    </div>
                </div>

                <!-- chips -->
                <div class="chip-row">
                    <span class="chip blue">
                        <i class="bi bi-code-slash"></i> Full Fullstack  Course & Training
                    </span>
                </div>

                <div class="card-divider"></div>

                <!-- fee list -->
                <div class="fee-wrap">

                    <div class="fee-row">
                        <div class="fee-left">
                            <div class="fee-title"><i class="bi bi-cash-stack"></i> Total Course Fee</div>
                            <div class="fee-sub">(Including 18% GST)</div>
                        </div>
                        <div class="fee-right">₹45,000.00</div>
                    </div>

                    <div class="fee-row">
                        <div class="fee-left">
                            <div class="fee-title"><i class="bi bi-receipt-cutoff"></i> Registration Fee</div>
                            <div class="fee-sub">(Including 18% GST)</div>
                        </div>
                        <div class="fee-right">₹5,000.00</div>
                    </div>

                    <div class="fee-row">
                        <div class="fee-left">
                            <div class="fee-title"><i class="bi bi-wallet2"></i> Total Fee Due</div>
                            <div class="fee-sub">Payable remaining amount</div>
                        </div>
                        <div class="fee-right due">₹0.00</div>
                    </div>

                    <div class="fee-row">
                        <div class="fee-left">
                            <div class="fee-title"><i class="bi bi-percent"></i> Discount</div>
                            <div class="fee-sub">Scholarship / offer applied</div>
                        </div>
                        <div class="fee-right discount">- ₹20,127.11</div>
                    </div>

                </div>

                <!-- bottom strip -->
                <div class="bottom-strip">
                    <div class="strip-item">
                        <i class="bi bi-credit-card-2-front-fill"></i>
                        <div>
                            Next Payment Amount: <b>N/A</b>
                        </div>
                    </div>

                    <div class="strip-item">
                        <i class="bi bi-calendar-event-fill"></i>
                        <div>
                            Next Payment Date: <b>N/A</b>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection --}}

@extends('Student.layouts.app')
@section('title', 'My Attendance | IrsDesign Academy')

@push('styles')
<style>
    body {
        background: #f4f6f9;
    }

    .attendance-container {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Header */
    .attendance-header {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .page-title {
        font-size: 24px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .page-subtitle {
        color: #6b7280;
        font-size: 14px;
    }

    /* Filters */
    .filters-section {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .filters-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .filter-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .filter-group select {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        font-size: 14px;
        background: #fff;
    }

    .filter-group select:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        border-left: 4px solid;
        transition: transform 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-2px);
    }

    .stat-card.present { border-left-color: #10b981; }
    .stat-card.absent { border-left-color: #ef4444; }
    .stat-card.late { border-left-color: #f59e0b; }
    .stat-card.excused { border-left-color: #6b7280; }
    .stat-card.percentage { border-left-color: #3b82f6; }

    .stat-label {
        font-size: 13px;
        color: #6b7280;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: #1f2937;
    }

    .stat-icon {
        float: right;
        font-size: 24px;
        opacity: 0.3;
    }

    /* Calendar */
    .calendar-section {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f3f4f6;
    }

    .calendar-title {
        font-size: 20px;
        font-weight: 600;
        color: #1f2937;
    }

    .calendar-nav {
        display: flex;
        gap: 10px;
    }

    .nav-btn {
        background: #f3f4f6;
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .nav-btn:hover {
        background: #e5e7eb;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
    }

    .calendar-day-header {
        text-align: center;
        font-weight: 600;
        color: #6b7280;
        font-size: 12px;
        padding: 10px;
        text-transform: uppercase;
    }

    .calendar-day {
        aspect-ratio: 1;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        position: relative;
        background: #f9fafb;
        border: 2px solid transparent;
    }

    .calendar-day:hover {
        background: #f3f4f6;
        transform: scale(1.05);
    }

    .calendar-day.other-month {
        color: #d1d5db;
        background: transparent;
    }

    .calendar-day.today {
        border-color: #3b82f6;
        font-weight: 700;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .calendar-day.present {
        background: #d1fae5;
        color: #065f46;
    }

    .calendar-day.absent {
        background: #fee2e2;
        color: #991b1b;
    }

    .calendar-day.late {
        background: #fef3c7;
        color: #92400e;
    }

    .calendar-day.excused {
        background: #e5e7eb;
        color: #374151;
    }

    .calendar-day-number {
        font-size: 16px;
        margin-bottom: 4px;
    }

    .calendar-day-status {
        font-size: 10px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .calendar-day-icon {
        position: absolute;
        top: 4px;
        right: 4px;
        font-size: 12px;
    }

    /* Legend */
    .legend {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
        flex-wrap: wrap;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #6b7280;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }

    .legend-color.present { background: #d1fae5; }
    .legend-color.absent { background: #fee2e2; }
    .legend-color.late { background: #fef3c7; }
    .legend-color.excused { background: #e5e7eb; }

    /* Responsive */
    @media (max-width: 768px) {
        .calendar-grid {
            gap: 4px;
        }

        .calendar-day {
            font-size: 12px;
        }

        .calendar-day-number {
            font-size: 14px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endpush

@section('content')

@php
    // Static data for testing
    $currentMonth = now()->format('F Y');
    $today = now()->day;
    
    // Attendance pattern: 1-present, 2-absent, 3-late, 4-excused, 0-no class
    $attendancePattern = [
        1 => 'present',
        2 => 'present', 
        3 => 'present',
        4 => 'absent',
        5 => 'present',
        6 => 'present',
        7 => 'present',
        8 => 'late',
        9 => 'present',
        10 => 'present',
        11 => 'absent',
        12 => 'present',
        13 => 'present',
        14 => 'excused',
        15 => 'present',
        16 => 'present',
        17 => 'late',
        18 => 'present',
        19 => 'present',
        20 => 'present',
        21 => 'absent',
        22 => 'present',
        23 => 'present',
        24 => 'present',
        25 => 'late',
    ];

    // Calculate stats
    $totalDays = count($attendancePattern);
    $presentDays = count(array_filter($attendancePattern, fn($v) => $v === 'present'));
    $absentDays = count(array_filter($attendancePattern, fn($v) => $v === 'absent'));
    $lateDays = count(array_filter($attendancePattern, fn($v) => $v === 'late'));
    $excusedDays = count(array_filter($attendancePattern, fn($v) => $v === 'excused'));
    $percentage = round(($presentDays / $totalDays) * 100, 1);

    // Calendar setup
    $firstDay = now()->startOfMonth();
    $lastDay = now()->endOfMonth();
    $startDay = $firstDay->copy()->startOfWeek();
    $endDay = $lastDay->copy()->endOfWeek();
@endphp

<div class="attendance-container">

    <!-- Header -->
    <div class="attendance-header">
        <h3 class="page-title">
            <i class="bi bi-calendar-check"></i> My Attendance
        </h3>
        <p class="page-subtitle">Track your attendance and performance</p>
    </div>

    <!-- Filters -->
    <div class="filters-section">
        <div class="filters-grid">
            <div class="filter-group">
                <label>Select Batch</label>
                <select>
                    <option selected>Morning Batch A - Full Stack Development</option>
                    <option>Evening Batch B - UI/UX Design</option>
                    <option>Weekend Batch C - Data Science</option>
                </select>
            </div>

            <div class="filter-group">
                <label>Month</label>
                <select>
                    <option>January</option>
                    <option selected>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                </select>
            </div>

            <div class="filter-group">
                <label>Year</label>
                <select>
                    <option>2024</option>
                    <option>2025</option>
                    <option selected>2026</option>
                    <option>2027</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card present">
            <i class="bi bi-check-circle stat-icon"></i>
            <div class="stat-label">Present</div>
            <div class="stat-value">{{ $presentDays }}</div>
        </div>

        <div class="stat-card absent">
            <i class="bi bi-x-circle stat-icon"></i>
            <div class="stat-label">Absent</div>
            <div class="stat-value">{{ $absentDays }}</div>
        </div>

        <div class="stat-card late">
            <i class="bi bi-clock-history stat-icon"></i>
            <div class="stat-label">Late</div>
            <div class="stat-value">{{ $lateDays }}</div>
        </div>

        <div class="stat-card excused">
            <i class="bi bi-shield-check stat-icon"></i>
            <div class="stat-label">Excused</div>
            <div class="stat-value">{{ $excusedDays }}</div>
        </div>

        <div class="stat-card percentage">
            <i class="bi bi-graph-up stat-icon"></i>
            <div class="stat-label">Attendance Rate</div>
            <div class="stat-value">{{ $percentage }}%</div>
        </div>
    </div>

    <!-- Calendar -->
    <div class="calendar-section">
        <div class="calendar-header">
            <h4 class="calendar-title">
                {{ $currentMonth }}
            </h4>
            <div class="calendar-nav">
                <button class="nav-btn">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="nav-btn">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="calendar-grid">
            <!-- Day Headers -->
            <div class="calendar-day-header">Sun</div>
            <div class="calendar-day-header">Mon</div>
            <div class="calendar-day-header">Tue</div>
            <div class="calendar-day-header">Wed</div>
            <div class="calendar-day-header">Thu</div>
            <div class="calendar-day-header">Fri</div>
            <div class="calendar-day-header">Sat</div>

            <!-- Days -->
            @for($date = $startDay->copy(); $date->lte($endDay); $date->addDay())
                @php
                    $day = $date->day;
                    $isCurrentMonth = $date->month == now()->month;
                    $isToday = $date->isSameDay(now());
                    $status = $isCurrentMonth && isset($attendancePattern[$day]) ? $attendancePattern[$day] : '';
                @endphp

                <div class="calendar-day {{ !$isCurrentMonth ? 'other-month' : '' }} {{ $isToday ? 'today' : '' }} {{ $status }}">
                    @if($status)
                        <i class="bi {{ 
                            $status == 'present' ? 'bi-check-circle-fill' : 
                            ($status == 'absent' ? 'bi-x-circle-fill' : 
                            ($status == 'late' ? 'bi-clock-fill' : 'bi-shield-fill'))
                        }} calendar-day-icon"></i>
                    @endif
                    <div class="calendar-day-number">{{ $day }}</div>
                    @if($status)
                        <div class="calendar-day-status">{{ $status }}</div>
                    @endif
                </div>
            @endfor
        </div>

        <!-- Legend -->
        <div class="legend">
            <div class="legend-item">
                <div class="legend-color present"></div>
                <span>Present</span>
            </div>
            <div class="legend-item">
                <div class="legend-color absent"></div>
                <span>Absent</span>
            </div>
            <div class="legend-item">
                <div class="legend-color late"></div>
                <span>Late</span>
            </div>
            <div class="legend-item">
                <div class="legend-color excused"></div>
                <span>Excused</span>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    // Static demo - navigation disabled
    document.querySelectorAll('.nav-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            alert('This is a static demo. Month navigation is disabled.');
        });
    });

    document.querySelectorAll('.filter-group select').forEach(select => {
        select.addEventListener('change', function() {
            alert('This is a static demo. Filters are disabled.');
        });
    });

    // Add click tooltip on calendar days
    document.querySelectorAll('.calendar-day').forEach(day => {
        if (!day.classList.contains('other-month')) {
            day.addEventListener('click', function() {
                const status = this.classList.contains('present') ? 'Present' :
                              this.classList.contains('absent') ? 'Absent' :
                              this.classList.contains('late') ? 'Late' :
                              this.classList.contains('excused') ? 'Excused' : 'No class';
                
                const dayNum = this.querySelector('.calendar-day-number').textContent;
                
                if (status !== 'No class') {
                    alert(`Day ${dayNum}: ${status}`);
                }
            });
        }
    });
</script>
@endpush