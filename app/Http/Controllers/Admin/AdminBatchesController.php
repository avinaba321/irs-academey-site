<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCourse;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBatchesController extends Controller
{
    public function indexBatch()
    {
         $courses = AdminCourse::select('id', 'title')->get();
         $batches = Batch::with('course')->latest()->get();
        return view('Admin.admin_batches',compact('courses','batches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'batch_name'   => 'required|string|max:255',
            'course_id'    => 'required|exists:admin_courses,id',
            'trainer_name' => 'required|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'batch_timing' => 'required|string|max:255',
            'meeting_link' => 'nullable|url',
            'status'       => 'required|in:1,2,3',
        ]);

        $course = AdminCourse::findOrFail($request->course_id);

        $batch = Batch::create([
            'admin_id'     => Auth::guard('admin')->id(),
            'course_id'    => $course->id,
            'course_name'  => $course->title,
            'batch_name'   => $request->batch_name,
            'trainer_name' => $request->trainer_name,
            'start_date'   => $request->start_date,
            'end_date'     => $request->end_date,
            'batch_timing' => $request->batch_timing,
            'meeting_link' => $request->meeting_link,
            'status'       => $request->status,
        ]);
        return response()->json([
                    'success' => true,
                    'message' => 'Batch created successfully',
                    'batch'   => $batch
                ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'batch_name'   => 'required|string|max:255',
            'batch_timing' => 'required|string|max:255',  // ADD THIS LINE
            'course_id'    => 'required|exists:admin_courses,id',
            'trainer_name' => 'required|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'meeting_link' => 'nullable|url',
            'status'       => 'required|in:1,2,3',
        ]);

        $batch = Batch::findOrFail($id);
        $course = AdminCourse::findOrFail($request->course_id);

        $batch->update([
            'course_id'    => $course->id,
            'course_name'  => $course->title,
            'batch_name'   => $request->batch_name,
            'batch_timing' => $request->batch_timing,  
            'trainer_name' => $request->trainer_name,
            'start_date'   => $request->start_date,
            'end_date'     => $request->end_date,
            'meeting_link' => $request->meeting_link,
            'status'       => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Batch updated successfully',
            'batch'   => $batch
        ]);
    }

    public function destroy($id)
{
    try {
        $batch = Batch::findOrFail($id);
        $batch->delete();

        return response()->json([
            'success' => true,
            'message' => 'Batch deleted successfully'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to delete batch'
        ], 500);
    }
}   
}
