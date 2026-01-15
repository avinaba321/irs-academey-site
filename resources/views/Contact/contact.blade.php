@extends('layout.app')

@section('title', 'Contact | IrsDesign Academy')
<!-- font-awesome cdn link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">

<style>
    .custom-alert {
        margin-bottom: 20px;
        /* space below alert */
        padding: 10px 15px;
        background-color: #fff3cd;
        color: #664d03;
        border: 1px solid #ffecb5;
        border-radius: 6px;
        font-weight: 500;
    }

    .invalid-feedback {
        color: red;
        font-size: 0.875rem;
    }

    /* Parsley error text */
.parsley-errors-list {
    list-style: none;
    padding-left: 0;
    margin-top: 5px;
    font-size: 13px;
    color: #ff3b3b;
}

/* Invalid input */
input.parsley-error,
textarea.parsley-error {
    border-color: #ff3b3b;
}

/* Valid input */
input.parsley-success,
textarea.parsley-success {
    border-color: #28a745;
}


</style>

@section('content')

    <!-- about us breadcum -->
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center contact-content">
                    <h2>Contact us</h2>
                    <p>
                        Start the conversation to established good relationship<br class="d-none d-md-block">
                        IrsDesign Academy.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- contact form area -->

    <section class="contact-area py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- LEFT CONTENT -->
                <div class="col-lg-5 col-md-12">
                    <span class="tag mb-3 d-inline-block">GET IN TOUCH</span>
                    <h2 class="main-heading">
                        Lets Connect,<br>
                        With Us.
                    </h2>
                    <p class="text-muted mt-3">
                        Montes pellentesque vitae adipiscing laoreet faucibus at etiam dis luctus ullamcorper aptent.
                    </p>

                    <div class="info-box mt-4">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <h6>Head Office</h6>
                            <p>SDF Building, GP Block, Sector V, Bidhannagar<br>Kolkata, West Bengal 700091</p>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="icon-box">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div>
                            <h6>Email Support</h6>
                            <p>info@irsdesign.com</p>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="icon-box">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div>
                            <h6>Let's Talk</h6>
                            <p>Phone : +91 91230 61864<br>+91 90642 95391</p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT FORM -->

                <div class="col-lg-7 col-md-12">
                    <div class="form-card">
                        @if (session('success'))
                            <div class="custom-alert" id="successAlert">
                                {{ session('success') }}
                            </div>
                                        <button type="button"
                            class="alert-close"
                            aria-label="Close">
                        &times;
                    </button>
                        @endif
                        <h3 class="mb-4">Book a Free Consultation</h3>

                        <form action="{{ route('contact.submit') }}" method="POST" data-parsley-validate>
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required
                                        data-parsley-pattern="^[A-Za-z ]+$" data-parsley-minlength="3"
                                        data-parsley-required-message="Name is required"
                                        data-parsley-pattern-message="Only letters and spaces allowed"
                                        data-parsley-minlength-message="Name must be at least 3 characters">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="text" name="college" class="form-control" placeholder="College"
                                        data-parsley-pattern="^[A-Za-z0-9 .-]+$"
                                        data-parsley-pattern-message="Invalid college name" required>
                                    @error('college')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" required
                                        class="form-control @error('phone') is-invalid @enderror"
                                        data-parsley-pattern="^(?!([0-9])\1{9})[6-9][0-9]{9}$"
                                        data-parsley-pattern-message="Enter a valid 10-digit mobile number"
                                        data-parsley-required-message="Mobile number is required">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        data-parsley-type-message="Enter a valid email address"
                                        data-parsley-required-message="Email address is required" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject"
                                        data-parsley-minlength="5" data-parsley-required-message="Subject is required"
                                        data-parsley-minlength-message="Subject must be at least 5 characters" required>
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <textarea rows="5" name="message" class="form-control" placeholder="Message" data-parsley-minlength="10"
                                        data-parsley-required-message="Message is required"
                                        data-parsley-minlength-message="Message must be at least 10 characters" required></textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn send-btn">
                                        Send Message <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- map section area -->

    <section class="map-section py-5">
        <div class="container-fluid">
            <div class="row mb-4 text-center">
                <div class="col">
                    <span class="badge-pill bg-white text-black">OUR LOCATION</span>
                    <h2 class="map-heading mt-3">Find Us On Google Map</h2>
                    <p class="text-muted">
                        Visit our academy or reach us easily using the map below.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="map-box">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.2174745905404!2d88.4248414758167!3d22.570968133029186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02758041654fb1%3A0x18eaba5b1d2c6ed2!2sIRS%20Design!5e0!3m2!1sen!2sin!4v1756129436088!5m2!1sen!2sin"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    setTimeout(() => {
        const alert = document.getElementById('successAlert');
        if (alert) alert.style.display = 'none';
    }, 3000);
</script>
@endsection
