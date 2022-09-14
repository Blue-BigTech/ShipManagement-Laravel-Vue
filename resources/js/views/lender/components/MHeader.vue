<template>
  <header class="header-lender">
    <div class="header-logo" @click="onToMyPage">
      <img src="/images/lender/logo_search.svg" alt="遊漁船サーチ" />
    </div>
    <div class="header-title">
      {{ title }}
    </div>
    <div class="header-login">
      <div @click="onLogout">業者ログアウト</div>
    </div>
  </header>
</template>
<script>
import { mapState, mapActions } from 'vuex'
import ROUTE from '@/consts/route'

export default {
  props: {
    title: {
      type: String,
      required: false,
      default: '',
    },
  },

  computed: {
    ...mapState('userModule', ['lenderUser']),
  },

  methods: {
    ...mapActions('userModule', ['logout']),
    async onLogout() {
      this.showLoader()
      this.logout(this.lenderUser.id)
        .then(() => {
          this.$router.push({ name: ROUTE.LENDER.LOGIN.name })
        })
        .catch(() => {
          this.$toast.errorToast()
        })
        .finally(() => {
          this.hideLoader()
        })
    },
    onToMyPage() {
      this.$router.push({
        name: ROUTE.LENDER.MY_PAGE.name,
      })
    },
  },
}
</script>
