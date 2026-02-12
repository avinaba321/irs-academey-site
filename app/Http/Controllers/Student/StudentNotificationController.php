<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentNotificationController extends Controller
{
    /**
     * Get unread notification count
     */
    public function count()
    {
        $student = Auth::guard('student')->user();
        $count = Notification::forStudent($student->id)
            ->unread()
            ->count();

        return response()->json(['count' => $count]);
    }

    /**
     * Get all notifications (for dropdown)
     */
    public function index()
    {
        $student = Auth::guard('student')->user();
        
        $notifications = Notification::forStudent($student->id)
            ->with(['batch', 'material'])
            ->latest()
            ->limit(15) // Show latest 15 in dropdown
            ->get();

        return response()->json(['data' => $notifications]);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead($id)
    {
        $student = Auth::guard('student')->user();
        
        $notification = Notification::forStudent($student->id)
            ->findOrFail($id);
        
        $notification->markAsRead();

        return response()->json(['success' => true]);
    }

    /**
     * Mark all as read
     */
    public function markAllAsRead()
    {
        $student = Auth::guard('student')->user();
        
        Notification::forStudent($student->id)
            ->unread()
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

        return response()->json(['success' => true]);
    }

    /**
     * Delete notification
     */
    public function destroy($id)
    {
        $student = Auth::guard('student')->user();
        
        $notification = Notification::forStudent($student->id)
            ->findOrFail($id);
        
        $notification->delete();

        return response()->json(['success' => true]);
    }
}