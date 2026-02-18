<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'student_id',
        'admin_id',
        'batch_id',
        'batch_material_id',
        'type',
        'title',
        'message',
        'is_read',
        'read_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function material()
    {
        return $this->belongsTo(BatchMaterial::class, 'batch_material_id');
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    
    // ✅ FIXED: Student scope - MUST have student_id AND no admin_id
    public function scopeForStudent($query, $studentId)
    {
        return $query
            ->where('student_id', $studentId)
            ->whereNull('admin_id'); // ✅ Exclude admin notifications
    }

    // ✅ FIXED: Admin scope - MUST have admin_id AND no student_id
    public function scopeForAdmin($query, $adminId)
    {
        return $query
            ->where('admin_id', $adminId)
            ->whereNull('student_id'); // ✅ Exclude student notifications
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function markAsRead()
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }
}
