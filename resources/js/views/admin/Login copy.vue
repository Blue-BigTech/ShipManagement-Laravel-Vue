<template>
  <div
    class="container-login d-flex justify-content-center align-items-center"
    style="padding-right: 50px;"
  >
    <div class="card text-center w-50 h-80">
      <div class="card-body">
        <h5 class="card-title md-5">管理者用 ログイン</h5>
        <AInputForm id="user-id" v-model="form.login_id" label="ID" class="mb-4" />
        <AInputForm
          id="password"
          v-model="form.password"
          type="password"
          label="PASSWORD"
          class="mb-4"
        />
      </div>
      <p class="text-danger">{{ errorMessage }}</p>
      <div class="card-footer">
        <AButton label="ログイン" width="96px" :color="BUTTON.COLOR.MAIN_DARK" @onClick="onLogin" />
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex'

import AButton from '@/components/AButton.vue'
import AInputForm from '@/components/AInputForm.vue'

import BUTTON from '@/consts/button'
import ROUTE from '@/consts/route'

export default {
  components: {
    AButton,
    AInputForm,
  },

  data: () => ({
    BUTTON,
    form: {
      login_id: '',
      password: '',
    },
    errorMessage: '',
  }),

  methods: {
    ...mapActions('userModule', ['adminLogin']),

    async onLogin() {
      this.showLoader()
      await this.adminLogin(this.form)
        .then(() => {
          this.$router.push({ name: ROUTE.ADMIN.LENDER.LIST.name })
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
}
.card-footer {
  border-top: none !important;
}
</style>
