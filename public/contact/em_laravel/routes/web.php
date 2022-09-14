<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can createer web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Library\Common;

/***************************************************************
 * setup
 ***************************************************************/

Route::get( '/setup', 'SetupController@index' )
  ->name( 'admin.setup' );
Route::post( '/setup', 'SetupController@store' )
  ->name( 'admin.setup' );
Route::get( '/setup/{language}', 'SetupController@setupSwitchLanguage' )
  ->name( 'admin.setup.switch_language' );

/****************************************************************
 * login
 ***************************************************************/
Route::get( '/logoff', 'LoginController@logout' )
  ->name( 'logout' );
Route::get( '/admin', 'LoginController@showLoginForm' );
Route::get( '/admin/login', 'LoginController@showLoginForm' )
  ->name( 'login' );
Route::post( '/admin/login', 'LoginController@login' )
  ->name( 'login' );

/****************************************************************
 * Password Reset Routes
 ***************************************************************/
Route::get( 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm' )
  ->name( 'password.request' );
Route::post( 'password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail' )
  ->name( 'password.email' );
Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@showResetForm' )
  ->name( 'password.reset' );
Route::post( 'password/reset', 'Auth\ResetPasswordController@reset' )
  ->name( "password.update" );

/***************************************************************
 * dash board
 ***************************************************************/
/**
 * 権限：管理者、編集者、一般編集者
 */
Route::group( [ 'middleware' => [ 'check_auth:' . Common::ALL_ALLOW ] ], function () {
  Route::get( '/admin/top', 'AdminController@index' )
    ->name( 'admin.top' );

  /**
   * form
   */
  Route::get( '/admin/form', 'FormController@index' )
    ->name( 'admin.form.list' );
  Route::get( '/admin/form/create', 'FormController@create' )
    ->name( 'admin.form.create' );
  Route::post( '/admin/form/create', 'FormController@store' );
  Route::get( '/admin/form/edit/{id}', 'FormController@edit' )
    ->name( 'admin.form.edit' );
  Route::post( '/admin/form/edit/{id}', 'FormController@update' )
    ->name( 'admin.form.update' );
  Route::post( '/admin/form/destroy/{id}', 'FormController@destroy' )
    ->name( 'admin.form.destroy' );
  Route::get( '/admin/form/copy/{id}', 'FormController@copy' )
    ->name( 'admin.form.copy' );

  /*
   * form_block
   */
  Route::get( '/admin/form_block', 'FormBlockController@index' )
    ->name( 'admin.form_block.list' );
  Route::get( '/admin/form_block/create', 'FormBlockController@create' )
    ->name( 'admin.form_block.create' );
  Route::post( '/admin/form_block/create', 'FormBlockController@store' );
  Route::get( '/admin/form_block/edit/{id}', 'FormBlockController@edit' )
    ->name( 'admin.form_block.edit' );
  Route::post( '/admin/form_block/edit/{id}', 'FormBlockController@update' )
    ->name( 'admin.form_block.update' );
  Route::post( '/admin/form_block/destroy/{id}', 'FormBlockController@destroy' )
    ->name( 'admin.form_block.destroy' );
  Route::get( '/admin/form_block/copy/{id}', 'FormBlockController@copy' )
    ->name( 'admin.form_block.copy' );

  /*
   * form_item
   */
  Route::get( '/admin/form_item/edit/{form_id}', 'FormItemController@edit' )
    ->name( 'admin.form_item.edit' );
  Route::post( '/admin/form_item/edit/{form_id}', 'FormItemController@update' )
    ->name( 'admin.form_item.update' );
  Route::post( '/admin/form_item/destroy/{form_id}', 'FormItemController@destroy' )
    ->name( 'admin.form_item.destroy' );

  /*
   * rew_pass
   */
  Route::get( '/admin/rew_pass', 'SettingController@rew_pass' )
    ->name( 'admin.rew_pass' );
  Route::post( '/admin/rew_pass', 'SettingController@pass_update' )
    ->name( 'admin.rew_pass' );

  /**
   * history
   */
  Route::get( '/admin/history', 'HistoryController@index' )
    ->name( 'admin.history.list' );
  Route::get( '/admin/history/list_form', 'HistoryController@list_in_form' )
    ->name( 'admin.history.list_in_form' );
  Route::post( '/admin/history/list_form', 'HistoryController@list_in_form' )
    ->name( 'admin.history.list_in_form' );
  Route::post( '/admin/history/destroy/{history_id}', 'HistoryController@destroy' )
    ->name( 'admin.history.destroy' );

  /**
   * attach_file
   */
  Route::get( '/admin/attach_file', 'AttachFileController@index' )
    ->name( 'admin.attach_file' );
  Route::post( '/admin/attach_file/delete', 'AttachFileController@destroy' )
    ->name( 'admin.attach_file.destroy' );
  Route::get( '/admin/attach_file/view/{file_name}', "AttachFileController@getfile" )
    ->name( "admin.attach_file.getfile" );

  /*
   * dash board language
   */
  Route::get( '/admin/switch_language/{language}', 'LanguageController@switchLang' )
    ->name( 'admin.switch_language' );

  /*
   * CSV
   */
  Route::get( '/admin/csv', 'HistoryController@csv_download' )
    ->name( 'admin.csv' );
});

/**
 * 権限：管理者、編集者
 */
Route::group( [ 'middleware' => [ 'check_auth:' . Common::EDITOR_OR_HIGHER ] ], function () {
  /*
   * plugin
   */
  Route::get( '/admin/plugin/search', 'PluginController@search' )
    ->name( 'admin.plugin.search' );
  Route::get( '/admin/plugin', 'PluginController@index' )
    ->name( 'admin.plugin.list' );
  Route::post( '/admin/plugin/activation', 'PluginController@activation' )
    ->name( 'admin.plugin.activation' );
  Route::post( '/admin/plugin/disable', 'PluginController@disable' )
    ->name( 'admin.plugin.disable' );
  Route::post( '/admin/plugin/install', 'PluginController@install' )
    ->name( 'admin.plugin.install' );
  Route::post( '/admin/plugin/uninstall', 'PluginController@uninstall' )
    ->name( 'admin.plugin.uninstall' );
  Route::post( '/admin/plugin/update', 'PluginController@update' )
    ->name( 'admin.plugin.update' );
  Route::post( '/admin/plugin/description', 'PluginController@description' )
    ->name( 'admin.plugin.description' );
  Route::post( '/admin/plugin/search/description', 'PluginController@search_description' )
    ->name( 'admin.plugin.search_description' );

  /*
   * theme
   */
  Route::get( '/admin/theme', 'ThemeController@index' )
    ->name( 'admin.theme' );
  Route::get( '/admin/theme/{theme_name}', 'ThemeController@show' )
    ->name( 'admin.theme.show' );
  Route::post( '/admin/theme/save', 'ThemeController@update' )
    ->name( 'admin.theme.update' );
  Route::post( '/admin/theme/destroy', 'ThemeController@destroy' )
    ->name( 'admin.theme.destroy' );

  /**
   * language file
   */
  Route::get( '/admin/language_file', 'LanguageFileController@index' )
    ->name( 'admin.language_file' );
  Route::get( '/admin/language_file/{language_name}', 'LanguageFileController@show' )
    ->name( 'admin.language_file.show' );
  Route::post( '/admin/language_file/save', 'LanguageFileController@update' )
    ->name( 'admin.language_file.update' );
  Route::post( '/admin/language_file/destroy', 'LanguageFileController@destroy' )
    ->name( 'admin.language_file.destroy' );

  /*
   * db_setting
   */
  Route::get( '/admin/setting', 'SettingController@index' )
    ->name( 'admin.setting' );
  Route::post( '/admin/setting', 'SettingController@update' )
    ->name( 'admin.setting.update' );
});

/**
 * 権限：管理者
 */
Route::group( [ 'middleware' => [ 'check_auth:' . Common::ADMIN_ONLY ] ], function () {
  /*
   * Users
   */
  Route::get( '/admin/user/create', 'UserController@create' )
    ->name( 'admin.users.create' );
  Route::post( '/admin/user/store', 'UserController@store' )
    ->name( 'admin.users.store' );
  Route::get( '/admin/user/list', 'UserController@index' )
    ->name( 'admin.users.list' );
  Route::get( '/admin/user/edit/{id}', 'UserController@edit' )
    ->name( 'admin.users.edit' );
  Route::post( '/admin/user/update/{id}', 'UserController@update' )
    ->name( 'admin.users.update' );
  Route::post( '/admin/user/destroy/{id}', 'UserController@destroy' )
    ->name( 'admin.user.destroy' );
});

/****************************************************************
 * フロント表示
 ****************************************************************/
Route::post( '/thanks', 'IndexController@thanks' )
  ->name( 'index.thanks' );
Route::post( '/{url}/thanks', 'IndexController@thanks' )
  ->name( 'index.thanks.url' );

Route::post( '/send', 'IndexController@send' )
  ->name( 'index.send' );
Route::post( '/{url}/send', 'IndexController@send' )
  ->name( 'index.send.url' );

Route::post( '/', 'IndexController@index' )
  ->name( 'post_index' );
Route::post( '/{url}', 'IndexController@index' )
  ->name( 'post_index.url' );

Route::get( '/{url}', 'IndexController@index' )
  ->name( 'index' );
Route::get( '/', 'IndexController@index' )
  ->name( 'index' );
