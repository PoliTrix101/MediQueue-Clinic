<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('student_id')
                ->after('id')
                ->constrained('students')
                ->onDelete('cascade');

            $table->foreignId('service_id')
                ->after('student_id')
                ->constrained('services')
                ->onDelete('cascade');

            $table->date('appointment_date')
                ->after('service_id');

            $table->time('appointment_time')
                ->after('appointment_date');

            $table->text('reason')
                ->nullable()
                ->after('appointment_time');

            $table->enum('status', [
                'pending',
                'approved',
                'cancelled',
                'completed'
            ])->default('pending')
              ->after('reason');
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['service_id']);

            $table->dropColumn([
                'student_id',
                'service_id',
                'appointment_date',
                'appointment_time',
                'reason',
                'status',
            ]);
        });
    }
};