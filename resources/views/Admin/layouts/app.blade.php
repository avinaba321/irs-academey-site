<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.header')

<body>
<div class="container-xxl position-relative bg-white d-flex p-0">

    <!-- Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
    </div>

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    <!-- Content -->
    <div class="content">

        {{-- Navbar --}}
        {{-- @include('admin.layouts.navbar') --}}

        {{-- Page Content --}}
        @yield('content')

        {{-- Footer --}}
        @include('admin.layouts.footer')

    </div>
</div>
</body>
</html>
