<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome completo
            $table->integer('idade');
            $table->string('nome_responsavel');
            $table->string('contato_responsavel');
            $table->string('cpf')->unique(); // Considerando que cada CPF deve ser único
            $table->string('estado_saude'); // Ex: Saudável, Com acompanhamento, Crítico etc.
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
