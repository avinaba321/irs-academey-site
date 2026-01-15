@extends('layout.app')

@section('title', 'Placement | IrsDesign Academy')
 <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/courses.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/popup.css') }}">
@section('content')


    <!-- about us breadcum -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center about-content">
                    <h2>Our Student Place</h2>
                    <p>
                        Enroll our Courses and start your Career<br class="d-none d-md-block">
                        and Get your Dream Job
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- our placement area -->

    <section class="placement-section my-5">
        <div class="container">

            <!-- Heading -->
            <div class="text-center">
                <h2 class="placement-title">Candidates Who’ve Got Placed</h2>
                <p class="placement-subtitle">
                    Worried about your career? IRS Design Academy. is here to guide you toward success.
                </p>
            </div>

            <!-- Content -->
            <div class="placement-box">

                <p class="text-center">
                    <strong>IRS Design Academy.</strong> is a leading IT training and digital solutions company
                    offering <strong>industry-focused online and offline courses</strong> designed to meet real
                    market demands. Our programs are crafted to help students and professionals build
                    strong, future-ready careers in the IT industry.
                </p>

                <p>
                    We offer advanced courses including
                    <a href="#">Web Development</a>,
                    <a href="#">Full Stack Development</a>,
                    <a href="#">PHP Laravel Development</a>,
                    <a href="#">React & React Native</a>,
                    <a href="#">UI/UX Design</a>,
                    <a href="#">Digital Marketing</a>, and
                    <a href="#">Software Testing</a>,
                    with a strong focus on practical learning and live projects.
                </p>

                <p class="text-center">
                    At IRS Design Academy., we take full responsibility for your career growth.
                    From day one, our mission is to make you <strong>technically skilled, confident,
                        and placement-ready</strong> for top IT companies across India.
                </p>

                <p class="text-center">
                    Our expert mentors provide continuous guidance, performance evaluation, and
                    real-world exposure. Based on your skills and dedication, you can secure
                    placement opportunities with reputed organizations, including
                    <span class="highlight">IRS Design Academy. and our trusted industry partners</span>.
                </p>

                <p class="text-center">
                    This is your opportunity to step into a high-growth IT career.
                    Don’t wait — start building your future today.
                </p>

                <div class="d-flex justify-content-center">
                    <a href="#" class="view-btn" data-bs-toggle="modal" data-bs-target="#enrollPopup">ENROLL NOW</a>
                </div>

            </div>

        </div>
    </section>

    <!-- our placement help -->
    <section class="placement-help py-5">
        <div class="container">

            <!-- Heading -->
            <div class="text-center mb-5">
                <h2 class="section-title">
                    How <span>IRS Design Academy</span> Helps in Student Placement
                </h2>
                <p class="section-subtitle">
                    Industry-focused training designed to turn students into job-ready professionals.
                </p>
            </div>

            <div class="row align-items-center g-4">

                <!-- Left Image -->
                <div class="col-lg-5">
                    <div class="placement-img rounded">
                        <img src="{{ asset('assets/img/placement-area.png') }}" alt="IRS Design Academy Placement" class="img-fluid"
                            style="height: 600px; width: 100%; border-radius: 24px; border: 5px solid orange; cursor: pointer;">
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-lg-7">
                    <div class="placement-content d-flex flex-column gap-3">

                        <div class="feature-box d-flex justify-content-between gap-2">
                            <div class="icon bg-warning shadow">
                                <i class="fa-solid fa-diagram-project"></i>
                            </div>
                            <div class="border border-2 border-warning bg-warning p-2 rounded shadow">
                                <h5>Live Industry Projects</h5>
                                <p>
                                    Work on real-world projects guided by industry experts to build confidence,
                                    practical skills, and a strong portfolio.
                                </p>
                            </div>
                        </div>

                        <div class="feature-box d-flex justify-content-between gap-2">
                            <div class="icon bg-warning shadow">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <div class="border border-2 border-warning bg-warning p-2 rounded shadow">
                                <h5>Knowledge Refresh Sessions</h5>
                                <p>
                                    Revise important concepts anytime, even after course completion, to stay
                                    interview-ready.
                                </p>
                            </div>
                        </div>

                        <div class="feature-box d-flex justify-content-between gap-2">
                            <div class="icon bg-warning shadow">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <div class="border border-2 border-warning bg-warning p-2 rounded shadow">
                                <h5>Interview Preparation</h5>
                                <p>
                                    Mock interviews, real interview questions, and expert feedback to help
                                    you perform with confidence.
                                </p>
                            </div>
                        </div>

                        <div class="feature-box d-flex justify-content-between gap-2">
                            <div class="icon bg-warning shadow">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <div class="border border-2 border-warning bg-warning p-2 rounded shadow">
                                <h5>Professional CV Building</h5>
                                <p>
                                    Get a recruiter-friendly resume designed to highlight your skills and
                                    project experience.
                                </p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn view-btn mt-4 text-black px-4 py-2" data-bs-toggle="modal" data-bs-target="#enrollPopup">
                               Register Now <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- popup contact us -->
         {{-- <div class="modal fade" id="enrollPopup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content popup-box">

                <!-- Close Button -->
                <button type="button" class="btn-close popup-close" data-bs-dismiss="modal"></button>

                <div class="popup-header">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                    <p>* indicates required fields</p>
                </div>

                <form class="popup-form">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <label><i class="fa-solid fa-user"></i> Full Name *</label>
                            <input type="text" placeholder="Full Name" required>
                        </div>

                        <div class="col-md-6">
                            <label><i class="fa-solid fa-envelope"></i> Email *</label>
                            <input type="email" placeholder="Email ID" required>
                        </div>

                        <div class="col-md-6">
                            <label><i class="fa-solid fa-phone"></i> Phone *</label>
                            <input type="tel" placeholder="Phone Number" required>
                        </div>

                        <div class="col-md-6">
                            <label><i class="fa-brands fa-whatsapp"></i> WhatsApp Number (If Any)</label>
                            <input type="tel" placeholder="Enter WhatsApp Number">
                        </div>

                        <div class="col-md-6">
                            <label><i class="fa-solid fa-calendar-days"></i> Date *</label>
                            <input type="date" required>
                        </div>

                        <div class="col-md-6">
                            <label><i class="fa-solid fa-clock"></i> Select Time For Call Back *</label>
                            <input type="time" required>
                        </div>

                    </div>

                    <div class="captcha-box mt-4">
                        <div class="fake-captcha">
                            <input type="checkbox"> I'm not a robot
                        </div>
                    </div>

                    <button type="submit" class="submit-btn mt-4">
                        SUBMIT NOW
                    </button>

                </form>

            </div>
        </div>
    </div> --}}

    <!-- Student Registration Popup -->
  {{-- <div class="modal fade" id="enrollPopup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content popup-box">

                    <!-- Close Button -->
                    <button type="button" class="btn-close popup-close" data-bs-dismiss="modal"></button>

                    <div class="popup-header">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                        <p>* indicates required fields</p>
                    </div>

                    <form class="popup-form" method="POST" action="{{ route('register') }}" data-parsley-validate>
                        @csrf

                        <div class="row g-4">

                            <div class="col-md-6">
                                <label><i class="fa-solid fa-user"></i> Full Name *</label>
                                <input type="text" name="name" id="full_name" placeholder="Full Name" required
                                    data-parsley-pattern="^[A-Za-z]+( [A-Za-z]+)*$" data-parsley-minlength="3"
                                    data-parsley-required-message="Full name is required"
                                    data-parsley-pattern-message="Only letters allowed, spaces only between words"
                                    data-parsley-minlength-message="Name must be at least 3 characters">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label><i class="fa-solid fa-envelope"></i> Email Address *</label>
                                <input type="email" name="email" placeholder="Email Address" required
                                    data-parsley-type-message="Enter a valid email address"
                                    data-parsley-required-message="Email address is required">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-6">
                                <label><i class="fa-solid fa-phone"></i> Mobile Number *</label>
                                <input type="tel" name="phone" placeholder="Mobile Number" required
                                    data-parsley-pattern="^(?!([0-9])\1{9})[6-9][0-9]{9}$"
                                    data-parsley-pattern-message="Enter a valid 10-digit mobile number"
                                    data-parsley-required-message="Mobile number is required">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Course Interest -->
                            <div class="col-md-6">
                                <label><i class="fa-solid fa-user"></i> Roles *</label>
                                <select name="role" required data-parsley-required-message="Please select a course">
                                    <option value="">Select role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Teacher</option>
                                    <option value="2">Student</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 position-relative">
                                <label><i class="fa-solid fa-lock"></i> Password *</label>

                                <input type="password" id="password" name="password" placeholder="Password" required
                                    data-parsley-minlength="8"
                                    data-parsley-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&])[A-Za-z0-9!@#$%&]{8,}$"
                                    data-parsley-pattern-message="Password must include uppercase, lowercase, number & special character"
                                    data-parsley-minlength-message="Password must be at least 8 characters"
                                    data-parsley-required-message="Password is required">

                                <span class="toggle-password" data-target="password">
                                    <i class="fa-solid fa-eye"></i>
                                </span>

                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Confirm Password -->
                            <div class="col-md-6 position-relative">
                                <label><i class="fa-solid fa-lock"></i> Confirm Password *</label>

                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Confirm Password" required data-parsley-equalto="[name='password']"
                                    data-parsley-equalto-message="Passwords do not match"
                                    data-parsley-required-message="Confirm password is required">

                                <span class="toggle-password" data-target="password_confirmation">
                                    <i class="fa-solid fa-eye"></i>
                                </span>

                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <!-- Terms & Conditions -->
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" name="terms" required>
                            <label class="form-check-label">
                                I agree to the <a href="#">Terms & Conditions</a> *
                            </label>
                            @error('terms')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-footer text-center">
                            <button type="submit" class="submit-btn">
                                REGISTER NOW
                            </button>

                            <p class="login-link">
                                Already have an account?
                                <a href="javascript:void(0);" id="openLoginModal">Login here</a>
                            </p>
                        </div>


                    </form>

                </div>
            </div>
        </div>

        <!-- Login Modal -->
        <div class="modal fade" id="loginPopup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content popup-box">

                    <!-- Close Button -->
                    <button type="button" class="btn-close popup-close" data-bs-dismiss="modal"></button>

                    <div class="popup-header">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                        <p>Login to your account</p>
                    </div>

                    <form class="popup-form" method="POST" action="#">
                        @csrf

                        <div class="row g-4">

                            <!-- Email -->
                            <div class="col-md-12">
                                <label><i class="fa-solid fa-envelope"></i> Email Address *</label>
                                <input type="email" name="email" placeholder="Email Address" required>
                            </div>

                            <!-- Password -->
                            <div class="col-md-12">
                                <label><i class="fa-solid fa-lock"></i> Password *</label>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>

                        </div>

                        <button type="submit" class="submit-btn mt-4">
                            LOGIN
                        </button>

                        <div class="text-center mt-3">
                            <p class="mb-0">
                                Don’t have an account?
                                <a href="javascript:void(0);" id="openRegisterModal">
                                    Register here
                                </a>
                            </p>
                        </div>

                    </form>

                </div>
            </div>
        </div> --}}

        

@endsection