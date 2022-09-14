<?php

namespace App\Http\Controllers;

use App\Choices;
use App\FormBlocks;
use App\FormItems;
use App\Forms;
use App\Histories;
use App\Library\Common;
use Cron\DayOfMonthField;
use Illuminate\Http\Request;
use App\Mail\CotactMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Contracts\Validation\Rule;
use App\Rules\AlphabetNumHyphenUnderscore;
use App\Rules\AlphabetNumUnderscore;
use App\Rules\AlphabetNumSymbol;
use App\Rules\AlphabetNum;
use App\Rules\AlphabetNumMix;
use App\Rules\Hiragana;
use App\Rules\HiraganaSpace;
use App\Rules\KatakanaSpace;
use App\Rules\Katakana;
use App\Rules\PhoneRule;
use App\Rules\PhoneHyphen;
use App\Rules\ZipCodeRule;
use App\Rules\ZipCodeHyphen;
use App\Rules\MatchCheck;
use App\Rules\NumDecimal;
use App\Rules\NumHyphen;
use App\Rules\UploadFileRule;
use Illuminate\Support\Facades\App;
use Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Rules\ForbiddenCharacters;
use Illuminate\Support\Facades\Log;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use Illuminate\Support\Str;

class IndexController extends Controller {

  public function index( Request $request, $url = null ) {
    $arg = [
      "url"     => $url,
      "request" => $request
    ];
    $arg = PluginEvent::event( PluginEventConf::FRONT_INDEX_INITIALIZE, $arg );


    //urlがnull（ルート）でthemeフォルダにindex.blade.phpがあれば優先して表示
    if ( $url == "" && View::exists( 'theme.index' ) ) {
      return view( 'theme.index' );
    }
    //themeフォルダにurl対象のbladeファイルがあれば表示
    else if ( View::exists( 'theme.' . $url ) ) {
      return view( 'theme.' . $url );
    }

    if ( Common::db_connect_check() === false ) {
      return redirect()->route( 'admin.setup' );
    }

    //フォームデータを取得
    $form = Forms::where( "url", "=", $url )
      ->orderBy( 'created_at', 'desc' )
      ->first();

    // フォームデータがなかったform not found.
    if ( !isset( $form ) ) {
      return view( 'theme.form_not_found' );
    }

    // 言語設定
    if ( $form->language ) {
      App::setLocale( $form->language );
    }

    //項目データ取得
    $form_items             = FormItems::where( "form_items.form_id", "=", $form->id )
      ->where( "form_blocks.id", ">", 0 )
      ->leftJoin( 'form_blocks', 'form_items.form_block_id', '=', 'form_blocks.id' )
      ->orderBy( 'form_items.view_no', 'asc' )
      ->get();
    $form_items_block_id_ar = FormItems::where( "form_items.form_id", "=", $form->id )
      ->leftJoin( 'form_blocks', 'form_items.form_block_id', '=', 'form_blocks.id' )
      ->orderBy( 'form_items.view_no', 'asc' )
      ->pluck( 'form_items.form_block_id' )
      ->toArray();
    $choices                = Choices::whereIn( 'block_id', $form_items_block_id_ar )
      ->orderBy( 'block_id', 'asc' )
      ->orderBy( 'choice_type', 'asc' )
      ->orderBy( 'view_no', 'asc' )
      ->get();
    $pref                   = FormBlocks::where( "name", "pref" )
      ->get();
    $pref_block_id          = data_get( $pref, "*.id" );
    $pref_choices           = Choices::whereIn( 'block_id', $pref_block_id )
      ->orderBy( 'view_no', 'asc' )
      ->get();

    $data = (object) [
      "theme_name" => $form->theme_name,
      "theme_path" => config( "app.theme_url" ) . "/" . $form->theme_name . "/",
    ];

    //未入力、入力制限用のエラーメッセージを用意
    foreach ( $form_items as $key => $row ) {
      // 表示用タイトルを言語ファイルから抽出。言語ファイルに設定が無ければ項目のタイトルを表示する
      $title                          = Common::lang_title( $row );
      $form_items[ $key ]->lang_title = $title;

      //必須
      $form_items[ $key ]->required_error_msg = $row['required_error_msg'] ? $row['required_error_msg'] : __( 'validation.required_error_msg', [ "attribute" => $title ] );

      /**
       * 入力制限
       */
      $restriction_error_msg = "";
      //全角カタカナ
      if ( $row['restriction'] == 'katakana' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.restriction_katakana_error_msg" );
      }
      //ひらがな
      else if ( $row['restriction'] == 'hiragana' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.restriction_hiragana_error_msg" );
      }
      //半角数字
      else if ( $row['restriction'] == 'num' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validetion.numeric", [ "attribute" => $title ] );
      }
      //半角英数
      else if ( $row['restriction'] == 'alphabet_num' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.restriction_alphabet_num_error_msg" );
      }
      //半角英字
      else if ( $row['restriction'] == 'alphabet' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.restriction_alphabet_error_msg" );
      }
      //半角英数を混在
      else if ( $row['restriction'] == 'alphabet_num_mix' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.restriction_alphabet_num_mix_error_msg" );
      }
      //半角数字か半角ハイフンのみ
      else if ( $row['restriction'] == 'num_hyphen' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.restriction_num_hyphen_error_msg" );
      }
      //半角数字か半角ハイフンのみ
      else if ( $row['restriction'] == 'email' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.email", [ "attribute" => $title ] );
      }
      //電話番号09000000000
      else if ( $row['restriction'] == 'tel' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.phone", [ "attribute" => $title ] );
      }
      //電話番号090-0000-0000
      else if ( $row['restriction'] == 'tel_hyphen' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.restriction_tel_hyphen_error_msg", [ "attribute" => $title ] );
      }
      //郵便番号1234567
      else if ( $row['restriction'] == 'zip' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.zipcode", [ "attribute" => $title ] );
      }
      //郵便番号123-4567
      else if ( $row['restriction'] == 'zip_hyphen' && $row['name'] ) {
        $restriction_error_msg = $row['restriction_error_msg'] ? $row['restriction_error_msg'] : __( "validation.restriction_zip_hyphen_error_msg", [ "attribute" => $title ] );
      }
      $form_items[ $key ]->restriction_error_msg = $restriction_error_msg;


      /**
       * 文字数制限のエラーメッセージ
       */
      if ( $row['min_length'] > 0 && $row['max_length'] > 0 ) {
        $form_items[ $key ]->length_error_msg = $row['length_error_msg'] ? $row['length_error_msg'] : __( "validation.between.string", [
          "attribute" => $title,
          "min"       => $row['min_length'],
          "max"       => $row['max_length'],
        ] );
      }
      if ( $row['min_length'] > 0 && $row['max_length'] == 0 ) {
        $form_items[ $key ]->length_error_msg = $row['length_error_msg'] ? $row['length_error_msg'] : __( "validation.min.string", [
          "attribute" => $title,
          "min"       => $row['min_length'],
        ] );
      }
      if ( $row['min_length'] == 0 && $row['max_length'] > 0 ) {
        $form_items[ $key ]->length_error_msg = $row['length_error_msg'] ? $row['length_error_msg'] : __( "validation.max.string", [
          "attribute" => $title,
          "max"       => $row['max_length'],
        ] );
      }

      /**
       * 再入力不一致時のエラーメッセージ
       */
      $form_items[ $key ]->re_enter_error_msg = $row['re_enter_error_msg'] ? $row['re_enter_error_msg'] : __( "validation.re_enter_error_msg", [
        "attribute" => $title
      ] );

      //禁止文字
      if ( $row['forbidden_characters'] != '' ) {
        $form_items[ $key ]->forbidden_characters_error_msg = $row['forbidden_charecters_msg'] ? $row['forbidden_charecters_msg'] : __( "validation.forbidden_charecters_msg" );
      }

      /**
       * Placeholder
       */
      $form_items[ $key ]->placeholder = $row['placeholder'];

      /**
       * input type fileにaccept属性
       * 添付ファイル拡張子
       */
      if ( $row['form_type'] == 'file' && isset( $row['file_type'] ) ) {
        $form_items[ $key ]->file_accept         = $row['file_type'];
        $file_type_attribute                     = $row['file_type'];
        $file_type_attribute                     = str_replace( "image/*", __( "admin_messages.form_block.file_type_attribute_image" ), $file_type_attribute );
        $file_type_attribute                     = str_replace( "video/*", __( "admin_messages.form_block.file_type_attribute_video" ), $file_type_attribute );
        $file_type_attribute                     = str_replace( "audio/*", __( "admin_messages.form_block.file_type_attribute_audio" ), $file_type_attribute );
        $form_items[ $key ]->file_type_attribute = $file_type_attribute;
      }
    }

    $form_item_parts = array();
    foreach ( $form_items as $index => $row ) {
      $form_item_parts[ $row['name'] ] = $row;
    }

    //拒否ホストからのアクセスがあった→denied_ip.bladeを表示
    $denied_ip_ar = explode( "\n", $form->denied_ip );
    foreach ( $denied_ip_ar as $denied_ip ) {
      if ( strpos( $denied_ip, "*" ) ) {
        $remote_ip_ar = explode( ".", $_SERVER["REMOTE_ADDR"] );
        $remote_ip    = $remote_ip_ar[0] . "." . $remote_ip_ar[1] . "." . $remote_ip_ar[2];
      }
      else {
        $remote_ip = $_SERVER["REMOTE_ADDR"];
      }
      if ( strpos( $denied_ip, $remote_ip ) !== false ) {
        return view( 'theme.' . $form->theme_name . '.denied_ip', [
          "data"            => $data,
          "form"            => $form,
          "form_title"      => "",
          "form_items"      => "",
          "choices"         => "",
          "pref_choices"    => "",
          "form_item_parts" => "",
        ] );
      }
    }

    // 非表示設定になっている→hidden.bladeを表示
    if ( $form->view_flag != 1 ) {
      return view( 'theme.' . $form->theme_name . '.hidden', [
        "data"            => $data,
        "form"            => $form,
        "form_title"      => "",
        "form_items"      => "",
        "choices"         => "",
        "pref_choices"    => "",
        "form_item_parts" => "",
      ] );
    }
    else {
      if ( $url == null ) {
        $form_title = __( "messages.form.form_title_root" ) == "messages.form.form_title_root" ? $form->name : __( "messages.form.form_title_root" );
      }
      else {
        $form_title = __( "messages.form.form_title_" . $url ) == "messages.form.form_title_" . $url ? $form->name : __( "messages.form.form_title_" . $url );
      }

      // 非表示設定になっている→hidden.bladeを表示
      if ( $form->view_flag != 1 ) {
        return view( 'theme.' . $form->theme_name . '.hidden', [
          "arg"             => $arg,
          "data"            => $arg['data'],
          "form_title"      => $arg['form_title'],
          "form"            => $arg['form'],
          "form_items"      => $arg['form_items'],
          "choices"         => $arg['choices'],
          "pref_choices"    => $arg['pref_choices'],
          "form_item_parts" => $arg['form_item_parts'],
        ] );
      }
      else {
        $arg = [
          "data"            => $data,
          "form_title"      => $form_title,
          "form"            => $form,
          "form_items"      => $form_items,
          "choices"         => $choices,
          "pref_choices"    => $pref_choices,
          "form_item_parts" => $form_item_parts,
          "request"         => $request,
          "append"          => require base_path() . "/config/append.php",
          "image_accept"    => implode( ",", Common::$file_type_image_accept ),
          "video_accept"    => implode( ",", Common::$file_type_video_accept ),
          "audio_accept"    => implode( ",", Common::$file_type_audio_accept ),
        ];

        // 独自タグ変換
        $form->input_form_header_message = Common::replace_special_character( $form, $form_items, $request, $form->input_form_header_message );
        $form->input_form_footer_message = Common::replace_special_character( $form, $form_items, $request, $form->input_form_footer_message );
        $form->conf_form_header_message  = Common::replace_special_character( $form, $form_items, $request, $form->conf_form_header_message );
        $form->conf_form_footer_message  = Common::replace_special_character( $form, $form_items, $request, $form->conf_form_footer_message );
        $form->error_form_header_message = Common::replace_special_character( $form, $form_items, $request, $form->error_form_header_message );
        $form->error_form_footer_message = Common::replace_special_character( $form, $form_items, $request, $form->error_form_footer_message );

        $arg = PluginEvent::event( PluginEventConf::FRONT_INDEX_JUST_BEFORE_VIEW, $arg );
        if ( isset( $arg['plugin_view'] ) && $arg['plugin_view'] !== "" ) {
          return view( $arg['plugin_view'], $arg );
        }

        return view( 'theme.' . $form->theme_name . '.index', [
          "arg"             => $arg,
          "data"            => $arg['data'],
          "form_title"      => $arg['form_title'],
          "form"            => $arg['form'],
          "form_items"      => $arg['form_items'],
          "choices"         => $arg['choices'],
          "pref_choices"    => $arg['pref_choices'],
          "form_item_parts" => $arg['form_item_parts'],
          'append'          => $arg['append'],
        ] );
      }
    }
  }

