<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'conteudo_id',
        'titulo',
        'descricao',
        'status',
        'prioridade',
        'data_entrega',
    ];
    
    protected $casts = [
        'data_entrega' => 'date',
    ];

    public function conteudo(): BelongsTo
    {
        return $this->belongsTo(Conteudo::class);
    }
}