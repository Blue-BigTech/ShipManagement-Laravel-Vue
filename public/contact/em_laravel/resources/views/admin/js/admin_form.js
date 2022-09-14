$ ( document ).ready ( function() {
  $ ( '.copy_btn' ).on ( 'click', function() {
    clip_board_copy ( $ ( this ).data ( "val" ) );
  } );

  function clip_board_copy ( val, top, left ) {
    let copyInput = $ ( "#copy_text" );
    copyInput.css ( 'display', 'block' );
    copyInput.val ( val );
    copyInput.focus ();
    copyInput.select ();
    document.execCommand ( 'Copy' );
    copyInput.css ( 'display', 'none' );

    $.blockUI ( {
      message: "Copied " + val,
      fadeIn: 200,
      fadeOut: 300,
      timeout: 500,
      showOverlay: false,
      centerY: false,
      css: {
        width: '70%',
        height: 'auto',
        top: '8px',
        left: '15%',
        color: "#fff",
        'padding': '8px',
        'background-color': "#202020",
        'border-color': "#fff",
        'border-width': "2px",
        '-webkit-border-radius': '3px',
        '-moz-border-radius': '3px',
        '-o-border-radius': '3px',
        '-ms-border-radius': '3px',
        'border-radius': '3px',
        'font-weight': "nomal",
        'font-size': "1rem",
        opacity: 0.7,
        cursor: 'default'
      }
    } );
  }
} );
