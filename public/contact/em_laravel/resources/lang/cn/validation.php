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
    'email'               => '电子邮件地址',
    'new_email'           => '新电子邮件地址',
    'login_email'         => '登录电子邮件地址',
    'password'            => '密码',
    'new_password'        => '新密码',
    'login_password'      => '登录密码',
    'name'                => '姓名',
    'furigana'            => '片假名',
    'zip'                 => '邮政编码',
    'pref'                => '都道府县',
    'address'             => '地址',
    'address2'             => '地址',
    'tel'                 => '电话号码',
    'email'               => '电子邮件地址',
    'conf_email'          => '电子邮件地址确认用',
    'contents'            => '咨询内容',
    'attach_image'        => '附加图像',
    'last_name'           => '姓',
    'first_name'          => '名',
    'last_name_furigana'  => '片假名姓',
    'first_name_furigana' => '片假名名',
    'fax'                 => '传真号码',
    'company_name'        => '公司名称',
    'staff_name'          => '负责人姓名',
    'official_position'   => '职务',
    'lastname_kana'       => '姓',
    'firstname_kana'      => '名',
    'conf_btn'            => '确认',
    'back_btn'            => '返回',
    'send_btn'            => '发送',
    'zp_address'          => '地址',
    'first_last_name'     => '姓名',
    'form_message1'       => '请在下面输入必要事项后进行咨询',
    'form_message2'       => '为必填项',
    'form_message3'       => '如果内容没有错误，请点击“发送”按钮',
    'form_message4'       => '如果内容没有错误，请点击“发送”按钮',
    'public_end_date'   => 'end date',
    'public_start_date' => 'start date',
  ],

  "katakana"                       => "请用片假名输入:attribute",
  "katakana_space"                 => "请用片假名(标签、空格)输入:attribute",
  "num_hyphen"                     => "请用数字(可用连字符)输入:attribute",
  "num_decimal"                    => "请用包含小数点的数字(仅限正数)输入:attribute",
  "forbidden_charecters"           => ":attribute is Forbidden characters",
  "forbidden_charecters_msg"       => "is Forbidden characters",
  "alphabet_num_hyphen_underscore" => "请用字母数字(可用连字符、下划线)输入:attribute",
  "alphabet_num_underscore"        => "请用字母数字(可用下划线)输入:attribute",
  "alphabet_num_symbol"            => "请用字母数字(可用符号)输入:attribute",
  "alphabet_num_mix"               => "请用字母数字混合的方式输入:attribute",
  "hiragana"                       => "请用平假名输入:attribute",
  "hiragana_space"                 => "请用平假名(可用空格)输入:attribute",
  "admin_password"                 => "请用8个字符以上32个字符以下的半角字母数字(可用下划线)输入:attribute",
  "not_match_error_msg"            => ":attribute不一致",

  'length_error_msg'                       => "请确认字符数",
  'required_error_msg'                     => ":attribute为必填项",
  'restriction_error_msg'                  => "请确认输入值",
  're_enter_error_msg'                     => ":attribute的输入值不一致",
  'file_capacity_limit_error_msg'          => "文件容量太大。",
  "restriction_input_error_msg"            => "请用:attribute输入",
  "restriction_katakana_error_msg"         => "请用全角片假名输入",
  "restriction_hiragana_error_msg"         => "请用平假名输入",
  "restriction_num_error_msg"              => "请用半角数字输入",
  "restriction_alphabet_num_error_msg"     => "请用半角字母数字输入",
  "restriction_alphabet_error_msg"         => "请用半角字母输入",
  "restriction_alphabet_num_mix_error_msg" => "请用混合了半角字母和数字的方式输入",
  "restriction_num_hyphen_error_msg"       => "请仅用半角数字或半角连字符输入",
  "restriction_email_error_msg"            => "请按电子邮件地址格式输入",
  "restriction_tel_error_msg"              => "请按电话号码09000000000格式输入",
  "restriction_tel_hyphen_error_msg"       => "请按电话号码090-0000-0000格式输入",
  "restriction_zip_error_msg"              => "请按邮政编码1001111格式输入",
  "restriction_zip_hyphen_error_msg"       => "请按邮政编码100-1111格式输入",
  "js_file_limit_error_msg"                => "文件容量太大",
  "js_file_extension_error_msg"            => "请确认上传文件的扩展名",
  "js_input_error_msg"                     => "请确认输入内容",


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

  'accepted'             => '请批准:attribute',
  'active_url'           => '请在:attribute中输入有效的URL',
  'after'                => '请在:attribute中输入:date以后的日期',
  'after_or_equal'       => '请在:attribute中输入:date或:date以后的日期',
  'alpha'                => '请在:attribute中输入只由字母组成的字符串',
  'alpha_dash'           => '请在:attribute中输入只由字母数字、连字符和下划线组成的字符串',
  'alpha_num'            => '请在:attribute中输入只由字母数字组成的字符串',
  'array'                => '请为:attribute指定数组',
  'before'               => '请在:attribute中输入:date以前的日期',
  'before_or_equal'      => '请在:attribute中输入:date或:date以前的日期',
  'between'              => [
    'numeric' => '请在:attribute中输入:min〜:max的数值',
    'file'    => '请在:attribute中输入:min〜:maxKB的文件',
    'string'  => '请在:attribute中输入:min〜:max字符的字符',
    'array'   => '请在:attribute中指定具有:min〜:max个要素的数组',
  ],
  'boolean'              => '请在:attribute中输入布尔值',
  'confirmed'            => ':attribute与确认用的值不一致',
  'date'                 => '请在:attribute中输入正确格式的日期',
  'date_format'          => '请输入:form:attributet格式的日期',
  'different'            => '请在:attribute中输入与:other不同的值',
  'digits'               => '请在:attribute中输入:digits位数的数值',
  'digits_between'       => '请在:attribute中输入:min〜:max位数的数值',
  'dimensions'           => ':attribute的图像大小不正确',
  'distinct'             => '指定的:attribute已经存在',
  'email'                => '请在:attribute中输入正确格式的电子邮件地址',
  'exists'               => '指定的:attribute不存在',
  'file'                 => '请为:attribute指定文件',
  'filled'               => '请在:attribute中输入非空值',
  'image'                => '请为:attribute指定图像文件',
  'in'                   => '请为:attribute指定:values中的任意一个值',
  'in_array'             => ':attribute不包含在:other中',
  'integer'              => '请在:attribute中输入整数',
  'ip'                   => '请在:attribute中输入正确格式的IP地址',
  'ipv4'                 => '请在:attribute中输入正确格式的IPv4地址',
  'ipv6'                 => '请在:attribute中输入正确格式的IPv6地址',
  'json'                 => '请为:attribute指定正确格式的JSON字符串',
  'max'                  => [
    'numeric' => '请在:attribute中输入:max以下的数值',
    'file'    => '请为:attribute指定:maxKB以下的文件',
    'string'  => '请在:attribute中输入:max字符以下的字符串',
    'array'   => '请为:attribute指定具有:max个以下元素的数组',
  ],
  'mimes'                => '请为:attribute指定:values的任意格式的文件',
  'mimetypes'            => '请为:attribute指定:values的任意格式的文件',
  'min'                  => [
    'numeric' => '请在:attribute中请输入:min以上的数值',
    'file'    => '请为:attribute指定:minKB以上的文件',
    'string'  => '请在:attribute中输入:min字符以上的字符串',
    'array'   => '请为:attribute指定具有:min个以上元素的数组',
  ],
  'not_in'               => '请在:attribute中输入与:values中的任意值都不同的值',
  'numeric'              => '请在:attribute中输入数值',
  'present'              => '请在:attribute中输入当前时间',
  'regex'                => '请输入正确格式的:attribute',
  'required'             => ':attribute为必填项',
  'required_if'          => ':other为:values时，:attribute为必填项',
  'required_unless'      => ':other为非:values时，:attribute为必填项',
  'required_with'        => ':values中的任意一个值被指定时，:attribute为必填项',
  'required_with_all'    => ':values中的全部值被指定时，:attribute为必填项',
  'required_without'     => ':values中的任意一个值未被指定时，:attribute为必填项',
  'required_without_all' => ':values中的全部值未被指定时，:attribute为必填项',
  'same'                 => ':attribute与:other不一致',
  'size'                 => [
    'numeric' => '请为:attribute指定:size',
    'file'    => '请为:attribute指定:size KB的文件',
    'string'  => '请在:attribute中输入:size字符的字符串',
    'array'   => '请为:attribute指定具有:size个元素的数组',
  ],
  'string'               => '请在:attribute中输入字符串',
  'timezone'             => '请在:attribute中输入正确格式的时区',
  'unique'               => '该:attribute已被使用',
  'uploaded'             => '上传:attribute失败了',
  'url'                  => '请在:attribute中输入正确格式的URL',

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
