<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreConteudoRequest;
use App\Http\Requests\UpdateConteudoRequest;

class ConteudoController extends Controller
{
    // public function index(Materia $materia)
    // {
    //     if ((int) $materia->user_id !== (int) Auth::id()) {
    //         abort(403);
    //     }

    //     return redirect()->route('materias.show', $materia);
    // }

    public function create(Materia $materia)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        return view('conteudos.create', compact('materia'));
    }

    public function store(StoreConteudoRequest $request, Materia $materia)
    {
        $dados = $request->validated();

        $materia->conteudos()->create($dados);

        return redirect()
            ->route('materias.show', $materia->id)
            ->with('success', 'Conteúdo criado com sucesso!');
    }

    public function show(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        $conteudo->load('tarefas');

        return view("conteudos.show", compact('materia', 'conteudo'));
    }

    public function edit(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        return view('conteudos.edit', compact('materia', 'conteudo'));
    }

    public function update(UpdateConteudoRequest $request, Materia $materia, Conteudo $conteudo)
    {
        $dados = $request->validated();

        $conteudo->update($dados);

        return redirect()
            ->route('materias.show', $materia->id)
            ->with('success', 'Conteúdo atualizado com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        $conteudo->delete();

        return redirect()
            ->route('materias.show', $materia->id)
            ->with('success', 'Conteúdo apagado com sucesso!');
    }
}