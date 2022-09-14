<?php

namespace App\Http\Controllers;

use App\FormItems;
use App\Forms;
use App\Library\Common;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use File;
use Artisan;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use Illuminate\View\View;

class FormController extends Controller {

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
   * @return Application|Factory|ResponseAlias|View
   */
  public function index() {
    PluginEvent::event( PluginEventConf::ADMIN_FORM_INDEX_INITIALIZE, null );

    $data = Forms::orderBy( 'created_at', 'desc' )
      ->get();

    $arg = [
      "data"   => $data,
      'append' => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORM_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.form.list', [
      'data'   => $arg['data'],
      'append' => $arg['append'],
      'url'    => config( 'app.url' ),
    ] );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|ResponseAlias|View
   */
  public function create() {
    PluginEvent::event( PluginEventConf::ADMIN_FORM_CREATE_INITIALIZE, null );
    $theme = Common::theme_list();
    $lang  = Common::lang_list();
    $arg   = [
      "theme"         => $theme,
      "lang"          => $lang,
      "sp_sender_tag" => Forms::$sp_sender_tag,
      "sp_time_tag"   => Forms::$sp_time_tag,
      "append"        => require base_path() . "/config/append.php",
    ];
    $arg   = PluginEvent::event( PluginEventConf::ADMIN_FORM_CREATE_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.form.create', [
      'theme'         => $arg['theme'],
      'lang'          => $arg['lang'],
      'sp_sender_tag' => $arg['sp_sender_tag'],
      'sp_time_tag'   => $arg['sp_time_tag'],
      'append'        => $arg['append'],
    ] );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return RedirectResponse
   */
  public function store( Request $request ) {
    $validate     = [
      'url'         => 'unique:forms',
      'name'        => 'required',
      'theme_name'  => 'required',
      'mail_title'  => 'required',
      'admin_email' => 'required|email',
    ];
    $validate_msg = [
      'url.unique'           => __( "admin_messages.form.folder_duplicated" ),
      'name.required'        => __( "admin_messages.form.form_name_is_required" ),
      'theme_name.required'  => __( "admin_messages.form.theme_name_is_required" ),
      'mail_title.required'  => __( "admin_messages.form.automatic_reply_email_subject_is_required" ),
      'admin_email.required' => __( "admin_messages.form.administrator_received_email_address_is_required" ),
      'admin_email.email'    => __( "admin_messages.form.email_address_format" ),
    ];
    $arg          = [
      "request"      => $request,
      "validate"     => $validate,
      "validate_msg" => $validate_msg,
    ];
    $arg          = PluginEvent::event( PluginEventConf::ADMIN_FORM_STORE_INITIALIZE, $arg );

    $arg['request']->validate( $arg['validate'], $arg['validate_msg'] );

    $forms = new Forms();

    if (!config('app.demo_mode')) {
      $forms->fill( $request->all() );
      $forms->save();
    }

    $arg = [
      "forms"   => $forms,
      "request" => $request,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_FORM_STORE_JUST_BEFORE_REDIRECT, $arg );

    return redirect()
      ->route( 'admin.form.list' )
      ->with( "message", "登録しました" );
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $id
   *
   * @return Application|Factory|ResponseAlias|View
   */
  public function edit( $id ) {
    $arg = [
      "id"     => $id,
      "append" => require base_path() . "/config/append.php",
    ];
    PluginEvent::event( PluginEventConf::ADMIN_FORM_EDIT_INITIALIZE, $arg );

    $data       = Forms::find( $id );
    $theme      = Common::theme_list();
    $language   = Common::lang_list();
    $form_items = FormItems::where( "form_items.form_id", "=", $id )
      ->leftJoin( 'form_blocks', 'form_items.form_block_id', '=', 'form_blocks.id' )
      ->get();

    $arg = [
      "data"          => $data,
      "form_items"    => $form_items,
      "theme"         => $theme,
      "language"      => $language,
      "sp_sender_tag" => Forms::$sp_sender_tag,
      "sp_time_tag"   => Forms::$sp_time_tag,
      "append"        => require base_path() . "/config/append.php",
    ];

    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORM_EDIT_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.form.edit', [
      'data'          => $arg['data'],
      'form_items'    => $arg['form_items'],
      'theme'         => $arg['theme'],
      'language'      => $arg['language'],
      'sp_sender_tag' => $arg['sp_sender_tag'],
      'sp_time_tag'   => $arg['sp_time_tag'],
      'append'        => $arg['append'],
      'url'           => config( 'app.url' ),
    ] );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param $id
   *
   * @return Application|Factory|View|void
   */
  public function update( Request $request, $id ) {
    $forms = Forms::find( $id );
    if ( $id ) {
      $unique = 'unique:forms,url,' . $id . ',id';
    }
    else {
      $unique = 'required|unique:forms,url';
    }

    $validate     = [
      'url'         => $unique,
      'name'        => 'required',
      'theme_name'  => 'required',
      'mail_title'  => 'required',
      'admin_email' => 'required|email',
    ];
    $validate_msg = [
      'url.unique'           => __( "admin_messages.form.folder_duplicated" ),
      'name.required'        => __( "admin_messages.form.form_name_is_required" ),
      'theme_name.required'  => __( "admin_messages.form.theme_name_is_required" ),
      'mail_title.required'  => __( "admin_messages.form.automatic_reply_email_subject_is_required" ),
      'admin_email.required' => __( "admin_messages.form.administrator_received_email_address_is_required" ),
      'admin_email.email'    => __( "admin_messages.form.email_address_format" ),
    ];
    $arg          = [
      "id"           => $id,
      "request"      => $request,
      "validate"     => $validate,
      "validate_msg" => $validate_msg,
    ];

    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORM_UPDATE_INITIALIZE, $arg );

