<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
    ];

    protected $hidden = [
        'password',
    ];
}
