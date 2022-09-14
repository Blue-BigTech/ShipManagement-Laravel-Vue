<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormBlocks extends Model {
  protected $guarded = [
    'id',
  ];

  public static $restriction = array(
    "katakana"         => "全角カタカナ",
    "hiragana"         => "ひらがな",
    "num"              => "半角数字",
    "alphabet_num"     => "半角英数",
    "alphabet"         => "半角英字",
    "alphabet_num_mix" => "半角英数を混在",
    "num_hyphen"       => "半角数字か半角ハイフンのみ",
    "email"            => "メールアドレス形式",
    "tel"              => "電話番号09000000000",
    "tel_hyphen"       => "電話番号090-0000-0000",
    "zip"              => "郵便番号1001111",
    "zip_hyphen"       => "郵便番号100-1111",
  );

  public static $form_type = array(
    "ja" => [
      "text"            => "テキスト",
      "number"          => "テキスト(数字 type=number)",
      "email"           => "テキスト(メール type=email)",
      "password"        => "テキスト(パスワード type=password)",
      "tel"             => "テキスト(電話番号 type=tel)",
      "url"             => "テキスト(URL type=url)",
      "textarea"        => "複数行テキスト",
      "select"          => "セレクト",
      "multi_select"    => "セレクト（複数選択）",
      "radio"           => "ラジオボタン",
      "checkbox"        => "チェックボックス",
      "file"            => "ファイル",
      "zp_address"      => "郵便番号付き住所",
      "first_last_name" => "姓名別2つの入力欄の氏名",
      "date"            => "日付（type=date）",
      "datetime"        => "日時（type=datetime-local）",
      "month"           => "月（type=month）",
      "time"            => "時刻（type=time）",
    ],
    "en" => [
      "text"            => "text",
      "number"          => "number(type=number)",
      "email"           => "email(type=email)",
      "password"        => "password(type=password)",
      "tel"             => "tel(type=tel)",
      "url"             => "url(type=url)",
      "textarea"        => "textarea",
      "select"          => "select",
      "multi_select"    => "multi_select",
      "radio"           => "radio",
      "checkbox"        => "checkbox",
      "file"            => "file",
      "zp_address"      => "zip with address",
      "first_last_name" => "first name last name",
      "date"            => "date（type=date）",
      "datetime"        => "datetime（type=datetime-local）",
      "month"           => "month（type=month）",
      "time"            => "time（type=time）",
    ],
    "cn" => [
      "text"            => "text",
      "number"          => "number(type=number)",
      "email"           => "email(type=email)",
      "password"        => "password(type=password)",
      "tel"             => "tel(type=tel)",
      "url"             => "url(type=url)",
      "textarea"        => "textarea",
      "select"          => "select",
      "multi_select"    => "multi_select",
      "radio"           => "radio",
      "checkbox"        => "checkbox",
      "file"            => "file",
      "zp_address"      => "zip with address",
      "first_last_name" => "first name last name",
      "calendar"        => "date（type=date）",
      "datetime"        => "datetime（type=datetime-local）",
      "month"           => "month（type=month）",
      "time"            => "time（type=time）",
    ],
  );

  public static $form_type_en = array();

  public static $form_type_cn = array();


}
