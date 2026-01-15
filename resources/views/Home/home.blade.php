@extends('layout.app')

@section('title', 'Home | IrsDesign Academy')

@section('content')

{{-- HERO SECTION --}}
{{-- <section class="hero-wrapper">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <span class="badge bg-light text-primary">PREMIUM ONLINE COURSES</span>
                <h1 class="fw-bold mt-4">Upgrade your skills and knowledge.</h1>
                <p class="text-secondary">
                    Unlock your potential with our 30-day free trial.
                </p>
            </div>

            <div class="col-lg-6">
                <img src="{{ asset('assets/img/banner1.png') }}" class="img-fluid" alt="Student">
            </div>

        </div>
    </div>
</section> --}}

    <!-- HERO SECTION -->
        <section class="hero-wrapper ">
            <div class="container">
                <div class="bg-circle"></div>

                <div class="row align-items-center">

                    <!-- Left Content -->
                    <div class="col-lg-6 col-md-12 left-content">
                        <span class="badge bg-light text-primary px-3 py-2">PREMIUM ONLINE COURSES</span>

                        <h1 class="fw-bold mt-4" style="font-size:65px; line-height:1.15;">
                            Upgrade Your <br> Skills & <br> Knowledge.
                        </h1>

                        <p class="text-secondary mt-3">
                            Unlock your potential with our 30-day free trial - sign up with your email today!
                        </p>

                        <div class="d-flex email-box bg-white p-2 rounded-pill shadow-lg mt-4"
                            style="max-width:450px; border: 10px solid whitesmoke;">
                            <input type="email" placeholder="Enter your email" class="form-control border-0 ps-3">
                            <button class="btn main-btn text-white px-4 rounded-pill" style="width: 250px;">
                                Get Discounts
                            </button>
                        </div>
                    </div>

                    <!-- Right Image ABSOLUTE -->
                    <div class="right-circle">
                        <div class="circle-image">
                            <!-- <img src="./img/technology-icon.png" alt=""> -->
                        </div>
                        <img src="{{ asset('assets/img/banner1.png') }}" alt="Student Image" class="hero-img">

                    </div>

                </div>
            </div>
        </section>

        <!-- course mention card -->
        <section class="learning-way py-5">
            <div class="container">
                <div class="row g-4">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="box text-center p-4 h-100">
                            <img src="{{ asset('assets/img/online-learning.png') }}" class="mb-3" alt="">
                            <h5>Online Courses</h5>
                            <p class="para">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, accusantium.
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="box text-center p-4 h-100">
                            <img src="{{ asset('assets/img/advisor.png') }}" class="mb-3" alt="">
                            <h5>Career Mentoring</h5>
                            <p class="para">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, accusantium.
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="box text-center p-4 h-100">
                            <img src="{{ asset('assets/img/video.png') }}" class="mb-3" alt="">
                            <h5>Live Webinar</h5>
                            <p class="para">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, accusantium.
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="box text-center p-4 h-100">
                            <img src="{{ asset('assets/img/certificate.png') }}" class="mb-3" alt="">
                            <h5>Certification</h5>
                            <p class="para">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, accusantium.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="featured-courses py-5">
            <div class="container">

                <div class="text-center mb-5">
                    <p class="text-uppercase fw-bold small tag-popular">Popular Courses</p>
                    <h2 class="fw-bold">Our Popular Courses</h2>
                </div>

                <div class="course-slider">
                    <div class="slider-track">

                        <!-- ORIGINAL CARDS -->
                        <div class="courses-card">
                            <img src="{{ asset('assets/img/courses/html.jpg') }}">
                            {{-- <span class="price">₹18000</span> --}}
                            <span class="price">
                                <span class="old-price">₹25,000</span>
                                <span class="new-price">₹18,000</span>
                            </span>

                            <div class="content">
                                <span class="tag yellow">HTML</span>
                                <h5>HTML Development</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, quae.</p>
                                <p>⭐ 4.5 | 📘 12 Lessons</p>
                               <a href="{{ route('contact') }}"><button class="view-btn">Enroll</button></a> 
                            </div>
                        </div>

                        <div class="courses-card">
                            <img src="{{ asset('assets/img/courses/laravel.jpg') }}">
                             <span class="price"> 
                                <span class="old-price">₹30,000</span>
                                <span class="new-price">₹25,000</span>
                            </span>
                               
                            <div class="content">
                                <span class="tag orange">Laravel</span>
                                <h5>Laravel Development</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, fugiat?</p>
                                <p>⭐ 4.7 | 📘 14 Lessons</p>
                                <a href="{{ route('contact') }}"><button class="view-btn">Enroll</button></a> 
                            </div>
                        </div>

                        <div class="courses-card">
                            <img src="{{ asset('assets/img/courses/seo.jpg') }}">
                             <span class="price"> 
                                    <span class="old-price">₹19,000</span>
                                <span class="new-price">₹16,000</span>
                             </span>
                             
                            <div class="content">
                                <span class="tag yellow">Marketing</span>
                                <h5>Digital Marketing</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti, qui!</p>
                                <p>⭐ 4.8 | 📘 14 Lessons</p>
                               <a href="{{ route('contact') }}"><button class="view-btn">Enroll</button></a> 
                            </div>
                        </div>

                        <div class="courses-card">
                            <img src="{{ asset('assets/img/courses/reactjs.jpg') }}">
                             <span class="price"> 
                                <span class="old-price">₹20,000</span>
                                <span class="new-price">₹18,000</span>
                             </span>
                            <div class="content">
                                <span class="tag orange">React</span>
                                <h5>React JS</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, odio.</p>
                                <p>⭐ 4.6 | 📘 12 Lessons</p>
                               <a href="{{ route('contact') }}"><button class="view-btn">Enroll</button></a> 
                            </div>
                        </div>

                        <!-- DUPLICATE CARDS (IMPORTANT) -->
                        <div class="courses-card">
                            <img src="{{ asset('assets/img/courses/html.jpg') }}">
                             <span class="price"> 
                                <span class="old-price">₹25,000</span>
                                <span class="new-price">₹22,000</span>
                            </span>
                            <div class="content">
                                <span class="tag yellow">HTML</span>
                                <h5>HTML Development</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, dolor?</p>
                                <p>⭐ 4.5 | 📘 12 Lessons</p>
                                <a href="{{ route('contact') }}"><button class="view-btn">Enroll</button></a> 
                            </div>
                        </div>

                        <div class="courses-card">
                            <img src="{{ asset('assets/img/courses/laravel.jpg') }}">
                              <span class="price"> 
                                <span class="old-price">₹27,000</span>
                                <span class="new-price">₹23,000</span>
                             </span>
                            <div class="content">
                                <span class="tag orange">Laravel</span>
                                <h5>Laravel Development</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, corrupti!</p>
                                <p>⭐ 4.7 | 📘 14 Lessons</p>
                               <a href="{{ route('contact') }}"><button class="view-btn">Enroll</button></a> 
                            </div>
                        </div>

                    </div>
                </div>

                <div class="text-center">
                    <a class="view-btn" href="{{ route('courses') }}">View All Course →</a>
                </div>
            </div>
        </section>

        <!-- start your Journey -->
        <section class="video-hero d-flex align-items-center justify-content-center">

            <!-- BACKGROUND VIDEO -->
            <video class="bg-video" autoplay muted loop playsinline>
                <source src="{{ asset('assets/img/it-video.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <div class="overlay"></div>

            <div class="content text-center text-white">
                <div class="play-btn d-flex justify-content-center align-items-center mb-4">
                    <div class="circle justify-content-center align-items-center d-flex" id="openVideo">
                        <i class="fa-solid fa-play"></i>
                    </div>
                </div>

                <h1 class="fw-bold display-5">
                    Start your learning <br> journey today
                </h1>

                <p class="mt-3 mb-4 px-3 px-md-0">
                    Ultrices quam mattis posuere porttitor tellus rhoncus tristique.
                </p>

                <a href="#" class="btn view-btn text-black">Discover more →</a>
            </div>
        </section>

        <!-- Video Modal -->
        <div class="video-modal" id="videoModal">
            <div class="video-box">
                <span class="close-btn" id="closeVideo">✕</span>

                <iframe id="youtubeFrame" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                </iframe>
            </div>
        </div>

        <!-- why choose us section -->

        <section class="why-choose">
            <div class="container">

                <!-- Image Section -->
                <div class="image-box">
                    <img src="{{ asset('assets/img/whychoose.jpg') }}" alt="Student">
                </div>

                <!-- Content Section -->
                <div class="content">
                    <span class="tag">WHY CHOOSE US</span>

                    <h2>
                        It's The Bright One, It's The Right One,<br>
                        That's Education.
                    </h2>

                    <p class="description">
                        Aliquam pellentesque quam aenean bibendum mollis per.
                        Duis non rhoncus vulputate maximus enim ornare.
                        Diam eu id rutrum lobortis netus neque integer venenatis.
                    </p>

                    <div class="features">
                        <div class="feature">
                            <div class="icon"><i class="fa-regular fa-message"></i></div>
                            <div>
                                <h4>Comprehensive Course</h4>
                                <p>Facilisis a habitant montes litora erat magnis</p>
                            </div>
                        </div>

                        <div class="feature">
                            <div class="icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                            <div>
                                <h4>Expert Instructors</h4>
                                <p>Facilisis a habitant montes litora erat magnis</p>
                            </div>
                        </div>

                        <div class="feature">
                            <div class="icon"><i class="fa-regular fa-calendar"></i></div>
                            <div>
                                <h4>Flexible Learning</h4>
                                <p>Facilisis a habitant montes litora erat magnis</p>
                            </div>
                        </div>

                        <div class="feature">
                            <div class="icon"><i class="fa-solid fa-trophy"></i></div>
                            <div>
                                <h4>Valid Certifications</h4>
                                <p>Facilisis a habitant montes litora erat magnis</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-- Most Frequency question  -->

        <section class="faq-section">
            <div class="container">

                <div class="text-center mb-5">
                    <span class="tag">COMMON QUESTIONS</span>
                    <h2 class="faq-title">Most Popular Questions</h2>
                </div>

                <div class="row g-4">

                    <!-- LEFT COLUMN -->
                    <div class="col-lg-6">
                        <div class="accordion custom-accordion" id="faqLeft">

                            <div class="accordion-item active">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#l1">
                                        Non nisi vehicula nibh efficitur porttitor?
                                    </button>
                                </h2>
                                <div id="l1" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        Quam tellus morbi at aptent mauris parturient velit arcu. Purus nostra hendrerit
                                        habitasse cursus ac class magna parturient placerat.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#l2">
                                        Proin consectetur sapien lacinia ullamcorper dictum consequat?
                                    </button>
                                </h2>
                                <div id="l2" class="accordion-collapse collapse">
                                    <div class="accordion-body">Answer content here</div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#l3">
                                        Primis dictum sapien curae quisque leo gravida?
                                    </button>
                                </h2>
                                <div id="l3" class="accordion-collapse collapse">
                                    <div class="accordion-body">Answer content here</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="col-lg-6">
                        <div class="accordion custom-accordion" id="faqRight">

                            <div class="accordion-item active">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#r1">
                                        Non nisi vehicula nibh efficitur porttitor?
                                    </button>
                                </h2>
                                <div id="r1" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        Quam tellus morbi at aptent mauris parturient velit arcu. Purus nostra hendrerit
                                        habitasse cursus ac class magna parturient placerat.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#r2">
                                        Proin consectetur sapien lacinia ullamcorper dictum consequat?
                                    </button>
                                </h2>
                                <div id="r2" class="accordion-collapse collapse">
                                    <div class="accordion-body">Answer content here</div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#r3">
                                        Primis dictum sapien curae quisque leo gravida?
                                    </button>
                                </h2>
                                <div id="r3" class="accordion-collapse collapse">
                                    <div class="accordion-body">Answer content here</div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- featured training  -->

        <section class="featured-training py-5">
            <div class="container">
                <div class="row align-items-center g-4">

                    <!-- LEFT CONTENT -->
                    <div class="col-lg-4">
                        <h2 class="section-title">Our Featured <br> Training</h2>
                        <p class="section-text">
                            We are a top-tier software training centre in Kolkata that provides top-notch training
                            courses to our applicants.
                            We give them the essential training and skills necessary to access advanced job roles and
                            prepare them for promising prospects.
                        </p>
                    </div>

                    <!-- RIGHT CARDS -->
                    <div class="col-lg-8">
                        <div class="row g-4">

                            <!-- CARD 1 -->
                            <div class="col-md-4">
                                <div class="training-card blue">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-briefcase"></i>
                                    </div>
                                    <h5>Job-Oriented Courses</h5>
                                    <p>
                                        Designed to equip you with the specific skills and knowledge employers require
                                        in high-demand IT roles.
                                    </p>
                                    <span class="admission">Admission Going On</span>
                                    <a class="arrow" href="{{ route('courses') }}">
                                        <i class="ri-arrow-right-up-long-line"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- CARD 2 -->
                            <div class="col-md-4">
                                <div class="training-card teal">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-user-graduate"></i>
                                    </div>
                                    <h5>Professional Courses</h5>
                                    <p>
                                        Enhance your existing IT skills and advance your career with expert-level
                                        upskilling programs.
                                    </p>
                                    <span class="admission">Admission Going On</span>
                                    <a class="arrow" href="{{ route('courses') }}">
                                        <i class="ri-arrow-right-up-long-line"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- CARD 3 -->
                            <div class="col-md-4">
                                <div class="training-card pink">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <h5>Pre-Placement Courses</h5>
                                    <p>
                                        Prepare confidently for interviews and develop essential soft & technical skills
                                        for placements.
                                    </p>
                                    <span class="admission">Admission Going On</span>
                                    <a class="arrow" href="{{ route('courses') }}">
                                        <i class="ri-arrow-right-up-long-line"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- call to action -->


        <section class="support-banner">
            <div class="banner-container">

                <!-- Content -->
                <div class="banner-content">
                    <h1>
                        Our friendly support<br>
                        team is here to help.
                    </h1>

                    <p class="para">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Ut elit tellus, luctus nec ullamcorper mattis,
                        pulvinar dapibus leo.
                    </p>

                    <a href="{{ route('contact') }}" class="view-btn">Contact us</a>
                </div>

                <!-- Image -->


            </div>

            <div class="banner-image">
                <img src="{{ asset('assets/img/student.png') }}" alt="Student Support">
            </div>
        </section>

@endsection
