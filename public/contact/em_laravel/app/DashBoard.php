<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\DashBoardMenu;

class DashBoard extends Model {

  public static $menus = [];

  /**
   * @param $insert_menu
   * @param null $offset
   * @param null $key
   */
  public static function insert_menus( $insert_menu, $offset = null, $key = null ) {
    $menus = array();
    foreach ( self::$menus as $index => $menu ) {
      if ( $offset !== null && $index == $offset - 1 ) {
        $menus[] = $insert_menu;
        $menus[] = $menu;
      }
      else if ( $key !== null && $key == $menu['key'] ) {
        $menus[] = $menu;
        $menus[] = $insert_menu;
      }
      else {
        $menus[] = $menu;
      }
    }
    self::$menus = $menus;
    DashBoardMenu::set_memu();
  }

  public static function init() {
    self::$menus = [
      [
        "type"  => "heading",
        "title" => __( "admin_messages.menu.form" ),
        "key"   => "admin_messages.menu.form",
      ],
      [
        "type"  => "link",
        "href"  => route( "admin.form.create" ),
        "title" => __( "admin_messages.menu.form_regist" ),
        "icon"  => '<i class="fas fa-file"></i>',
        "key"   => "admin_messages.menu.form_regist",
      ],
      [
        "type"  => "link",
        "href"  => route( "admin.form.list" ),
        "title" => __( "admin_messages.menu.form_list" ),
        "icon"  => '<i class="fas fa-list"></i>',
        "key"   => "admin_messages.menu.form_list",
      ],
      [
        "type"  => "link",
        "href"  => route( "admin.form_block.create" ),
        "title" => __( "admin_messages.menu.item_regist" ),
        "icon"  => '<i class="fas fa-shapes"></i>',
        "key"   => "admin.form_block.create",
      ],
      [
        "type"  => "link",
        "href"  => route( "admin.form_block.list" ),
        "title" => __( "admin_messages.menu.item_list" ),
        "icon"  => '<i class="fas fa-list"></i>',
        "key"   => "admin_messages.menu.item_list",
      ],
      [
        "type"  => "accordion",
        "icon"  => '<i class="fas fa-plug"></i>',
        "title" => __( "admin_messages.menu.plugin" ),
        "key"   => "admin_messages.menu.plugin",
        "item"  => [
          [
            "type"  => "link",
            "href"  => route( "admin.plugin.search" ),
            "title" => __( "admin_messages.menu.plugin_search" ),
            "icon"  => '<i class="fas fa-search"></i>',
            "key"   => "admin_messages.menu.plugin_search",
          ],
          [
            "type"  => "link",
            "href"  => route( "admin.plugin.list" ),
            "title" => __( "admin_messages.menu.plugin_list" ),
            "icon"  => '<i class="fas fa-list"></i>',
            "key"   => "admin_messages.menu.plugin_list",
          ],
        ]
      ],
      [
        "type"  => "accordion",
        "icon"  => '<i class="fas fa-database"></i>',
        "title" => __( "admin_messages.menu.data" ),
        "key"   => "admin_messages.menu.data",
        "item"  => [
          [
            "type"  => "link",
            "href"  => route( "admin.history.list" ),
            "title" => __( "admin_messages.menu.history" ),
            "icon"  => '<i class="fas fa-history"></i>',
            "key"   => "admin_messages.menu.history",
          ],
          [
            "type"  => "link",
            "href"  => route( "admin.attach_file" ),
            "title" => __( "admin_messages.menu.attachment_file" ),
            "icon"  => '<i class="fas fa-images"></i>',
            "key"   => "admin_messages.menu.attachment_file",
          ],
        ]
      ],
      [
        "type"  => "accordion",
        "title" => __( "admin_messages.menu.users" ),
        "icon"  => '<i class="fa-solid fa-users-gear"></i>',
        "key"   => "admin_messages.menu.users",
        "item" => [
          [
            "type"  => "link",
            "href"  => route( "admin.users.create" ),
            "title" => __( "admin_messages.menu.user_regist" ),
            "icon"  => '<i class="fa-solid fa-user-plus"></i>',
            "key"   => "admin_messages.menu.user_regist",
          ],
          [
            "type"  => "link",
            "href"  => route( "admin.users.list" ),
            "title" => __( "admin_messages.menu.users_list" ),
            "icon"  => '<i class="fas fa-user-friends"></i>',
            "key"   => "admin_messages.menu.users_list",
          ],
        ]
      ],
      [
        "type"  => "accordion",
        "title" => __( "admin_messages.menu.setting" ),
        "icon"  => '<i class="fas fa-cog"></i>',
        "key"   => "admin_messages.menu.setting",
        "item" => [
          [
            "type"  => "link",
            "href"  => route( "admin.theme" ),
            "title" => __( "admin_messages.menu.theme" ),
            "icon"  => '<i class="fas fa-palette"></i>',
            "key"   => "admin_messages.menu.theme",
          ],
          [
            "type"  => "link",
            "href"  => route( "admin.language_file" ),
            "title" => __( "admin_messages.menu.language" ),
            "icon"  => '<i class="fas fa-language"></i>',
            "key"   => "admin_messages.menu.language",
          ],
          [
            "type"  => "link",
            "href"  => route( "admin.setting" ),
            "title" => __( "admin_messages.menu.admin_setting" ),
            "icon"  => '<i class="fas fa-cog"></i>',
            "key"   => "admin_messages.menu.admin_setting",
          ],
          [
            "type"  => "link",
            "href"  => route( "admin.rew_pass" ),
            "title" => __( "admin_messages.menu.rew_password" ),
            "icon"  => '<i class="fas fa-unlock-alt"></i>',
            "key"   => "admin_messages.menu.rew_password",
          ]
        ]
      ]
    ];
  }

}
