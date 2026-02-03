<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBatchesDetailsController extends Controller
{
    public function indexBatchDetails()
    {
        return view('Admin.admin_batches_details');
    }
}
