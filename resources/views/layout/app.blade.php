<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Digital Marketing Course in Kolkata | IRS Design Academy')</title>
    <meta name="description" content="Join IRS Design Academy for a digital marketing course in Kolkata with practical training, expert mentors & career support. Start your success today.">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/popup.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
</head>

<body>

    {{-- Header --}}
    @include('layout.header')

    {{-- Page Content --}}
    <main>
        @yield('content')
        {{-- Auth Modals --}}
        @include('Auth_Modal.register-modal')
        @include('Auth_Modal.login-modal')
    </main>

    {{-- Footer --}}
    @include('layout.footer')

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    {{-- @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var enrollModal = new bootstrap.Modal(document.getElementById('enrollPopup'));
                enrollModal.show();
            });
        </script>
    @endif

        @if ($errors->any() && session('login_error'))
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        new bootstrap.Modal(document.getElementById('loginPopup')).show();
    });
    </script>
    @endif --}}

    {{-- @if ($errors->any())
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        // Close any open modal first
        document.querySelectorAll('.modal.show').forEach(m => {
            bootstrap.Modal.getInstance(m)?.hide();
        });

        @if (session('login_error'))
            new bootstrap.Modal(document.getElementById('loginPopup')).show();
        @else
            new bootstrap.Modal(document.getElementById('enrollPopup')).show();
        @endif

    });
    </script>
    @endif --}}

    {{-- @if ($errors->any() && (session('login_error') || session('role')))
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Close any open modal first
    document.querySelectorAll('.modal.show').forEach(m => {
        bootstrap.Modal.getInstance(m)?.hide();
    });

    @if (session('login_error'))
        new bootstrap.Modal(document.getElementById('loginPopup')).show();
    @elseif (session('role'))
        new bootstrap.Modal(document.getElementById('enrollPopup')).show();
    @endif

});
</script> --}}
@if ($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Close any open modals first
    document.querySelectorAll('.modal.show').forEach(m => {
        bootstrap.Modal.getInstance(m)?.hide();
    });

    @if (session('login_error'))
        new bootstrap.Modal(document.getElementById('loginPopup')).show();
    @elseif (session('register_error'))
        new bootstrap.Modal(document.getElementById('enrollPopup')).show();
    @endif

});
</script>
@endif
    <script>
        $(function() {
            $('#full_name').on('input', function() {
                let value = $(this).val();

                // Remove non-letter and non-space characters
                value = value.replace(/[^A-Za-z ]/g, '');

                // Remove leading spaces
                value = value.replace(/^\s+/g, '');

                // Replace multiple spaces with single space
                value = value.replace(/\s{2,}/g, ' ');

                // Capitalize first letter of each word
                value = value.replace(/\b\w/g, function(char) {
                    return char.toUpperCase();
                });

                $(this).val(value);
            });
        });
    </script>
  {{-- <script>
document.addEventListener('DOMContentLoaded', function () {

    const registerEl = document.getElementById('enrollPopup');
    const loginEl = document.getElementById('loginPopup');

    const registerModal = new bootstrap.Modal(registerEl);
    const loginModal = new bootstrap.Modal(loginEl);

    // Open Login Modal
    document.getElementById('openLoginModal')?.addEventListener('click', function () {
        registerModal.hide();
        setTimeout(() => {
            loginModal.show();
        }, 300);
    });

    // Open Register Modal
    document.getElementById('openRegisterModal')?.addEventListener('click', function () {
        loginModal.hide();
        setTimeout(() => {
            registerModal.show();
        }, 300);
    });

});
</script> --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    function switchModal(hideId, showId) {
        const hideEl = document.getElementById(hideId);
        const showEl = document.getElementById(showId);

        const hideModal = bootstrap.Modal.getInstance(hideEl);
        if (hideModal) {
            hideModal.hide();
        }

        // Wait for hide animation to finish
        setTimeout(() => {
            new bootstrap.Modal(showEl, {
                backdrop: 'static',
                keyboard: false
            }).show();
        }, 350);
    }

    // Login → Register
    document.getElementById('openRegisterModal')?.addEventListener('click', function () {
        switchModal('loginPopup', 'enrollPopup');
    });

    // Register → Login
    document.getElementById('openLoginModal')?.addEventListener('click', function () {
        switchModal('enrollPopup', 'loginPopup');
    });

});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll(
        '.toggle-password-login, .toggle-password-register'
    ).forEach(function (toggle) {

        toggle.addEventListener('click', function () {

            const targetId = this.dataset.target;
            const input = document.getElementById(targetId);
            const icon = this.querySelector('i');

            if (!input) return;

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });

    });

});
</script>

<script>
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('auth-error-close')) {
        e.target.closest('.auth-error').style.display = 'none';
    }
});
</script>



</body>

</html>
