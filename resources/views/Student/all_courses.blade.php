@extends('Student.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/allCourses.css') }}">
    <style>
        .price {
            font-size: 1.1rem;
            line-height: 1.3;
        }
    </style>
@endpush

@section('content')

    {{-- <div class="wrap">

            <!-- Header -->
            <div class="page-title">
                <h3>All Courses</h3>
            </div>

            <!-- All Courses Cards -->
            <div class="row g-3">

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">Full React JS Course & Training</h5>
                                <div class="course-meta"><i class="bi bi-stars me-1"></i> Premium Course • Mentorship
                                </div>
                            </div>
                            <div class="price">₹45,000</div>
                        </div>
                        <div class="divider"></div>
                        <p class="course-desc">Premium React journey with hooks, projects, live classes and mentoring.
                        </p>
                        <div class="course-actions">
                            <a href="#" class="btn-soft text-center text-decoration-none"><i
                                    class="bi bi-eye-fill"></i> Details</a>
                            <button class="btn-primary-premium purchaseBtn"
                                data-course="Full React JS Course & Training" data-price="45000"><i
                                    class="bi bi-bag-plus-fill"></i>
                                Purchase</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">Advance JavaScript & TypeScript</h5>
                                <div class="course-meta"><i class="bi bi-stars me-1"></i> Premium Course • Mentorship
                                </div>
                            </div>
                            <div class="price">₹12,000</div>
                        </div>
                        <div class="divider"></div>
                        <p class="course-desc">Deep JS concepts + TS, interview prep, modern development patterns.</p>
                        <div class="course-actions">
                            <a href="#" class="btn-soft text-center text-decoration-none"><i
                                    class="bi bi-eye-fill"></i> Details</a>
                            <button class="btn-primary-premium purchaseBtn"
                                data-course="Advance JavaScript & TypeScript" data-price="₹12,000"><i
                                    class="bi bi-bag-plus-fill"></i>
                                Purchase</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">HTML CSS Bootstrap Masterclass</h5>
                                <div class="course-meta"><i class="bi bi-stars me-1"></i> Premium Course • Mentorship
                                </div>
                            </div>
                            <div class="price">₹9,000</div>
                        </div>
                        <div class="divider"></div>
                        <p class="course-desc">Build responsive premium websites with real dashboard components.</p>
                        <div class="course-actions">
                            <a href="#" class="btn-soft text-center text-decoration-none"><i
                                    class="bi bi-eye-fill"></i> Details</a>
                            <button class="btn-primary-premium purchaseBtn" data-course="HTML CSS Bootstrap Masterclass"
                                data-price="₹9,000"><i class="bi bi-bag-plus-fill"></i>
                                Purchase</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Load More Button -->
            <div class="top-actions my-4 text-center">
                <button class="btn-addmore">
                    <i class="bi bi-arrow-clockwise"></i> Load More Courses
                </button>
            </div>

    </div> --}}

    <div class="wrap">

        <!-- Header -->
        <div class="page-title">
            <h3>All Courses</h3>
        </div>

        <!-- All Courses Cards -->
        <div class="row g-3">

            @forelse($courses as $course)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <img src="{{ $course->course_image
                            ? asset('storage/' . $course->course_image)
                            : asset('assets/img/courses/default-course.jpg') }}"
                            class="img-fluid rounded" style="height:200px; width:100%; object-fit:cover;"
                            alt="{{ $course->title }}">

                        <div class="course-top mt-3">
                            <div>
                                <h5 class="course-name">
                                    {{ $course->title }}
                                </h5>

                                <div class="course-meta">
                                    <i class="bi bi-stars me-1"></i>
                                    Premium Course • Mentorship
                                </div>
                            </div>

                            <div class="price">
                                @if ($course->discount_price && $course->discount_price < $course->price)
                                    <span class="fw-bold text-success">
                                        ₹{{ number_format($course->discount_price) }}
                                    </span>
                                    <br>
                                    <span class="text-muted text-decoration-line-through small">
                                        ₹{{ number_format($course->price) }}
                                    </span>
                                @else
                                    <span class="fw-bold">
                                        ₹{{ number_format($course->price) }}
                                    </span>
                                @endif
                                @if ($course->discount_price)
                                    <span class="badge bg-danger ms-2">
                                        {{ round((1 - $course->discount_price / $course->price) * 100) }}% OFF
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="divider"></div>

                        <p class="course-desc">
                            {{ $course->description }}
                        </p>

                        <div class="course-actions">
                            <a href="#" class="btn-soft text-center text-decoration-none">
                                <i class="bi bi-eye-fill"></i> Details
                            </a>

                            <button class="btn-primary-premium purchaseBtn" data-course="{{ $course->title }}"
                                data-price="{{ $course->discount_price ?? $course->price }}">
                                <i class="bi bi-bag-plus-fill"></i>
                                Purchase
                            </button>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <h5>No courses available right now</h5>
                </div>
            @endforelse

        </div>

        <!-- Load More Button (optional later) -->
        <div class="top-actions my-4 text-center">
            <button class="btn-addmore">
                <i class="bi bi-arrow-clockwise"></i> Load More Courses
            </button>
        </div>

    </div>


    <!-- STUDENT DETAILS MODAL -->
    <div class="payModal" id="payModal">
        <div class="payOverlay" id="payOverlay"></div>

        <div class="payBox">
            <div class="payTop">
                <h5><i class="bi bi-person-lines-fill me-2"></i> Student Details</h5>
                <button class="closeBtn" id="closePay">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div class="payContent">
                <div class="row g-3">

                    <!-- Left Form -->
                    <div class="col-md-7">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your name">

                        <div class="mt-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="email@example.com">
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone number">
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Full Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter your address">
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="courseName" readonly>
                        </div>
                    </div>

                    <!-- Right Summary -->
                    <div class="col-md-5">
                        <div class="summaryBox">
                            <div>
                                <h6 id="modalCourseName">Course Name</h6>
                                <div style="color:rgba(255,255,255,0.70);font-weight:700;font-size:13px">
                                    Premium Course • Mentorship
                                </div>
                            </div>
                            <div class="amount" id="modalCoursePrice">₹0</div>
                        </div>

                        <div class="mt-3" style="color:rgba(255,255,255,0.70);font-size:13px;line-height:1.7">
                            ✅ Student info saved<br>
                            ✅ Admin will contact soon<br>
                            ✅ Confirm course enrollment<br>
                            ✅ Premium mentorship
                        </div>

                        <div class="mt-4">
                            <button class="payBtn">
                                <i class="bi bi-check-circle-fill me-1"></i> Submit Details
                            </button>
                        </div>

                        <div class="mt-2 text-center" style="color:rgba(255,255,255,0.55);font-size:12px">
                            This is just details collection. Payment will be done later.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        const payModal = document.getElementById("payModal");
        const payOverlay = document.getElementById("payOverlay");
        const closePay = document.getElementById("closePay");

        const modalCourseName = document.getElementById("modalCourseName");
        const modalCoursePrice = document.getElementById("modalCoursePrice");

        //  open modal
        document.querySelectorAll(".purchaseBtn").forEach(btn => {
            btn.addEventListener("click", () => {
                payModal.classList.add("show");

                modalCourseName.innerText = btn.dataset.course;
                modalCoursePrice.innerText = "₹" + Number(btn.dataset.price).toLocaleString("en-IN");
                document.getElementById("courseName").value = btn.dataset.course;

                //  auto fill from register localStorage
                const user = JSON.parse(localStorage.getItem("student_register") || "{}");
                document.getElementById("fullName").value = user.name || "";
                document.getElementById("email").value = user.email || "";
                document.getElementById("phone").value = user.phone || "";
                document.getElementById("address").value = user.address || "";
            });
        });

        function closeModal() {
            payModal.classList.remove("show");
        }

        closePay.addEventListener("click", closeModal);
        payOverlay.addEventListener("click", closeModal);

        // ESC close
        window.addEventListener("keydown", (e) => {
            if (e.key === "Escape") closeModal();
        });
    </script>
@endpush
