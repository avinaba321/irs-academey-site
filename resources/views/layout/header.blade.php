{{-- <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="academy-logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                    href="{{ route('about') }}">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courses*') ? 'active' : '' }}"
                    href="{{ route('courses') }}">Courses</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('placement') ? 'active' : '' }}"
                    href="{{ route('placement') }}">Placement</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blogs*') ? 'active' : '' }}"
                    href="{{ route('blogs') }}">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}"
                    href="{{ route('gallery') }}">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                    href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>


                <form class="d-flex" role="search">
                    <input class="form-control border-warning border-2 me-2" type="search" placeholder="Search">
                    <button class="btn nav-btn btn-outline-success">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header> --}}


{{-----------------new code--------------------------------- --}}
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="academy-logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                    href="{{ route('about') }}">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courses*') ? 'active' : '' }}"
                    href="{{ route('courses') }}">Courses</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('placement') ? 'active' : '' }}"
                    href="{{ route('placement') }}">Placement</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blogs*') ? 'active' : '' }}"
                    href="{{ route('blogs') }}">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}"
                    href="{{ route('gallery') }}">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                    href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>


                {{-- <form class="d-flex" role="search" id="navbar-form">
                    <input class="form-control border-warning border border-2 me-2" type="search"
                     placeholder="Search" aria-label="Search"/>
                    <button class="btn nav-btn btn-outline-success" type="submit">Search</button>
                </form> --}}
               {{-- <div class="header-cta">
                    <a href="#enroll" class="btn btn-enroll glow-animate">Enroll Now</a>
                </div>
                <div class="header-cta">
                    <a href="#enroll" class="btn btn-enroll glow-animate">Enroll Now</a>
                </div> --}}
                <div class="header-cta">
                    <a href="javascript:void(0);"
                    class="btn btn-login glow-animate"
                    data-bs-toggle="modal"
                    data-bs-target="#loginPopup">
                    Login
                    </a>

                    <a href="javascript:void(0);" class="btn btn-register glow-animate" data-bs-toggle="modal" data-bs-target="#enrollPopup">Register</a>
                </div>
                    
            </div>
        </div>
    </nav>
</header>
