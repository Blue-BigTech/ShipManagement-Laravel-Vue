<?php

namespace App\Http\Controllers;

use App\Forms;
use App\Histories;
use App\Library\Common;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Artisan;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use Illuminate\View\View;

class AttachFileController extends Controller {
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
    PluginEvent::event( PluginEventConf::ADMIN_ATTACHFILE_INDEX_INITIALIZE, null );
    $attach_files = Storage::disk( "attach_file" )
      ->files();
    $files        = array();
    foreach ( $attach_files as $key => $file_name ) {
      Storage::disk( "attach_file" )
        ->setVisibility( $file_name, 'private' );

      $ex_ar      = explode( ".", $file_name );
      $extenstion = $ex_ar[ array_key_last( $ex_ar ) ];
      $icon       = Common::fileIcon( $extenstion );
      $type       = Common::fileType( $extenstion );
      $histores   = Histories::where( "attach_files", "like", "%{$file_name}%" )
        ->get();

      $created_at  = "";
      $form_name   = "";
      $admin_email = "";
      $user_email  = "";

      foreach ( $histores as $history ) {
        $created_at  = $history->created_at;
        $form_name   = $history->form_name;
        $admin_email = $history->admin_email;
        $user_email  = $history->user_email;
      }

      $files[] = (object) [
        "name"        => $file_name,
        "extenstion"  => $extenstion,
        "icon"        => $icon,
        "type"        => $type,
        "created_at"  => $created_at,
        "form_name"   => $form_name,
        "admin_email" => $admin_email,
        "user_email"  => $user_email
      ];
    }

    $info = null;
    if ( count( $attach_files ) === 0 ) {
      $info = "No attached files";
    }

    $arg = [
      'attach_files' => $attach_files,
      'files'        => $files,
      'info'         => $info,
      "perPage"      => 18,
      'append'       => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_ATTACHFILE_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.attach_file', [
      "files"   => $arg['files'],
      "perPage" => $arg['perPage'],
      'append'  => $arg['append'],
    ] )->with( "info", $arg['info'] );
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Request $request
   *
   * @return RedirectResponse
   */
  public function destroy( Request $request ) {
    $arg = [ 'request' => $request ];
    PluginEvent::event( PluginEventConf::ADMIN_ATTACHFILE_DESTROY_INITIALIZE, $arg );

    $file_ar = explode( ",", $request->input( "delete_file" ) );
    foreach ( $file_ar as $key => $file_name ) {
      Storage::disk( 'attach_file' )
        ->delete( "/" . $file_name );
    }

    $arg = [
      'request' => $request,
      'file_ar' => $file_ar,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_ATTACHFILE_DESTROY_JUST_BEFORE_REDIRECT, $arg );

    return redirect()
      ->route( 'admin.attach_file' )
      ->with( 'message', __( "admin_messages.delete_comp" ) );
  }

  public function getfile( $file_name ) {
    $arg = [ 'file_name' => $file_name ];
    PluginEvent::event( PluginEventConf::ADMIN_ATTACHFILE_GETFILE_INITIALIZE, $arg );

    if ( Storage::disk( 'attach_file' )
      ->exists( $file_name ) ) {
      $file = Storage::disk( 'attach_file' )
        ->get( $file_name );
      $url  = Storage::disk( 'attach_file' )
        ->url( $file_name );
      $arg  = [
        'file' => $file,
        'url'  => $url
      ];
      PluginEvent::event( PluginEventConf::ADMIN_ATTACHFILE_GETFILE_JUST_BEFORE_RETURN, $arg );

      return Storage::disk( 'attach_file' )
        ->download( $file_name );
    }
    else {
      PluginEvent::event( PluginEventConf::ADMIN_ATTACHFILE_GETFILE_JUST_BEFORE_RETURN, $arg );

      return false;
    }
  }

}
