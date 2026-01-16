 <!-- SIDEBAR -->
 <aside class="sidebar" id="sidebar">
     <button class="close-sidebar-btn d-md-none" onclick="closeSidebar()">
         <i class="bi bi-x-lg"></i>
     </button>

     <div class="sidebar-header">
         <div class="logo-box"><img src="{{ asset('student/img/logo.png') }}" alt="logo" width="60px" height="60px">
         </div>
         <!-- <div class="logo-text">
                <p class="text-white ms-3 fs-5">Admin Panel</p>
            </div> -->
     </div>

     <button class="toggle-btn" onclick="toggleSidebar()">
         <i class="bi bi-chevron-left" id="toggleIcon"></i>
     </button>

     {{-- <nav class="sidebar-nav">
            <a href="./dashboard.html" class="sidebar-link active"><i
                    class="bi bi-speedometer2"></i><span>Dashboard</span></a>
            <a href="{{ route('my-profile') }}" class="sidebar-link"><i class="bi bi-people"></i><span>My
                    Profile</span></a>
            <a href="{{ route('all-courses') }}" class="sidebar-link"><i class="fa-regular fa-chart-bar"></i><span>
                    All Courses</span></a>
            <a href="{{ route('my-courses') }}" class="sidebar-link"><i class="bi bi-book"></i><span>
                    MyCourses</span></a>
            <a href="{{ route('course-material') }}" class="sidebar-link"><i class="bi bi-book"></i><span>
                    Course Materials</span></a>
            <a href="{{ route('batches') }}" class="sidebar-link"><i class="bi bi-layers"></i><span>Batches</span></a>
            <a href="{{ route('payments') }}" class="sidebar-link"><i
                    class="bi bi-credit-card"></i><span>Payments</span></a>
            <a href="{{ route('queries') }}" class="sidebar-link"><i
                    class="bi bi-chat-left-dots"></i><span>Enquiries</span></a>
            <a href="{{ route('certificate') }}" class="sidebar-link"><i
                    class="bi bi-patch-check"></i><span>Certificates</span></a>
            <a href="{{ route('settings') }}" class="sidebar-link"><i class="bi bi-gear"></i><span>Settings</span></a>
        </nav> --}}

     <nav class="sidebar-nav">

         <a href="{{ route('student.dashboard') }}" class="sidebar-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
             <i class="bi bi-speedometer2"></i>
             <span>Dashboard</span>
         </a>

         <a href="{{ route('my-profile') }}"
             class="sidebar-link {{ request()->routeIs('my-profile') ? 'active' : '' }}">
             <i class="bi bi-people"></i>
             <span>My Profile</span>
         </a>

         <a href="{{ route('all-courses') }}"
             class="sidebar-link {{ request()->routeIs('all-courses') ? 'active' : '' }}">
             <i class="fa-regular fa-chart-bar"></i>
             <span>All Courses</span>
         </a>

         <a href="{{ route('my-courses') }}"
             class="sidebar-link {{ request()->routeIs('my-courses') ? 'active' : '' }}">
             <i class="bi bi-book"></i>
             <span>My Courses</span>
         </a>

         <a href="{{ route('course-material') }}"
             class="sidebar-link {{ request()->routeIs('course-material') ? 'active' : '' }}">
             <i class="bi bi-book"></i>
             <span>Course Materials</span>
         </a>

         <a href="{{ route('batches') }}" class="sidebar-link {{ request()->routeIs('batches') ? 'active' : '' }}">
             <i class="bi bi-layers"></i>
             <span>Batches</span>
         </a>

         <a href="{{ route('payments') }}" class="sidebar-link {{ request()->routeIs('payments') ? 'active' : '' }}">
             <i class="bi bi-credit-card"></i>
             <span>Payments</span>
         </a>

         <a href="{{ route('queries') }}" class="sidebar-link {{ request()->routeIs('queries') ? 'active' : '' }}">
             <i class="bi bi-chat-left-dots"></i>
             <span>Enquiries</span>
         </a>

         <a href="{{ route('certificate') }}"
             class="sidebar-link {{ request()->routeIs('certificate') ? 'active' : '' }}">
             <i class="bi bi-patch-check"></i>
             <span>Certificates</span>
         </a>

         <a href="{{ route('settings') }}" class="sidebar-link {{ request()->routeIs('settings') ? 'active' : '' }}">
             <i class="bi bi-gear"></i>
             <span>Settings</span>
         </a>

     </nav>


     <div class="sidebar-footer">
         <a class="sidebar-link"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a>
     </div>
 </aside>
