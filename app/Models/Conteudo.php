<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    protected $fillable = [
        'materia_id',
        'nome',
        'descricao',
        'area',
        'status',
        'nivel_dificuldade',
        'prioridade',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }

    public function materiais()
    {
        return $this->hasMany(Material::class);
    }

    public function resumos()
    {
        return $this->hasMany(Resumo::class);
    }
}