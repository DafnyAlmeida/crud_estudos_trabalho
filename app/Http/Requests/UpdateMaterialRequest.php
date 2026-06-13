<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        $materia = $this->route("materia");
        $conteudo = $this->route("conteudo");
        $material = $this->route("material");

        return $this->user()
            && $materia
            && $conteudo
            && $material
            && (int) $materia->user_id === (int) $this->user()->id
            && (int) $conteudo->materia_id === (int) $materia->id
            && (int) $material->conteudo_id === (int) $conteudo->id;
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
