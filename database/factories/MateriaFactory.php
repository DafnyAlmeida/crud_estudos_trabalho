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
                '#22c55e',
                '#7c3aed',
                '#a855f7',
                '#3b82f6',
                '#06b6d4',
                '#f97316',
                '#f43f5e',
            ]),

            'icone_tema' => fake()->randomElement([
                'fa-solid fa-leaf',
                'fa-solid fa-flask',
                'fa-solid fa-brain',
                'fa-solid fa-book-open',
                'fa-solid fa-calculator',
                'fa-solid fa-chart-line',
                'fa-solid fa-globe',
                'fa-solid fa-palette',
                'fa-solid fa-music',
                'fa-solid fa-code',
                'fa-solid fa-landmark',
                'fa-regular fa-star',
                'fa-solid fa-atom',
                'fa-solid fa-dumbbell',
                'fa-solid fa-person',
                'fa-solid fa-map-location',
                'fa-solid fa-book-atlas',   
                'fa-solid fa-database',
            ]),

            'status' => 'ativa',
        ];
    }
}