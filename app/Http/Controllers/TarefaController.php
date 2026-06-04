<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Tarefa;

use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Materia $materia, Conteudo $conteudo)
    {
        return view("tarefas.create", compact("materia", "conteudo"));
    }

    public function store(Request $request, Materia $materia, Conteudo $conteudo)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:a_fazer,fazendo,feito',
            'prioridade' => 'required|in:baixa,media,alta',
        ]);

        $dados['conteudo_id'] = $conteudo->id;

        Tarefa::create($dados);

        return redirect()
            ->route('conteudos.show', [$materia, $conteudo])
            ->with('sucesso', 'Tarefa criada com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        return view('tarefas.edit', [
            'materia' => $materia,
            'conteudo' => $conteudo,
            'tarefa' => $tarefa,
        ]);
    }

    public function update(Request $request, Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        $dados = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'status' => ['required', 'in:a_fazer,fazendo,feito'],
        ]);

        $tarefa->update($dados);

        return redirect()
            ->route('conteudos.show', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('sucesso', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        $tarefa->delete();

        return redirect()
            ->route('conteudos.show', [$materia, $conteudo])
            ->with('sucesso', 'Tarefa excluída com sucesso!');
    }
}
