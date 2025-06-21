<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria o log de atividades dos leads (histórico de movimentações no Kanban).
     */
    public function up(): void {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('from_stage_id')->constrained('kanban_stages');
            $table->foreignId('to_stage_id')->constrained('kanban_stages');
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela de activity logs.
     */
    public function down(): void {
        Schema::dropIfExists('activity_logs');
    }
};
