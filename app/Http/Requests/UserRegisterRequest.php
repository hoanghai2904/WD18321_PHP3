<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
        // bai 1
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];

        // bai 2
        // return[
        //     'email' => 'required|email|unique:users,email,'. $this->userId,
        //     'age' => 'nullable|min:18|max:100|interger',
        //     'avatar' => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        // ];

        // bai 3
        // return[
        //     'is_shipping_address_same' => 'required|boolean' ,
        //     'shipping_address' =>  'required_if:is_shipping_address_same,true'
        // ];

        // bai 4
        // return[
        //     'user_id' => 'required|exists:user,id',
        //     'vote_star' =>'required|interger|min:1,max:5',
        //     'feedback' => 'required|string|min:50,max:500',
        // ];

        // bai 5
        // return [
        //     'name' =>'required|string|min:5,max:20',
        //     'birth_day' => 'required|date_format:Y-m-d',
        //     'province' => 'string|nullable',
        //     'district' => 'required_with::province|string',

        // ];
    }
}
