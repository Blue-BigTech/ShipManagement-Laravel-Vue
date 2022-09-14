<?php

namespace App\Http\Controllers;

use App\FormBlocks;
use App\Choices;
use App\Forms;
use App\FormItems;
use App\Rules\AlphabetNumHyphenUnderscore;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Request as RequestAlias;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class FormBlockController extends Controller {
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
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_INDEX_INITIALIZE, null );
    $blocks = FormBlocks::orderBy( 'view_no', 'asc' )
      ->orderBy( 'created_at', 'asc' )
      ->get();

    $data = array();
    foreach ( $blocks as $index => $block ) {
      $temp                        = array();
      $temp['id']                  = $block->id;
      $temp['view_no']             = $block->view_no;
      $temp['title']               = $block->title;
      $temp['name']                = $block->name;
      $temp['form_type']           = $block->form_type;
      $temp['html_id']             = $block->html_id;
      $temp['html_class']          = $block->html_class;
      $temp['initial_value']       = $block->initial_value;
      $temp['columns']             = $block->columns;
      $temp['file_type']           = $block->file_type;
      $temp['file_capacity_limit'] = $block->file_capacity_limit;
      $temp['restriction']         = $block->restriction ? FormBlocks::$restriction[ $block->restriction ] : "";
      $temp['placeholder']         = $block->placeholder;
      $temp['select_choice']       = Choices::where( 'block_id', '=', $block->id )
        ->where( 'choice_type', '=', 'select' )
        ->orderBy( 'view_no', 'asc' )
        ->get();
      $temp['radio_choice']        = Choices::where( 'block_id', '=', $block->id )
        ->where( 'choice_type', '=', 'radio' )
        ->orderBy( 'view_no', 'asc' )
        ->get();
      $temp['use_form_item_name']  = Forms::get_use_form_item_name( $block->id );
      $temp['required_error_msg']  = $block->required_error_msg;
      $data[]                      = $temp;
    }

    $arg = [
      'blocks' => $blocks,
      'data'   => $data,
      'append' => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.form_block.list', [
      'data'   => $arg['data'],
      'append' => $arg['append'],
    ] );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|Response|View
   */
  public function create() {
    $arg = [
      'append'      => require base_path() . "/config/append.php",
      'form_type'   => FormBlocks::$form_type[ Auth::user()->language ],
      'restriction' => FormBlocks::$restriction,
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_CREATE_INITIALIZE, $arg );

    return view( 'admin.form_block.create', [
      'form_type'   => $arg['form_type'],
      'restriction' => $arg['restriction'],
      'append'      => $arg['append'],
    ] );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param RequestAlias $request
   *
   * @return RedirectResponse
   */
  public function store( Request $request ) {
    $arg = [
      'request' => $request,
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_STORE_INITIALIZE, $arg );

    $validate_ar = [
      'title'     => 'required',
      'view_no'   => 'required|integer',
      'form_type' => 'required',
    ];
    $validate_msg = [
      'title.required'      => __( "admin_messages.form_block.title_required" ),
      'name.required'       => __( "admin_messages.form_block.name_required" ),
      'view_no.required'    => __( "admin_messages.form_block.view_no_required" ),
      'view_no.numeric'     => __( "admin_messages.form_block.view_no_numeric" ),
      'form_type.required'  => __( "admin_messages.form_block.form_type_required" ),
      'name.num_alpha_dash' => __( "admin_messages.form_block.name_num_alpha_dash" ),
      'columns.integer'     => __( "admin_messages.form_block.columns_integer" ),
      'columns.between'     => __( "admin_messages.form_block.columns_between" ),
    ];
    $arg          = [
      "request"      => $request,
      "validate_msg" => $validate_msg,
    ];
    if ( in_array( $arg['request']->form_type, [ 'text', 'number', 'email', 'password', 'tel', 'url', 'multi_select', 'radio' , 'checkbox' , 'file' , 'date' , 'datetime' , 'month'] ) ) {
      $validate_ar = array_merge( $validate_ar, [ 'name' => [ 'required', new AlphabetNumHyphenUnderscore() ] ] );
    }
    else {
      $validate_ar = array_merge( $validate_ar, [ 'name' => [ 'nullable', new AlphabetNumHyphenUnderscore() ] ] );
    }
    $arg['request']->validate( $validate_ar, $arg['validate_msg'] );

    /*
     * 項目の保存
     */

    $form_blocks = new FormBlocks();

    if (!config('app.demo_mode')) {
      $form_blocks->fill( $arg['request']->all() )
        ->save();
    }

    /*
     * 選択肢の保存 select
     */
    if (!config('app.demo_mode')) {
      foreach ( (array) $arg['request']->input( 'select_choice_label_text' ) as $index => $value ) {
        $choices = new Choices();
        $choices->fill( [
                          'view_no'     => $index + 1,
                          'block_id'    => $form_blocks->id,
                          'choice_type' => 'select',
                          'label_text'  => $value,
                        ] );
        $choices->save();
      }
    }

    /*
     * 選択肢の保存 radio checkbox
     */
    foreach ( (array) $arg['request']->input( 'radio_choice_label_text' ) as $index => $value ) {
      $choices = new Choices();

      //画像の保存
      $image_hash_name = "";
      if ( $arg['request']->hasFile( "choice_image.$index" ) ) {
        $arg['request']->file( "choice_image.$index" )
          ->store( '/', [ 'disk' => 'form_item_image' ] );
        $image_hash_name = $arg['request']->file( "choice_image.$index" )
          ->hashName();
      }
      if (!config('app.demo_mode')) {
        $choices->fill( [
                          'view_no'     => $index + 1,
                          'block_id'    => $form_blocks->id,
                          'choice_type' => $arg['request']->input( 'form_type' ),
                          'label_text'  => $value,
                          'image'       => $image_hash_name,
                        ] );
        $choices->save();
      }
    }
    $this->rec_resort();

    $arg = [
      'request'     => $request,
      'form_blocks' => $form_blocks,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_STORE_JUST_BEFORE_REDIRECT, $arg );

    return redirect()
      ->route( 'admin.form_block.list' )
      ->with( "messages", __( "admin_messages.saved" ) );
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $id
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
   */
  public function edit( $id ) {
    $arg = [ "id" => $id ];
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_EDIT_INITIALIZE, $arg );

    $data = FormBlocks::find( $id );

    $select_choice = Choices::where( 'block_id', '=', $id )
      ->where( 'choice_type', '=', 'select' )
      ->orderBy( 'view_no', 'asc' )
      ->get();

    if ( $data->form_type == "radio" ) {
      $radio_choice = Choices::where( 'block_id', '=', $id )
        ->where( 'choice_type', '=', 'radio' )
        ->orderBy( 'view_no', 'asc' )
        ->get();
    }
    else if ( $data->form_type == "checkbox" ) {
      $radio_choice = Choices::where( 'block_id', '=', $id )
        ->where( 'choice_type', '=', 'checkbox' )
        ->orderBy( 'view_no', 'asc' )
        ->get();
    }
    else {
      $radio_choice = new Choices();
    }

    $arg = [
      'id'                 => $id,
      'data'               => $data,
      'form_type'          => FormBlocks::$form_type[ Auth::user()->language ],
      'restriction'        => FormBlocks::$restriction,
      'select_choice'      => $select_choice,
      'radio_choice'       => $radio_choice,
      'use_form_item_name' => Forms::get_use_form_item_name( $id ),
      'append'             => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_EDIT_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.form_block.edit', [
      'form_type'          => $arg['form_type'],
      'restriction'        => $arg['restriction'],
      'select_choice'      => $arg['select_choice'],
      'radio_choice'       => $arg['radio_choice'],
      'data'               => $arg['data'],
      'use_form_item_name' => $arg['use_form_item_name'],
      'append'             => $arg['append'],
    ] );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param RequestAlias $request
   * @param FormBlocks $form_blocks
   *
   * @param $id
   *
   * @return Application|Factory|Response|View
   */
  public function update( Request $request, FormBlocks $form_blocks, $id ) {
    $arg = [
      'request'     => $request,
      'form_blocks' => $form_blocks,
      'id'          => $id,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_UPDATE_INITIALIZE, $arg );

    $block     = $form_blocks->find( $id );
    $old_block = $block;

    $validate_ar = [
      'title'     => 'required',
      'view_no'   => 'required|integer',
      'form_type' => 'required',
    ];

    $validate_msg = [
      'title.required'      => __( "admin_messages.form_block.title_required" ),
      'name.required'       => __( "admin_messages.form_block.name_required" ),
      'view_no.required'    => __( "admin_messages.form_block.view_no_required" ),
      'view_no.numeric'     => __( "admin_messages.form_block.view_no_numeric" ),
      'form_type.required'  => __( "admin_messages.form_block.form_type_required" ),
      'name.num_alpha_dash' => __( "admin_messages.form_block.name_num_alpha_dash" ),
      'columns.integer'     => __( "admin_messages.form_block.columns_integer" ),
      'columns.between'     => __( "admin_messages.form_block.columns_between" ),
    ];
    $arg          = [
      "request"      => $request,
      "validate_msg" => $validate_msg,
    ];

    if ( in_array( $arg['request']->form_type, [ 'text', 'number', 'email', 'password', 'tel', 'url', 'multi_select', 'radio' , 'checkbox' , 'file' , 'date' , 'datetime' , 'month'] ) ) {
      $validate_ar = array_merge( $validate_ar, [ 'name' => [ 'required', new AlphabetNumHyphenUnderscore() ] ] );
    }
    else {
      $validate_ar = array_merge( $validate_ar, [ 'name' => [ 'nullable', new AlphabetNumHyphenUnderscore() ] ] );
    }
    $arg['request']->validate( $validate_ar, $arg['validate_msg'] );

    /*****************************
     * blockを保存
     *****************************/
    if (!config('app.demo_mode')) {
      $block->fill( $request->all() );
      $block->save();
    }

    $choices_save_flag = false;
    /********************************
     * selectの選択肢
     ********************************/
    // 削除
    Choices::where( 'block_id', '=', $id )
      ->where( 'choice_type', '=', 'select' )
      ->delete();
    // 再登録
    foreach ( (array) $request->input( 'select_choice_label_text' ) as $index => $value ) {
      $choices = new Choices();
      if (!config('app.demo_mode')) {
        $choices->fill( [
                          'view_no'     => $index + 1,
                          'block_id'    => $id,
                          'choice_type' => 'select',
                          'label_text'  => $value,
                        ] );
        $choices->save();
      }
      $choices_save_flag = true;
    }


    /********************************
     * radio checkboxの選択肢
     ********************************/
    if ( $choices_save_flag == false ) {

      // 更新前のレコード取得
      $choices = new Choices();
      if ( $old_block->form_type == "radio" ) {
        $choices = Choices::where( 'block_id', '=', $id )
          ->where( 'choice_type', '=', 'radio' )
          ->get();
      }
      else if ( $old_block->form_type == "checkbox" ) {
        $choices = Choices::where( 'block_id', '=', $id )
          ->where( 'choice_type', '=', 'checkbox' )
          ->get();
      }

      // ゴミ箱クリック時の画像削除 choice_image_oldに画像がなければ削除
      foreach ( $choices as $key => $row ) {
        if ( !isset( $row['image'] ) ) {
          continue;
        }
        if ( !in_array( $row['image'], $request->input( "choice_image_old" ) ) ) {
          Storage::disk( 'form_item_image' )
            ->delete( "/" . $row['image'] );
        }
      }

      // レコード削除
      if ( $old_block->form_type == "radio" ) {
        Choices::where( 'block_id', '=', $id )
          ->where( 'choice_type', '=', 'radio' )
          ->delete();
      }
      else if ( $old_block->form_type == "checkbox" ) {
        Choices::where( 'block_id', '=', $id )
          ->where( 'choice_type', '=', 'checkbox' )
          ->delete();
      }

      // 画像削除にチェックが入っている。
      foreach ( (array) $request->input( "radio_choice_image_delete" ) as $index => $value ) {
        Storage::disk( 'form_item_image' )
          ->delete( "/" . $value );
      }

      //画像アップ
      foreach ( (array) $request->input( 'radio_choice_label_text' ) as $index => $value ) {
        $image_hash_name = $request->input( "choice_image_old.$index" );

        if ( in_array( $image_hash_name, (array) $request->input( "radio_choice_image_delete" ) ) ) {
          $image_hash_name = "";
        }

        // 画像選択があれば画像を登録して、古い画像を削除
        if ( $request->hasFile( "choice_image.$index" ) ) {
          $d               = $request->file( "choice_image.$index" )
            ->store( '/', [ 'disk' => 'form_item_image' ] );
          $image_hash_name = $request->file( "choice_image.$index" )
            ->hashName();
          Storage::disk( 'form_item_image' )
            ->delete( "/" . $request->input( "choice_image_old.$index" ) );
        }

        $choices = new Choices();
        if (!config('app.demo_mode')) {
          $choices->fill( [
                            'view_no'     => $index + 1,
                            'block_id'    => $id,
                            'choice_type' => $request->input( 'form_type' ),
                            'label_text'  => $value,
                            'image'       => $image_hash_name
                          ] );
          $choices->save();
        }
      }
    }

    $this->rec_resort();

    $block          = $form_blocks->find( $id );
    $select_choice = Choices::where( 'block_id', '=', $id )
      ->where( 'choice_type', '=', 'select' )
      ->orderBy( 'view_no', 'asc' )
      ->get();

    if ( $old_block->form_type == "radio" ) {
      $radio_choice = Choices::where( 'block_id', '=', $id )
        ->where( 'choice_type', '=', 'radio' )
        ->orderBy( 'view_no', 'asc' )
        ->get();
    }
    else if ( $old_block->form_type == "checkbox" ) {
      $radio_choice = Choices::where( 'block_id', '=', $id )
        ->where( 'choice_type', '=', 'checkbox' )
        ->orderBy( 'view_no', 'asc' )
        ->get();
    }
    else {
      $radio_choice = new Choices();
    }

    $arg = [
      'request'            => $request,
      'form_type'          => FormBlocks::$form_type[ Auth::user()->language ],
      'restriction'        => FormBlocks::$restriction,
      'select_choice'      => $select_choice,
      'radio_choice'       => $radio_choice,
      'data'               => $block,
      'use_form_item_name' => Forms::get_use_form_item_name( $id ),
      'append'             => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_UPDATE_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.form_block.edit', [
      'form_type'          => $arg['form_type'],
      'restriction'        => $arg['restriction'],
      'select_choice'      => $arg['select_choice'],
      'radio_choice'       => $arg['radio_choice'],
      'data'               => $arg['data'],
      'use_form_item_name' => $arg['use_form_item_name'],
      'append'             => $arg['append'],
    ] )->with( "message", __( "admin_messages.rew_comp" ) );
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $id
   *
   * @return Response
   */
  public function destroy( $id ) {
    $arg = [ 'id' => $id ];
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_DESTROY_INITIALIZE, $arg );

    if (!config('app.demo_mode')) {
      FormBlocks::destroy( $id );

      $choices = Choices::where( 'block_id', '=', $id )
        ->get();
      foreach ( $choices as $choice ) {
        if ( $choice['image'] ) {
          //同じ画像が利用されていないかチェック
          $image_count = Choices::where( "image", "=", $choice['image'] )
            ->get()
            ->count();
          if ( $image_count == 1 ) {
            Storage::disk( 'form_item_image' )
              ->delete( "/" . $choice['image'] );
          }
        }
        Choices::destroy( $choice->id );
      }
      $this->rec_resort();

      $arg = [
        'id'      => $id,
        'choices' => $choices,
      ];
      PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_DESTROY_JUST_BEFORE_REDIRECT, $arg );
    }

    return redirect()
      ->route( 'admin.form_block.list' )
      ->with( "message", __( "admin_messages.delete_comp" ) );
  }

  public function rec_resort() {
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_REC_RESORT_INITIALIZE, null );

    $data = FormBlocks::orderBy( 'view_no', 'asc' )
      ->orderBy( "created_at", "asc" )
      ->get();
    $i    = 1;
    foreach ( $data as $row ) {
      $row->view_no = $i;
      $row->save();
      $i ++;
    }

    $arg = [ 'data' => $data ];
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_REC_RESORT_COMPLETE, $arg );

  }

  public function copy( $id ) {
    $arg = [ 'id' => $id ];
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_COPY_INITIALIZE, $arg );
    //form_blockを取得
    $origin_form_block = FormBlocks::find( $id );
    if (!config('app.demo_mode')) {
      $origin_form_block->replicate()
        ->fill( [
                  "view_no" => $origin_form_block->view_no,
                  "name"    => "Copy_of_" . $origin_form_block->name,
                  "title"   => "Copy_of_" . $origin_form_block->title,
                  "html_id" => "Copy_of_" . $origin_form_block->html_id,
                ] )
        ->save();
    }
    $this->rec_resort();

    //選択肢を使っていれば複製
    $new_block = FormBlocks::find( FormBlocks::max( "id" ) );
    $choices   = Choices::where( "block_id", "=", $id )
      ->get();
    foreach ( $choices as $choice ) {
      if (!config('app.demo_mode')) {
        $choice->replicate()
          ->fill( [
                    "block_id" => $new_block->id
                  ] )
          ->save();
      }
    }

    $arg = [
      'origin_form_block' => $origin_form_block,
      'new_block'         => $new_block,
      'choices'           => $choices,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_FORMBLOCK_COPY_JUST_BEFORE_REDIRECT, $arg );

    return redirect()
      ->route( 'admin.form_block.list' )
      ->with( "message", __( "admin_messages.copy_comp" ) );
  }

}
