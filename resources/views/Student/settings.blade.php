@extends('Student.layouts.app')
@section('title', 'My Settings | IrsDesign Academy')
@push('styles')
<link rel="stylesheet" href="{{ asset('student/css/settings.css') }}">
@endpush

@section('content')

 <div class="wrap mx-auto">

            <!-- Page Header (center) -->
            <div class="page-head col-12  mx-auto text-left d-flex justify-content-between">
                <div>
                    <h3 class="page-title">Settings</h3>
                    <p class="page-sub">Update your profile, password and preferences.</p>
                </div>

                <button class="btn btn-save">
                    <i class="bi bi-check2-circle me-2"></i> Save Changes
                </button>
            </div>

            <div class="row g-3 justify-content-center">

                <!--  Right Settings (center) -->
                <div class="col-12">
                    <div class="p-card settings-card">

                        <div class="row g-3">
                            <!-- Tabs -->
                            <div class="col-12 col-md-4">
                                <div class="nav nav-pills flex-column" role="tablist">
                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#profileTab"
                                        type="button">
                                        <i class="bi bi-person-fill me-2"></i> Profile
                                    </button>

                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#passwordTab"
                                        type="button">
                                        <i class="bi bi-shield-lock-fill me-2"></i> Password
                                    </button>

                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#notifyTab"
                                        type="button">
                                        <i class="bi bi-bell-fill me-2"></i> Notifications
                                    </button>

                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#dangerTab"
                                        type="button">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Danger Zone
                                    </button>
                                </div>
                            </div>

                            <!-- Tab Content -->
                            <div class="col-12 col-md-8">
                                <div class="tab-content">

                                    <!--  Profile -->
                                    <div class="tab-pane fade show active" id="profileTab">
                                        <h6 class="fw-bold mb-3">Update Profile</h6>

                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Full Name</label>
                                                <input class="form-control" value="MRINAL KANTI DINDA" />
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" value="mkdinda123@gmail.com" />
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <label class="form-label">Contact</label>
                                                <input class="form-control" value="+91 9932980522" />
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select">
                                                    <option selected>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <label class="form-label">Blood Group</label>
                                                <select class="form-select">
                                                    <option selected>AB+</option>
                                                    <option>A+</option>
                                                    <option>B+</option>
                                                    <option>O+</option>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-save w-100">
                                                    <i class="bi bi-cloud-check-fill me-2"></i> Update Profile
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  Password -->
                                    <div class="tab-pane fade" id="passwordTab">
                                        <h6 class="fw-bold mb-3">Change Password</h6>

                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Current Password</label>
                                                <input type="password" class="form-control"
                                                    placeholder="Enter current password" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">New Password</label>
                                                <input type="password" class="form-control"
                                                    placeholder="Enter new password" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control"
                                                    placeholder="Re-enter new password" />
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-save w-100">
                                                    <i class="bi bi-shield-check me-2"></i> Update Password
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  Notifications -->
                                    <div class="tab-pane fade" id="notifyTab">
                                        <h6 class="fw-bold mb-3">Notification Preferences</h6>

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <div class="fw-bold" style="font-size:13px;">Email Notifications</div>
                                                <div class="text-white-50" style="font-size:12px;">
                                                    Updates about course & payments
                                                </div>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <div class="fw-bold" style="font-size:13px;">SMS Notifications</div>
                                                <div class="text-white-50" style="font-size:12px;">OTP + urgent alerts
                                                </div>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="fw-bold" style="font-size:13px;">Query Notifications</div>
                                                <div class="text-white-50" style="font-size:12px;">When faculty replies
                                                </div>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Danger Zone -->
                                    <div class="tab-pane fade" id="dangerTab">
                                        <h6 class="fw-bold mb-3">Danger Zone</h6>

                                        <div class="danger-box">
                                            <div class="fw-bold mb-1">Delete Account</div>
                                            <div class="text-white-50" style="font-size:12px;">
                                                This action cannot be undone. Your student data will be removed
                                                permanently.
                                            </div>

                                            <button class="btn btn-danger-soft w-100 mt-3">
                                                <i class="bi bi-trash-fill me-2"></i> Delete My Account
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

@endsection