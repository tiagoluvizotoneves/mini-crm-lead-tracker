<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria a tabela de roles (perfis de usuários).
     */
    public function up(): void {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // admin, operador, master
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela de roles.
     */
    public function down(): void {
        Schema::dropIfExists('roles');
    }
};
