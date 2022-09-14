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

final class PluginEventConf {
  const ADMIN_LOGIN_SHOW_LOGIN_FORM_INITIALIZE = 'admin.login.show_login_form.initialize';
  const ADMIN_LOGIN_SHOW_LOGIN_FORM_JUST_BEFORE_SETUP_REDIRECT = 'admin.login.show_login_form.setup.redirect';
  const ADMIN_LOGIN_SHOW_LOGIN_FORM_JUST_BEFORE_VIEW = 'admin.login.show_login_form.just_before_view';
  const ADMIN_LOGIN_INDEX_INITIALIZE = 'admin.login.index.initialize';
  const ADMIN_LOGIN_INDEX_JUST_BEFORE_SETUP_REDIRECT = 'admin.login.index.setup.just_before_redirect';
  const ADMIN_LOGIN_INDEX_JUST_BEFORE_VIEW = 'admin.login.index.just_before_view';
  const ADMIN_LOGIN_LOGOUT_INITIALIZE = 'admin.login.logout.initialize';
  const ADMIN_LOGIN_LOGOUT_JUST_BEFORE_REDIRECT = 'admin.login.index.just_before_redirect';

  const ADMIN_CONSTRACT_INITIALIZE = 'admin.constract.initialize';
  const ADMIN_CONSTRACT_COMPLETE = 'admin.constract.complete';

  const ADMIN_ADMIN_INDEX_INITIALIZE = 'admin.admin.index.initialize';
  const ADMIN_ADMIN_INDEX_JUST_BEFORE_VIEW = 'admin.admin.index.just_before_view';

  const ADMIN_FORM_INDEX_INITIALIZE = 'admin.form.index.initialize';
  const ADMIN_FORM_INDEX_JUST_BEFORE_VIEW = 'admin.form.index.just_before_view';
  const ADMIN_FORM_CREATE_INITIALIZE = 'admin.form.create.initialize';
  const ADMIN_FORM_CREATE_JUST_BEFORE_VIEW = 'admin.form.create.just_before_view';
  const ADMIN_FORM_STORE_INITIALIZE = 'admin.form.store.initialize';
  const ADMIN_FORM_STORE_JUST_BEFORE_REDIRECT = 'admin.form.store.just_before_redirect';
  const ADMIN_FORM_EDIT_INITIALIZE = 'admin.form.edit.initialize';
  const ADMIN_FORM_EDIT_JUST_BEFORE_VIEW = 'admin.form.edit.just_before_view';
  const ADMIN_FORM_UPDATE_INITIALIZE = 'admin.form.update.initialize';
  const ADMIN_FORM_UPDATE_JUST_BEFORE_VIEW = 'admin.form.update.just_before_view';
  const ADMIN_FORM_DESTROY_INITIALIZE = 'admin.form.destroy.initialize';
  const ADMIN_FORM_DESTROY_JUST_BEFORE_REDIRECT = 'admin.form.destroy.jus_tbefore_redirect';
  const ADMIN_FORM_COPY_INITIALIZE = 'admin.form.copy.initialize';
  const ADMIN_FORM_COPY_JUST_BEFORE_REDIRECT = 'admin.form.copy.just_before_redirect';

  const ADMIN_FORMBLOCK_INDEX_INITIALIZE = 'admin.formblock.index.initialize';
  const ADMIN_FORMBLOCK_INDEX_JUST_BEFORE_VIEW = 'admin.formblock.index.just_before_view';
  const ADMIN_FORMBLOCK_CREATE_INITIALIZE = 'admin.formblock.create.initialize';
  const ADMIN_FORMBLOCK_STORE_INITIALIZE = 'admin.formblock.store.initialize';
  const ADMIN_FORMBLOCK_STORE_JUST_BEFORE_REDIRECT = 'admin.formblock.store.just_before_redirect';
  const ADMIN_FORMBLOCK_EDIT_INITIALIZE = 'admin.formblock.edit.initialize';
  const ADMIN_FORMBLOCK_EDIT_JUST_BEFORE_VIEW = 'admin.formblock.edit.just_before_view';
  const ADMIN_FORMBLOCK_UPDATE_INITIALIZE = 'admin.formblock.update.initialize';
  const ADMIN_FORMBLOCK_UPDATE_JUST_BEFORE_VIEW = 'admin.formblock.update.just_before_view';
  const ADMIN_FORMBLOCK_DESTROY_INITIALIZE = 'admin.formblock.destroy.initialize';
  const ADMIN_FORMBLOCK_DESTROY_JUST_BEFORE_REDIRECT = 'admin.formblock.destroy.just_before_redirect';
  const ADMIN_FORMBLOCK_REC_RESORT_INITIALIZE = 'admin.formblock.rec_resort.initialize';
  const ADMIN_FORMBLOCK_REC_RESORT_COMPLETE = 'admin.formblock.rec_resort.complete';
  const ADMIN_FORMBLOCK_COPY_INITIALIZE = 'admin.formblock.copy.initialize';
  const ADMIN_FORMBLOCK_COPY_JUST_BEFORE_REDIRECT = 'admin.formblock.copy.just_before_redirect';

