<?php if($errors->any()): ?>
  <ul class="list-group m-0">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
<?php endif; ?>
<div class="formWrap">
  <?php echo nl2br($form->input_form_header_message ? '<div class="js_input_control">'.$form->input_form_header_message.'</div>' : ""); ?>

  <?php echo nl2br($form->conf_form_header_message ? '<div class="js_conf_control">'.$form->conf_form_header_message.'</div>' : ""); ?>

  <?php echo nl2br($form->error_form_header_message ? '<div class="js_error_control">'.$form->error_form_header_message.'</div>' : ""); ?>

  <?php if(isset($append['upper_form'])): ?><?php echo $append['upper_form']; ?><?php endif; ?>
  <form action="<?php echo e($form->url ? route("index.send.url", ["url" => $form->url]) : route("index.send")); ?>" method="post" enctype="multipart/form-data" class="form js_main_form">
    <?php echo csrf_field(); ?>
    <?php if(isset($append['form_item_top'])): ?><?php echo $append['form_item_top']; ?><?php endif; ?>
    <?php if(isset($append['form_hidden'])): ?><?php echo $append['form_hidden']; ?><?php endif; ?>
    <?php if(isset($form->google_re_captcha_site_key)): ?>
      <input type="hidden" name="g-recaptcha-token" id="g-recaptcha-token" value="">
    <?php endif; ?>
    <?php $__currentLoopData = $form_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <?php if($form_item->form_type == "name_and_furigana"): ?>
        <dl class="form__block">
          <dt class="form__name">
            <?php echo e($form_item->title); ?>

            <?php if($form_item->required == 1): ?>
              <span class="form__reqdMark">※</span>
            <?php endif; ?>
          </dt>
          <dd class="form__inputArea">
            <?php if($form_item->description_above): ?>
              <span class="font80 js_input_control w-100"><?php echo nl2br($form_item->description_above); ?></span>
            <?php endif; ?>
            <input type="text" name="your_name" id="your_name" class="form__input js_input_control" value="<?php echo e(old('your_name')); ?>"/>
            
            <span class="font80 js_error_control your_name_error_msg err_msg"></span>
            
            <span class="js_conf_control your_name_conf_msg conf_msg"></span>
            <?php if($form_item->description_below): ?>
            <span class="font80 js_input_control w-100"><?php echo nl2br($form_item->description_below); ?></span>
            <?php endif; ?>
          </dd>
        </dl>
        <dl class="form__block">
          <dt class="form__name">
            <?php if($form_item->restriction == "hiragana"): ?>
            <?php echo e(__( "validation.attributes.kana_furigana" )); ?>

            <?php else: ?>
            <?php echo e(__( "validation.attributes.furigana" )); ?>

            <?php endif; ?>
            <?php if($form_item->required == 1): ?>
              <span class="form__reqdMark">※</span>
            <?php endif; ?>
          </dt>
          <dd class="form__inputArea">
            <input type="text" name="name_and_furigana" id="name_and_furigana" class=" form__input js_input_control" value="<?php echo e(old('name_and_furigana')); ?>"/>
            
            <span class="font80 js_error_control name_and_furigana_error_msg err_msg"></span>
            
            <span class="js_conf_control name_and_furigana_conf_msg conf_msg"></span>
          </dd>
        </dl>
        <?php if($form_item->restriction == "hiragana"): ?>
          <script>
            $(function() {
              $.fn.autoKana('#your_name', '#name_and_furigana');
            });
          </script>
        <?php else: ?>
          <script>
            $(function() {
              $.fn.autoKana('#your_name', '#name_and_furigana', {katakana:true});
            });
          </script>
        <?php endif; ?>
        <?php continue; ?>
      <?php endif; ?>
      <dl class="form__block">
        <dt class="form__name">
          <?php echo e($form_item->title); ?>

          <?php if($form_item->required == 1): ?>
            <span class="form__reqdMark">※</span>
          <?php endif; ?>
        </dt>
        <dd class="form__inputArea">
          
          <?php if($form_item->description_above): ?>
            <span class="font80 js_input_control w-100"><?php echo nl2br($form_item->description_above); ?></span>
          <?php endif; ?>
          <?php switch($form_item->form_type):
            case ("text"): ?>
            <input type="text" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("number"): ?>
            <input type="number" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("email"): ?>
            <input type="email" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("tel"): ?>
            <input type="tel" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("url"): ?>
            <input type="url" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("date"): ?>
            <input type="date" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("datetime"): ?>
            <input type="datetime" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("month"): ?>
            <input type="month" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("password"): ?>
            <input type="password" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
            <?php break; ?>
            <?php case ("textarea"): ?>
            <textarea name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__textArea <?php echo e($form_item->html_class); ?> js_input_control" placeholder="<?php echo e($form_item->placeholder); ?>"><?php echo e($form_item->initial_value); ?></textarea>
            <?php break; ?>
            <?php case ("select"): ?>
            <div class="form__selectWrap js_input_control">
              <select name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__select <?php echo e($form_item->html_class); ?> js_input_control">
                <option value=""><?php echo e(__("restriction.select_option",["attribute" => $form_item->title] )); ?></option>
                <?php $__currentLoopData = $choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($choice->choice_type == "select" && $form_item->form_block_id == $choice->block_id): ?>
                    <option value="<?php echo e($choice->label_text); ?>"><?php echo e($choice->label_text); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <?php break; ?>
            <?php case ("multi_select"): ?>
            <select name="<?php echo e($form_item->name); ?>[]" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="form__select <?php echo e($form_item->html_class); ?> js_input_control" multiple>
              <?php $__currentLoopData = $choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($choice->choice_type == "select" && $form_item->form_block_id == $choice->block_id): ?>
                  <option value="<?php echo e($choice->label_text); ?>"><?php echo e($choice->label_text); ?></option>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php break; ?>
            <?php case ("radio"): ?>
            <div class="row">
              <?php $__currentLoopData = $choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($choice->choice_type == "radio" && $form_item->form_block_id == $choice->block_id): ?>
                  <div class="col<?php echo e($form_item->columns ? "-".(12/$form_item->columns) : ""); ?> <?php echo e($form_item->html_id); ?>_wrap js_input_control">
                    <label for="<?php echo e($form_item->html_id); ?><?php echo e($loop->index); ?>" class="<?php echo e($form_item->html_id); ?>_label">
                      <input type="radio" name="<?php echo e($form_item->name); ?>" value="<?php echo e($choice->label_text); ?>" id="<?php echo e($form_item->html_id); ?><?php echo e($loop->index); ?>" class="form__input <?php echo e($form_item->html_class); ?>" <?php if(old($form_item->name) == $choice->label_text): ?> checked <?php endif; ?>>
                      <?php if($choice->image): ?>
                        <img src="<?php echo e(url(Storage::disk('form_item_image')->url($choice->image))); ?>" class="choice_img"/>
                      <?php endif; ?>
                      <span class="label_text"><?php echo e($choice->label_text); ?></span>
                    </label>
                  </div>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php break; ?>
            <?php case ("checkbox"): ?>
            <div class="row">
              <?php $__currentLoopData = $choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($choice->choice_type == "checkbox" && $form_item->form_block_id == $choice->block_id): ?>
                  <div class="col-12 col-md<?php echo e($form_item->columns ? "-".(12/$form_item->columns) : ""); ?> <?php echo e($form_item->html_id); ?>_wrap js_input_control">
                    <label for="<?php echo e($form_item->html_id); ?><?php echo e($loop->index); ?>" class="<?php echo e($form_item->html_id); ?>_label">
                      <?php if($choice->image): ?>
                        <img src="<?php echo e(url(Storage::disk('form_item_image')->url($choice->image))); ?>" class="img-fluid choice_img"/>
                      <?php endif; ?>
                      <input type="checkbox" name="<?php echo e($form_item->name); ?>[]" value="<?php echo e($choice->label_text); ?>" id="<?php echo e($form_item->html_id); ?><?php echo e($loop->index); ?>" class="<?php echo e($form_item->html_class); ?>" <?php if(is_array(old($form_item->name)) && in_array($choice->label_text, old($form_item->name), true)): ?> checked <?php endif; ?>>
                      <?php echo e($choice->label_text); ?>

                    </label>
                  </div>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php break; ?>
            <?php case ("file"): ?>
            <input type="file" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id.'"':''); ?> class="form__input <?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>" accept="<?php echo e($form_item->file_type); ?>"/>
            <?php if($form_item->file_capacity_limit > 0): ?>
              <span class="font80 js_input_control">
                            <?php echo e(__("restriction.file_capacity_limit",["max" => round($form_item->file_capacity_limit / 1024, 2)])); ?>

                        </span>
                        <?php endif; ?>
                        <?php if($form_item->file_type): ?>
                            <span class="font80 js_input_control">
                            <?php switch($form_item->file_type):
                                    case ("image/*"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"jpg,jpeg,png,gif"])); ?>

                                    <?php break; ?>
                                    <?php case ("image/png,image/jpeg,image/gif"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"png,jpg,jpeg,gif"])); ?>

                                    <?php break; ?>
                                    <?php case ("image/jpeg,image/gif"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"jpg,jpeg,gif"])); ?>

                                    <?php break; ?>
                                    <?php case ("image/png,image/jpeg"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"png,jpg,jpeg"])); ?>

                                    <?php break; ?>
                                    <?php case ("image/png"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"png"])); ?>

                                    <?php break; ?>
                                    <?php case ("image/jpeg"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"jpg,jpeg"])); ?>

                                    <?php break; ?>
                                    <?php case ("image/gif"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"gif"])); ?>

                                    <?php break; ?>
                                    <?php case ("application/pdf"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"pdf"])); ?>

                                    <?php break; ?>
                                    <?php case ("video/*"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"mov,mp4"])); ?>

                                    <?php break; ?>
                                    <?php case ("text/csv"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"csv"])); ?>

                                    <?php break; ?>
                                    <?php case ("text/plain"): ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>"txt"])); ?>

                                    <?php break; ?>
                                    <?php default: ?>
                                    <?php echo e(__("restriction.file_type",["attribute"=>$form_item->file_type])); ?>

                                    <?php break; ?>
                                <?php endswitch; ?>
                        </span>
            <?php endif; ?>
            <?php break; ?>
            <?php case ("zp_address"): ?>
            <span class="js_input_control">〒</span>
            <input type="tel" name="zip" class="form__input zipCode js_input_control js_zip" id="zip" value="<?php echo e(old("zip")); ?>" placeholder="<?php echo e($form_item->placeholder); ?>">
            <div class="form__selectWrap js_input_control">
              <select name="pref" class="form__select prefName js_pref">
                <option value=""><?php echo e(__("validation.attributes.pref")); ?></option>
                <?php $__currentLoopData = $pref_choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pref_choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($pref_choice->label_text); ?>" <?php if(old("pref") == $pref_choice->label_text): ?> selected <?php endif; ?>><?php echo e($pref_choice->label_text); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <input type="text" name="address" class="form__input otherAddress js_input_control js_address" value="<?php echo e(old("address")); ?>" placeholder="<?php echo e($form_item->placeholder); ?>">
            <?php break; ?>
            <?php case ("first_last_name"): ?>
            <input type="text" name="last_name" id="last_name" class="form__input name lastName js_input_control" value="<?php echo e(old("last_name")); ?>" placeholder="<?php echo e($form_item->placeholder); ?>">
            <input type="text" name="first_name" id="first_name" class="form__input name firstName js_input_control" value="<?php echo e(old("first_name")); ?>" placeholder="<?php echo e($form_item->placeholder); ?>">
            <?php break; ?>
            <?php case ("calendar"): ?>
            <div class="js_input_control">
              <input type="text" name="<?php echo e($form_item->name); ?>" <?php echo e($form_item->html_id ? 'id='.$form_item->html_id:''); ?> class="<?php echo e($form_item->html_class); ?> js_input_control" value="<?php if(old($form_item->name)): ?><?php echo e(old($form_item->name)); ?><?php else: ?><?php echo e($form_item->initial_value); ?><?php endif; ?>" placeholder="<?php echo e($form_item->placeholder); ?>"/>
              <script>
                $ ( document ).ready ( function() {
                  $.datepicker.setDefaults ( $.datepicker.regional['ja'] );
                  $ ( '#<?php echo e($form_item->html_id); ?>' ).datepicker ( { dateFormat: 'yy-mm-dd', autoclose: true } );
                } );
              </script>
            </div>
            <?php break; ?>
          <?php endswitch; ?>
          
          <span class="font80 js_error_control <?php echo e($form_item->name); ?>_error_msg err_msg"></span>

          
          <span class="js_conf_control <?php echo e($form_item->name); ?>_conf_msg conf_msg"></span>

          
          

          
          <?php if($form_item->description_below): ?>
            <span class="font80 js_input_control w-100"><?php echo nl2br($form_item->description_below); ?></span>
          <?php endif; ?>

          
          <?php if($form_item->min_length > 0 && $form_item->max_length > 0): ?>
            <span class="font80 js_input_control"><?php echo e(__("restriction.length",["min" => $form_item->min_length, "max" => $form_item->max_length])); ?></span>
          <?php elseif($form_item->min_length > 0): ?>
            <span class="font80 js_input_control"> <?php echo e(__("restriction.min_length",["min" => $form_item->min_length])); ?></span>
          <?php elseif($form_item->max_length > 0): ?>
            <span class="font80 js_input_control"><?php echo e(__("restriction.max_length",["max" => $form_item->max_length])); ?></span>
          <?php endif; ?>

        </dd>
      </dl>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($append['form_item_bottom'])): ?><?php echo $append['form_item_bottom']; ?><?php endif; ?>
  </form>
  <?php if(isset($append['under_form'])): ?><?php echo $append['under_form']; ?><?php endif; ?>
  <?php echo nl2br($form->input_form_footer_message ? '<div class="js_input_control">'.$form->input_form_footer_message.'</div>' : ""); ?>

  <?php echo nl2br($form->conf_form_footer_message ? '<div class="js_conf_control">'.$form->conf_form_footer_message.'</div>' : ""); ?>

  <?php echo nl2br($form->error_form_footer_message ? '<div class="js_error_control">'.$form->error_form_footer_message.'</div>' : ""); ?>

