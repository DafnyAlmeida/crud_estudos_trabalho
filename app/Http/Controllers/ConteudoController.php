<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreConteudoRequest;
use App\Http\Requests\UpdateConteudoRequest;

class ConteudoController extends Controller
{
    private function areasConteudo(): array
    {
        return [
            'Física - Cinemática',
            'Física - Dinâmica',
            'Física - Estática',
            'Física - Energia cinética e potencial',
            'Física - Termodinâmica',
            'Física - Óptica',
            'Física - Ondulatória',
            'Física - Eletrostática',
            'Física - Eletrodinâmica',

            'Química - Termoquímica',
            'Química - Estequiometria',
            'Química - Soluções',
            'Química - Ligações químicas',
            'Química - Funções inorgânicas',
            'Química - Química orgânica',
            'Química - Eletroquímica',

            'Biologia - Citologia',
            'Biologia - Genética',
            'Biologia - Ecologia',
            'Biologia - Evolução',
            'Biologia - Fisiologia humana',
            'Biologia - Botânica',
            'Biologia - Zoologia',

            'Matemática - Funções',
            'Matemática - Equações',
            'Matemática - Geometria plana',
            'Matemática - Geometria espacial',
            'Matemática - Trigonometria',
            'Matemática - Probabilidade',
            'Matemática - Estatística',
            'Matemática - Matemática financeira',

            'Português - Gramática',
            'Português - Interpretação de texto',
            'Português - Literatura',
            'Português - Figuras de linguagem',
            'Português - Redação',

            'História - História do Brasil',
            'História - História geral',
            'História - História contemporânea',

            'Geografia - Geografia física',
            'Geografia - Geopolítica',
            'Geografia - Cartografia',
            'Geografia - Urbanização',
            'Geografia - Climatologia',

            'Informática - Programação',
            'Informática - Banco de dados',
            'Informática - Desenvolvimento web',
            'Informática - Redes',
            'Informática - Segurança da informação',

            'Outros',
        ];
    }

    public function create(Materia $materia)
    {
        if ((int) $materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        $areas = $this->areasConteudo();

        $areaSelecionada = old('area');

        return view('conteudos.create', compact('materia', 'areas', 'areaSelecionada'));
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

        $areas = $this->areasConteudo();

        $areaSelecionada = old('area', $conteudo->area);
    
        return view('conteudos.edit', compact(
            'materia',
            'conteudo',
            'areas',
            'areaSelecionada'
        ));
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