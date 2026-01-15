@extends('layout.app')

@section('title', 'About Us | IrsDesign Academy')
 <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@section('content')

 <!-- about us breadcum -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center about-content">
                    <h2>About us</h2>
                    <p>
                        Join our community of learners and start your<br class="d-none d-md-block">
                        journey towards success.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- about us the academy -->

    <section class="academy-section py-5">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- LEFT IMAGE COLLAGE -->
                <div class="col-lg-5">
                    <div class="image-collage">
                        <img src="{{ asset('assets/img/sdfbuilding.JPG') }}" class="main-img" alt="">

                        <div class="small-img">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                    </div>

                </div>

                <!-- RIGHT CONTENT -->
                <div class="col-lg-7">
                    <h2 class="fw-bold mb-3">
                        IRS Design Academy – <br>
                        Best IT & Design Training Institute
                    </h2>

                    <p>
                        IRS Design Academy Pvt. Ltd. is a leading professional IT and design training institute,
                        dedicated to delivering industry-focused, job-oriented education. With a strong presence
                        in skill development, we have trained and empowered thousands of students with practical,
                        real-world expertise aligned to current industry demands.
                    </p>


                    <p>
                        Our commitment to quality education and innovation is reflected through our growing
                        recognition, industry collaborations, expert-led programs, and successful student
                        placements across top IT companies, startups, and digital agencies.
                    </p>


                    <p>
                        Whether you aim to master web development, graphic design, UI/UX, digital marketing,
                        or explore emerging technologies, IRS Design Academy offers structured learning paths
                        guided by experienced mentors to help you build a successful career in the digital era.
                    </p>


                    <div class="d-flex align-items-center gap-3 mt-4">
                        <span class="fw-semibold">Explore our courses to</span>
                        <a href="#" class="btn view-btn rounded-pill px-4">
                            Learn More
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- why choose us section -->

    <section class="why-choose-section py-5">
        <div class="container">
            <div class="row align-items-center gy-5">

                <!-- LEFT CONTENT -->
                <div class="col-lg-7">
                    <h2 class="section-title">
                        Why Choose <br>
                        <span>IRS Design Academy</span>

                    </h2>

                    <p>
                        We create pathways to successful careers by equipping learners with
                        industry-relevant skills and providing strong placement-oriented guidance
                        to help them secure opportunities with leading organisations.

                    </p>

                    <p>
                        At IRS Design Academy, our courses are carefully structured to match
                        current industry standards and evolving market demands. Students gain
                        hands-on experience through live projects, practical assignments,
                        real-world case studies, and interactive lab sessions.

                    </p>

                    <p>
                        Our experienced mentors and career counsellors offer personalised support
                        throughout your learning journey. Beyond theoretical concepts, we focus
                        on building practical expertise and confidence that prepare you for
                        real-world professional challenges.

                    </p>

                    <p class="fw-semibold">
                        Our mission is to empower you to confidently state on your CV –
                    </p>

                    <ul class="cv-points">
                        <li><i class="fa-solid fa-check"></i> “I am proficient in …”</li>
                        <li><i class="fa-solid fa-check"></i> “I have developed expertise in …”</li>
                        <li><i class="fa-solid fa-check"></i> “I have completed projects in the field of …”</li>
                        <li><i class="fa-solid fa-check"></i> “I am certified in …”</li>
                        <li><i class="fa-solid fa-check"></i> “I have a sound knowledge of …”</li>
                    </ul>

                    <p class="mt-3">
                        At IRS Design Academy, we don’t just teach skills —
                        we shape professionals ready to excel in today’s competitive digital world.

                    </p>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="col-lg-5 text-center">
                    <div class="image-wrap">
                        <span class="dot blue"></span>
                        <span class="dot cyan"></span>

                        <img src="{{ asset('assets/img/whychooseus.png') }}" class="trainer-img" alt="Trainer">

                        <div class="badge-box">
                            <span>Placement Assistance</span>
                            <strong>Complete Placement Assistance</strong>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Get place Dream company -->

    <section class="dream-section py-5">
        <div class="container">
            <div class="row align-items-center gy-5">

                <!-- LEFT CONTENT -->
                <div class="col-lg-6">
                    <h2 class="dream-title">
                        Dream. Upskill.<br>
                        Achieve Dream Company
                    </h2>

                    <p class="intro">
                        Choose IRS Design Academy and –
                    </p>

                    <p>
                        <strong>Gain a competitive edge –</strong>
                        Stand out in the job market with industry-relevant skills, practical
                        training, and a professionally guided portfolio designed to meet
                        real-world demands.

                    </p>

                    <p>
                        <strong>Launch your career with confidence –</strong>
                        Our comprehensive training programs and dedicated career guidance
                        help you confidently navigate interviews, placements, and professional
                        challenges in the IT and design industry.

                    </p>

                    <p>
                        <strong>Invest in your future –</strong>
                        Unlock your true potential and build a rewarding, future-ready career
                        in IT, design, digital marketing, and emerging technologies with
                        IRS Design Academy.

                    </p>

                    <a href="#" class="btn view-btn mt-3">Enroll Now</a>
                </div>

                <!-- RIGHT VIDEO MOCKUP -->
                <div class="col-lg-6 text-center">
                    <div class="video-frame">
                        <img src="{{ asset('assets/img/companies-bnr-img.jpg') }}" alt="Academy Video" class="video-img">
                        <span class="play-btn">
                            <i class="fa-solid fa-play"></i>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- our Teacher day -->

    <section class="team-section py-5">
        <div class="container">

            <!-- Heading -->
            <div class="text-center mb-5">
                <span class="tag">MEET OUR TEAM</span>
                <h2 class="team-title">
                    We build success together at <br> <span>IRS Design Academy</span>
                </h2>
            </div>

            <!-- Team Grid -->
            <div class="row g-4">

                <!-- Team Member -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-img">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team">

                            <div class="team-overlay">
                                <h5>Rahul Sharma</h5>
                                <p>Founder & Director</p>

                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Team Member -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-img">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team">

                            <div class="team-overlay">
                                <h5>Priya Sen</h5>
                                <p>Senior UI/UX Trainer</p>

                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Team Member -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-img">
                            <img src="https://randomuser.me/api/portraits/men/85.jpg" alt="Team">

                            <div class="team-overlay">
                                <h5>Amit Roy</h5>
                                <p>Full Stack Mentor</p>

                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Team Member -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-img">
                            <img src="https://randomuser.me/api/portraits/men/61.jpg" alt="Team">

                            <div class="team-overlay">
                                <h5>Neha Gupta</h5>
                                <p>Digital Marketing Lead</p>

                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection