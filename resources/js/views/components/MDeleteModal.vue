<template>
  <MModalBase name="delete-modal" header-text="削除" size="middle">
    <template #content>
      <p>{{ targetName }} を削除してもよろしいですか？</p>
    </template>
    <template #buttons>
      <AButton
        label="キャンセル"
        :color="BUTTON.COLOR.GRAY"
        width="96px"
        @onClick="$emit('onCancel')"
      />
      <AButton
        label="削除"
        :color="BUTTON.COLOR.DANGER"
        width="96px"
        @onClick="$emit('onDelete')"
      />
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
    targetName: {
      type: String,
      required: true,
      default: '',
    },
  },

  data: () => ({
    BUTTON,
  }),
}
</script>
