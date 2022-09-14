<?php $__env->startSection('title', __("admin_messages.page_title_form_block_create") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" id="formRegistBtn" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-title="<?php echo e(__("admin_messages.save")); ?>" onclick="$('#main_form').submit();">
        <i class="fas fa-save"></i>&nbsp;<?php echo e(__("admin_messages.save")); ?>

      </a>
    </div>
    <div class="row">
      <div class="col-4 mt-3 mb-1">
        <h3 class="page-header"><?php echo e(__("admin_messages.menu.item_regist")); ?></h3>
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
        <?php if(isset($append['create_upper_form'])): ?><?php echo $append['create_upper_form']; ?><?php endif; ?>
        <form action="<?php echo e(route("admin.form_block.create")); ?>" method="post" enctype="multipart/form-data" id="main_form">
          <?php echo $__env->make('admin.form_block.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>
        <?php if(isset($append['admin_form_block_create_under_form'])): ?><?php echo $append['admin_form_block_create_under_form']; ?><?php endif; ?>
      </div>
    </div>

  </div>
  <?php echo $__env->make('admin.include.form_block_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('admin.include.editor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php if(isset($append['admin_form_block_create_bottom_section'])): ?><?php echo $append['admin_form_block_create_bottom_section']; ?><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/form_block/create.blade.php ENDPATH**/ ?>