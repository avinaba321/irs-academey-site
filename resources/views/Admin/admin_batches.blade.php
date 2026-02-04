@extends('Admin.layouts.app')
@section('title', 'Batches | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    {{-- <style>
        body {
            background: #f8fafc;
        }

        /* PAGE HEADER */
        .page-head h5 {
            font-weight: 600;
        }

        .page-head p {
            font-size: 14px;
            color: #6b7280;
        }

        /* CARD */
        .batches-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
            padding: 16px;
            height: 100%;
        }

        /* AVATAR */
        .batches-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #eef2ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* META */
        .meta {
            font-size: 13px;
            color: #6b7280;
        }

        /* STATUS */
        .status {
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 20px;
        }

        .active {
            background: #dcfce7;
            color: #15803d;
        }

        .inactive {
            background: #fee2e2;
            color: #b91c1c;
        }
    </style> --}}

    <style>
        /* Batch Card */
        .batches-card {
            padding: 20px;
            border-radius: 16px;
            background: white;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .batches-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Avatar */
        .batches-avatar {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: linear-gradient(135deg, #5b72ee 0%, #8e54e9 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }

        /* Batch Title */
        .batch-title {
            font-size: 1rem;
            font-weight: 600;
            color: #212529;
            margin-bottom: 4px;
        }

        /* Course Name */
        .batch-course {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 12px;
        }

        /* Batch Timing Row */
        .batch-timing-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            color: #495057;
            padding: 8px 0;
        }

        .batch-timing-row i {
            color: #6c757d;
            font-size: 1rem;
        }

        /* Batch Details List */
        .batch-details-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .batch-details-list li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 0.875rem;
            color: #495057;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .batch-details-list li:last-child {
            margin-bottom: 0;
        }

        .batch-details-list i {
            color: #6c757d;
            font-size: 0.875rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* Footer */
        .batch-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            margin-top: 16px;
            border-top: 1px solid #e9ecef;
        }

        /* Students Count */
        .students-count {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.875rem;
            color: #6c757d;
        }

        .students-count i {
            font-size: 1rem;
        }

        /* Status Badge */
        .batch-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-running {
            background-color: #d4edda;
            color: #155724;
        }

        .status-upcoming {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-completed {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .batch-status i {
            font-size: 0.875rem;
        }

        /* Dropdown Button */
        .batches-card .dropdown button {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .batches-card .dropdown button:hover {
            background-color: #f8f9fa;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .batches-card {
                padding: 16px;
            }
        }

        /* Filter container spacing */
.filter-row {
    max-width: 100%;
}

/* Inputs styling */
.filter-input {
    border-radius: 999px;
    padding: 10px 16px;
    font-size: 0.9rem;
    border: 1.5px solid #ffb547;
    box-shadow: none;
}

/* Reduce height slightly */
.filter-input {
    height: 42px;
}

/* Mobile tweak */
@media (max-width: 576px) {
    .filter-input {
        font-size: 0.85rem;
        height: 40px;
    }
}

    </style>
@endpush
@section('content')

    <!-- BATCHES GRID (BATCHES STYLE) -->

    <div class="container-fluid px-3 px-md-4 mt-4">
        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-3 page-head">
            <div>
                <h5>Batches</h5>
                <p>Manage your Batches</p>
            </div>
            <button class="btn btn-primary btn-md btn-sm-sm" onclick="openAddBatch()">
                <i class="bi bi-plus-lg"></i> Add Batches
            </button>
        </div>

        <!-- SEARCH -->
        {{-- <input type="text" class="form-control mb-4 shadow-lg" placeholder="Search batches..."> --}}
        <div class="mb-4">
            <div class="position-relative">
                <input type="text" class="form-control shadow-lg ps-5" id="searchBatch"
                    placeholder="Search batches by name, course, or trainer..." autocomplete="off">
                <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
            </div>
        </div>

        {{-- <div class="row g-3 mb-4">
            <!-- Course Filter -->
            <div class="col-md-3">
                <select class="form-select" id="filterCourse">
                    <option value="">All Courses</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>

          <div class="col-md-3">
    <select class="form-select" id="filterBatchName">
        <option value="">All Batches</option>
        @foreach ($batchNames as $name)
            <option value="{{ $name }}">{{ $name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <select class="form-select" id="filterBatchTiming">
        <option value="">All Timings</option>
        @foreach ($batchTimings as $timing)
            <option value="{{ $timing }}">{{ $timing }}</option>
        @endforeach
    </select>
</div>

            <!-- Start Date -->
            <div class="col-md-3">
                <input type="date" class="form-control" id="filterStartDate">
            </div>

            <!-- End Date -->
            <div class="col-md-3">
                <input type="date" class="form-control" id="filterEndDate">
            </div>
        </div> --}}
        <div class="row g-3 align-items-end filter-row mb-3">

            <!-- Course -->
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <select class="form-select filter-input" id="filterCourse">
                    <option value="">All Courses</option>
                     @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Batch -->
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <select class="form-select filter-input" id="filterBatchName">
                    <option value="">All Batches</option>
                            @foreach ($batchNames as $name)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
                </select>
            </div>

            <!-- Timing -->
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <select class="form-select filter-input" id="filterBatchTiming">
                    <option value="">All Timings</option>
                     @foreach ($batchTimings as $timing)
            <option value="{{ $timing }}">{{ $timing }}</option>
        @endforeach
                </select>
            </div>

            <!-- Start Date -->
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <input type="date" class="form-control filter-input" id="filterStartDate">
            </div>

            <!-- End Date -->
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <input type="date" class="form-control filter-input" id="filterEndDate">
            </div>

        </div>


        <!-- BATCHES GRID -->
        <div class="row g-4" id="batchGrid">
            @forelse($batches as $batch)
                <!-- BATCH CARD -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="batches-card shadow-sm">

                        <!-- Header: Avatar & Menu -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="batches-avatar">
                                {{ strtoupper(substr($batch->batch_name, 0, 2)) }}
                            </div>

                            <div class="dropdown">
                                <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" onclick='openEditBatch(@json($batch))'>
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger" onclick="deleteBatch({{ $batch->id }})">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Batch Name -->
                        <h6 class="batch-title mb-1">{{ $batch->batch_name }}</h6>

                        <!-- Course Name -->
                        <p class="batch-course mb-3">{{ $batch->course->title ?? $batch->course_name }}</p>

                        <!-- Batch Timing -->
                        @if ($batch->batch_timing)
                            <div class="batch-timing-row mb-3">
                                <i class="bi bi-clock"></i>
                                <span>{{ $batch->batch_timing }}</span>
                            </div>
                        @endif

                        <!-- Batch Details List -->
                        <ul class="batch-details-list mb-3">
                            <li>
                                <i class="bi bi-calendar3"></i>
                                <span>Start: {{ \Carbon\Carbon::parse($batch->start_date)->format('d M Y') }}</span>
                            </li>
                            @if ($batch->end_date)
                                <li>
                                    <i class="bi bi-calendar3"></i>
                                    <span>End: {{ \Carbon\Carbon::parse($batch->end_date)->format('d M Y') }}</span>
                                </li>
                            @endif
                            <li>
                                <i class="bi bi-person-video2"></i>
                                <span>Trainer: {{ $batch->trainer_name }}</span>
                            </li>
                        </ul>

                        <!-- Footer: Students Count & Status -->
                        <div class="batch-footer">
                            <div class="students-count">
                                <i class="bi bi-people"></i>
                                <span>{{ $batch->students_count ?? 0 }} students</span>
                            </div>

                            <!-- Status Badge -->
                            @if ($batch->status == 1)
                                <span class="batch-status status-running">
                                    <i class="bi bi-play-circle-fill"></i> Running
                                </span>
                            @elseif($batch->status == 2)
                                <span class="batch-status status-upcoming">
                                    <i class="bi bi-hourglass-split"></i> Upcoming
                                </span>
                            @else
                                <span class="batch-status status-completed">
                                    <i class="bi bi-check-circle-fill"></i> Completed
                                </span>
                            @endif
                        </div>

                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                        <h5 class="mt-3 text-muted">No Batches Found</h5>
                        <p class="text-muted">Click "Add New Batch" to create your first batch</p>
                        <button class="btn btn-primary mt-2" onclick="openAddBatch()">
                            <i class="bi bi-plus-circle"></i> Add New Batch
                        </button>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- ADD / EDIT BATCH MODAL -->
        {{-- <div class="modal fade" id="batchModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">

                <div class="modal-header">
                    <h5 class="modal-title" id="batchModalTitle">Add Batch</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="batchId">

                    <!-- Batch Name -->
                    <div class="mb-3">
                        <label class="form-label">Batch Name</label>
                        <input type="text" class="form-control" id="bName">
                    </div>

                    <!-- Course Dropdown -->
                    <div class="mb-3">
                        <label class="form-label">Course</label>
                        <select class="form-select" id="bCourse">
                            <option value="">Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Trainer -->
                    <div class="mb-3">
                        <label class="form-label">Trainer Name</label>
                        <input type="text" class="form-control" id="bTrainer">
                    </div>

                    <!-- Dates -->
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="bStart">
                        </div>
                        <div class="col-6">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" id="bEnd">
                        </div>
                    </div>
                    <!-- Batch Timing (NEW FIELD) -->
                    <div class="mb-3 mt-2">
                        <label class="form-label">Batch Timing</label>
                        <input type="text" class="form-control" id="bTiming" placeholder="e.g., 10:00 AM - 12:00 PM"
                            required>
                    </div>


                    <!-- Meeting Link -->
                    <div class="mt-3">
                        <label class="form-label">Meeting Link</label>
                        <input type="url" class="form-control" id="bMeeting"
                            placeholder="https://meet.google.com/...">
                    </div>

                    <!-- Status -->
                    <div class="mt-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="bStatus">
                            <option value="">Select a Status</option>
                            <option value="1">Running</option>
                            <option value="2">Upcoming</option>
                            <option value="3">Completed</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" onclick="saveBatch()">Save</button>


                </div>

            </div>
        </div>
    </div> --}}

        <!-- ADD / EDIT BATCH MODAL -->
        <div class="modal fade" id="batchModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4">

                    <div class="modal-header">
                        <h5 class="modal-title" id="batchModalTitle">Add Batch</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form id="batchForm" data-parsley-validate>
                            <input type="hidden" id="batchId">

                            <!-- Batch Name -->
                            <div class="mb-3">
                                <label class="form-label">Batch Name *</label>
                                <input type="text" class="form-control" id="bName" required
                                    data-parsley-required-message="Batch name is required">
                                <div class="invalid-feedback" id="error-batch_name"></div>
                            </div>

                            <!-- Course -->
                            <div class="mb-3">
                                <label class="form-label">Course *</label>
                                <select class="form-select" id="bCourse" required
                                    data-parsley-required-message="Please select a course">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="error-course_id"></div>
                            </div>

                            <!-- Trainer -->
                            <div class="mb-3">
                                <label class="form-label">Trainer Name *</label>
                                <input type="text" class="form-control" id="bTrainer" required
                                    data-parsley-required-message="Trainer name is required">
                                <div class="invalid-feedback" id="error-trainer_name"></div>
                            </div>

                            <!-- Dates -->
                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">Start Date *</label>
                                    <input type="date" class="form-control" id="bStart" required
                                        data-parsley-required-message="Start date is required">
                                    <div class="invalid-feedback" id="error-start_date"></div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="bEnd">
                                    <div class="invalid-feedback" id="error-end_date"></div>
                                </div>
                            </div>

                            <!-- Timing -->
                            <div class="mt-3">
                                <label class="form-label">Batch Timing *</label>
                                <input type="text" class="form-control" id="bTiming"
                                    placeholder="10:00 AM - 12:00 PM" required
                                    data-parsley-required-message="Batch timing is required">
                                <div class="invalid-feedback" id="error-batch_timing"></div>
                            </div>

                            <!-- Meeting -->
                            <div class="mt-3">
                                <label class="form-label">Meeting Link</label>
                                <input type="url" class="form-control" id="bMeeting">
                                <div class="invalid-feedback" id="error-meeting_link"></div>
                            </div>

                            <!-- Status -->
                            <div class="mt-3">
                                <label class="form-label">Status *</label>
                                <select class="form-select" id="bStatus" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Running</option>
                                    <option value="2">Upcoming</option>
                                    <option value="3">Completed</option>
                                </select>
                                <div class="invalid-feedback" id="error-status"></div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" onclick="saveBatch()">Save</button>
                    </div>

                </div>
            </div>
        </div>


    @endsection
    @push('scripts')
        <script>
            const batchModalEl = document.getElementById("batchModal");
            const batchModal = new bootstrap.Modal(batchModalEl);

            const batchModalTitle = document.getElementById("batchModalTitle");

            const bId = document.getElementById("batchId");
            const bName = document.getElementById("bName");
            const bCourse = document.getElementById("bCourse"); // select (admin_courses)
            const bTrainer = document.getElementById("bTrainer");
            const bStart = document.getElementById("bStart");
            const bEnd = document.getElementById("bEnd");
            const bTiming = document.getElementById("bTiming");
            const bMeeting = document.getElementById("bMeeting");
            const bStatus = document.getElementById("bStatus");

            /* ==========================
               ADD BATCH
            ========================== */
            function openAddBatch() {

                batchModalTitle.innerText = "Add Batch";
                bId.value = "";

                bName.value = "";
                bCourse.value = "";
                bTrainer.value = "";
                bStart.value = "";
                bEnd.value = "";
                bTiming.value = "";
                bMeeting.value = "";
                bStatus.value = "1"; // Running

                batchModal.show();
            }

            /* ==========================
               EDIT BATCH
            ========================== */
            function openEditBatch(batch) {

                batchModalTitle.innerText = "Edit Batch";

                bId.value = batch.id;
                bName.value = batch.batch_name;
                bCourse.value = batch.course_id;
                bTrainer.value = batch.trainer_name;
                bStart.value = batch.start_date;
                bEnd.value = batch.end_date ?? "";
                bTiming.value = batch.batch_timing ?? "";
                bMeeting.value = batch.meeting_link ?? "";
                bStatus.value = batch.status;

                batchModal.show();
            }

            /* ==========================
               SAVE (ADD / EDIT)
            ========================== */
            function saveBatch() {

                const isEdit = bId.value !== "";

                const payload = {
                    batch_name: bName.value,
                    course_id: bCourse.value,
                    trainer_name: bTrainer.value,
                    start_date: bStart.value,
                    end_date: bEnd.value,
                    batch_timing: bTiming.value,
                    meeting_link: bMeeting.value,
                    status: bStatus.value

                };

                let url = "/admin/batches/store";
                let method = "POST";

                if (isEdit) {
                    url = `/admin/batches/${bId.value}/update`;
                    payload._method = "PUT";
                }

                fetch(url, {
                        method: method,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(async res => {
                        const data = await res.json();
                        if (!res.ok) throw data;
                        return data;
                    })
                    .then(data => {
                        alert(data.message || "Batch saved successfully");
                        batchModal.hide();
                        location.reload();
                    })
                    .catch(err => {
                        if (err.errors) {
                            alert(Object.values(err.errors)[0][0]);
                        } else {
                            alert("Failed to save batch");
                        }
                    });
            }
        </script>

        <script>
            /* ==========================
                                                   DELETE BATCH
                                                ========================== */
            function deleteBatch(batchId) {
                if (!confirm('Are you sure you want to delete this batch? This action cannot be undone.')) {
                    return;
                }

                fetch(`/admin/batches/${batchId}/delete`, {
                        method: 'DELETE',
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json",
                            "Content-Type": "application/json"
                        }
                    })
                    .then(async res => {
                        const data = await res.json();
                        if (!res.ok) throw data;
                        return data;
                    })
                    .then(data => {
                        alert(data.message || "Batch deleted successfully");
                        location.reload();
                    })
                    .catch(err => {
                        console.error('Error:', err);
                        alert(err.message || "Failed to delete batch");
                    });
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const searchInput = document.getElementById('searchBatch');
                const batchCols = document.querySelectorAll('.col-12.col-md-6.col-xl-4');

                searchInput.addEventListener('input', function() {

                    const query = this.value.toLowerCase().trim();

                    batchCols.forEach(col => {

                        const card = col.querySelector('.batches-card');
                        if (!card) return;

                        const batchName = card.querySelector('.batch-title')?.innerText.toLowerCase() ||
                            '';
                        const courseName = card.querySelector('.batch-course')?.innerText
                            .toLowerCase() || '';
                        const details = card.querySelector('.batch-details-list')?.innerText
                            .toLowerCase() || '';

                        if (
                            batchName.includes(query) ||
                            courseName.includes(query) ||
                            details.includes(query)
                        ) {
                            col.style.display = '';
                        } else {
                            col.style.display = 'none';
                        }
                    });

                });

            });
        </script>
        <script>
            const filters = [
                'filterCourse',
                'filterBatchName',
                'filterStartDate',
                'filterBatchTiming',
                'filterEndDate'
            ];

            filters.forEach(id => {
                const el = document.getElementById(id);
                if (!el) return;
                el.addEventListener('change', filterBatches);
                el.addEventListener('keyup', filterBatches);
            });

            function filterBatches() {

                const params = new URLSearchParams({
                    course_id: document.getElementById('filterCourse').value,
                    batch_name: document.getElementById('filterBatchName').value,
                    batch_timing: document.getElementById('filterBatchTiming')?.value,
                    start_date: document.getElementById('filterStartDate').value,
                    end_date: document.getElementById('filterEndDate').value
                });

                fetch(`{{ route('admin.batches.filter') }}?${params.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        const grid = document.getElementById('batchGrid');
                        grid.innerHTML = '';

                        if (!data.batches.length) {
                            grid.innerHTML = `
                    <div class="col-12 text-center py-5 text-muted">
                        No batches found
                    </div>`;
                            return;
                        }

                        data.batches.forEach(batch => {
                            grid.innerHTML += buildBatchCard(batch);
                        });
                    })
                    .catch(err => console.error(err));
            }

            function buildBatchCard(batch) {

                const statusMap = {
                    1: `<span class="batch-status status-running">Running</span>`,
                    2: `<span class="batch-status status-upcoming">Upcoming</span>`,
                    3: `<span class="batch-status status-completed">Completed</span>`
                };

                return `
    <div class="col-12 col-md-6 col-xl-4">
        <div class="batches-card shadow-sm">

            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="batches-avatar">
                    ${batch.batch_name.substring(0,2).toUpperCase()}
                </div>

                <div class="dropdown">
                    <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" onclick='openEditBatch(${JSON.stringify(batch)})'>
                                Edit
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" onclick="deleteBatch(${batch.id})">
                                Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <h6 class="batch-title mb-1">${batch.batch_name}</h6>
            <p class="batch-course mb-3">${batch.course?.title ?? batch.course_name}</p>

            ${batch.batch_timing ? `
                        <div class="batch-timing-row mb-3">
                            <i class="bi bi-clock"></i> ${batch.batch_timing}
                        </div>` : ''}

            <ul class="batch-details-list mb-3">
                <li><i class="bi bi-calendar3"></i> Start: ${batch.start_date}</li>
                ${batch.end_date ? `<li><i class="bi bi-calendar3"></i> End: ${batch.end_date}</li>` : ''}
                <li><i class="bi bi-person-video2"></i> Trainer: ${batch.trainer_name}</li>
            </ul>

            <div class="batch-footer">
                <div class="students-count">
                    <i class="bi bi-people"></i> ${batch.students_count ?? 0} students
                </div>
                ${statusMap[batch.status]}
            </div>

        </div>
    </div>`;
            }
        </script>
    @endpush
