<?php

namespace Database\Seeders;

use App\Models\Materia;
use App\Models\Conteudo;
use Illuminate\Database\Seeder;

class ConteudoSeeder extends Seeder
{
    public function run(): void
    {
        $matematica = Materia::where('nome', 'Matemática')->first();

        if (!$matematica) {
            return;
        }

        $conteudos = [
            [
                'nome' => 'Função afim',
                'descricao' => 'Estudo de funções do tipo f(x) = ax + b, gráfico, coeficientes e aplicações.',
                'area' => 'Álgebra',
                'status' => 'nao_iniciado',
                'nivel_dificuldade' => 'intermediario',
                'prioridade' => 'alta',
            ],
            [
                'nome' => 'Função quadrática',
                'descricao' => 'Estudo de funções do tipo f(x) = ax² + bx + c, parábola, raízes e vértice.',
                'area' => 'Álgebra',
                'status' => 'nao_iniciado',
                'nivel_dificuldade' => 'intermediario',
                'prioridade' => 'alta',
            ],
            [
                'nome' => 'Logaritmo',
                'descricao' => 'Definição, propriedades dos logaritmos, equações logarítmicas e aplicações.',
                'area' => 'Álgebra',
                'status' => 'nao_iniciado',
                'nivel_dificuldade' => 'avancado',
                'prioridade' => 'alta',
            ],
            [
                'nome' => 'Progressão aritmética',
                'descricao' => 'Sequências numéricas, razão, termo geral e soma dos termos.',
                'area' => 'Sequências',
                'status' => 'nao_iniciado',
                'nivel_dificuldade' => 'basico',
                'prioridade' => 'media',
            ],
            [
                'nome' => 'Progressão geométrica',
                'descricao' => 'Sequências com razão multiplicativa, termo geral e soma dos termos.',
                'area' => 'Sequências',
                'status' => 'nao_iniciado',
                'nivel_dificuldade' => 'intermediario',
                'prioridade' => 'media',
            ],
            [
                'nome' => 'Geometria plana',
                'descricao' => 'Áreas, perímetros, ângulos, polígonos e figuras planas.',
                'area' => 'Geometria',
                'status' => 'nao_iniciado',
                'nivel_dificuldade' => 'intermediario',
                'prioridade' => 'media',
            ],
        ];

        foreach ($conteudos as $conteudo) {
            Conteudo::create([
                'materia_id' => $matematica->id,
                'nome' => $conteudo['nome'],
                'descricao' => $conteudo['descricao'],
                'area' => $conteudo['area'],
                'status' => $conteudo['status'],
                'nivel_dificuldade' => $conteudo['nivel_dificuldade'],
                'prioridade' => $conteudo['prioridade'],
            ]);
        }
    }
}