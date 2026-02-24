@extends('Student.layouts.app')
@section('title', 'My Queris | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/queries.css') }}">
    <style>
        .query-card {
            background: linear-gradient(135deg, #343943, #0f172a);
            padding: 20px;
            border-radius: 14px;
            margin-bottom: 18px;
            color: #fff;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .25);
            transition: 0.2s ease;
        }

        .query-card:hover {
            transform: translateY(-3px);
        }

        .query-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 12px;
        }

        .query-title {
            font-weight: 600;
            margin-bottom: 4px;
        }

        .query-time {
            font-size: 13px;
            color: #94a3b8;
        }

        .query-details {
            margin: 12px 0;
            color: #e2e8f0;
            line-height: 1.6;
        }

        .query-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        .status-open {
            background: #2563eb;
        }

        .status-pending {
            background: #f59e0b;
            color: #000;
        }

        .status-resolved {
            background: #10b981;
        }

        /* Viewed Badges */
        .view-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .viewed {
            background: rgba(16, 185, 129, .15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, .4);
        }

        .not-viewed {
            background: rgba(148, 163, 184, .15);
            color: #cbd5e1;
            border: 1px solid rgba(148, 163, 184, .4);
        }

        .viewed-time {
            font-size: 13px;
            color: #94a3b8;
        }

        /* Empty State */
        .empty-card {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }

        .empty-card i {
            font-size: 50px;
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('content')

    <div class="wrap">

        <!--  Titles -->
        <div class="title-wrap">
            <h4 class="page-title">My Queries</h4>
            <p class="page-sub">Track your submitted queries and responses</p>
        </div>

        <!--  Tools bar -->
        <div class="tool-bar">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search by title..." />
            </div>

            <div class="row g-2 align-items-center justify-content-between mx-sm-auto">

                <!-- Select -->
                <div class="col-12 col-sm-auto mx-sm-auto">
                    <div class="filter-select w-100">
                        <select class="form-select w-100 text-white">
                            <option>All Status</option>
                            <option>Open</option>
                            <option>Resolved</option>
                            <option>Pending</option>
                        </select>
                    </div>
                </div>

                <!-- Button -->
                <div class="col-12 col-sm-auto mx-sm-auto">
                    <button class="btn btn-new w-100" data-bs-toggle="modal" data-bs-target="#queryModal">
                        <i class="bi bi-plus-circle-fill"></i> New Query
                    </button>
                </div>

            </div>

        </div>


        <!--  Main area -->
        {{-- <div class="main-card">

            @forelse($queries as $query)
                <div class="query-item">
                    <h6>Query Title : {{ $query->title }}</h6>
                    <p>Query Details : {{ $query->details }}</p>

                    <span
                        class="badge 
        @if ($query->status == 'open') bg-primary
        @elseif($query->status == 'pending') bg-warning
        @else bg-success @endif">
                        {{ ucfirst($query->status) }}
                    </span>

                    <div class="small text-secondary mt-1">
                        {{ $query->created_at->diffForHumans() }}
                    </div>
                </div>
            @empty
                <div class="empty-card">
                    <div class="empty-icon">
                        <i class="bi bi-chat-square-text-fill"></i>
                    </div>
                    <h5>No queries submitted yet</h5>
                </div>
            @endforelse


        </div> --}}
        <!--  Main area -->
        {{-- <div class="main-card">

    @forelse($queries as $query)
        <div class="query-item">

            <div class="d-flex justify-content-between align-items-start">
                <h6 class="mb-1">Query Title : {{ $query->title }}</h6>

                @if ($query->is_read)
                    <span class="badge bg-success-subtle text-success border border-success-subtle ms-2"
                          title="Viewed {{ $query->read_at?->diffForHumans() }}">
                        <i class="bi bi-eye-fill me-1"></i> Seen by Admin
                    </span>
                @else
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle ms-2">
                        <i class="bi bi-eye-slash me-1"></i> Not yet viewed
                    </span>
                @endif
            </div>

            <p class="mb-2">Query Details : {{ $query->details }}</p>

            <div class="d-flex align-items-center gap-2 flex-wrap">

                <span class="badge 
                    @if ($query->status == 'open') bg-primary
                    @elseif($query->status == 'pending') bg-warning text-dark
                    @else bg-success @endif">
                    {{ ucfirst($query->status) }}
                </span>

                <span class="small text-secondary">
                    <i class="bi bi-clock me-1"></i>
                    {{ $query->created_at->diffForHumans() }}
                </span>

                @if ($query->is_read && $query->read_at)
                    <span class="small text-success">
                        <i class="bi bi-check2-circle me-1"></i>
                        Admin viewed {{ $query->read_at->diffForHumans() }}
                    </span>
                @endif

            </div>
        </div>
    @empty
        <div class="empty-card">
            <div class="empty-icon">
                <i class="bi bi-chat-square-text-fill"></i>
            </div>
            <h5>No queries submitted yet</h5>
        </div>
    @endforelse

</div> --}}
        <div class="main-card">

            @forelse($queries as $query)
                <div class="query-card">

                    <!-- Top Row -->
                    <div class="query-header">
                        <div>
                            <h6 class="query-title">
                                {{ $query->title }}
                            </h6>
                            <div class="query-time">
                                <i class="bi bi-clock"></i>
                                {{ $query->created_at->diffForHumans() }}
                            </div>
                        </div>

                        <!-- Viewed Badge -->
                        @if ($query->is_read)
                            <span class="view-badge viewed">
                                <i class="bi bi-eye-fill"></i> Seen
                            </span>
                        @else
                            <span class="view-badge not-viewed">
                                <i class="bi bi-eye-slash"></i> Not Viewed
                            </span>
                        @endif
                    </div>

                    <!-- Details -->
                    <p class="query-details">
                        {{ $query->details }}
                    </p>

                    <!-- Bottom Row -->
                    <div class="query-footer">

                        <span
                            class="status-badge 
                    @if ($query->status == 'open') status-open
                    @elseif($query->status == 'pending') status-pending
                    @else status-resolved @endif">
                            {{ ucfirst($query->status) }}
                        </span>

                        @if ($query->is_read && $query->read_at)
                            <span class="viewed-time">
                                Admin viewed {{ $query->read_at->diffForHumans() }}
                            </span>
                        @endif

                    </div>

                </div>
            @empty

                <div class="empty-card">
                    <i class="bi bi-chat-square-text"></i>
                    <h5>No queries submitted yet</h5>
                </div>
            @endforelse
            {{-- Pagination --}}
            @if ($queries->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $queries->links() }}
                </div>
            @endif

        </div>


    </div>

    <!--=================ADD QUERY MODAL ==================-->

    <!-- ✅ Premium Query Modal -->
    <div class="modal fade query-modal" id="queryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width:520px;">
            <div class="modal-content">

                <!-- Header -->
                <div class="qm-head">
                    <div class="qm-icon">
                        <i class="bi bi-play-fill"></i>
                    </div>
                    <div>
                        <h5 class="qm-title">Submit New Query</h5>
                        <p class="qm-sub">Post your question and get help from faculty members</p>
                    </div>
                </div>

                <!-- Body -->
                <div class="qm-body">

                    <!-- Query Title -->
                    <label class="form-label">Query Title</label>
                    <input id="queryTitle" maxlength="100" class="form-control custom-input"
                        placeholder="Brief title for your query..." />

                    <div class="hint-row">
                        <div class="hint">Keep it concise and descriptive</div>
                        <div class="counter"><span id="countText">0</span>/100</div>
                    </div>

                    <!-- Query Details -->
                    <div class="mt-3">
                        <label class="form-label">Query Details</label>
                        <textarea id="queryDetails" class="form-control custom-input"
                            placeholder="Describe your question or issue in detail..."></textarea>
                    </div>

                </div>

                <!-- Footer -->
                <div class="qm-footer">
                    <button id="submitBtn" class="btn btn-submit" disabled>
                        <i class="bi bi-send-fill"></i> Submit Query
                    </button>

                    <button class="btn btn-cancel" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle-fill"></i> Cancel
                    </button>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
    {{-- <script>
        const titleInput = document.getElementById("queryTitle");
        const detailsInput = document.getElementById("queryDetails");
        const counter = document.getElementById("countText");
        const submitBtn = document.getElementById("submitBtn");

        function updateUI() {
            // counter
            counter.innerText = titleInput.value.length;

            // enable submit only if fields filled
            const ok = titleInput.value.trim().length > 0 && detailsInput.value.trim().length > 0;

            if (ok) {
                submitBtn.classList.add("active");
                submitBtn.disabled = false;
                submitBtn.style.cursor = "pointer";
            } else {
                submitBtn.classList.remove("active");
                submitBtn.disabled = true;
            }
        }

        titleInput.addEventListener("input", updateUI);
        detailsInput.addEventListener("input", updateUI);

        // demo submit
        submitBtn.addEventListener("click", () => {
            alert("Query Submitted Successfully ✅");
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const titleInput = document.getElementById("queryTitle");
            const detailsInput = document.getElementById("queryDetails");
            const counter = document.getElementById("countText");
            const submitBtn = document.getElementById("submitBtn");

            function updateUI() {
                counter.innerText = titleInput.value.length;

                const ok = titleInput.value.trim().length > 0 &&
                    detailsInput.value.trim().length > 0;

                submitBtn.disabled = !ok;
            }

            titleInput.addEventListener("input", updateUI);
            detailsInput.addEventListener("input", updateUI);

            submitBtn.addEventListener("click", function() {

                fetch("{{ route('student.queries.store') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            title: titleInput.value,
                            details: detailsInput.value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert("Something went wrong.");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert("Error submitting query.");
                    });

            });

        });
    </script>
@endpush
