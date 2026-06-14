<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resumo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'conteudo_id',
        'area',
        'nome',
        'conceito',
        'caracteristicas',
        'tipos_classificacoes',
        'funcoes',
        'exemplos',
        'informacoes_importantes',
        'duvidas',
        'revisao_rapida',
    ];

    public function conteudo()
    {
        return $this->belongsTo(Conteudo::class);
    }
}