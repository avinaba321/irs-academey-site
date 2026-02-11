<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchMaterial extends Model
{
    protected $fillable = [
        'batch_id',
        'title',
        'type',
        'description',
        'file_path',
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function comments()
{
    return $this->hasMany(MaterialComment::class);
}
}
