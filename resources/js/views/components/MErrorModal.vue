<template>
  <MModalBase name="error-modal" :header-text="errorContentObj.headerText" size="middle">
    <template #content>
      <p class="css-test">{{ errorContentObj.message }}</p>
    </template>
    <template #buttons>
      <AButton label="閉じる" :color="BUTTON.COLOR.GRAY" width="96px" @onClick="$emit('onClose')" />
    </template>
  </MModalBase>
</template>

<script>
import AButton from '@/views/components/AButton.vue'
import MModalBase from '@/views/components/MModalBase.vue'

import BUTTON from '@/consts/button'

export default {
  components: {
    AButton,
    MModalBase,
  },

  props: {
    errorContentObj: {
      type: Object,
      required: false,
      default: () => ({}),
    },
  },

  data: () => ({
    BUTTON,
  }),
}
</script>

<style lang="scss" scoped>
.css-test {
  white-space: pre-wrap;
}
</style>
