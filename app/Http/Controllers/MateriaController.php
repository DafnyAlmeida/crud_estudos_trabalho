<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{

    public function index()
    {
        $nome_user = auth()->user()->name;
        $materias = auth()->user()->materias()->latest()->get();
        return view('dashboard', compact("materias", "nome_user"));
    }

    public function create()
    {
        return view("materias.create");
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'cor_tema' => 'required|string|max:20',
            'icone_tema' => 'nullable|string|max:255',
        ]);

        $dados['user_id'] = auth()->id();
        $dados['status'] = 'ativa';

        Materia::create($dados);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Matéria criada com sucesso!');
    }

    public function show(Materia $materia)
    {
        if ($materia->user_id !== auth()->id()) {
            abort(403);
        }

        $conteudos = $materia->conteudos()->latest()->get();

        return view('materias.show', compact('materia', 'conteudos'));
    }

    public function edit(string $id)
    {
        $materia = Materia::findOrFail($id);
        return view("materias.edit", compact("materia"));
    }

    public function update(Request $request, Materia $materia)
    {
        if ($materia->user_id !== auth()->id()) {
            abort(403);
        }

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'cor_tema' => 'required|string|max:20',
            'icone_tema' => 'nullable|string|max:255',
            'status' => 'required|in:ativa,arquivada',
        ]);

        $materia->update($dados);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Matéria atualizada com sucesso!');
    }

    public function destroy(Materia $materia)
    {
        if ($materia->user_id !== auth()->id()) {
            abort(403);
        }

        $materia->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Matéria apagada com sucesso!');
    }
}
