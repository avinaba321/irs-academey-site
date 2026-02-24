<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStudentListController extends Controller
{
    public function indexBatchDetails()
    {
         return view('Admin.AdminStudentListView');
    }
   
}
