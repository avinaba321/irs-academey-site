<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\StudentQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class StudentQueryController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();

        // ✅ Use pagination instead of get()
        $queries = StudentQuery::where('student_id', $student->id)
            ->latest('created_at')  // ✅ Explicit column name
            ->paginate(5);  // ✅ Show 10 per page

        return view('Student.queries', compact('queries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|max:100',
            'details' => 'required'
        ]);

        $student = Auth::guard('student')->user();


        $query = StudentQuery::create([
            'student_id' => $student->id,
            'title'      => $request->title,
            'details'    => $request->details,
        ]);

        // // 🔔 Create admin notification
        // Notification::create([
        //     'admin_id' => 1, // Or get logged admin
        //     'student_id' => Auth::guard('student')->id(),
        //     'type' => 'new_query',
        //     'title' => 'New Query Submitted',
        //     'message' => Auth::guard('student')->user()->full_name . 
        //                 " submitted a new query: " . $query->title
        // ]);
        // ✅ Get all admins (or specific admin)
        $admins = Admin::all(); // Or Admin::where('role', 'super_admin')->get()

        // ✅ Create notification for each admin
        foreach ($admins as $admin) {
            // When creating admin notification - DON'T set student_id
            Notification::create([
                'admin_id'   => $admin->id,
                'student_id' => null,        // ✅ Must be null for admin notifications
                'type'       => 'new_query',
                'title'      => 'New Query Submitted',
                'message'    => $student->full_name . " submitted: " . $query->title,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Query submitted successfully'
        ]);

        //return response()->json(['success' => true]);
    }
}
