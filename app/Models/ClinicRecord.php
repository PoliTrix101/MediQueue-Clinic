<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class ClinicRecord extends Model
{
    use HasFactory;

    protected $table = 'clinic_records';

    protected $fillable = [
        'appointment_id',
        'symptoms',
        'diagnosis',
        'treatment',
        'notes',
    ];

    public function appointment()
    {
        return $this->belongsTo(
            Appointment::class,
            'appointment_id'
        );
    }
}