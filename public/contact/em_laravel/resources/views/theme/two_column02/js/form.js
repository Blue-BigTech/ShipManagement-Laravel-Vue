$ (document).ready (function() {
    $ ('#zip').jpostal ({
        postcode: [
            '#js_zip',
        ],
        address: {
            '#js_pref': '%3',
            '#js_address': '%4%5',
        }
    });

    function mail_form_init () {
        btn_toggle (1);
        init_form_color ();
        $ ('.conf_control').hide ();
        $ ('.input_control').fadeIn ('fast');
        scroll_form_top ();
    }

    function btn_toggle (is_conf_show) {
        if (is_conf_show == 1) {
            $ ('#conf_btn').fadeIn ();
            $ ('#send_btn').hide ();
            $ ('#back_btn').hide ();
        }
        else if (is_conf_show == 2) {
            $ ('#conf_btn').hide ();
            $ ('#send_btn').fadeIn ();
            $ ('#back_btn').fadeIn ();
        }
    }

    function init_form_color () {
        $ ('input').each (function() {
            $ (this).css ('background-color', 'white');
        });
        $ ('textarea').each (function() {
            $ (this).css ('background-color', 'white');
        });
        $ ('select').each (function() {
            $ (this).css ('background-color', 'white');
        });
        $ ('.err_msg').hide ();
    }

    mail_form_init ();


    function error_grow_info (msg) {
        let error_msg = "";
        if (!msg) {
            error_msg = "<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>&nbsp;&nbsp;&nbsp;<span class='block_error_msg'>入力にエラーがあります</span><i class=\"fa fa-times block_error_msg_close_btn\" aria-hidden=\"true\" style='font-size: 2rem; float: right; cursor: pointer;'></i>"
        }
        else {
            error_msg = "<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>&nbsp;&nbsp;&nbsp;<span class='block_error_msg'>";
            error_msg += msg;
            error_msg += "</span><i class=\"fa fa-times block_error_msg_close_btn\" aria-hidden=\"true\" style='font-size: 2rem; float: right; cursor: pointer;'></i>";
        }

        $.blockUI ({
            message: error_msg,
            fadeIn: 400,
            fadeOut: 700,
            timeout: 5000,
            showOverlay: false,
            centerY: false,
            css: {
                width: '90%',
                height: 'auto',
                top: '10px',
                left: '5%',
                border: '1px solid #fa3701',
                padding: '12px',
                backgroundColor: "#fff",
                'border-radius': '3px',
                'border-color': '#fa3701',
                '-webkit-border-radius': '3px',
                '-moz-border-radius': '3px',
                opacity: 1.0,
                color: '#fa3701',
                'font-weight': 'bold',
                transition: 'box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1)',
                cursor: 'default'
            }
        });
    }

    /**
     * 戻るボタンがクリックされた
     */
    $ ('#back_btn').on ('click', function() {
        mail_form_init ();
    });

    /**
     * 送信ボタンがクリックされた
     */
    $ ('#send_btn').on ('click', function() {
        $ ('#main_form').submit ();
    });
    /**
     * 確認ボタンがクリックされた
     */
    $ ('#conf_btn').on ('click', function() {
        init_form_color ();
        reset_error_contents();
        //入力チェック
        let error_flag = validate_check();
        if (error_flag == false) {
            //確認画面の表示
            set_conf_msg();
            $ ('.input_control').hide ();
            $ ('.conf_control').fadeIn ('fast');
            btn_toggle (2);
        }
        else {
            error_block_msg ("入力内容をご確認ください");
            $ ('.input_control').hide ();
            $ ('.conf_control').fadeIn ('fast');
            scroll_form_top ();
        }
    });
});

function set_error_contents (id, msg) {
    $ ("#" + id + "_error_msg").html (msg);
    $ ("#" + id + "_error_msg").fadeIn ('fast');
    $ ("#" + id).css ("background-color", input_error_color ? input_error_color:"#fff0f5");
}

function set_conf_contents (id) {
    $ ("#" + id + "_conf_msg").html (escape_html ($ ("#" + id).val ()));
    $ ("#" + id).css ("background-color", input_init_color ? input_init_color : "#fff");
}

function set_conf_contents_radio (id) {
    $ ("#" + id + "_conf_msg").html (escape_html ($ ("input[name='" + id + "']:checked").val ()));
    $ ("#" + id).css ("background-color", input_init_color ? input_init_color : "#fff");
}

function set_conf_contents_select (id) {
    $ ("#" + id + "_conf_msg").html (escape_html ($ ('[name=' + id + '] option:selected').val ()));
    $ ("#" + id).css ("background-color", input_init_color ? input_init_color : "#fff");
}

function reset_error_contents () {
    $ ('.error_msg').html ("");
    $ ("input[type='text']").css ("background-color", input_init_color ? input_init_color : "#fff");
    $ ("textarea").css ("background-color", input_init_color ? input_init_color : "#fff");
    $ ("select").css ("background-color", input_init_color ? input_init_color : "#fff");
}

function scroll_form_top (to_id = null) {
    let p = "";
    if (to_id) {
        p = $ ("#" + to_id).eq (-1).offset ().top;
    }
    else {
        p = 0
    }
    $ ('body,html').animate ({ scrollTop: p }, 500);
}

