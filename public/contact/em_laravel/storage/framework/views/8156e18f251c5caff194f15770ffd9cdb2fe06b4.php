<?php $__env->startSection('content'); ?>
    <div class="container mb-5">
        <h6 class="text-center mt-3"><?php if(isset($form->thanks_message)): ?><?php echo nl2br($form->thanks_message); ?><?php endif; ?></h6>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("theme.{$data->theme_name}.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/theme/one_column/thanks.blade.php ENDPATH**/ ?>