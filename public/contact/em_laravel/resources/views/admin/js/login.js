$ (document).ready (function () {

  let current = null;

  if (navigator.userAgent.match (/(iPhone|iPad|iPod|Android)/i)) {
    // スマホ・タブレット（iOS・Android）の場合の処理を記述
    document.querySelector ('#login_id').addEventListener ('focus', function (e) {
      move_to_login_id ()
    });
    document.querySelector ('#password').addEventListener ('focus', function (e) {
      move_to_login_pass ()
    });
    document.querySelector ('#submit').addEventListener ('focus', function (e) {
      move_to_submit ()
    });
  } else {
    // PCの場合の処理を記述
    $ ('#login_id').hover (function (e) {
      move_to_login_id ()
    });
    $ ('#password').hover (function (e) {
      move_to_login_pass ()
    });
    $ ('#submit').hover (function (e) {
      move_to_submit ()
    });
    document.querySelector ('#login_id').addEventListener ('focus', function (e) {
      move_to_login_id ()
    });
    document.querySelector ('#password').addEventListener ('focus', function (e) {
      move_to_login_pass ()
    });
    document.querySelector ('#submit').addEventListener ('focus', function (e) {
      move_to_submit ()
    });
  }

  function move_to_login_id () {
    $ ('#login_id').focus ();
    if (current) current.pause ();
    current = anime ({
      targets: 'path',
      strokeDashoffset: {
        value: 0,
        duration: 700,
        easing: 'easeOutQuart'
      },
      strokeDasharray: {
        value: '240 1386',
        duration: 700,
        easing: 'easeOutQuart'
      }
    });
  }

  function move_to_login_pass () {
    $ ('#password').focus ();
    if (current) current.pause ();
    current = anime ({
      targets: 'path',
      strokeDashoffset: {
        value: -336,
        duration: 700,
        easing: 'easeOutQuart'
      },
      strokeDasharray: {
        value: '240 1386',
        duration: 700,
        easing: 'easeOutQuart'
      }
    });
  }

  function move_to_submit () {
    $ ('#submit').focus ();
    if (current) current.pause ();
    current = anime ({
      targets: 'path',
      strokeDashoffset: {
        value: -730,
        duration: 700,
        easing: 'easeOutQuart'
      },
      strokeDasharray: {
        value: '530 1386',
        duration: 700,
        easing: 'easeOutQuart'
      }
    });
  }

  $ ('#submit').on ('click', function (e) {
    if ($ ('#login_id').val () == '' || $ ('#password').val () == '') {
      error_block_msg ();
      return false;
    }
  });

});

function error_block_msg (msg = "") {
  if (!msg) {
    msg = "ログイン情報を確認してください";
  }
  msg = "<i class=\"fa fa-2x fa-exclamation-triangle\" aria-hidden=\"true\" style='font-size: 1.5rem; position: absolute; top: 4px;'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + msg;
  $.blockUI ({
    message: msg,
    fadeIn: 700,
    fadeOut: 700,
    timeout: 8000,
    showOverlay: false,
    centerY: false,
    css: {
      width: '90%',
      'max-width': '350px',
      top: '10px',
      border: '1px solid #ff0000',
      padding: '5px',
      backgroundColor: '#FFD5EC',
      '-webkit-border-radius': '3px',
      '-moz-border-radius': '3px',
      color: '#ff0000',
      left: '50%',
      transform: 'translateX(-50%)'
    }
  });
}
