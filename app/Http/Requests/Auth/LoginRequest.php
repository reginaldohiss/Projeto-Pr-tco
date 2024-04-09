<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::exists(User::class, 'email')],
            'password' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'email' => [
                'required' => 'Email é de preenchimento obrigatorio.',
                'email' => 'Email inválido',
                'exists' => 'Nenhum registro encontrado.',
            ],
            'password' => [
                'required' => 'Senha é de preenchimento obrigatorio.',
            ]
        ];
    }
}
