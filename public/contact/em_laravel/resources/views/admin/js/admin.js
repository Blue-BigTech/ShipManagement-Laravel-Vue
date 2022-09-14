var max_upload_image = 1024000;//1MB
/******************************************************
 *
 * Load completion
 *
 ******************************************************/

$ (document).ready (function() {

    $ ('.scroll-top').click (function() {
        TweenLite.to ('html,body', 0.5, {
            scrollTop: 0,
            ease: Power3.easeOut,
            onComplete: function() {
            },
            onStart: function() {
            }
        });
        return false;
    });

    $ ('.scroll-bottom').click (function() {
        let bottom = $ ('.bottom').offset ().top;
        TweenLite.to ('html,body', 0.5, {
            scrollTop: bottom,
            ease: Power3.easeOut,
            onComplete: function() {
            },
            onStart: function() {
            }
        });
        return false;
    });

    /******************************************
     * Enterキー無効
     ******************************************/
    $ ('input').keypress (function(ev) {
        if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
            return false;
        }
        else {
            return true;
        }
    });

    /******************************************
     * 登録確認ModalWindow 共通
     ******************************************/
    $ ('#registConfModal').on ('click', '.modal-footer .btn-yes', function() {
        $.blockUI ({ message: 'Loading ...' });
        $ ('#registConfModal').modal ('hide');
        $ ('#registForm').submit ();
    });

    /******************************************
     * 削除確認ModalWindow 共通
     ******************************************/
    $ ('#deleteConfModal').on ('click', '.modal-footer .btn-yes', function() {
        $ ('#deleteConfModal').modal ('hide');
        $ ('#' + $ ('#delTarget').val ()).submit ();// hiddenに設定したフォームを送信
    });

    /******************************************
     * 管理者IDパスワード更新
     ******************************************/
    $ ('#adminPassRewBtn').on ('click', function() {
        let msg = '';
        if ($ ("#admin_id").val () == "") {
            msg += '<div>・IDを入力してください。</div>';
        }
        if (!$ ("#admin_pass").val ()) {
            msg += '<div>・新しいパスワードを入力してください。</div>';
        }
        if (!$ ("#re_admin_pass").val ()) {
            msg += '<div>・新しいパスワード再入力を入力してください。</div>';
        }
        if ($ ("#admin_id").val ().length < 4 || $ ("#admin_id").val ().length > 12) {
            msg += '<div>・IDは4～12文字で入力してください。<br>';
        }
        if ($ ("#admin_pass").val ().length < 4 || $ ("#admin_pass").val ().length > 12) {
            msg += '<div>・パスワードは4～12文字で入力してください。</div>';
        }
        if ($ ("#admin_pass").val () != $ ("#re_admin_pass").val ()) {
            msg += '<div>・新しいパスワードと新しいパスワード再入力が一致しません。</div>';
        }

        if (!isAlphabetNumeric ($ ("#admin_id").val ())) {
            msg += '<div>・新しいIDは半角英数字を入力してください。</div>';
        }
        if (!isAlphabetNumeric ($ ("#admin_pass").val ())) {
            msg += '<div>・新しいパスワードは半角英数字を入力してください。</div>';
        }

        if (msg == '') {
            msg += '<div>新しいID ' + $ ("#admin_id").val () + '</div>';
            msg += '<div>パスワード ***********</div>';
            msg += '<div>(PASSは非表示になっています)</div>';
            msg += '<div>変更後は再ログインしてください。</div>';
            $ ('#registConfModalBody').html (msg);
            $ ('#registConfModal').modal ('show');
        }
        else {
            $ ('#inputErrorModalBody').html (msg);
            $ ('#inputErrorModal').modal ('show');
        }
    });


    /******************************************
     *  一覧から削除
     ******************************************/
    $ ('.listDeleteBtn').on ('click', function() {
        $ ('#delTarget').val ($ (this).data ('id'));
        let msg = '';
        msg += '<div>削除します。よろしいですか？</div>';
        $ ('.modal-dialog').removeClass ('modal-sm');
        $ ('#deleteConfModalBody').html (msg);
        $ ('#deleteConfModal').modal ('show');
    });

    /******************************************
     *  詳細から削除
     ******************************************/
    $ ('.detailDeleteBtn').on ('click', function() {
        $ ('#delTarget').val ("delForm");
        let msg = '';
        msg += '<div>削除します。よろしいですか？</div>';
        $ ('.modal-dialog').removeClass ('modal-sm');
        $ ('#deleteConfModalBody').html (msg);
        $ ('#deleteConfModal').modal ('show');
    });


    /******************************************
     *  tooltip
     ******************************************/
    $ (function() {
        $ ('[data-toggle="tooltip"]').tooltip ();
    });

    /******************************************
     *  menu
     ******************************************/
    // let menu_flag = localStorage.getItem ('menu_flag');
    // if (menu_flag === "menu_close") {
    //     $ ('body').addClass ('sb-sidenav-toggled');
    // }
    //
    // $ ('#sidebarToggle').on ('click', function() {
    //     setTimeout (function() {
    //         set_storage ();
    //     }, 500);
    // });
    //
    // function set_storage () {
    //     if ($ ('body').hasClass ('sb-sidenav-toggled')) {
    //         localStorage.setItem ('menu_flag', 'menu_close');
    //     }
    //     else {
    //         localStorage.setItem ('menu_flag', 'menu_open');
    //     }
    // }

});

