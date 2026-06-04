<?php

namespace Database\Seeders;

use App\Models\Materia;
use App\Models\User;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $user = User::create([
                'name' => 'Usuário Teste',
                'email' => 'teste@email.com',
                'password' => bcrypt('12345678'),
            ]);
        }

        $materias = [
        [
            'nome' => 'Português',
            'descricao' => 'Gramática, redação, literatura e interpretação de texto.',
            'cor_tema' => '#7c3aed',
            'icone_tema' => 'fa-solid fa-book-open',
            'status' => 'ativa',
        ],
        [
            'nome' => 'Matemática',
            'descricao' => 'Álgebra, geometria, funções e resolução de problemas.',
            'cor_tema' => '#2563eb',
            'icone_tema' => 'fa-solid fa-calculator',
            'status' => 'ativa',
        ],
        [
            'nome' => 'Biologia',
            'descricao' => 'Botânica, genética, ecologia e fisiologia.',
            'cor_tema' => '#059669',
            'icone_tema' => 'fa-solid fa-dna',
            'status' => 'ativa',
        ],
        [
            'nome' => 'História',
            'descricao' => 'História do Brasil, história geral e períodos históricos.',
            'cor_tema' => '#d97706',
            'icone_tema' => 'fa-solid fa-landmark',
            'status' => 'ativa',
        ],
        [
            'nome' => 'Química',
            'descricao' => 'Química geral, orgânica e físico-química.',
            'cor_tema' => '#e11d48',
            'icone_tema' => 'fa-solid fa-flask',
            'status' => 'ativa',
        ],
        [
            'nome' => 'Física',
            'descricao' => 'Mecânica, energia, eletricidade, ondas e termologia.',
            'cor_tema' => '#0891b2',
            'icone_tema' => 'fa-solid fa-atom',
            'status' => 'ativa',
        ],
    ];

        foreach ($materias as $materia) {
            Materia::create([
                'user_id' => $user->id,
                'nome' => $materia['nome'],
                'descricao' => $materia['descricao'],
                'cor_tema' => $materia['cor_tema'],
                'icone_tema' => $materia['icone_tema'],
                'status' => $materia['status'],
            ]);
        }
    }
}
