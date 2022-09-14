<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use Illuminate\View\View;

class AdminController extends Controller {
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
    PluginEvent::event( PluginEventConf::ADMIN_ADMIN_INDEX_INITIALIZE, null );
    $news_ar = array();
    $options['ssl']['verify_peer']=false;
    $options['ssl']['verify_peer_name']=false;
    if ( $news_json = @file_get_contents( config( "app.dashboard_news_url" ) . "/?lang=" . App::getLocale(), false, stream_context_create($options) ) ) {
      $news_ar = json_decode( $news_json );
    }

    $arg = [
      'news_ar' => $news_ar,
      'append'  => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_ADMIN_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.top', [
      'news_ar' => $arg['news_ar'],
      'append'  => $arg['append'],
    ] );
  }

}
