<?php $__env->startSection('title', __("admin_messages.page_title_form_block") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <style>
    .copy_btn {
      padding: 0;
      border: none;
      padding: 0 3px;
    }
  </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 mt-3">
        <h3 class="page-header"><?php echo e(__("admin_messages.menu.item_list")); ?></h3>
      </div>
    </div>
    <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="table-responsive">
      <table id="data_table" class="table table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th style="width: 50px;"><?php echo e(__("admin_messages.list_page.sort")); ?></th>
          <th><?php echo e(__("admin_messages.form_block.title")); ?></th>
          <th><?php echo e(__("admin_messages.form_block.attr")); ?></th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($row['view_no']); ?></td>
            <td>
              <?php echo e(__("validation.attributes.".$row['name']) != "validation.attributes.".$row['name'] ? __("validation.attributes.".$row['name']) : $row['title']); ?>

            </td>
            <td>
              <div class="row">
                <div class="col-8">
                  <?php $__currentLoopData = $row['use_form_item_name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(config( 'app.url' )); ?>/<?php echo e($val['url']); ?>" class="btn border-1 btn-outline-dark text-decoration-none font80 mt-1 text-center" target="_blank" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.open_form")); ?>">
                      <?php echo e($val['name']); ?>&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i>
                    </a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-4 d-flex justify-content-end">
                  <a href="<?php echo e(route('admin.form_block.copy', $row['id'])); ?>" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="<?php echo e(__("admin_messages.form.copy_form")); ?>" style="max-height: 30px; max-width: 30px;">
                    <i class="fas fa-copy"></i>
                  </a>
                  <a href="<?php echo e(route('admin.form_block.edit', $row['id'])); ?>" class="btn btn-sm btn-primary ml-1" data-toggle="tooltip" title="<?php echo e(__("admin_messages.edit")); ?>" style="max-height: 30px; max-width: 30px;">
                    <i class="fas fa-edit"></i>
                  </a>
                  <?php if(count($row['use_form_item_name']) > 0 || $row['name'] == "email" && $row['html_id'] == 'email' && $row['html_class'] == 'form-control' ): ?>
                    <a href="javascript:void (0);" class="btn btn-sm btn-default border-dark ml-1 disabled" data-toggle="tooltip" data-title="<?php echo e(__("admin_messages.cant_delete")); ?>">
                      <i class="fas fa-trash"></i>
                    </a>
                  <?php else: ?>
                    <form action="<?php echo e(route('admin.form_block.destroy', $row['id'])); ?>" method="post" id="<?php echo e($row['id']); ?>">
                      <?php echo csrf_field(); ?>
                    </form>
                    <a data-id="<?php echo e($row['id']); ?>" class="btn btn-sm list-btn btn-danger listDeleteBtn ml-1" data-toggle="tooltip" title="<?php echo e(__("admin_messages.delete")); ?>" style="max-height: 30px; max-width: 30px;">
                      <i class="fas fa-trash" style="color: #fff;"></i>
                    </a>
                  <?php endif; ?>
                </div>
              </div>

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
  <?php if(isset($append['admin_form_block_list_bottom_section'])): ?><?php echo $append['admin_form_block_list_bottom_section']; ?><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/form_block/list.blade.php ENDPATH**/ ?>