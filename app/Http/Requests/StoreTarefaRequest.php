<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTarefaRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:a_fazer,fazendo,feito',
            'prioridade' => 'required|in:baixa,media,alta',
            'data_entrega' => 'nullable|date|after_or_equal:today',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O título da tarefa é obrigatório.',
            'titulo.max' => 'O título da tarefa não pode ter mais de 255 caracteres.',
            'status.required' => 'O status da tarefa é obrigatório.',
            'status.in' => 'O status selecionado é inválido.',
            'prioridade.required' => 'A prioridade da tarefa é obrigatória.',
            'prioridade.in' => 'A prioridade selecionada é inválida.',
            'data_entrega.date' => 'A data de entrega precisa ser uma data válida.',
        ];
    }
}