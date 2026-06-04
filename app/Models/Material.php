<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'conteudo_id',
        'titulo',
        'descricao',
        'tipo',
        'link',
        'drive_file_id',
    ];

    public function conteudo()
    {
        return $this->belongsTo(Conteudo::class);
    }
}