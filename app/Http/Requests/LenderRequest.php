<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LenderRequest extends FormRequest
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
        // $test = $this->input();
        $rules = [
            'user.name' => 'required|string|max:32',
            'user.name_kana' => 'required|string|max:32',
            'user.email' => ['required','string','max:64', Rule::unique('users', 'users.email')->ignore($this->user_id) ],
            'user.role_id' => 'required|integer',
            'member_type_id' => 'required|integer',
            'zip_code' => 'required|string|max:8|regex:/^[0-9]{3}-[0-9]{4}$/',
            'prefecture_id' => 'required|integer',
            'city_id' => 'required|integer',
            'address' => 'required|string|max:32',
            'port_id' => 'required|integer',
            'map_url' => 'nullable|string',
            'access_example' => 'nullable|string|max:255',
            'phone' => ['required','regex:/^0[0-9]{1,4}-[0-9]{1,4}-[0-9]{3,4}\z/'],
            'hp_url' => 'nullable|string',
            'price' => 'nullable|string|max:255',
            'parking' => 'nullable|string|max:255',
            'permission_img' => 'nullable|string|max:255',
            'boat_number' => 'required|integer',
            'other' => 'nullable',
            'boats.*.boat_name' => 'required|string|max:32',
            'boats.*.boat_name_kana' => 'required|string|max:32',
            'boats.*.fishing_area' => 'required|string',
            'boats.*.capacity' => 'required|integer',
            'boats.*.departure' => 'required|string',
            'boats.*.fishing_point' => 'nullable|string',
            'boats.*.tackle' => 'nullable|string',
            'boats.*.length' => 'nullable|integer',
            'boats.*.weight' => 'nullable|integer',
            'boats.*.caption_comment' => 'nullable|string',
            // 画像チェック
            'boat_image_list.0.image_src' => 'required',
            'boat_image_list.1.image_src' => 'nullable',
            'boat_image_list.2.image_src' => 'nullable',
            'boat_image_list.3.image_src' => 'nullable',
            'boat_image_list.4.image_src' => 'nullable',
            'permission_image_list.0.image_src' => 'nullable',
        ];

        if (!$this->id) {
            // $rules = array_merge($rules, ['user.password' => ['required', 'regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]([a-zA-Z0-9!@;:]){7,16}$/']]);
            $rules = array_merge($rules, ['user.password' => ['required', 'regex:/^(?=.*?\d)[a-zA-Z\d]([a-zA-Z0-9]){5,24}$/']]);
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'user.name' => '名前',
            'user.name_kana' => '名前(かな)',
            'user.email' => 'メール',
            'user.password' => 'パスワード',
            'user.role_id' => '権限',
            'member_type_id' => '表示箇所',
            'zip_code' => '郵便番号',
            'prefecture_id' => '都道府県',
            'city_id' => '市町村',
            'address' => '所番地',
            'port_id' => '港',
            'map_url' => 'googleMap',
            'access_example' => 'アクセス説明',
            'phone' => '電話番号',
            'hp_url' => 'ホームページ',
            'price' => '料金',
            'parking' => '駐車場',
            'permission_img' => '許可証',
            'boat_number' => '船数',
            'other' => '備考',
            'boats.*.boat_name' => '船名',
            'boats.*.boat_name_kana' => '船名(かな)',
            'boats.*.fishing_area' => '対応エリア',
            'boats.*.capacity' => '最大定員',
            'boats.*.departure' => '出航時間',
            'boats.*.fishing_point' => '釣り座',
            'boats.*.tackle' => '貸タックル',
            'boats.*.length' => '全長',
            'boats.*.weight' => '重量',
            'boats.*.caption_comment' => '船長コメント',
            'boat_image_list.0.image_src' => '船画像1枚目',
            'permission_image_list.0.image_src' => '営業許可証',
        ];
    }

    public function messages()
    {
        return [
            'user.password.regex' => '英数字を含む6文字以上24文字未満でご指定ください。',
            'zip_code.regex' => '郵便番号は、ハイフンを含む半角数字でご指定ください（3桁-4桁）。',
            'phone.regex' => '電話番号は、半角数字、「-」(ハイフン)を含む正しい電話番号をご指定ください。',
        ];
    }
}
