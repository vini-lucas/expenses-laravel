<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
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
            'bank' => 'required',
            'end' => 'required|digits:4'
        ];
    }

    public function messages()
    {
        return [
            'bank.required' => 'Erro: o banco é obrigatório!',
            'end.required' => 'Erro: informe os 4 últimos dígitos do cartão!',
            'end.digits' => 'Erro: informe somente os últimos 4 dígitos!'
        ];
    }
}
