<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Student;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
    'name',
    'email',
    'password',
    'role',
];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function student(): HasOne
{
    return $this->hasOne(Student::class);
}
}

