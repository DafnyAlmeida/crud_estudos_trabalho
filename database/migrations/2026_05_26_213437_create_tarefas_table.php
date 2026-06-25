<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('conteudo_id')
                ->constrained('conteudos')
                ->cascadeOnDelete();

            $table->string('titulo');
            $table->text('descricao')->nullable();

            $table->enum('status', [
                'a_fazer', 
                'fazendo', 
                'feito'
            ])->default('a_fazer');

            $table->enum('prioridade', [
                'baixa',
                'media',
                'alta'
            ])->default('media');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};