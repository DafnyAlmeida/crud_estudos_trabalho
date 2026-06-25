<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Resumo;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreResumoRequest;
use App\Http\Requests\UpdateResumoRequest;

class ResumoController extends Controller
{
    public function index(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $resumos = $conteudo->resumos()->latest()->get();

        return view('resumos.index', compact('materia', 'conteudo', 'resumos'));
    }

    public function create(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        return view("resumos.create", compact("materia", "conteudo"));
    }

    public function store(StoreResumoRequest $request, Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $dados = $request->validated();

        $dados['area'] = $conteudo->area;

        $conteudo->resumos()->create($dados);

        return redirect()
            ->route('resumos.index', [$materia, $conteudo])
            ->with('success', 'Resumo criado com sucesso!');
    }

    public function edit(Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $resumo = $conteudo->resumos()->findOrFail($resumo->id);

        return view("resumos.edit", compact("materia", "conteudo", "resumo"));
    }

    public function update(UpdateResumoRequest $request, Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $resumo = $conteudo->resumos()->findOrFail($resumo->id);

        $dados = $request->validated();

        $dados['area'] = $conteudo->area;

        $resumo->update($dados);

        return redirect()
            ->route('resumos.index', [$materia, $conteudo])
            ->with('success', 'Resumo atualizado com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $resumo = $conteudo->resumos()->findOrFail($resumo->id);

        $resumo->delete();

        return redirect()
            ->route('resumos.index', [$materia, $conteudo])
            ->with('success', 'Resumo excluído com sucesso!');
    }
}