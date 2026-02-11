<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCourse;
use App\Models\Batch;
use App\Models\Student;
use App\Models\StudentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBatchesController extends Controller
{
    public function indexBatch()
    {
        $courses = AdminCourse::select('id', 'title')->get();
        // $batches = Batch::with('course')->latest()->get();
        $batches = Batch::with('course')
    ->withCount('students')   // 👈 ADD THIS
    ->latest()
    ->get();

        // 👇 Only batch names for dropdown
        $batchNames = Batch::select('batch_name')
            ->distinct()
            ->orderBy('batch_name')
            ->pluck('batch_name');
        $batchTimings = Batch::whereNotNull('batch_timing')
            ->select('batch_timing')
            ->distinct()
            ->orderBy('batch_timing')
            ->pluck('batch_timing');
        return view('Admin.admin_batches', compact('courses', 'batches', 'batchNames', 'batchTimings'));
    }

    public function filter(Request $request)
    {
        $query = Batch::with('course')->withCount('students');  // 👈 ADD THIS


        if ($request->course_id) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->batch_name) {
            $query->where('batch_name', $request->batch_name);
        }
        if ($request->batch_timing) {
            $query->where('batch_timing', $request->batch_timing);
        }

        if ($request->start_date) {
            $query->whereDate('start_date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('end_date', '<=', $request->end_date);
        }

        return response()->json([
            'batches' => $query->latest()->get()
        ]);
    }

    // public function getEligibleStudents(Request $request, $courseId)
    // {
    //     $startDate = $request->start_date;

    //     $students = StudentPayment::with('student')
    //         ->where('course_id', $courseId)
    //         ->where('payment_status', 'completed')
    //         ->when($startDate, function ($query) use ($startDate) {
    //             $query->whereDate('updated_at', '<=', $startDate);
    //         })
    //         ->get()
    //         ->pluck('student')
    //         ->unique('id')
    //         ->values();

    //     return response()->json($students);
    // }

    public function getEligibleStudents(Request $request, $courseId)
{
    $startDate = $request->start_date;

    // ✅ Get all students with payment records for this course
    $students = Student::whereHas('payments', function($query) use ($courseId, $startDate) {
        $query->where('course_id', $courseId)
            ->when($startDate, function ($q) use ($startDate) {
                $q->whereDate('created_at', '<=', $startDate);
            })
            ->where(function($q) {
                // Full payment completed
                $q->where(function($subQ) {
                    $subQ->where('payment_type', 'full')
                         ->where('payment_status', 'completed');
                })
                // OR at least 1 installment paid
                ->orWhere(function($subQ) {
                    $subQ->where('payment_type', 'installment')
                         ->where('paid_installments', '>=', 1);
                });
            });
    })
    ->with(['payments' => function($query) use ($courseId) {
        $query->where('course_id', $courseId)
              ->with('installments');
    }])
    ->get()
    ->map(function($student) use ($courseId) {
        $payment = $student->payments->first();
        
        // Double-check first installment is actually paid
        if ($payment->payment_type === 'installment') {
            $firstInstallment = $payment->installments
                ->where('installment_number', 1)
                ->first();
            
            if (!$firstInstallment || $firstInstallment->status !== 'paid') {
                return null; // Skip this student
            }
        }
        
        return [
            'id' => $student->id,
            'name' => $student->name,
            'full_name' => $student->full_name,
            'student_id' => $student->student_id,
            'email' => $student->email,
            'payment_type' => $payment->payment_type,
            'payment_status' => $payment->payment_status,
            'paid_installments' => $payment->paid_installments,
            'total_installments' => $payment->total_installments,
            'badge' => $payment->payment_type === 'full' 
                ? 'Full Payment' 
                : "Installment {$payment->paid_installments}/{$payment->total_installments}"
        ];
    })
    ->filter() // Remove nulls
    ->values();

    return response()->json($students);
}
    public function store(Request $request)
    {
        $request->validate([
            'batch_name'   => 'required|string|max:255',
            'course_id'    => 'required|exists:admin_courses,id',
            'trainer_name' => 'required|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            // 'batch_timing' => 'required|string|max:255',
            'batch_timing' => [
                'required',
                'string',
                'regex:/^(\d{1,2}):(\d{2})\s?(am|pm|AM|PM)\s+(to|-)\s+(\d{1,2}):(\d{2})\s?(am|pm|AM|PM)$/i'
            ],

            'meeting_link' => 'nullable|url',
            'status'       => 'required|in:1,2,3',
            'batch_days' => 'required|array|min:1',
            'students'     => 'nullable|array',
            'students.*'   => 'exists:students,id',
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
            'batch_days'   => $request->batch_days,
        ]);

    //    if ($request->students) {
    //         foreach ($request->students as $studentId) {
    //             $batch->students()->attach($studentId);
    //         }
    //     }

    // ✅ Insert into pivot
    if ($request->filled('students')) {
        $batch->students()->sync($request->students);
    }

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
            'batch_days' => 'required|array|min:1',
            'students' => 'nullable|array',
            'students.*' => 'exists:students,id',

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
            'batch_days'   => $request->batch_days,
        ]);

        // ✅ Insert into pivot
    if ($request->filled('students')) {
        $batch->students()->sync($request->students);
    }

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
