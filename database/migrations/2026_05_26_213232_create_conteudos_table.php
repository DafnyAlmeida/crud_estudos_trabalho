<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conteudos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('materia_id')
                ->constrained('materias')
                ->cascadeOnDelete();

            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->string('area')->nullable();

            $table->enum('status', [
                'iniciado', 'nao_iniciado', 
                'em_andamento', 
                'concluido'
            ])->default('nao_iniciado');

            $table->enum("prioridade", [
                'alta', 
                'baixa', 
                'media'
            ])->default('media');

            $table->enum('nivel_dificuldade', [
                'basico', 
                'intermediario', 
                'avancado'
            ])->default('intermediario');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conteudos');
    }
};