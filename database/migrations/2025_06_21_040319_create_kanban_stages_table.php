<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria a tabela dos estágios do Kanban (pipeline) por empresa.
     */
    public function up(): void {
        Schema::create('kanban_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->integer('position');
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela de kanban stages.
     */
    public function down(): void {
        Schema::dropIfExists('kanban_stages');
    }
};
