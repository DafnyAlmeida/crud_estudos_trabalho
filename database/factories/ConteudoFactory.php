<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConteudoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'materia_id' => Materia::factory(),

            'nome' => fake()->randomElement([
                'Função exponencial',
                'Orações subordinadas',
                'Primeira República',
                'Pré-socraticos',
                'Dinâmica',
                'Ácidos',
            ]),

            'descricao' => fake()->paragraph(),

            'area' => fake()->randomElement([
                'teoria',
                'exercicios',
                'revisao',
                'prova',
            ]),

            'status' => fake()->randomElement([
                'nao_iniciado',
                'iniciado',
                'em_andamento',
                'concluido',
            ]),

            'prioridade' => fake()->randomElement([
                'alta',
                'media',
                'baixa',
            ]),

            'nivel_dificuldade' => fake()->randomElement([
                'basico',
                'intermediario',
                'avancado',
            ]),
        ];
    }
}