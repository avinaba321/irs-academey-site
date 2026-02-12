<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\BatchMaterial;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\MaterialUploadedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

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

          $batch = Batch::with('students')->findOrFail($batchId);

        $data = $request->only(['title', 'type', 'description']);
        $data['batch_id'] = $batchId;

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('batch_materials', 'public');
        }

            $material = BatchMaterial::create($data);

         // ✅ CREATE NOTIFICATIONS FOR ALL STUDENTS IN THIS BATCH
        $this->notifyStudents($batch, $material);

        return back()->with('success', 'Material added successfully');
    }

    /**
     * ✅ Notify all students in the batch about new material
     */
    private function notifyStudents($batch, $material)
    {
        $students = $batch->students; // Get all enrolled students

        foreach ($students as $student) {
            Notification::create([
                'student_id' => $student->id,
                'batch_id' => $batch->id,
                'batch_material_id' => $material->id,
                'type' => 'material_uploaded',
                'title' => 'New Material Posted',
                'message' => "New {$material->type} material '{$material->title}' has been posted in {$batch->batch_name}",
            ]);
        }

         // ==============================
        // ✅ SEND SMS
        // ==============================

        if ($student->phone_number) {
            try {
                $sid = env('TWILIO_SID');
                $token = env('TWILIO_TOKEN');
                $twilio = new Client($sid, $token);

                $twilio->messages->create(
                    '+91' . $student->phone_number, // Adjust country code
                    [
                        'from' => env('TWILIO_FROM'),
                        'body' => "IRS Academy: New {$material->type} material '{$material->title}' uploaded in {$batch->batch_name}. Login to view."
                    ]
                );
            } catch (\Exception $e) {
                Log::error('SMS failed: ' . $e->getMessage());
            }
        }
    }

    public function destroy($id)
    {
        $material = BatchMaterial::findOrFail($id);
        // Delete file from storage
        if ($material->file_path) {
            Storage::disk('public')->delete($material->file_path);
        }

        // Delete related notifications
        Notification::where('batch_material_id', $material->id)->delete();
        $material->delete();

        return back()->with('success', 'Material deleted');
    }
}
