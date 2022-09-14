<?php echo e($reply_mail_header_message ? $reply_mail_header_message : ""); ?>

<?php if($include_submissions == 1): ?>

<?php $__currentLoopData = $form_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(isset($row['title'])): ?><?php echo e($row['title']); ?>:<?php endif; ?><?php echo $row['value']; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php echo e($reply_mail_footer_message ? $reply_mail_footer_message : ""); ?>

<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/theme/one_column/reply_mail.blade.php ENDPATH**/ ?>