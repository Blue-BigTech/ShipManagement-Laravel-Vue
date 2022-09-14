/*!
 * EasyMail JavaScript Library
 * https://www.mubag.com/
 *
 * Copyright First net japan
 * Released under the MIT license
 * https://www.1st-net.jp
 *
 * Date: 2020-06-22
 */
;( function( $ ) {

  $.fn.emform = function( options ) {
    let elm = this;

    /***********************************************************************************
     *
     * option
     *
     * *********************************************************************************/
    let ops = $.extend ( {
      conf_btn_class: ".js_conf_btn",
      send_btn_class: ".js_send_btn",
      back_btn_class: ".js_back_btn",
      input_control_class: ".js_input_control",
      conf_control_class: ".js_conf_control",
      error_control_class: ".js_error_control",
      zip_class: ".js_zip",
      pref_class: ".js_pref",
      address_class: ".js_address",
      input_error_color: "#fff0f5",
      input_init_color: "#ffffff",
      form_item: null,
      file_limit_error_msg: "Check the file size.",
      file_extension_error_msg: "Check the file extension.",
      input_error_msg: "Error. Please confirm your entry.",
      top_error_msg_view_flag: true,
      scroll_to: "form", //10px、#hoge .f
      file_type_image_accept: "",
      file_type_video_accept: "",
      file_type_audio_accept: "",
      block: {
        width: '90%',
        height: 'auto',
        top: '10px',
        left: '5%',
        padding: '12px',
        color: "#dc143c",
        background_color: "#f8d7da",
        border_color: "#dc143c",
        border_width: "1px",
        border_radius: "3px",
        font_weight: "nomal",
        opacity: 1.0,
      },
    }, options );

    /***********************************************************************************
     *
     * method
     *
     * *********************************************************************************/
    let methods = {
      init: function() {
        methods.btn_toggle ( 1 );
        methods.init_form_color ();
        $ ( ops.conf_control_class ).hide ();
        $ ( ops.input_control_class ).show ();
        // methods.scroll_form_top ();
      },
      init_form_color: function() {
        $ ( 'input' ).css ( 'background-color', ops.input_init_color );
        $ ( 'textarea' ).css ( 'background-color', ops.input_init_color );
        $ ( 'select' ).css ( 'background-color', ops.input_init_color );
        $ ( '.err_msg' ).hide ();
        $ ( '.err_msg' ).html ( "" );
      },
      reset_error_contents: function() {
        $ ( '.err_msg' ).html ( "" );
        $ ( "input[type='text']" ).css ( "background-color", ops.input_init_color );
        $ ( "textarea" ).css ( "background-color", ops.input_init_color );
        $ ( "select" ).css ( "background-color", ops.input_init_color );
      },
      set_error_contents: function( name, message ) {
        $ ( "." + name + "_error_msg" ).html ( message );
        $ ( "." + name + "_error_msg" ).fadeIn ( 'fast' );
        $ ( 'input[name=' + name + ']' ).css ( "background-color", ops.input_error_color );
        $ ( 'select[name=' + name + ']' ).css ( "background-color", ops.input_error_color );
        $ ( 'textarea[name=' + name + ']' ).css ( "background-color", ops.input_error_color );
      },
      set_conf_msg: function() {
        $ ( ops.form_item ).each ( function( index, elem ) {
          if ( elem.form_type == "radio" ) {
            methods.set_conf_contents_radio ( elem.name );
          }
          else if ( elem.form_type == "checkbox" ) {
            methods.set_conf_contents_checkbox ( elem.name );
          }
          else if ( elem.form_type == "select" ) {
            methods.set_conf_contents_select ( elem.name );
          }
          else if ( elem.form_type == "multi_select" ) {
            methods.set_conf_contents_multi_select ( elem.name );
          }
          else if ( elem.form_type == "textarea" ) {
            methods.set_conf_contents_textarea ( elem.name );
          }
          else if ( elem.form_type == "zp_address" ) {
            methods.set_conf_contents_zp_address ( "zp_address" );
          }
          else if ( elem.form_type == "first_last_name" ) {
            methods.set_conf_contents_first_last_name ( "first_last_name" );
          }
          else {
            methods.set_conf_contents ( elem.name );
          }
        } );
        if ( $ ( elm ).find ( "input[name='your_name']" ).val ()  ) {
          methods.set_conf_contents_your_name ( "your_name" );
        }
        if ( $ ( elm ).find ( "input[name='name_and_furigana']" ).val ()  ) {
          methods.set_conf_contents_name_and_furigana ( "name_and_furigana" );
        }
      },
      set_conf_contents: function( name ) {
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( this.escape_html ( $ ( elm ).find ( "input[name='" + name + "']" ).val () ) );
        $ ( elm ).find ( "." + name ).css ( "background-color", ops.input_init_color ? ops.input_init_color : "#fff" );
      },
      set_conf_contents_radio: function( name ) {
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( this.escape_html ( $ ( elm ).find ( "input[name='" + name + "']:checked" ).val () ) );
        $ ( elm ).find ( "." + name ).css ( "background-color", ops.input_init_color ? ops.input_init_color : "#fff" );
      },
      set_conf_contents_checkbox: function( name ) {
        let content = "";
        $ ( elm ).find ( 'input[name="' + name + '[]"]' ).each ( function() {
          if ( $ ( this ).is ( ':checked' ) && $ ( this ).val () != "undefined" ) {
            content += $ ( this ).val () + " ";
          }
        } );
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( content );
      },
      set_conf_contents_select: function( name ) {
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( this.escape_html ( $ ( '[name=' + name + '] option:selected' ).val () ) );
        $ ( elm ).find ( "." + name ).css ( "background-color", ops.input_init_color ? ops.input_init_color : "#fff" );
      },
      set_conf_contents_multi_select: function( name ) {
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( this.escape_html ( $ ( '[name="' + name + '[]"]' ).val ().join ( ' ' ) ) );
        $ ( elm ).find ( "." + name ).css ( "background-color", ops.input_init_color ? ops.input_init_color : "#fff" );
      },
      set_conf_contents_textarea: function( name ) {
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( this.nl2br ( this.escape_html ( $ ( elm ).find ( "textarea[name='" + name + "']" ).val () ) ) );
        $ ( elm ).find ( "." + name ).css ( "background-color", ops.input_init_color ? ops.input_init_color : "#fff" );
      },
      set_conf_contents_zp_address: function( name ) {
        let content = "〒 " + this.escape_html ( $ ( elm ).find ( "input[name='zip']" ).val () ) + '<br>'
        content += this.escape_html ( $ ( elm ).find ( "select[name='pref']" ).val () );
        content += this.escape_html ( $ ( elm ).find ( "input[name='address']" ).val () );
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( content );
      },
      set_conf_contents_first_last_name: function( name ) {
        let content = $ ( elm ).find ( "input[name='last_name']" ).val () + $ ( elm ).find ( "input[name='first_name']" ).val ();
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( this.escape_html ( content ) );
      },
      set_conf_contents_your_name: function( name ) {
        $ ( elm ).find ( "." + name + "_conf_msg" ).html ( this.escape_html ( $ ( elm ).find ( "input[name='your_name']" ).val () ) );
        $ ( elm ).find ( "." + name ).css ( "background-color", ops.input_init_color ? ops.input_init_color : "#fff" );
      },
      set_conf_contents_name_and_furigana: function( ) {
        $ ( elm ).find ( ".name_and_furigana_conf_msg" ).html ( this.escape_html ( $ ( elm ).find ( "input[name='name_and_furigana']" ).val () ) );
        $ ( elm ).find ( ".name_and_furigana" ).css ( "background-color", ops.input_init_color ? ops.input_init_color : "#fff" );
      },
      btn_toggle: function( is_conf_show ) {
        if ( is_conf_show == 1 ) {
          $ ( ops.conf_btn_class ).show ();
          $ ( ops.send_btn_class ).hide ();
          $ ( ops.back_btn_class ).hide ();
        }
        else if ( is_conf_show == 2 ) {
          $ ( ops.conf_btn_class ).hide ();
          $ ( ops.send_btn_class ).show ();
          $ ( ops.back_btn_class ).show ();
        }
      },
      error_block_msg: function( msg ) {
        let error_msg = "";
        if ( !msg ) {
          error_msg = "<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>&nbsp;&nbsp;&nbsp;<span class='block_error_msg'>入力にエラーがあります</span><i class=\"fa fa-times block_error_msg_close_btn\" aria-hidden=\"true\" style='font-size: 2rem; float: right; cursor: pointer;'></i>"
        }
        else {
          error_msg = "<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>&nbsp;&nbsp;&nbsp;<span class='block_error_msg'>";
          error_msg += msg;
          error_msg += "</span><i class=\"fa fa-times block_error_msg_close_btn\" aria-hidden=\"true\" style='font-size: 2rem; float: right; cursor: pointer;'></i>";
        }

        $.blockUI ( {
          message: error_msg,
          fadeIn: 400,
          fadeOut: 700,
          timeout: 5000,
          showOverlay: false,
          centerY: false,
          css: {
            width: ops.block.width,
            height: ops.block.height,
            top: ops.block.top,
            left: ops.block.left,
            padding: ops.block.padding,
            backgroundColor: ops.block.background_color,
            'border-width': ops.block.border_width,
            'border-radius': ops.block.border_radius,
            'border-color': ops.block.border_color,
            '-webkit-border-radius': ops.block.border_radius,
            '-moz-border-radius': ops.block.border_radius,
            opacity: ops.block.opacity,
            color: ops.block.color,
            'font-weight': ops.block.font_weight,
            cursor: 'default'
          }
        } );

      },
      scroll_form_top: function() {
        let p = 0;
        if ( isNumeric ( ops.scroll_to ) ) {
          p = ops.scroll_to;
        }
        else if ( $ ( document ).find ( ops.scroll_to ).length && $ ( document ).find ( ops.scroll_to ).eq ( -1 ).offset ().top != "undefined" ) {
          p = $ ( document ).find ( ops.scroll_to ).eq ( -1 ).offset ().top;
        }
        $ ( 'body,html' ).animate ( { scrollTop: p }, 500 );
      },


      /******************************************************
       *
       * validation
       *
       *****************************************************/
      validate_check: function() {
        let ret = true;
        $.each ( ops.form_item, function( index, row ) {
          let required_error_msg             = row['required_error_msg'] ? row['required_error_msg'] : "field is required.";
          let restriction_error_msg          = row['restriction_error_msg'] ? row['restriction_error_msg'] : "Input restriction error";
          let re_enter_error_msg             = row['re_enter_error_msg'] ? row['re_enter_error_msg'] : "Inputs do not match.";
          let length_error_msg               = row['length_error_msg'] ? row['length_error_msg'] : "Input character limit error.";
          let forbidden_characters_error_msg = row['forbidden_characters_error_msg'] ? row['forbidden_characters_error_msg'] : "is Forbidden characters.";

          // 必須
          if ( row['required'] == 1 ) {
            if ( row['form_type'] == "text" ||
              row['form_type'] == "number" ||
              row['form_type'] == "email" ||
              row['form_type'] == "password" ||
              row['form_type'] == "search" ||
              row['form_type'] == "tel" ||
              row['form_type'] == "url" ||
              row['form_type'] == "datetime" ||
              row['form_type'] == "date" ||
              row['form_type'] == "month" ||
              row['form_type'] == "week" ||
              row['form_type'] == "time" ||
              row['form_type'] == "datetime-local" ||
              row['form_type'] == "color" ||
              row['form_type'] == "file"
            ) {
              if ( $ ( 'input[name=' + row['name'] + ']' ).val () == "" || $ ( 'input[name=' + row['name'] + ']' ).val () == 'undefined' ) {
                methods.set_error_contents ( row['name'], required_error_msg );
                ret = false;
              }
            }
            else if ( row['form_type'] == "textarea" ) {
              if ( $ ( 'textarea[name=' + row['name'] + ']' ).val () == "" || $ ( 'textarea[name=' + row['name'] + ']' ).val () == 'undefined' ) {
                methods.set_error_contents ( row['name'], required_error_msg );
                ret = false;
              }
            }
            else if ( row['form_type'] == "select" ) {
              if ( $ ( 'select[name=' + row['name'] + ']' ).val () == "" || $ ( 'select[name=' + row['name'] + ']' ).val () == 'undefined' ) {
                methods.set_error_contents ( row['name'], required_error_msg );
                ret = false;
              }
            }
            else if ( row['form_type'] == "multi_select" ) {
              if ( $ ( '[name="' + row['name'] + '[]"]' ).val () == "" || $ ( '[name="' + row['name'] + '[]"]' ).val () == 'undefined' ) {
                methods.set_error_contents ( row['name'], required_error_msg );
                ret = false;
              }
            }
            else if ( row['form_type'] == "zp_address" ) {
              if ( $ ( 'input[name=zip]' ).val () == "" || $ ( 'select[name=pref]' ).val () == "undefined" || $ ( 'select[name=pref]' ).val () == "" || $ ( 'input[name=address]' ).val () == "" ) {
                methods.set_error_contents ( "zp_address", required_error_msg );
                if ( $ ( 'input[name=zip]' ).val () == "" ) {
                  $ ( 'input[name=zip]' ).css ( "background-color", ops.input_error_color );
                }
                if ( $ ( 'select[name=pref]' ).val () == "" || $ ( 'select[name=pref]' ).val () == "undefined" ) {
                  $ ( 'select[name=pref]' ).css ( "background-color", ops.input_error_color );
                }
                if ( $ ( 'input[name=address]' ).val () == "" ) {
                  $ ( 'input[name=address]' ).css ( "background-color", ops.input_error_color );
                }
                ret = false;
              }
            }
            else if ( row['form_type'] == "first_last_name" ) {
              if ( $ ( 'input[name=last_name]' ).val () == "" || $ ( 'input[name=first_name]' ).val () == "" ) {
                methods.set_error_contents ( "first_last_name", required_error_msg );
                if ( $ ( 'input[name=last_name]' ).val () == "" ) {
                  $ ( 'input[name=last_name]' ).css ( "background-color", ops.input_error_color );
                }
                if ( $ ( 'input[name=first_name]' ).val () == "" ) {
                  $ ( 'input[name=first_name]' ).css ( "background-color", ops.input_error_color );
                }
                ret = false;
              }
            }
            else if ( row['form_type'] == "radio" ) {
              if ( !$ ( 'input[name=' + row['name'] + ']:checked' ).is ( ':checked' ) ) {
                methods.set_error_contents ( row['name'], required_error_msg );
                ret = false;
              }
            }
            else if ( row['form_type'] == "checkbox" ) {
              if ( !$ ( 'input[name="' + row['name'] + '[]"]' ).is ( ':checked' ) ) {
                methods.set_error_contents ( row['name'], required_error_msg );
                ret = false;
              }
            }
            else if ( row['name'] == "name_and_furigana" ) {
              if ( $ ( 'input[name=your_name]' ).val () == "" || $ ( 'input[name=your_name]' ).val () == 'undefined' ) {
                methods.set_error_contents ( "your_name", required_error_msg );
                ret = false;
              }
              if ( $ ( 'input[name=name_and_furigana]' ).val () == "" || $ ( 'input[name=name_and_furigana]' ).val () == 'undefined' ) {
                if ( row['restriction'] == "hiragana" ) {
                  methods.set_error_contents ( "name_and_furigana","ふりがなを入力してください" );
                }
                else
                {
                  methods.set_error_contents ( "name_and_furigana","フリガナを入力してください" );
                }
                ret = false;
              }
            }


          }

          // 入力制限
          // 全角カタカナ
          if ( row['restriction'] == "katakana" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isZenKatakana ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          //ひらがな
          else if ( row['restriction'] == "hiragana" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isHiragana ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isHiragana ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          //半角数字
          else if ( row['restriction'] == "num" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isNumeric ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isNumeric ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // 半角英数
          else if ( row['restriction'] == "alphabet_num" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isAlphabetNumeric ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isAlphabetNumeric ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // 半角英字
          else if ( row['restriction'] == "alphabet" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isAlphabet ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isAlphabet ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // 半角英数を混在
          else if ( row['restriction'] == "alphabet_num_mix" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isAlphabetNumericMix ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isAlphabetNumericMix ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // 半角数字か半角ハイフンのみ
          else if ( row['restriction'] == "num_hyphen" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isNumHyphen ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isNumHyphen ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // メールアドレス
          else if ( row['restriction'] == "email" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isMailAddress ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isMailAddress ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // 電話番号09000000000
          else if ( row['restriction'] == "tel" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isTelNumber ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isTelNumber ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // 電話番号090-0000-0000
          else if ( row['restriction'] == "tel_hyphen" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isHyphenTelNumber ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isHyphenTelNumber ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // 郵便番号1234567
          else if ( row['restriction'] == "zip" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isZipCode ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isZipCode ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }
          // 郵便番号123-4567
          else if ( row['restriction'] == "zip_hyphen" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () && !isHyphenZipCode ( $ ( 'input[name=' + row['name'] + ']' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () && !isHyphenZipCode ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) ) {
              methods.set_error_contents ( row['name'], restriction_error_msg );
              ret = false;
            }
          }

          //ファイル
          if ( row['form_type'] == "file" ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () ) {
              //ファイルアップロードの容量
              if ( row['file_capacity_limit'] > 0 ) {
                if ( $ ( 'input[name=' + row['name'] + ']' )[0].files[0].size / 1024 > row['file_capacity_limit'] ) {
                  methods.set_error_contents ( row['name'], ops.file_limit_error_msg + Math.round ( $ ( 'input[name=' + row['name'] + ']' )[0].files[0].size / 102400 ) / 10 + "MB" + "&nbsp;（制限&nbsp;" + row['file_capacity_limit'] / 1024 + "MB）" );
                  ret = false;
                }
              }
              //ファイルアップロードの拡張子
              if ( row['file_type'] ) {
                let ext_ar           = $ ( 'input[name=' + row['name'] + ']' ).val ().split ( "." ).reverse ();
                let ext              = ext_ar[0];
                ext                  = "." + ext;
                let is_file_ext_vali = false;

                if ( row['file_type'].indexOf ( "video/*" ) !== -1 && ops.file_type_video_accept.indexOf ( ext ) !== -1 ) {
                  is_file_ext_vali = true;
                  console.log ( 'video true' );
                }
                if ( row['file_type'].indexOf ( "image/*" ) !== -1 && ops.file_type_image_accept.indexOf ( ext ) !== -1 ) {
                  is_file_ext_vali = true;
                  console.log ( 'image true' );
                }
                if ( row['file_type'].indexOf ( "audio/*" ) !== -1 && ops.file_type_audio_accept.indexOf ( ext ) !== -1 ) {
                  is_file_ext_vali = true;
                  console.log ( 'audio true' );
                }
                let file_type = row['file_type'].split ( "," );

                $.each ( file_type, function( i, val ) {
                  if ( val.indexOf ( ext ) !== -1 ) {
                    is_file_ext_vali = true;
                    console.log ( 'file_type_extension' );
                  }
                } );
                console.log ( is_file_ext_vali );
                if ( is_file_ext_vali == false ) {
                  methods.set_error_contents ( row['name'], ops.file_extension_error_msg );
                  ret = false;
                }
              }
            }
          }

          // 再入力チェック
          if ( row['re_enter_html_id'] != "" && row['re_enter_html_id'] != null ) {
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () != $ ( '#' + row['re_enter_html_id'] ).val () ) {
              methods.set_error_contents ( row['name'], re_enter_error_msg );
              ret = false;
            }
          }
          //最小文字数,最大文字数の制限
          if ( ( row['min_length'] != "" && row['min_length'] != null && row['min_length'] > 0 ) && ( row['max_length'] != "" && row['max_length'] != null && row['max_length'] > 0 ) ) {
            let input_val = 0;
            if ( $ ( 'input[name=' + row['name'] + ']' ).val () ) {
              input_val = strLength ( $ ( 'input[name=' + row['name'] + ']' ).val () );
            }
            if ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) {
              input_val = strLength ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () );
            }

            if ( input_val < row['min_length'] || input_val > row['max_length'] ) {
              methods.set_error_contents ( row['name'], length_error_msg );
              ret = false;
            }
          }
          //最小文字数の制限
          else if ( row['min_length'] != "" && row['min_length'] != null && row['min_length'] > 0 ) {
            if ( strLength ( $ ( 'input[name=' + row['name'] + ']' ).val () ) < row['min_length'] ) {
              methods.set_error_contents ( row['name'], length_error_msg );
              ret = false;
            }
            if ( strLength ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) < row['min_length'] ) {
              methods.set_error_contents ( row['name'], length_error_msg );
              ret = false;
            }
          }
          //最大文字数の制限
          else if ( row['max_length'] != "" && row['max_length'] != null && row['max_length'] > 0 ) {
            if ( strLength ( $ ( 'input[name=' + row['name'] + ']' ).val () ) > row['max_length'] ) {
              methods.set_error_contents ( row['name'], length_error_msg );
              ret = false;
            }
            if ( strLength ( $ ( 'textarea[name="' + row['name'] + '"]' ).val () ) > row['max_length'] ) {
              methods.set_error_contents ( row['name'], length_error_msg );
              ret = false;
            }
          }
          //禁止文字の入力制限
          else if ( row['forbidden_characters'] != "" && row['forbidden_characters'] != null ) {
            let forbidden = row['forbidden_characters'];
            let str       = "";
            if ( row['form_type'] == "text" || row['form_type'] == "password" || row['form_type'] == "tel" || row['form_type'] == "url" ) {
              str = $ ( 'input[name=' + row['name'] + ']' ).val ();
            }
            else if ( row['form_type'] == "textarea" ) {
              str = $ ( 'textarea[name="' + row['name'] + '"]' ).val ();
            }
            if ( str != undefined && str != "" ) {
              let forbidden_ar = forbidden.split ( "," );
              let flag         = false;
              $.each ( forbidden_ar, function( i, val ) {
                if ( str.indexOf ( val ) !== -1 ) {
                  methods.set_error_contents ( row['name'], val + forbidden_characters_error_msg );
                  ret = false;
                }
              } );
            }
          }

        } );

        return ret;
      },
      escape_html: function( string ) {
        if ( typeof string !== 'string' ) {
          return string;
        }
        return string.replace ( /[&'`"<>]/g, function( match ) {
          return {
            '&': '&amp;',
            "'": '&#x27;',
            '`': '&#x60;',
            '"': '&quot;',
            '<': '&lt;',
            '>': '&gt;',
          }[match]
        } );
      },
      nl2br: function( str ) {
        if ( !str ) return;
        return str.replace ( /[\n\r]/g, "<br />" );
      }

    };

    if ( $ ( ops.zip_class ).length ) {
      $ ( ops.zip_class ).jpostal ( {
        postcode: [
          ops.zip_class
        ],
        address: {
          '.js_pref': '%3',
          '.js_address': '%4%5',
        }
      } );
    }

    $.each ( ops.form_item, function( index, row ) {
      function toHankaku(input) {
        return input.replace(/[Ａ-Ｚａ-ｚ０-９！＂＃＄％＆＇（）＊＋，－．／：；＜＝＞？＠［＼］＾＿｀｛｜｝]/g,
          function(input){
            return String.fromCharCode(input.charCodeAt(0)-0xFEE0);
          }
        )
        .replace(/[‐ー―]/g, "-")
        .replace(/[～〜]/g, "~")
        .replace(/　/g, " ");
      };
      function toZenkaku(input) {
        function hankana2Zenkana(input) {
          let kanaMap = {
              'ｶﾞ': 'ガ', 'ｷﾞ': 'ギ', 'ｸﾞ': 'グ', 'ｹﾞ': 'ゲ', 'ｺﾞ': 'ゴ',
              'ｻﾞ': 'ザ', 'ｼﾞ': 'ジ', 'ｽﾞ': 'ズ', 'ｾﾞ': 'ゼ', 'ｿﾞ': 'ゾ',
              'ﾀﾞ': 'ダ', 'ﾁﾞ': 'ヂ', 'ﾂﾞ': 'ヅ', 'ﾃﾞ': 'デ', 'ﾄﾞ': 'ド',
              'ﾊﾞ': 'バ', 'ﾋﾞ': 'ビ', 'ﾌﾞ': 'ブ', 'ﾍﾞ': 'ベ', 'ﾎﾞ': 'ボ',
              'ﾊﾟ': 'パ', 'ﾋﾟ': 'ピ', 'ﾌﾟ': 'プ', 'ﾍﾟ': 'ペ', 'ﾎﾟ': 'ポ',
              'ｳﾞ': 'ヴ', 'ﾜﾞ': 'ヷ', 'ｦﾞ': 'ヺ',
              'ｱ': 'ア', 'ｲ': 'イ', 'ｳ': 'ウ', 'ｴ': 'エ', 'ｵ': 'オ',
              'ｶ': 'カ', 'ｷ': 'キ', 'ｸ': 'ク', 'ｹ': 'ケ', 'ｺ': 'コ',
              'ｻ': 'サ', 'ｼ': 'シ', 'ｽ': 'ス', 'ｾ': 'セ', 'ｿ': 'ソ',
              'ﾀ': 'タ', 'ﾁ': 'チ', 'ﾂ': 'ツ', 'ﾃ': 'テ', 'ﾄ': 'ト',
              'ﾅ': 'ナ', 'ﾆ': 'ニ', 'ﾇ': 'ヌ', 'ﾈ': 'ネ', 'ﾉ': 'ノ',
              'ﾊ': 'ハ', 'ﾋ': 'ヒ', 'ﾌ': 'フ', 'ﾍ': 'ヘ', 'ﾎ': 'ホ',
              'ﾏ': 'マ', 'ﾐ': 'ミ', 'ﾑ': 'ム', 'ﾒ': 'メ', 'ﾓ': 'モ',
              'ﾔ': 'ヤ', 'ﾕ': 'ユ', 'ﾖ': 'ヨ',
              'ﾗ': 'ラ', 'ﾘ': 'リ', 'ﾙ': 'ル', 'ﾚ': 'レ', 'ﾛ': 'ロ',
              'ﾜ': 'ワ', 'ｦ': 'ヲ', 'ﾝ': 'ン',
              'ｧ': 'ァ', 'ｨ': 'ィ', 'ｩ': 'ゥ', 'ｪ': 'ェ', 'ｫ': 'ォ',
              'ｯ': 'ッ', 'ｬ': 'ャ', 'ｭ': 'ュ', 'ｮ': 'ョ',
              '｡': '。', '､': '、', 'ｰ': 'ー', '｢': '「', '｣': '」', '･': '・'
          };

          let reg = new RegExp('(' + Object.keys(kanaMap).join('|') + ')', 'g');
          return input
            .replace(reg, function (match) {
              return kanaMap[match];
            })
            .replace(/ﾞ/g, '゛')
            .replace(/ﾟ/g, '゜');
        };
        return hankana2Zenkana(input
          .replace(/[A-Za-z0-9!"#$%&'()*+,-./:;<=>?@[\]^_`{|}]/g,function(input){ return String.fromCharCode(input.charCodeAt(0)+0xFEE0);})
          .replace(/-/g, "－")
          .replace(/~/g, "～")
          .replace(/ /g, "　"));
      };

      if ( row['form_type'] == "text" || row['form_type'] == "password" || row['form_type'] == "tel" || row['form_type'] == "url") {
        if( row['hankaku_zenkaku_automatic_conversion'] === "hankaku") {
          $( 'input[name=' + row['name'] + ']' ).on('input',function(){
            $(this).val(toHankaku($(this).val()));
          });
        }
        if( row['hankaku_zenkaku_automatic_conversion'] === "zenkaku") {
          $( 'input[name=' + row['name'] + ']' ).on('input',function(){
            $(this).val(toZenkaku($(this).val()));
          });
        }
      }
    });



    /***********************************************************************************
     *
     * event
     *
     * *********************************************************************************/

    /**
     * 戻るボタンがクリックされた
     */
    $ ( ops.back_btn_class ).on ( 'click', function() {
      methods.init ();
      methods.scroll_form_top ();
      return false;
    } );

    /**
     * 送信ボタンがクリックされた
     */
    $ ( ops.send_btn_class ).on ( 'click', function() {
      $ ( elm ).submit ();
    } );

    /**
     * 確認ボタンがクリックされた
     */
    $ ( ops.conf_btn_class ).on ( 'click', function() {
      methods.init_form_color ();
      methods.reset_error_contents ();
      //入力チェック
      let validate_check = methods.validate_check ();
      if ( validate_check == true ) {
        //確認画面の表示
        methods.set_conf_msg ();
        $ ( ops.input_control_class ).hide ();
        $ ( ops.error_control_class ).hide ();
        $ ( ops.conf_control_class ).show ();
        $ ( ".conf_msg" ).each ( function() {
          $ ( this ).html () != "" ? $ ( this ).show () : $ ( this ).hide ();
        } );
        methods.scroll_form_top ();
        methods.btn_toggle ( 2 );
      }
      else if ( validate_check == false ) {
        // エラー画面の表示
        if ( ops.top_error_msg_view_flag === true ) {
          methods.error_block_msg ( ops.input_error_msg );
        }
        $ ( ops.input_control_class ).show ();
        $ ( ops.error_control_class ).show ();
        $ ( ops.conf_control_class ).hide ();
        $ ( ".err_msg" ).each ( function() {
          $ ( this ).html () != "" ? $ ( this ).show () : $ ( this ).hide ();
        } );
        methods.scroll_form_top ();
        methods.btn_toggle ( 1 );
      }
      // return false;
    } );

    $ ( ops.error_control_class ).hide ();
    $ ( ops.conf_control_class ).hide ();

    if ( methods[options] ) {
      return methods[options].apply ( this, Array.prototype.slice.call ( arguments, 1 ) );
    }
    else if ( typeof options === 'object' || !options ) {
      return methods.init.apply ( this, arguments );
    }
    else {
      $.error ( 'Method ' + options + ' does not exist on jQuery.easymail' );
    }

    return this;
  };
} ) ( jQuery )
