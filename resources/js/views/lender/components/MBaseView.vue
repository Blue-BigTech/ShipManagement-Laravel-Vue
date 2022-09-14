<template>
  <div class="w-100 mx-auto">
    <div class="header-area mb-1">
      <div class="header-area--title"></div>
    </div>

    <slot name="breadcrumb"></slot>

    <slot name="content"></slot>
  </div>
</template>

<script>
// import BUTTON from '@/consts/button'

export default {
  // components: {},

  data: () => ({
    // BUTTON,
  }),
}
</script>

<style lang="scss" scoped></style>
