     <!-- Login Modal -->
     <div class="modal fade" id="loginPopup" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered  modal-md">
             <div class="modal-content popup-box">

                 <!-- Close Button -->
                 <button type="button" class="btn-close popup-close" data-bs-dismiss="modal"></button>

                 @if ($errors->has('email') || $errors->has('password'))
                     <div class="auth-error">
                         <span class="auth-error-text text-danger">
                             {{ $errors->first() }}
                         </span>

                         <button type="button" class="auth-error-close" aria-label="Close">
                             &times;
                         </button>
                     </div>
                 @endif

                 <div class="popup-header">
                     <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                     <p>Login to your account</p>
                 </div>

                 <form class="popup-form" method="POST" action="{{ route('login.submit') }}" data-parsley-validate>
                     @csrf

                     <div class="row g-4">

                         <!-- Email -->
                         <div class="col-md-12">
                             <label><i class="fa-solid fa-envelope"></i> Email Address *</label>
                             <input type="email" name="email" placeholder="Email Address"
                                 data-parsley-type-message="Enter a valid email address"
                                 data-parsley-required-message="Email address is required" required>

                         </div>

                         <!-- Password -->
                         <div class="col-md-12">
                             <label><i class="fa-solid fa-lock"></i> Password *</label>

                             <div class="password-wrapper">
                                 <input type="password" id="login_password" name="password" placeholder="Password"
                                     required data-parsley-minlength="8"
                                     data-parsley-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&])[A-Za-z0-9!@#$%&]{8,}$"
                                     data-parsley-pattern-message="Password must include uppercase, lowercase, number & special character"
                                     data-parsley-minlength-message="Password must be at least 8 characters"
                                     data-parsley-required-message="Password is required">

                                 <span class="toggle-password-login" data-target="login_password">
                                     <i class="fa-solid fa-eye"></i>
                                 </span>
                             </div>
                         </div>

                     </div>

                     <div class="text-center mt-3">
                         <button type="submit" class="submit-btn mt-4">
                             LOGIN
                         </button>
                         <p class="mb-0 mt-2">
                             Don’t have an account?
                             <a href="javascript:void(0);" id="openRegisterModal">
                                 Register here
                             </a>
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

             passwordInput.addEventListener('input', function() {
                 if (this.value.length > 0) {
                     this.value =
                         this.value.charAt(0).toUpperCase() + this.value.slice(1);
                 }
             });
         });
     </script>
