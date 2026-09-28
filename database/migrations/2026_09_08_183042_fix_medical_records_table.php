<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medical_records', function (Blueprint $table) {
            $table->foreignId('student_id')
                ->after('id')
                ->constrained('students')
                ->onDelete('cascade');

            $table->foreignId('appointment_id')
                ->nullable()
                ->after('student_id')
                ->constrained('appointments')
                ->nullOnDelete();

            $table->text('symptoms')
                ->nullable()
                ->after('appointment_id');

            $table->text('diagnosis')
                ->nullable()
                ->after('symptoms');

            $table->text('treatment')
                ->nullable()
                ->after('diagnosis');

            $table->text('notes')
                ->nullable()
                ->after('treatment');
        });
    }

    public function down(): void
    {
        Schema::table('medical_records', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['appointment_id']);

            $table->dropColumn([
                'student_id',
                'appointment_id',
                'symptoms',
                'diagnosis',
                'treatment',
                'notes',
            ]);
        });
    }
};