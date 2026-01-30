 <div class="modal fade" id="enrollPopup" tabindex="-1">
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
                                <input type="email" name="reg_email" placeholder="Email Address" required
                                    data-parsley-type-message="Enter a valid email address"
                                    data-parsley-required-message="Email address is required">
                                @error('reg_email')
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

                                <span class="toggle-password-register" data-target="password">
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

                                <span class="toggle-password-register" data-target="password_confirmation">
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
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const passwordInput = document.getElementById('password');

            if (!passwordInput) return;

            passwordInput.addEventListener('input', function () {
                if (this.value.length > 0) {
                    this.value =
                        this.value.charAt(0).toUpperCase() + this.value.slice(1);
                }
            });
        });
    </script>
