@extends('Admin.layouts.app')
@section('title', 'Courses | IrsDesign Academy')
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

            @forelse($courses as $course)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="course-card shadow-lg">

                        <div class="d-flex justify-content-between align-items-start mb-2">

                            @if ($course->course_image)
                                <img src="{{ asset('storage/' . $course->course_image) }}" class="img-fluid rounded mb-2"
                                    alt="{{ $course->title }}" style="height:180px; width:90%; object-fit:cover;">
                            @else
                                <img src="{{ asset('admin/images/no-image.png') }}" class="img-fluid rounded mb-2"
                                    style="height:180px; width:100%; object-fit:cover;">
                            @endif



                            <div class="dropdown">
                                <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a href="#" class="dropdown-item text-success">View</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item" onclick="openEditCourse(event)">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item text-danger"
                                            onclick="openDeleteModal({{ $course->id }})">
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- COURSE TITLE --}}
                        <h6 class="fw-semibold">{{ $course->title }}</h6>

                        {{-- DESCRIPTION --}}
                        <p class="course-meta">{{ $course->description }}</p>

                        {{-- DETAILS --}}
                        <ul class="course-meta mb-3">
                            <li>{{ $course->duration }} Months</li>
                            <li>{{ $course->discount_price ? 'Discounted' : 'Regular' }}</li>
                        </ul>

                        {{-- PRICE & STATUS --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>₹{{ number_format($course->discount_price) }}</strong><br>
                                @if ($course->discount_price)
                                    <small class="text-muted">
                                        <s>₹{{ number_format($course->price) }}</s>
                                    </small>
                                @endif
                            </div>

                            <button
    class="btn btn-sm {{ $course->status ? 'btn-success' : 'btn-secondary' }}"
    onclick="openStatusModal({{ $course->id }}, {{ $course->status }}, this)">
    {{ $course->status ? 'Active' : 'Inactive' }}
</button>

                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        No courses found
                    </div>
                </div>
            @endforelse

        </div>

    </div>

    <div class="modal fade" id="courseModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- FORM START -->
                <form id="courseForm" method="POST" action="{{ route('admin.courses.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- HEADER -->
                    <!-- HEADER -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="courseModalTitle">Add Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div id="courseFormAlert" class="alert d-none mx-3 mt-3"></div>
                    <!-- BODY -->
                    <div class="modal-body">

                        <!-- BASIC INFO -->
                        <div class="mb-4">
                            <div class="modal-section-title">Basic Information</div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Course Name</label>
                                    <input type="text" class="form-control" id="cName" name="title"
                                        placeholder="Full Stack Development">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Short Description</label>
                                    <input type="text" class="form-control" id="cDName" name="description"
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
                                    <input type="text" class="form-control" id="cDuration" name="duration"
                                        placeholder="6 Months">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Course Image</label>

                                    <input type="file" class="form-control" name="course_image" id="cImage"
                                        accept="image/*" onchange="previewCourseImage(event)">

                                    <img id="imagePreview" src="" class="img-fluid rounded mt-2 d-none"
                                        style="max-height:120px;">
                                </div>

                                {{-- <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status" id="cStatus">
                                        <option value="">Select a Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div> --}}
                            </div>
                        </div>

                        <!-- PRICING -->
                        <div>
                            <div class="modal-section-title">Pricing</div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Course Price (₹)</label>
                                    <input type="number" class="form-control" name="price" id="cPrice"
                                        placeholder="50000">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Discount Price (₹)</label>
                                    <input type="number" class="form-control" id="cDiscount" name="discount_price"
                                        placeholder="45000">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer">

                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Save Course
                        </button>
                    </div>


                </form>
                <!-- FORM END -->

            </div>
        </div>
    </div>

    <!-- DELETE COURSE MODAL -->
    <div class="modal fade" id="deleteCourseModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Course</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-0">
                        Are you sure you want to delete this course?
                        <br>
                        <strong class="text-danger">This action cannot be undone.</strong>
                    </p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button id="confirmDeleteBtn" class="btn btn-danger">
                        Yes, Delete
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- STATUS CHANGE MODAL -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Change Course Status</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p id="statusModalText" class="mb-0"></p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-warning" id="confirmStatusBtn">
                    Yes, Change
                </button>
            </div>

        </div>
    </div>
</div>


@endsection
@push('scripts')
    <script>
        const modalEl = document.getElementById("courseModal");
        const modal = modalEl ? new bootstrap.Modal(modalEl) : null;

        function openAddCourse() {
            if (!modal) return;

            // Reset title
            document.getElementById("courseModalTitle").innerText = "Add Course";

            // Reset form
            document.getElementById("courseForm").reset();

            // Reset status
            const status = document.getElementById("cStatus");
            if (status) status.value = "1";

            // Hide alert
            const alertBox = document.getElementById("courseFormAlert");
            alertBox.classList.add('d-none');
            alertBox.innerText = '';

            // Hide image preview
            const preview = document.getElementById("imagePreview");
            preview.classList.add("d-none");
            preview.src = "";

            modal.show();
        }
    </script>

    <script>
        function previewCourseImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById("imagePreview");

            if (!file) {
                preview.classList.add("d-none");
                preview.src = "";
                return;
            }

            preview.src = URL.createObjectURL(file);
            preview.classList.remove("d-none");
        }
    </script>

    <script>
        document.getElementById('courseForm').addEventListener('submit', function(e) {
            e.preventDefault(); // 🚫 stop normal submit

            const form = this;
            const url = form.action;
            const formData = new FormData(form);

            const alertBox = document.getElementById('courseFormAlert');
            alertBox.classList.add('d-none');

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json' // 🔥 THIS FIXES IT
                    },
                    body: formData
                })
                .then(async response => {
                    const data = await response.json();

                    if (!response.ok) {
                        throw data;
                    }

                    return data;
                })
                .then(data => {
                    // ✅ SUCCESS
                    alertBox.className = 'alert alert-success';
                    alertBox.innerText = data.message ?? 'Course saved successfully';
                    alertBox.classList.remove('d-none');

                    // Reset form
                    form.reset();
                    document.getElementById('imagePreview').classList.add('d-none');

                    // Close modal after delay
                    setTimeout(() => {
                        bootstrap.Modal.getInstance(
                            document.getElementById('courseModal')
                        ).hide();

                        // OPTIONAL: reload course list
                        location.reload();
                    }, 1200);
                })
                .catch(error => {
                    alertBox.className = 'alert alert-danger';

                    if (error.errors) {
                        // Laravel validation errors
                        let messages = Object.values(error.errors)
                            .flat()
                            .join('\n');

                        alertBox.innerText = messages;
                    } else {
                        alertBox.innerText =
                            error.message ?? 'Something went wrong';
                    }

                    alertBox.classList.remove('d-none');
                });

        });

        modalEl.addEventListener('hidden.bs.modal', () => {
            const alertBox = document.getElementById("courseFormAlert");
            alertBox.classList.add('d-none');
            alertBox.innerText = '';

            document.getElementById("courseForm").reset();

            const preview = document.getElementById("imagePreview");
            preview.classList.add("d-none");
            preview.src = "";
        });
    </script>

    <script>
        let deleteCourseId = null;

        function openDeleteModal(courseId) {
            deleteCourseId = courseId;

            const modalEl = document.getElementById('deleteCourseModal');
            const modal = new bootstrap.Modal(modalEl);
            modal.show();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const confirmBtn = document.getElementById('confirmDeleteBtn');

            if (!confirmBtn) return;

            confirmBtn.addEventListener('click', function() {
                if (!deleteCourseId) return;

                fetch(`/admin/courses/${deleteCourseId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        bootstrap.Modal.getInstance(
                            document.getElementById('deleteCourseModal')
                        ).hide();

                        location.reload();
                    })
                    .catch(() => {
                        alert('Failed to delete course');
                    });
            });
        });
    </script>

    <script>
    let selectedCourseId = null;
    let currentStatus = null;
     let statusBtn = null; // ✅ ADD THIS

    function openStatusModal(courseId, status, btn) {
    selectedCourseId = courseId;
    currentStatus = status;
    statusBtn = btn; // ✅ SAVE BUTTON REF

    const text = status
        ? 'Do you want to deactivate this course?'
        : 'Do you want to activate this course?';

    document.getElementById('statusModalText').innerText = text;

    new bootstrap.Modal(
        document.getElementById('statusModal')
    ).show();
}


    document.getElementById('confirmStatusBtn').addEventListener('click', function () {

    fetch(`/admin/courses/${selectedCourseId}/status`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (!data.success) return;

        // ✅ UPDATE BUTTON UI
        if (data.status === 1) {
            statusBtn.classList.remove('btn-secondary');
            statusBtn.classList.add('btn-success');
            statusBtn.innerText = 'Active';
        } else {
            statusBtn.classList.remove('btn-success');
            statusBtn.classList.add('btn-secondary');
            statusBtn.innerText = 'Inactive';
        }

        // ✅ CLOSE MODAL
        bootstrap.Modal.getInstance(
            document.getElementById('statusModal')
        ).hide();
    })
    .catch(err => console.error(err));

    });
</script>

@endpush
