<?php

namespace App\Http\Controllers;

use App\Events\PluginEvent;
use App\Events\PluginEventConf;
use App\Plugins;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\PluginManager\EmPluginManager;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Library\Common;
use ZipArchive;

class PluginController extends Controller {

  /**
   *
   * @return void
   *
   */
  public function __construct() {
    PluginEvent::event( PluginEventConf::ADMIN_CONSTRACT_INITIALIZE, null );
    $this->middleware( [ 'check_language', 'dash_board_menu' ] );
    PluginEvent::event( PluginEventConf::ADMIN_CONSTRACT_COMPLETE, null );
  }

  /**
   *
   * @return Application|Factory|Response|View
   *
   */
  public function index() {

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_INDEX_INITIALIZE, null );
    $folder_lists = EmPluginManager::$folder_lists;
    $db_lists     = EmPluginManager::$db_list;

    $data = array();
    foreach ( $folder_lists as $index => $folder_list ) {
      $plugin = EmPluginManager::install_check( $folder_list['name'] );
      if ( $plugin !== false ) {
        if ( file_exists( app_path() . "/Plugin/" . $plugin->folder_name . "/screenshot.png" ) ) {
          $plugin['screenshot'] = base64_encode( file_get_contents( app_path() . "/Plugin/" . $plugin->folder_name . "/screenshot.png" ) );
        }
        else {
          $plugin['screenshot'] = null;
        }
        $data[] = $plugin;
      }
    }

    $arg = [
      "folder_lists" => $folder_lists,
      "db_lists"     => $db_lists,
      "data"         => $db_lists,
      'append'       => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_INDEX_JUST_BEFORE_VIEW, $arg );

