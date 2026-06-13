<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialRequest extends FormRequest
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
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'tipo' => ['required', 'in:pdf,link,video,imagem'],
            'link' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O título do material é obrigatório.',
            'titulo.max' => 'O título do material não pode ter mais de 255 caracteres.',
            'tipo.required' => 'O tipo do material é obrigatório.',
            'tipo.in' => 'O tipo selecionado é inválido.',
        ];
    }
}
