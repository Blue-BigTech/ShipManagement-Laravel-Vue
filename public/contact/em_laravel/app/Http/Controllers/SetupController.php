<?php

namespace App\Http\Controllers;

use App\Library\Common;
use App\Rules\AdminPassword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use File;
use Artisan;
use DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class SetupController extends Controller {
  private $messages;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    if ( !config( "app.key" ) ) {
      Artisan::call( 'key:generate' );
    }
    $this->messages = [
      'url.url'                 => __( 'setup.db_url_format_error_msg' ),
      'url.required'            => __( 'setup.db_url_error_msg' ),
      'host.required'           => __( 'setup.db_host_error_msg' ),
      'port.required'           => __( 'setup.db_port_error_msg' ),
      'database.required'       => __( 'setup.db_name_error_msg' ),
      'username.required'       => __( 'setup.db_username_error_msg' ),
      // 'password.required'       => __( 'setup.db_password_error_msg' ),
      'login_email.required'    => __( 'setup.dash_board_login_email_error_msg' ),
      'login_password.required' => __( 'setup.dash_board_login_password_error_msg' ),
      'language.required'       => __( 'setup.language_select_error_msg' ),
    ];
  }

  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   *
   * @return Application|Factory|Response|View
   */
  public function index( Request $request ) {
    if ( Common::db_connect_check() === true ) {
      die( "Databese setting is completed." );
    }

    return view( 'setup.index' )->with( [
                                          "req"           => $request,
                                          "languages"     => Common::lang_list(),
                                          "setupLanguage" => App::getLocale(),
                                          "time_zone"     => config( "app.time_zone" )
                                        ] );
  }

  public function setupSwitchLanguage( Request $request, $lang ) {
    App::setLocale( $lang );
    /*
     * app.php にURLを保存
     */
    $app_config_path = base_path() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "app.php";
    $app_config_str  = File::get( $app_config_path );
    $app_conf_ar     = explode( "\n", $app_config_str );
    $put_str         = "";

    foreach ( $app_conf_ar as $line ) {
      if ( strpos( $line, "'locale'" ) !== false ) {
        $line = $sep = "'locale' => '" . $lang . "',";
      }

      $put_str .= $line . "\n";
    }

    if (!config('app.demo_mode')) {
      File::put( $app_config_path, $put_str );
    }
    // Artisan::call( 'config:clear' );
    // Artisan::call( 'config:cache' );

    //リロード
    // header( "Location: " . $_SERVER['PHP_SELF'] );

    return view( 'setup.index' )->with( [
                                          "req"           => $request,
                                          "languages"     => Common::lang_list(),
                                          "setupLanguage" => App::getLocale(),
                                          "time_zone"     => config( "app.time_zone" )
                                        ] );

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return Application|Factory|Response|View
   */
  public function store( Request $request ) {
    $request->validate( [
                          'url'            => 'required|url',
                          'host'           => 'required',
                          'port'           => 'required',
                          'database'       => 'required',
                          'username'       => 'required',
                          'language'       => 'required',
                          // 'password'       => 'required',
                          'login_email'    => [ 'required', 'email' ],
                          'login_password' => [ 'required', new AdminPassword() ],
                        ], $this->messages );

    // database.php connectionsに接続情報を設定
    config( [
              "database.connections." . config( "database.default" ) . ".host"     => $request->input( "host" ),
              "database.connections." . config( "database.default" ) . ".port"     => $request->input( "port" ),
              "database.connections." . config( "database.default" ) . ".database" => $request->input( "database" ),
              "database.connections." . config( "database.default" ) . ".username" => $request->input( "username" ),
              "database.connections." . config( "database.default" ) . ".password" => $request->input( "password" ),
              "app.url"                                                            => $request->input( "url" ),
              "app.laravel_url"                                                    => $request->input( "url" ) . '/em_laravel',
              "app.theme_url"                                                      => $request->input( "url" ) . '/em_laravel/resources/views/theme',
              "app.admin_assets_url"                                               => $request->input( "url" ) . '/em_laravel/resources/views/admin',
              "app.attach_url"                                                     => $request->input( "url" ) . '/em_laravel/storage/app/attach_file',
              "app.timezone"                                                       => $request->input( "timezone" ),
            ] );

    // DB接続確認 NGならadmin.setupに遷移しもう一度入力
    if ( Common::db_connect_check() === false ) {
      return view( 'setup.index' )->with( [
                                            "warning"   => __( "setup.db_connection_error_msg" ),
                                            "req"       => $request,
                                            "languages" => Common::lang_list(),
                                            "time_zone" => config( "app.time_zone" )
                                          ] );
    }


    // DB接続OK
    /*
     * connectionに接続情報を保存
     */
    $db_config_path = base_path() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "database.php";
    $db_config_str  = File::get( $db_config_path );
    $db_conf_ar     = explode( "\n", $db_config_str );
    $mysql_flag     = false;
    $put_str        = "";
    $rew_count      = 0;
    $sep            = "            ";
    $ret_database   = 0;
    $ret_mail       = 0;
    $ret_app        = 0;

    foreach ( $db_conf_ar as $line ) {

      if ( strpos( $line, "mysql" ) !== false && strpos( $line, "=>" ) !== false && strpos( $line, "[" ) !== false ) {
        $mysql_flag = true;
      }
      if ( $mysql_flag == true ) {
        if ( strpos( $line, "host" ) !== false ) {
          $line = $sep . "'host' => env('DB_HOST', '" . $request->input( "host" ) . "'),";
          $rew_count ++;
        }
        if ( strpos( $line, "port" ) !== false ) {
          $line = $sep . "'port' => env('DB_PORT', '" . $request->input( "port" ) . "'),";
          $rew_count ++;
        }
        if ( strpos( $line, "database" ) !== false ) {
          $line = $sep . "'database' => '" . $request->input( "database" ) . "',";
          $rew_count ++;
        }
        // if ( strpos( $line, "database" ) !== false ) {
        //     $line = $sep . "'database' => env('DB_DATABASE', '" . $request->input( "database" ) . "'),";
        //     $rew_count ++;
        // }
        if ( strpos( $line, "username" ) !== false ) {
          $line = $sep . "'username' => env('DB_USERNAME', '" . $request->input( "username" ) . "'),";
          $rew_count ++;
        }
        if ( strpos( $line, "password" ) !== false ) {
          $line = $sep . "'password' => env('DB_PASSWORD', '" . $request->input( "password" ) . "'),";
          $rew_count ++;
        }
        if ( strpos( $line, "charset" ) !== false ) {
          $line = $sep . "'charset' => 'utf8mb4',";
          $rew_count ++;
        }
        if ( strpos( $line, "collation" ) !== false ) {
          $line = $sep . "'collation' => 'utf8mb4_unicode_ci',";
          $rew_count ++;
        }

        if ( $rew_count >= 8 || strpos( $line, "sqlite" ) || strpos( $line, "pgsql" ) || strpos( $line, "sqlsrv" ) ) {
          $mysql_flag = false;
        }
      }

      $put_str .= $line . "\n";

    }

    if (!config('app.demo_mode')) {
      if ( $ret_database = File::put( $db_config_path, $put_str ) ) {
        if ( $ret_database > 0 && $ret_mail > 0 && $ret_app > 0 ) {
          $this->migrate_field( $request );
        }
      }
    }

    /*
     * app.php にURLを保存
     */
    $app_config_path = base_path() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "app.php";
    $app_config_str  = File::get( $app_config_path );
    $app_conf_ar     = explode( "\n", $app_config_str );
    $put_str         = "";

    $url = $request->input( "url" );
    //最後にスラッシュが入力されていた場合は、スラッシュを削除する
    $url = rtrim( $url, '/' );

    foreach ( $app_conf_ar as $line ) {
      if ( strpos( $line, "APP_URL" ) !== false ) {
        $line = $sep = "'url' => env( 'APP_URL', '" . $url . "' ),";
      }
      else if ( strpos( $line, "LARAVEL_URL" ) !== false ) {
        $line = $sep = "'laravel_url' => env( 'LARAVEL_URL', '" . $url . "/em_laravel' ),";
      }
      else if ( strpos( $line, "THEME_URL" ) !== false ) {
        $line = $sep = "'theme_url' => env( 'THEME_URL', '" . $url . "/em_laravel/resources/views/theme' ),";
      }
      else if ( strpos( $line, "ADMIN_ASSETS_URL" ) !== false ) {
        $line = $sep = "'admin_assets_url' => env( 'ADMIN_ASSETS_URL', '" . $url . "/em_laravel/resources/views/admin' ),";
      }
      else if ( strpos( $line, "ATTACH_URL" ) !== false ) {
        $line = $sep = "'attach_url' => env( 'ATTACH_URL', '" . $url . "/em_laravel/storage/app/attach_file' ),";
      }
      else if ( strpos( $line, "timezone" ) !== false && strpos( $line, "=>" ) !== false ) {
        $line = $sep = "'timezone' => '" . $request->input( "timezone" ) . "',";
      }

      $put_str .= $line . "\n";
    }

    if (!config('app.demo_mode')) {
      if ( $ret_app = File::put( $app_config_path, $put_str ) ) {
        if ( $ret_database > 0 && $ret_mail > 0 && $ret_app > 0 ) {
          $this->migrate_field( $request );
        }
      }
    }

    /*
     * mail.php にパスワードを忘れたときのリセットメール送信元のメールアドレスを保存
     */
    $mail_config_path = base_path() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "mail.php";
    $mail_config_str  = File::get( $mail_config_path );
    $mail_conf_ar     = explode( "\n", $mail_config_str );
    $put_str          = "";

    $url = $request->input( "url" );
    //最後にスラッシュが入力されていた場合は、スラッシュを削除する
    $url = rtrim( $url, '/' );

    foreach ( $mail_conf_ar as $line ) {
      if ( strpos( $line, "MAIL_FROM_ADDRESS" ) !== false ) {
        $line = $sep = "'address' => env( 'MAIL_FROM_ADDRESS', '" . $request->input( "login_email" ) . "' ),";
      }
      else if ( strpos( $line, "MAIL_FROM_NAME" ) !== false ) {
        $line = $sep = "'name' => env( 'MAIL_FROM_NAME', 'EasyMail' ),";
      }
      $put_str .= $line . "\n";
    }

    if (!config('app.demo_mode')) {
      if ( $ret_mail = File::put( $mail_config_path, $put_str ) ) {
        if ( $ret_database > 0 && $ret_mail > 0 && $ret_app > 0 ) {
          $this->migrate_field( $request );
        }
      }
    }

    //seedに遷移
    return view( 'setup.comp', [
      "login_url" => $url . "/admin/login"
    ] );
  }

  public function migrate_field( $request ) {
    Artisan::call( 'config:clear' );
    Artisan::call( 'migrate', [ '--force' => true ] );
    Artisan::call( 'db:seed --force' );

    if ( $request->input( "login_email" ) && $request->input( "login_password" ) ) {
      DB::table( 'users' )
        ->insert( [
                    [
                      'name'       => 'user1',
                      'email'      => $request->input( "login_email" ),
                      'password'   => bcrypt( $request->input( "login_password" ) ),
                      'language'   => $request->input( "language" ),
                      'role'       => 1,
                      'login_flag' => 1,
                    ],
                  ] );
    }
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   *
   * @return void
   */
  public function show( $id ) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   *
   * @return void
   */
  public function edit( $id ) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int $id
   *
   * @return void
   */
  public function update( Request $request, $id ) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return void
   */
  public function destroy( $id ) {
    //
  }
}
