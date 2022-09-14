<template>
  <div>
    <pagination
      :data="paginationData"
      :limit="2"
      :align="'center'"
      @pagination-change-page="changePaginationResults"
    >
      <span slot="prev-nav">&lt; 前へ</span>
      <span slot="next-nav">次へ &gt;</span>
    </pagination>
  </div>
</template>

<script>
import Vue from 'vue'

Vue.component('pagination', require('laravel-vue-pagination'))

export default {
  props: {
    paginationData: {
      type: Object,
      required: true,
      default: () => ({}),
    },
  },

  data: () => ({
    paginations: {},
  }),

  mounted() {
    this.paginations = this.paginationData
  },

  methods: {
    changePaginationResults(page) {
      this.$emit('getPaginationResults', page)
      // eslint-disable-next-line no-restricted-globals
      scrollTo(0, 0)
    },
  },
}
</script>

<style lang="scss" scoped>
li {
  list-style: none;
}
</style>
