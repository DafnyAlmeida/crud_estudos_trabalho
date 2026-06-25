<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materiais', function (Blueprint $table) {
            $table->id();

            $table->foreignId('conteudo_id')
                ->constrained('conteudos')
                ->cascadeOnDelete();

            $table->string('titulo');
            $table->text('descricao')->nullable();

            $table->enum('tipo', [
                'pdf',
                'video',
                'link',
                'imagem'
            ]);

            $table->text('link')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materiais');
    }
};