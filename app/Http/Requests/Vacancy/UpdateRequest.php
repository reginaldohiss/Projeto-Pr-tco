<?php

namespace App\Http\Requests\Vacancy;

use App\Models\Vacancy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * @return void
     */
    protected function prepareForValidation()
    {
        $input = $this->all();
        $input['uuid'] = $this->route('uuid');
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
            'uuid' => ['required', 'string', Rule::exists(Vacancy::class, 'uuid')]
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
            ],
            'uuid' => [
                'required' => 'uuid é de preenchimento obrigatorio.',
                'string' => 'uuid nome deve ter letras.',
                'exists' => 'uuid informado é inválido'
            ]
        ];
    }
}
