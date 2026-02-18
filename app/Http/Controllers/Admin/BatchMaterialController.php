<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\BatchMaterial;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
            'title'       => 'required|string|max:255',
            'type'        => 'required|in:pdf,video,text,meeting',
            'file'        => 'nullable|file|mimes:pdf,mp4,mov,avi,mkv,webm|max:102400',
            'description' => 'nullable|string',
        ]);

        $batch = Batch::with('students')->findOrFail($batchId);

        $data             = $request->only(['title', 'type', 'description']);
        $data['batch_id'] = $batchId;

        if ($request->hasFile('file')) {
            $file              = $request->file('file');
            $data['file_path'] = $file->store('batch_materials', 'public');
            $data['file_size'] = $file->getSize();
        }

        $material = BatchMaterial::create($data);

        // ✅ Notify students
        $this->notifyStudents($batch, $material);

        return back()->with('success', 'Material added successfully');
    }

    /**
     * ✅ Fixed: Notify each student exactly ONCE
     */
    private function notifyStudents($batch, $material)
    {
        // ✅ Get UNIQUE student IDs only to prevent duplicate notifications
        $students = $batch->students()->distinct()->get();

        Log::info('Notifying students for material', [
            'batch_id'      => $batch->id,
            'material_id'   => $material->id,
            'student_count' => $students->count(),
        ]);

        foreach ($students as $student) {

            // ✅ STEP 1: Check notification doesn't already exist
            $alreadyNotified = Notification::where([
                'student_id'        => $student->id,
                'batch_material_id' => $material->id,
                'type'              => 'material_uploaded',
            ])->exists();

            if ($alreadyNotified) {
                Log::warning("Duplicate notification skipped for student {$student->id}");
                continue; // ✅ Skip if already notified
            }

            // ✅ STEP 2: Create notification
            // Notification::create([
            //     'student_id'        => $student->id,
            //     'batch_id'          => $batch->id,
            //     'batch_material_id' => $material->id,
            //     'type'              => 'material_uploaded',
            //     'title'             => 'New Material Posted',
            //     'message'           => "New {$material->type} '{$material->title}' has been posted in {$batch->batch_name}",
            // ]);

            Notification::create([
    'student_id'        =>  $student->id,
    'admin_id'          => null,   // ✅ Must be null for student notifications
    'batch_id'          => $batch->id,
    'batch_material_id' => $material->id,
    'type'              => 'material_uploaded',
    'title'             => 'New Material Posted',
    'message'           => "New {$material->type} '{$material->title}' in {$batch->batch_name}",
]);

            // ✅ STEP 3: SMS is INSIDE the loop (it was outside before - that was the bug!)
            if (!empty($student->phone_number)) {
                $this->sendSms($student, $batch, $material);
            }

        } // ✅ End of foreach
    }

    /**
     * ✅ Separated SMS logic into its own method for clarity
     */
    private function sendSms($student, $batch, $material)
    {
        try {
            $sid    = env('TWILIO_SID');
            $token  = env('TWILIO_TOKEN');
            $from   = env('TWILIO_FROM');

            // Don't proceed if Twilio is not configured
            if (!$sid || !$token || !$from) {
                Log::warning('Twilio credentials not configured');
                return;
            }

            $twilio = new \Twilio\Rest\Client($sid, $token);

            $twilio->messages->create(
                '+91' . $student->phone_number,
                [
                    'from' => $from,
                    'body' => "IRS Academy: New {$material->type} '{$material->title}' uploaded in {$batch->batch_name}. Login to view."
                ]
            );

            Log::info("SMS sent to student {$student->id}");

        } catch (\Exception $e) {
            Log::error('SMS failed for student ' . $student->id . ': ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $material = BatchMaterial::findOrFail($id);

        if ($material->file_path) {
            Storage::disk('public')->delete($material->file_path);
        }

        Notification::where('batch_material_id', $material->id)->delete();

        $material->delete();

        return back()->with('success', 'Material deleted');
    }
}