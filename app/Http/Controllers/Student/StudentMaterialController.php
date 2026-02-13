<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\BatchMaterial;
use App\Models\MaterialComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMaterialController extends Controller
{
    
    /**
     * 📚 Show materials for logged-in student
     */
/**
     * 📚 Show enrolled batches (Course List Page)
     */
    public function courses()
    {
        $student = Auth::guard('student')->user();

        $batches = $student->batches()
            ->with('course')
            ->latest()
            ->get();

        return view('Student.my_batches', compact('batches'));
    }

    
    // public function show($batchId)
    // {
    //     $student = Auth::guard('student')->user();

    //     // ✅ Get student's batches with meeting links
    //     // $batches = Batch::whereHas('students', function ($query) use ($student) {
    //     //     $query->where('batch_students.student_id', $student->id);
    //     // })
    //     // ->with('course')
    //     // ->get();
    //     // Ensure student belongs to this batch
    //     $batches = Batch::whereHas('students', function ($query) use ($student) {
    //             $query->where('batch_students.student_id', $student->id);
    //         })
    //         ->with([
    //             'course',
    //             'materials.comments.student'
    //         ])
    //         ->findOrFail($batchId);

    //     // Get materials only from batches student is enrolled in
    //     $materials = BatchMaterial::whereHas('batch.students', function ($query) use ($student) {
    //         $query->where('batch_students.student_id', $student->id);
    //     })
    //     ->with(['comments.student', 'batch'])
    //     ->latest()
    //     ->get();

    //     return view('Student.courses_material', compact('materials', 'batches'));
    // }

    /**
     * 💬 Store comment on material
     */
    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000'
        ]);

        MaterialComment::create([
            'batch_material_id' => $id,
            'student_id'        => Auth::guard('student')->id(),
            'comment'           => $request->comment
        ]);

        return back()->with('success', 'Comment posted successfully.');
    }

//    public function show($batchId)
// {
//     $student = Auth::guard('student')->user();

//     $batch = Batch::where('id', $batchId)
//         ->whereHas('students', function ($query) use ($student) {
//             $query->where('batch_students.student_id', $student->id);
//         })
//         ->with([
//             'course',
//             'materials.comments.student'
//         ])
//         ->firstOrFail();

//     $materials = $batch->materials;

//     return view('Student.courses_material', compact('materials', 'batch'));
// }

public function show($batchId)
{
    $student = Auth::guard('student')->user();

    $batch = Batch::where('id', $batchId)
        ->whereHas('students', function ($query) use ($student) {
            $query->where('batch_students.student_id', $student->id);
        })
        ->with([
            'course',
            'materials.comments.student'
        ])
        ->firstOrFail();

    $materials = $batch->materials;

    return view('Student.courses_material', compact('materials', 'batch'));
}

}
