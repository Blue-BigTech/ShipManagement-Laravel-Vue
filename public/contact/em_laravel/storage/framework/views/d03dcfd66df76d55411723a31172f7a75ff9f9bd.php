<?php if($form->google_re_captcha_site_key != ""): ?>
  <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e($form->google_re_captcha_site_key); ?>"></script>
  <script>
    $ ( '.js_send_btn' ).on ( 'click', function(e) {
      e.preventDefault ();
      e.stopImmediatePropagation ();
      grecaptcha.ready ( function() {
        grecaptcha.execute ( '<?php echo e($form->google_re_captcha_site_key); ?>', {
          action: 'easy_mail_send'
        } ).then ( function( token ) {
          $ ( '#g-recaptcha-token' ).val ( token );
          $ ( 'form' ).submit ();
        } );
      }, false );
    } );
  </script>
  <?php if(isset($form->google_re_captcha_bottom_px)): ?>
    <style>
      .grecaptcha-badge {
        margin-bottom: <?php echo e($form->google_re_captcha_bottom_px); ?>px;
      }
    </style>
  <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/theme/one_column/google_recaptcha.blade.php ENDPATH**/ ?>