  public function send( Request $request, $url = null ) {
    $arg = [
      "request" => $request,
      "url"     => $url
    ];
    PluginEvent::event( PluginEventConf::FRONT_INDEX_SEND_INITIALIZE, $arg );
    //フォームデータを取得
    $form = Forms::where( "url", "=", $url )
      ->where( "view_flag", "=", 1 )
      ->orderBy( 'created_at', 'desc' )
      ->first();

    $form_items = FormItems::where( "form_items.form_id", "=", $form->id )
      ->where( "form_blocks.id", ">", 0 )
      ->leftJoin( 'form_blocks', 'form_items.form_block_id', '=', 'form_blocks.id' )
      ->orderBy( 'form_items.view_no', 'asc' )
      ->get();

    // 言語設定
    if ( $form->language ) {
      App::setLocale( $form->language );
    }

    $data = (object) [
      "theme_name" => $form->theme_name,
      "theme_path" => config( "app.theme_url" ) . "/" . $form->theme_name . "/",
    ];

    if (!config('app.demo_mode')) {
      // GoogleReCaptcha確認
      if ( !empty( $form->google_re_captcha_secret_key ) && !empty( $form->google_re_captcha_site_key ) ) {
        if ( !empty( $request->input( "g-recaptcha-token" ) ) && $request->input( "g-recaptcha-token" ) != null ) {
          $api            = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $form->google_re_captcha_secret_key . '&response=' . $request->input( "g-recaptcha-token" );
          $verifyResponse = file_get_contents( $api );
          $responseData   = json_decode( $verifyResponse );
          // Log::info( "GoogleReCaptcha responseData success " . $responseData->success . " score " . $responseData->score );
          if ( $responseData->success === true ) {
            //ReCaptcha OK
          }
          else {
            //ReCaptcha NG
            // Log::info( "GoogleReCaptcha not success score " . $responseData->score );
            return view( 'theme.form_not_found' );
          }
        }
        else {
          //ReCaptcha NG
          // Log::info( "GoogleReCaptcha g-recaptcha-token empty" );
          return view( 'theme.form_not_found' );
        }
      }
    }

    //バリデーションとエラーメッセージ タイトルを入れる
    $vali     = array();
    $messages = array();

    foreach ( $form_items as $key => $row ) {
      //必須
      $required_error_msg = "";
      if ( $row['required_error_msg'] ) {
        $required_error_msg = $row['required_error_msg'];
      }
      else {
        $required_error_msg = __( 'validation.required_error_msg', [ "attribute" => $row['title'] ] );
      }

      if ( $row['required'] == 1 && $row['name'] ) {
        if ( $row['name'] == 'zp_address' ) {
          $vali['zip']     = "required";
          $vali['pref']    = "required";
          $vali['address'] = "required";
        }
        else if ( $row['name'] == 'first_last_name' ) {
          $vali['last_name']                      = "required";
          $vali['first_name']                     = "required";
          $messages[ $row['name'] . ".required" ] = $required_error_msg;
        }
        else {
          $vali[ $row['name'] ]                   = "required";
          $messages[ $row['name'] . ".required" ] = $required_error_msg;
        }
      }

      /**
       * 入力制限
       */
      //全角カタカナ
      if ( $row['restriction'] == 'katakana' && $row['name'] ) {
        $vali[ $row['name'] ] = new Katakana();
        // $messages[ $row['name'] . ".unique" ] = $row['title'] . __( 'message.restriction_error_msg' );
      }
      //ひらがな
      if ( $row['restriction'] == 'hiragana' && $row['name'] ) {
        $vali[ $row['name'] ] = new Hiragana();
      }
      //半角数字
      if ( $row['restriction'] == 'num' && $row['name'] ) {
        $vali[ $row['name'] ] = 'numeric';
      }
      //半角英数
      if ( $row['restriction'] == 'alphabet_num' && $row['name'] ) {
        $vali[ $row['name'] ] = new AlphabetNum();
      }
      //半角英字
      if ( $row['restriction'] == 'alphabet' && $row['name'] ) {
        $vali[ $row['name'] ] = 'alpha';
      }
      //半角英数を混在
      if ( $row['restriction'] == 'alphabet_num_mix' && $row['name'] ) {
        $vali[ $row['name'] ] = new AlphabetNumMix();
      }
      //半角数字か半角ハイフンのみ
      if ( $row['restriction'] == 'num_hyphen' && $row['name'] ) {
        $vali[ $row['name'] ] = new NumHyphen();
      }
      //半角数字か半角ハイフンのみ
      if ( $row['restriction'] == 'email' && $row['name'] && $request->input( $row['name'] ) ) {
        $vali[ $row['name'] ] = 'email';
      }
      //電話番号09000000000
      if ( $row['restriction'] == 'tel' && $row['name'] ) {
        $vali[ $row['name'] ] = new PhoneRule();
      }
      //電話番号090-0000-0000
      if ( $row['restriction'] == 'tel_hyphen' && $row['name'] ) {
        $vali[ $row['name'] ] = new PhoneHyphen();
      }
      //郵便番号1234567
      if ( $row['restriction'] == 'zip' && $row['name'] ) {
        $vali[ $row['name'] ] = new ZipCodeRule();
      }
      //郵便番号123-4567
      if ( $row['restriction'] == 'zip_hyphen' && $row['name'] ) {
        $vali[ $row['name'] ] = new ZipCodeHyphen();
      }
      // 入力禁止文字
      if ( $row['forbidden_characters'] != '' ) {
        $vali[ $row['name'] ] = new ForbiddenCharacters( $row['forbidden_characters'], $request->input( $row['name'] ) );
      }
      if ( $row['form_type'] == 'file' && $request->file( $row['name'] ) ) {
        // image/*,.jpg,.jpeg,.png,.abc
        $vali[ $row['name'] ] = new UploadFileRule( $row['file_type'] );
      }
    }

    $request->validate( $vali, $messages );

    //タイトルと入力値を保持しておく
    $form_req = array();

    foreach ( $request->all() as $key => $val ) {
      if ( $key == "_token" ) {
        continue;
      }
      if ( $key == "conf_email" ) {
        continue;
      }
      if ( is_array( $val ) ) {
        $val = implode( ",", $val );
      }
      foreach ( $form_items as $f_val ) {
        if ( $f_val['form_type'] == 'file' ) {
          continue;
        }
        if ( $f_val['form_type'] == 'first_last_name' && $key == 'first_name' ) {
          $form_req[] = [
            "name"  => 'first_last_name',
            "title" => __( "validation.attributes.first_last_name" ) == "validation.attributes.first_last_name" ? $f_val['title'] : __( "validation.attributes.first_last_name" ),
            "value" => $request->input( "last_name" ) . $request->input( "first_name" )
          ];
          continue;
        }
        if ( $f_val['form_type'] == 'zp_address' && $key == 'zip' ) {
          $form_req[] = [
            "name"  => 'zp_address',
            "title" => __( "validation.attributes.zp_address" ) == "validation.attributes.zp_address" ? $f_val['title'] : __( "validation.attributes.zp_address" ),
            "value" => "\n" . $request->input( "zip" ) . "\n" . $request->input( "pref" ) . "\n" . $request->input( "address" ),
          ];
          continue;
        }
        if ( $f_val['form_type'] == 'name_and_furigana' && $key == 'name_and_furigana' ) {
          $form_req[] = [
            "name"  => 'your_name',
            "title" => __( "validation.attributes." . $f_val['name'] ) == "validation.attributes." . $f_val['name'] ? $f_val['title'] : __( "validation.attributes." . $f_val['name'] ),
            "value" => $request->input( "your_name" )
          ];
          $form_req[] = [
            "name"  => 'name_and_furigana',
            "title" => $f_val['restriction'] == "hiragana" ? __( "validation.attributes.kana_furigana" ) : __( "validation.attributes.furigana" ),
            "value" => $request->input( "name_and_furigana" )
          ];
          continue;
        }
        if ( $key == $f_val['name'] ) {
          $form_req[] = [
            "name"  => $f_val['name'],
            "title" => __( "validation.attributes." . $f_val['name'] ) == "validation.attributes." . $f_val['name'] ? $f_val['title'] : __( "validation.attributes." . $f_val['name'] ),
            "value" => $val
          ];
        }
      }
    }

    $user_email = $request->input( 'email' ) ? $request->input( 'email' ) : "";

    //特殊文字変換
    $form->mail_title                = Common::replace_special_character( $form, $form_items, $request, $form->mail_title );
    $form->reply_mail_header_message = Common::replace_special_character( $form, $form_items, $request, $form->reply_mail_header_message );
    $form->reply_mail_footer_message = Common::replace_special_character( $form, $form_items, $request, $form->reply_mail_footer_message );
    $form->thanks_message            = Common::replace_special_character( $form, $form_items, $request, $form->thanks_message );

    $arg = [
      "form"       => $form,
      "form_items" => $form_items,
      "user_email" => $user_email,
      "request"    => $request,
      "form_req"   => $form_req
    ];

    $arg = PluginEvent::event( PluginEventConf::FRONT_INDEX_SEND_JUST_BEFORE_SEND, $arg );
    if ( isset( $arg['plugin_view'] ) && $arg['plugin_view'] !== "" ) {
      return view( $arg['plugin_view'], $arg );
    }
    $form_info = [
      'to'                              => "user",
      'admin_email'                     => $arg['form']->admin_email,
      'user_email'                      => $arg['user_email'],
      'mail_title'                      => $arg['form']->mail_title,
      'theme_name'                      => $arg['form']->theme_name,
      'bcc_email'                       => $arg['form']->bcc_email,
      'cc_email'                        => $arg['form']->cc_email,
      'conf_mail_flag'                  => $arg['form']->conf_mail_flag,
      'include_submissions'             => $arg['form']->include_submissions,
      'include_submissions_admin_email' => $arg['form']->include_submissions_admin_email,
      'url'                             => $arg['form']->url,
      'reply_mail_header_message'       => $arg['form']->reply_mail_header_message,
      'reply_mail_footer_message'       => $arg['form']->reply_mail_footer_message,
      'thanks_message'                  => $arg['form']->thanks_message,
    ];

    //ユーザーに確認メール送信
    if ( $form->conf_mail_flag == 1 && $user_email != "" && $user_email != null ) {
      $form_info['template'] = 'theme.' . $form->theme_name . '.reply_mail';
      if (!config('app.demo_mode')) {
        Mail::to( $user_email )
          ->send( new ContactMail( (object) $form_info, (object) $request->all(), $arg['form_req'], array() ) );
      }
    }
    // 管理者にメール送信
    $form_info["to"]       = "admin";
    $form_info['template'] = 'theme.' . $form->theme_name . '.reply_mail_for_admin';
    if (!config('app.demo_mode')) {
      Mail::to( $form_info['admin_email'] )
        ->send( new ContactMail( (object) $form_info, (object) $request->all(), $arg['form_req'], $request->file() ) );
    }

    // 履歴の保存
    if ( $form->save_data == 1 ) {
      // 添付ファイルがあればファイルの保存
      $concat_image_hash_name = "";
      foreach ( $request->all() as $key => $val ) {
        if ( $request->hasFile( $key ) ) {
          if (!config('app.demo_mode')) {
            $image_hash_name = $this->createImageHashName($request->file( $key )->getClientOriginalName());
            $request->file( $key )
              ->storeAs( '/', $image_hash_name , [ 'disk' => 'attach_file' ] );
            Storage::disk( "attach_file" )
              ->setVisibility( $image_hash_name, 'private' );
            $concat_image_hash_name .= $image_hash_name;
          }
        }
      }

      //入力データの保存
      $contents = array();
      foreach ( $form_items as $key => $form_item ) {
        if ( $form_item['name'] == null || $form_item['name'] == "" ) {
          continue;
        }
        if ( $form_item['name'] == 'zp_address' ) {
          $contents[] = [
            'form_type' => 'zp_address',
            'title'     => __( "validation.attributes.zp_address" ) == "validation.attributes.zp_address" ? $form_item->title : __( "validation.attributes.zp_address" ),
            'value'     => $request->input( 'zip' ) . $request->input( 'pref' ) . $request->input( 'address' )
          ];
        }
        else if ( $form_item['name'] == 'first_last_name' ) {
          $contents[] = [
            'form_type' => 'first_last_name',
            'title'     => __( "validation.attributes.first_last_name" ) == "validation.attributes.first_last_name" ? $form_item->title : __( "validation.attributes.first_last_name" ),
            'value'     => $request->input( 'last_name' ) . $request->input( 'first_name' )
          ];
        }
        else if ( $form_item['name'] == 'name_and_furigana' ) {
          $contents[] = [
            'form_type' => 'name_and_furigana',
            'title'     => __( "validation.attributes.name" ) == "validation.attributes.name" ? $form_item->title : __( "validation.attributes.name" ),
            'value'     => $request->input( 'your_name' )
          ];
          $contents[] = [
            'form_type' => 'name_and_furigana',
            'title'     => $form_item['restriction'] == "hiragana" ? __( "validation.attributes.kana_furigana" ) : __( "validation.attributes.furigana" ),
            'value'     => $request->input( 'name_and_furigana' )
          ];
        }
        else {
          $contents[] = [
            'form_type' => $form_item->form_type,
            'title'     => $form_item->title,
            'value'     => $request->input( $form_item['name'] )
          ];
        }
      }

      $arg = [
        "form"            => $form,
        "user_email"      => $user_email,
        "contents"        => $contents,
        "image_hash_name" => $concat_image_hash_name,
      ];

      $save_form_info        = [
        'admin_email'                     => $arg['form']->admin_email,
        'user_email'                      => $arg['user_email'],
        'mail_title'                      => $arg['form']->mail_title,
        'theme_name'                      => $arg['form']->theme_name,
        'bcc_email'                       => $arg['form']->bcc_email,
        'cc_email'                        => $arg['form']->cc_email,
        'conf_mail_flag'                  => $arg['form']->conf_mail_flag,
        'include_submissions'             => $arg['form']->include_submissions,
        'include_submissions_admin_email' => $arg['form']->include_submissions_admin_email,
        'url'                             => $arg['form']->url,
        'form_id'                         => $arg['form']->id,
        'form_name'                       => $arg['form']->name,
        'content'                         => json_encode( $arg['contents'] ),
        'attach_files'                    => $arg['image_hash_name'],
      ];
      $arg['save_form_info'] = $save_form_info;

      $arg = PluginEvent::event( PluginEventConf::FRONT_INDEX_SEND_JUST_BEFORE_HISTORY_SAVE, $arg );

      $histories = new Histories();
      if (!config('app.demo_mode')) {
        $histories->fill( $arg['save_form_info'] );
        $histories->save();
      }
    }

    if (!config('app.demo_mode')) {
      if ( $form->submit_disabled_flag == 1 ) {
        // 二重送信対策 トークンの再生成
        $request->session()
          ->regenerateToken();
      }
    }

    if ( $url == null ) {
      $form_title = __( "messages . form . form_title_root" ) == "messages . form . form_title_root" ? $form->name : __( "messages . form . form_title_root" );
    }
    else {
      $form_title = __( "messages . form . form_title_" . $url ) == "messages . form . form_title_" . $url ? $form->name : __( "messages . form . form_title_" . $url );
    }

    $arg = [
      "form"       => $form,
      "form_title" => $form_title,
      "data"       => $data,
      "form_req"   => $form_req,
      "append"     => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::FRONT_INDEX_SEND_JUST_BEFORE_VIEW, $arg );

    return view( 'theme.' . $form->theme_name . '.thanks', [
      "form"       => $arg['form'],
      "form_title" => $arg['form_title'],
      "data"       => $arg['data'],
      "form_req"   => $arg['form_req'],
      "request"    => (object) $request->all(),
      'append'     => $arg['append'],
    ] );
  }

  /**
   * Create a image hash name while preserving the extension
   *
   * @return string
   */
  public function createImageHashName($origin_name)
  {
    $extention = pathinfo($origin_name, PATHINFO_EXTENSION);

    return Str::random(40) . ".{$extention}";
  }

}
