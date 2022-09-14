<?php $__env->startSection('title', __("admin_messages.page_title_theme") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row mt-3">
      <h4 class="page-header">
        <?php echo e(__("admin_messages.menu.theme")); ?>

      </h4>
    </div>
    <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row" style="max-width: 1400px;">
      <?php $__currentLoopData = $theme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-sm-4 col-md-3 mt-3 text-center">
          <div class="border rounded p-2 shadow-sm h-100">
            <div class="col-12 p-1">
              <div class="col-12 text-right mb-2">
                <a href="<?php echo e(route("admin.theme.show", $theme_row->theme_name)); ?>" class=""><i class="far fa-edit"></i></a>
              </div>
              <img src="<?php echo e($theme_row->screen_shot); ?>" class="img-fluid">
              <p><?php echo e($theme_row->theme_name); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/theme/index.blade.php ENDPATH**/ ?>