</div>

<div class="formBtns">
  <div class="formBtns__wrap confirm js_input_control">
    <button class="formBtns__btn outline js_conf_btn"><?php echo e(__("validation.attributes.conf_btn")); ?></button>
  </div>
  <div class="formBtns__wrap return js_conf_control">
    <button class="formBtns__btn outline js_back_btn"><?php echo e(__("validation.attributes.back_btn")); ?></button>
  </div>
  <div class="formBtns__wrap submit js_conf_control">
    <button class="formBtns__btn solid js_send_btn"><?php echo e(__("validation.attributes.send_btn")); ?></button>
  </div>
</div>

<?php $__env->startSection('script'); ?>
  <script src="<?php echo e($data->theme_path); ?>js/jquery-ui.js"></script>
  <script src="<?php echo e($data->theme_path); ?>js/jquery.autoKana.js"></script>
  <script src="<?php echo e($data->theme_path); ?>js/jquery.jpostal.min.js"></script>
  <script src="<?php echo e($data->theme_path); ?>js/jquery.blockUI.js"></script>
  <script src='<?php echo e($data->theme_path); ?>js/jquery.ui.datepicker-ja.js'></script>
  <script src="<?php echo e($data->theme_path); ?>js/validation.js"></script>
  <script src="<?php echo e($data->theme_path); ?>js/jquery.emform.js?t=<?php echo e(time()); ?>"></script>
  <script>
    $ ( document ).ready ( function() {
      $ ( ".js_main_form" ).emform ( {
        form_item: <?php echo json_encode($form_items, 15, 512) ?>,
        "input_init_color": "#eee",
        input_error_color: "#fff0f5",
        input_error_color: "#fff0f5",
        file_limit_error_msg: '<?php echo e(__("validation.js_file_limit_error_msg")); ?>',
        file_extension_error_msg: '<?php echo e(__("validation.js_file_extension_error_msg")); ?>',
        input_error_msg: '<?php echo e(__("validation.js_input_error_msg")); ?>',
        scroll_to: "form",
      } );
    } );
  </script>
