<?php

namespace App\Http\Controllers;

use App\Library\Common;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use File;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use Illuminate\View\View;

class ThemeController extends Controller {

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
      "theme" => $this->get_theme(),
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_THEME_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.theme.index', [
      'theme' => $arg['theme'],
    ] );
  }

  /**
   * Display the specified resource.
   *
   * @param $theme_name
   *
   * @return Application|Factory|Response|View
   */
  public function show( $theme_name ) {
    $arg = [ 'theme_name' => $theme_name ];
    PluginEvent::event( PluginEventConf::ADMIN_THEME_SHOW_INITIALIZE, $arg );

    $temp_files = File::files( config( 'app.theme_abs_path' ) . DIRECTORY_SEPARATOR . $theme_name );
    $files      = array();
    foreach ( $temp_files as $key => $file ) {
      $files[] = [
        "path"      => $file,
        "file_name" => Common::get_last_df( $file ),
        "content"   => File::get( $file )
      ];
    }

    // フォルダ
    $temp_dirs = File::directories( config( 'app.theme_abs_path' ) . DIRECTORY_SEPARATOR . $theme_name );
    $dirs      = array();
    foreach ( $temp_dirs as $key => $dir ) {
      $temp_dirs             = array();
      $temp_dirs['dir_name'] = Common::get_last_df( $dir );
      $file_ar               = File::files( $dir );
      foreach ( $file_ar as $f_key => $file ) {
        $temp_dirs['file'][] = [
          "path"      => $file,
          "file_name" => Common::get_last_df( $file ),
          "content"   => File::get( $file )
        ];

      }
      $dirs[] = $temp_dirs;
    }

    $arg = [
      'files' => $files,
      'dirs'  => $dirs,
      'theme' => $this->get_theme( $theme_name )
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_THEME_SHOW_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.theme.show', [
      'theme' => $arg['theme'],
      'files' => $arg['files'],
      'dirs'  => $arg['dirs'],
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
    PluginEvent::event( PluginEventConf::ADMIN_THEME_UPDATE_INITIALIZE, null );
    $bytes_written = File::put( $request->input( "save_file_path" ), $request->input( "save_file_content" ) );
    if ( $bytes_written === false ) {
      PluginEvent::event( PluginEventConf::ADMIN_THEME_UPDATE_JUST_BEFORE_ERROR_REDIRECT, null );

      if (!config('app.demo_mode')) {
        return redirect()
        ->route( 'admin.theme.show', [
          "theme_name" => $request->input( "theme_name" ),
        ] )
        ->with( [
                  'warning' => __( "admin_messages.file_rew_error" ),
                ] );
      } else {
        return redirect()
        ->route( 'admin.theme.show', [] )
        ->with( [
                  'warning' => __( "admin_messages.file_rew_error" ),
                ] );
      }

    }
    else {
      PluginEvent::event( PluginEventConf::ADMIN_THEME_UPDATE_JUST_BEFORE_SAVE_REDIRECT, null );

      if (!config('app.demo_mode')) {
        return redirect()
        ->route( 'admin.theme.show', [] )
        ->with( [
                  'message' => __( "admin_messages.saved" ),
                ] );
      } else {
        return redirect()
        ->route( 'admin.theme.show', [
          "theme_name" => $request->input( "theme_name" ),
        ] )
        ->with( [
                  'message' => __( "admin_messages.saved" ),
                ] );
      }
    }
  }


  public function get_theme( $theme_name = null ) {
    $arg = [ 'theme_name' => $theme_name ];
    PluginEvent::event( PluginEventConf::ADMIN_THEME_GET_THEME_INITIALIZE, $arg );

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
      if ( $theme_name ) {
        if ( $theme_name == $temp->theme_name ) {
          $ret = $temp;
        }
      }
      else {
        $ret[] = $temp;
      }

    }

    $arg = [
      'theme_ar' => $theme_ar,
      'ret'      => $ret,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_THEME_GET_THEME_JUST_BEFORE_RETURN, $arg );

    return $ret;
  }

}
