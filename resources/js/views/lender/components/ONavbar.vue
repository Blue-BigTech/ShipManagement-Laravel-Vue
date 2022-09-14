<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <router-link
        v-for="(m, i) in menu"
        :key="i"
        data-toggle="dropdown"
        class="dropdown-item pl-adj"
        :to="{ name: m.routeName, params: m.params }"
        @click.native="active = !active"
        ><i class="mr-3 icon" :class="m.icon"></i>{{ m.name }}</router-link
      >
      <form class="form-inline my-2 my-lg-0">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</template>

<script>
import ROUTE from '@/consts/route'

export default {
  props: {},
  data: () => ({
    active: false,
    menu: [
      {
        name: 'マイページ',
        routeName: ROUTE.LENDER.MY_PAGE.name,
        icon: 'fas fa-home',
      },
      {
        name: '基本情報',
        routeName: ROUTE.LENDER.BASIC_INFO.name,
        icon: 'fas fa-home',
      },
      {
        name: '釣果情報',
        routeName: ROUTE.LENDER.POST.name,
        icon: 'fas fa-home',
      },
    ],
  }),

  computed: {},

  methods: {},
}
</script>

<style lang="scss" scoped></style>