  const ADMIN_FORMITEM_EDIT_INITIALIZE = 'admin.formitem.edit.initialize';
  const ADMIN_FORMITEM_EDIT_JUST_BEFORE_VIEW = 'admin.formitem.edit.just_before_view';
  const ADMIN_FORM_ITEM_UPDATE_INITIALIZE = 'admin.form_item.update.initialize';
  const ADMIN_FORM_ITEM_UPDATE_JUST_BEFORE_REDIRECT = 'admin.form_item.update.just_before_redirect';

  const ADMIN_HISTORY_INDEX_INITIALIZE = 'admin.history.index.initialize';
  const ADMIN_HISTORY_INDEX_JUST_BEFORE_VIEW = 'admin.history.index.just_before_view';
  const ADMIN_HISTORY_DESTROY_INITIALIZE = 'admin.history.destroy.initialize';
  const ADMIN_HISTORY_DESTROY_JUST_BEFORE_REDIRECT = 'admin.history.destroy.just_before_redirect';
  const ADMIN_HISTORY_LIST_IN_FORM_INITIALIZE = 'admin.history.list_in_form.initialize';
  const ADMIN_HISTORY_LIST_IN_FORM_JUST_BEFORE_VIEW = 'admin.history.list_in_form.just_before_view';
  const ADMIN_ATTACHFILE_INDEX_INITIALIZE = 'admin.attachfile.index.initialize';
  const ADMIN_ATTACHFILE_INDEX_JUST_BEFORE_VIEW = 'admin.attachfile.index.just_before_view';
  const ADMIN_ATTACHFILE_DESTROY_INITIALIZE = 'admin.attachfile.destroy.initialize';
  const ADMIN_ATTACHFILE_DESTROY_JUST_BEFORE_REDIRECT = 'admin.attachfile.destroy.just_before_redirect';
  const ADMIN_ATTACHFILE_GETFILE_INITIALIZE = 'admin.attachfile.getfile.initialize';
  const ADMIN_ATTACHFILE_GETFILE_JUST_BEFORE_RETURN = 'admin.attachfile.getfile.just_before_return';
  const ADMIN_THEME_INDEX_JUST_BEFORE_VIEW = 'admin.theme.index.just_before_view';
  const ADMIN_THEME_SHOW_INITIALIZE = 'admin.theme.show.initialize';
  const ADMIN_THEME_SHOW_JUST_BEFORE_VIEW = 'admin.theme.show.just_before_view';
  const ADMIN_THEME_UPDATE_INITIALIZE = 'admin.theme.update.initialize';
  const ADMIN_THEME_UPDATE_JUST_BEFORE_ERROR_REDIRECT = 'admin.theme.update.just_before_error_redirect';
  const ADMIN_THEME_UPDATE_JUST_BEFORE_SAVE_REDIRECT = 'admin.theme.update.just_before_save_redirect';
  const ADMIN_THEME_GET_THEME_INITIALIZE = 'admin.theme.get_theme.initialize';
  const ADMIN_THEME_GET_THEME_JUST_BEFORE_RETURN = 'admin.theme.get_theme.just_before_return';
  const ADMIN_SETTING_INDEX_JUST_BEFORE_VIEW = 'admin.setting.index.just_before_view';
  const ADMIN_SETTING_UPDATE_INITIALIZE = 'admin.setting.update.initialize';
  const ADMIN_SETTING_UPDATE_JUST_BEFORE_REDIRECT = 'admin.setting.update.just_before_redirect';
  const ADMIN_SETTING_REW_PASS_INITIALIZE = 'admin.setting.rew_pass.initialize';
  const ADMIN_SETTING_REW_PASS_JUST_BEFORE_VIEW = 'admin.setting.rew_pass.just_before_view';
  const ADMIN_SETTING_PASS_UPDATE_INITIALIZE = 'admin.setting.pass_update.initialize';
  const ADMIN_SETTING_PASS_UPDATE_JUST_BEFORE_REDIRECT = 'admin.setting.pass_update.just_before_redirect';
  const ADMIN_LANGUAGE_SWITCHLANG_INITIALIZE = 'admin.language.switchlang.initialize';
  const ADMIN_LANGUAGE_SWITCHLANG_JUST_BEFORE_REDIRECT = 'admin.language.switchlang.just_before_redirect';
  const ADMIN_LANGUAGEFILE_INDEX_JUST_BEFORE_VIEW = 'admin.languagefile.index.just_before_view';
  const ADMIN_LANGUAGEFILE_SHOW_INITIALIZE = 'admin.languagefile.show.initialize';
  const ADMIN_LANGUAGEFILE_SHOW_JUST_BEFORE_VIEW = 'admin.languagefile.show.just_before_view';
  const ADMIN_LANGUAGEFILE_UPDATE_INITIALIZE = 'admin.languagefile.update.initialize';
  const ADMIN_LANGUAGEFILE_UPDATE_JUST_BEFORE_ERROR_REDIRECT = 'admin.languagefile.update.just_before_error_redirect';
  const ADMIN_LANGUAGEFILE_UPDATE_JUST_BEFORE_SAVE_REDIRECT = 'admin.languagefile.update.just_before_save_redirect';
  const ADMIN_LANGUAGEFILE_GET_LANGUAGE_INITIALIZE = 'admin.languagefile.get_language.initialize';
  const ADMIN_LANGUAGEFILE_GET_LANGUAGE_JUST_BEFORE_REDIRECT = 'admin.languagefile.get_language.just_before_redirect';
  const ADMIN_PLUGIN_INDEX_INITIALIZE = 'admin.plugin.index.initialize';
  const ADMIN_PLUGIN_INDEX_JUST_BEFORE_VIEW = 'admin.plugin.index.just_before_view';
  const ADMIN_PLUGIN_SEARCH_INITIALIZE = 'admin.plugin.search.initialize';
  const ADMIN_PLUGIN_SEARCH_JUST_BEFORE_VIEW = 'admin.plugin.search.just_before_view';
  const ADMIN_PLUGIN_ACTIVATION_INITIALIZE = 'admin.plugin.activation.just_before_view';
  const ADMIN_PLUGIN_ACTIVATION_JUST_BEFORE_RETURN = 'admin.plugin.activation.just_before_return';
  const ADMIN_PLUGIN_DISABLE_INITIALIZE = 'admin.plugin.disable.initialize';
  const ADMIN_PLUGIN_DISABLE_JUST_BEFORE_VIEW = 'admin.plugin.disable.just_before_view';
  const ADMIN_PLUGIN_UNINSTALL_INITIALIZE = 'admin.plugin.uninstall.initialize';
  const ADMIN_PLUGIN_UNINSTALL_JUST_BEFORE_RETURN = 'admin.plugin.uninstall.just_before_return';
  const ADMIN_PLUGIN_INSTALL_INITIALIZE = 'admin.plugin.install.initialize';
  const ADMIN_PLUGIN_INSTALL_RETURN = 'admin.plugin.install.just_before_return';
  const ADMIN_PLUGIN_UPDATE_INITIALIZE = 'admin.plugin.update.initialize';
  const ADMIN_PLUGIN_UPDATE_JUST_BEFORE_REDIRECT = 'admin.plugin.update.just_before_redirect';

