<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    protected $fillable = [
        'student_id',
        'service_id',
        'appointment_date',
        'appointment_time',
        'reason',
        'status',
    ];

    protected $casts = [
        'appointment_date' => 'date',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function queueTicket(): HasOne
    {
        return $this->hasOne(QueueTicket::class);
    }
}