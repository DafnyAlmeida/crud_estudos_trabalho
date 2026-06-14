<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Resumo;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreResumoRequest;
use App\Http\Requests\UpdateResumoRequest;

use App\Http\Controllers\Controller;

class ResumoController extends Controller
{
    public function index(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        $resumos = $conteudo->resumos()->latest()->get();

        return view('resumos.index', compact('materia', 'conteudo', 'resumos'));
    }

    public function create(Materia $materia, Conteudo $conteudo)
    {
        if ($materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ($conteudo->materia_id !== $materia->id) {
            abort(404);
        }

        return view("resumos.create", compact("materia", "conteudo"));
    }

    public function store(StoreResumoRequest $request, Materia $materia, Conteudo $conteudo)
    {
        $dados = $request->validated();

        $dados['area'] = $conteudo->area;

        $conteudo->resumos()->create($dados);

        return redirect()
            ->route('resumos.index', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('success', 'Resumo criado com sucesso!');
    }

    public function edit(Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        if ($materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ($conteudo->materia_id !== $materia->id) {
            abort(404);
        }

        if ($resumo->conteudo_id !== $conteudo->id) {
            abort(404);
        }

        return view("resumos.edit", compact("materia", "conteudo", "resumo"));
    }

    public function update(UpdateResumoRequest $request, Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        $dados = $request->validated();

        $dados['area'] = $conteudo->area;

        $resumo->update($dados);

        return redirect()
            ->route('resumos.index', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('success', 'Resumo atualizado com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Resumo $resumo)
    {
        if ($materia->user_id !== Auth::id()) {
            abort(403);
        }

        if ($conteudo->materia_id !== $materia->id) {
            abort(404);
        }

        if ($resumo->conteudo_id !== $conteudo->id) {
            abort(404);
        }

        $resumo->delete();

        return redirect()
            ->route('resumos.index', [$materia, $conteudo])
            ->with('success', 'Resumo excluído com sucesso!');
    }
}