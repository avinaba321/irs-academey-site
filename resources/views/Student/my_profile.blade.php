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

                            <div class="profile-name">SUMON MAITY</div>
                            <div class="profile-sub">Student UID : IRS-PL27062400820</div>

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
                                    <div class="info-value">SUMON MAITY</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="SUMON MAITY">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-envelope-fill"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">Email</div>
                                    <div class="info-value">sumon123@gmail.com</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="sumon123@gmail.com">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-calendar2-week-fill"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">Date of Birth</div>
                                    <div class="info-value">09/11/1999</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="09/11/1999">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-telephone-fill"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">Contact Number</div>
                                    <div class="info-value">+91 9932980826</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="+91 9932980826">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-whatsapp"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">WhatsApp</div>
                                    <div class="info-value">+91 9932980826</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="+91 9932980826">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-gender-ambiguous"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">Gender</div>
                                    <div class="info-value">MALE</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="MALE">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-droplet-half"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">Blood Group</div>
                                    <div class="info-value">AB+</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="AB+">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-people-fill"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">Guardian Name</div>
                                    <div class="info-value">Sudharsan Maity</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="Manas Dinda">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-telephone-plus-fill"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">Guardian Mobile</div>
                                    <div class="info-value">+91 9593039827</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="+91 9593039785">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                            <div class="info-box">
                                <div class="info-icn"><i class="bi bi-geo-alt-fill"></i></div>
                                <div class="info-meta">
                                    <div class="info-label">Address</div>
                                    <div class="info-value">Kolkata, Kolkata, SDF-700001</div>
                                </div>
                                <button class="copy-btn" type="button" data-copy="Kolkata, Kolkata, SDF-700001">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

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
            <div class="editBody">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control premium-input" id="editName" value="SUMON MAITY" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control premium-input" id="editEmail"
                            value="sumon123@gmail.com" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Contact Number</label>
                        <input type="text" class="form-control premium-input" id="editPhone" value="+91 9932980826" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">WhatsApp</label>
                        <input type="text" class="form-control premium-input" id="editWhatsapp"
                            value="+91 9932980826" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control premium-input" id="editDob" value="1999-11-09" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select premium-input" id="editGender">
                            <option selected>MALE</option>
                            <option>FEMALE</option>
                            <option>OTHER</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Blood Group</label>
                        <select class="form-select premium-input" id="editBlood">
                            <option selected>AB+</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>O+</option>
                            <option>O-</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Guardian Name</label>
                        <input type="text" class="form-control premium-input" id="editGuardian"
                            value="Sudharsan Maity" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Guardian Mobile</label>
                        <input type="text" class="form-control premium-input" id="editGuardianPhone"
                            value="+91 9593039827" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control premium-input" id="editAddress"
                            value="Kolkata, Kolkata, SDF-70..." />
                    </div>

                </div>

                <!-- Buttons -->
                <div class="editActions mt-4">
                    <button class="btnCancel" id="cancelEdit">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </button>

                    <button class="btnSave" id="saveEdit">
                        <i class="bi bi-check-circle me-1"></i> Save Changes
                    </button>
                </div>
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
@endpush