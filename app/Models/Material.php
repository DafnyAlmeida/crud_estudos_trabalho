<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiais';

    protected $fillable = [
        'conteudo_id',
        'titulo',
        'descricao',
        'tipo',
        'link',
    ];

    public function conteudo()
    {
        return $this->belongsTo(Conteudo::class, 'conteudo_id');
    }
}