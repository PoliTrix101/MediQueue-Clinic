<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'appointment_id',
        'symptoms',
        'diagnosis',
        'treatment',
        'notes',
    ];

    /*
    |--------------------------------------------------------------------------
    | Student
    |--------------------------------------------------------------------------
    */

    public function student()
    {
        return $this->belongsTo(
            Student::class,
            'student_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Appointment
    |--------------------------------------------------------------------------
    */

    public function appointment()
    {
        return $this->belongsTo(
            Appointment::class,
            'appointment_id'
        );
    }
}