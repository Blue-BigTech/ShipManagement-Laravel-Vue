<!DOCTYPE html>
<html lang="ja">
<head>
  <?php if(isset($append['head_top'])): ?><?php echo $append['head_top']; ?><?php endif; ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if(isset( $form->description )): ?><meta name="description" content="<?php echo e($form->description); ?>"><?php endif; ?>
  <title><?php echo e($form_title); ?></title>
  <link rel="stylesheet" href="<?php echo e($data->theme_path); ?>css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?php echo e($data->theme_path); ?>css/style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <?php if(isset($append['head_bottom'])): ?><?php echo $append['head_bottom']; ?><?php endif; ?>
</head>
<body>
  <?php if(isset($append['body_top'])): ?><?php echo $append['body_top']; ?><?php endif; ?>
  <?php echo $__env->yieldContent("style"); ?>
  <?php echo $__env->make("theme.{$data->theme_name}.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent("content"); ?>
  <?php echo $__env->yieldContent("script"); ?>
  <?php echo $__env->make("theme.{$data->theme_name}.google_recaptcha", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make("theme.{$data->theme_name}.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(isset($append['body_bottom'])): ?><?php echo $append['body_bottom']; ?><?php endif; ?>
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
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/theme/two_column01/layout.blade.php ENDPATH**/ ?>