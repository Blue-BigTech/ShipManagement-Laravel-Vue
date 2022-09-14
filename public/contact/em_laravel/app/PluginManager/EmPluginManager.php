<?php

namespace App\PluginManager;

use App\Library\Common;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Plugins;
use File;
use App\DashBoard;
use Illuminate\Support\Facades\Schema;

class EmPluginManager extends RouteServiceProvider {
  public static $active_lists = [];
  public static $db_list = [];
  public static $folder_lists = [];

  public static function init() {
    if(Common::db_connect_check() === false){
      return;
    }
    if ( Schema::hasTable( 'plugins' ) === false ) {
      return;
    }
    if ( Common::db_connect_check() === true && Schema::hasTable('plugins')) {
      self::$db_list = Plugins::all();
    }

    $dirs = File::directories( base_path( "app" . DIRECTORY_SEPARATOR . "Plugin" ) );
    $ar   = array();
    foreach ( $dirs as $index => $dir ) {
      $temp            = array();
      $temp['abs_dir'] = $dir;
      $d               = explode( DIRECTORY_SEPARATOR, $dir );
      $temp['name']    = end( $d );
      $ar[]            = $temp;
    }
    self::$folder_lists = $ar;

    $active = array();
    foreach ( self::$folder_lists as $folder_list ) {
      $active_db = self::active_check( $folder_list['name'] );
      if ( $active_db != false ) {
        $active_conf = require_once $folder_list['abs_dir'] . DIRECTORY_SEPARATOR . 'config.php';
        $active[]    = [
          "db"     => $active_db,
          "config" => $active_conf,
        ];
      }
    }
    self::$active_lists = $active;
  }

  public static function install_check( $folder_name ) {
    $ret = false;
    foreach ( self::$db_list as $d ) {
      if ( $d->folder_name == $folder_name ) {
        $ret = $d;
      }
    }

    return $ret;
  }

  public static function active_check( $folder_name ) {
    $ret = false;
    foreach ( self::$db_list as $d ) {
      if ( $d->folder_name == $folder_name && $d->active_flag == true ) {
        $ret = $d;
      }
    }

    return $ret;
  }

  public static function set_routes() {
    foreach ( self::$active_lists as $active_list ) {
      if( file_exists( base_path( "app/Plugin/" . $active_list['config']['name'] . "/web.php" ) ) ){
        Route::middleware( 'web' )
        ->namespace( "App\\Plugin\\" . $active_list['config']['name'] . "\\Controllers" )
        ->group( base_path( "app/Plugin/" . $active_list['config']['name'] . "/web.php" ) );
      }
    }

  }
}
