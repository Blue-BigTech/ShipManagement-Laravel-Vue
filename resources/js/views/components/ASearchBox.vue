<template>
  <div class="input-group md-form col-sm-12 col-md-5 p-0">
    <input
      v-model="keyword"
      class="form-control"
      type="text"
      :placeholder="placeholder"
      aria-label="Search"
    />
    <div class="input-group-append">
      <button class="btn btn-search m-0 px-3 py-2" type="button" @click="onSearch">
        <i class="fas fa-search" aria-hidden="true"></i>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    placeholder: {
      type: String,
      required: false,
      default: '',
    },
  },

  data: () => ({
    keyword: '',
  }),

  methods: {
    onSearch() {
      this.$emit('search', this.keyword)
    },
  },
}
</script>
<style lang="scss" scoped>
.btn-search {
  background-color: $MainDark;
  color: white;
}
</style>
