@extends('Student.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/myProfile.css') }}">
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
                        <div class="avatar-wrap">
                            <img src="https://images.pexels.com/photos/2379005/pexels-photo-2379005.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                alt="profile" />
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

                            <button class="btn btn-soft w-100">
                                <i class="bi bi-key me-2"></i> Change Password
                            </button>
                        </div>
                    </div>
                </div>

                <!--  RIGHT SIDE INFO GRID -->
                <div class="col-lg-8 info-side">

                    <div class="side-title">
                        <h5><i class="bi bi-person-lines-fill me-2"></i> Student Details</h5>
                        <span>Last updated: 10 Jan 2026</span>
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
                    <i class="bi bi-person-gear me-2"></i> Edit Profile
                </h5>

                <button class="closeEdit" id="closeEdit">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <!-- Body -->
            {{-- <div class="editBody">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>

                        <input type="text" class="form-control premium-input @error('full_name') is-invalid @enderror"
                            name="full_name" id="editName" value="{{ old('full_name', $student->full_name) }}" required
                            data-parsley-required-message="Full name is required">

                        <!-- AJAX error -->
                        <div class="invalid-feedback"></div>

                        <!-- Laravel fallback error -->
                        @error('full_name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control premium-input" name="email" id="editEmail"
                            value="{{ $student->email }}" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Contact Number</label>
                        <input type="text" class="form-control premium-input" name="phone_number" id="editPhone"
                            value="{{ $student->phone_number }}" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control premium-input" name="dob" id="editDob"
                            value="{{ $student->dob }}" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select premium-input" name="gender">
                            <option value="">Select a Gender</option>
                            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>MALE</option>
                            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>FEMALE</option>
                            <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>OTHER</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Qualification</label>
                        <select class="form-select premium-input" name="last_qualification">
                            <option value="">Select Last Qualification</option>

                            <option value="HS" {{ $student->last_qualification === 'HS' ? 'selected' : '' }}>
                                HS
                            </option>

                            <option value="GRADUATE" {{ $student->last_qualification === 'GRADUATE' ? 'selected' : '' }}>
                                Graduate
                            </option>

                            <option value="DIPLOMA" {{ $student->last_qualification === 'DIPLOMA' ? 'selected' : '' }}>
                                Diploma
                            </option>

                            <option value="POST_GRADUATE"
                                {{ $student->last_qualification === 'POST_GRADUATE' ? 'selected' : '' }}>
                                Post Graduate
                            </option>

                            <option value="OTHER" {{ $student->last_qualification === 'OTHER' ? 'selected' : '' }}>
                                Others
                            </option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Guardian Name</label>
                        <input type="text" class="form-control premium-input" name="guardian_name" id="editGuardian"
                            value="{{ $student->guardian_name }}" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Guardian Mobile</label>
                        <input type="text" class="form-control premium-input" name="guardian_mobile"
                            id="editGuardianPhone" value="{{ $student->guardian_mobile }}" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control premium-input" name="address" id="editAddress"
                            value="{{ $student->address }}" />
                    </div>

                </div>

                <!-- Buttons -->
                <div class="editActions mt-4">
                    <button class="btnCancel" id="cancelEdit">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </button>

                    <button type="button" class="btnSave" id="saveEdit">
                        <i class="bi bi-check-circle me-1"></i> Save Changes
                    </button>
                </div>
            </div> --}}
            <!-- Body -->
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
                                <option value="MALE" {{ old('gender', $student->gender) == 'MALE' ? 'selected' : '' }}>
                                    MALE</option>
                                <option value="FEMALE"
                                    {{ old('gender', $student->gender) == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
                                <option value="OTHER" {{ old('gender', $student->gender) == 'OTHER' ? 'selected' : '' }}>
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
                                    {{ old('last_qualification', $student->last_qualification) === 'POST_GRADUATE' ? 'selected' : '' }}>
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
@endsection

@push('scripts')
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
        const editBtn = document.getElementById("editBtn");
        const editModal = document.getElementById("editModal");
        const editOverlay = document.getElementById("editOverlay");
        const closeEdit = document.getElementById("closeEdit");
        const cancelEdit = document.getElementById("cancelEdit");

        function openEdit() {
            editModal.classList.add("show");
        }

        function closeModal() {
            editModal.classList.remove("show");
        }

        editBtn?.addEventListener("click", openEdit);
        closeEdit?.addEventListener("click", closeModal);
        cancelEdit?.addEventListener("click", closeModal);
        editOverlay?.addEventListener("click", closeModal);

        // ESC close
        window.addEventListener("keydown", (e) => {
            if (e.key === "Escape") closeModal();
        });

        //  Save button demo
        document.getElementById("saveEdit")?.addEventListener("click", () => {
            alert("Profile Updated Successfully ");
            closeModal();
        });
    </script>

    {{-- <script>
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('saveEdit').addEventListener('click', function () {

        const formData = new FormData();

        formData.append('full_name', document.getElementById('editName').value);
        formData.append('email', document.getElementById('editEmail').value);
        formData.append('phone_number', document.getElementById('editPhone').value);
        formData.append('dob', document.getElementById('editDob').value);
        formData.append('guardian_name', document.getElementById('editGuardian').value);
        formData.append('guardian_mobile', document.getElementById('editGuardianPhone').value);
        formData.append('address', document.getElementById('editAddress').value);

        document.querySelectorAll('select[name]').forEach(select => {
            formData.append(select.name, select.value);
        });

        fetch("{{ route('student.profile.update') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            },
            body: formData
        })
        .then(async response => {
            const data = await response.json();
            if (!response.ok) throw data;
            return data;
        })
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            if (error.errors) {
                alert(Object.values(error.errors)[0][0]);
            } else {
                alert('Update failed. Please try again.');
            }
            console.error(error);
        });
    });

});
</script> --}}

    {{-- <script>
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('saveEdit').addEventListener('click', function () {

        const formData = new FormData();

        formData.append('full_name', document.getElementById('editName').value);
        formData.append('email', document.getElementById('editEmail').value);
        formData.append('phone_number', document.getElementById('editPhone').value);
        formData.append('dob', document.getElementById('editDob').value);
        formData.append('guardian_name', document.getElementById('editGuardian').value);
        formData.append('guardian_mobile', document.getElementById('editGuardianPhone').value);
        formData.append('address', document.getElementById('editAddress').value);

        // Add the select fields by name attribute
        formData.append('gender', document.querySelector('select[name="gender"]').value);
        formData.append('last_qualification', document.querySelector('select[name="last_qualification"]').value);

        fetch("{{ route('student.profile.update') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            },
            body: formData
        })
        .then(async response => {
            const data = await response.json();
            if (!response.ok) throw data;
            return data;
        })
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            if (error.errors) {
                alert(Object.values(error.errors)[0][0]);
            } else {
                alert('Update failed. Please try again.');
            }
            console.error(error);
        });
    });

});
</script> --}}

    {{-- <script>
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('saveEdit').addEventListener('click', function () {
        console.log('Save button clicked');

        const formData = new FormData();

        formData.append('full_name', document.getElementById('editName').value);
        formData.append('email', document.getElementById('editEmail').value);
        formData.append('phone_number', document.getElementById('editPhone').value);
        formData.append('dob', document.getElementById('editDob').value);
        formData.append('gender', document.querySelector('select[name="gender"]').value);
        formData.append('last_qualification', document.querySelector('select[name="last_qualification"]').value);
        formData.append('guardian_name', document.getElementById('editGuardian').value);
        formData.append('guardian_mobile', document.getElementById('editGuardianPhone').value);
        formData.append('address', document.getElementById('editAddress').value);

        // Log all form data
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        fetch("{{ route('student.profile.update') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            },
            body: formData
        })
        .then(async response => {
            console.log('Response status:', response.status);
            const data = await response.json();
            console.log('Response data:', data);
            if (!response.ok) throw data;
            return data;
        })
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            console.error('Error caught:', error);
            if (error.errors) {
                alert(Object.values(error.errors)[0][0]);
            } else if (error.message) {
                alert(error.message);
            } else {
                alert('Update failed. Please try again.');
            }
        });
    });

});
</script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('saveEdit').addEventListener('click', function() {
                console.log('Save button clicked');

                const formData = new FormData();

                formData.append('_method', 'PATCH'); // Add this line for Laravel method spoofing

                formData.append('full_name', document.getElementById('editName').value);
                formData.append('email', document.getElementById('editEmail').value);
                formData.append('phone_number', document.getElementById('editPhone').value);
                formData.append('dob', document.getElementById('editDob').value);
                formData.append('gender', document.querySelector('select[name="gender"]').value);
                formData.append('last_qualification', document.querySelector(
                    'select[name="last_qualification"]').value);
                formData.append('guardian_name', document.getElementById('editGuardian').value);
                formData.append('guardian_mobile', document.getElementById('editGuardianPhone').value);
                formData.append('address', document.getElementById('editAddress').value);

                fetch("{{ route('student.profile.update') }}", {
                        method: "POST", // Keep as POST
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        },
                        body: formData
                    })
                    .then(async response => {
                        const data = await response.json();
                        if (!response.ok) throw data;
                        return data;
                    })
                    .then(data => {
                        alert(data.message);
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error caught:', error);
                        if (error.errors) {
                            alert(Object.values(error.errors)[0][0]);
                        } else if (error.message) {
                            alert(error.message);
                        } else {
                            alert('Update failed. Please try again.');
                        }
                    });
            });

        });
    </script>
@endpush
