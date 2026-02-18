<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
   /**
     * Get unread count - admin only
     */
    public function count()
    {
        $admin = Auth::guard('admin')->user();

        $count = Notification::forAdmin($admin->id)
            ->unread()
            ->count();

        return response()->json(['count' => $count]);
    }

    /**
     * Get notifications - admin only
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        $notifications = Notification::forAdmin($admin->id)
            ->with('student')
            ->latest()
            ->limit(15)
            ->get();

        return response()->json(['data' => $notifications]);
    }

    /**
     * Mark as read - verify it belongs to admin
     */
    public function markAsRead($id)
    {
        $admin = Auth::guard('admin')->user();

        $notification = Notification::forAdmin($admin->id)
            ->findOrFail($id);

        $notification->markAsRead();

        return response()->json(['success' => true]);
    }

    /**
     * Mark all as read - admin only
     */
    public function markAllAsRead()
    {
        $admin = Auth::guard('admin')->user();

        Notification::forAdmin($admin->id)
            ->unread()
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

        return response()->json(['success' => true]);
    }

    /**
     * Delete - verify it belongs to admin
     */
    public function destroy($id)
    {
        $admin = Auth::guard('admin')->user();

        $notification = Notification::forAdmin($admin->id)
            ->findOrFail($id);

        $notification->delete();

        return response()->json(['success' => true]);
    }
}
