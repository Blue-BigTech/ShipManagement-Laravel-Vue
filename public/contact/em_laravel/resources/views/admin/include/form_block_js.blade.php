<script>
  $ ( document ).ready ( function() {
    let select_choice_count = 0;
    let radio_choice_count  = 0;

    function all_hide () {
      $ ( ".select-input" ).addClass ( 'hide-input' );
      $ ( ".radio-input" ).addClass ( 'hide-input' );
      $ ( '.hide-input' ).hide ();
      $ ( '#radio_choice_wrap' ).html ( "" );
      $ ( '#select_choice_wrap' ).html ( "" );
      $ ( '.type_select_input' ).val ( "" );
    }

    $ ( '#form_type' ).on ( 'change', function() {
      all_hide ();
      if ( $ ( this ).val () == 'text' ||
        $ ( this ).val () == 'password' ||
        $ ( this ).val () == 'email' ||
        $ ( this ).val () == 'tel' ||
        $ ( this ).val () == 'url' ||
        $ ( this ).val () == 'number' ||
        $ ( this ).val () == 'textarea'
      ) {
        $ ( '.text-input' ).fadeIn ( 'fast' );
        $ ( '.init-tr' ).fadeIn ( 'fast' );
      }
      else if (
        $ ( this ).val () == 'date' ||
        $ ( this ).val () == 'datetime' ||
        $ ( this ).val () == 'month'
      ) {
        $ ( '.init-tr' ).fadeIn ( 'fast' );
      }
      else if ( $ ( this ).val () == 'select' || $ ( this ).val () == 'multi_select' ) {
        $ ( '.select-input' ).fadeIn ( 'fast' );
        $ ( '.init-tr' ).fadeIn ( 'fast' );
        add_select_choice_wrap ();
      }
      else if ( $ ( this ).val () == 'radio' || $ ( this ).val () == 'checkbox' ) {
        $ ( '.radio-input' ).fadeIn ( 'fast' );
        $ ( '.init-tr' ).fadeIn ( 'fast' );
        add_radio_choice_wrap ();
      }
      else if ( $ ( this ).val () == 'file' ) {
        $ ( '.file-input' ).fadeIn ( 'fast' );
        $ ( '.init-tr' ).fadeIn ( 'fast' );
      }
      else if ( $ ( this ).val () == 'zp_address' || $ ( this ).val () == 'first_last_name' ) {
        $ ( ".name_input" ).hide ();
        $ ( ".id_input" ).hide ();
        $ ( ".class_input" ).hide ();
      }
      else if( $ ( this ).val () == 'name_and_furigana') {
        $ ( ".name_input" ).hide ();
        $ ( ".id_input" ).hide ();
        $ ( ".class_input" ).hide ();
        $ ( '.restriction-input' ).fadeIn ( 'fast' );
      }
    } );

    $ ( '.add_select_choice_btn' ).on ( 'click', function() {
      add_select_choice_wrap ();
    } );
    $ ( '.add_radio_choice_btn' ).on ( 'click', function() {
      add_radio_choice_wrap ();
    } );

    $ ( document ).on ( 'click', '.trash_select_choice_btn', function() {
      $ ( this ).parent ().remove ();
      if ( select_choice_count > 0 ) select_choice_count--;
    } );

    $ ( document ).on ( 'click', '.trash_radio_choice_btn', function() {
      $ ( this ).parent ().remove ();
      if ( radio_choice_count > 0 ) radio_choice_count--;
    } );

    function add_select_choice_wrap () {
      let html = "<div class=\"row form-inline mb-1\">\n" +
        "<input type=\"text\" name=\"select_choice_label_text[]\" class=\"form-control type_select_input select_choice_label_text\" value=\"{{old('select_label_text"+select_choice_count+"')}}\">\n" +
        "<i class=\"far fa-trash-alt trash_select_choice_btn\"></i>" +
        "</div>\n";
      select_choice_count++;
      $ ( "#select_choice_wrap" ).append ( html );
    }

    function add_radio_choice_wrap () {
      let html = "<div class=\"row form-inline mb-1\">\n" +
        "<input type=\"text\" name=\"radio_choice_label_text[]\" class=\"form-control type_select_input radio_choice_label_text\" value=\"{{old('label_text"+radio_choice_count+"')}}\">\n" +
        "<div id=\"choice_image_place\"></div>\n" +
        "<input type=\"file\" name=\"choice_image[]\" class=\"form-control type_select_input\" accept=\".jpg,.png,.gif,image/jpeg\">\n" +
        "<i class=\"far fa-trash-alt trash_radio_choice_btn\"></i>" +
        "</div>\n";
      radio_choice_count++;
      $ ( "#radio_choice_wrap" ).append ( html );
    }

    function hankaku_zenkaku_show () {
      $ ( ".hankaku" ).fadeIn ( 'fast' );
      $ ( ".zenkaku" ).fadeIn ( 'fast' );
    }

    $ ( '#restriction' ).on ( 'change', function() {
      hankaku_zenkaku_show ();
      if (
        $ ( this ).val () == 'katakana' ||
        $ ( this ).val () == 'hiragana')
      {
        $ ( '.hankaku' ).hide ();
      }
      else if (
        $ ( this ).val () == 'num' ||
        $ ( this ).val () == 'alphabet_num' ||
        $ ( this ).val () == 'alphabet' ||
        $ ( this ).val () == 'alphabet_num_mix' ||
        $ ( this ).val () == 'num_hyphen' ||
        $ ( this ).val () == 'email' ||
        $ ( this ).val () == 'tel' ||
        $ ( this ).val () == 'tel_hyphen' ||
        $ ( this ).val () == 'zip' ||
        $ ( this ).val () == 'zip_hyphen'
      ) {
        $ ( '.zenkaku' ).hide ();
      }
    });

  } );
</script>
