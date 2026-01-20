@extends('Admin.layouts.app')

@section('content')

        <div class="container-fluid px-3 px-md-4 mt-4">
            <div class="row g-3">

                <!-- Total Students -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="stat-card shadow-lg">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="stat-title">Total Students</div>
                                <div class="stat-value">1,247</div>
                                <div class="stat-change up">
                                    <i class="bi bi-arrow-up"></i> +12%
                                    <span class="text-muted">vs last month</span>
                                </div>
                            </div>
                            <div class="stat-icon icon-blue">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Courses -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="stat-card shadow-lg">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="stat-title">Active Courses</div>
                                <div class="stat-value">24</div>
                                <div class="stat-change up">
                                    <i class="bi bi-arrow-up"></i> +3
                                    <span class="text-muted">vs last month</span>
                                </div>
                            </div>
                            <div class="stat-icon icon-green">
                                <i class="bi bi-book"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Running Batches -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="stat-card shadow-lg">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="stat-title">Running Batches</div>
                                <div class="stat-value">18</div>
                                <div class="stat-change up">
                                    <i class="bi bi-arrow-up"></i> +2
                                    <span class="text-muted">vs last month</span>
                                </div>
                            </div>
                            <div class="stat-icon icon-teal">
                                <i class="bi bi-layers"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="stat-card shadow-lg">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="stat-title">Revenue (Month)</div>
                                <div class="stat-value">₹4,52,000</div>
                                <div class="stat-change down">
                                    <i class="bi bi-arrow-down"></i> -5%
                                    <span class="text-muted">vs last month</span>
                                </div>
                            </div>
                            <div class="stat-icon icon-orange">
                                <i class="bi bi-currency-rupee"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <!-- enrollment trend and popular course -->

        <section>
            <div class="container-fluid px-3 px-md-4 mt-4">
                <div class="row g-4">

                    <!-- Enrollment Trend -->
                    <div class="col-12 col-lg-6">
                        <div class="chart-card shadow-lg">
                            <div class="card-header-custom">
                                <h6>Enrollment Trend</h6>

                            </div>

                            <div class="line-chart">
                                <svg viewBox="0 0 600 250" preserveAspectRatio="none">
                                    <defs>
                                        <linearGradient id="gradient" x1="0" y1="0" x2="0" y2="1">
                                            <stop offset="0%" stop-color="#6366f1" stop-opacity="0.35" />
                                            <stop offset="100%" stop-color="#6366f1" stop-opacity="0" />
                                        </linearGradient>
                                    </defs>

                                    <!-- Area -->
                                    <path class="area"
                                        d="M0,180 L100,150 L200,100 L300,140 L400,80 L500,20 L600,40 L600,250 L0,250 Z" />

                                    <!-- Line -->
                                    <path class="line" d="M0,180 L100,150 L200,100 L300,140 L400,80 L500,20 L600,40" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Courses -->
                    <div class="col-12 col-lg-6">
                        <div class="chart-card shadow-lg">
                            <div class="card-header-custom">
                                <h6>Popular Courses</h6>
                            </div>

                            <div class="bar-row">
                                <div class="bar-label" style="width:80px;">React</div>
                                <div class="bar w-100"></div>
                            </div>

                            <div class="bar-row">
                                <div class="bar-label" style="width:80px;">Python</div>
                                <div class="bar" style="width:85%;"></div>
                            </div>

                            <div class="bar-row">
                                <div class="bar-label" style="width:80px;">Java</div>
                                <div class="bar" style="width:65%;"></div>
                            </div>

                            <div class="bar-row">
                                <div class="bar-label" style="width:80px;">Node.js</div>
                                <div class="bar" style="width:55%;"></div>
                            </div>

                            <div class="bar-row">
                                <div class="bar-label" style="width:80px;">AWS</div>
                                <div class="bar" style="width:45%;"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- recent enrollment and upcoming batches -->

        <section>
            <div class="container-fluid px-3 px-md-4 mt-4">
                <div class="row g-4">

                    <!-- Recent Enrollments -->
                    <div class="col-12 col-lg-7">
                        <div class="dashboard-card shadow-lg">
                            <div class="card-head">
                                <h6>Recent Enrollments</h6>
                            </div>

                            <div class="enroll-item">
                                <div class="user-info">
                                    <div class="avatar">RK</div>
                                    <div>
                                        <div class="user-name">Rahul Kumar</div>
                                        <div class="user-course">Full Stack Development</div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="status active">Active</span>
                                    <div class="time">Today</div>
                                </div>
                            </div>

                            <div class="enroll-item">
                                <div class="user-info">
                                    <div class="avatar">PS</div>
                                    <div>
                                        <div class="user-name">Priya Sharma</div>
                                        <div class="user-course">Python Programming</div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="status active">Active</span>
                                    <div class="time">Today</div>
                                </div>
                            </div>

                            <div class="enroll-item">
                                <div class="user-info">
                                    <div class="avatar">AS</div>
                                    <div>
                                        <div class="user-name">Amit Singh</div>
                                        <div class="user-course">React.js Mastery</div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="status pending">Pending</span>
                                    <div class="time">Yesterday</div>
                                </div>
                            </div>

                            <div class="enroll-item">
                                <div class="user-info">
                                    <div class="avatar">SP</div>
                                    <div>
                                        <div class="user-name">Sneha Patel</div>
                                        <div class="user-course">AWS Cloud</div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="status active">Active</span>
                                    <div class="time">Yesterday</div>
                                </div>
                            </div>

                            <div class="enroll-item">
                                <div class="user-info">
                                    <div class="avatar">VR</div>
                                    <div>
                                        <div class="user-name">Vikram Reddy</div>
                                        <div class="user-course">Java Development</div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="status active">Active</span>
                                    <div class="time">2 days ago</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Batches -->
                    <div class="col-12 col-lg-5">
                        <div class="dashboard-card shadow-lg">
                            <div class="card-head">
                                <h6>Upcoming Batches</h6>
                                <a href="./batches/batches-list.html" class="view-all">View All →</a>
                            </div>

                            <div class="p-3">
                                <div class="batch-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="batch-title">React Advanced</div>
                                            <div class="batch-meta">
                                                <i class="bi bi-calendar"></i> Dec 25, 2024
                                            </div>
                                        </div>
                                        <span class="seats">5/20 seats</span>
                                    </div>
                                </div>

                                <div class="batch-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="batch-title">Python ML</div>
                                            <div class="batch-meta">
                                                <i class="bi bi-calendar"></i> Dec 28, 2024
                                            </div>
                                        </div>
                                        <span class="seats">12/15 seats</span>
                                    </div>
                                </div>

                                <div class="batch-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="batch-title">AWS Architect</div>
                                            <div class="batch-meta">
                                                <i class="bi bi-calendar"></i> Jan 2, 2025
                                            </div>
                                        </div>
                                        <span class="seats">8/20 seats</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

@endsection
