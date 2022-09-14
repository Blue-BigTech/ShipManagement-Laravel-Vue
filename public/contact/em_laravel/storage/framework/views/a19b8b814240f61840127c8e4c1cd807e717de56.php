<?php echo csrf_field(); ?>
<?php if(isset($append['admin_form_block_edit_form_hidden'])): ?><?php echo $append['admin_form_block_edit_form_hidden']; ?><?php endif; ?>
  <table class="table">
    <?php if(isset($append['admin_form_block_edit_form_item_top'])): ?><?php echo $append['admin_form_block_edit_form_item_top']; ?><?php endif; ?>
    <tr>
        <th><?php echo e(__('admin_messages.list_page.sort')); ?><span class="red f80">※</span></th>
        <td>
            <input type="text" name="view_no" id="view_no" class="form-control"
                value=" <?php if(isset($data)): ?> <?php echo e($data->view_no); ?> <?php else: ?> 1 <?php endif; ?>">
        </td>
    </tr>
    <tr>
      <th><?php echo e(__('admin_messages.form_block.from_category')); ?><span class="red f80">※</span></th>
      <td>
      <select name="form_type" id="form_type" class="form-control">
          <option value=""><?php echo e(__('admin_messages.select')); ?></option>
          <?php $__currentLoopData = $form_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($key); ?>" <?php if(isset($data)): ?> <?php echo e($data->form_type === $key ? 'selected' : ''); ?><?php endif; ?>>
                  <?php echo e($value); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if(isset($append['admin_form_block_edit_form_type_option'])): ?><?php echo $append['admin_form_block_edit_form_type_option']; ?><?php endif; ?>
          </select>
      </td>
    </tr>
    <tr>
        <th><?php echo e(__('admin_messages.form_block.title')); ?><span class="red f80">※</span></th>
        <td>
            <input type="text" name="title" id="title" class="form-control"
                value="<?php echo e($data->title ?? old('title')); ?>">
        </td>
    </tr>
    <tr class="name_input init-tr">
        <th><?php echo e(__('admin_messages.form_block.attr_name')); ?></th>
        <?php if(isset($data)): ?>
          <?php if($data['name'] == 'email' && $data['html_id'] == 'email' && $data['html_class'] == 'form-control'): ?>
            <td>
                <input type="text" name="name" id="name" class="form-control"
                    value="<?php echo e($data->name ?? old('name')); ?>" disabled>
                <input type="hidden" name="name" id="name" class="form-control" value="email">
            </td>
          <?php else: ?>
            <td>
              <input type="text" name="name" id="name" class="form-control"
                  value="<?php echo e($data->name ?? old('name')); ?>">
            </td>
          <?php endif; ?>
        <?php else: ?>
          <td>
            <input type="text" name="name" id="name" class="form-control"
                value="<?php echo e($data->name ?? old('name')); ?>">
          </td>
        <?php endif; ?>
    </tr>
    <tr class="id_input init-tr">
        <th><?php echo e(__('admin_messages.form_block.attr_id')); ?></th>
        <?php if(isset($data)): ?>
          <?php if($data['name'] == 'email' && $data['html_id'] == 'email' && $data['html_class'] == 'form-control'): ?>
              <td>
                  <input type="text" name="html_id" id="html_id" class="form-control"
                      value="<?php echo e($data->html_id ?? old('html_id')); ?>" disabled>
              </td>
          <?php else: ?>
              <td>
                  <input type="text" name="html_id" id="html_id" class="form-control"
                      value="<?php echo e($data->html_id ?? old('html_id')); ?>">
              </td>
          <?php endif; ?>
        <?php else: ?>
          <td>
            <input type="text" name="html_id" id="html_id" class="form-control"
                value="<?php echo e($data->html_id ?? old('html_id')); ?>">
          </td>
        <?php endif; ?>
    </tr>
    <tr class="class_input init-tr">
        <th><?php echo e(__('admin_messages.form_block.attr_class')); ?></th>
        <?php if(isset($data)): ?>
          <?php if($data['name'] == 'email' && $data['html_id'] == 'email' && $data['html_class'] == 'form-control'): ?>
            <td>
                <input type="text" name="html_class" id="html_class" class="form-control"
                    value="<?php echo e($data->html_class ?? old('html_class')); ?>" disabled>
            </td>
          <?php else: ?>
            <td>
                <input type="text" name="html_class" id="html_class" class="form-control"
                    value="<?php echo e($data->html_class  ?? old('html_class')); ?>">
            </td>
          <?php endif; ?>
        <?php else: ?>
          <td>
            <input type="text" name="html_class" id="html_class" class="form-control"
                value="<?php echo e($data->html_class  ?? old('html_class')); ?>">
          </td>
        <?php endif; ?>
    </tr>
    <tr class="init-tr">
        <th><?php echo e(__('admin_messages.form_block.required_error_msg')); ?></th>
        <td>
            <input type="text" name="required_error_msg" id="required_error_msg" class="form-control"
                value="<?php echo e($data->required_error_msg ?? old('required_error_msg')); ?>">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th><?php echo e(__('admin_messages.form_block.forbidden_characters')); ?><p class="font80">
                <?php echo e(__('admin_messages.form_block.forbidden_characters_input_msg')); ?></p>
        </th>
        <td>
            <input type="text" name="forbidden_characters" id="forbidden_characters" class="form-control"
                value="<?php echo e($data->forbidden_characters ?? old('forbidden_characters')); ?>">
        </td>
    </tr>

    
    <tr class="hide-input text-input restriction-input">
        <th><?php echo e(__('admin_messages.form_block.restriction')); ?></th>
        <td>
            <select name="restriction" id="restriction" class="form-control">
                <option value=""><?php echo e(__('admin_messages.select')); ?></option>
                <?php $__currentLoopData = $restriction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($key); ?>" <?php if(isset($data)): ?><?php if($data->restriction == $key): ?> selected <?php endif; ?> <?php endif; ?> <?php echo e(old('restriction') == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </td>
    </tr>
    <tr class="hide-input text-input restriction-input">
        <th><?php echo e(__('admin_messages.form_block.restriction_error_msg')); ?></th>
        <td>
            <input type="text" name="restriction_error_msg" id="restriction_error_msg" class="form-control"
                value="<?php echo e($data->restriction_error_msg ?? old('restriction_error_msg')); ?>">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th><?php echo e(__('admin_messages.form_block.restriction_char_limit')); ?></th>
        <td class="form-inline">
            <input type="number" name="min_length" id="min_length" class="form-control"
                value="<?php echo e($data->min_length ?? old('min_length')); ?>">～
            <input type="number" name="max_length" id="max_length" class="form-control"
                value="<?php echo e($data->max_length ?? old('max_length')); ?>">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th><?php echo e(__('admin_messages.form_block.restriction_char_limit_error_msg')); ?></th>
        <td>
            <input type="text" name="length_error_msg" id="length_error_msg" class="form-control"
                value="<?php echo e($data->length_error_msg  ?? old('length_error_msg')); ?>">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th><?php echo e(__('admin_messages.form_block.initial_value')); ?></th>
        <td>
            <input type="text" name="initial_value" id="initial_value" class="form-control"
                value="<?php echo e($data->initial_value ?? old('initial_value')); ?>">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th><?php echo e(__('admin_messages.form_block.placeholder')); ?></th>
        <td>
            <input type="text" name="placeholder" id="placeholder" class="form-control"
                value="<?php echo e($data->placeholder ?? old('placeholder')); ?>">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th><?php echo e(__('admin_messages.form_block.re_enter_error_msg')); ?></th>
        <td>
            <input type="text" name="re_enter_error_msg" id="re_enter_error_msg" class="form-control"
                value="<?php echo e($data->re_enter_error_msg ?? old('re_enter_error_msg')); ?>">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th><?php echo e(__('admin_messages.form_block.hankaku_zenkaku_automatic_conversion')); ?></th>
        <td class="d-flex">
            <div class="mr-5 custom-control custom-radio hide-input text-input ">
                <input type="radio" id="default" name="hankaku_zenkaku_automatic_conversion"
                    class="custom-control-input" value="default" <?php if(isset($data)): ?><?php if($data->hankaku_zenkaku_automatic_conversion == 'default'): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('hankaku_zenkaku_automatic_conversion') == 'default' ? 'checked' : ''); ?> checked>
                <label class="custom-control-label"
                    for="default"><?php echo e(__('admin_messages.form_block.default')); ?></label>
            </div>
            <div class="mr-5 custom-control custom-radio hide-input text-input hankaku">
                <input type="radio" id="hankaku" name="hankaku_zenkaku_automatic_conversion"
                    class="custom-control-input" value="hankaku" <?php if(isset($data)): ?><?php if($data->hankaku_zenkaku_automatic_conversion == 'hankaku'): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('hankaku_zenkaku_automatic_conversion') == 'hankaku' ? 'checked' : ''); ?> >
                <label class="custom-control-label"
                    for="hankaku"><?php echo e(__('admin_messages.form_block.zenkaku_to_hankaku')); ?></label>
            </div>
            <div class="mr-5 custom-control custom-radio hide-input text-input zenkaku">
                <input type="radio" id="zenkaku" name="hankaku_zenkaku_automatic_conversion"
                    class="custom-control-input " value="zenkaku" <?php if(isset($data)): ?> <?php if($data->hankaku_zenkaku_automatic_conversion == 'zenkaku'): ?> checked <?php endif; ?> <?php endif; ?> <?php echo e(old('hankaku_zenkaku_automatic_conversion') == 'zenkaku' ? 'checked' : ''); ?>>
                <label class="custom-control-label"
                    for="zenkaku"><?php echo e(__('admin_messages.form_block.hankaku_to_zenkaku')); ?></label>
            </div>
        </td>
    </tr>

    
    <tr class="<?php echo e(old('select_choice_label_text') ? '' : 'hide-input'); ?>  select-input">
        <th><?php echo e(__('admin_messages.form_block.choice')); ?></th>
        <td>
          <div class="col-1">
              <i class="far fa-plus-square add_select_choice_btn"></i>
          </div>
          <div class="col-11">
              <div id="select_choice_wrap">
                <?php if(isset($select_choice)): ?>
                  <?php $__currentLoopData = $select_choice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="row form-inline mb-1">
                          <input type="text" name="select_choice_label_text[]"
                              class="form-control type_select_input select_choice_label_text"
                              value="<?php echo e($row->label_text); ?>">
                          <i class="far fa-trash-alt trash_select_choice_btn"></i>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <?php $__currentLoopData = (array)old('select_choice_label_text'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row form-inline mb-1">
                      <input type="text" name="select_choice_label_text[]" class="form-control type_select_input select_choice_label_text" value="<?php echo e($value); ?>">
                      <i class="far fa-trash-alt trash_select_choice_btn"></i>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
        </td>
    </tr>

    
    <tr class="<?php echo e(old('radio_choice_label_text') ? '' : 'hide-input'); ?>  radio-input">
        <th><?php echo e(__('admin_messages.form_block.choice')); ?></th>
        <td>
            <div class="col-1">
                <i class="far fa-plus-square add_radio_choice_btn"></i>
            </div>
            <div class="col-11">
              <div id="radio_choice_wrap">
                <?php if(isset($radio_choice)): ?>
                  <?php $__currentLoopData = $radio_choice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row form-inline mb-1">
                      <input type="hidden" name="radio_choice_id[]"
                        value="<?php if(isset($row->id)): ?><?php echo e($row->id); ?><?php endif; ?>" />
                    <input type="hidden" name="choice_image_old[]" value="<?php if(isset($row->image)): ?><?php echo e($row->image); ?><?php endif; ?>" />
                    <input type="text" name="radio_choice_label_text[]" class="form-control type_select_input radio_choice_label_text" value="<?php if(isset($row->label_text)): ?><?php echo e($row->label_text); ?><?php endif; ?>">
                      <?php if(isset($row->image)): ?>
                          <img src="<?php echo e(url(Storage::disk('form_item_image')->url($row->image))); ?>" class="img-thumbnail choice_img" />
                      <?php endif; ?>
                    <div class="custom-control custom-checkbox ml-1">
                        <input type="checkbox" name="radio_choice_image_delete[]"
                            id="customCheck<?php echo e($loop->iteration); ?>" class="custom-control-input"
                            value="<?php if(isset($row->image)): ?><?php echo e($row->image); ?><?php endif; ?>">
                            <label class="custom-control-label"
                                for="customCheck<?php echo e($loop->iteration); ?>"><?php echo e(__('admin_messages.form_block.image_delete')); ?></label>
                        </div>
                        <input type="file" name="choice_image[]" class="form-control type_select_input"
                            accept=".jpg,.png,.gif,image/jpeg">
                        <i class="far fa-trash-alt trash_radio_choice_btn"></i>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <?php $__currentLoopData = (array)old('radio_choice_label_text'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row form-inline mb-1">
                      <input type="text" name="radio_choice_label_text[]" class="form-control type_select_input radio_choice_label_text" value="<?php echo e($value); ?>">
                      <div id="choice_image_place"></div>
                      <input type="file" name="choice_image[]" class="form-control type_select_input" accept=".jpg,.png,.gif,image/jpeg">
                      <i class="far fa-trash-alt trash_radio_choice_btn"></i>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
        </td>
      </tr>

      <tr class="hide-input radio-input">
          <th><?php echo e(__('admin_messages.form_block.columns')); ?></th>
          <td class="form-inline">
              <input type="number" name="columns" id="columns" class="form-control"
                  value="<?php echo e($data->columns ?? old('columns')); ?>">
          </td>
      </tr>

      
      <tr class="hide-input file-input">
          <th><?php echo e(__('admin_messages.form_block.file_type')); ?></th>
          <td>
              <input type="text" name="file_type" id="file_type" class="form-control"
                  value="<?php echo e($data->file_type ?? old('file_type')); ?>">
              <span class="font80 w-100"><?php echo e(__('admin_messages.form_block.file_extension')); ?></span>
          </td>
      </tr>
      <tr class="hide-input file-input">
          <th><?php echo e(__('admin_messages.form_block.file_capacity_limit')); ?>（kbyte）</th>
          <td class="form-inline">
              <input type="number" name="file_capacity_limit" id="file_capacity_limit" class="form-control"
                  value="<?php echo e($data->file_capacity_limit ?? old('file_capacity_limit')); ?>">kbyte
              <span class="font80 w-100">1MB = 1024kbyte</span>
              <span class="font80 w-100">※<?php echo e(__('admin_messages.form_block.file_capacity_limit_alert_message')); ?></span>
          </td>
      </tr>
      
      <tr class="init-tr">
          <th><?php echo e(__('admin_messages.form_block.description_above')); ?></th>
          <td>
              <textarea type="text" name="description_above" id="editor"
                  class="form-control"><?php echo e($data->description_above ?? old('description_above')); ?></textarea>
          </td>
      </tr>
      <tr class="init-tr">
          <th><?php echo e(__('admin_messages.form_block.description_below')); ?></th>
          <td>
              <textarea type="text" name="description_below" id="editor2"
                  class="form-control"><?php echo e($data->description_below ?? old('description_below')); ?></textarea>
          </td>
      </tr>
    <?php if(isset($append['admin_form_block_edit_form_item_bottom'])): ?><?php echo $append['admin_form_block_edit_form_item_bottom']; ?><?php endif; ?>
  </table>
  <style>
    .hide-input {
      display: none;
    }

    .fa-plus-square {
      color: cornflowerblue;
      font-size: 1.8rem;
      cursor: pointer;
    }

    .fa-trash-alt {
      color: #dc3545;
      margin-left: 5px;
      cursor: pointer;
    }

    input[type=file] {
      margin-left: 10px;
    }

    .form-inline .form-control.radio_choice_label_text, .form-inline .form-control.select_choice_label_text {
      width: 400px;
    }

    .choice_img {
      max-width: 100px;
      max-height: 100px;
      margin-left: 10px;
    }
  </style>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/form_block/form.blade.php ENDPATH**/ ?>