@extends('Student.layouts.app')
@section('title', 'My Material | IrsDesign Academy')
@push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('student/css/courseMaterial.css') }}"> --}}
    <style>
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

        /* Page Layout */
        .wrap {
            padding: 20px;
        }

        .page-head {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: white;
            margin-bottom: 5px;
        }

        .page-sub {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Toolbar */
        .tool-bar {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 400px;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
        }

        .search-box input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .filter-select select {
            padding: 10px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            background: #fff;
            min-width: 150px;
        }

        /* Courses Grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Course Card */
        .course-card {
            background: #2d3748;
            border-radius: 12px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #374151;
        }

        .course-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .course-top {
            display: flex;
            justify-content: space-between;
            align-items: start;
            gap: 15px;
            margin-bottom: 15px;
        }

        .course-name {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 8px;
        }

        .course-meta {
            color: #9ca3af;
            font-size: 13px;
            display: flex;
            align-items: center;
        }

        .divider {
            height: 1px;
            background: #374151;
            margin: 15px 0;
        }

        .course-actions {
            display: flex;
            gap: 10px;
        }

        .btn-soft {
            flex: 1;
            padding: 10px 20px;
            background: #374151;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-soft:hover {
            background: #4b5563;
            color: #fff;
            transform: translateY(-2px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: #2d3748;
            border-radius: 12px;
            border: 2px dashed #4b5563;
        }

        .empty-state i {
            font-size: 64px;
            color: #6b7280;
            margin-bottom: 20px;
        }

        .empty-state h5 {
            color: #9ca3af;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #6b7280;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .tool-bar {
                flex-direction: column;
            }

            .search-box {
                max-width: 100%;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')

    <div class="wrap">

        <!--  Header -->
        <div class="page-head">
            <div>
                <h3 class="page-title">Enrolled Courses</h3>
                <p class="page-sub">Explore all enrolled courses & track your progress.</p>
            </div>

            <!-- Toolbar -->
            <div class="tool-bar">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" id="searchCourses" placeholder="Search courses..." />
                </div>

                <div class="filter-select">
                    <select id="filterStatus">
                        <option value="">All</option>
                        <option value="2">Upcoming</option>
                        <option value="1">Running</option>
                        <option value="3">Completed</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Courses Grid -->
        <div class="courses-grid" id="coursesGrid">
            @forelse ($batches as $batch)
                <div class="course-card" 
                     data-status="{{ $batch->status }}"
                     data-name="{{ strtolower($batch->course->title) }}">

                    <div class="course-top">
                        <div>
                            <h5 class="course-name">
                                {{ $batch->course->title }}
                            </h5>

                            <div class="course-meta">
                                <i class="bi bi-calendar2-week me-1"></i>
                                Started: {{ \Carbon\Carbon::parse($batch->start_date)->format('d-m-Y') }}
                            </div>
                        </div>

                        @php
                            $statusText = match($batch->status) {
                                1 => 'RUNNING',
                                2 => 'UPCOMING',
                                3 => 'COMPLETED',
                                default => 'UNKNOWN'
                            };
                            
                            $statusClass = match($batch->status) {
                                1 => 'running',
                                2 => 'upcoming',
                                3 => 'completed',
                                default => 'unknown'
                            };
                        @endphp

                        <span class="badge-status {{ $statusClass }}">
                            {{ $statusText }}
                        </span>
                    </div>

                    <div class="divider"></div>

                    <div class="course-actions">
                    @if($batch->status != 2)
                        {{-- Show button for Running (1) and Completed (3) batches --}}
                        <a href="{{ route('student.materials.show', $batch->id) }}" class="btn btn-soft">
                            <i class="bi bi-eye-fill"></i>View Course Materials
                        </a>
                    @else
                        {{-- Show message for Upcoming (2) batches --}}
                        <div class="upcoming-message">
                            <i class="bi bi-clock-history"></i>
                            <span>Starts on {{ \Carbon\Carbon::parse($batch->start_date)->format('d M Y') }}</span>
                        </div>
                    @endif
                </div>

                </div>
            @empty
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h5>No Enrolled Courses</h5>
                    <p>You haven't enrolled in any courses yet.</p>
                </div>
            @endforelse
        </div>

    </div>

@endsection

@push('scripts')
<script>
    // Search functionality
    document.getElementById('searchCourses').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        filterCourses();
    });

    // Filter functionality
    document.getElementById('filterStatus').addEventListener('change', function() {
        filterCourses();
    });

    function filterCourses() {
        const searchTerm = document.getElementById('searchCourses').value.toLowerCase();
        const statusFilter = document.getElementById('filterStatus').value;
        const cards = document.querySelectorAll('.course-card');

        cards.forEach(card => {
            const courseName = card.dataset.name;
            const courseStatus = card.dataset.status;

            const matchesSearch = courseName.includes(searchTerm);
            const matchesStatus = !statusFilter || courseStatus === statusFilter;

            if (matchesSearch && matchesStatus) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endpush