<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clinic_records', function (Blueprint $table) {
            $table->id();

            // Student connected to this clinic record
            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            // Date of clinic visit
            $table->date('visit_date');

            // Basic consultation information
            $table->string('chief_complaint')->nullable();
            $table->text('symptoms')->nullable();
            $table->text('assessment')->nullable();
            $table->text('treatment')->nullable();

            // Medicine given/used during consultation
            $table->text('medicine_given')->nullable();

            // Additional notes
            $table->text('notes')->nullable();
            $table->text('remarks')->nullable();

            // Nurse who handled the consultation
            $table->foreignId('nurse_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_records');
    }
};

