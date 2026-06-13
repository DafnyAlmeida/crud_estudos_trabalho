<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreResumoRequest extends FormRequest
{
    public function authorize(): bool
    {
        $materia = $this->route("materia");
        $conteudo = $this->route("conteudo");

        return $this->user()
            && $materia->user_id === $this->user()->id
            && $conteudo->materia_id === $materia->id;
    }

    // @return array<string, ValidationRule|array<mixed>|string>

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'conceito' => 'nullable|string',
            'caracteristicas' => 'nullable|string',
            'tipos_classificacoes' => 'nullable|string',
            'funcoes' => 'nullable|string',
            'exemplos' => 'nullable|string',
            'informacoes_importantes' => 'nullable|string',
            'duvidas' => 'nullable|string',
            'revisao_rapida' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O título do resumo é obrigatório.',
            'nome.max' => 'O título do resumo não pode ter mais de 255 caracteres.',
        ];
    }
}