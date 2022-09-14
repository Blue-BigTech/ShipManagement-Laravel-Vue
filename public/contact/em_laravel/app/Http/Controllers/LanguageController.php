<?php

namespace App\Http\Controllers;

use App\Library\Common;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use File;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;

class LanguageController extends Controller {
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

  public function switchLang( $lang ) {
    $arg = [ 'lang' => $lang ];
    PluginEvent::event( PluginEventConf::ADMIN_LANGUAGE_SWITCHLANG_INITIALIZE, $arg );

    if ( !$lang ) {
      return false;
    }
    App::setLocale( $lang );
    $users = User::where( "email", "=", Auth::user()->email )
      ->get();
    $user  = User::find( $users[0]->id );
    $user->fill( [ "language" => $lang ] );
    $user->save();

    $arg = [
      'lang'  => $lang,
      'users' => $users
    ];
    PluginEvent::event( PluginEventConf::ADMIN_LANGUAGE_SWITCHLANG_JUST_BEFORE_REDIRECT, $arg );

    return Redirect::back();
  }

}
