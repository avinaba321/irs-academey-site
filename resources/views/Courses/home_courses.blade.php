@extends('layout.app')

@section('title', 'Courses | IrsDesign Academy')
<!-- Bootstrap 5 -->
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- swiper css link -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

<link rel="stylesheet" href="{{ asset('assets/css/courses.css') }}">
<style>
    .course-card img {
    height: 200px;
    object-fit: cover;
    width: 100%;
}
</style>
@section('content')

    <!-- about us breadcum -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center about-content">
                    <h2>Our Courses</h2>
                    <p>
                        Enroll our Courses and start your Career<br class="d-none d-md-block">
                        and Get your Dream Job
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- all courses here -->

    <section class="all-courses">
        <div class="container py-5">

            <!-- Header -->
            <div
                class="filterarea d-flex flex-wrap justify-content-lg-center justify-content-xl-between justify-content-sm-center align-items-center gap-3 mb-4">
                <h2 class="section-title text-lg-start text-sm-center  text-md-center">Featured Courses</h2>

                <div class="d-flex gap-2 justify-content-lg-between justify-content-sm-center justify-content-md-center ">

                    <!-- Search -->
                    <div class="input-group border border-warning rounded" id="searchinput">
                        <input type="text" class="form-control" placeholder="Search course" id="courseSearch">
                        <span class="input-group-text bg-white text-warning">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>

                    <!-- Price Filter -->
                    <select class="form-select border-warning" id="priceFilter">
                        <option value="all">All Prices</option>
                        <option value="low">Below $500</option>
                        <option value="mid">$500 - $700</option>
                        <option value="high">Above $700</option>
                    </select>

                    <!-- Duration Filter -->
                    <select class="form-select border-warning" id="durationFilter">
                        <option value="all">All Duration</option>
                        <option value="short">0 - 3 Months</option>
                        <option value="medium">3 - 6 Months</option>
                        <option value="long">6+ Months</option>
                    </select>

                </div>
            </div>


            <!-- Courses -->
            {{-- <div class="row col-12 g-4 mt-4 coursecard-area justify-content-center"> 
                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6 course-item mx-auto" data-price="799" data-duration="6">
                    <div class="course-card p-2"> <img src="{{ asset('assets/img/courses/course1.jpg') }}" class="img-fluid rounded">
                        <div class="p-4"> <span class="badge bg-primary">Finance</span>
                            <h5 class="course-title mt-2">Financial Accounting</h5>
                            <p class="text-muted">6 months</p> <span class="fw-bold">$799</span>
                        </div> <button class="enroll view-btn">Enroll<i class="fa-solid fa-angles-right"></i></button>
                    </div>
                </div> 
                
            </div> --}}

            <div class="row col-12 g-4 mt-4 coursecard-area justify-content-center">

                @forelse ($courses as $course)
                    <div class="col-lg-4 col-md-6 course-item mx-auto">
                        <div class="course-card p-2 h-100 d-flex flex-column">

                            <img src="{{ asset('storage/' . $course->course_image) }}" class="img-fluid rounded"
                                alt="{{ $course->title }}">

                            <div class="p-4 d-flex flex-column flex-grow-1">

                                <span class="badge bg-primary mb-2">Course</span>

                                <h5 class="course-title mt-2">
                                    {{ $course->title }}
                                </h5>

                                <p class="text-muted mb-2">
                                    {{ $course->description }}
                                </p>

                                <p class="text-muted small mb-2">
                                    Duration:{{ $course->duration }}
                                </p>

                                <div class="mb-3">
                                    @if ($course->discount_price)
                                        <span class="fw-bold fs-5">₹{{ number_format($course->discount_price) }}</span><br>
                                        <span class="text-muted text-decoration-line-through">
                                            ₹{{ number_format($course->price) }}
                                        </span>
                                    @else
                                        <span class="fw-bold fs-5">₹{{ number_format($course->price) }}</span>
                                    @endif
                                </div>

                                <!-- BUTTON STICKS TO BOTTOM -->
                                <button class="enroll view-btn mt-auto"  data-bs-toggle="modal"
                    data-bs-target="#loginPopup">
                                    Enroll <i class="fa-solid fa-angles-right"></i>
                                </button>

                            </div>
                        </div>

                    </div>

                @empty
                    <div class="text-center text-muted mt-5">
                        <h5>No courses available right now</h5>
                    </div>
                @endforelse

            </div>


        </div>
    </section>


    <!-- our Testimonial section -->

    <section class="testimonial-section py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Carousel -->
                <div class="col-lg-7">
                    <div id="testimonialCarousel" class="carousel slide carousel" data-bs-ride="carousel"
                        data-bs-interval="2500" data-bs-pause="hover">

                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="testimonial-card">
                                    <p>“The training at IRS Design Pvt Ltd helped me build real-world skills. The
                                        mentors explained everything clearly and supported me throughout the course.”
                                    </p>
                                    <h6>— Amit Kumar,</h6>
                                    <small>Web Development Student</small>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testimonial-card">
                                    <p>“I gained hands-on experience with live projects. This institute boosted my
                                        confidence and prepared me for industry requirements.”</p>
                                    <h6>— Priyanka Das,</h6>
                                    <small>Digital Marketing Student</small>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testimonial-card">
                                    <p>“Excellent learning environment with practical guidance. The placement support
                                        and career advice were very helpful.”</p>
                                    <h6>— Rahul Mondal,</h6>
                                    <small>UI/UX Design Student</small>
                                </div>
                            </div>

                        </div>

                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0"
                                class="active"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"></button>
                        </div>

                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-5 mt-4 mt-lg-0">
                    <h2 class="fw-bold">What Our Students Say</h2>
                    <p class="mt-3">
                        Trusted by businesses for design, development, and digital marketing excellence.
                    </p>
                    <button class="btn view-btn text-black">View More</button>
                </div>

            </div>
        </div>
    </section>

    <script>
        const searchInput = document.getElementById("courseSearch");
        const priceFilter = document.getElementById("priceFilter");
        const durationFilter = document.getElementById("durationFilter");
        const courses = document.querySelectorAll(".course-item");

        function filterCourses() {
            const searchValue = searchInput.value.toLowerCase();
            const priceValue = priceFilter.value;
            const durationValue = durationFilter.value;

            courses.forEach(course => {
                const title = course.querySelector(".course-title").innerText.toLowerCase();
                const price = parseInt(course.dataset.price);
                const duration = parseInt(course.dataset.duration);

                let priceMatch =
                    priceValue === "all" ||
                    (priceValue === "low" && price < 500) ||
                    (priceValue === "mid" && price >= 500 && price <= 700) ||
                    (priceValue === "high" && price > 700);

                let durationMatch =
                    durationValue === "all" ||
                    (durationValue === "short" && duration <= 3) ||
                    (durationValue === "medium" && duration > 3 && duration <= 6) ||
                    (durationValue === "long" && duration > 6);

                let searchMatch = title.includes(searchValue);

                course.style.display = (searchMatch && priceMatch && durationMatch) ? "block" : "none";
            });
        }

        searchInput.addEventListener("keyup", filterCourses);
        priceFilter.addEventListener("change", filterCourses);
        durationFilter.addEventListener("change", filterCourses);
    </script>

@endsection
