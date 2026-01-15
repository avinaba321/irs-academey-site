<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;
use App\Mail\NewUserRegisteredMail;


// Models
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // ✅ Validation Rules
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'regex:/^[A-Za-z]+( [A-Za-z]+)*$/'
            ],
            'reg_email' => [
                'required',
                'email',
                Rule::unique(
                    $request->role == 0 ? 'admins' :
                    ($request->role == 1 ? 'teachers' : 'students'),
                    'email'
                ),
            ],
            'phone' => [
                'required',
                'regex:/^(?!([0-9])\1{9})[6-9][0-9]{9}$/',
                    Rule::unique(
             $request->role == 0 ? 'admins' :
                    ($request->role == 1 ? 'teachers' : 'students'),
                    'phone_number'
                ),
            ],
            'role' => 'required|in:0,1,2',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&])[A-Za-z0-9!@#$%&]{8,}$/'
            ],
            'terms' => 'accepted',
        ]);

        // ✅ Prepare Common Data
        $data = [
            'full_name'    => $request->name,
            'email'        => $request->reg_email,
            'phone_number' => $request->phone,
            'role'         => $request->role,
            'password'     => Hash::make($request->password),
        ];

        $stdData = [
            'full_name'    => $request->name,
            'email'        => $request->reg_email,
            'phone_number' => $request->phone,
            'role'         => $request->role,
            'password'     => Hash::make($request->password),
            'dob'          => $request->dob,
            'gender'       => $request->gender,
            'address'      => $request->address,
            'profile_image' => $request->profile_image,
            'last_qualification' => $request->last_qualification
        ];


        // // ✅ Store Based on Role
        // switch ($request->role) {

        //     // ADMIN
        //     case 0:
        //         Admin::create($data);
        //         break;

        //     // TEACHER
        //     case 1:
        //         Teacher::create($data);
        //         break;

        //     // STUDENT
        //     case 2:
        //         Student::create($data);
        //         break;

        //     default:
        //         return back()->withErrors(['role' => 'Invalid role selected']);
        // }
        // ✅ Store Based on Role
            if ($request->role == 0) {
                // ADMIN
                 $user = Admin::create($data);
                  $roleName = 'Admin';

            } elseif ($request->role == 1) {
                // TEACHER
                $user = Teacher::create($data);
                 $roleName = 'Teacher';

            } elseif ($request->role == 2) {
                // STUDENT
                $user = Student::create($stdData);
                   $roleName = 'Student';


            } else {
                return back()->withErrors(['role' => 'Invalid role selected']);
            }

                        // ✅ SEND EMAILS
            Mail::to($user->email)->send(
                new WelcomeUserMail($user, $roleName)
            );

            Mail::to(config('mail.admin_email', env('ADMIN_EMAIL')))
                ->send(new NewUserRegisteredMail($user, $roleName));

        return redirect()->back()->with('success', 'Registration successful!');
    }
}
