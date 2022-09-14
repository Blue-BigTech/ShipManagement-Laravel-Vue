<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'role',
    'language',
    'login_flag',
  ];

  static $auth_role = [
    1 => 'admin', // 管理者：全権限を保有
    2 => 'editor', // 編集者：ユーザー管理以外全権限をもつ
    4 => 'general_editor', // 一般編集者：ユーザー管理、テーマ管理、プラグイン管理以外が可能
    //7 => 'editor', // 自分が作成したフォームのみ編集が可能 自分が作成した項目のみ編集が可能 自分が作成したフォームのデータのみ閲覧・DL可能
    //9 => 'reader', // 管理者が許可した設定したフォームのみ閲覧できる
  ];

  protected $appends = [
    'is_admin', // 管理者 全権限を保有
    'is_editor', //ユーザー管理以外全権限をもつ
    'is_general_editor', //ユーザー管理、テーマ管理、プラグイン管理以外が可能
    //'is_editor', // 自分が作成したフォームのみ編集が可能 自分が作成した項目のみ編集が可能 自分が作成したフォームのデータのみ閲覧・DL可能
    //'is_reader', // 管理者が許可した設定したフォームのみ閲覧できる
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  //adminログイン認証
  public function getIsAdminAttribute() {
    return ( auth()->user()->role == 1 && auth()->user()->login_flag == 1 );
  }

  //sub_adminログイン認証
  public function getIsEditorAttribute() {
    return ( auth()->user()->role == 2 && auth()->user()->login_flag == 1 );
  }

  //general_editorログイン認証
  public function getIsGeneralEditorAttribute() {
    return ( auth()->user()->role == 4 && auth()->user()->login_flag == 1 );
  }

  //editorログイン認証
  // public function getIsEditorAttribute() {
  //   return ( auth()->user()->role == 7 && auth()->user()->login_flag == 1 );
  // }

  //readerログイン認証
  // public function getIsReaderAttribute() {
  //   return ( auth()->user()->role == 9 && auth()->user()->login_flag == 1 );
  // }

  public function getUserRoleName( $role_no ) {
    if ( !$role_no ) {
      return false;
    }

    return $this->auth_role[$role_no];
  }

  public function getUserRoleLanguage( $role_no ) {
    if ( !$role_no ) {
      return false;
    }
    $ret = "";
    switch ( $role_no ) {
      case 1:
        $ret = __( 'admin_messages.user.admin' );
        break;
      case 2:
        $ret = __( 'admin_messages.user.editor' );
        break;
      case 4:
        $ret = __( 'admin_messages.user.general_editor' );
        break;
      // case 7:
      //   $ret = __( 'admin_messages.user.editor' );
      //   break;
      // case 9:
      //   $ret = __( 'admin_messages.user.reader' );
      //   break;
    }

    return $ret;
  }

}
