<template>
  <!-- !collapsed: サイドメニューが開いてる -->
  <!-- collapsed: サイドメニューが開いてない -->
  <div
    :class="[{ collapsed: !collapsed }]"
    :style="
      !collapsed
        ? 'padding-left: 350px;'
        : collapsed && !isLoginPage
        ? 'padding-left: 50px;'
        : 'padding-left: 0px'
    "
  >
    <!-- パス取得方法念のためにおいておく -->
    <!-- {{ thisPage }}/{{ this.$route.fullPath }} -->
    <sidebar-menu
      v-if="isAdminLogin"
      :menu="menu"
      :collapsed="collapsed"
      :show-one-child="true"
      @toggle-collapse="onToggleCollapse"
    />
    <ONavbar v-if="isAdminLogin" />

    <RouterView />
  </div>
</template>

<script>
import { mapGetters, mapActions, mapState } from 'vuex'

import { SidebarMenu } from 'vue-sidebar-menu'

import ONavbar from '@/views/admin/components/ONavbar.vue'

import ROUTE from '@/consts/route'
import ROLE from '@/consts/role'

export default {
  components: {
    SidebarMenu,
    ONavbar,
  },

  data: () => ({
    ROLE,
    ROUTE,
    collapsed: true,
    thisPage: null,
    menu: [
      {
        header: true,
        title: 'Main Navigation',
        hiddenOnCollapse: true,
      },
      {
        href: ROUTE.ADMIN.LENDER.LIST.path,
        title: '貸舟業者一覧',
        icon: 'fa fa-user',
      },
      {
        href: ROUTE.ADMIN.PREFECTURE.LIST.path,
        title: '都道府県一覧',
        icon: 'fa fa-globe-asia',
      },
      {
        href: ROUTE.ADMIN.CITY.LIST.path,
        title: '市町村一覧',
        icon: 'fa fa-archway',
      },
      {
        href: ROUTE.ADMIN.PORT.LIST.path,
        title: '港一覧',
        icon: 'fa fa-ship',
      },
    ],
  }),

  computed: {
    ...mapGetters('userModule', ['isLogin', 'isAdminLogin']),
    ...mapState('userModule', ['isLoginPage']),
  },

  methods: {
    ...mapActions('userModule', ['adminLogout']),

    onToggleCollapse(collapsed) {
      this.collapsed = collapsed
    },
  },
}
</script>
