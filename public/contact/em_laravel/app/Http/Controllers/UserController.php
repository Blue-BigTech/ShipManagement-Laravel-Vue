<?php

namespace App\Http\Controllers;

use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use App\Library\Common;
use App\Rules\AdminPassword;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

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
    PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_INDEX_INITIALIZE, null );

    $data = User::whereNotIn( 'email', [ auth()->user()->email ] )
      ->orderBy( 'created_at', 'desc' )
      ->get();

    $arg = [
      "data"   => $data,
      'append' => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.user.list', [
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
    PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_CREATE_INITIALIZE, null );
    $arg = [
      "append" => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_CREATE_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.user.create', [
      'append'   => $arg['append'],
      'language' => Common::lang_list(),
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
      'email'    => [ 'required', 'email', 'max:255', 'unique:users' ],
      'password' => [ 'required', new AdminPassword() ],
    ];
    $validate_msg = [
      'email.required'    => __( "admin_messages.user.user_email_is_required" ),
      'email.email'       => __( "admin_messages.user.user_check_the_email_address" ),
      'password.required' => __( "admin_messages.user.user_password_is_required" ),
    ];
    $arg          = [
      "request"      => $request,
      "validate"     => $validate,
      "validate_msg" => $validate_msg,
    ];
    $arg          = PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_STORE_INITIALIZE, $arg );

    $arg['request']->validate( $arg['validate'], $arg['validate_msg'] );

    $request->merge( [ 'password' => Hash::make( $request->input( 'password' ) ) ] );

    $users = new User();

    if (!config('app.demo_mode')) {
      $users->fill( $request->all() );
      $users->save();
    }

    $arg = [
      "forms"   => $users,
      "request" => $request,
    ];
    PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_STORE_JUST_BEFORE_REDIRECT, $arg );

    return redirect()
      ->route( 'admin.users.list' )
      ->with( "message", __( "admin_messages.user.user_regist_comp" ) );
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
    PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_EDIT_INITIALIZE, $arg );

    $data = User::find( $id );

    $arg = [
      "data"   => $data,
      "append" => require base_path() . "/config/append.php",
    ];

    $arg = PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_EDIT_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.user.edit', [
      'data'     => $arg['data'],
      'language' => Common::lang_list(),
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
    $user = User::find( $id );

    $email_unique = 'unique:users,email,' . $user->email . ',email';
    $validate     = [
      'email'    => [ 'required', 'email', 'max:255', $email_unique ],
      'password' => [ 'required', new AdminPassword() ]
    ];

    // 変更パスワードの入力がない場合はチェック項目から外す。
    if (empty($request->input('password'))) {
      unset($validate['password']);
    }

    $validate_msg = [
      'email.required'    => __( "admin_messages.user.user_email_is_required" ),
      'email.email'       => __( "admin_messages.user.user_check_the_email_address" ),
      'password.required' => __( "admin_messages.user.user_password_is_required" ),
    ];

    $arg = [
      "id"           => $id,
      "request"      => $request,
      "validate"     => $validate,
      "validate_msg" => $validate_msg,
    ];

    $arg = PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_UPDATE_INITIALIZE, $arg );

    $request->validate( $arg['validate'], $arg['validate_msg'] );

    // 変更パスワードの入力がない場合は更新項目から外す。
    if (empty($request->input('password'))) {
      unset($request['password']);
    } else {
      $request->merge( [ 'password' => Hash::make( $request->input( 'password' ) ) ] );
    }

    if (!config('app.demo_mode')) {
      $user->fill( $request->all() );
      $user->save();
    }

    $arg = [
      "request" => $request,
      "append"  => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_UPDATE_JUST_BEFORE_VIEW, $arg );

    return redirect()
      ->route( 'admin.users.edit', $id )
      ->with( "message", __( "admin_messages.rew_comp" ) );
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
      $arg = PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_DESTROY_INITIALIZE, $arg );
      User::destroy( $arg['id'] );
      PluginEvent::event( PluginEventConf::ADMIN_USER_CONTROLLER_DESTROY_JUST_BEFORE_REDIRECT, $arg );
    }

    return redirect()
      ->route( 'admin.users.list' )
      ->with( "message", __( 'admin_messages.delete_comp' ) );
  }

}
