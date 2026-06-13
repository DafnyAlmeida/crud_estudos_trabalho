<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMateriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        $materia = $this->route('materia');

        return $this->user()
            && $materia
            && (int) $materia->user_id === (int) $this->user()->id;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'cor_tema' => 'required|string|max:20',
            'icone_tema' => 'nullable|string|max:255',
            'status' => 'required|in:ativa,arquivada',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome da matéria é obrigatório.',
            'nome.max' => 'O nome da matéria não pode ter mais de 255 caracteres.',
            'cor_tema.required' => 'A cor do tema é obrigatória.',
            'cor_tema.max' => 'A cor do tema não pode ter mais de 20 caracteres.',
            'icone_tema.max' => 'O ícone não pode ter mais de 255 caracteres.',
            'status.required' => 'O status da matéria é obrigatório.',
            'status.in' => 'O status selecionado é inválido.',
        ];
    }
}