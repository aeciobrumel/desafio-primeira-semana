<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'password' => 'required|string|min:6|max:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/|same:password_confirmation',
            'password_confirmation' => 'required|string|min:6|max:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
        ];
    }
    public function messages(): array
    {
        return [
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, um número e um caractere especial.',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'password.max' => 'A senha deve ter no máximo 8 caracteres.',
            'password.same' => 'A confirmação da senha não confere.',
            'password.required' => 'A senha é obrigatória.',
        ];
    }
}