<?php $__env->startSection('title', __("admin_messages.page_title_setting") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-title="<?php echo e(__("admin_messages.save")); ?>" onclick="$('#rewForm').submit();">
        <i class="fas fa-save"></i>&nbsp;<?php echo e(__("admin_messages.save")); ?>

      </a>
    </div>
    <div class="row">
      <div class="col-4 mt-3 mb-1">
        <h3 class="page-header"><?php echo e(__("admin_messages.menu.admin_setting")); ?></h3>
      </div>
    </div>
    <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="table-responsive mb-4">
      <?php if(isset($append['admin_setting_upper_form'])): ?><?php echo $append['admin_setting_upper_form']; ?><?php endif; ?>
      <form action="<?php echo e(route("admin.setting.update")); ?>" method="post" id="rewForm">
        <?php echo csrf_field(); ?>
        <?php if(isset($append['admin_setting_form_hidden'])): ?><?php echo $append['admin_setting_form_hidden']; ?><?php endif; ?>
        <table id="data_table" class="table table-hover" cellspacing="0" width="100%">
          <tbody>
          <tr>
            <th>URL</th>
            <td>
              <input type="text" name="url" class="form-control" value="<?php echo e($url); ?>">
            </td>
          </tr>
          <tr>
            <th>TimeZone</th>
            <td>
              <select name="time_zone" class="form-control">
                <?php $__currentLoopData = $time_zone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value); ?>" <?php echo e($value == $timezone ? "selected" : ""); ?>><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </td>
          </tr>
          </tbody>
        </table>
      </form>
      <?php if(isset($append['admin_setting_under_form'])): ?><?php echo $append['admin_setting_under_form']; ?><?php endif; ?>
    </div>
  </div>

  <style>
    th {
      width: 20%;
      font-weight: normal;
    }
  </style>
  <?php if(isset($append['admin_setting_form_bottom_section'])): ?><?php echo $append['admin_setting_form_bottom_section']; ?><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/setting.blade.php ENDPATH**/ ?>