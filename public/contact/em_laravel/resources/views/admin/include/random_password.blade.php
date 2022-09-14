<script>
  $ ( document ).ready ( function() {
    function genRandomStr() {
      // 使用する文字の定義
      let str = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789_";
      // 桁数の定義
      let len = 32;

      let result = "";
      for (let i=0; i<len; i++) {
          result += str.charAt(Math.floor(Math.random() * str.length));
      }
      $('#random_pass').val(result);
    }

    //最初から入力欄に記載しておく
    genRandomStr();

    $('#auto_pass').on("click",function(){
      genRandomStr();
    });

  } );
</script>
