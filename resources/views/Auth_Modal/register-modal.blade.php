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
                         <select name="role" id="roleSelect" required data-parsley-required-message="Please select a role">
                             <option value="">Select role</option>
                             <option value="0">Admin</option>
                             <option value="1">Teacher</option>
                             <option value="2">Student</option>
                         </select>
                         @error('role')
                             <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <!-- Class Mode (Only for Students) -->
                     <div class="col-md-6" id="classModeContainer" style="display: none;">
                         <label><i class="fa-solid fa-chalkboard"></i> Class Mode *</label>
                         <select name="class_mode" id="classModeSelect">
                             <option value="">Select class mode</option>
                             <option value="0" {{ old('class_mode') == '0' ? 'selected' : '' }}>Online</option>
                             <option value="1" {{ old('class_mode') == '1' ? 'selected' : '' }}>Offline</option>
                         </select>
                         @error('class_mode')
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

         passwordInput.addEventListener('input', function() {
             if (this.value.length > 0) {
                 this.value =
                     this.value.charAt(0).toUpperCase() + this.value.slice(1);
             }
         });
     });
 </script>
 <script>
     document.addEventListener('DOMContentLoaded', () => {
         const roleSelect = document.getElementById('roleSelect');
         const classModeContainer = document.getElementById('classModeContainer');
         const classModeSelect = document.getElementById('classModeSelect');
         const passwordInput = document.getElementById('password');

         // Show/Hide Class Mode based on Role
         if (roleSelect) {
             // Check on page load (for validation errors)
             toggleClassMode();

             roleSelect.addEventListener('change', function() {
                 toggleClassMode();
             });
         }

         function toggleClassMode() {
             const selectedRole = roleSelect.value;

             if (selectedRole === '2') { // Student
                 classModeContainer.style.display = 'block';
                 classModeSelect.setAttribute('required', 'required');
                 classModeSelect.setAttribute('data-parsley-required', 'true');
                 classModeSelect.setAttribute('data-parsley-required-message', 'Please select class mode');
             } else {
                 classModeContainer.style.display = 'none';
                 classModeSelect.removeAttribute('required');
                 classModeSelect.removeAttribute('data-parsley-required');
                 classModeSelect.value = ''; // Reset value
             }

             // Re-initialize Parsley validation if it exists
             if (typeof $ !== 'undefined' && $.fn.parsley) {
                 $('.popup-form').parsley().refresh();
             }
         }

         // Password auto-capitalize first letter
         if (passwordInput) {
             passwordInput.addEventListener('input', function() {
                 if (this.value.length > 0) {
                     this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
                 }
             });
         }
     });
 </script>
 <script>
// Use window.onload as a fallback
window.onload = function() {
    const roleSelect = document.querySelector('select[name="role"]');
    const classModeContainer = document.getElementById('classModeContainer');
    const classModeSelect = document.getElementById('classModeSelect');

    if (!roleSelect) {
        console.error('Role select not found!');
        return;
    }

    function toggleClassMode() {
        const selectedRole = roleSelect.value;
        
        if (selectedRole === '2') {
            classModeContainer.style.display = 'block';
            classModeSelect.required = true;
        } else {
            classModeContainer.style.display = 'none';
            classModeSelect.required = false;
            classModeSelect.value = '';
        }
    }

    // Initial check
    toggleClassMode();

    // Listen for changes
    roleSelect.addEventListener('change', toggleClassMode);

    // Password capitalize
    const passwordInput = document.getElementById('password');
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
            }
        });
    }
};
</script>
