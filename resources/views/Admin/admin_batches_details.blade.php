@extends('Admin.layouts.app')
@section('title', 'Batches Details | IrsDesign Academy')
@push('styles')
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
 <style>
        body {
            background: #f4f6f9;
            font-family: 'Poppins', sans-serif;
        }

        /* ===== HERO / BANNER ===== */
        .batch-hero {
            height: 260px;
            border-radius: 20px;
            background:
                linear-gradient(rgba(0, 0, 0, .55), rgba(0, 0, 0, .75)),
                url("./assets/img/batch-banner.jpg");
            /* change photo */
            background-size: cover;
            background-position: center;
            color: #fff;
            display: flex;
            align-items: flex-end;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
        }

        .batch-hero h3 {
            font-weight: 600;
        }

        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        .status-running {
            background: #22c55e;
            color: #fff;
        }

        .status-completed {
            background: #6b7280;
            color: #fff;
        }

        /* ===== INFO CARD ===== */
        .info-card {
            background: #fff;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            height: 100%;
        }

        .info-title {
            font-size: 14px;
            color: #6b7280;
        }

        .info-value {
            font-weight: 600;
        }

        /* ===== TRAINER ===== */
        .trainer-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .trainer-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #e0e7ff;
            color: #4338ca;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* ===== STATS ===== */
        .stat {
            text-align: center;
        }

        .stat h4 {
            font-weight: 700;
        }

        .stat p {
            font-size: 13px;
            color: #6b7280;
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            font-weight: 600;
            margin-bottom: 12px;
        }

        .back-btn {
            border-radius: 10px;
            padding: 6px 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .back-btn:hover {
            background-color: #35b5dc;
            color: #fff;
            transform: translateX(-3px);
        }

        .back-btn i {
            font-size: 14px;
        }


        /* RESPONSIVE */
        @media(max-width:768px) {
            .batch-hero {
                height: 220px;
                padding: 20px;
            }
        }
    </style>
@endpush
@section('content')

{{-- <div class="container py-4">
            <div class="d-flex align-items-center mb-3">
                <button class="btn btn-outline-danger back-btn" onclick="goBack()">
                    <i class="bi bi-arrow-left"></i>
                    <span class="ms-1">Back</span>
                </button>
            </div>


            <!-- HERO -->
            <div class="batch-hero mb-4">
                <div>
                    <span class="status-badge status-running mb-2 d-inline-block">Running</span>
                    <h3 class="mb-1">Full Stack Development – Batch A</h3>
                    <p class="mb-0 text-light">React • Node.js • MongoDB</p>
                </div>
            </div>

            <!-- MAIN GRID -->
            <div class="row g-4">

                <!-- LEFT -->
                <div class="col-lg-8">

                    <!-- BATCH INFO -->
                    <div class="info-card mb-4">
                        <h6 class="section-title">Batch Information</h6>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="info-title">Start Date</div>
                                <div class="info-value">10 Jan 2025</div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-title">Duration</div>
                                <div class="info-value">6 Months</div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-title">Schedule</div>
                                <div class="info-value">Mon – Fri (7–9 PM)</div>
                            </div>
                        </div>
                    </div>

                    <!-- TRAINER -->
                    <div class="info-card mb-4">
                        <h6 class="section-title">Trainer</h6>

                        <div class="trainer-box">
                            <div class="trainer-avatar">RK</div>
                            <div>
                                <div class="fw-semibold">Rahul Kumar</div>
                                <small class="text-muted">Senior Full Stack Developer</small>
                            </div>
                        </div>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="info-card">
                        <h6 class="section-title">Batch Description</h6>
                        <p class="mb-0 text-muted">
                            This Full Stack Development batch focuses on building modern web
                            applications using React, Node.js, Express, and MongoDB.
                            Students will work on real-world projects and gain industry-level
                            experience.
                        </p>
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="col-lg-4">

                    <!-- STATS -->
                    <div class="info-card mb-4">
                        <h6 class="section-title">Batch Stats</h6>

                        <div class="row text-center">
                            <div class="col-6 stat">
                                <h4>18</h4>
                                <p>Enrolled</p>
                            </div>
                            <div class="col-6 stat">
                                <h4>25</h4>
                                <p>Total Seats</p>
                            </div>
                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="info-card">
                        <h6 class="section-title">Actions</h6>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">
                                <i class="bi bi-pencil"></i> Edit Batch
                            </button>
                            <button class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i> Delete Batch
                            </button>
                        </div>
                    </div>

                </div>

            </div>

</div> --}}

<div class="container py-4">

    <h4 class="mb-4">
        Manage Materials - {{ $batch->batch_name }}
    </h4>

    {{-- ADD MATERIAL FORM --}}
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" 
                  action="{{ route('admin.batch.materials.store',$batch->id) }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <label>Title</label>
                        <input type="text" name="title" 
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label>Type</label>
                        <select name="type" class="form-select" required>
                            <option value="">Select</option>
                            <option value="pdf">PDF</option>
                            <option value="video">Video</option>
                            <option value="text">Text</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label>Description</label>
                        <textarea name="description" 
                                  class="form-control"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label>Upload File (PDF/Video)</label>
                        <input type="file" name="file" 
                               class="form-control">
                    </div>

                </div>

                <button class="btn btn-success mt-3">
                    Add Material
                </button>
            </form>
        </div>
    </div>

    {{-- MATERIAL LIST --}}
    <div class="card">
        <div class="card-body">

            <h5>All Materials</h5>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($batch->materials as $material)
                    <tr>
                        <td>{{ $material->title }}</td>
                        <td>{{ ucfirst($material->type) }}</td>
                        <td>
                            <form method="POST" 
                                  action="{{ route('admin.material.delete',$material->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            No materials found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection
@push('scripts')
{{-- <script>
        function goBack() {
            window.history.back();
        }
    </script> --}}
@endpush