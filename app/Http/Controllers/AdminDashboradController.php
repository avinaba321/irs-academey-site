<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboradController extends Controller
{
    public function index()
    {
        //  $admin = Auth::guard('admin')->user();
        //  dd($admin);
        return view('Admin.admin_dashboard');
    }
}
