<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Resumo;

use Illuminate\Http\Request;

class ResumoController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Materia $materia, Conteudo $conteudo)
    {
        return view("resumos.create", compact("materia", "conteudo"));
    }

    public function store(Request $request, Materia $materia, Conteudo $conteudo)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'conceito' => 'nullable|string',
            'caracteristicas' => 'nullable|string',
            'tipos_classificacoes' => 'nullable|string',
            'funcoes' => 'nullable|string',
            'exemplos' => 'nullable|string',
            'informacoes_importantes' => 'nullable|string',
            'duvidas' => 'nullable|string',
            'revisao_rapida' => 'nullable|string',
        ]);

        $dados['area'] = $conteudo->area;
        
        $conteudo->resumos()->create($dados);

        return redirect()
            ->route('conteudos.show', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('success', 'Resumo criado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        return view("resumos.edit", compact("materia", "conteudo", "resumo"));
    }

    public function update(Request $request, Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'conceito' => 'nullable|string',
            'caracteristicas' => 'nullable|string',
            'tipos_classificacoes' => 'nullable|string',
            'funcoes' => 'nullable|string',
            'exemplos' => 'nullable|string',
            'informacoes_importantes' => 'nullable|string',
            'duvidas' => 'nullable|string',
            'revisao_rapida' => 'nullable|string',
        ]);

        $resumo->update($dados);

        return redirect()
            ->route('conteudos.show', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('success', 'Resumo atualizado com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        $resumo->delete();

        return redirect()
            ->route('conteudos.show', [$materia, $conteudo])
            ->with('sucesso', 'Resumo excluído com sucesso!');
    }
}
