<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resumos', function (Blueprint $table) {
            $table->id();

            $table->foreignId("conteudo_id")
                ->constrained("conteudos")
                ->cascadeOnDelete();

            $table->string('area')->nullable();
            $table->string('nome');

            $table->text('conceito')->nullable();
            $table->text('caracteristicas')->nullable();
            $table->text('tipos_classificacoes')->nullable();
            $table->text('funcoes')->nullable();
            $table->text('exemplos')->nullable();
            $table->text('informacoes_importantes')->nullable();
            $table->text('duvidas')->nullable();
            $table->text('revisao_rapida')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resumos');
    }
};