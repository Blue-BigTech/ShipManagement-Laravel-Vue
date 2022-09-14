<template>
  <div class="p-5 text-center text-white box">
    <i :class="icon"></i>
    <p>{{ title }}</p>
    <div v-if="label" class="box__label">{{ label }}</div>
  </div>
</template>

<script>
export default {
  props: {
    icon: {
      type: String,
      required: true,
      default: '',
    },
    title: {
      type: String,
      required: true,
      default: '',
    },
    label: {
      type: String,
      required: false,
      default: '',
    },
  },
}
</script>

<style lang="scss" scoped>
.box {
  background: $Main;
  width: 32%;
  max-height: 32%;
  border-radius: 5px;
  cursor: pointer;
  font-size: 20px;

  &__label {
    background: $MainDark;
    font-size: 11px;
  }
}
</style>
