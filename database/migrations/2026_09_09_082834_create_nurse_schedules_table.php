<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nurse_schedules', function (Blueprint $table) {
            $table->id();

            // The nurse who owns this schedule
            $table->foreignId('nurse_id')
                ->constrained('users')
                ->onDelete('cascade');

            // The scheduled date
            $table->date('schedule_date');

            // Nurse's planned status for that date
            $table->enum('status', [
                'in',
                'out'
            ])->default('in');

            $table->timestamps();

            // One schedule per nurse per day
            $table->unique([
                'nurse_id',
                'schedule_date'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nurse_schedules');
    }
};

