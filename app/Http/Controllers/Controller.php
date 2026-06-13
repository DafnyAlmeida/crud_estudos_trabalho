<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Conteudo;
use App\Models\Resumo;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    protected function verificarAcessoResumo(Materia $materia, Conteudo $conteudo, ?Resumo $resumo = null): void
    {

        if ($materia->user_id !== (int) Auth::id()) {
            abort(403);
        }

        if ($conteudo->materia_id !== (int) $materia->id) {
            abort(404);
        }

        if ($resumo && $resumo->conteudo_id !== (int) $conteudo->id) {
            abort(404);
        }
    }
}
