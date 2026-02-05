<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Student extends Authenticatable
{
   use Notifiable;

    protected $table = 'students';

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'role',
        'password',
        'dob',
        'gender',
        'address',
        'profile_image',
        'last_qualification',
        'guardian_name',
        'guardian_mobile',
        'class_mode'
    ];

    protected $hidden = [
        'password',
    ];

     protected static function boot()
    {
        parent::boot();

        static::created(function ($student) {

            $cmp_name = "IRS-";
            // 1️⃣ Zero part (7 zeros)
            $zeroPart = str_pad('', 5, '0');

            // 2️⃣ Name part (no space, lowercase)
            $namePart = strtoupper(Str::substr($student->full_name, 0, 4));

            // 3️⃣ Final student id
            $student->student_id =  $cmp_name . $zeroPart . $namePart . $student->id;

            $student->save();
        });
    }

        public function isProfileComplete(): bool
    {
        return !is_null($this->dob);
    }

}
