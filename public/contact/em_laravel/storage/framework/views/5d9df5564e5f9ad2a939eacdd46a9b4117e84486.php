<?php $__env->startSection('title', __('admin_messages.app_title').' '.__('setup.setup_complete')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="text-center mt-4"><?php echo e(__('setup.setup_complete')); ?></h3>
        <p class="text-center"><?php echo e(__('setup.dash_board_login_comp_msg')); ?></p>
        <p class="text-center"><?php echo e(__('setup.dash_board_login_comp_url_msg')); ?></p>
        <div class="col-12 text-center">
            <a href="<?php echo e($login_url); ?>" class="btn btn-outline-primary" target="_blank">
                <?php echo e(__('setup.login')); ?>

            </a>
            <p class="mt-2">If you can't make a transition, please wait a moment and try again.</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("setup.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/setup/comp.blade.php ENDPATH**/ ?>