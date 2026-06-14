<?php

namespace Database\Factories;

use App\Models\Conteudo;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'conteudo_id' => Conteudo::factory(),

            'titulo' => fake()->randomElement([
                'PDF de apoio',
                'Videoaula',
                'Lista de exercícios',
                'Artigo complementar',
                'Slide da aula',
                'Link de revisão',
            ]),

            'descricao' => fake()->sentence(12),

            'tipo' => fake()->randomElement([
                'pdf',
                'video',
                'link',
                'imagem',
            ]),

            'link' => fake()->url(),
        ];
    }
}