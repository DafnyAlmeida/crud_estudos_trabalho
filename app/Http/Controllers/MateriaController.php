<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\User;
use App\Http\Requests\StoreMateriaRequest;
use App\Http\Requests\UpdateMateriaRequest;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $nome_user = $user->name;
        $materias = $user->materias()->latest()->get();

        return view('dashboard', compact("materias", "nome_user"));
    }

    public function create()
    {
        return view("materias.create");
    }

    public function store(StoreMateriaRequest $request)
    {
        $dados = $request->validated();

        $dados['user_id'] = Auth::id();
        $dados['status'] = 'ativa';

        Materia::create($dados);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Matéria criada com sucesso!');
    }

    public function show(Materia $materia)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudos = $materia->conteudos()
            ->withCount('tarefas')
            ->latest()
            ->get();

        return view('materias.show', compact('materia', 'conteudos'));
    }

    public function edit(Materia $materia)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        return view("materias.edit", compact("materia"));
    }

    public function update(UpdateMateriaRequest $request, Materia $materia)
    {
        $dados = $request->validated();

        $materia->update($dados);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Matéria atualizada com sucesso!');
    }

    public function destroy(Materia $materia)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $materia->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Matéria apagada com sucesso!');
    }
}