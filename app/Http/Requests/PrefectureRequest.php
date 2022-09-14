<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrefectureRequest extends FormRequest
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
            'prefecture_name' => 'required|string|max:32',
            'prefecture_name_kana' => 'required|string|max:32|regex:/^[ぁ-んー0-9]+$/u',
            'url_param' => 'required|string|max:32',
            'comment' => 'nullable|string',
        ];
    }


    public function attributes()
    {
        return [
            'prefecture_name' => '都道府県名',
            'prefecture_name_kana' => '都道府県名(かな)',
            'url_param' => 'URLディレクトリ名',
            'comment' => 'コメント',
        ];
    }

    public function messages()
    {
        return [
            'prefecture_name_kana.regex' => '都道府県名(かな)は、ひらがなで指定してください。',
        ];
    }
}
