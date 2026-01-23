 <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <button class="close-sidebar-btn d-md-none" onclick="closeSidebar()">
            <i class="bi bi-x-lg"></i>
        </button>

        <div class="sidebar-header">
            <div class="logo-box"><img src="{{ asset('admin/img/logo.png') }}" alt="logo" width="60px" height="60px"></div>
            <div class="logo-text">
                <p class="text-white ms-3 fs-5">Admin Panel</p>
            </div>
        </div>

        <button class="toggle-btn" onclick="toggleSidebar()">
            <i class="bi bi-chevron-left" id="toggleIcon"></i>
        </button>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i
                    class="bi bi-speedometer2"></i><span>Dashboard</span></a>
            <a href="./students/students-list.html" class="sidebar-link"><i
                    class="bi bi-people"></i><span>Students</span></a>
            <a href="{{ route('admin-courses') }}" class="sidebar-link {{ request()->routeIs('admin-courses') ? 'active' : '' }}"><i
                    class="bi bi-book"></i><span>Courses</span></a>
            <a href="./trainers/trainers-list.html" class="sidebar-link"><i
                    class="bi bi-person-video2"></i><span>Teachers</span></a>
            <a href="./batches/batches-list.html" class="sidebar-link"><i
                    class="bi bi-layers"></i><span>Batches</span></a>
            <a href="./attendance/attendance.html" class="sidebar-link"><i
                    class="bi bi-calendar-check"></i><span>Attendance</span></a>
            <a href="./payment/payments-list.html" class="sidebar-link"><i
                    class="bi bi-credit-card"></i><span>Payments</span></a>
            <a href="././enquiries/enquiries-list.html" class="sidebar-link"><i
                    class="bi bi-chat-left-dots"></i><span>Enquiries</span></a>
            <a href="././certificates/certificates.html" class="sidebar-link"><i
                    class="bi bi-patch-check"></i><span>Certificates</span></a>
            <a href="./reports/reports.html" class="sidebar-link"><i
                    class="fa-regular fa-chart-bar"></i><span>Reports</span></a>
            <a href="././settings/settings.html" class="sidebar-link"><i
                    class="bi bi-gear"></i><span>Settings</span></a>
        </nav>

        <div class="sidebar-footer">
        <a href="#"
        class="sidebar-link"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>

        <form id="logout-form"
            action="{{ route('logout.user') }}"
            method="POST"
            class="d-none">
            @csrf
        </form>
    </div>
    </aside>