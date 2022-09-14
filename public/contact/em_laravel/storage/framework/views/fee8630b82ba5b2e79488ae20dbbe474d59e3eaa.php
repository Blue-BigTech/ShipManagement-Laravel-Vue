<?php $__env->startSection('title', __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="col-12 mt-4">
      <h5 class="d-inline-block">
        <?php echo e(config("app.name")); ?>

      </h5>
      &nbsp;<?php echo e(config("app.version")); ?>

    </div>
    <div class="col-12 mt-4">
      <?php if(isset($append['admin_upper_news'])): ?><?php echo $append['admin_upper_news']; ?><?php endif; ?>
      <div class="card mb-4">
        <div class="card-header">
          <img src="<?php echo e(config('app.admin_assets_url')); ?>/images/news_icon.svg" class="news_icon">
          &nbsp;&nbsp;News
        </div>
        <div class="card-body">
          <?php $__currentLoopData = $news_ar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mt-3">
              <div class="col-4"><?php echo e($news->date); ?></div>
              <div class="col-8">
                <a href="<?php echo e($news->url); ?>" aria-expanded="false" aria-controls="collapseExample" target="_blank">
                  <?php echo $news->title; ?>

                </a>
                <div class="collapse" id="collapseExample<?php echo e($loop->index); ?>">
                  <div class="card card-body">
                    <?php echo $news->content; ?>

                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
    <?php if(isset($append['admin_under_news'])): ?><?php echo $append['admin_under_news']; ?><?php endif; ?>
    <div class="text-center">
      <a href="<?php echo e(__('admin_messages.easymail_url')); ?>/news/" target="_blank">
        <span><?php echo e(__('admin_messages.past_news')); ?></span>
      </a>
    </div>
  </div>
  <div class="container-fluid">

  </div>
  <?php if(isset($append['admin_top_bottom_section'])): ?><?php echo $append['admin_top_bottom_section']; ?><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/top.blade.php ENDPATH**/ ?>