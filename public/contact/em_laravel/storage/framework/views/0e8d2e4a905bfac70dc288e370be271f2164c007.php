<?php if(isset($info)): ?>
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-info p-1 text-center message_area" role="alert">
            <?php echo e($info); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(isset($message)): ?>
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-success p-1 text-center message_area" role="alert">
            <?php echo e($message); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(isset($warning)): ?>
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-danger p-1 text-center message_area" role="alert">
            <?php echo e($warning); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(session('info')): ?>
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-info p-1 text-center message_area" role="alert">
            <?php echo e(session('info')); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(session('message')): ?>
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-success p-1 text-center message_area" role="alert">
            <?php echo e(session('message')); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(session('warning')): ?>
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-danger text-center message_area" role="alert">
            <?php echo e(session('warning')); ?>

        </div>
    </div>
<?php endif; ?>
<style>
    .message_area:hover{
        cursor: pointer;
    }
</style>
<script>
    $ ('.message_area').on ('click', function() {
        $(this).parent().fadeOut('fast');
    });
</script>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/EasyMail/em_laravel/resources/views/admin/include/message.blade.php ENDPATH**/ ?>