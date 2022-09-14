<?php

namespace App\Http\Controllers;

use App\Forms;
use App\FormItems;
use App\FormBlocks;
use App\Library\Common;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use Illuminate\View\View;

class FormItemController extends Controller {
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
   * Show the form for editing the specified resource.
   *
   * @param $form_id
   *
   * @return Application|Factory|Response|View
   */
  public function edit( $form_id ) {
    $arg = [ 'form_id' => $form_id ];
    PluginEvent::event( PluginEventConf::ADMIN_FORMITEM_EDIT_INITIALIZE, $arg );

    $form                        = Forms::find( $form_id );
    $form_items                  = FormItems::where( "form_items.form_id", "=", $form_id )
      ->where( "form_blocks.id", ">", 0 )
      ->leftJoin( 'form_blocks', 'form_items.form_block_id', '=', 'form_blocks.id' )
      ->orderBy( "form_items.view_no", "asc" )
      ->get();
    $form_items_form_block_id_ar = FormItems::where( "form_items.form_id", "=", $form_id )
      ->leftJoin( 'form_blocks', 'form_items.form_block_id', '=', 'form_blocks.id' )
      ->pluck( 'form_items.form_block_id' )
      ->toArray();
    $form_blocks                 = FormBlocks::whereNotIn( "id", $form_items_form_block_id_ar )
      ->orderBy( "view_no", "asc" )
      ->get();

    foreach ( $form_items as $key => $form_item ) {
      $form_items[ $key ]->lang_title = Common::lang_title( $form_item, $form->language );
    }

    foreach ( $form_blocks as $key => $form_block ) {
      $form_blocks[ $key ]->lang_title = Common::lang_title( $form_block, $form->language );
    }

    $arg = [
      'form'                        => $form,
      'form_items'                  => $form_items,
      'form_items_form_block_id_ar' => $form_items_form_block_id_ar,
      'form_blocks'                 => $form_blocks,
      'append'                      => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORMITEM_EDIT_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.form_item.edit', [
      'form'        => $arg['form'],
      'form_blocks' => $arg['form_blocks'],
      'form_items'  => $arg['form_items'],
      'url'         => config( 'app.url' ),
      'append'      => $arg['append'],
    ] );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param $form_id
   *
   * @return RedirectResponse
   */
  public function update( Request $request, $form_id ) {
    $arg = [
      'request' => $request,
      'form_id' => $form_id
    ];
    PluginEvent::event( PluginEventConf::ADMIN_FORM_ITEM_UPDATE_INITIALIZE, $arg );

    /**
     * 現在の利用項目レコードを削除
     */
    if (!config('app.demo_mode')) {
      FormItems::where( 'form_id', '=', $form_id )
        ->delete();
    }

    /*
    * 利用項目の保存
    */ // dump( $request->input( "form_block_id" ) );
    // dd( $request->input( "required" ) );
    foreach ( (array) $request->input( "form_block_id" ) as $index => $value ) {
      $form_block_id = $request->input( "form_block_id.$index" );
      $required      = 0;
      $real_time_validation = 0;
      if ( $request->input( "required.$form_block_id" ) == 1 ) {
        $required = 1;
      }
      if ( $request->input( "real_time_validation.$form_block_id" ) == 1 ) {
        $real_time_validation = 1;
      }
      $form_item = new FormItems();
      if (!config('app.demo_mode')) {
        $form_item->fill( [
                            'view_no'                       => $index + 1,
                            'form_id'                       => $form_id,
                            'form_block_id'                 => $form_block_id,
                            'required'                      => $required,
                            'real_time_validation'          => $real_time_validation,
                            're_enter_html_id'              => $request->input( "re_enter_html_id.$index" ),
                          ] );
        $form_item->save();
      }
    }

    $arg = [
      'request' => $request,
      'form_id' => $form_id
    ];
    PluginEvent::event( PluginEventConf::ADMIN_FORM_ITEM_UPDATE_JUST_BEFORE_REDIRECT, $arg );

    return redirect()
      ->route( 'admin.form_item.edit', $form_id )
      ->with( "message", __( "admin_messages.rew_comp" ) );
  }

}
