<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Tarefa;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;

use App\Http\Controllers\Controller;

class TarefaController extends Controller
{
    public function index(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $tarefas = $conteudo->tarefas()
            ->orderByRaw('CASE WHEN data_entrega IS NULL THEN 1 ELSE 0 END')
            ->orderBy('data_entrega')
            ->latest('created_at')
            ->get();

        return view('tarefas.index', compact('materia', 'conteudo', 'tarefas'));
    }

    public function create(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        return view("tarefas.create", compact("materia", "conteudo"));
    }

    public function store(StoreTarefaRequest $request, Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $conteudo->tarefas()->create($request->validated());

        return redirect()
            ->route('tarefas.index', [$materia, $conteudo])
            ->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $tarefa = $conteudo->tarefas()->findOrFail($tarefa->id);

        return view('tarefas.edit', [
            'materia' => $materia,
            'conteudo' => $conteudo,
            'tarefa' => $tarefa,
        ]);
    }

    public function update(UpdateTarefaRequest $request, Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $tarefa = $conteudo->tarefas()->findOrFail($tarefa->id);

        $tarefa->update($request->validated());

        return redirect()
            ->route('tarefas.index', [$materia, $conteudo])
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $tarefa = $conteudo->tarefas()->findOrFail($tarefa->id);

        $tarefa->delete();

        return redirect()
            ->route('tarefas.index', [$materia, $conteudo])
            ->with('success', 'Tarefa excluída com sucesso!');
    }
}