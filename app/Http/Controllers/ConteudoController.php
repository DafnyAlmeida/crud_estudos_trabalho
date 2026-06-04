<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use Illuminate\Http\Request;

class ConteudoController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Materia $materia)
    {
        if ($materia->user_id !== auth()->id()) {
            abort(403);
        }

        return view('conteudos.create', compact('materia'));
    }

    public function store(Request $request, Materia $materia)
    {
        if ($materia->user_id !== auth()->id()) {
            abort(403);
        }

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'area' => 'nullable|string|max:255',
            'status' => 'required|in:iniciado,nao_iniciado,em_andamento,concluido',
            'nivel_dificuldade' => 'required|in:basico,intermediario,avancado',
            'prioridade' => 'required|in:alta,media,baixa',
        ]);

        $dados['materia_id'] = $materia->id;

        Conteudo::create($dados);

        return redirect()
            ->route('materias.show', $materia->id)
            ->with('success', 'Conteúdo criado com sucesso!');
    }

    public function show(Materia $materia, Conteudo $conteudo)
    {
        $conteudo->load('tarefas');
        return view("conteudos.show", compact('materia', 'conteudo'));
    }

    public function edit(Materia $materia, Conteudo $conteudo)
    {
        if ($materia->user_id !== auth()->id()) {
            abort(403);
        }

        if ($conteudo->materia_id !== $materia->id) {
            abort(404);
        }

        return view('conteudos.edit', compact('materia', 'conteudo'));
    }

    public function update(Request $request, Materia $materia, Conteudo $conteudo)
    {
        if ($materia->user_id !== auth()->id()) {
            abort(403);
        }

        if ($conteudo->materia_id !== $materia->id) {
            abort(404);
        }

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'area' => 'nullable|string|max:255',
            'status' => 'required|in:iniciado,nao_iniciado,em_andamento,concluido',
            'nivel_dificuldade' => 'required|in:basico,intermediario,avancado',
            'prioridade' => 'required|in:alta,media,baixa',
        ]);

        $conteudo->update($dados);

        return redirect()
            ->route('materias.show', $materia->id)
            ->with('success', 'Conteúdo atualizado com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo)
    {
        if ($materia->user_id !== auth()->id()) {
            abort(403);
        }

        if ($conteudo->materia_id !== $materia->id) {
            abort(403);
        }

        $conteudo->delete();

        return redirect()
            ->route('materias.show', $materia->id)
            ->with('success', 'Conteúdo apagado com sucesso!');
    }
}