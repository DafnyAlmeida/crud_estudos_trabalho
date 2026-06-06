<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{

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
}