<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => ['required', 'confirmed', 'regex:/^(?=.*?\d)[a-zA-Z\d]([a-zA-Z0-9]){5,24}$/'],
            // 'password' => ['required', 'confirmed', 'regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]([a-zA-Z0-9!@;:]){8,16}$/'],
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'パスワード',
        ];
    }

    public function messages()
    {
        return [
            'password.regex' =>  '英数字を含む6文字以上24文字未満でご指定ください。',
            'password.confirmed' => 'パスワードが一致しません。',
        ];
    }
}
