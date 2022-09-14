<?php $__env->startSection('content'); ?>
  <div class="content">
    <div class="contentWrap container colWrap rtl">
      <div class="main">
        <h3 class="col-12 text-center">404 Not found</h3>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <style>
    .main{
      width: 100% !important;
      margin-top: 50px;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("theme.{$data->theme_name}.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/errors/404.blade.php ENDPATH**/ ?>