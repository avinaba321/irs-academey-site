<?php

namespace App\Http\Controllers\Auth;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $email = $request->email;
        $password = $request->password;


        // // ✅ Admin login
        // if (Auth::guard('admin')->attempt($credentials)) {
        //     return redirect()->route('admin.dashboard');
        // }

        // // ✅ Teacher login
        // if (Auth::guard('teacher')->attempt($credentials)) {
        //     return redirect()->route('teacher.dashboard');
        // }

        // // ✅ Student login
        // if (Auth::guard('student')->attempt($credentials)) {
        //     return redirect()->route('student.dashboard');
        // }

         // ================= ADMIN (role = 0) =================
    $admin = Admin::where('email', $email)->where('role', 0)->first();
    if ($admin && Hash::check($password, $admin->password)) {
        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.dashboard');
    }

    // ================= TEACHER (role = 1) =================
    $teacher = Teacher::where('email', $email)->where('role', 1)->first();
    if ($teacher && Hash::check($password, $teacher->password)) {
        Auth::guard('teacher')->login($teacher);
        return redirect()->route('teacher.dashboard');
    }

    // ================= STUDENT (role = 2) =================
    $student = Student::where('email', $email)->where('role', 2)->first();
    if ($student && Hash::check($password, $student->password)) {
        Auth::guard('student')->login($student);
        return redirect()->route('student.dashboard');
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
