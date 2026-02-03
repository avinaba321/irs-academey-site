<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Student Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">


    <!-- custom css lihk -->
    <link rel="stylesheet" href="{{ asset('student/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('student/css/dashboard.css') }}">
    <style>
        .avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    overflow: hidden;
    background: #f1f1f1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.avatar-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

    </style>
    @stack('styles')
</head>
<body>
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>
    @include('Student.layouts.sidebar')
    
    @include('Student.layouts.header')
      {{-- Main Content --}}
    <main class="main-content">
        @yield('content')
    </main>
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Add these before Parsley -->
    <!-- main js link -->
<script src="{{ asset('student/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
