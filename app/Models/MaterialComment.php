<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialComment extends Model
{
    protected $fillable = [
        'batch_material_id',
        'student_id',
        'comment'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function material()
    {
        return $this->belongsTo(BatchMaterial::class, 'batch_material_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
