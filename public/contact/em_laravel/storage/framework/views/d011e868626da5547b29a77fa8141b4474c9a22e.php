<?php $__env->startSection('content'); ?>
    <div class="container text-center">
        <h3 class="mt-5 mb-4"><?php echo e($form->name); ?></h3>
        <h4 class="mt-5 mb-4"><?php echo e(__("messages.form.hidden")); ?></h4>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("theme.{$data->theme_name}.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/theme/one_column/hidden.blade.php ENDPATH**/ ?>