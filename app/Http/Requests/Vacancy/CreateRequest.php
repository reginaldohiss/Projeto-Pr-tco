<?php

namespace App\Http\Requests\Vacancy;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * @return void
     */
    protected function prepareForValidation()
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
            'regime' => ['required', 'string', 'in:CLT,Juridica,Freelancer'],
            'status' => ['required', 'string', 'in:Ativo,Pausado'],
        ];
    }

    /**
     * @return array[]
     */
    public function messages(): array
    {
        return [
            'nome' => [
                'required' => 'campo nome é de preenchimento obrigatorio.',
                'string' => 'campo nome deve ter letras.'
            ],
            'regime' => [
                'required' => 'campo regime é de preenchimento obrigatorio.',
                'string' => 'campo regime deve ter letras.',
                'in' => 'campo regime consiste valor inválido.'
            ],
            'status' => [
                'required' => 'campo status é de preenchimento obrigatorio.',
                'string' => 'campo status deve ter letras.',
                'in' => 'campo status consiste valor inválido.'
            ]
        ];
    }
}
