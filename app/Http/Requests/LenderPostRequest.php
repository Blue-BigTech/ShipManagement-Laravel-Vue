<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LenderPostRequest extends FormRequest
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
            'title' => 'required',
            'comment' => 'required',
            'image_list.0.image_src' => 'required',
            // 'image_list.1.image_src' => 'required',
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'comment' => 'コメント',
            'image_list.0.image_src' => '画像',
        ];
    }

    public function messages()
    {
        return [
            // 'boats.0.boat_name.required' =>  '入力内容に誤りがあります。',
        ];
    }
}
