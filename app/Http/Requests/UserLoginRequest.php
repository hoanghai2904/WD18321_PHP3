<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Để true nếu muốn tất cả người dùng có quyền thực hiện request
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
            'email' => 'bail|required|email|exists:users,email',
            'password' => 'bail|required|min:8'
        ];
    }

    public function messages():array {
        return[
            'email.required' => 'email khong duoc de trong',
            'email.email' => 'email khong dung dinh dang',
            'email.exists' => 'email chua duoc dang ky',
            'password.required' => 'password khong duoc de trong',
            'password.min' => 'password qua ngan',
        ];
    }
}
