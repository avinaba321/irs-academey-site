@extends('layout.app')

@section('title', 'Blog | IrsDesign Academy')
 <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">

@section('content')


    <!-- about us breadcum -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center about-content">
                    <h2>Our Blogs</h2>
                    <p>
                        Join our community of learners and start your<br class="d-none d-md-block">
                        journey towards success.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- our blog area -->

    <section class="knowledge-hub py-5">
        <div class="container">

            <!-- Heading -->
            <div class="text-center mb-5">
                <h2 class="fw-bold">Technology Knowledge</h2>
                <p class="text-muted">
                    Read our blogs to get information and updates on the newest trends in IT, software, and digital
                    marketing.
                </p>
            </div>

            <div class="row g-4 mb-5">

                <!-- Featured Article -->
                <div class="col-lg-12">
                    <div class="featured-card">
                        <img src="{{ asset('assets/img/blog.png') }}" alt="Featured" class="img-fluid"
                            style="height: 100%; width: 100%;">
                    </div>

                    <h5 class="featured-title mt-3">
                        5 Future Proof Courses for Non-IT Students
                    </h5>
                    <span class="post-date">7th Mar 2025</span>
                </div>

            </div>

            <!-- Blog Grid -->
            <div class="row g-4">
                <h4 class="section-title mb-3">Popular Article</h4>
                <!-- Card -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('assets/img/blog/programing.jpg') }}" alt="">
                        <div class="blog-body">
                            <span class="blog-category">React Native</span>
                            <h6>Want a High-Paying IT Job? Start with a React Native Course in 2025</h6>
                            <small>18th Jul 2025</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('assets/img/blog/career-guidence.jpg') }}" alt="">
                        <div class="blog-body">
                            <span class="blog-category">Career Guides</span>
                            <h6>14 Best Software Courses to Learn in 2025</h6>
                            <small>13th Jul 2025</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('assets/img/blog/digital-marketing.jpg') }}" alt="">
                        <div class="blog-body">
                            <span class="blog-category">Digital Marketing</span>
                            <h6>How does the YouTube Algorithm Work?</h6>
                            <small>26th Jun 2025</small>
                        </div>
                    </div>
                </div>

                <!-- Duplicate cards as needed -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('assets/img/blog/development.jpg') }}" alt="">
                        <div class="blog-body">
                            <span class="blog-category">Web Development</span>
                            <h6>Learning AngularJS Course in 2025: Is It Still Worth It?</h6>
                            <small>4th Dec 2025</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('assets/img/blog/social-marketing.jpg') }}" alt="">
                        <div class="blog-body">
                            <span class="blog-category">IT Courses</span>
                            <h6>IT Courses for Freshers: Top Picks to Kickstart a High-Growth Career</h6>
                            <small>1st Dec 2025</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('assets/img/blog/datascience.jpg') }}" alt="">
                        <div class="blog-body">
                            <span class="blog-category">Data Science</span>
                            <h6>How AI and Data Science Are Powering the Job Market in 2026</h6>
                            <small>17th Nov 2025</small>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button class="view-btn text-center">view More <i class="fa-solid fa-angles-right"></i></button>
                </div>

            </div>

        </div>
    </section>




@endsection