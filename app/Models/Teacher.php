<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
     use Notifiable;

    protected $table = 'teachers';

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
