<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortRequest extends FormRequest
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
            'city_id' => 'required',
            'port_name' => 'required|string|max:32',
            'port_name_kana' => 'required|string|max:32|regex:/^[ぁ-んー0-9]+$/u',
            'comment' => 'nullable|string',
        ];
    }


    public function attributes()
    {
        return [
            'port_name' => '都道府県名',
            'port_name_kana' => '都道府県名(かな)',
            'comment' => 'コメント',
        ];
    }

    public function messages()
    {
        return [
            'port_name_kana.regex' => '都道府県名(かな)は、ひらがなで指定してください。',
        ];
    }
}
