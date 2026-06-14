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

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

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

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }
        
        return view("tarefas.create", compact("materia", "conteudo"));
    }

    public function store(StoreTarefaRequest $request, Materia $materia, Conteudo $conteudo)
    {
        $dados = $request->validated();

        $conteudo->tarefas()->create($dados);

        return redirect()
            ->route('tarefas.index', [$materia, $conteudo])
            ->with('success', 'Tarefa criada com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        if ((int) $tarefa->conteudo_id !== (int) $conteudo->id) {
            abort(404);
        }
        
        return view('tarefas.edit', [
            'materia' => $materia,
            'conteudo' => $conteudo,
            'tarefa' => $tarefa,
        ]);
    }

    public function update(UpdateTarefaRequest $request, Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        $dados = $request->validated();

        $tarefa->update($dados);

        return redirect()
            ->route('tarefas.index', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Tarefa $tarefa)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        if ((int) $tarefa->conteudo_id !== (int) $conteudo->id) {
            abort(404);
        }

        $tarefa->delete();

        return redirect()
            ->route('tarefas.index', [$materia, $conteudo])
            ->with('success', 'Tarefa excluída com sucesso!');
    }
}