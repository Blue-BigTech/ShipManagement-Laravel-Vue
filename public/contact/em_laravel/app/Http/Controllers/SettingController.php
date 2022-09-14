<?php

namespace App\Http\Controllers;

use App\Library\Common;
use App\Rules\AdminPassword;
use App\Rules\AdminPasswordCheck;
use App\Rules\MatchCheck;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use File;
use Artisan;
use Illuminate\View\View;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;

class SettingController extends Controller {

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    PluginEvent::event( PluginEventConf::ADMIN_CONSTRACT_INITIALIZE, null );
    $this->middleware( [ 'check_language', 'dash_board_menu' ] );
    PluginEvent::event( PluginEventConf::ADMIN_CONSTRACT_COMPLETE, null );
  }

  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|Response|View
   */
  public function index() {
    $arg = [
      'url'       => config( "app.url" ),
      'timezone'  => config( "app.timezone" ),
      'time_zone' => config( "app.time_zone" ),
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_SETTING_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.setting', [
      "url"       => $arg['url'],
      "timezone"  => $arg['timezone'],
      "time_zone" => $arg['time_zone'],
    ] );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   *
   * @return RedirectResponse
   */
  public function update( Request $request ) {
    $arg = [ 'request' => $request ];
    PluginEvent::event( PluginEventConf::ADMIN_SETTING_UPDATE_INITIALIZE, $arg );

    $url = $request->input( "url" );

    $url_str              = "'url' => env( 'APP_URL', '" . $url . "' ),";
    $laravel_url_str      = "'laravel_url' => env( 'LARAVEL_URL', '" . $url . "/em_laravel' ),";
    $theme_url_str        = "'theme_url' => env( 'THEME_URL', '" . $url . "/em_laravel/resources/views/theme' ),";
    $admin_assets_url_str = "'admin_assets_url' => env( 'ADMIN_ASSETS_URL', '" . $url . "/em_laravel/resources/views/admin' ),";
    $setup_assets_url_str = "'setup_assets_url' => env( 'SETUP_ASSETS_URL', '" . $url . "/em_laravel/resources/views/setup' ),";
    $attach_url           = "'attach_url' => env( 'ATTACH_URL', '" . $url . "/em_laravel/storage/app/attach_file' ),";
    $timezone_str         = "'timezone' => '" . $request->input( "time_zone" ) . "',";

    $app_config_path = base_path() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "app.php";
    $app_config_str  = File::get( $app_config_path );
    $app_conf_ar     = explode( "\n", $app_config_str );
    $put_str         = "";

    foreach ( $app_conf_ar as $line ) {
      if ( strpos( $line, "APP_URL" ) !== false ) {
        $line = $url_str;
      }
      else if ( strpos( $line, "LARAVEL_URL" ) !== false ) {
        $line = $laravel_url_str;
      }
      else if ( strpos( $line, "THEME_URL" ) !== false ) {
        $line = $theme_url_str;
      }
      else if ( strpos( $line, "ADMIN_ASSETS_URL" ) !== false ) {
        $line = $admin_assets_url_str;
      }
      else if ( strpos( $line, "SETUP_ASSETS_URL" ) !== false ) {
        $line = $setup_assets_url_str;
      }
      else if ( strpos( $line, "ATTACH_URL" ) !== false ) {
        $line = $attach_url;
      }
      else if ( strpos( $line, "timezone" ) !== false && strpos( $line, "=>" ) !== false ) {
        $line = $timezone_str;
        date_default_timezone_set( $request->input( "time_zone" ) );
      }
      $put_str .= $line . "\n";
    }

    if (config('app.demo_mode')) {
      return redirect()->route( "admin.setting" );
    }

    if ( File::put( $app_config_path, $put_str ) > 0 ) {

      config( [
                "app.url"              => $url,
                "app.laravel_url"      => $url . '/em_laravel',
                "app.theme_url"        => $url . '/em_laravel/resources/views/theme',
                "app.admin_assets_url" => $url . '/em_laravel/resources/views/admin',
                "app.attach_url"       => $url . '/em_laravel/storage/app/attach_file',
                "app.time_zone"        => $request->input( "time_zone" ),
              ] );

      // config cache クリア
      Artisan::call( 'config:clear' );

      usleep( 5000000 );//5seconds

      $arg = [
        'put_str'         => $put_str,
        'app_config_path' => $app_config_path,
        'request'         => $request
      ];
      PluginEvent::event( PluginEventConf::ADMIN_SETTING_UPDATE_JUST_BEFORE_REDIRECT, $arg );

      return redirect()
        ->route( "admin.setting" )
        ->with( "message", __( "admin_messages.rew_comp" ) );
    }
    else {
      return redirect()
        ->route( "admin.setting" )
        ->with( "message", __( "admin_messages.file_rew_error" ) );
    }

  }

  public function setting_redirect() {
  }

  public function rew_pass( Request $request, $message = null ) {
    $arg = [ 'request' => $request ];
    PluginEvent::event( PluginEventConf::ADMIN_SETTING_REW_PASS_INITIALIZE, $arg );

    $user = Auth::user();

    $arg = [
      'request' => $request,
      'users'   => $user
    ];
    PluginEvent::event( PluginEventConf::ADMIN_SETTING_REW_PASS_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.rew_pass', [
      "email"     => $user->email,
      "new_email" => "",
      "message"   => $message
    ] );
  }

  public function pass_update( Request $request ) {
    $arg = [ 'request' => $request ];
    PluginEvent::event( PluginEventConf::ADMIN_SETTING_PASS_UPDATE_INITIALIZE, $arg );

    $users = Auth::user();

    $request->validate( [
                          'email'        => [ 'required', 'email', new MatchCheck( $users->email, $request->input( "email" ) ) ],
                          'password'     => [ 'required', new AdminPasswordCheck( $request->input( "password" ), $users->password ) ],
                          'new_email'    => [ 'required', 'email' ],
                          'new_password' => [ 'required', new AdminPassword() ],

                        ], [
                          'email.email'           => __( 'setting.email_format_error_msg' ),
                          'email.required'        => __( 'setting.email_error_msg' ),
                          'new_email.email'       => __( 'setting.new_email_format_error_msg' ),
                          'new_email.required'    => __( 'setting.new_email_error_msg' ),
                          'new_password.required' => __( 'setting.new_password_error_msg' ),
                          'password.required'     => __( 'setting.password_error_msg' ),
                        ] );

    $arg = [
      'request' => $request,
      'users'   => $users,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_SETTING_PASS_UPDATE_JUST_BEFORE_REDIRECT, $arg );

    // ログイン情報を更新
    $user = User::find( $users->id );
    if (!config('app.demo_mode')) {
      $user->fill( [
                    "email"    => $request->input( 'new_email' ),
                    "password" => bcrypt( $request->input( 'new_password' ) ),
                  ] )
        ->save();
    }

    $arg = [
      'request' => $request,
      'users'   => $users,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_SETTING_PASS_UPDATE_JUST_BEFORE_REDIRECT, $arg );

    if (config('app.demo_mode')) {
      return view( 'admin.rew_pass');
    } else {
      return redirect()->route( "logout" );
    }
  }

}
