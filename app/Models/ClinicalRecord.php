<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicRecord extends Model
{
    use HasFactory;

    protected $table = 'clinic_records';

    protected $fillable = [
        'appointment_id',
        'user_id',
        'symptoms',
        'diagnosis',
        'treatment',
        'notes',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

