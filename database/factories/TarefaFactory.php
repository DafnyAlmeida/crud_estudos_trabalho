<?php

namespace Database\Factories;

use App\Models\Conteudo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TarefaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'conteudo_id' => Conteudo::factory(),

            'titulo' => fake()->randomElement([
                'Ler o conteúdo',
                'Fazer resumo',
                'Resolver exercícios',
                'Assistir videoaula',
                'Revisar para a prova',
                'Fazer mapa mental',
            ]),

            'descricao' => fake()->sentence(15),

            'status' => fake()->randomElement([
                'a_fazer',
                'fazendo',
                'feito',
            ]),

            'prioridade' => fake()->randomElement([
                'alta',
                'media',
                'baixa',
            ]),

            'data_entrega' => fake()->dateTimeBetween('now', '+30 days'),
        ];
    }
}