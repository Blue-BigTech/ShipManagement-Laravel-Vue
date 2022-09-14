<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e(__('admin_messages.app_title')); ?> <?php echo e(__('admin_messages.login')); ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?php echo e(config('app.admin_assets_url')); ?>/css/login.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php if($errors->any()): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p class="alert alert-danger text-center col-12 col-md-4 offset-md-4 mt-2"><?php echo e($error); ?></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<div class="login_page_wrap">
  <div class="container">
    <div class="left">
      <div class="login"><?php echo e(__('admin_messages.app_title')); ?> <?php echo e(__('admin_messages.login')); ?></div>
      <div style="text-align: center; color: tomato;"></div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
            inkscape:collect="always"
            id="linearGradient"
            x1="13"
            y1="193.49992"
            x2="307"
            y2="193.49992"
            gradientUnits="userSpaceOnUse">
            <stop
              style="stop-color:#ff00ff;"
              offset="0"
              id="stop876"/>
            <stop
              style="stop-color:#ff0000;"
              offset="1"
              id="stop878"/>
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143"/>
      </svg>
      <div class="form">
        <?php if(isset($append['admin_login_upper_form'])): ?><?php echo $append['admin_login_upper_form']; ?><?php endif; ?>
        <form method="POST" action="<?php echo e(route('login')); ?>" id="login_form">
          <?php echo csrf_field(); ?>
          <?php if(isset($append['admin_login_form_hidden'])): ?><?php echo $append['admin_login_form_hidden']; ?><?php endif; ?>
          <input type="hidden" name="action" value="login">
          <label for="email"><?php echo e(__('admin_messages.email')); ?></label>
          <input type="text" id="login_id" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="" placeholder="login email" autofocus>
          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <label for="password"><?php echo e(__('admin_messages.password')); ?></label>
          <input id="password" type="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
          <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <input type="submit" id="submit" value="<?php echo e(__('admin_messages.login')); ?>">
        </form>
        <?php if(isset($append['admin_login_under_form'])): ?><?php echo $append['admin_login_under_form']; ?><?php endif; ?>
        <?php if(Route::has('password.request')): ?>
          <a class="btn btn-link reset_pass_btn" href="<?php echo e(route('password.request')); ?>">
            <?php echo e(__('admin_messages.forgot_your_password')); ?>

          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<style>
  .reset_pass_btn {
    display: block;
    margin-top: 20px;
    color: #c2c2c5;
    font-size: 80%;
  }

  .reset_pass_btn:hover {
    color: #007bff;
  }
</style>
<script src="<?php echo e(config('app.admin_assets_url')); ?>/js/jquery.min.js"></script>
<script src="<?php echo e(config('app.admin_assets_url')); ?>/js/anime.min.js"></script>
<script src="<?php echo e(config('app.admin_assets_url')); ?>/js/anime.es.js"></script>
<script src="<?php echo e(config('app.admin_assets_url')); ?>/js/jquery.blockUI.js"></script>
<script src="<?php echo e(config('app.admin_assets_url')); ?>/js/login.js"></script>
<?php if(config( "app.demo_mode" )): ?>
<script>
  $.blockUI ({
    message: "デモ画面ですので、保存、複製、削除、メール送信などの動作はできなくなっています。",
    fadeIn: 400,
    fadeOut: 700,
    // timeout: 5000,
    showOverlay: false,
    centerY: false,
    css: {
      width: '60%',
      height: '46px',
      top: '10px',
      left: '20%',
      border: '1px solid #fa3701',
      padding: '12px',
      backgroundColor: "#fff",
      'border-radius': '3px',
      'border-color': '#fa3701',
      '-webkit-border-radius': '3px',
      '-moz-border-radius': '3px',
      opacity: 0.7,
      color: '#fa3701',
      'font-weight': 'bold',
      transition: 'box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1)',
      cursor: 'default'
    }
  });
</script>
<?php endif; ?>
</body>
</html>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/login.blade.php ENDPATH**/ ?>