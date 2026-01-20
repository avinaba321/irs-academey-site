@extends('Admin.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/courses.css') }}">
@endpush
@section('content')

    <div class="container-fluid px-3 px-md-4 mt-4">

        <!-- HEADER -->
        <div
            class="d-flex flex-column flex-lg-row
            justify-content-between
            align-items-start align-items-lg-center
            gap-3 mb-3 page-head">

            <!-- LEFT : TITLE -->
            <div class="text-center text-lg-start w-100">
                <h5 class="mb-1">Courses</h5>
                <p class="mb-0 text-muted">Manage your course catalog</p>
            </div>

            <!-- RIGHT : BUTTON -->
            <div class="w-100 w-lg-auto">
                <button class="btn btn-primary w-100 w-lg-auto" style="min-width:200px" onclick="openAddCourse()">
                    <i class="bi bi-plus-lg me-1"></i> Add Course
                </button>
            </div>

        </div>


        <!-- SEARCH -->
        <input type="text" class="form-control mb-4 shadow-lg" placeholder="Search courses...">

        <!-- COURSE GRID -->
        <div class="row g-4">

            <!-- CARD 1 -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="course-card shadow-lg">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="course-icon"><i class="bi bi-globe"></i></div>
                        <div class="dropdown">
                            <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="./course-view.html" class="dropdown-item text-success">View</a></li>
                                <li><a class="dropdown-item" onclick="openEditCourse()">Edit</a></li>
                                <li><a class="dropdown-item text-danger">Delete</a></li>
                            </ul>
                        </div>
                    </div>

                    <h6 class="fw-semibold">Full Stack Development</h6>
                    <p class="course-meta">React, Node.js, MongoDB complete course</p>

                    <ul class="course-meta mb-3">
                        <li>6 Months</li>
                        <li>12 Modules</li>
                    </ul>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>₹50,000</strong><br>
                            <small class="text-muted">180 students</small>
                        </div>
                        <span class="status active">Active</span>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="course-card shadow-lg">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="course-icon"><i class="bi bi-code-slash"></i></div>
                        <div class="dropdown">
                            <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="./course-view.html" class="dropdown-item text-success">View</a></li>
                                <li><a class="dropdown-item" onclick="openEditCourse()">Edit</a></li>
                                <li><a class="dropdown-item text-danger">Delete</a></li>
                            </ul>
                        </div>
                    </div>

                    <h6 class="fw-semibold">Python Programming</h6>
                    <p class="course-meta">Core Python with projects</p>

                    <ul class="course-meta mb-3">
                        <li>3 Months</li>
                        <li>8 Modules</li>
                    </ul>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>₹30,000</strong><br>
                            <small class="text-muted">150 students</small>
                        </div>
                        <span class="status active">Active</span>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="course-card shadow-lg">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="course-icon"><i class="bi bi-bar-chart"></i></div>
                        <div class="dropdown">
                            <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="./course-view.html" class="dropdown-item text-success">View</a></li>
                                <li><a class="dropdown-item" onclick="openEditCourse()">Edit</a></li>
                                <li><a class="dropdown-item text-danger">Delete</a></li>
                            </ul>
                        </div>
                    </div>

                    <h6 class="fw-semibold">Data Science</h6>
                    <p class="course-meta">ML, AI & Data Analysis</p>

                    <ul class="course-meta mb-3">
                        <li>5 Months</li>
                        <li>12 Modules</li>
                    </ul>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>₹55,000</strong><br>
                            <small class="text-muted">90 students</small>
                        </div>
                        <span class="status draft">Draft</span>
                    </div>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="course-card shadow-lg">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="course-icon"><i class="bi bi-cloud"></i></div>
                        <div class="dropdown">
                            <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="./course-view.html" class="dropdown-item text-success">View</a></li>
                                <li><a class="dropdown-item" onclick="openEditCourse()">Edit</a></li>
                                <li><a class="dropdown-item text-danger">Delete</a></li>
                            </ul>
                        </div>
                    </div>

                    <h6 class="fw-semibold">AWS Cloud</h6>
                    <p class="course-meta">Cloud & DevOps fundamentals</p>

                    <ul class="course-meta mb-3">
                        <li>4 Months</li>
                        <li>10 Modules</li>
                    </ul>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>₹40,000</strong><br>
                            <small class="text-muted">110 students</small>
                        </div>
                        <span class="status active">Active</span>
                    </div>
                </div>
            </div>

            <!-- CARD 5 -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="course-card shadow-lg">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="course-icon"><i class="bi bi-phone"></i></div>
                        <div class="dropdown">
                            <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="./course-view.html" class="dropdown-item text-success">View</a></li>
                                <li><a class="dropdown-item" onclick="openEditCourse()">Edit</a></li>
                                <li><a class="dropdown-item text-danger">Delete</a></li>
                            </ul>
                        </div>
                    </div>

                    <h6 class="fw-semibold">Mobile App Development</h6>
                    <p class="course-meta">Flutter & React Native</p>

                    <ul class="course-meta mb-3">
                        <li>4 Months</li>
                        <li>9 Modules</li>
                    </ul>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>₹45,000</strong><br>
                            <small class="text-muted">70 students</small>
                        </div>
                        <span class="status active">Active</span>
                    </div>
                </div>
            </div>

            <!-- CARD 6 -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="course-card shadow-lg">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="course-icon"><i class="bi bi-palette"></i></div>
                        <div class="dropdown">
                            <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="./course-view.html" class="dropdown-item text-success">View</a></li>
                                <li onclick="openEditCourse()"><a class="dropdown-item">Edit</a></li>
                                <li><a class="dropdown-item text-danger">Delete</a></li>
                            </ul>
                        </div>
                    </div>

                    <h6 class="fw-semibold">UI / UX Design</h6>
                    <p class="course-meta">Figma, Design Systems</p>

                    <ul class="course-meta mb-3">
                        <li>2 Months</li>
                        <li>6 Modules</li>
                    </ul>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>₹25,000</strong><br>
                            <small class="text-muted">60 students</small>
                        </div>
                        <span class="status inactive">Inactive</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- ADD / EDIT COURSE MODAL -->
    <div class="modal fade" id="courseModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">
                    <h5 class="modal-title" id="courseModalTitle">Add Course</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <!-- BASIC INFO -->
                    <div class="mb-4">
                        <div class="modal-section-title">Basic Information</div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="cName"
                                    placeholder="Full Stack Development">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Short Description</label>
                                <input type="text" class="form-control" id="cDName"
                                    placeholder="React, Node, MongoDB">
                            </div>
                        </div>
                    </div>

                    <!-- COURSE DETAILS -->
                    <div class="mb-4">
                        <div class="modal-section-title">Course Details</div>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Duration</label>
                                <input type="text" class="form-control" id="cDuration" placeholder="6 Months">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Modules</label>
                                <input type="number" class="form-control" id="cModules" placeholder="12">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="cStatus">
                                    <option value="active">Active</option>
                                    <option value="draft">Draft</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- PRICING -->
                    <div>
                        <div class="modal-section-title">Pricing & Enrollment</div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Course Price (₹)</label>
                                <input type="number" class="form-control" id="cPrice" placeholder="50000">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Students Enrolled</label>
                                <input type="number" class="form-control" id="cNstudent" placeholder="180">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Save Course</button>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        const modal = new bootstrap.Modal(document.getElementById("courseModal"));

        function openAddCourse() {
            document.getElementById("courseModalTitle").innerText = "Add Course";
            document.querySelectorAll("#courseModal input").forEach(i => i.value = "");
            document.getElementById("cStatus").value = "active";
            modal.show();
        }

        function openEditCourse() {

            const clicked = event.target;
            const card = clicked.closest(".course-card");

            if (!card) return;

            document.getElementById("courseModalTitle").innerText = "Edit Course";

            document.getElementById("cName").value =
                card.querySelector("h6").innerText;

            document.getElementById("cDName").value =
                card.querySelector(".course-meta").innerText;

            document.getElementById("cDuration").value =
                card.querySelectorAll(".course-meta li")[0].innerText;

            document.getElementById("cModules").value =
                card.querySelectorAll(".course-meta li")[1].innerText.replace(" Modules", "");

            document.getElementById("cPrice").value =
                card.querySelector("strong").innerText.replace("₹", "");

            document.getElementById("cNstudent").value =
                card.querySelector("small").innerText.replace(" students", "");

            document.getElementById("cStatus").value =
                card.querySelector(".status").innerText.toLowerCase();

            modal.show();
        }
    </script>
@endpush
