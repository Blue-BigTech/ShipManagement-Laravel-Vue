<template>
  <div class="container-login">
    <div class="title-page d-block text-center text-white">
      <h1 class="font-lg my-3">タイトル</h1>
    </div>
    <div class="bg-login bg d-flex justify-content-center align-items-center">
      <div class="form-login m-auto mt-5 text-center">
        <div class="title-content font-lg mb-4">貸舟業者 ログイン</div>
        <div class="mb-4">
          <AInputForm
            id="user-id"
            v-model="form.login_id"
            label="ID"
            placeholder="ログインIDを入力してください。"
          />
          <span v-if="errors && errors.login_id" class="error-message">{{
            errors.login_id[0]
          }}</span>
        </div>

        <div class="mb-4">
          <AInputForm
            id="password-2"
            v-model="form.password"
            label="パスワード"
            type="password"
            placeholder="パスワードを入力してください。"
            minlength="8"
            maxlength="16"
            :disabled="false"
            :is-display-password="true"
          />
          <span v-if="errors && errors.login_id" class="error-message">{{
            errors.login_id[0]
          }}</span>
        </div>

        <p class="text-danger">{{ errorMessage }}</p>
        <AButton
          id="btn-login"
          label="ログイン"
          width="100%"
          :color="BUTTON.COLOR.MAIN"
          :disabled="!form.login_id || !form.password"
          @onClick="onLogin"
        />
      </div>
    </div>
    <footer class="footer text-center text-white">
      <p class="mt-1 mb-0">フッター文言</p>
    </footer>
  </div>
</template>

<script>
import { mapActions } from 'vuex'

import AButton from '@/views/components/AButton.vue'
import AInputForm from '@/views/components/AInputForm.vue'

import BUTTON from '@/consts/button'
import ROUTE from '@/consts/route'

export default {
  components: {
    AInputForm,
    AButton,
  },

  data: () => ({
    BUTTON,
    form: {
      login_id: '',
      password: '',
    },
    errorMessage: '',
    errors: null,
    inputType: 'password',
  }),

  methods: {
    ...mapActions('userModule', ['lenderLogin']),

    async onLogin() {
      this.showLoader()
      await this.lenderLogin(this.form)
        .then(() => {
          this.$router.push({ name: ROUTE.LENDER.MY_PAGE.name })
        })
        .catch(e => {
          this.errorMessage = e.response.data.error_msg
        })
        .finally(() => {
          this.hideLoader()
        })
    },
  },
}
</script>

<style lang="scss" scoped>
.container-login {
  height: 100vh;
  display: flex;
  flex-direction: column;
  .title-page {
    position: fixed;
    top: 0;
    width: 100vw;
    z-index: 999;
    background: $Main;
  }
  .bg-login {
    width: 100%;
    height: 100%;
    .form-login {
      width: 75%;
      @include medium-min {
        width: 25%;
      }
      .title-content {
        font-weight: bold;
        color: $Main;
      }
      .form-outline {
        text-align: left;
        color: $Main;
        font-weight: 400;
        .password-display-mark {
          cursor: pointer;
          position: absolute;
          right: 3%;
          top: 50%;
          transform: translate(0, -50%);
          color: #212529;
        }
      }
    }
  }
}
.footer {
  background: $White;
  height: 30px;
  position: fixed;
  bottom: 0;
  width: 100vw;
  background: $Main;
}
// .bg {
//   background-image: url(/images/login-bg.jpg);
//   background-size: cover;
//   background-attachment: fixed;
//   background-repeat: no-repeat;
// }
</style>
