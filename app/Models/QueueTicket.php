<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QueueTicket extends Model
{
    protected $fillable = [
        'appointment_id',
        'queue_number',
        'status',
        'called_at',
        'completed_at',
    ];

    protected $casts = [
        'called_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
}