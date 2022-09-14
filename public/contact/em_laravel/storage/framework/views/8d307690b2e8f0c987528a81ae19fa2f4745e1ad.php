<?php $__env->startSection('title', __("admin_messages.page_title_form_list") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <h3 class="page-header"><?php echo e(__("admin_messages.form.form_list")); ?></h3>
            </div>
        </div>
        <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-responsive">
            <table id="data_table" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th><?php echo e(__("admin_messages.form.name")); ?></th>
                    <th><?php echo e(__("admin_messages.form.attr")); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($row->name); ?><br>
                        </td>
                        <td>
                            <p class="row">
                                <span class="col">
                                    <span class="font80">URL&nbsp;&nbsp;</span>
                                    <a href="<?php echo e($url); ?>/<?php echo e($row->url); ?>" class="btn border-0 btn-outline-dark" target="_blank" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.open_form")); ?>">
                                        <?php echo e($url); ?>/<?php echo e($row->url); ?>&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i>
                                    </a>
                                </span>
                                <span class="col text-right">
                                    <?php if($row->view_flag == 1): ?>
                                        <label class="alert alert-success form-list-view-flag"><?php echo e(__("admin_messages.form.displaying")); ?></label>
                                    <?php else: ?>
                                        <label class="alert alert-danger form-list-view-flag"><?php echo e(__("admin_messages.form.hidden")); ?></label>
                                    <?php endif; ?>
                                    <a href="<?php echo e($url); ?>/<?php echo e($row->url); ?>" class="btn btn-sm btn-outline-dark" target="_blank" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.open_form")); ?>">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.form.copy', $row->id)); ?>" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.copy_form")); ?>">
                                        <i class="fas fa-copy"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.form_item.edit', $row->id)); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.edit_item")); ?>">
                                        <i class="fas fa-list-alt"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.form.edit', $row->id)); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.edit_form")); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a data-id="<?php echo e($row->id); ?>" class="btn btn-sm btn-danger listDeleteBtn" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.delete_form")); ?>">
                                        <i class="fas fa-trash" style="color: #fff;"></i>
                                    </a>
                                </span>
                            </p>
                            <p class="font80">
                                <span class="row"><span class="col"><?php echo e(__("admin_messages.form.theme")); ?><span class="font-weight-light">&lt;theme_name&gt;</span></span><span class="col"><?php echo e($row->theme_name); ?></span></span>
                                <span class="row"><span class="col"><?php echo e(__("admin_messages.form.mail_title")); ?><span class="font-weight-light">&lt;mail_title&gt;</span></span><span class="col"><?php echo e($row->mail_title); ?></span></span>
                                <span class="row"><span class="col"><?php echo e(__("admin_messages.form.admin_email")); ?><span class="font-weight-light">&lt;admin_email&gt;</span></span><span class="col"><?php echo e($row->admin_email); ?></span></span>
                                <?php if($row->bcc_email): ?>
                                    <span class="row"><span class="col"><?php echo e(__("admin_messages.form.bcc_email")); ?><span class="font-weight-light">&lt;bcc_email&gt;</span></span><span class="col"><?php echo e($row->bcc_email); ?></span></span>
                                <?php endif; ?>
                                <?php if($row->cc_email): ?>
                                    <span class="row"><span class="col"><?php echo e(__("admin_messages.form.cc_email")); ?><span class="font-weight-light">&lt;cc_email&gt;</span></span><span class="col"><?php echo e($row->cc_email); ?></span></span>
                                <?php endif; ?>
                                <span class="row"><span class="col"><?php echo e(__("admin_messages.form.conf_mail")); ?><span class="font-weight-light">&lt;conf_mail_flag&gt;</span></span><span class="col"> <?php echo e($row->conf_mail_flag == 1 ? __("admin_messages.yes"):__("admin_messages.no")); ?></span></span>
                                <span class="row"><span class="col"><?php echo e(__("admin_messages.form.include_submissions")); ?><span class="font-weight-light">&lt;include_submissions&gt;</span></span><span class="col"><?php echo e($row->include_submissions == 1 ? __("admin_messages.yes"):__("admin_messages.no")); ?></span></span>
                                <span class="row"><span class="col"><?php echo e(__("admin_messages.form.include_submissions_admin_email")); ?><span class="font-weight-light">&lt;include_submissions_admin_email&gt;</span></span><span class="col"><?php echo e($row->include_submissions_admin_email == 1 ? __("admin_messages.yes"):__("admin_messages.no")); ?></span></span>
                                <span class="row"><span class="col"><?php echo e(__("admin_messages.form.save_data")); ?><span class="font-weight-light">&lt;save_data&gt;</span></span><span class="col"><?php echo e($row->save_data == 1 ? __("admin_messages.yes"):__("admin_messages.no")); ?></span></span>
                                <span class="row"><span class="col"><?php echo e(__("admin_messages.form.language")); ?><span class="font-weight-light">&lt;language&gt;</span></span><span class="col"><?php echo e($row->language); ?></span></span>
                                <?php if($row->denied_ip): ?>
                                    <span class="row"><span class="col"><?php echo e(__("admin_messages.form.denied_ip")); ?><span class="font-weight-light">&lt;denied_ip&gt;</span></span><span class="col"><?php echo e($row->denied_ip); ?></span></span>
                                <?php endif; ?>
                                <?php if($row->denied_ip_host_error_msg): ?>
                                    <span class="row"><span class="col"><?php echo e(__("admin_messages.form.denied_ip_message")); ?><span class="font-weight-light">&lt;denied_ip_host_error_msg&gt;</span></span><span class="col"><?php echo e($row->denied_ip_host_error_msg); ?></span></span>
                                <?php endif; ?>
                            </p>
                            <form action="<?php echo e(route('admin.form.destroy', $row->id)); ?>" method="post" id="<?php echo e($row->id); ?>">
                                <?php echo csrf_field(); ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="holder"></div>
        <input type="hidden" id="delTarget">

    </div>
    <?php echo $__env->make('admin.modal.deleteConfModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.include.list_bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(isset($append['admin_form_list_bottom_section'])): ?><?php echo $append['admin_form_list_bottom_section']; ?><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/form/list.blade.php ENDPATH**/ ?>