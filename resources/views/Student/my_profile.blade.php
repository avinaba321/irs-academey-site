@extends('Student.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/myProfile.css') }}">
   <style>
.invalid-feedback {
    display: none;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.invalid-feedback.d-block {
    display: block !important;
}

.is-invalid {
    border-color: #dc3545 !important;
}

.parsley-errors-list {
    list-style: none;
    padding: 0;
    margin: 0.25rem 0 0 0;
    color: #dc3545;
    font-size: 0.875rem;
}

.avatar-wrap {
    position: relative;
    width: 140px;
    height: 140px;
    margin: auto;
}

.avatar-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #fff;
}

.avatar-edit-btn {
    position: absolute;
    bottom: 6px;
    right: 6px;
    background: #0d6efd;
    color: #fff;
    border: none;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.avatar-edit-btn:hover {
    background: #084298;
}

</style>
@endpush

@section('content')
    <div class="page-wrap">

        <!-- Header -->
        <div class="page-title">
            <h3>My Profile</h3>
        </div>

        <div class="premium-panel">
            <div class="row g-0">

                <!--  LEFT SIDE PROFILE -->
                <div class="col-lg-4 profile-side">
                    <div class="profile-card">
                        {{-- <div class="avatar-wrap">
                            <img src="https://images.pexels.com/photos/2379005/pexels-photo-2379005.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                alt="profile" />
                        </div> --}}
                        <div class="avatar-wrap position-relative">
                            <img
                                src="{{ $student->profile_image
                                        ? asset('storage/'.$student->profile_image)
                                        : asset('assets/img/demo-profile.jpg') }}"
                                alt="profile"
                                id="profileAvatar"
                            />

                            <!-- EDIT ICON -->
                            <button class="avatar-edit-btn" id="editAvatarBtn">
                                <i class="bi bi-camera-fill"></i>
                            </button>
                        </div>

                        <div class="profile-name">{{ $student->full_name }}</div>
                        <div class="profile-sub">Student UID : {{ $student->student_id }}</div>

                        <div class="badge-row">
                            <span class="p-badge"><i class="bi bi-patch-check-fill"></i> Verified</span>
                            <span class="p-badge"><i class="bi bi-stars"></i> Premium</span>
                            <span class="p-badge"><i class="bi bi-shield-lock-fill"></i> Secured</span>
                        </div>

                        <div class="divider-line"></div>

                        <div class="side-title" style="margin-bottom: 0;">
                            <h5>Personal Information</h5>
                            <span>Overview</span>
                        </div>

                        <div class="action-row">
                            <button class="btn btn-premium w-100" id="editBtn">
                                <i class="bi bi-pencil-square me-2"></i> Edit Profile
                            </button>

                            <button class="btn btn-soft w-100" onclick="openPasswordModal()">
                                <i class="bi bi-key me-2"></i> Change Password
                            </button>
                        </div>
                    </div>
                </div>

                <!--  RIGHT SIDE INFO GRID -->
                <div class="col-lg-8 info-side">

                    <div class="side-title">
                        <h5><i class="bi bi-person-lines-fill me-2"></i> Student Details</h5>
                        <span>
                            Last updated:
                            {{ $student->updated_at->format('d M Y') }}
                        </span>

                    </div>

                    <div class="info-grid">

                        <!-- item -->
                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-person-fill"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Name</div>
                                <div class="info-value">{{ $student->full_name }}</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-envelope-fill"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Email</div>
                                <div class="info-value">{{ $student->email }}</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-calendar2-week-fill"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Date of Birth</div>
                                <div class="info-value">{{ $student->dob ?? 'Not Updated' }}</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-telephone-fill"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Contact Number</div>
                                <div class="info-value">{{ $student->phone_number }}</div>
                            </div>
                        </div>


                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-gender-ambiguous"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Gender</div>
                                <div class="info-value">{{ $student->gender ?? 'Not Updated' }}</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-geo-alt-fill"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Last Qualification</div>
                                <div class="info-value">{{ $student->last_qualification ?? 'Not Updated' }}</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-people-fill"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Guardian Name</div>
                                <div class="info-value">{{ $student->guardian_name ?? 'Not Updated' }}</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-telephone-plus-fill"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Guardian Mobile</div>
                                <div class="info-value">{{ $student->guardian_mobile ?? 'Not Updated' }}</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icn"><i class="bi bi-geo-alt-fill"></i></div>
                            <div class="info-meta">
                                <div class="info-label">Address</div>
                                <div class="info-value">{{ $student->address ?? 'Not Updated' }}</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById('editModal').classList.add('active');
            });
        </script>
    @endif

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
                            <input type="email" class="form-control premium-input @error('email') is-invalid @enderror"
                                name="email" id="editEmail" value="{{ old('email', $student->email) }}" required
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
                            <input type="date" class="form-control premium-input @error('dob') is-invalid @enderror"
                                name="dob" id="editDob" value="{{ old('dob', $student->dob) }}" />
                            @error('dob')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="invalid-feedback" id="error-dob"></div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select class="form-select premium-input @error('gender') is-invalid @enderror" name="gender"
                                id="editGender">
                                <option value="">Select a Gender</option>
                                <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>
                                    MALE</option>
                                <option value="female"
                                    {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>FEMALE</option>
                                <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>
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
                                class="form-control premium-input @error('address') is-invalid @enderror" name="address"
                                id="editAddress" value="{{ old('address', $student->address) }}"
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

    <!-- PROFILE IMAGE MODAL -->
<div class="modal fade" id="profileImageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-dark">Update Profile Picture</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="imagePreview"
                     class="rounded-circle mb-3 d-none"
                     style="width:120px;height:120px;object-fit:cover">

                <input type="file"
                       class="form-control"
                       id="profileImageInput"
                       accept="image/*">
            </div>

            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="saveProfileImage">
                    Save Photo
                </button>
            </div>

        </div>
    </div>
</div>

<!-- CHANGE PASSWORD MODAL -->
<div class="editModal" id="passwordModal">
    <div class="editOverlay" onclick="closePasswordModal()"></div>

    <div class="editBox">

        <!-- Header -->
        <div class="editTop">
            <h5 class="m-0 fw-black">
                <i class="bi bi-shield-lock-fill me-2"></i> Change Password
            </h5>
            <button class="closeEdit" onclick="closePasswordModal()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="editBody">
            <form id="passwordForm" data-parsley-validate>

    <div class="mb-3">
        <label>Current Password</label>
        <input type="password" name="current_password" class="form-control" required>
        <div class="text-danger small" id="error-current_password"></div>
    </div>

    <div class="mb-3">
        <label>New Password</label>
        <input type="password" name="password" class="form-control" required
               data-parsley-minlength="8">
        <div class="text-danger small" id="error-password"></div>
    </div>

    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">
        Update Password
    </button>
</form>

        </div>

    </div>
</div>


@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

    <!-- Copy feature -->
    <script>
        document.querySelectorAll("[data-copy]").forEach(btn => {
            btn.addEventListener("click", () => {
                const text = btn.getAttribute("data-copy");
                navigator.clipboard.writeText(text);

                btn.innerHTML = `<i class="bi bi-check2"></i>`;
                setTimeout(() => btn.innerHTML = `<i class="bi bi-copy"></i>`, 1000);
            });
        });
    </script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal   = document.getElementById('editModal');
    const overlay = document.getElementById('editOverlay');
    const form    = document.getElementById('profileEditForm');

    const editBtn   = document.getElementById('editBtn');
    const saveBtn   = document.getElementById('saveEdit');
    const cancelBtn = document.getElementById('cancelEdit');
    const closeBtn  = document.getElementById('closeEdit');

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
    }

    editBtn?.addEventListener('click', openEditModal);
    cancelBtn?.addEventListener('click', closeEditModal);
    closeBtn?.addEventListener('click', closeEditModal);
    overlay?.addEventListener('click', closeEditModal);

    window.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeEditModal();
    });

    /* =====================
       CLEAR ERRORS
    ===================== */
    function clearErrors() {
        form.querySelectorAll('.invalid-feedback').forEach(el => {
            el.innerText = '';
            el.style.display = 'none';
        });

        form.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
        });
    }

    /* =====================
       SAVE PROFILE
    ===================== */
    saveBtn?.addEventListener('click', function () {

        // 🔹 Parsley validation
        if (!$(form).parsley().validate()) {
            openEditModal();
            return;
        }

        clearErrors();

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
            closeEditModal();
            location.reload();
        })
        .catch(error => {

            // 🔥 KEEP MODAL OPEN
            openEditModal();
            clearErrors();

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
                alert('Update failed. Please try again.');
            }
        });
    });

});
</script>


