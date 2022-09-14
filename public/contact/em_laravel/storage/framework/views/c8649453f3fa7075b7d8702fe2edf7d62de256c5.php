<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="contentHead">
            <h2 class="contentHead__ttl"><?php echo e($form_title); ?></h2>
            <p><span class="reqdMark">※</span><?php echo e(__("validation.attributes.form_message2")); ?></p>
        </div>
        <div class="formWrap">
            <?php echo $__env->make("theme.{$data->theme_name}.form", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("theme.{$data->theme_name}.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/theme/one_column/index.blade.php ENDPATH**/ ?>