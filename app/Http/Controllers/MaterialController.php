<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Material;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Materia $materia, Conteudo $conteudo)
    {
        return view("materiais.create", compact("materia", "conteudo"));
    }

    public function store(Request $request, Materia $materia, Conteudo $conteudo)
    {
        $dados = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'tipo' => ['required', 'in:pdf,link,video,imagem'],
            'link' => ['nullable', 'string', 'max:255'],
        ]);

        $dados['conteudo_id'] = $conteudo->id;

        Material::create($dados);

        return redirect()
            ->route('conteudos.show', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('sucesso', 'Material cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Materia $materia, Conteudo $conteudo, Material $material)
    {
        return view('materiais.edit', [
            'materia' => $materia,
            'conteudo' => $conteudo,
            'material' => $material,
        ]);
    }

    public function update(Request $request, Materia $materia, Conteudo $conteudo, Material $material)
    {
        if ($material->conteudo_id !== $conteudo->id) {
            abort(404);
        }

        $dados = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'tipo' => ['required', 'in:pdf,link,video,imagem'],
            'link' => ['nullable', 'string', 'max:255'],
        ]);

        $material->update($dados);

        return redirect()
            ->route('conteudos.show', [
                'materia' => $materia->id,
                'conteudo' => $conteudo->id,
            ])
            ->with('sucesso', 'Material atualizado com sucesso!');
    }

    public function destroy(Materia $materia, Conteudo $conteudo, Material $material)
    {
        $material->delete();

        return redirect()
            ->route('conteudos.show', [$materia, $conteudo])
            ->with('sucesso', 'Material excluído com sucesso!');
    }
}
