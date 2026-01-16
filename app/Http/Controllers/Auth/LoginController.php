<?php

namespace App\Http\Controllers\Auth;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('Auth_Modal.login-modal');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&])[A-Za-z0-9!@#$%&]{8,}$/',
        ]);

        // ✅ Admin login
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        // ✅ Teacher login
        if (Auth::guard('teacher')->attempt($credentials)) {
            return redirect()->route('teacher.dashboard');
        }

        // ✅ Student login
        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        // ❌ Failed
        return back()
            ->withErrors(['email' => 'Invalid email or password'])
            ->with('login_error', true);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('teacher')->logout();
        Auth::guard('student')->logout();

        return redirect()->route('home');
    }
}
