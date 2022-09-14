<template>
  <nav id="NaviMenu" class="navi collapse navbar-collapse">
    <div class="navi-inner">
      <div class="header">
        <div class="header-menu">
          <router-link
            to="#"
            class="header-menu-button"
            data-toggle="collapse"
            data-target="#NaviMenu"
            ><img src="/images/common/icon_menu_white.svg"
          /></router-link>
        </div>
        <div class="header-logo">
          <img src="/images/common/logo_search_white.svg" />
        </div>
        <div class="header-login">
          <router-link :to="ROUTE.LENDER.LOGIN.path">業者ログイン</router-link>
        </div>
      </div>
      <ul class="navbar-nav">
        <li class="navi-item nav-item">
          <router-link :to="ROUTE.VIEWER.ABOUT.path" class="nav-link">遊漁船サーチとは</router-link>
        </li>
        <li class="navi-item nav-item">
          <router-link to="#" class="nav-link">遊漁船を探す</router-link>
        </li>
        <li class="navi-item nav-item">
          <a :href="ROUTE_HTML.BOOK" class="nav-link">船釣りの始め方</a>
        </li>
        <li class="navi-item nav-item">
          <a :href="ROUTE_HTML.CALL" class="nav-link">予約電話のコツ</a>
        </li>
        <li class="navi-item nav-item">
          <a :href="ROUTE_HTML.TO_LENDER" class="nav-link">業者様へ</a>
        </li>
        <li class="navi-item nav-item">
          <a :href="ROUTE_HTML.FAQ" class="nav-link">よくある質問</a>
        </li>
        <li class="navi-item nav-item">
          <a :href="ROUTE_HTML.COMPANY" class="nav-link">運営会社</a>
        </li>
        <li class="navi-item nav-item">
          <a :href="ROUTE_HTML.CONTACT" class="nav-link">お問合せ</a>
        </li>
      </ul>
    </div>
  </nav>
</template>
<script>
import ROUTE from '@/consts/route'
import ROUTE_HTML from '@/consts/routePHP'

export default {
  data: () => ({
    ROUTE,
    ROUTE_HTML,
  }),
}
</script>
