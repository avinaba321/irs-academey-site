<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'admin_id',
        'course_id',
        'course_name',
        'batch_name',
        'trainer_name',
        'start_date',
        'end_date',
        'batch_timing',
        'meeting_link',
        'status',
    ];

    /**
     * Get the course that owns the batch.
     */
    public function course()
    {
        return $this->belongsTo(AdminCourse::class, 'course_id');
    }

    /**
     * Get the admin that owns the batch.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    
}
