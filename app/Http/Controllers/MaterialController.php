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

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $materiais = $conteudo->materiais()->latest()->get();

        return view('materiais.index', compact('materia', 'conteudo', 'materiais'));
    }

    public function create(Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        return view('materiais.create', compact('materia', 'conteudo'));
    }

    public function store(StoreMaterialRequest $request, Materia $materia, Conteudo $conteudo)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $conteudo->materiais()->create($request->validated());

        return redirect()
            ->route('materiais.index', [$materia, $conteudo])
            ->with('success', 'Material cadastrado com sucesso!');
    }

    public function edit(Materia $materia, Conteudo $conteudo, Material $material)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $material = $conteudo->materiais()->findOrFail($material->id);

        return view('materiais.edit', compact('materia', 'conteudo', 'material'));
    }

    public function update(UpdateMaterialRequest $request, Materia $materia, Conteudo $conteudo, Material $material)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $material = $conteudo->materiais()->findOrFail($material->id);

        $material->update($request->validated());

        return redirect()
            ->route('materiais.index', [$materia, $conteudo])
            ->with('success', 'Material atualizado com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Material $material)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $conteudo = $materia->conteudos()->findOrFail($conteudo->id);

        $material = $conteudo->materiais()->findOrFail($material->id);

        $material->delete();

        return redirect()
            ->route('materiais.index', [$materia, $conteudo])
            ->with('success', 'Material excluído com sucesso!');
    }
}