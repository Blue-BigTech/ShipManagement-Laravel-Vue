<template>
  <div class="top-nav d-flex justify-content-between align-items-center px-4">
    <div>{{ adminUser ? `${adminUser.name} 様` : '' }}</div>
    <div class="">
      <AButton
        label="ログアウト"
        width="96px"
        :color="BUTTON.COLOR.MAIN_DARK"
        @onClick="onLogout"
      />
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'

import AButton from '@/views/components/AButton.vue'

import BUTTON from '@/consts/button'
import ROUTE from '@/consts/route'

export default {
  components: {
    AButton,
  },

  data: () => ({
    BUTTON,
  }),

  computed: {
    ...mapState('userModule', ['adminUser']),
  },

  methods: {
    ...mapActions('userModule', ['logout']),

    async onLogout() {
      this.showLoader()
      this.logout(this.adminUser.id)
        .then(() => {
          this.$router.push({ name: ROUTE.ADMIN.LOGIN.name })
        })
        .catch(() => {
          this.$toast.errorToast()
        })
        .finally(() => {
          this.hideLoader()
        })
    },
  },
}
</script>

<style lang="scss" scoped>
.top-nav {
  height: 55px;
  width: 100%;
  background-color: $Main;
  color: #ffff;
}
</style>
