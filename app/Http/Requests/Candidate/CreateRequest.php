<?php

namespace App\Http\Requests\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $input = $this->all();
        $this->replace($input);
    }

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
            'nome' => ['required', 'string'],
            'vaga' => ['required'],
            'status' => ['required', 'string', 'in:Ativo,Inativo'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome' => [
                'required' => 'campo nome é de preenchimento obrigatorio.',
                'string' => 'campo nome deve ter letras.'
            ],
            'vaga' => [
                'required' => 'campo regime é de preenchimento obrigatorio.',
            ],
            'status' => [
                'required' => 'campo status é de preenchimento obrigatorio.',
                'string' => 'campo status deve ter letras.',
                'in' => 'campo status consiste valor inválido.'
            ]
        ];
    }
}
