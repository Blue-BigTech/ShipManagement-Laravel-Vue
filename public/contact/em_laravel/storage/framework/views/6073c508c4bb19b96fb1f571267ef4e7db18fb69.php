<?php $__env->startSection('title', __('admin_messages.app_title').' Setup'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-3 pb-5">
        <?php if(isset($errors)): ?>
            <div class="row mb-1">
                <ul class="col-6 list-group m-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item list-group-item-danger p-2"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="row mb-1">
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-<?php echo e(12/count($languages)); ?> text-center">
                    <a class="btn btn-sm btn-outline-dark col-12" href="<?php echo e(route('admin.setup.switch_language',["language" => $language->lang_name])); ?>">
                        <?php echo e(__("admin_messages.lang.".$language->lang_name)); ?>

                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form">
            <form method="POST" action="<?php echo e(route('admin.setup')); ?>" id="login_form">
                <?php echo csrf_field(); ?>
                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4>URL</h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right"><?php echo e(__('setup.install_url')); ?></dt>
                        <dd class="col-12 col-sm-8">
                            <input type="text" name="url" value="<?php if(isset($req->url)): ?><?php echo e($req->url); ?><?php else: ?><?php echo e(old("url")); ?><?php endif; ?>" class="form-control" placeholder="https://exsample.com/contact">
                        </dd>
                    </dl>
                </div>
                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4><?php echo e(__('setup.db_setting_info')); ?></h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right"><?php echo e(__('setup.db_host')); ?></dt>
                        <dd class="col-12 col-sm-8">
                            <input type="text" name="host" value="<?php if(isset($req->host)): ?><?php echo e($req->host); ?><?php else: ?><?php echo e(old("host", "localhost")); ?><?php endif; ?>" class="form-control" placeholder="localhost">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right"><?php echo e(__('setup.db_port')); ?></dt>
                        <dd class="col-12 col-sm-8">
                            <input type="number" name="port" value="<?php if(isset($req->port)): ?><?php echo e($req->port); ?><?php else: ?><?php echo e(old("port", "3306")); ?><?php endif; ?>" class="form-control" placeholder="3306">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right"><?php echo e(__('setup.db_name')); ?></dt>
                        <dd class="col-12 col-sm-8">
                            <input type="text" name="database" value="<?php if(isset($req->database)): ?><?php echo e($req->database); ?><?php else: ?><?php echo e(old("database")); ?><?php endif; ?>" class="form-control">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right"><?php echo e(__('setup.db_username')); ?></dt>
                        <dd class="col-12 col-sm-8">
                            <input type="text" name="username" value="<?php if(isset($req->username)): ?><?php echo e($req->username); ?><?php else: ?><?php echo e(old("username")); ?><?php endif; ?>" class="form-control">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right"><?php echo e(__('setup.db_password')); ?></dt>
                        <dd class="col-12 col-sm-8 input-group">
                            <input type="password" name="password" value="<?php echo e(old("password")); ?>" class="form-control">
                            <div class="input-group-append">
                                <button class="btn password_eye_btn" type="button" data-name="password">
                                    <i class="fas fa-eye"></i>
                                    <i class="fas fa-eye-slash" style="display: none;"></i>
                                </button>
                            </div>
                        </dd>
                    </dl>
                </div>

                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4 class=""><?php echo e(__('setup.dash_board_login_info')); ?></h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right"><?php echo e(__('setup.dash_board_login_email')); ?></dt>
                        <dd class="col-12 col-sm-8">
                            <input type="email" name="login_email" value="<?php if(isset($req->login_email)): ?><?php echo e($req->login_email); ?><?php else: ?><?php echo e(old("login_email")); ?><?php endif; ?>" class="form-control">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right"><?php echo e(__('setup.dash_board_login_password')); ?></dt>
                        <dd class="col-12 col-sm-8 input-group">
                            <input type="password" name="login_password" id="random_pass" value="<?php if(isset($req->login_password)): ?><?php echo e($req->login_password); ?><?php else: ?><?php echo e(old("login_password")); ?><?php endif; ?>" class="form-control">
                            <div class="input-group-append">
                                <button class="btn password_eye_btn" type="button" data-name="login_password">
                                    <i class="fas fa-eye"></i>
                                    <i class="fas fa-eye-slash" style="display: none;"></i>
                                </button>
                            </div>
                            <span class="font80 js_input_control w-100"><?php echo e(__("restriction.alphabet_num_mix")); ?><?php echo e(__("restriction.length", ["min" => 8, "max" => 32])); ?></span>
                            <button type="button" id="auto_pass" class="btn btn-sm btn-outline-secondary mt-1"><?php echo e(__("admin_messages.rew_pass.password_generator")); ?></button>
                        </dd>
                    </dl>
                </div>

                <?php echo $__env->make('admin.include.random_password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4 class=""><?php echo e(__('setup.language_select')); ?></h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right">
                            <?php echo e(__('setup.language')); ?>

                        </dt>
                        <dd class="col-12 col-sm-8">
                            <select name="language" class="form-control col-3">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->lang_name); ?>" <?php echo e(old("language") == $lang->lang_name ? "selected" : ""); ?>>
                                        <?php echo e(__("admin_messages.lang.".$lang->lang_name)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </dd>
                    </dl>
                </div>

                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4 class=""><?php echo e(__('setup.timezone_select')); ?></h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right">
                            <?php echo e(__('setup.timezone')); ?>

                        </dt>
                        <dd class="col-12 col-sm-8">
                            <select name="timezone" class="form-control col-3">
                                <?php $__currentLoopData = $time_zone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php echo e(old("timezone") == $value ? "selected" : ""); ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </dd>
                    </dl>
                </div>

                <div class="col-12 mt-3 mb-3">
                    <button type="submit" class="btn btn-outline-primary col-4 offset-4"><?php echo e(__('setup.setting_form_submit')); ?></button>
                </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        dt {
            font-weight: normal;
        }

        .password_eye_btn {
            border: 1px solid lightgray;
            color: gray;
        }

        .password_eye_btn:hover {
            border: 1px solid #343a40;
            color: #343a40;
            transition-duration: 0.3s;
            transition-delay: 0s;
        }

        label:hover, input[type="radio"] {
            cursor: pointer;
        }
    </style>
    <script>
        $ ( document ).ready ( function() {
          $ ( '.fa-eye-slash' ).hide ();
          $ ( '.password_eye_btn' ).on ( 'click', function() {
              if ( !$ ( this ).data ( "name" ) ) {
                  return false;
              }
              if ( $ ( '[name=' + $ ( this ).data ( "name" ) + ']' ).get ( 0 ).type == 'password' ) {
                  $ ( '[name=' + $ ( this ).data ( "name" ) + ']' ).get ( 0 ).type = 'text';
                  $ ( this ).children ( '.fa-eye' ).hide ();
                  $ ( this ).children ( '.fa-eye-slash' ).show ();
              }
              else {
                  $ ( '[name=' + $ ( this ).data ( "name" ) + ']' ).get ( 0 ).type = 'password';
                  $ ( this ).children ( '.fa-eye' ).show ();
                  $ ( this ).children ( '.fa-eye-slash' ).hide ();
              }
          } );
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("setup.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/setup/index.blade.php ENDPATH**/ ?>