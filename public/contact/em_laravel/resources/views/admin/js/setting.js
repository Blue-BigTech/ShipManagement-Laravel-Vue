$ (document).ready (function() {

  $ ('#dbRegistBtn').on ('click', function() {
    let msg = '';
    if (!$ ("#url").val ()) msg += '<div>・設置先URLを入力してください。</div>';
    if (!$ ("#db_server").val ()) msg += '<div>・サーバーを入力してください。</div>';
    if (!$ ("#db_name").val ()) msg += '<div>・データベース名を入力してください。</div>';
    if (!$ ("#db_user").val ()) msg += '<div>・ユーザー名を入力してください。</div>';
    if (!$ ("#db_pass").val ()) msg += '<div>・パスワードを入力してください。</div>';

    if (!$ ("#id").val ()) msg += '<div>・ログインIDを入力してください。</div>';
    if (!$ ("#pass").val ()) msg += '<div>・ログインパスワードを入力してください。</div>';

    if ($ ("#id").val () && !isAlNumHyphenUnderS ($ ("#id").val ())) {
      msg += '<div>・ログインIDは半角英数字を入力してください。</div>';
    }
    if ($ ("#pass").val () && !isAlNumHyphenUnderS ($ ("#pass").val ())) {
      msg += '<div>・ログインパスワードは半角英数字を入力してください。</div>';
    }

    if ($ ("#id").val () && $ ("#id").val ().length < 4) {
      msg += '<div>・ログインIDは4文字以上で入力してください。<br>';
    }
    if ($ ("#pass").val () && $ ("#pass").val ().length < 4) {
      msg += '<div>・パスワードは4文字以上で入力してください。</div>';
    }

    if (msg == "") {
      $ ("#rewForm").submit ();
    }
    else {
      $ ('.modal-dialog').removeClass ('modal-sm');
      $ ('#inputErrorModalBody').html (msg);
      $ ('#inputErrorModal').modal ('show');
    }
  });
});