    $request->validate( $arg['validate'], $arg['validate_msg'] );

    if (!config('app.demo_mode')) {
      $forms->fill( $request->all() );
      $forms->save();
    }

    $message = __( "admin_messages.rew_comp" );

    $forms      = Forms::find( $id );
    $theme      = Common::theme_list();
    $language   = Common::lang_list();
    $form_items = FormItems::where( "form_items.form_id", "=", $forms->id )
      ->leftJoin( 'form_blocks', 'form_items.form_block_id', '=', 'form_blocks.id' )
      ->get();

    $arg = [
      "forms"         => $forms,
      "request"       => $request,
      "theme"         => $theme,
      "message"       => $message,
      "language"      => $language,
      "sp_sender_tag" => Forms::$sp_sender_tag,
      "sp_time_tag"   => Forms::$sp_time_tag,
      "form_items"    => $form_items,
      "append"        => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORM_UPDATE_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.form.edit', [
      'data'          => $arg['forms'],
      'theme'         => $arg['theme'],
      'message'       => $arg['message'],
      'language'      => $arg['language'],
      'sp_sender_tag' => $arg['sp_sender_tag'],
      'sp_time_tag'   => $arg['sp_time_tag'],
      'form_items'    => $arg['form_items'],
      'append'        => $arg['append'],
      'url'           => config( 'app.url' ),
    ] )->with( "message", __( "admin_messages.rew_comp" ) );
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $id
   *
   * @return RedirectResponse
   */
  public function destroy( $id ) {
    if (!config('app.demo_mode')) {
      $arg = [ "id" => $id ];
      $arg = PluginEvent::event( PluginEventConf::ADMIN_FORM_DESTROY_INITIALIZE, $arg );
      Forms::destroy( $arg['id'] );
      PluginEvent::event( PluginEventConf::ADMIN_FORM_DESTROY_JUST_BEFORE_REDIRECT, $arg );
    }

    return redirect()
      ->route( 'admin.form.list' )
      ->with( "message", __( 'admin_messages.delete_comp' ) );
  }

  public function copy( $id ) {
    $arg = [ "id" => $id ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORM_COPY_INITIALIZE, $arg );
    //formsのレコードを複製
    $origin_form = Forms::find( $arg['id'] );
    if (!config('app.demo_mode')) {
      $origin_form->replicate()
        ->fill( [
                  "url"  => "Copy_of_" . $origin_form->url,
                  "name" => "Copy_of_" . $origin_form->name,
                ] )
        ->save();
    }

    //form_itemsのレコードを複製
    $new_form          = Forms::find( Forms::max( "id" ) );
    $origin_form_items = FormItems::where( "form_id", "=", $arg['id'] )
      ->get();
    foreach ( $origin_form_items as $origin_form_item ) {
      if (!config('app.demo_mode')) {
        $origin_form_item->replicate()
          ->fill( [
                    "form_id" => $new_form->id
                  ] )
          ->save();
      }
    }
    $arg = [
      "origin_form"       => $origin_form,
      "origin_form_items" => $origin_form_items,
      "new_form"          => $new_form,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_FORM_COPY_JUST_BEFORE_REDIRECT, $arg );

    return redirect()
      ->route( 'admin.form.list' )
      ->with( "message", __( "admin_messages.copy_comp" ) );
  }

}
