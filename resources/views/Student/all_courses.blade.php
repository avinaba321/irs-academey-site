@extends('Student.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/allCourses.css') }}">
    <link rel="stylesheet" href="{{ asset('student/css/myProfile.css') }}">
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

                            <button class="btn-primary-premium purchaseBtn" data-course-id="{{ $course->id }}"
                                data-price="{{ $course->discount_price ?? $course->price }}"
                                data-profile-complete="{{ $profileComplete ? '1' : '0' }}">
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
        <div class="modal fade" id="paymentChoiceModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-dark">Select Payment Option</h5>
                    </div>
                    <div class="modal-body text-center">

                        <button class="btn btn-success w-100 mb-2" onclick="payNow('full')">
                            Pay Full Amount
                        </button>

                        <button class="btn btn-outline-primary w-100" onclick="payNow('installment')">
                            Pay in 3 Installments
                        </button>

                    </div>
                </div>
            </div>
        </div>


        <!-- Load More Button (optional later) -->
        <div class="top-actions my-4 text-center">
            <button class="btn-addmore">
                <i class="bi bi-arrow-clockwise"></i> Load More Courses
            </button>
        </div>

        <!-- PREMIUM EDIT MODAL -->
        <div class="editModal" id="editModal">
            <div class="editOverlay" id="editOverlay"></div>

            <div class="editBox">
                <!-- Header -->
                <div class="editTop">
                    <h5 class="m-0 fw-black">

                        <i class="bi bi-pencil-square me-1" id="editBtn"></i> Edit Profile
                        </button>

                    </h5>

                    <button class="closeEdit" id="closeEdit">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <!-- Edit Modal Body -->
                <div class="editBody">
                    <form id="profileEditForm" data-parsley-validate>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control premium-input @error('full_name') is-invalid @enderror"
                                    name="full_name" id="editName" value="{{ old('full_name', $student->full_name) }}"
                                    required data-parsley-required-message="Full name is required"
                                    data-parsley-maxlength="255" />
                                @error('full_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-full_name"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email"
                                    class="form-control premium-input @error('email') is-invalid @enderror" name="email"
                                    id="editEmail" value="{{ old('email', $student->email) }}" required
                                    data-parsley-type="email" data-parsley-required-message="Email is required"
                                    data-parsley-type-message="Please enter a valid email" />
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-email"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control premium-input @error('phone_number') is-invalid @enderror"
                                    name="phone_number" id="editPhone"
                                    value="{{ old('phone_number', $student->phone_number) }}" required
                                    data-parsley-type="digits" data-parsley-length="[10,15]"
                                    data-parsley-required-message="Contact number is required"
                                    data-parsley-type-message="Please enter only digits"
                                    data-parsley-length-message="Contact number must be between 10-15 digits" />
                                @error('phone_number')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-phone_number"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date"
                                    class="form-control premium-input @error('dob') is-invalid @enderror" name="dob"
                                    id="editDob" value="{{ old('dob', $student->dob) }}" />
                                @error('dob')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-dob"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select premium-input @error('gender') is-invalid @enderror"
                                    name="gender" id="editGender">
                                    <option value="">Select a Gender</option>
                                    <option value="male"
                                        {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>
                                        MALE</option>
                                    <option value="female"
                                        {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>FEMALE</option>
                                    <option value="other"
                                        {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>
                                        OTHER</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-gender"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Last Qualification</label>
                                <select class="form-select premium-input @error('last_qualification') is-invalid @enderror"
                                    name="last_qualification" id="editQualification">
                                    <option value="">Select Last Qualification</option>
                                    <option value="HS"
                                        {{ old('last_qualification', $student->last_qualification) === 'HS' ? 'selected' : '' }}>
                                        HS</option>
                                    <option value="GRADUATE"
                                        {{ old('last_qualification', $student->last_qualification) === 'GRADUATE' ? 'selected' : '' }}>
                                        Graduate</option>
                                    <option value="DIPLOMA"
                                        {{ old('last_qualification', $student->last_qualification) === 'DIPLOMA' ? 'selected' : '' }}>
                                        Diploma</option>
                                    <option value="POST_GRADUATE"
                                        {{ old('last_qualification', $student->last_qualification) === 'POST GRADUATE' ? 'selected' : '' }}>
                                        Post Graduate</option>
                                    <option value="OTHER"
                                        {{ old('last_qualification', $student->last_qualification) === 'OTHER' ? 'selected' : '' }}>
                                        Others</option>
                                </select>
                                @error('last_qualification')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-last_qualification"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Guardian Name</label>
                                <input type="text"
                                    class="form-control premium-input @error('guardian_name') is-invalid @enderror"
                                    name="guardian_name" id="editGuardian"
                                    value="{{ old('guardian_name', $student->guardian_name) }}"
                                    data-parsley-maxlength="255" />
                                @error('guardian_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-guardian_name"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Guardian Mobile</label>
                                <input type="text"
                                    class="form-control premium-input @error('guardian_mobile') is-invalid @enderror"
                                    name="guardian_mobile" id="editGuardianPhone"
                                    value="{{ old('guardian_mobile', $student->guardian_mobile) }}"
                                    data-parsley-type="digits" data-parsley-length="[10,15]"
                                    data-parsley-type-message="Please enter only digits"
                                    data-parsley-length-message="Guardian mobile must be between 10-15 digits" />
                                @error('guardian_mobile')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-guardian_mobile"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text"
                                    class="form-control premium-input @error('address') is-invalid @enderror"
                                    name="address" id="editAddress" value="{{ old('address', $student->address) }}"
                                    data-parsley-maxlength="500" />
                                @error('address')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback" id="error-address"></div>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="editActions mt-4">
                            <button type="button" class="btnCancel" id="cancelEdit">
                                <i class="bi bi-x-circle me-1"></i> Cancel
                            </button>

                            <button type="button" class="btnSave" id="saveEdit">
                                <i class="bi bi-check-circle me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('editModal');
            const overlay = document.getElementById('editOverlay');
            const form = document.getElementById('profileEditForm');

            const saveBtn = document.getElementById('saveEdit');
            const cancelBtn = document.getElementById('cancelEdit');
            const closeBtn = document.getElementById('closeEdit');

            /* =====================
               MODAL CONTROLS
            ===================== */
            function openEditModal() {
                modal.classList.add('show');
                document.body.classList.add('modal-open');
            }

            function closeEditModal() {
                modal.classList.remove('show');
                document.body.classList.remove('modal-open');
                clearErrors();
            }

            // Make openEditModal globally available for purchase buttons
            window.openEditModal = openEditModal;

            cancelBtn?.addEventListener('click', closeEditModal);
            closeBtn?.addEventListener('click', closeEditModal);
            overlay?.addEventListener('click', closeEditModal);

            window.addEventListener('keydown', e => {
                if (e.key === 'Escape' && modal.classList.contains('show')) {
                    closeEditModal();
                }
            });

            // Auto-open modal if Laravel validation errors exist
            @if ($errors->any())
                openEditModal();
            @endif

            /* =====================
               CLEAR ERRORS
            ===================== */
            function clearErrors() {
                form.querySelectorAll('.invalid-feedback:not(.d-block)').forEach(el => {
                    el.innerText = '';
                    el.style.display = 'none';
                });

                form.querySelectorAll('.is-invalid').forEach(el => {
                    el.classList.remove('is-invalid');
                });
            }

            /* =====================
               VALIDATE FORM
            ===================== */
            function validateForm() {
                let isValid = true;
                clearErrors();

                // Full Name
                const fullName = document.getElementById('editName').value.trim();
                if (!fullName) {
                    showError('full_name', 'Full name is required');
                    isValid = false;
                }

                // Email
                const email = document.getElementById('editEmail').value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!email) {
                    showError('email', 'Email is required');
                    isValid = false;
                } else if (!emailRegex.test(email)) {
                    showError('email', 'Please enter a valid email');
                    isValid = false;
                }

                // Phone Number
                const phone = document.getElementById('editPhone').value.trim();
                const phoneRegex = /^\d{10,15}$/;
                if (!phone) {
                    showError('phone_number', 'Contact number is required');
                    isValid = false;
                } else if (!phoneRegex.test(phone)) {
                    showError('phone_number', 'Contact number must be 10-15 digits');
                    isValid = false;
                }

                // Guardian Mobile (optional but validate if provided)
                const guardianMobile = document.getElementById('editGuardianPhone').value.trim();
                if (guardianMobile && !phoneRegex.test(guardianMobile)) {
                    showError('guardian_mobile', 'Guardian mobile must be 10-15 digits');
                    isValid = false;
                }

                return isValid;
            }

            function showError(field, message) {
                const errorDiv = document.getElementById(`error-${field}`);
                const inputElement = document.querySelector(`[name="${field}"]`);

                if (errorDiv && inputElement) {
                    errorDiv.textContent = message;
                    errorDiv.style.display = 'block';
                    inputElement.classList.add('is-invalid');
                }
            }

            /* =====================
               SAVE PROFILE
            ===================== */
            saveBtn?.addEventListener('click', function() {

                // Validate form
                if (!validateForm()) {
                    return;
                }

                const originalText = saveBtn.innerHTML;
                saveBtn.disabled = true;
                saveBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Saving...';

                const formData = new FormData(form);
                formData.append('_method', 'PATCH');

                fetch("{{ route('student.profile.update') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(async response => {
                        const data = await response.json();
                        if (!response.ok) throw data;
                        return data;
                    })
                    .then(data => {
                        alert(data.message || 'Profile updated successfully');

                        // Check if there's a pending purchase
                        if (window.pendingPurchase) {
                            const {
                                courseId,
                                price
                            } = window.pendingPurchase;
                            window.pendingPurchase = null;
                            closeEditModal();
                            startPayment(courseId, price);
                        } else {
                            closeEditModal();
                            location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);

                        if (error.errors) {
                            let firstInvalid = null;

                            Object.keys(error.errors).forEach(field => {
                                const input = form.querySelector(`[name="${field}"]`);
                                const errorBox = document.getElementById(`error-${field}`);

                                if (input) {
                                    input.classList.add('is-invalid');
                                    if (!firstInvalid) firstInvalid = input;
                                }

                                if (errorBox) {
                                    errorBox.innerText = error.errors[field][0];
                                    errorBox.style.display = 'block';
                                }
                            });

                            firstInvalid?.focus();
                        } else {
                            alert(error.message || 'Update failed. Please try again.');
                        }
                    })
                    .finally(() => {
                        saveBtn.disabled = false;
                        saveBtn.innerHTML = originalText;
                    });
            });


        });
    </script>
    {{-- <script>
        let selectedCourseId = null;

        document.querySelectorAll('.purchaseBtn').forEach(btn => {
            btn.addEventListener('click', function() {

                const profileComplete = this.dataset.profileComplete === '1';

                if (!profileComplete) {
                    openEditModal();
                    return;
                }

                selectedCourseId = this.dataset.courseId;
                new bootstrap.Modal(
                    document.getElementById('paymentChoiceModal')
                ).show();
            });
        });

        function payNow(type) {

            fetch("{{ route('student.payment.initiate') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        course_id: selectedCourseId,
                        payment_type: type
                    })
                })
                .then(res => res.json())
                .then(data => {

                    if (!data.success) {
                        alert(data.message || 'Payment failed');
                        return;
                    }

                    const options = {
                        key: data.key, // rzp_test_xxx
                        amount: data.amount, // paise
                        currency: "INR",
                        name: "Your Academy",
                        order_id: data.order_id,
                        handler: function(response) {
                            alert("Payment Successful");
                            location.reload();
                        }
                    };

                    new Razorpay(options).open();
                });
        }
    </script> --}}
    <script>
    let selectedCourseId = null;

    document.querySelectorAll('.purchaseBtn').forEach(btn => {
        btn.addEventListener('click', function () {

            const profileComplete = this.dataset.profileComplete === '1';

            if (!profileComplete) {
                openEditModal();
                return;
            }

            selectedCourseId = this.dataset.courseId;

            new bootstrap.Modal(
                document.getElementById('paymentChoiceModal')
            ).show();
        });
    });

    function payNow(type) {

        fetch("{{ route('student.payment.initiate') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                course_id: selectedCourseId,
                payment_type: type
            })
        })
        .then(res => res.json())
        .then(data => {

            if (!data.success) {
                alert(data.message || 'Payment failed');
                return;
            }

            const options = {
                key: data.key,                 // rzp_test_xxx
                amount: data.amount,           // paise
                currency: "INR",
                name: "Your Academy",
                description: "Course Payment",
                order_id: data.order_id,

                // ✅ AFTER SUCCESSFUL PAYMENT
                handler: function (response) {

                    // 🔐 VERIFY PAYMENT ON SERVER
                    fetch("{{ route('student.payment.verify') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_signature: response.razorpay_signature
                        })
                    })
                    .then(res => res.json())
                    .then(result => {

                        if (result.success) {
                            alert("Payment successful 🎉");
                            location.reload();
                        } else {
                            alert("Payment verification failed");
                        }
                    })
                    .catch(() => {
                        alert("Payment verification error");
                    });
                },

                // ❌ OPTIONAL: handle modal close / failure
                modal: {
                    ondismiss: function () {
                        console.log("Payment popup closed");
                    }
                }
            };

            new Razorpay(options).open();
        })
        .catch(() => {
            alert("Payment initiation failed");
        });
    }
</script>

@endpush
