<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'cpf' => 'required|unique:users|digits:11',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'paper' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Erro: o nome é obrigatório!',
            'cpf.required' => 'Erro: o CPF é obrigatório!',
            'email.required' => 'Erro: o e-mail é obrigatório!',
            'password.required' => 'Erro: a senha é obrigatória!',
            'cpf.unique' => 'Erro: já existe um registro com este CPF!',
            'email.email' => 'Erro: e-mail inválido!',
            'email.unique' => 'Erro: já existe um registro com este e-mail!',
            'password.min' => 'Erro: a senha precisa possuir ao mínimo 6 caracteres!',
            'cpf.digits' => 'Erro: CPF inválido!',
            'paper.required' => 'Erro: selecione o nível de acesso!'
        ];
    }
}
