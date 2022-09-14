<template>
  <button
    @click="submit"
    type="submit"
    form="post_form"
    v-if="confirmMode"
    class="formBtns__btn solid submitarea js_send_btn"
  >
  {{ sendBtn }}
  </button>
</template>

<script>
export default {
  props: {
    form: {
      type: Object,
    },
    confirmMode: {
      type: Boolean,
    },
    sendBtn: {
      type: String,
    },
  },
  // 送信ボタン
  methods: {
    submit() {
      window.onbeforeunload = null;
      const form            = this.form;
      if ( form.google_re_captcha_site_key ) {
        e.preventDefault ();
        grecaptcha.ready ( function() {
          grecaptcha.execute ( form.google_re_captcha_site_key, {
            action: 'easy_mail_send'
          } ).then ( function( token ) {
            document.getElementById ( "g-recaptcha-token" ).value = token;
            document.main_form.submit();
          } );
        }, false );
      }

      // 二重送信を防止
      let elements = this.elements;
      for (let i = 0; i < elements.length; i++) {
        if (elements[i].type == "submit") {
          // type属性値がsubmitの場合
          elements[i].disabled = true; // disabledにする
        }
      }
      // フォーム送信などの処理完了後、以下のリセットを呼び出す。
      requestAnimationFrame(() => {
        this.$refs.observer.reset();
      });
    },
  },
};
</script>
