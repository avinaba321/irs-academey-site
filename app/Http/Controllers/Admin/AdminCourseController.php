<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminCourse;
use Illuminate\Support\Facades\Storage;


class AdminCourseController extends Controller
{
    public function coursesIndex()
    {
         $courses = AdminCourse::latest()->get();
        return view('Admin.courses',compact('courses'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'required|string|max:500',
            'duration'       => 'required|string|max:100',
            'price'          => 'required|numeric|min:0',
            'discount_price' => 'required|numeric|min:0|lt:price',
            'course_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload image
        $imagePath = null;
        if ($request->hasFile('course_image')) {
            $imagePath = $request->file('course_image')
                ->store('courses', 'public');
        }

        AdminCourse::create([
            'admin_id'       => Auth::guard('admin')->id(),
            'course_image'   => $imagePath,
            'title'          => $request->title,
            'description'    => $request->description,
            'duration'       => $request->duration,
            'price'          => $request->price,
            'discount_price' => $request->discount_price,
            'status'         => 1,
        ]);

        return response()->json([
        'success' => true,
        'message' => 'Course added successfully'
    ]);
    }

    public function destroy(AdminCourse $course)
{
    // Delete course image if exists
    if ($course->course_image && Storage::disk('public')->exists($course->course_image)) {
        Storage::disk('public')->delete($course->course_image);
    }

    $course->delete();

    return response()->json([
        'message' => 'Course deleted successfully'
    ]);
}

public function toggleStatus(AdminCourse $course)
{
    // Toggle status: 1 → 0 OR 0 → 1
    // $newStatus = $course->status == 1 ? 0 : 1;

    // $course->update([
    //     'status' => $newStatus
    // ]);

    // return response()->json([
    //     'success' => true,
    //     'status'  => $newStatus,
    //     'message' => $newStatus
    //         ? 'Course activated successfully'
    //         : 'Course deactivated successfully'
    // ]);

    $course->status = $course->status == 1 ? 0 : 1;
    $course->save();

    return response()->json([
        'success' => true,
        'status'  => $course->status,
        'message' => $course->status
            ? 'Course activated'
            : 'Course deactivated'
    ]);
}

public function update(Request $request, AdminCourse $course)
{
    $request->validate([
        'title'          => 'required|string|max:255',
        'description'    => 'required|string|max:500',
        'duration'       => 'required|string|max:100',
        'price'          => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0|lt:price',
        'course_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Handle image
    if ($request->hasFile('course_image')) {
        if ($course->course_image && Storage::disk('public')->exists($course->course_image)) {
            Storage::disk('public')->delete($course->course_image);
        }

        $course->course_image = $request->file('course_image')
            ->store('courses', 'public');
    }

    $course->update([
        'title'          => $request->title,
        'description'    => $request->description,
        'duration'       => $request->duration,
        'price'          => $request->price,
        'discount_price' => $request->discount_price,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Course updated successfully'
    ]);
}


    
}
