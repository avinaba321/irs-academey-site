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

.notification-bell {
    position: relative;
    cursor: pointer;
    padding: 8px;
    border-radius: 50%;
    transition: background 0.3s;
}

.notification-bell:hover {
    background: #f3f4f6;
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

.notify-item.unread::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background: #3b82f6;
    border-radius: 50%;
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
    font-size: 18px;
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
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
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

.load-more-btn {
    width: 100%;
    padding: 10px;
    border: none;
    background: #f3f4f6;
    color: #6b7280;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
}

.load-more-btn:hover {
    background: #e5e7eb;
}

/* Delete button on hover */
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

.notify-delete:hover {
    background: #fecaca;
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
let notificationInterval;
let currentPage = 1;
let hasMoreNotifications = true;

// Load notifications on page load
document.addEventListener('DOMContentLoaded', function() {
    loadNotificationCount();
    
    // Refresh count every 30 seconds
    notificationInterval = setInterval(loadNotificationCount, 30000);
});

// Load notification count
function loadNotificationCount() {
    fetch('{{ route("student.notifications.count") }}')
        .then(res => res.json())
        .then(data => {
            const count = data.count;
            const dot = document.getElementById('notifyDot');
            const badge = document.getElementById('notifyCount');
            
            if (count > 0) {
                dot.style.display = 'block';
                badge.style.display = 'block';
                badge.textContent = count > 99 ? '99+' : count;
            } else {
                dot.style.display = 'none';
                badge.style.display = 'none';
            }
        })
        .catch(err => console.error('Error loading notification count:', err));
}

// Load notifications list
function loadNotifications() {
    currentPage = 1;
    
    fetch('{{ route("student.notifications.index") }}')
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('notificationList');
            const totalElement = document.getElementById('totalNotifications');
            
            if (!data.data || data.data.length === 0) {
                list.innerHTML = `
                    <div class="no-notifications">
                        <i class="bi bi-bell-slash"></i>
                        <p class="mb-0 mt-2">No notifications yet</p>
                        <small>New notifications will appear here</small>
                    </div>`;
                totalElement.textContent = '0 notifications';
                return;
            }
            
            totalElement.textContent = `${data.data.length} notification${data.data.length > 1 ? 's' : ''}`;
            
            list.innerHTML = data.data.map(notif => createNotificationHTML(notif)).join('');
            
            // Update mark all button visibility
            const markAllBtn = document.getElementById('markAllBtn');
            const hasUnread = data.data.some(n => !n.is_read);
            markAllBtn.style.display = hasUnread ? 'block' : 'none';
        })
        .catch(err => {
            console.error('Error loading notifications:', err);
            document.getElementById('notificationList').innerHTML = `
                <div class="no-notifications">
                    <i class="bi bi-exclamation-circle"></i>
                    <p class="mb-0">Failed to load notifications</p>
                </div>`;
        });
}

// Create notification HTML
function createNotificationHTML(notif) {
    const iconMap = {
        'material_uploaded': 'bi-file-earmark-text',
        'payment_reminder': 'bi-credit-card',
        'message': 'bi-chat-dots'
    };
    
    const icon = iconMap[notif.type] || 'bi-bell';
    
    return `
        <div class="notify-item ${notif.is_read ? '' : 'unread'}" 
             onclick="handleNotificationClick(${notif.id}, '${notif.type}', ${notif.batch_material_id || 'null'})">
            <div class="notify-avatar">
                <i class="bi ${icon}"></i>
            </div>
            <div class="notify-content">
                <div class="notify-title">${escapeHtml(notif.title)}</div>
                <div class="notify-message">${escapeHtml(notif.message)}</div>
                <div class="notify-time">
                    <i class="bi bi-clock"></i>
                    ${formatTime(notif.created_at)}
                </div>
            </div>
            <button class="notify-delete" onclick="event.stopPropagation(); deleteNotification(${notif.id})">
                <i class="bi bi-x"></i>
            </button>
        </div>
    `;
}

// Handle notification click
function handleNotificationClick(id, type, materialId) {
    // Mark as read
    fetch(`/student/notifications/${id}/read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(() => {
        loadNotificationCount();
        
        // Redirect based on type
        if (type === 'material_uploaded') {
            window.location.href = '{{ route("course-material") }}';
        } else if (type === 'payment_reminder') {
            window.location.href = '{{ route("student.payments") }}';
        }
    })
    .catch(err => console.error('Error marking as read:', err));
}

// Mark all as read
function markAllAsRead() {
    fetch('{{ route("student.notifications.read-all") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(() => {
        loadNotificationCount();
        loadNotifications();
    })
    .catch(err => console.error('Error marking all as read:', err));
}

// Delete notification
function deleteNotification(id) {
    fetch(`/student/notifications/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(() => {
        loadNotificationCount();
        loadNotifications();
    })
    .catch(err => console.error('Error deleting notification:', err));
}

// Format time
function formatTime(timestamp) {
    const date = new Date(timestamp);
    const now = new Date();
    const diff = Math.floor((now - date) / 1000);
    
    if (diff < 60) return 'Just now';
    if (diff < 3600) return Math.floor(diff / 60) + ' min ago';
    if (diff < 86400) return Math.floor(diff / 3600) + ' hour' + (Math.floor(diff / 3600) > 1 ? 's' : '') + ' ago';
    if (diff < 604800) return Math.floor(diff / 86400) + ' day' + (Math.floor(diff / 86400) > 1 ? 's' : '') + ' ago';
    
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
}

// Escape HTML to prevent XSS
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Reload notifications when dropdown opens
document.getElementById('notificationBell').addEventListener('click', function() {
    setTimeout(() => loadNotifications(), 100);
});
</script>
@stack('scripts')
</body>
</html>
