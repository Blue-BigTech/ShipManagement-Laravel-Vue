<?php $__env->startSection('title', __("admin_messages.page_title_theme") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mt-3">
            <h4 class="page-header col-3">
                <?php echo e(__("admin_messages.menu.theme")); ?>

            </h4>
            <div id="path_viewer" class="col-7"></div>
            <div class="col-2 text-right">
                <a href="<?php echo e(route("admin.theme")); ?>" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="テーマ一覧へ戻る">
                    <i class="fas fa-list"></i>
                </a>
                <?php if(!config("app.demo_mode")): ?>
                    <a href="javascript:void (0)" class="theme_save_btn btn btn-sm btn-outline-primary ml-2" title="保存" data-toggle="tooltip" style="font-size: 1rem;">
                        <i class="far fa-save"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-3">
                <h4 class="mb-3"><?php echo e($theme->theme_name); ?></h4>
                <?php $__currentLoopData = $dirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="mb-1 font80">
                        <a class="theme_show_dir_text" data-toggle="collapse" href="#collapse<?php echo e($loop->index); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($loop->index); ?>">
                            <i class="far fa-folder"></i>&nbsp;<?php echo e($dir['dir_name']); ?>

                        </a>
                    </p>
                    <div id="collapse<?php echo e($loop->index); ?>" class="collapse hide" role="tabpanel" aria-labelledby="heading<?php echo e($loop->index); ?>">
                        <?php $__currentLoopData = $dir['file']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="mb-1 ml-4 font80 file_wrap">
                                <a href="javascript:void (0)" data-path="<?php echo e($file['path']); ?>" class="file_name_anc">
                                    <?php echo e($file['file_name']); ?>

                                </a>
                                <span class="content d-none"><?php echo e($file['content']); ?></span>
                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="mb-1 font80 file_wrap">
                        <a href="javascript:void (0)" data-path="<?php echo e($file['path']); ?>" class="file_name_anc">
                            <?php echo e($file['file_name']); ?>

                        </a>
                        <span class="content d-none"><?php echo e($file['content']); ?></span>
                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-9">
                <textarea id="content_viewer" class="col-12"></textarea>
                <img src="" id="image_viewer" class="img-thumbnail" style="max-width: 300px;">
            </div>
        </div>
    </div>

    <form action="<?php echo e(route("admin.theme.update")); ?>" method="post" id="theme_file_save_form">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="theme_name" id="theme_name" value="<?php echo e($theme->theme_name); ?>">
        <input type="hidden" name="save_file_path" id="save_file_path">
        <input type="hidden" name="save_file_content" id="save_file_content">
    </form>

    <script>
        $ (document).ready (function() {
            $ ('.file_name_anc').on ('click', function() {
                $ ("#image_viewer").hide ();
                $ ('#content_viewer').hide ();
                $ ('.theme_save_btn').hide ();
                $ ('#save_file_path').val ("");
                $ ('#save_file_content').val ("");

                $ ('.file_wrap').removeClass ("theme_forcus_file");
                $ (this).parent ().addClass ("theme_forcus_file");

                if (imageExtensionCheck (getExt ($ (this).data ("path")))) {
                    $ ("#image_viewer").attr ("src", $ (this).data ("path"));
                    $ ("#image_viewer").fadeIn ("fast");
                }
                else {
                    $ ('#content_viewer').val (htmlspecialchars_decode ($ (this).next (".content").html ()));
                    $ ('#content_viewer').fadeIn ('fast');
                    $ ('.theme_save_btn').fadeIn ('fast');
                }

                $ ('#path_viewer').html ($ (this).data ("path"));
            });

            $ ('.theme_save_btn').on ('click', function() {
                $ ('#save_file_path').val ($ ('#path_viewer').html ());
                $ ('#save_file_content').val ($ ('#content_viewer').val ());
                $ ('#theme_file_save_form').submit ();
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/theme/show.blade.php ENDPATH**/ ?>