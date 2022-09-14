<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Attributes
  |--------------------------------------------------------------------------
  |
  | The following language lines are used to swap attribute place-holders
  | with something more reader friendly such as E-Mail Address instead
  | of "email". This simply helps us make messages a little cleaner.
  |
  */

  'attributes' => [
    'email'               => 'メールアドレス',
    'new_email'           => '新しいメールアドレス',
    'login_email'         => 'ログインメールアドレス',
    'password'            => 'パスワード',
    'new_password'        => '新しいパスワード',
    'login_password'      => 'ログインパスワード',
    'name'                => 'お名前',
    'furigana'            => 'フリガナ',
    'kana_furigana'       => 'ふりがな',
    'zip'                 => '郵便番号',
    'pref'                => '都道府県',
    'address'             => '住所',
    'address2'            => '市区町村(番地・マンション名含む)　　○○市○○区○○○町1-1',
    'tel'                 => '電話番号',
    'email'               => 'メールアドレス',
    'conf_email'          => 'メールアドレス確認用',
    'contents'            => 'お問い合せ内容',
    'attach_image'        => '添付画像',
    'last_name'           => '姓',
    'first_name'          => '名',
    'last_name_furigana'  => 'フリガナ姓',
    'first_name_furigana' => 'フリガナ名',
    'fax'                 => 'FAX番号',
    'company_name'        => '会社名',
    'staff_name'          => '担当者名',
    'official_position'   => '役職',
    'lastname_kana'       => 'セイ',
    'firstname_kana'      => 'メイ',
    'conf_btn'            => '確認',
    'back_btn'            => '戻る',
    'send_btn'            => '送信',
    'zp_address'          => '住所',
    'first_last_name'     => '氏名',
    'form_message1'       => '下記に必要事項をご入力の上、お問い合わせください。',
    'form_message2'       => 'は必須事項です。',
    'form_message3'       => '内容にお間違いがなければ「送信」ボタンをクリックしてください。',
    'form_message4'       => '上記の内容でよろしければ送信ボタンを押してください。<br>間違っている場合修正してください。',
    'public_end_date'     => '終了日時',
    'public_start_date'   => '開始日時',
  ],

  "katakana"                       => ":attributeはカタカナで入力してください",
  "katakana_space"                 => ":attributeはカタカナ（タブ、スペース）で入力してください",
  "num_hyphen"                     => ":attributeは数字（ハイフン可）で入力してください",
  "num_decimal"                    => ":attributeは小数点を含む数字（正の数のみ）で入力してください",
  "forbidden_charecters"           => ":attributeは禁止文字になっています。",
  "forbidden_charecters_msg"       => "は禁止文字になっています。",
  "alphabet_num_hyphen_underscore" => ":attributeは英数字（ハイフン・アンダースコア可）で入力してください",
  "alphabet_num_underscore"        => ":attributeは英数字（アンダースコア可）で入力してください",
  "alphabet_num_symbol"            => ":attributeは英数字（記号可）で入力してください",
  "alphabet_num_mix"               => ":attributeは英数字混在で入力してください",
  "hiragana"                       => ":attributeはひらがなで入力してください",
  "hiragana_space"                 => ":attributeはひらがな（スペース可）で入力してください",
  "admin_password"                 => ":attributeは半角英数混在（アンダースコア可）、8文字以上32文字以下で入力してください",
  "not_match_error_msg"            => ":attributeが一致しません",

  'length_error_msg'                       => "文字数を確認してください",
  'required_error_msg'                     => ":attributeは必須入力です",
  'restriction_error_msg'                  => "入力値をご確認ください",
  're_enter_error_msg'                     => ":attributeの入力値が一致しません",
  'file_capacity_limit_error_msg'          => "ファイルの容量が大きすぎます",
  "restriction_input_error_msg"            => ":attributeで入力してください",
  "restriction_katakana_error_msg"         => "全角カタカナで入力してください",
  "restriction_hiragana_error_msg"         => "ひらがなで入力してください",
  "restriction_num_error_msg"              => "半角数字で入力してください",
  "restriction_alphabet_num_error_msg"     => "半角英数で入力してください",
  "restriction_alphabet_error_msg"         => "半角英字で入力してください",
  "restriction_alphabet_num_mix_error_msg" => "半角英数を混在して入力してください",
  "restriction_num_hyphen_error_msg"       => "半角数字か半角ハイフンのみで入力してください",
  "restriction_email_error_msg"            => "メールアドレス形式で入力してください",
  "restriction_tel_error_msg"              => ":attributeは09000000000形式で入力してください",
  "restriction_tel_hyphen_error_msg"       => ":attributeは090-0000-0000形式で入力してください",
  "restriction_zip_error_msg"              => ":attributeは1001111形式で入力してください",
  "restriction_zip_hyphen_error_msg"       => ":attributeは100-1111形式で入力してください",
  "js_file_limit_error_msg"                => "ファイルの容量が大きすぎます",
  "js_file_extension_error_msg"            => "アップロードファイルの拡張子を確認して下さい",
  "js_input_error_msg"                     => "入力内容をご確認ください",


  /*
  |--------------------------------------------------------------------------
  | Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | The following language lines contain the default error messages used by
  | the validator class. Some of these rules have multiple versions such
  | as the size rules. Feel free to tweak each of these messages here.
  |
  */

  'accepted'             => ':attributeを承認してください',
  'active_url'           => ':attributeには有効なURLを指定してください',
  'after'                => ':attributeには:date以降の日付を指定してください',
  'after_or_equal'       => ':attributeには:dateかそれ以降の日付を指定してください',
  'alpha'                => ':attributeには英字のみからなる文字列を指定してください',
  'alpha_dash'           => ':attributeには英数字・ハイフン・アンダースコアのみからなる文字列を指定してください',
  'alpha_num'            => ':attributeには英数字のみからなる文字列を指定してください',
  'array'                => ':attributeには配列を指定してください',
  'before'               => ':attributeには:date以前の日付を指定してください',
  'before_or_equal'      => ':attributeには:dateかそれ以前の日付を指定してください',
  'between'              => [
    'numeric' => ':attributeには:min〜:maxまでの数値を入力してください',
    'file'    => ':attributeには:min〜:max KBのファイルを入力してください',
    'string'  => ':attributeには:min〜:max文字の文字を入力してください',
    'array'   => ':attributeには:min〜:max個の要素を持つ配列を入力してください',
  ],
  'boolean'              => ':attributeには真偽値を指定してください',
  'confirmed'            => ':attributeが確認用の値と一致しません',
  'date'                 => ':attributeには正しい形式の日付を指定してください',
  'date_format'          => '":format"という形式の日付を指定してください',
  'different'            => ':attributeには:otherとは異なる値を指定してください',
  'digits'               => ':attributeには:digits桁の数値を指定してください',
  'digits_between'       => ':attributeには:min〜:max桁の数値を指定してください',
  'dimensions'           => ':attributeの画像サイズが不正です',
  'distinct'             => '指定された:attributeは既に存在しています',
  'email'                => ':attributeには正しい形式のメールアドレスを指定してください',
  'phone'                => ':attributeには半角数字9~11個の数字で入力してください。',
  'zipcode'              => ':attributeには半角数字7個の数字で入力してください。',
  'exists'               => '指定された:attributeは存在しません',
  'file'                 => ':attributeにはファイルを指定してください',
  'filled'               => ':attributeには空でない値を指定してください',
  'image'                => ':attributeには画像ファイルを指定してください',
  'in'                   => ':attributeには:valuesのうちいずれかの値を指定してください',
  'in_array'             => ':attributeが:otherに含まれていません',
  'integer'              => ':attributeには整数を指定してください',
  'ip'                   => ':attributeには正しい形式のIPアドレスを指定してください',
  'ipv4'                 => ':attributeには正しい形式のIPv4アドレスを指定してください',
  'ipv6'                 => ':attributeには正しい形式のIPv6アドレスを指定してください',
  'json'                 => ':attributeには正しい形式のJSON文字列を指定してください',
  'max'                  => [
    'numeric' => ':attributeには:max以下の数値を入力してください',
    'file'    => ':attributeには:max KB以下のファイルを指定してください',
    'string'  => ':attributeには:max文字以下の文字列を入力してください',
    'array'   => ':attributeには:max個以下の要素を持つ配列を指定してください',
  ],
  'mimes'                => ':attributeには:valuesのうちいずれかの形式のファイルを指定してください',
  'mimetypes'            => ':attributeには:valuesのうちいずれかの形式のファイルを指定してください',
  'min'                  => [
    'numeric' => ':attributeには:min以上の数値を指定してください',
    'file'    => ':attributeには:min KB以上のファイルを指定してください',
    'string'  => ':attributeには:min文字以上の文字列を入力してください',
    'array'   => ':attributeには:min個以上の要素を持つ配列を指定してください',
  ],
  'not_in'               => ':attributeには:valuesのうちいずれとも異なる値を指定してください',
  'numeric'              => ':attributeには数値を指定してください',
  'present'              => ':attributeには現在時刻を指定してください',
  'regex'                => '正しい形式の:attributeを指定してください',
  'required'             => ':attributeは必須です',
  'required_if'          => ':otherが:valueの時:attributeは必須です',
  'required_unless'      => ':otherが:values以外の時:attributeは必須です',
  'required_with'        => ':valuesのうちいずれかが指定された時:attributeは必須です',
  'required_with_all'    => ':valuesのうちすべてが指定された時:attributeは必須です',
  'required_without'     => ':valuesのうちいずれかがが指定されなかった時:attributeは必須です',
  'required_without_all' => ':valuesのうちすべてが指定されなかった時:attributeは必須です',
  'same'                 => ':attributeが:otherと一致しません',
  'size'                 => [
    'numeric' => ':attributeには:sizeを指定してください',
    'file'    => ':attributeには:size KBのファイルを指定してください',
    'string'  => ':attributeには:size文字の文字列を指定してください',
    'array'   => ':attributeには:size個の要素を持つ配列を指定してください',
  ],
  'string'               => ':attributeには文字列を指定してください',
  'timezone'             => ':attributeには正しい形式のタイムゾーンを指定してください',
  'unique'               => 'その:attributeはすでに使われています',
  'uploaded'             => ':attributeのアップロードに失敗しました',
  'url'                  => ':attributeには正しい形式のURLを指定してください',

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | Here you may specify custom validation messages for attributes using the
  | convention "attribute.rule" to name the lines. This makes it quick to
  | specify a specific custom language line for a given attribute rule.
  |
  */

  'custom' => [
    'attribute-name' => [
      'rule-name' => 'custom-message',
    ],
  ],


];
