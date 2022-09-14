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

class LanguageFileController extends Controller {
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
      'append' => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_LANGUAGEFILE_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.language_file.index', [
      'lang'   => $this->get_language(),
      'append' => $arg['append'],
    ] );
  }

  /**
   * Display the specified resource.
   *
   * @param $lang_name
   *
   * @return Application|Factory|Response|View
   */
  public function show( $lang_name ) {
    $arg = [ 'lang_name' => $lang_name ];
    PluginEvent::event( PluginEventConf::ADMIN_LANGUAGEFILE_SHOW_INITIALIZE, $arg );

    // ファイル
    $temp_files = File::files( config( 'app.lang_abs_path' ) . DIRECTORY_SEPARATOR . $lang_name );
    $files      = array();
    foreach ( $temp_files as $key => $file ) {
      $files[] = [
        "path"      => $file,
        "file_name" => Common::get_last_df( $file ),
        "content"   => File::get( $file )
      ];
    }

    // フォルダ
    $temp_dirs = File::directories( config( 'app.lang_abs_path' ) . DIRECTORY_SEPARATOR . $lang_name );
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
      'lang_name' => $this->get_language( $lang_name ),
      'files'     => $files,
      'dirs'      => $dirs,
      'append'    => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_LANGUAGEFILE_SHOW_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.language_file.show', [
      'lang'   => $arg['lang_name'],
      'files'  => $arg['files'],
      'dirs'   => $arg['dirs'],
      'append' => $arg['append'],
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
    PluginEvent::event( PluginEventConf::ADMIN_LANGUAGEFILE_UPDATE_INITIALIZE, $arg );

    $bytes_written = File::put( $request->input( "save_file_path" ), $request->input( "save_file_content" ) );
    if ( $bytes_written === false ) {
      $arg = [ 'request' => $request ];
      PluginEvent::event( PluginEventConf::ADMIN_LANGUAGEFILE_UPDATE_JUST_BEFORE_ERROR_REDIRECT, $arg );

      return redirect()
        ->route( 'admin.language.show', [
          "language_name" => $request->input( "lang_name" ),
        ] )
        ->with( [
                  'warning' => __( "admin_messages.file_rew_error" ),
                ] );
    }
    else {
      $arg = [ 'request' => $request ];
      PluginEvent::event( PluginEventConf::ADMIN_LANGUAGEFILE_UPDATE_JUST_BEFORE_SAVE_REDIRECT, $arg );

      return redirect()
        ->route( 'admin.language_file.show', [
          "language_name" => $request->input( "lang_name" ),
        ] )
        ->with( [
                  'message'        => __( "admin_messages.saved" ),
                  'save_file_path' => $request->input( "save_file_path" ),
                ] );
    }
  }

  public function get_language( $lang_name = null ) {
    $arg = [ 'lang_name' => $lang_name ];
    PluginEvent::event( PluginEventConf::ADMIN_LANGUAGEFILE_GET_LANGUAGE_INITIALIZE, $arg );

    $ret     = array();
    $lang_ar = glob( config( 'app.lang_abs_path' ) . DIRECTORY_SEPARATOR . "*" );
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

      if ( $lang_name ) {
        if ( $lang_name == $temp->lang_name ) {
          $ret = $temp;
        }
      }
      else {
        $ret[] = $temp;
      }

    }
    $arg = [
      'lang_name' => $lang_name,
      'ret'       => $ret,
      'lang_ar'   => $lang_ar,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_LANGUAGEFILE_GET_LANGUAGE_JUST_BEFORE_REDIRECT, $arg );

    return $ret;
  }

}
