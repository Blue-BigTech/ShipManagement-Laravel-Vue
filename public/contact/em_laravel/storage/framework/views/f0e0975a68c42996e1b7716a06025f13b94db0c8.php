<?php $__env->startSection('title', __("admin_messages.page_title_form_item_edit") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" id="formRegistBtn" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-title="<?php echo e(__("admin_messages.save")); ?>" onclick="$('#rewForm').submit();">
        <i class="fas fa-save"></i>&nbsp;<?php echo e(__("admin_messages.save")); ?>

      </a>
      <?php if(count($use_form_item_name) > 0 ||  $data['name'] == "email" && $data['html_id'] == "email" && $data['html_class'] == 'form-control'): ?>
        <a href="javascript:void (0);" class="btn btn-sm btn-default border-dark disabled" data-toggle="tooltip" data-title="<?php echo e(__("admin_messages.cant_delete")); ?>">
          <i class="fas fa-trash"></i>&nbsp;<?php echo e(__("admin_messages.cant_delete")); ?>

        </a>
      <?php else: ?>
        <a href="javascript:void (0);" class="btn btn-sm btn-danger detailDeleteBtn" data-toggle="tooltip" data-title="<?php echo e(__("admin_messages.delete")); ?>">
          <i class="fas fa-trash"></i>&nbsp;<?php echo e(__("admin_messages.delete")); ?>

        </a>
      <?php endif; ?>
    </div>
    <div class="row">
      <div class="col-3 mt-3 mb-1">
        <h3 class="page-header d-inline"><?php echo e(__("admin_messages.form_block.form_block_edit")); ?></h3>
        <a href="<?php echo e(route("admin.form_block.list")); ?>" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form_block.back_to_form_block_list")); ?>">
          <i class="fas fa-list-alt"></i>&nbsp;<?php echo e(__("admin_messages.form_block.back_to_form_block_list")); ?>

        </a>
      </div>
      <div class="col-7 mt-3 mb-1">
        <?php $__currentLoopData = $use_form_item_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(config( 'app.url' )); ?>/<?php echo e($val['url']); ?>" class="btn border-1 btn-outline-dark text-decoration-none mt-1 font80" target="_blank" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.open_form")); ?>">
            <?php echo e($val['name']); ?>&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i>
          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
    <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($errors->any()): ?>
      <div class="row mt-1 mb-1">
        <ul class="col-6 list-group m-0">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="row mt-1">
      <div class="col-12">
        <?php if(isset($append['admin_form_block_edit_upper_form'])): ?><?php echo $append['admin_form_block_edit_upper_form']; ?><?php endif; ?>
        <form action="<?php echo e(route("admin.form_block.update", $data->id)); ?>" method="post" id="rewForm" enctype="multipart/form-data">
          <?php echo $__env->make('admin.form_block.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>
        <?php if(isset($append['admin_form_block_edit_under_form'])): ?><?php echo $append['admin_form_block_edit_under_form']; ?><?php endif; ?>
        <form action="<?php echo e(route("admin.form_block.destroy", $data->id)); ?>" method="post" id="delForm">
          <?php echo csrf_field(); ?>
        </form>
      </div>
    </div>

  </div>

  <input type="hidden" id="delTarget">
  <?php echo $__env->make('admin.modal.deleteConfModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('admin.include.form_block_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('admin.include.editor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script>
    /**
     * フォームタイプ別に表示
     */
    if ( $ ( '#form_type' ).val () == 'text'|| $ ( '#form_type' ).val () == 'email' || $ ( '#form_type' ).val () == 'tel' ||
        $ ( '#form_type' ).val () == 'url' || $ ( '#form_type' ).val () == 'password' || $ ( '#form_type' ).val () == 'textarea') {
      $ ( '.text-input' ).fadeIn ( 'fast' );
    }
    else if ( $ ( '#form_type' ).val () == 'select' || $ ( '#form_type' ).val () == 'multi_select' ) {
      $ ( '.select-input' ).fadeIn ( 'fast' );
    }
    else if ( $ ( '#form_type' ).val () == 'radio' || $ ( '#form_type' ).val () == 'checkbox' ) {
      $ ( '.radio-input' ).fadeIn ( 'fast' );
    }
    else if ( $ ( '#form_type' ).val () == 'file' ) {
      $ ( '.file-input' ).fadeIn ( 'fast' );
    }
    else if ( $ ( '#form_type' ).val () == 'name_and_furigana' ) {
      $ ( ".name_input" ).hide ();
      $ ( ".id_input" ).hide ();
      $ ( ".class_input" ).hide ();
      $ ( '.restriction-input' ).fadeIn ( 'fast' );
    }



    if (
      $ ( '#restriction' ).val () == 'katakana' ||
      $ ( '#restriction' ).val () == 'hiragana')
    {
      $ ( '.hankaku' ).hide ();
    }
    else if (
      $ ( '#restriction' ).val () == 'num' ||
      $ ( '#restriction' ).val () == 'alphabet_num' ||
      $ ( '#restriction' ).val () == 'alphabet' ||
      $ ( '#restriction' ).val () == 'alphabet_num_mix' ||
      $ ( '#restriction' ).val () == 'num_hyphen' ||
      $ ( '#restriction' ).val () == 'email' ||
      $ ( '#restriction' ).val () == 'tel' ||
      $ ( '#restriction' ).val () == 'tel_hyphen' ||
      $ ( '#restriction' ).val () == 'zip' ||
      $ ( '#restriction' ).val () == 'zip_hyphen'
    ) {
      $ ( '.zenkaku' ).hide ();
    }

  </script>
  <?php if(isset($append['admin_form_block_edit_form_bottom_section'])): ?><?php echo $append['admin_form_block_edit_form_bottom_section']; ?><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/form_block/edit.blade.php ENDPATH**/ ?>