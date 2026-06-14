<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),

            'nome' => fake()->randomElement([
                'Matemática',
                'Português',
                'História',
                'Geografia',
                'Química',
                'Física',
                'Biologia',
                'Programação',
            ]),

            'descricao' => fake()->sentence(12),

            'cor_tema' => fake()->randomElement([
                '#7045c9',
                '#30204f',
                '#a78bfa',
                '#2563eb',
                '#16a34a',
                '#dc2626',
            ]),

            'icone_tema' => fake()->randomElement([
                'fa-book-open',
                'fa-calculator',
                'fa-flask',
                'fa-code',
                'fa-atom',
                'fa-globe',
            ]),

            'status' => 'ativa',
        ];
    }
}