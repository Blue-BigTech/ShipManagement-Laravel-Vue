<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $ ( document ).ready ( function() {
    $ ( '#editor' ).summernote ( {
      // height: 450,
      // fontSizeUnits: [ 'rem' ],
      // fontSizes: [ '0.8', '0.9', '1.0', '1.2', '1.4', '1.6', '1.8', '2', '2.4', '2.8', '3.2', '3.6', '4.0', '5.0' ],
      toolbar: [
        [ 'style', [ 'style', 'bold', 'italic', 'underline', 'clear' ] ],
        [ 'font', [ 'strikethrough' ] ],
        [ 'fontsize', [ 'fontsize' ] ],
        [ 'height', [ 'height' ] ],
        [ 'color', [ 'color' ] ],
        [ 'table', [ 'table' ] ],
        [ 'insert', [ 'link', 'picture', 'video' ] ],
        [ 'para', [ 'ul', 'ol', 'paragraph' ] ],
        [ 'view', [ 'codeview' ] ],
      ],
    } );
    $ ( '#editor2' ).summernote ( {
      // height: 450,
      // fontSizeUnits: [ 'rem' ],
      // fontSizes: [ '0.8', '0.9', '1.0', '1.2', '1.4', '1.6', '1.8', '2', '2.4', '2.8', '3.2', '3.6', '4.0', '5.0' ],
      toolbar: [
        [ 'style', [ 'style', 'bold', 'italic', 'underline', 'clear' ] ],
        [ 'font', [ 'strikethrough' ] ],
        [ 'fontsize', [ 'fontsize' ] ],
        [ 'height', [ 'height' ] ],
        [ 'color', [ 'color' ] ],
        [ 'table', [ 'table' ] ],
        [ 'insert', [ 'link', 'picture', 'video' ] ],
        [ 'para', [ 'ul', 'ol', 'paragraph' ] ],
        [ 'view', [ 'codeview' ] ],
      ],
    } );
  } );
</script>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/include/editor.blade.php ENDPATH**/ ?>