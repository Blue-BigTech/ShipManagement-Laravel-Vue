<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @param mixed $id
     */
    public function rules()
    {
        $rules = [
            'login_id' => ['required', 'regex:/^[a-zA-Z0-9]{3,16}+$/'],
            'role_id' => 'integer',
            'password' => ['required', 'regex:/^[a-zA-Z0-9]{8,16}+$/'],
            'name' => 'required|string|max:32',
            'kana' => 'nullable|string',
            'email' => ['nullable', 'email', 'max:255',
                Rule::unique('users')->ignore($this->id),
            ],
            'phone' => 'nullable|numeric|digits_between:8,11',
            'created_user_id' => 'nullable|integer|exists:users,id',
            'updated_user_id' => 'nullable|integer|exists:users,id',
            ];

        if (!$this->id) {
            $rules = array_merge($rules, ['password' => ['required', 'regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]([a-zA-Z0-9!@;:]){8,}$/']]);
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'kana' => 'かな',
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'パスワードには、8桁以上、大文字半角英字・小文字半角英字・半角数字、を含むよう指定してください。',
        ];
    }
}
