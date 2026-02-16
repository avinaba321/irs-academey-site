<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
class StudentQueryController extends Controller
{
    public function index()
    {
        $queries = StudentQuery::where('student_id', Auth::guard('student')->id())
                    ->latest()
                    ->get();

        return view('Student.queries', compact('queries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|max:100',
            'details' => 'required'
        ]);

        $query = StudentQuery::create([
            'student_id' => Auth::guard('student')->id(),
            'title'      => $request->title,
            'details'    => $request->details,
        ]);

        // 🔔 Create admin notification
        Notification::create([
            'admin_id' => 0, // Or get logged admin
            'student_id' => Auth::guard('student')->id(),
            'type' => 'new_query',
            'title' => 'New Query Submitted',
            'message' => Auth::guard('student')->user()->full_name . 
                        " submitted a new query: " . $query->title
        ]);

        return response()->json(['success' => true]);
    }

}
