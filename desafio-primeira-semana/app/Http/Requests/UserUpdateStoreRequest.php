<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\PermissionLevel;

class UserUpdateStoreRequest extends FormRequest
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
        $userId = $this->route('id');
        $data = [
            'name' => 'required|string|max:255',
            'permission' => ['required',new Enum(PermissionLevel::class)],
            'email' => 'required|email|unique:users,email' .($userId ? ',' . $userId : ''),
        ];  //se email tiver user id anula ele
        if ($this->isMethod('post')) {
            $data['password'] = 'required|min:6|same:confirm_password';
            $data['confirm_password'] = 'required';
        }
        if ($this->isMethod('put')) {
            if ($this->filled('password')) {
                $data['password'] = 'min:6|same:confirm_password';
                $data['confirm_password'] = 'required';
            }
        }
        return $data;
    }
}
