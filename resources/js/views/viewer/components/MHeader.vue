<template>
  <header class="header">
    <div class="header-menu">
      <a href="#" class="header-menu-button" data-toggle="collapse" data-target="#NaviMenu"
        ><img src="/images/common/icon_menu.svg"
      /></a>
    </div>
    <div class="header-logo">
      <img src="/images/common/logo_search.svg" alt="遊漁船サーチ" />
    </div>
    <div class="header-login">
      <router-link :to="ROUTE.LENDER.LOGIN.path">業者ログイン</router-link>
    </div>
  </header>
</template>
<script>
import ROUTE from '@/consts/route'

export default {
  data() {
    return {
      ROUTE,
    }
  },
}
</script>