  const ADMIN_USER_CONTROLLER_INDEX_INITIALIZE = 'admin.user_controller.index.initialize';
  const ADMIN_USER_CONTROLLER_INDEX_JUST_BEFORE_VIEW = 'admin.user_controller.index.just_before_view';
  const ADMIN_USER_CONTROLLER_CREATE_INITIALIZE = 'admin.user_controller.create.initialize';
  const ADMIN_USER_CONTROLLER_CREATE_JUST_BEFORE_VIEW = 'admin.user_controller.create.just_before_view';
  const ADMIN_USER_CONTROLLER_STORE_INITIALIZE = 'admin.user_controller.store.initialize';
  const ADMIN_USER_CONTROLLER_STORE_JUST_BEFORE_REDIRECT = 'admin.user_controller.store.just_before_redirect';
  const ADMIN_USER_CONTROLLER_EDIT_INITIALIZE = 'admin.user_controller.edit.initialize';
  const ADMIN_USER_CONTROLLER_EDIT_JUST_BEFORE_VIEW = 'admin.user_controller.edit.just_before_view';
  const ADMIN_USER_CONTROLLER_UPDATE_INITIALIZE = 'admin.user_controller.update.initialize';
  const ADMIN_USER_CONTROLLER_UPDATE_JUST_BEFORE_VIEW = 'admin.user_controller.update.just_before_view';
  const ADMIN_USER_CONTROLLER_DESTROY_INITIALIZE = 'admin.user_controller.destroy.initialize';
  const ADMIN_USER_CONTROLLER_DESTROY_JUST_BEFORE_REDIRECT = 'admin.user_controller.destroy.just_before_view';

  const ADMIN_PASSWORD_RESET_INITIALIZE = 'admin.password.reset.initialize';
  const ADMIN_PASSWORD_RESET_JUST_BEFORE_VIEW = 'admin.password.reset.just_before_view';

  const FRONT_INDEX_INITIALIZE = 'front.index.initialize';
  const FRONT_INDEX_JUST_BEFORE_VIEW = 'front.index.just_before_view';

  const FRONT_INDEX_SEND_INITIALIZE = 'front.index.send.initialize';
  const FRONT_INDEX_SEND_JUST_BEFORE_SEND = 'front.index.send.just_before_send';
  const FRONT_INDEX_SEND_JUST_BEFORE_HISTORY_SAVE = 'front.index.send.just_before_history_save';
  const FRONT_INDEX_SEND_JUST_BEFORE_VIEW = 'front.index.send.just_before_view';

}
