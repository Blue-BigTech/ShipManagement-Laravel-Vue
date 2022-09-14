<?php $__env->startSection('title', __("admin_messages.page_title_form_edit") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="button_area">
      URL
      <a href="<?php echo e($url); ?>/<?php echo e($data->url); ?>" class="btn border-0 btn-outline-dark" target="_blank" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.open_form")); ?>">
        <?php echo e($url); ?>/<?php echo e($data->url); ?>&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i>
      </a>
      <a href="<?php echo e(route("admin.form.list")); ?>" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.back_to_form_list")); ?>">
        <i class="fas fa-list"></i>&nbsp;<?php echo e(__("admin_messages.form.back_to_form_list")); ?>

      </a>
      <a href="<?php echo e(route('admin.form_item.edit', $data->id)); ?>" class="btn btn-sm btn-primary form_rew_btn" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.edit_item")); ?>">
        <i class="fas fa-list-alt"></i>&nbsp;<?php echo e(__("admin_messages.form.edit_item")); ?>

      </a>
      <a href="javascript:void(0);" class="btn btn-sm btn-primary text-white save_btn" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.saved")); ?>">
        <i class="fas fa-save"></i>&nbsp;<?php echo e(__("admin_messages.form.saved")); ?>

      </a>
      <a onclick="" class="btn btn-sm btn-danger text-white detailDeleteBtn form_delete_btn" data-toggle="tooltip" title="<?php echo e(__("admin_messages.delete")); ?>">
        <i class="fas fa-trash"></i>&nbsp;<?php echo e(__("admin_messages.delete")); ?>

      </a>
    </div>
    <div class="row mt-3">
      <h4 class="page-header col-4">
        <?php echo e(__("admin_messages.form.form_edit")); ?>

      </h4>
    </div>
    <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($errors->any()): ?>
      <div class="row mb-1 mt-1">
        <ul class="col-6 list-group m-0">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="row mt-1">
      <div class="col-12">
        <?php if(isset($append['admin_form_edit_upper_form'])): ?><?php echo $append['admin_form_edit_upper_form']; ?><?php endif; ?>
        <form action="<?php echo e(route("admin.form.update", $data->id)); ?>" method="post" id="rewForm" enctype="multipart/form-data">
          <?php echo $__env->make('admin.form.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <form action="<?php echo e(route("admin.form.destroy", $data->id)); ?>" method="post" id="delForm">
            <?php echo csrf_field(); ?>
          </form>
      </div>
    </div>
  </div>
  <input type="hidden" id="delTarget">
  <?php echo $__env->make('admin.modal.deleteConfModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <script>
    $ ( document ).ready ( function() {
      let is_rewrite = false;
      $ ( window ).on ( 'beforeunload', function( e ) {
        if ( is_rewrite === true ) {
          e.returnValue = "<?php echo e(__("admin_messages.form_item.no_saved_alert_msg")); ?>";
        }
      } );

      $ ( '.save_btn' ).on ( 'click', function() {
        $ ( window ).off ( 'beforeunload' );
        $ ( '#rewForm' ).submit ();
      } );
      $ ( '.form-control' ).on ( 'change', function() {
        is_rewrite = true;
      } );
      $ ( '.custom-control-input' ).on ( 'change', function() {
        is_rewrite = true;
      } );
      $ ( '.form_rew_btn' ).on ( 'click', function() {
        is_rewrite = false;
      } );
      $ ( '.form_delete_btn' ).on ( 'click', function() {
        is_rewrite = false;
      } );

    } );
  </script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/admin_form.js"></script>
  <?php if(isset($append['admin_form_edit_bottom_section'])): ?><?php echo $append['admin_form_edit_bottom_section']; ?><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/form/edit.blade.php ENDPATH**/ ?>