    return view( 'admin.plugin.list', [
      "folder_lists" => $arg['folder_lists'],
      "db_lists"     => $arg['db_lists'],
      "data"         => $arg['db_lists'],
      'append'       => $arg['append'],
    ] );
  }

  /**
   *
   * @return Application|Factory|Response|View
   *
   */
  public function search() {

    $arg = PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_SEARCH_INITIALIZE, null );

    $plugin_ar = array();
    if ( $json = @file_get_contents( config( "app.plugin_store_url" ) . "/search" ) ) {
      $plugin_ar = json_decode( $json );
    }

    //すでにインストール済みの場合はFlagを立てる
    $folder_name_ar = array();
    foreach ( EmPluginManager::$folder_lists as $index => $folder_list ) {
      $folder_name_ar[] = $folder_list['name'];
    }

    foreach ( $plugin_ar as $index => $plugin ) {
      $flag = EmPluginManager::install_check( $plugin->folder_name );

      if ( $flag !== false ) {
        $plugin_ar[ $index ]->install_flag = true;
      }
      else {
        $plugin_ar[ $index ]->install_flag = false;
      }
    }

    $arg = [
      "plugin_ar" => $plugin_ar,
      'append'    => require base_path() . "/config/append.php",
    ];
    $arg = PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_SEARCH_JUST_BEFORE_VIEW, $arg );


    return view( 'admin.plugin.search', [
      "plugin_ar" => $arg['plugin_ar'],
      'append'    => $arg['append'],
    ] );
  }

  public function search_description( Request $request ) {

    $plugin_ar = array();
    $url       = config( "app.plugin_store_info_url" ) . "?version_uid=" . $request->version_uid;
    if ( $json = @file_get_contents( $url ) ) {
      $plugin_ar = json_decode( $json );
    }

    header( "Access-Control-Allow-Origin: *" );  //CORS
    header( "Access-Control-Allow-Headers: Origin, X-Requested-With" );

    return response()->json( $plugin_ar );
  }

  public function description( Request $request ): JsonResponse {
    $plugin = Plugins::where( "version_uid", $request->version_uid )
      ->first();

    header( "Access-Control-Allow-Origin: *" );  //CORS
    header( "Access-Control-Allow-Headers: Origin, X-Requested-With" );

    return response()->json( $plugin );
  }

  /**
   *
   * @param Request $request
   *
   * @return JsonResponse
   *
   */
  public function activation( Request $request ): JsonResponse {

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_ACTIVATION_INITIALIZE, null );

    //DB保存
    $plugin = Plugins::where( "uid", $request->uid )
      ->first();
    if (!config('app.demo_mode')) {
      $plugin->fill( [ 'active_flag' => 1 ] );
      $result = $plugin->save();
      $json   = [ "result" => $result ];
    }

    //プラグイン別 有効化時の動作
    $class = "App\\Plugin\\" . $plugin->folder_name . "\\PluginManager";
    if (!config('app.demo_mode')) {
      if ( method_exists( $class, "activation" ) ) {
        $json = array_merge( $json, [ "activation" => $class::activation() ] );
      }
    }

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_ACTIVATION_JUST_BEFORE_RETURN, null );

    header( "Access-Control-Allow-Origin: *" );  //CORS
    header( "Access-Control-Allow-Headers: Origin, X-Requested-With" );

    return response()->json( $json );
  }

  /**
   *
   * @param Request $request
   *
   * @return JsonResponse
   *
   */
  public function disable( Request $request ): JsonResponse {

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_DISABLE_INITIALIZE, null );

    //DB保存
    $plugin = Plugins::where( "uid", $request->input( "uid" ) )
      ->first();
    if (!config('app.demo_mode')) {
      $plugin->fill( [ 'active_flag' => 0 ] );
      $json = [ "result" => $plugin->save() ];
    }

    //プラグイン別 無効化時の動作
    $class = "App\\Plugin\\" . $plugin->folder_name . "\\PluginManager";
    if (!config('app.demo_mode')) {
      if ( method_exists( $class, "disable" ) ) {
        $json = array_merge( $json, [ "disable" => $class::disable() ] );
      }
    }

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_DISABLE_JUST_BEFORE_VIEW, null );

    header( "Access-Control-Allow-Origin: *" );  //CORS
    header( "Access-Control-Allow-Headers: Origin, X-Requested-With" );

    return response()->json( $json );
  }

  /**
   *
   * @param Request $request
   *
   * @return JsonResponse
   *
   */
  public function install( Request $request ): JsonResponse {
    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_INSTALL_INITIALIZE, null );

    $temp_file_name = Common::getUniqId() . ".zip";
    $temp_path      = app()->storagePath() . "/plugin_temp";// /em_laravel/storage/plugin_temp

    $install_flag = true;

    //ダウンロード
    if ( !$data = @file_get_contents( $request->download_url . "/?uid=" . $request->uid . "&version_uid=" . $request->version_uid ) ) {
      if ( count( $http_response_header ) > 0 ) {
        //「$http_response_header[0]」 Status code is set.
        $status_code = explode( ' ', $http_response_header[0] );  //「$status_code[1]」にステータスコードの数字だけが入る
        //エラーの判別
        switch ( $status_code[1] ) {
          //404エラーの場合
          case 404:
            dump( "404 not found." );
            break;
          //500エラーの場合
          case 500:
            dump( "500 Server Error" );
            break;
          //その他のエラーの場合
          default:
            dump( "Could not retrieve the data" );
        }
      }
      else {
        //タイムアウトの場合 or 存在しないドメインだった場合
        dump( "Time out or The URL is wrong." );
      }
    }

    //一時保存
    if ( @file_put_contents( $temp_path . "/" . $temp_file_name, $data ) === false ) {
      $install_flag = false;
      $install_msg  = "file_put_contents error.";
    }

    //解凍と保存挿入
    if ( $install_flag === true ) {
      $zip = new ZipArchive;

      $install_msg = "install_complete";
      if ( $zip->open( $temp_path . "/" . $temp_file_name ) === true ) {
        $zip->extractTo( app()->basePath() . "/app/Plugin/" );
        $zip->close();
      }
      else {
        $install_flag = false;
        $install_msg  = "zip open error.";
      }
    }

    //解凍元ファイルの削除
    $unlink_msg = unlink( $temp_path . "/" . $temp_file_name );

    //DB登録
    $url = config( "app.plugin_store_url" ) . "/info?version_uid=" . $request->version_uid;
    $options['ssl']['verify_peer']=false;
    $options['ssl']['verify_peer_name']=false;
    $plugin_ar = array();
    $json      = null;

    if ( $install_flag === true ) {
      if ( $json = @file_get_contents($url, false, stream_context_create($options)) ) {
        $plugin_ar = json_decode( $json );
      }
      $plugin = new Plugins();
      if (!config('app.demo_mode')) {
        $plugin->fill( [
                        "name"                     => $plugin_ar->name,
                        "uid"                      => $plugin_ar->uid,
                        "version_uid"              => $plugin_ar->version_uid,
                        "release_date"             => $plugin_ar->release_date,
                        "folder_name"              => $plugin_ar->folder_name,
                        "version"                  => $plugin_ar->version,
                        "final_update_date"        => $plugin_ar->final_update_date,
                        "category"                 => $plugin_ar->category,
                        "developer_id"             => $plugin_ar->developer_id,
                        "developer_name"           => $plugin_ar->developer_name,
                        "developer_url"            => $plugin_ar->developer_url,
                        "url"                      => $plugin_ar->url,
                        "price"                    => $plugin_ar->price,
                        "overview"                 => $plugin_ar->overview,
                        "description"              => $plugin_ar->description,
                        "how_to_install"           => $plugin_ar->how_to_install,
                        "required_version"         => $plugin_ar->required_version,
                        "corresponding_version"    => $plugin_ar->latest_version_supported,
                        "latest_version_supported" => $plugin_ar->latest_version_supported,
                        "active_flag"              => false,
                      ] )
          ->save();
      }

      $json = [
        "uid"         => $request->uid,
        "version_uid" => $request->version_uid,
        "result"      => "install_complete"
      ];

      //プラグイン別 インストール時の動作
      //エラーがかえされる。
      // $class = "App\\Plugin\\" . $plugin_ar->folder_name . "\\PluginManager";
      // if ( method_exists( $class, "install" ) ) {
      //   $json = array_merge( $json, [ "install" => $class::install() ] );
      // }

    }

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_INSTALL_RETURN, null );

    header( "Access-Control-Allow-Origin: *" );  //CORS
    header( "Access-Control-Allow-Headers: Origin, X-Requested-With" );

    return response()->json( $json );
  }

  /**
   *
   * @param Request $request
   *
   * @return RedirectResponse
   *
   */
  public function update( Request $request ): RedirectResponse {
    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_UPDATE_INITIALIZE, null );

    $json = array();
    //プラグイン別 インストール時の動作
    // $class = "App\\Plugin\\" . $plugin->folder_name . "\\PluginManager";
    // if ( method_exists( $class, "update" ) ) {
    //   $json = array_merge( $json, [ "update" => $class::update() ] );
    // }

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_UPDATE_JUST_BEFORE_REDIRECT, null );

    return redirect()
      ->route( 'admin.plugin.list' )
      ->with( "messages", __( "admin_messages.plugin.updated" ) );
  }

  /**
   *
   * @param Request $request
   *
   * @return JsonResponse
   *
   */
  public function uninstall( Request $request ): JsonResponse {

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_UNINSTALL_INITIALIZE, null );

    //プラグイン情報取得
    $plugin = Plugins::where( "uid", $request->input( "uid" ) )
      ->first();

    //フォルダ削除
    $path = app_path() . "/Plugin/" . $plugin->folder_name;
    Common::recursiveDelete( $path );

    //DB レコード削除
    $plugin->delete();

    $json = [ "result" => app_path() . "/Plugin/" . $plugin->folder_name ];

    //プラグイン別 アンインストール時の動作
    $class = "App\\Plugin\\" . $plugin->folder_name . "\\PluginManager";
    if ( method_exists( $class, "uninstall" ) ) {
      $json = array_merge( $json, [ "uninstall" => $class::uninstall() ] );
    }

    PluginEvent::event( PluginEventConf::ADMIN_PLUGIN_UNINSTALL_JUST_BEFORE_RETURN, null );

    header( "Access-Control-Allow-Origin: *" );  //CORS
    header( "Access-Control-Allow-Headers: Origin, X-Requested-With" );

    return response()->json( $json );
  }

}
