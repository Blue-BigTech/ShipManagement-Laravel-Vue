<?php

namespace App\Http\Controllers;

use App\Forms;
use App\Histories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;

class HistoryController extends Controller {
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
   * @return Application|Factory|View
   */
  public function index() {
    PluginEvent::event( PluginEventConf::ADMIN_HISTORY_INDEX_INITIALIZE, null );

    $historis = Histories::orderBy( "created_at", "desc" )
      ->get();
    $forms    = Forms::all();
    $data     = array();
    foreach ( $historis as $key => $history ) {
      $attach_files = array();
      $files        = explode( ",", $history->attach_files );
      foreach ( $files as $key => $file ) {
        if ( $file ) {
          $attach_files[] = $file;
        }
      }

      $data[] = (object) [
        "id"                              => $history->id,
        "created_at"                      => $history->created_at,
        "admin_email"                     => $history->admin_email,
        "user_email"                      => $history->user_email,
        "mail_title"                      => $history->mail_title,
        "bcc_email"                       => $history->bcc_email,
        "cc_email"                        => $history->cc_email,
        "conf_mail_flag"                  => $history->conf_mail_flag,
        "include_submissions"             => $history->include_submissions,
        "include_submissions_admin_email" => $history->include_submissions_admin_email,
        "url"                             => $history->url,
        "template"                        => $history->template,
        "attach_files"                    => $history->attach_files,
        "form_id"                         => $history->form_id,
        "form_name"                       => $history->form_name,
        "content"                         => json_decode( $history->content ),
        "attach_files"                    => $attach_files,
      ];
    }

    $arg = [
      'historis' => $historis,
      'forms'    => $forms,
      'data'     => $data,
      'append'   => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_HISTORY_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.history.list', [
      "forms"  => $arg['forms'],
      "data"   => $arg['data'],
      'append' => $arg['append'],
    ] );
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $history_id
   *
   * @return RedirectResponse
   */
  public function destroy( $history_id ) {
    if (!config('app.demo_mode')) {
      $arg = [ 'history_id' => $history_id ];
      PluginEvent::event( PluginEventConf::ADMIN_HISTORY_DESTROY_INITIALIZE, $arg );

      Histories::destroy( $history_id );

      $arg = [ 'history_id' => $history_id ];
      PluginEvent::event( PluginEventConf::ADMIN_HISTORY_DESTROY_JUST_BEFORE_REDIRECT, $arg );
    }

    return redirect()
      ->route( 'admin.history.list_in_form' )
      ->with( "message", __( "admin_messages.delete_comp" ) );
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param Request $request
   *
   * @return Application|Factory|Response|View
   */
  public function list_in_form( Request $request ) {
    $arg = [ 'request' => $request ];
    PluginEvent::event( PluginEventConf::ADMIN_HISTORY_LIST_IN_FORM_INITIALIZE, $arg );

    $forms    = Forms::all();
    $historis = array();
    $form     = array();

    if ( $request->input( 'form_id' ) ) {
      $form     = Forms::where( "id", "=", $request->input( 'form_id' ) )
        ->first();
      $historis = Histories::where( "form_id", "=", $request->input( 'form_id' ) )
        ->orderBy( "created_at", "desc" )
        ->get();
    }
    else {
      $form = Forms::orderBy( "created_at", "desc" )
        ->first();
      if ( isset( $form ) ) {
        $historis = Histories::where( "form_id", "=", $form->id )
          ->orderBy( "created_at", "desc" )
          ->get();
      }
      else {
        $form     = new Forms();
        $historis = Histories::orderBy( "created_at", "desc" )
          ->get();
      }
    }

    $data = array();
    foreach ( $historis as $key => $history ) {
      $attach_files = array();
      $files        = explode( ",", $history->attach_files );
      foreach ( $files as $key => $file ) {
        if ( $file ) {
          $attach_files[] = $file;
        }
      }

      $data[] = (object) [
        "form_name"                       => $history->form_name,
        "form_id"                         => $history->form_id,
        "id"                              => $history->id,
        "admin_email"                     => $history->admin_email,
        "mail_title"                      => $history->mail_title,
        "bcc_email"                       => $history->bcc_email,
        "cc_email"                        => $history->cc_email,
        "conf_mail_flag"                  => $history->conf_mail_flag,
        "include_submissions"             => $history->include_submissions,
        "include_submissions_admin_email" => $history->include_submissions_admin_email,
        "url"                             => $history->url,
        "template"                        => $history->template,
        "created_at"                      => $history->created_at,
        "user_email"                      => $history->user_email,
        "content"                         => json_decode( $history->content ),
        "attach_files"                    => $attach_files,
      ];
    }

    $arg = [
      'forms'    => $forms,
      'form'     => $form,
      'historis' => $historis,
      'data'     => $data,
      'append'   => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_HISTORY_LIST_IN_FORM_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.history.list_in_form', [
      "forms"  => $arg['forms'],
      "form"   => $arg['form'],
      "data"   => $arg['data'],
      'append' => $arg['append'],
    ] );
  }

}
