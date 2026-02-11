<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\BatchMaterial;
use Illuminate\Http\Request;

class BatchMaterialController extends Controller
{
    public function index($batchId)
    {
        $batch = Batch::with('materials')->findOrFail($batchId);
        return view('Admin.admin_batches_details', compact('batch'));
    }

    public function store(Request $request, $batchId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:pdf,video,text,meeting',
            'file' => 'nullable|file|mimes:pdf,mp4,mov',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'type', 'description']);
        $data['batch_id'] = $batchId;

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('batch_materials', 'public');
        }

        BatchMaterial::create($data);

        return back()->with('success', 'Material added successfully');
    }

    public function destroy($id)
    {
        $material = BatchMaterial::findOrFail($id);
        $material->delete();

        return back()->with('success', 'Material deleted');
    }
}
