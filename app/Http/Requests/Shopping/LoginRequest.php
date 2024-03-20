<?php

namespace App\Http\Requests\Shopping;

use App\Models\ShoppingModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cnpj' => [
                'required',
                'min:8',
                function ($attribute, $value, $fail) {
                    $shopping = ShoppingModel::where('cnpj', $value)->exists();
                    if (!$shopping) {
                        $fail('CNPJ inválido.');
                    }
                }
            ],
            'senha' => [
                'required',
                'min:8',
                function ($attribute, $value, $fail) {
                    $shopping = ShoppingModel::where('senha', $value)->exists();
                    if (!$shopping) {
                        $fail('Senha inválida.');
                    }
                }
            ]
        ];
    }
}