<?php $__env->stopSection(); ?>

<?php if($form->beforeunload_flag == 1): ?>
  <script>
    let onBeforeunloadHandler = function(e) {
        e.returnValue = "<?php echo e(__("admin_messages.form_item.no_saved_alert_msg")); ?>"; //現在はカスタムメッセージは制御できない
    };
    // イベントを登録
    window.addEventListener('beforeunload', onBeforeunloadHandler, false);

    document.querySelector('.js_send_btn').addEventListener('click', function(){
        // イベントを削除
        window.removeEventListener('beforeunload', onBeforeunloadHandler, false);
        document.querySelector('.js_main_form').submit();
    }, false);
  </script>
<?php endif; ?>
<?php if($form->enter_forbidden_flag == 1): ?>
  <script>
    window.onload = function(){
      document.onkeypress = enterForbidden;

      function enterForbidden(){
        if(window.event.keyCode == 13 && window.event.target.indexOf("textarea") === -1 ){
          return false;
        }
      }
    }
  </script>
<?php endif; ?>

<?php if($form->submit_disabled_flag == 1): ?>
  <script>
    document.querySelector('.js_main_form').addEventListener('submit', function(){
    // フォーム送信されると実行される
    let elements = this.elements;
    for (let i = 0; i < elements.length; i++) {
        if (elements[i].type == 'submit') {// type属性値がsubmitの場合
            elements[i].disabled = true;// disabledにする
        }
    }
    });
  </script>
<?php endif; ?>

<?php $__env->startSection('style'); ?>
  <style>
    .js_conf_control {
      display: none;
    }
  </style>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/theme/two_column01/form.blade.php ENDPATH**/ ?>