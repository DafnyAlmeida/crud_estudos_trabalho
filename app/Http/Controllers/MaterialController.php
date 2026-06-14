<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Material;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;

class MaterialController extends Controller
{
    public function index(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        $materiais = $conteudo->materiais()->latest()->get();

        return view('materiais.index', compact('materia', 'conteudo', 'materiais'));
    }

    public function create(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        return view("materiais.create", compact("materia", "conteudo"));
    }

    public function store(StoreMaterialRequest $request, Materia $materia, Conteudo $conteudo)
    {
        $dados = $request->validated();

        $conteudo->materiais()->create($dados);

        return redirect()
            ->route('materiais.index', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('success', 'Material cadastrado com sucesso!');
    }

    public function edit(Materia $materia, Conteudo $conteudo, Material $material)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        if ((int) $material->conteudo_id !== (int) $conteudo->id) {
            abort(404);
        }

        return view('materiais.edit', compact('materia', 'conteudo', 'material'));
    }

    public function update(UpdateMaterialRequest $request, Materia $materia, Conteudo $conteudo, Material $material)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        if ((int) $material->conteudo_id !== (int) $conteudo->id) {
            abort(404);
        }

        $dados = $request->validated();

        $material->update($dados);

        return redirect()
            ->route('materiais.index', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('success', 'Material atualizado com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Material $material)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ((int) $conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        if ((int) $material->conteudo_id !== (int) $conteudo->id) {
            abort(404);
        }

        $material->delete();

        return redirect()
            ->route('materiais.index', [$materia, $conteudo])
            ->with('success', 'Material excluído com sucesso!');
    }
}