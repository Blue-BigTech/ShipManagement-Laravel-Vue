<?php echo csrf_field(); ?>
<?php if(isset($append['admin_form_edit_form_hidden'])): ?><?php echo $append['admin_form_edit_form_hidden']; ?><?php endif; ?>
<table class="table table-hover">
  <?php if(isset($append['admin_form_edit_form_item_top'])): ?><?php echo $append['admin_form_edit_form_item_top']; ?><?php endif; ?>
  <tr>
    <th><?php echo e(__("admin_messages.form.disp")); ?></th>
    <td colspan="2">
      <div class="custom-control custom-switch">
        <input name="view_flag" type="hidden" value="0"/>
        <input type="checkbox" name="view_flag" value="1" class="custom-control-input" id="custom_switch_view_flag" <?php if(isset($data)): ?> <?php if($data->view_flag == 1): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('view_flag') == 1 ? 'checked' : ''); ?>>
        <label class="custom-control-label" for="custom_switch_view_flag"><?php echo e(__("admin_messages.form.displaying")); ?></label>
      </div>
    </td>
  </tr>
  <tr>
    <th><?php echo e(__("admin_messages.form.folder")); ?></th>
    <td colspan="2">
      <div class="form-inline"><?php echo e(config("app.url")); ?>/<input type="text" name="url" id="url" class="form-control" value="<?php echo e($data->url ?? old('url')); ?>"></div>
    </td>
  </tr>
  <tr>
    <th><?php echo e(__("admin_messages.form.name")); ?><span class="red f80">※</span></th>
    <td colspan="2">
      <input type="text" name="name" id="name" class="form-control" value="<?php echo e($data->name ?? old('name')); ?>">
    </td>
  </tr>
  <tr>
    <th><?php echo e(__('admin_messages.form.description')); ?></th>
    <td colspan="2">
      <input type="text" name="description" id="description" class="form-control" value="<?php echo e($data->description ?? old('description')); ?>">
    </td>
  </tr>
  <tr>
    <th><?php echo e(__("admin_messages.form.mail_configure")); ?></th>
    <td colspan="2">
      <div class="form-inline">
        <div class="custom-control custom-switch">
          <input name="conf_mail_flag" type="hidden" value="0"/>
          <input type="checkbox" name="conf_mail_flag" value="1" class="custom-control-input" id="custom_switch_conf_mail_flag" <?php if(isset($data)): ?> <?php if($data->conf_mail_flag == 1): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('conf_mail_flag') == 1 ? 'checked' : ''); ?> >
          <label class="custom-control-label" for="custom_switch_conf_mail_flag"><?php echo e(__("admin_messages.form.conf_mail")); ?></label>
        </div>
      </div>
      <div class="form-inline">
        <div class="custom-control custom-switch">
          <input name="include_submissions" type="hidden" value="0"/>
          <input type="checkbox" name="include_submissions" value="1" class="custom-control-input" id="custom_switch_include_submissions" <?php if(isset($data)): ?> <?php if($data->include_submissions == 1): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('conf_mail_flag') == 1 ? 'checked' : ''); ?>>
          <label class="custom-control-label" for="custom_switch_include_submissions"><?php echo e(__("admin_messages.form.include_submissions")); ?></label>
        </div>
      </div>
      <div class="form-inline">
        <div class="custom-control custom-switch">
          <input name="include_submissions_admin_email" type="hidden" value="0"/>
          <input type="checkbox" name="include_submissions_admin_email" value="1" class="custom-control-input" id="custom_switch_include_submissions_admin_email" <?php if(isset($data)): ?> <?php if($data->include_submissions_admin_email == 1): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('include_submissions_admin_email') == 1 ? 'checked' : ''); ?>>
          <label class="custom-control-label" for="custom_switch_include_submissions_admin_email"><?php echo e(__("admin_messages.form.include_submissions_admin_email")); ?></label>
        </div>
      </div>
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.theme")); ?></th>
    <td colspan="2">
      <div class="row" style="max-width:1200px;">
        <?php $__currentLoopData = $theme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="custom-control custom-radio">
              <input type="radio" id="theme_radio<?php echo e($loop->iteration); ?>" name="theme_name" value="<?php echo e($theme_row->theme_name); ?>" class="custom-control-input theme_radio_control_input" <?php if(isset($data)): ?> <?php if($data->theme_name == $theme_row->theme_name): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('theme_name') == $theme_row->theme_name ? 'checked' : ''); ?>>
              <label class="custom-control-label theme_radio_label" for="theme_radio<?php echo e($loop->iteration); ?>">
                <?php if($theme_row->theme_name === "gradation"): ?>
                  <span class="btn btn-sm btn-outline-primary rtv_icon" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.real-time_validation_theme")); ?>">
                    <i class="fas fa-stopwatch"></i>&nbsp;RTV
                  </span>
                <?php endif; ?>
                <img src="<?php echo e($theme_row->screen_shot); ?>" class="img-fluid theme_thumbnail">
                <p class="theme_title"><?php echo e($theme_row->theme_name); ?></p>
              </label>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.admin_email")); ?><span class="red f80">※</span></th>
    <td colspan="2">
      <input type="text" name="admin_email" id="admin_email" class="form-control" value="<?php echo e($data->admin_email ?? old('admin_email')); ?>">
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.bcc_email")); ?></th>
    <td colspan="2">
      <input type="text" name="bcc_email" id="bcc_email" class="form-control" value="<?php echo e($data->bcc_email ?? old('bcc_email')); ?>">
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.cc_email")); ?></th>
    <td colspan="2">
      <input type="text" name="cc_email" id="cc_email" class="form-control" value="<?php echo e($data->cc_email ?? old('cc_email')); ?>">
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.mail_title")); ?><span class="red f80">※</span></th>
    <td>
      <input type="text" name="mail_title" id="mail_title" class="form-control" value="<?php echo e($data->mail_title ?? old('mail_title')); ?>">
    </td>
    <td rowspan="3" class="table_row3" style="max-width: 500px;">
      <p class="mb-0 mt-2 font80"><?php echo e(__("admin_messages.form.date_time_tag")); ?></p>
      <?php $__currentLoopData = $sp_time_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="javascript:void(0);" class="btn btn-sm btn-outline-secondary mt-1 copy_btn" data-val="<?php echo e($key); ?>"><?php echo e(__($val)); ?><?php echo e($key); ?></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <p class="mb-0 mt-2 font80"><?php echo e(__("admin_messages.form.sender_tag")); ?></p>
      <?php $__currentLoopData = $sp_sender_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="javascript:void(0);" class="btn btn-sm btn-outline-secondary mt-1 copy_btn" data-val="<?php echo e($key); ?>"><?php echo e(__($val)); ?><?php echo e($key); ?></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <p class="mb-0 mt-2 font80"><?php echo e(__("admin_messages.form.answer_tag")); ?></p>
      <?php if(isset($form_items)): ?>
        <?php $__currentLoopData = $form_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="javascript:void(0);" class="btn btn-sm btn-outline-secondary mt-1 copy_btn" data-val="#<?php echo e($form_item->name); ?>#"><?php echo e($form_item->title); ?>#<?php echo e($form_item->name); ?>#</a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      <p class="font80"><?php echo e(__("admin_messages.form.tag_information")); ?></p>
      <input type="text" id="copy_text" style="display:none;">
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.reply_mail_header_message")); ?>

    </th>
    <td>
      <textarea id="reply_mail_header_message" class="form-control" name="reply_mail_header_message" cols="45" rows="3"><?php echo e($data->reply_mail_header_message ?? old('reply_mail_header_message')); ?></textarea>
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.reply_mail_footer_message")); ?>

    </th>
    <td>
      <textarea id="reply_mail_footer_message" class="form-control" name="reply_mail_footer_message" cols="45" rows="3"><?php echo e($data->reply_mail_footer_message ?? old('reply_mail_footer_message')); ?></textarea>
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.input_form_header_message")); ?>

    </th>
    <td colspan="2">
      <textarea id="input_form_header_message" class="form-control" name="input_form_header_message" cols="45" rows="3"><?php echo e($data->input_form_header_message ?? old('input_form_header_message')); ?></textarea>
    </td>
  </tr>
  <tr>
    <th>
      <?php echo e(__("admin_messages.form.input_form_footer_message")); ?>

    </th>
    <td colspan="2">
      <textarea id="input_form_footer_message" class="form-control" name="input_form_footer_message" cols="45" rows="3"><?php echo e($data->input_form_footer_message ?? old('input_form_footer_message')); ?></textarea>
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.conf_form_header_message")); ?>

    </th>
    <td colspan="2">
      <textarea id="conf_form_header_message" class="form-control" name="conf_form_header_message" cols="45" rows="3"><?php echo e($data->conf_form_header_message ?? old('conf_form_header_message')); ?></textarea>
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.conf_form_footer_message")); ?>

    </th>
    <td colspan="2">
      <textarea id="conf_form_footer_message" class="form-control" name="conf_form_footer_message" cols="45" rows="3"><?php echo e($data->conf_form_footer_message ?? old('conf_form_footer_message')); ?></textarea>
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.error_form_header_message")); ?>

    </th>
    <td colspan="2">
      <textarea id="error_form_header_message" class="form-control" name="error_form_header_message" cols="45" rows="3"><?php echo e($data->error_form_header_message ?? old('error_form_header_message')); ?></textarea>
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.error_form_footer_message")); ?>

    </th>
    <td colspan="2">
      <textarea id="error_form_footer_message" class="form-control" name="error_form_footer_message" cols="45" rows="3"><?php echo e($data->error_form_footer_message ?? old('error_form_footer_message')); ?></textarea>
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.thanks_message")); ?>

    </th>
    <td colspan="2">
      <textarea id="thanks_message" class="form-control" name="thanks_message" cols="45" rows="3"><?php echo e($data->thanks_message ?? old('thanks_message')); ?></textarea>
    </td>
  </tr>

  <tr>
    <th>
      <?php echo e(__("admin_messages.form.google_re_captcha")); ?>

    </th>
    <td colspan="2">
      <div class="row mb-1">
        <div class="col-3"><?php echo e(__("admin_messages.form.google_re_captcha_site_key")); ?></div>
        <div class="col-9"><input type="text" name="google_re_captcha_site_key" id="google_re_captcha_site_key" class="form-control" value="<?php echo e($data->google_re_captcha_site_key ?? old('google_re_captcha_site_key')); ?>" style="width: 400px;"></div>
      </div>
      <div class="row mb-1">
        <div class="col-3"><?php echo e(__("admin_messages.form.google_re_captcha_secret_key")); ?></div>
        <div class="col-9"><input type="text" name="google_re_captcha_secret_key" id="google_re_captcha_secret_key" class="form-control" value="<?php echo e($data->google_re_captcha_secret_key ?? old('google_re_captcha_secret_key')); ?>" style="width: 400px;"></div>
      </div>
      <div class="row mb-1">
        <div class="col-3"><?php echo e(__("admin_messages.form.google_re_captcha_bottom_px")); ?></div>
        <div class="col-9 form-inline"><input type="text" name="google_re_captcha_bottom_px" id="google_re_captcha_bottom_px" class="form-control" value="<?php echo e($data->google_re_captcha_bottom_px ?? old('google_re_captcha_bottom_px')); ?>">px</div>
      </div>
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.save_data")); ?></th>
    <td colspan="2">
      <div class="custom-control custom-switch">
        <input name="save_data" type="hidden" value="0"/>
        <input type="checkbox" name="save_data" value="1" class="custom-control-input" id="custom_switch_conf_save_data" <?php if(isset($data)): ?> <?php if($data->save_data == 1): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('save_data') == 1 ? 'checked' : ''); ?>>
        <label class="custom-control-label" for="custom_switch_conf_save_data"><?php echo e(__("admin_messages.form.saved")); ?></label>
      </div>
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.language")); ?></th>
    <td colspan="2">
      <select name="language" id="language" class="form-control w-25">
        <?php if(isset($language)): ?>
          <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo $val->lang_name; ?>" <?php echo e($data->language == $val->lang_name ? 'selected' : ''); ?>><?php echo $val->lang_name; ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </select>
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.denied_ip")); ?></th>
    <td colspan="2">
      <textarea id="denied_ip" class="form-control" name="denied_ip" cols="45" rows="3"><?php echo e($data->denied_ip ?? old("denied_ip")); ?></textarea>
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("admin_messages.form.denied_ip_message")); ?></th>
    <td colspan="2">
      <input type="text" name="denied_ip_host_error_msg" id="denied_ip_host_error_msg" class="form-control" value="<?php echo e($data->denied_ip_host_error_msg ?? old("denied_ip_host_error_msg")); ?>">
    </td>
  </tr>

  <tr>
    <th><?php echo e(__("auth.beforeunload")); ?></th>
    <td colspan="2">
      <div class="custom-control custom-switch">
        <input name="beforeunload_flag" type="hidden" value="0"/>
        <input type="checkbox" name="beforeunload_flag" value="1" class="custom-control-input" id="custom_switch_conf_beforeunload_flag" <?php if(isset($data)): ?> <?php if($data->beforeunload_flag == 1): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('beforeunload_flag') == 1 ? 'checked' : ''); ?>>
        <label class="custom-control-label" for="custom_switch_conf_beforeunload_flag"><?php echo e(__("admin_messages.plugin.activation")); ?></label>
      </div>
    </td>
  </tr>
  <tr>
    <th><?php echo e(__("auth.enter_forbidden")); ?></th>
    <td colspan="2">
      <div class="custom-control custom-switch">
        <input name="enter_forbidden_flag" type="hidden" value="0"/>
        <input type="checkbox" name="enter_forbidden_flag" value="1" class="custom-control-input" id="custom_switch_conf_enter_forbidden_flag" <?php if(isset($data)): ?> <?php if($data->enter_forbidden_flag == 1): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('enter_forbidden_flag') == 1 ? 'checked' : ''); ?>>
        <label class="custom-control-label" for="custom_switch_conf_enter_forbidden_flag"><?php echo e(__("admin_messages.plugin.activation")); ?></label>
      </div>
    </td>
  </tr>
  <tr>
    <th><?php echo e(__("auth.submit_disabled")); ?></th>
    <td colspan="2">
      <div class="custom-control custom-switch">
        <input name="submit_disabled_flag" type="hidden" value="0"/>
        <input type="checkbox" name="submit_disabled_flag" value="1" class="custom-control-input" id="custom_switch_conf_submit_disabled_flag" <?php if(isset($data)): ?> <?php if($data->submit_disabled_flag == 1): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('submit_disabled_flag') == 1 ? 'checked' : ''); ?>>
        <label class="custom-control-label" for="custom_switch_conf_submit_disabled_flag"><?php echo e(__("admin_messages.plugin.activation")); ?></label>
      </div>
    </td>
  </tr>
  <?php if(isset($append['admin_form_item_bottom'])): ?><?php echo $append['admin_form_item_bottom']; ?><?php endif; ?>
  <?php if(isset($append['admin_form_edit_form_item_bottom'])): ?><?php echo $append['admin_form_edit_form_item_bottom']; ?><?php endif; ?>
</table>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/form/form.blade.php ENDPATH**/ ?>