<?php
/*
 * This file is part of EasyMail
 *
 * Copyright(c) First net japan CO.,LTD. All Rights Reserved.
 *
 * http://www.1st-net.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Events;

use App\PluginManager\EmPluginManager;
use function Composer\Autoload\includeFile;

class PluginEvent extends EmPluginManager {
  private static $exclusion_hook_point = [ "admin.constract.initialize", "admin.constract.complete" ];
  private static $menu_flag            = false;

  public static function plugin_class_load() {
    foreach ( self::$active_lists as $index => $active_list ) {
      $plugin_name = $active_list['config']['name'];
      $file_name   = app_path() . "/Plugin/" . $plugin_name . "/Controllers/" . $plugin_name . "Controller.php";
      if ( file_exists( $file_name ) ) {
        require_once( $file_name );
      }
      $manager_file_name   = app_path() . "/Plugin/" . $plugin_name . "/PluginManager.php";
      if ( file_exists( $manager_file_name ) ) {
        require_once( $manager_file_name );
      }
    }
  }

  public static function set_plugin_menu( $hook_point = null ) {
    //2重にメニューが表示されるのを防ぐ
    if ( array_search( $hook_point, self::$exclusion_hook_point ) !== false ) {
      return;
    }
    if ( self::$menu_flag === false ) {
      self::plugin_class_load();
    }
    if ( self::$menu_flag === true ) {
      return;
    }
    foreach ( self::$active_lists as $index => $active_list ) {
      $plugin_name = $active_list['config']['folder_name'];
      $class       = "App\\Plugin\\" . $plugin_name . "\\Controllers\\" . $plugin_name . "Controller";
      if ( method_exists( $class, "set_dash_board_menu" ) ) {
        $class::set_dash_board_menu();
      }
    }
    self::$menu_flag = true;
  }

  public static function event( $hook_point, $arg ) {
    self::set_plugin_menu( $hook_point );
    foreach ( self::$active_lists as $index => $active_list ) {
      foreach ( $active_list['config']['event'] as $event => $method ) {
        if ( $event == $hook_point ) {
          $plugin_name = $active_list['config']['folder_name'];
          $class       = "App\\Plugin\\" . $plugin_name . "\\Controllers\\" . $plugin_name . "Controller";
          $arg         = $class::$method( $arg );
        }
      }
    }
    return $arg;
  }

}
