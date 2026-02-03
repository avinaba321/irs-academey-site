@extends('Student.layouts.app')
@section('title', 'My Metiral | IrsDesign Academy')
@push('styles')
<link rel="stylesheet" href="{{ asset('student/css/courseMaterial.css') }}">
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
                        <input type="text" placeholder="Search courses..." />
                    </div>

                    <div class="filter-select">
                        <select>
                            <option>All</option>
                            <option>Active</option>
                            <option>Completed</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="row g-3">

                <!-- Course 1 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">Full React JS Course & Training</h5>
                                <div class="course-meta"><i class="bi bi-calendar2-week me-1"></i> Started: 10-12-2024
                                </div>
                            </div>
                            <span class="badge-status active">ACTIVE</span>
                        </div>

                        <div class="divider"></div>

                        <p class="progress-title">Progress</p>
                        <div class="progress">
                            <div class="progress-bar" style="width: 68%;">68%</div>
                        </div>

                        <div class="course-actions">
                            <a href="" class="btn btn-soft">
                                <i class="bi bi-eye-fill"></i> View Details
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">Advance JavaScript & TypeScript</h5>
                                <div class="course-meta"><i class="bi bi-calendar2-week me-1"></i> Started: 15-01-2025
                                </div>
                            </div>
                            <span class="badge-status active">ACTIVE</span>
                        </div>

                        <div class="divider"></div>

                        <p class="progress-title">Progress</p>
                        <div class="progress">
                            <div class="progress-bar" style="width: 42%;">42%</div>
                        </div>

                        <div class="course-actions">
                            <a href="" class="btn btn-soft">
                                <i class="bi bi-eye-fill"></i> View Details
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">HTML CSS Bootstrap Masterclass</h5>
                                <div class="course-meta"><i class="bi bi-calendar2-week me-1"></i> Completed: 07-10-2024
                                </div>
                            </div>
                            <span class="badge-status completed">COMPLETED</span>
                        </div>

                        <div class="divider"></div>

                        <p class="progress-title">Progress</p>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%;">100%</div>
                        </div>

                        <div class="course-actions">
                            <a href="./../certificate.html" class="btn btn-soft">
                                <i class="bi bi-award-fill"></i> Certificate
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection