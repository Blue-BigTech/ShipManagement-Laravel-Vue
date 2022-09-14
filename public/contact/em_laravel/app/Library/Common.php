<?php

namespace App\Library;

use Illuminate\Support\Facades\App;

// use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Database\QueryException;
use DB;
use File;
use Illuminate\Support\Facades\Artisan;

class Common {

  static $file_type_image_accept = [ '.jpe', '.jpg', '.jpeg', '.gif', '.png', '.bmp', '.ico', '.svg', '.svgz', '.tif', '.tiff', '.ai', '.drw', '.pct', '.psp', '.xcf', '.psd', '.raw' ];
  static $file_type_audio_accept = [ '.aac', '.aif', '.flac', '.iff', '.m4a', '.m4b', '.mid', '.midi', '.mp3', '.mpa', '.mpc', '.oga', '.ogg', '.ra', '.ram', '.snd', '.wav', '.wma' ];
  static $file_type_video_accept = [ '.avi', '.divx', '.flv', '.m4v', '.mkv', '.mov', '.mp4', '.mpeg', '.mpg', '.ogm', '.ogv', '.ogx', '.rm', '.rmvb', '.smil', '.webm', '.wmv', '.xvid' ];

  /**
   * 閲覧権限
   * 0 = deny, 1 = allow
   * general_editor|editor|admin
   */
  const ALL_ALLOW = '111';
  const EDITOR_OR_HIGHER = '011';
  const ADMIN_ONLY = '001';

  static function db_connect_check() {
    $db_config = "database.connections." . config( "database.default" );
    $host      = env( 'DB_HOST', config( $db_config . ".host" ) );
    $db_name   = env( 'DB_DATABASE', config( $db_config . ".database" ) );
    $user      = env( 'DB_USERNAME', config( $db_config . ".username" ) );
    $pass      = env( 'DB_PASSWORD', config( $db_config . ".password" ) );

    // $host    = config( $db_config . ".host" );
    // $db_name = config( $db_config . ".database" );
    // $user    = config( $db_config . ".username" );
    // $pass    = config( $db_config . ".password" );

    if ( !$host || !$db_name || !$user ) {
      return false;
    }
    if ( $ret = @mysqli_connect( $host, $user, $pass, $db_name ) ) {
      return true;
    }
    else {
      return false;
    }
  }

  static function recursiveDelete( $str ) {
    if ( is_file( $str ) ) {
      return @unlink( $str );
    }
    else if ( is_dir( $str ) ) {
      $scan = glob( rtrim( $str, '/' ) . '/*' );
      foreach ( $scan as $index => $path ) {
        self::recursiveDelete( $path );
      }

      return @rmdir( $str );
    }
  }

  static function fileIcon( $extension ) {
    switch ( $extension ) {
      case( "jpeg" ):
        $ret = '<i class="far fa-4x fa-image"></i>';
        break;
      case( "jpg" ):
        $ret = '<i class="far fa-4x fa-image"></i>';
        break;
      case( "png" ):
        $ret = '<i class="far fa-4x fa-image"></i>';
        break;
      case( "gif" ):
        $ret = '<i class="far fa-4x fa-image"></i>';
        break;
      case( "xls" ):
      case( "xlsx" ):
      case( "xlsm" ):
      case( "csv" ):
        $ret = '<i class="far fa-4x fa-file-excel"></i>';
        break;
      case( "doc" ):
      case( "docm" ):
      case( "docx" ):
      case( "dot" ):
        $ret = '<i class="far fa-4x fa-file-word"></i>';
        break;
      case( "pdf" ):
        $ret = '<i class="far fa-4x fa-file-pdf"></i>';
        break;
      case( "pptx" ):
      case( "pptm" ):
      case( "ppt" ):
        $ret = '<i class="far fa-4x fa-file-powerpoint"></i>';
        break;
      default:
        $ret = '<i class="far fa-4x fa-file"></i>';
        break;
    }

    return $ret;
  }

  static function fileType( $extension ) {
    switch ( $extension ) {
      case( "jpg" ):
      case( "jpeg" ):
      case( "png" ):
      case( "gif" ):
      case( "bmp" ):
        $ret = 'image';
        break;
      case( "xls" ):
      case( "xlsx" ):
      case( "xlsm" ):
      case( "csv" ):
        $ret = 'excel';
        break;
      case( "doc" ):
      case( "docm" ):
      case( "docx" ):
      case( "dot" ):
        $ret = 'word';
        break;
      case( "pdf" ):
        $ret = 'pdf';
        break;
      case( "pptx" ):
      case( "pptm" ):
      case( "ppt" ):
        $ret = 'powerpoint';
        break;
      default:
        $ret = 'other';
        break;
    }

    return $ret;
  }

  static function get_last_df( $path ) {
    if ( strpos( $path, "\\" ) ) {
      $p_ar = explode( "\\", $path );
    }
    else {
      $p_ar = explode( "/", $path );
    }

    return $p_ar[ array_key_last( $p_ar ) ];
  }

  static function key_generate() {
    Artisan::call( 'key:generate' );
  }

  static function clear() {
    Artisan::call( 'cache:clear' );
    Artisan::call( 'config:clear' );
    Artisan::call( 'route:clear' );
    Artisan::call( 'view:clear' );
  }

  static function config_cache_clear() {
    Artisan::call( 'config:clear' );
    Artisan::call( 'config:cache' );
  }

  static function view_cache_clear() {
    Artisan::call( 'view:clear' );
  }

  static function route_cache_clear() {
    Artisan::call( 'route:clear' );
    Artisan::call( 'route:cache' );
  }

  /**
   * @param $form_item
   * @param null $lang
   * $langが入ってるときは管理画面からのアクセス
   *
   * @return array|Application|Translator|string|null
   *
   */
  static function lang_title( $form_item, $lang = null ) {
    $ret = "";
    if ( $lang ) {
      App::setLocale( $lang );
    }
    $ret = __( "validation.attributes.$form_item->name" ) == "validation.attributes." . $form_item->name ? $form_item->title : __( "validation.attributes.$form_item->name" );
    if ( $lang ) {
      App::setLocale( "ja" );
    }

    return $ret;
  }

  /**
   * @param $form_item
   * @param null $lang
   * $langが入ってるときは管理画面からのアクセス
   *
   * @return array|Application|Translator|string|null
   */
  static function lang_placeholder( $form_item, $lang = null ) {
    $ret = "";
    if ( $lang ) {
      App::setLocale( $lang );
    }
    $ret = __( "messages.placeholder.$form_item->name" ) == "messages.placeholder." . $form_item->name ? "" : __( "messages.placeholder.$form_item->name" );
    if ( $lang ) {
      App::setLocale( Auth::user()->language );
    }

    return $ret;
  }

  /**
   * @return array
   */
  static function lang_list() {
    $ret     = array();
    $lang_ar = File::directories( base_path() . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . "lang" );

    foreach ( $lang_ar as $key => $path ) {
      if ( !is_dir( $path ) ) {
        continue;
      }
      if ( strpos( $path, "\\" ) ) {
        $p_ar = explode( "\\", $path );
      }
      else {
        $p_ar = explode( "/", $path );
      }

      $temp            = (object) array();
      $temp->lang_name = $p_ar[ array_key_last( $p_ar ) ];
      $ret[]           = $temp;
    }
    // jaが上にくるようにソート
    arsort( $ret );

    return $ret;
  }


  static function theme_list() {
    $ret      = array();
    $theme_ar = glob( config( 'app.theme_abs_path' ) . DIRECTORY_SEPARATOR . "*" );
    foreach ( $theme_ar as $key => $path ) {
      if ( !is_dir( $path ) ) {
        continue;
      }
      if ( strpos( $path, "\\" ) ) {
        $p_ar = explode( "\\", $path );
      }
      else {
        $p_ar = explode( "/", $path );
      }
      $temp              = (object) array();
      $temp->theme_name  = $p_ar[ array_key_last( $p_ar ) ];
      $temp->screen_shot = config( 'app.admin_assets_url' ) . '/images/no_image.png';

      if ( file_exists( $path . '\\screenshot.png' ) || file_exists( $path . '/screenshot.png' ) ) {
        $temp->screen_shot = config( 'app.theme_url' ) . '/' . $temp->theme_name . '/screenshot.png';
      }
      else if ( file_exists( $path . '\\screenshot.jpg' ) || file_exists( $path . '/screenshot.jpg' ) ) {
        $temp->screen_shot = config( 'app.theme_url' ) . '/' . $temp->theme_name . '/screenshot.jpg';
      }
      $ret[] = $temp;
    }

    return $ret;
  }


  static function replace_special_character( $form, $form_items, $request, $val ) {
    $ret = $val;
    // 4桁の西暦#YYYY#
    $ret = str_replace( "#YYYY#", date( "Y", time() ), $ret );
    // 末2桁の西暦#YY#
    $ret = str_replace( "#YY#", date( "y", time() ), $ret );
    // 2桁の月#MM#
    $ret = str_replace( "#MM#", date( "m", time() ), $ret );
    // 2桁の日#DD#
    $ret = str_replace( "#DD#", date( "d", time() ), $ret );
    // 2桁の時#HH#
    $ret = str_replace( "#HH#", date( "H", time() ), $ret );
    // 2桁の分#MI#
    $ret = str_replace( "#MI#", date( "i", time() ), $ret );
    // 2桁の秒#SS#
    $ret = str_replace( "#SS#", date( "s", time() ), $ret );

    //漢字の曜日
    $week = [
      '日', //0
      '月', //1
      '火', //2
      '水', //3
      '木', //4
      '金', //5
      '土', //6
    ];
    $w    = date( "w", time() );
    $ret  = str_replace( "#KWE#", $week[ $w ], $ret );

    //英語語の曜日
    $week = [
      'Sun', //0
      'Mon', //1
      'Tue', //2
      'Wed', //3
      'Thu', //4
      'Fri', //5
      'Sat', //6
    ];
    $w    = date( "w", time() );
    $ret  = str_replace( "#AWE#", $week[ $w ], $ret );

    // IPアドレス#IP#
    if ( !empty( $_SERVER["REMOTE_ADDR"] ) ) {
      $ret = str_replace( "#IP#", $_SERVER["REMOTE_ADDR"], $ret );
    }
    else {
      $ret = str_replace( "#IP#", "", $ret );
    }
    // ホスト名#HOST#
    if ( !empty( $_SERVER["REMOTE_HOST"] ) ) {
      $ret = str_replace( "#HOST#", $_SERVER["REMOTE_HOST"], $ret );
    }
    else {
      $ret = str_replace( "#HOST#", "", $ret );
    }
    // ユーザーエージェント#UA#
    if ( !empty( $_SERVER["HTTP_USER_AGENT"] ) ) {
      $ret = str_replace( "#UA#", $_SERVER["HTTP_USER_AGENT"], $ret );
    }
    else {
      $ret = str_replace( "#UA#", "", $ret );
    }
    // 回答
    foreach ( $form_items as $form_item ) {
      if ( !empty( $request->input( $form_item->name ) ) ) {
        $input_value = $request->input( $form_item->name );
        if ( is_array( $input_value ) && $form_item->name != null ) {
          $input_value = implode( " ", $input_value );
        }
        // 名前付きふりがな
        if ( $form_item->name == "name_and_furigana" ) {
          $ret = str_replace( "#name_and_furigana#", $request->input( "your_name" ), $ret );
        }
        if ( $form_item->name != null ) {
          $ret = str_replace( "#" . $form_item->name . "#", $input_value, $ret );
        }
      }
      else {
        if ( $form_item->name != null ) {
          $ret = str_replace( "#" . $form_item->name . "#", "", $ret );
        }
      }
    }

    return $ret;
  }

  static function getUniqId() {
    return md5( uniqid( rand(), 1 ) );
  }

}
