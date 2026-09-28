<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('queue_tickets', function (Blueprint $table) {
            $table->foreignId('appointment_id')
                ->after('id')
                ->constrained('appointments')
                ->onDelete('cascade');

            $table->integer('queue_number')
                ->after('appointment_id');

            $table->enum('status', [
                'waiting',
                'called',
                'in_consultation',
                'completed',
                'cancelled'
            ])->default('waiting')
              ->after('queue_number');

            $table->timestamp('called_at')
                ->nullable()
                ->after('status');

            $table->timestamp('completed_at')
                ->nullable()
                ->after('called_at');
        });
    }

    public function down(): void
    {
        Schema::table('queue_tickets', function (Blueprint $table) {
            $table->dropForeign(['appointment_id']);

            $table->dropColumn([
                'appointment_id',
                'queue_number',
                'status',
                'called_at',
                'completed_at',
            ]);
        });
    }
};