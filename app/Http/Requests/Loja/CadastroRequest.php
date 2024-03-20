<?php

namespace App\Http\Requests\Loja;

use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cnpj' => 'required|string',
            'nome' => 'required|string',
            'razao_social' => 'required|string',
            'responsavel' => 'required|string',
            'telefone' => 'required|string',
            'informacao' => 'required|string',
            'foto' => 'required|string',
            'classificacao_id' => 'required|integer',
        ];
    }
}
