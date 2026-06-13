<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConteudoRequest extends FormRequest
{
    public function authorize(): bool
    {
        $materia = $this->route('materia');
        $conteudo = $this->route('conteudo');

        return $this->user()
            && $materia
            && $conteudo
            && (int) $materia->user_id === (int) $this->user()->id
            && (int) $conteudo->materia_id === (int) $materia->id;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'area' => 'nullable|string|max:255',
            'status' => 'required|in:iniciado,nao_iniciado,em_andamento,concluido',
            'nivel_dificuldade' => 'required|in:basico,intermediario,avancado',
            'prioridade' => 'required|in:alta,media,baixa',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do conteúdo é obrigatório.',
            'nome.max' => 'O nome do conteúdo não pode ter mais de 255 caracteres.',
            'status.required' => 'O status do conteúdo é obrigatório.',
            'status.in' => 'O status selecionado é inválido.',
            'nivel_dificuldade.required' => 'O nível de dificuldade é obrigatório.',
            'nivel_dificuldade.in' => 'O nível de dificuldade selecionado é inválido.',
            'prioridade.required' => 'A prioridade é obrigatória.',
            'prioridade.in' => 'A prioridade selecionada é inválida.',
        ];
    }
}