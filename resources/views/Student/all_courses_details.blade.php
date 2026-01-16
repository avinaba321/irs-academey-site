
@extends('Student.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/allCoursesdetails.css') }}">
@endpush

@section('content')

 <!--  TOP BAR -->
        <div class="topbar">
            <a href="allCourses.html" class="back-btn">
                <i class="bi bi-arrow-left"></i> Back to Courses
            </a>

            <div class="badge-soft">
                <i class="bi bi-stars"></i> Premium Course • Mentorship
            </div>
        </div>

        <div class="page">

            <div class="glass-card">
                <!--  HERO -->
                <div class="hero">
                    <h1>Full React JS Course & Training</h1>
                    <p>
                        Premium React journey with hooks, projects, live classes and mentoring. Build real dashboards,
                        modern UI,
                        production-ready patterns and crack interviews with confidence.
                    </p>

                    <div class="meta-row">
                        <div class="meta-pill"><i class="bi bi-clock-fill"></i> 12 Weeks</div>
                        <div class="meta-pill"><i class="bi bi-person-check-fill"></i> Live Mentorship</div>
                        <div class="meta-pill"><i class="bi bi-award-fill"></i> Certificate</div>
                        <div class="meta-pill"><i class="bi bi-camera-video-fill"></i> 90+ Lectures</div>
                        <div class="meta-pill"><i class="bi bi-infinity"></i> Lifetime Access</div>
                    </div>
                </div>

                <!--  CONTENT -->
                <div class="content">
                    <div class="row g-3">
                        <!-- LEFT -->
                        <div class="col-lg-8">

                            <div class="section-title"><i class="bi bi-lightning-charge-fill"></i> What you'll learn
                            </div>
                            <ul class="learn-list">
                                <li><i class="bi bi-check-circle-fill"></i> React Fundamentals + Hooks (useState,
                                    useEffect)
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> React Router + Protected Routing</li>
                                <li><i class="bi bi-check-circle-fill"></i> API Integration (Axios) + Error Handling
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Authentication UI + Dashboard Layout</li>
                                <li><i class="bi bi-check-circle-fill"></i> Redux Toolkit / Context API Best Practice
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Modern UI (Glass / Premium Components)</li>
                            </ul>

                            <div class="divider"></div>

                            <div class="section-title"><i class="bi bi-journal-text"></i> Course Modules</div>

                            <div class="d-grid gap-3">
                                <div class="module">
                                    <div>
                                        <p class="m-title">Module 1: React Foundation & Setup</p>
                                        <p class="m-sub">JSX, components, props/state, project structure, dev workflow.
                                        </p>
                                    </div>
                                    <div class="m-right">
                                        <span class="chip">8 Lessons</span>
                                        <span class="chip gray"><i class="bi bi-clock"></i> 3h</span>
                                    </div>
                                </div>

                                <div class="module">
                                    <div>
                                        <p class="m-title">Module 2: Hooks & State Management</p>
                                        <p class="m-sub">useState/useEffect, lifting state, controlled forms,
                                            optimization.
                                        </p>
                                    </div>
                                    <div class="m-right">
                                        <span class="chip">12 Lessons</span>
                                        <span class="chip gray"><i class="bi bi-clock"></i> 5h</span>
                                    </div>
                                </div>

                                <div class="module">
                                    <div>
                                        <p class="m-title">Module 3: API + Auth + Dashboard</p>
                                        <p class="m-sub">Axios, JWT auth UI, private routes, dashboard sidebar/navbar.
                                        </p>
                                    </div>
                                    <div class="m-right">
                                        <span class="chip">15 Lessons</span>
                                        <span class="chip gray"><i class="bi bi-clock"></i> 7h</span>
                                    </div>
                                </div>

                                <div class="module">
                                    <div>
                                        <p class="m-title">Module 4: Projects + Interview Prep</p>
                                        <p class="m-sub">Real projects, best patterns, reusable components, mock
                                            interviews.
                                        </p>
                                    </div>
                                    <div class="m-right">
                                        <span class="chip">10 Lessons</span>
                                        <span class="chip gray"><i class="bi bi-clock"></i> 6h</span>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="section-title"><i class="bi bi-info-circle-fill"></i> Requirements</div>
                            <ul class="learn-list">
                                <li><i class="bi bi-check-circle-fill"></i> Basic HTML, CSS knowledge</li>
                                <li><i class="bi bi-check-circle-fill"></i> JavaScript fundamentals</li>
                                <li><i class="bi bi-check-circle-fill"></i> Laptop/PC with internet access</li>
                                <li><i class="bi bi-check-circle-fill"></i> No prior React knowledge required</li>
                            </ul>

                        </div>

                        <!-- RIGHT -->
                        <div class="col-lg-4">
                            <div class="purchase-box">
                                <div class="purchase-head">
                                    <h4>Full React JS<br />Course & Training</h4>
                                    <div class="price-badge">₹45,000</div>
                                </div>

                                <div class="purchase-body">
                                    <div class="mini">
                                        <i class="bi bi-stars"></i> Premium Course • Mentorship
                                    </div>
                                    Premium React journey with hooks, projects, live classes and mentoring.
                                </div>

                                <div class="purchase-actions">
                                    <button class="btn-buy">
                                        <i class="bi bi-bag-fill"></i> Purchase
                                    </button>
                                </div>
                            </div>

                            <div class="mt-3 glass-card p-3" style="border-radius: 22px;">
                                <div class="section-title mb-2"><i class="bi bi-shield-check"></i> This includes</div>

                                <div class="d-grid gap-2">
                                    <div class="meta-pill" style="justify-content: space-between; border-radius: 16px;">
                                        <span><i class="bi bi-infinity"></i> Lifetime access</span>
                                        <span class="fw-bold">Yes</span>
                                    </div>

                                    <div class="meta-pill" style="justify-content: space-between; border-radius: 16px;">
                                        <span><i class="bi bi-award-fill"></i> Certificate</span>
                                        <span class="fw-bold">Yes</span>
                                    </div>

                                    <div class="meta-pill" style="justify-content: space-between; border-radius: 16px;">
                                        <span><i class="bi bi-headset"></i> Support</span>
                                        <span class="fw-bold">24/7</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


@endsection


















