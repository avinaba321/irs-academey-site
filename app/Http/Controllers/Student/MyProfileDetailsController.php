<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
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
            'dob' => 'required|date|before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'gender'             => 'nullable|in:male,female,other',
            'last_qualification' => 'nullable|string|max:50',
            'guardian_name'      => 'nullable|string|max:255',
            'guardian_mobile'    => 'nullable|string|max:12',
            'address'            => 'nullable|string|max:500',
        ],[
            'dob.before_or_equal' => 'Student must be at least 18 years old.',
            'dob.required'        => 'Date of birth is required.',
            'dob.date'            => 'Please enter a valid date of birth.',
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

    public function updateAvatar(Request $request)
{
    $request->validate([
        'profile_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $student = Auth::guard('student')->user();

    // Delete old image
    if ($student->profile_image) {
        Storage::disk('public')->delete($student->profile_image);
    }

    $path = $request->file('profile_image')
        ->store('students_img', 'public');

    $student->update([
        'profile_image' => $path
    ]);

    return response()->json([
        'success' => true,
        'image'   => asset('storage/'.$path),
        'message' => 'Profile image updated'
    ]);
}

public function updatePassword(Request $request)
{
    $student = Auth::guard('student')->user();

    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    if (!Hash::check($request->current_password, $student->password)) {
        return response()->json([
            'errors' => [
                'current_password' => ['Current password is incorrect']
            ]
        ], 422);
    }

    $student->update([
        'password' => Hash::make($request->password)
    ]);

    return response()->json([
        'message' => 'Password updated successfully'
    ]);
}

}
