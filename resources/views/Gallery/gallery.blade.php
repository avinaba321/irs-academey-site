@extends('layout.app')

@section('title', 'Gallery | IrsDesign Academy')
 <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/gallary.css') }}">
@section('content')

 <!-- about us breadcum -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center about-content">
                    <h2>Our Gallery</h2>
                    <p>
                        Join our community of learners and start your<br class="d-none d-md-block">
                        journey towards success.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Photo Gallery Section -->
    <section class="photo-gallery py-5">
        <div class="container">

            <div class="text-center mb-4">
                <button class="btn bg-warning rounded-pill px-4">Photo Gallery</button>
            </div>

            <div class="row g-4">

                <!-- Image Card -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="gallery-card">
                        <img src="{{ asset('assets/img/student/student1.jpg') }}" class="gallery-img" alt="Gallery Image">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="gallery-card">
                        <img src="{{ asset('assets/img/student/student7.jpg') }}" class="gallery-img" alt="Gallery Image">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="gallery-card">
                        <img src="{{ asset('assets/img/student/student3.jpg') }}" class="gallery-img" alt="Gallery Image">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="gallery-card">
                        <img src="{{ asset('assets/img/student/student8.jpg') }}" class="gallery-img" alt="Gallery Image">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="gallery-card">
                        <img src="{{ asset('assets/img/student/student5.jpg') }}" class="gallery-img" alt="Gallery Image">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="gallery-card">
                        <img src="{{ asset('assets/img/student/student6.jpg') }}" class="gallery-img" alt="Gallery Image">
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-center mt-5">
                <button class="view-btn">View More <i class="fa-solid fa-angles-right"></i></button>
            </div>

        </div>
    </section>


    <!-- Image Popup Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body text-center">
                    <img src="" id="modalImage" class="img-fluid rounded-4">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const galleryImages = document.querySelectorAll(".gallery-img");
            const modalImage = document.getElementById("modalImage");
            const imageModal = new bootstrap.Modal(document.getElementById("imageModal"));

            galleryImages.forEach(img => {
                img.addEventListener("click", function () {
                    modalImage.src = this.src;
                    imageModal.show();
                });
            });
        });
    </script>

@endsection