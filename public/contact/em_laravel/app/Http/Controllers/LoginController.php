<?php

namespace App\Http\Controllers;

use App\Library\Common;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller {
  use AuthenticatesUsers;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware( 'guest' )
      ->except( 'logout' );
  }

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = 'admin/top';

  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|RedirectResponse|View
   */
  public function showLoginForm() {
    PluginEvent::event( PluginEventConf::ADMIN_LOGIN_SHOW_LOGIN_FORM_INITIALIZE, null );
    if ( Common::db_connect_check() === false ) {
      PluginEvent::event( PluginEventConf::ADMIN_LOGIN_SHOW_LOGIN_FORM_JUST_BEFORE_SETUP_REDIRECT, null );
      return redirect()->route( 'admin.setup' );
    }

    $arg = [
      'append' => require base_path() . "/config/append.php",
    ];

    $arg = PluginEvent::event( PluginEventConf::ADMIN_LOGIN_SHOW_LOGIN_FORM_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.login',[
      'append' => $arg['append'],
    ] );
  }

  public function index() {
    PluginEvent::event( PluginEventConf::ADMIN_LOGIN_INDEX_INITIALIZE, null );
    if ( Common::db_connect_check() === false ) {
      PluginEvent::event( PluginEventConf::ADMIN_LOGIN_INDEX_JUST_BEFORE_SETUP_REDIRECT, null );
      return redirect()->route( 'admin.setup' );
    }
    $arg = [
      'append' => require base_path() . "/config/append.php",
    ];
    PluginEvent::event( PluginEventConf::ADMIN_LOGIN_INDEX_JUST_BEFORE_VIEW, null );

    return view( 'admin.login',[
      'append' => $arg['append'],
    ] );
  }

  public function login( Request $request ) {
    $this->validateLogin( $request );

    if ( method_exists( $this, 'hasTooManyLoginAttempts' ) && $this->hasTooManyLoginAttempts( $request ) ) {
      $this->fireLockoutEvent( $request );

      return $this->sendLockoutResponse( $request );
    }

    if ( $this->attemptLogin( $request ) ) {
      if ( auth()->user()->is_admin === false && auth()->user()->is_sub_admin === false && auth()->user()->is_general_editor === false && auth()->user()->is_editor === false && auth()->user()->is_reader === false ) {
        $this->guard()
          ->logout();
        $request->session()
          ->invalidate();
        $request->session()
          ->regenerateToken();

        return $this->sendFailedLoginResponse( $request );
      }

      return $this->sendLoginResponse( $request );
    }

    $this->incrementLoginAttempts( $request );

    return $this->sendFailedLoginResponse( $request );
  }



  /**
   * Log the user out of the application.
   *
   * @param Request $request
   *
   * @return Application|RedirectResponse|Response|Redirector
   */
  public function logout( Request $request ) {
    PluginEvent::event( PluginEventConf::ADMIN_LOGIN_LOGOUT_INITIALIZE, null );
    $this->guard()
      ->logout();
    $request->session()
      ->invalidate();
    $request->session()
      ->regenerateToken();
    PluginEvent::event( PluginEventConf::ADMIN_LOGIN_LOGOUT_JUST_BEFORE_REDIRECT, null );

    return $this->loggedOut( $request ) ?: redirect( route( 'login' ) );
  }

}
