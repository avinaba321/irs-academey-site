<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileDetailsController extends Controller
{
    public function profileIndex()
    {
        $student = Auth::guard('student')->user();
        return view('Student.my_profile', compact('student'));
    }

    public function update(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'full_name'          => 'required|string|max:255',
            'email'              => 'required|email|unique:students,email,' . $student->id,
            'phone_number'       => 'required|string|max:15',
            'dob'                => 'nullable|date',
            'gender'             => 'nullable|in:male,female,other',
            'last_qualification' => 'nullable|string|max:50',
            'guardian_name'      => 'nullable|string|max:255',
            'guardian_mobile'    => 'nullable|string|max:12',
            'address'            => 'nullable|string|max:500',
        ]);

        $student->update([
            'full_name'          => $request->full_name,
            'email'              => $request->email,
            'phone_number'       => $request->phone_number,
            'dob'                => $request->dob,
            'gender'             => $request->gender,
            'last_qualification' => $request->last_qualification,
            'guardian_name'      => $request->guardian_name,
            'guardian_mobile'    => $request->guardian_mobile,
            'address'            => $request->address,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully'
        ]);
    }
}
