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
        'batch_days',
    ];

    protected $casts = [
        'batch_days' => 'array',
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

    // ✅ ADD TIMESTAMPS TO PIVOT TABLE
    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'batch_students',  // pivot table name
            'batch_id',        // foreign key on pivot table for current model
            'student_id'       // foreign key on pivot table for related model
        )->withTimestamps();  // ✅ THIS IS IMPORTANT
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function materials()
{
    return $this->hasMany(BatchMaterial::class);
}

}
