<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'descricao',
        'cor_tema',
        'icone_tema',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function conteudos()
    {
        return $this->hasMany(Conteudo::class);
    }

    public function tarefas()
    {
        return $this->hasManyThrough(
            Tarefa::class,
            Conteudo::class,
            'materia_id',
            'conteudo_id',
            'id',
            'id'
        );
    }
}