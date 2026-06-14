<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Tarefa;
use App\Models\Material;
use App\Models\Resumo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SistemaEstudosSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Aluno Teste',
            'email' => 'aluno@teste.com',
            'password' => Hash::make('password'),
        ]);

        Materia::factory()
            ->count(5)
            ->create([
                'user_id' => $user->id,
            ])
            ->each(function ($materia) {
                Conteudo::factory()
                    ->count(4)
                    ->create([
                        'materia_id' => $materia->id,
                    ])
                    ->each(function ($conteudo) {
                        Tarefa::factory()
                            ->count(3)
                            ->create([
                                'conteudo_id' => $conteudo->id,
                            ]);

                        Material::factory()
                            ->count(2)
                            ->create([
                                'conteudo_id' => $conteudo->id,
                            ]);

                        Resumo::factory()
                            ->count(1)
                            ->create([
                                'conteudo_id' => $conteudo->id,
                            ]);
                    });
            });
    }
}