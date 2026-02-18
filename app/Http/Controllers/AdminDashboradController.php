<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboradController extends Controller
{
    public function index()
    {
         $admin = Auth::guard('admin')->user();
         //dd($admin);
        return view('Admin.admin_dashboard');

        // $notifications = Notification::where('admin_id', Auth::guard('admin')->id())
        //         ->latest()
        //         ->take(10)
        //         ->get();


        // $unreadCount = Notification::where('admin_id', Auth::guard('admin')->id())
        //                 ->where('is_read', false)
        //                 ->count();

        // $admin = Auth::guard('admin')->user();

        // // ✅ Get notifications FOR this admin
        // $notifications = Notification::forAdmin($admin->id)
        //     ->with('student') // ✅ Load student relationship
        //     ->latest()
        //     ->take(10)
        //     ->get();

        // $unreadCount = Notification::forAdmin($admin->id)
        //     ->unread()
        //     ->count();


        // return view('Admin.admin_dashboard', compact('notifications','unreadCount'));

    }
}
