<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;
    
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