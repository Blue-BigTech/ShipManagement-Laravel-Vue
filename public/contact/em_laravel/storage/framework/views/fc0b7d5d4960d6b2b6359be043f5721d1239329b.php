<?php $__env->startSection('title', __("admin_messages.page_title_form_create") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" id="formRegistBtn" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-title="<?php echo e(__("admin_messages.save")); ?>" onclick="$('#main_form').submit();">
        <i class="fas fa-save"></i>&nbsp;<?php echo e(__("admin_messages.save")); ?>

      </a>
    </div>
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h3 class="page-header"><?php echo e(__("admin_messages.menu.form_regist")); ?></h3>
      </div>
    </div>

    <?php if($errors->any()): ?>
      <div class="row mb-1">
        <ul class="col-6 list-group m-0">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-12">
        <?php if(isset($append['admin_from_create_upper_form'])): ?><?php echo $append['admin_from_create_upper_form']; ?><?php endif; ?>
        <form action="<?php echo e(route("admin.form.create")); ?>" method="post" id="main_form">
          <?php echo $__env->make('admin.form.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>
      </div>
    </div>

  </div>
  <script>
    let is_rewrite = false;
    $ ( window ).on ( 'beforeunload', function( e ) {
      if ( is_rewrite === true ) {
        e.returnValue = "<?php echo e(__("admin_messages.form_item.no_saved_alert_msg")); ?>";
      }
    } );
    $ ( document ).ready ( function() {
      $ ( '.form-control' ).on ( 'change', function() {
        is_rewrite = true;
      } );
      $ ( '.custom-control-input' ).on ( 'change', function() {
        is_rewrite = true;
      } );
      $ ( '#formRegistBtn' ).on ( 'click', function() {
        is_rewrite = false;
      } );
    } );
  </script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/admin_form.js"></script>
  <?php if(isset($append['admin_from_create_bottom_section'])): ?><?php echo $append['admin_from_create_bottom_section']; ?><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/form/create.blade.php ENDPATH**/ ?>