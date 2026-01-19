
@php
    $student = Auth::guard('student')->user();
@endphp
  <!-- NAVBAR -->
    <header class="navbar-custom d-flex align-items-center justify-content-between">

        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-light d-md-none bg-warning text-white fs-6" onclick="toggleSidebar()">
                <i class="bi bi-list" id="toggleIcon"></i>
            </button>
            <h5 class="mb-0 fw-semibold">Dashboard</h5>
        </div>

        <div class="d-flex align-items-center gap-3">

            <!--==================== Bell Icon ==================-->
            <div class="dropdown text-end">
                <div class="notification-bell" data-bs-toggle="dropdown">
                    <i class="bi bi-bell fs-4 text-dark"></i>
                    <span class="notify-dot"></span>
                </div>

                <!-- Dropdown notification -->
                <div class="dropdown-menu text-dark dropdown-menu-end dropdown-menu-notify">

                    <div class="notify-header">
                        Notifications
                    </div>

                    <div style="max-height: 280px; overflow-y: auto;">
                        <div class="notify-item">
                            <div class="notify-avatar">RK</div>
                            <div>
                                <div><strong>Rahul Kumar</strong> enrolled in Full Stack</div>
                                <div class="notify-time">2 min ago</div>
                            </div>
                        </div>

                        <div class="notify-item">
                            <div class="notify-avatar">PS</div>
                            <div>
                                <div><strong>Priya Sharma</strong> made a payment</div>
                                <div class="notify-time">1 hour ago</div>
                            </div>
                        </div>

                        <div class="notify-item">
                            <div class="notify-avatar">AS</div>
                            <div>
                                <div><strong>Amit Singh</strong> sent a message</div>
                                <div class="notify-time">Yesterday</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-light d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                    <div class="avatar">{{ strtoupper(substr($student->full_name ?? 'S', 0, 1)) }}</div>
                    <span class="d-none d-md-inline"> {{ $student->full_name ?? 'Student' }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="./settings/settings.html" class="dropdown-item">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger">Logout</a></li>
                </ul>
            </div>
        </div>

    </header>