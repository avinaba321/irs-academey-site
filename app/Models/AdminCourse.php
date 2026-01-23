<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AdminCourse extends Model
{
     use HasFactory;

    protected $table = 'admin_courses';

    protected $fillable = [
        'admin_id',
        'course_image',
        'title',
        'description',
        'duration',
        'price',
        'discount_price',
        'status'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
