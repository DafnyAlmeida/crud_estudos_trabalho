<?php

namespace Database\Factories;

use App\Models\Conteudo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'conteudo_id' => Conteudo::factory(),

            'area' => fake()->randomElement([
                'teoria',
                'revisao',
                'exercicios',
                'prova',
            ]),

            'nome' => fake()->randomElement([
                'Resumo principal',
                'Resumo para revisão',
                'Resumo da aula',
                'Resumo rápido',
            ]),

            'conceito' => fake()->paragraph(),

            'caracteristicas' => fake()->paragraph(),

            'tipos_classificacoes' => fake()->paragraph(),

            'funcoes' => fake()->paragraph(),

            'exemplos' => fake()->paragraph(),

            'informacoes_importantes' => fake()->paragraph(),

            'duvidas' => fake()->sentence(10),

            'revisao_rapida' => fake()->paragraph(),
        ];
    }
}