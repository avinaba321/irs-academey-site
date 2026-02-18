<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">


    <!-- custom css lihk -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dashboard.css') }}">  
    <style>
.notification-bell {
    position: relative;
    cursor: pointer;
    padding: 8px;
    border-radius: 50%;
    transition: background 0.3s;
}

.notification-bell:hover {
    background: rgba(0,0,0,0.05);
}

.notify-dot {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 10px;
    height: 10px;
    background: #ef4444;
    border-radius: 50%;
    border: 2px solid #fff;
    animation: pulse 2s infinite;
}

.notify-count {
    position: absolute;
    top: 2px;
    right: 2px;
    background: #ef4444;
    color: #fff;
    font-size: 10px;
    font-weight: 600;
    padding: 2px 6px;
    border-radius: 10px;
    min-width: 18px;
    text-align: center;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.dropdown-menu-notify {
    width: 380px;
    max-width: 90vw;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    border: none;
    border-radius: 12px;
    padding: 0;
}

.notify-header {
    padding: 15px 20px;
    border-bottom: 1px solid #e5e7eb;
    font-weight: 600;
    font-size: 16px;
    background: #f9fafb;
    border-radius: 12px 12px 0 0;
}

.notify-item {
    padding: 15px 20px;
    border-bottom: 1px solid #f3f4f6;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    gap: 12px;
    position: relative;
}

.notify-item:hover {
    background: #f9fafb;
}

.notify-item.unread {
    background: #eff6ff;
    border-left: 3px solid #3b82f6;
}

.notify-avatar {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 16px;
    flex-shrink: 0;
}

.notify-content {
    flex: 1;
    min-width: 0;
}

.notify-title {
    font-weight: 600;
    color: #1f2937;
    font-size: 14px;
    margin-bottom: 4px;
}

.notify-message {
    color: #6b7280;
    font-size: 13px;
    line-height: 1.4;
    margin-bottom: 5px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.notify-time {
    color: #9ca3af;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.notify-footer {
    padding: 12px 20px;
    border-top: 1px solid #e5e7eb;
    background: #f9fafb;
    border-radius: 0 0 12px 12px;
}

.no-notifications {
    text-align: center;
    padding: 40px 20px;
    color: #9ca3af;
}

.no-notifications i {
    font-size: 48px;
    margin-bottom: 10px;
    color: #d1d5db;
}

.notify-delete {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0;
    transition: opacity 0.2s;
    background: #fee2e2;
    border: none;
    width: 28px;
    height: 28px;
    border-radius: 6px;
    color: #ef4444;
    cursor: pointer;
}

.notify-item:hover .notify-delete {
    opacity: 1;
}
</style> 
    @stack('styles')
</head>

<body>

    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    @include('Admin.layouts.sidebar')
    
    @include('Admin.layouts.header')
      {{-- Main Content --}}
    <main class="main-content">
        @yield('content')
    </main>
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- main js link -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
 <script>
document.addEventListener('DOMContentLoaded', function () {
    loadAdminNotificationCount();
});

// ✅ Load count
function loadAdminNotificationCount() {
    fetch('{{ route("admin.notifications.count") }}')
        .then(res => res.json())
        .then(data => {
            const count  = data.count;
            const dot    = document.getElementById('adminNotifyDot');
            const badge  = document.getElementById('adminNotifyCount');

            if (count > 0) {
                dot.style.display   = 'block';
                badge.style.display = 'block';
                badge.textContent   = count > 99 ? '99+' : count;
            } else {
                dot.style.display   = 'none';
                badge.style.display = 'none';
            }
        })
        .catch(err => console.error('Error loading admin notification count:', err));
}

// ✅ Load notifications list
function loadAdminNotifications() {
    fetch('{{ route("admin.notifications.index") }}')
        .then(res => res.json())
        .then(data => {
            const list  = document.getElementById('adminNotificationList');
            const total = document.getElementById('adminTotalNotifications');
            const markAllBtn = document.getElementById('adminMarkAllBtn');

            if (!data.data || data.data.length === 0) {
                list.innerHTML = `
                    <div class="no-notifications">
                        <i class="bi bi-bell-slash"></i>
                        <p class="mb-0 mt-2">No notifications yet</p>
                    </div>`;
                total.textContent = '0 notifications';
                markAllBtn.style.display = 'none';
                return;
            }

            total.textContent = `${data.data.length} notification${data.data.length > 1 ? 's' : ''}`;

            const hasUnread = data.data.some(n => !n.is_read);
            markAllBtn.style.display = hasUnread ? 'block' : 'none';

            list.innerHTML = data.data.map(notif => adminNotificationHTML(notif)).join('');
        })
        .catch(err => {
            console.error('Error loading admin notifications:', err);
            document.getElementById('adminNotificationList').innerHTML = `
                <div class="no-notifications">
                    <i class="bi bi-exclamation-circle"></i>
                    <p class="mb-0">Failed to load notifications</p>
                </div>`;
        });
}

// ✅ Create HTML for each notification
function adminNotificationHTML(notif) {
    const iconMap = {
        'new_query'         : 'bi-question-circle-fill',
        'material_uploaded' : 'bi-file-earmark-text-fill',
        'payment'           : 'bi-credit-card-fill',
        'new_student'       : 'bi-person-plus-fill',
    };

    const icon   = iconMap[notif.type] || 'bi-bell-fill';
    const avatar = notif.student
        ? (notif.student.full_name || notif.student.name || 'ST').substring(0, 2).toUpperCase()
        : 'AD';

    return `
        <div class="notify-item ${notif.is_read ? '' : 'unread'}"
             onclick="adminHandleClick(${notif.id}, '${notif.type}')">
            <div class="notify-avatar">
                ${escapeHtml(avatar)}
            </div>
            <div class="notify-content">
                <div class="notify-title">${escapeHtml(notif.title)}</div>
                <div class="notify-message">${escapeHtml(notif.message)}</div>
                <div class="notify-time">
                    <i class="bi bi-clock"></i>
                    ${formatTime(notif.created_at)}
                </div>
            </div>
            <button class="notify-delete"
                    onclick="event.stopPropagation(); adminDeleteNotification(${notif.id})">
                <i class="bi bi-x"></i>
            </button>
        </div>
    `;
}

// ✅ Handle notification click
function adminHandleClick(id, type) {
    fetch(`/admin/notifications/${id}/read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(() => {
        loadAdminNotificationCount();

        // Redirect based on type
        if (type === 'new_query') {
            window.location.href = '#';
        } else if (type === 'new_student') {
            window.location.href = '#';
        } else if (type === 'payment') {
            window.location.href = '#';
        } else {
            loadAdminNotifications();
        }
    })
    .catch(err => console.error('Error:', err));
}

// ✅ Mark all as read
function adminMarkAllAsRead() {
    fetch('{{ route("admin.notifications.read-all") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(() => {
        loadAdminNotificationCount();
        loadAdminNotifications();
    })
    .catch(err => console.error('Error:', err));
}

// ✅ Delete notification
function adminDeleteNotification(id) {
    fetch(`/admin/notifications/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(() => {
        loadAdminNotificationCount();
        loadAdminNotifications();
    })
    .catch(err => console.error('Error:', err));
}

// ✅ Load when dropdown opens
document.getElementById('adminNotificationBell').addEventListener('click', function () {
    setTimeout(() => loadAdminNotifications(), 100);
});

// ✅ Auto refresh count every 30 seconds
setInterval(loadAdminNotificationCount, 30000);

// Helpers
function formatTime(timestamp) {
    const date = new Date(timestamp);
    const now  = new Date();
    const diff = Math.floor((now - date) / 1000);

    if (diff < 60)    return 'Just now';
    if (diff < 3600)  return Math.floor(diff / 60) + ' min ago';
    if (diff < 86400) return Math.floor(diff / 3600) + ' hr ago';
    if (diff < 604800) return Math.floor(diff / 86400) + ' day ago';

    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
}

function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
</script>
    
@stack('scripts')
</body>
</html>