<script>
document.getElementById('editAvatarBtn').addEventListener('click', () => {
    new bootstrap.Modal(
        document.getElementById('profileImageModal')
    ).show();
});

document.getElementById('profileImageInput').addEventListener('change', e => {
    const file = e.target.files[0];
    const preview = document.getElementById('imagePreview');

    if (!file) return;

    preview.src = URL.createObjectURL(file);
    preview.classList.remove('d-none');
});

document.getElementById('saveProfileImage').addEventListener('click', () => {

    const input = document.getElementById('profileImageInput');
    if (!input.files.length) {
        alert('Please select an image');
        return;
    }

    const formData = new FormData();
    formData.append('profile_image', input.files[0]);

    fetch("{{ route('student.profile.avatar.update') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            document.getElementById('profileAvatar').src = data.image;
            bootstrap.Modal.getInstance(
                document.getElementById('profileImageModal')
            ).hide();
        }
    })
    .catch(() => alert('Image upload failed'));
});
</script>
{{-- <script>
function openPasswordModal() {
    document.getElementById('passwordModal').classList.add('active');
    document.body.classList.add('modal-open');
}

function closePasswordModal() {
    document.getElementById('passwordModal').classList.remove('active');
    document.body.classList.remove('modal-open');
}

/* Submit password form */
document.getElementById('passwordForm').addEventListener('submit', function (e) {
    e.preventDefault();

    if (!$(this).parsley().validate()) return;

    const formData = new FormData(this);
    formData.append('_method', 'PATCH');

    fetch("{{ route('student.password.update') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message || 'Password updated successfully');
        closePasswordModal();
        this.reset();
    })
    .catch(err => {
        if (err.errors) {
            Object.keys(err.errors).forEach(field => {
                document.getElementById(`error-${field}`).innerText = err.errors[field][0];
            });
        } else {
            alert('Failed to update password');
        }
    });
});
</script>
<script>
function openPasswordModal() {
    const modal = document.getElementById('passwordModal');
    modal.classList.add('show');
    document.body.classList.add('modal-open');
}

function closePasswordModal() {
    const modal = document.getElementById('passwordModal');
    modal.classList.remove('show');
    document.body.classList.remove('modal-open');
}
</script> --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('passwordModal');
    const form  = document.getElementById('passwordForm');

    /* OPEN / CLOSE */
    window.openPasswordModal = function () {
        modal.classList.add('show');
        document.body.classList.add('modal-open');
    };

    window.closePasswordModal = function () {
        modal.classList.remove('show');
        document.body.classList.remove('modal-open');
        clearErrors();
        form.reset();
    };

    /* CLEAR ERRORS */
    function clearErrors() {
        document.querySelectorAll('[id^="error-"]').forEach(el => el.innerText = '');
    }

    /* SUBMIT */
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (!$(form).parsley().validate()) return;

        clearErrors();

        fetch("{{ route('student.password.update') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: new FormData(form)
        })
        .then(async res => {
            const data = await res.json();
            if (!res.ok) throw data;
            return data;
        })
        .then(data => {
            alert(data.message);
            closePasswordModal();
        })
        .catch(err => {
            if (err.errors) {
                Object.keys(err.errors).forEach(field => {
                    const el = document.getElementById(`error-${field}`);
                    if (el) el.innerText = err.errors[field][0];
                });
            } else {
                alert('Password update failed');
            }
        });
    });

});
</script>




@endpush
