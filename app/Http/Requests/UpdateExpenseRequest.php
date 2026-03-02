<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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
        $expenses = $this->route('expense');
        return [
            'name' => 'required|unique:expenses,name,' . ($expenses->id ? $expenses->id : null),
            'value' => 'required',
            'payment_deadline_id' => 'required',
            'installment_id' => 'required',
            'payment_method_id' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Erro: a despesa é obrigatória!',
            'name.unique' => 'Erro: esta despesa já existe!',
            'payment_deadline_id.required' => 'Erro: a data de vencimento é obrigatória!',
            'installment_id.required' => 'Erro: o parcelamento é obrigatório!',
            'payment_method_id.required' => 'Erro: o método de pagamento é obrigatório!',
            'category_id.required' => 'Erro: a categoria é obrigatória!'
        ];
    }
}
