<?php

use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table( 'forms' )
      ->insert( [
        [ //お問い合わせフォームをプリセット
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_flag'                                  => 1,
          'url'                                        => 'contact',
          'name'                                       => 'お問い合わせ',
          'description'                                => 'このフォームはお客様専用です。 弊社商品・サービスに関するお問い合わせはこちらのページより送信してください。',
          'mail_title'                                 => 'お問合せありがとうございます。',
          'theme_name'                                 => 'gray',
          'admin_email'                                => 'easymail@example.com',
          'bcc_email'                                  => '',
          'cc_email'                                   => '',
          'conf_mail_flag'                             => 1,
          'include_submissions'                        => 1,
          'include_submissions_admin_email'            => 1,
          'save_data'                                  => 1,
          'denied_ip'                                  => '',
          'denied_ip_host_error_msg'                   => '',
          'language'                                   => 'ja',
          'reply_mail_header_message'                  => '****************************************
株式会社〇〇〇〇でございます。
この度は弊社へお問い合わせをいただき、
誠にありがとうございます。

このメールはお問い合わせをいただいた際に
自動的に返信される確認メールです。

このメールに覚えのないお客様は恐れ入りますが、
このメールにご返信いただき
その旨を記入してお送りください。
****************************************
#corporation_name# 様',
          'reply_mail_footer_message'                  =>'----------------------------------------
株式会社〇〇〇〇
https://www.sample.co.jp
代表メール info@sample.co.jp
営業時間：平日9：30～18：30

大阪本社
〒541-0058 大阪市中央区**********1-1-1
06-1234-5678
----------------------------------------',
          'input_form_header_message'                  => '',
          'input_form_footer_message'                  => '',
          'conf_form_header_message'                   => '',
          'conf_form_footer_message'                   => '',
          'error_form_header_message'                  => '',
          'error_form_footer_message'                  => '',
          'thanks_message'                             => 'ありがとうございました。',
          'google_re_captcha_site_key'                 => null,
          'google_re_captcha_secret_key'               => null,
          'google_re_captcha_bottom_px'                => null,
          'beforeunload_flag'                          => 1,
          'enter_forbidden_flag'                       => 1,
          'submit_disabled_flag'                       => 1,
        ],
        [ //イベント申し込みフォームをプリセット
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_flag'                                  => 1,
          'url'                                        => 'event',
          'name'                                       => 'イベント申し込みフォーム',
          'description'                                => 'イベント申し込みフォームのサンプルです。',
          'mail_title'                                 => '申し込みありがとうございます。',
          'theme_name'                                 => 'gradation',
          'admin_email'                                => 'easymail@example.com',
          'bcc_email'                                  => '',
          'cc_email'                                   => '',
          'conf_mail_flag'                             => 1,
          'include_submissions'                        => 1,
          'include_submissions_admin_email'            => 1,
          'save_data'                                  => 1,
          'denied_ip'                                  => '',
          'denied_ip_host_error_msg'                   => '',
          'language'                                   => 'ja',
          'reply_mail_header_message'                  => '****************************************
株式会社〇〇〇〇でございます。
この度は申し込みいただき、誠にありがとうございます。

このメールは申し込みをいただいた際に
自動的に返信される確認メールです。

このメールに覚えのないお客様は恐れ入りますが、
このメールにご返信いただき
その旨を記入してお送りください。
****************************************
#name_and_furigana# 様',
          'reply_mail_footer_message'                  =>'----------------------------------------
株式会社〇〇〇〇
https://www.sample.co.jp
代表メール info@sample.co.jp
営業時間：平日9：30～18：30

大阪本社
〒541-0058 大阪市中央区**********1-1-1
06-1234-5678
----------------------------------------',
          'input_form_header_message'                  => '各種イベントへの参加申し込みを受け付けております。
ご希望のイベントをお選びいただき、必要事項をご記入の上、「確認ボタン」を押してください。',
          'input_form_footer_message'                  => '',
          'conf_form_header_message'                   => '',
          'conf_form_footer_message'                   => '',
          'error_form_header_message'                  => '',
          'error_form_footer_message'                  => '',
          'thanks_message'                             => 'ありがとうございました。',
          'google_re_captcha_site_key'                 => null,
          'google_re_captcha_secret_key'               => null,
          'google_re_captcha_bottom_px'                => null,
          'beforeunload_flag'                          => 1,
          'enter_forbidden_flag'                       => 1,
          'submit_disabled_flag'                       => 1,
        ],
        [ //アンケートフォームをプリセット
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_flag'                                  => 1,
          'url'                                        => 'questionnaire',
          'name'                                       => '○○に関するアンケートフォーム',
          'description'                                => 'アンケートフォームのサンプルです。',
          'mail_title'                                 => 'アンケートの回答がありました。',
          'theme_name'                                 => 'gradation',
          'admin_email'                                => 'easymail@example.com',
          'bcc_email'                                  => '',
          'cc_email'                                   => '',
          'conf_mail_flag'                             => 1,
          'include_submissions'                        => 1,
          'include_submissions_admin_email'            => 1,
          'save_data'                                  => 1,
          'denied_ip'                                  => '',
          'denied_ip_host_error_msg'                   => '',
          'language'                                   => 'ja',
          'reply_mail_header_message'                  => '****************************************
このメールはアンケートに回答があった際に
自動的に送信されるメールです。
****************************************
',
          'reply_mail_footer_message'                  =>'',
          'input_form_header_message'                  => 'アンケートにご協力お願い致します。',
          'input_form_footer_message'                  => '',
          'conf_form_header_message'                   => '',
          'conf_form_footer_message'                   => '',
          'error_form_header_message'                  => '',
          'error_form_footer_message'                  => '',
          'thanks_message'                             => 'アンケートにご協力頂きありがとうございました。',
          'google_re_captcha_site_key'                 => null,
          'google_re_captcha_secret_key'               => null,
          'google_re_captcha_bottom_px'                => null,
          'beforeunload_flag'                          => 1,
          'enter_forbidden_flag'                       => 1,
          'submit_disabled_flag'                       => 1,
        ]
      ]);
    }
}
