<template>
  <div class="w-100 mx-auto px-5 py-3">
    <div class="header-area mb-1">
      <div class="header-area--title">{{ title }}</div>
    </div>

    <slot name="breadcrumb"></slot>

    <div class="text-right">
      <AButton
        v-if="(isEditing && isNew) || (!isEditing && !isNew && isDisplayBackBtn)"
        label="前のページへ戻る"
        width="156px"
        class="shadow"
        :color="BUTTON.COLOR.MAIN"
        @onClick="$emit('onBackList')"
      />
      <AButton
        v-if="!isEditing"
        label="編集"
        width="96px"
        class="shadow"
        :color="BUTTON.COLOR.MAIN_DARK"
        @onClick="$emit('onEdit')"
      />
      <AButton
        v-if="isEditing"
        :label="isNew ? '登録' : '更新'"
        width="96px"
        class="shadow"
        :color="BUTTON.COLOR.MAIN_DARK"
        @onClick="$emit('onSave')"
      />
      <AButton
        v-if="!isNew && !isEditing && isDisplayChangePasswordBtn"
        label="パスワード変更"
        width="128px"
        class="shadow"
        :color="BUTTON.COLOR.MAIN_DARK"
        @onClick="$emit('onChangePassword')"
      />
      <AButton
        v-if="!isNew && isEditing && isDisplayDeleteBtn"
        label="削除"
        width="96px"
        class="shadow"
        :color="BUTTON.COLOR.DANGER"
        @onClick="$emit('onDelete')"
      />
      <AButton
        v-if="!isNew && isEditing"
        label="キャンセル"
        width="96px"
        class="shadow"
        :color="BUTTON.COLOR.GRAY"
        @onClick="$emit('onCancel')"
      />
    </div>

    <slot name="content"></slot>
  </div>
</template>

<script>
import AButton from '@/views/components/AButton.vue'

import BUTTON from '@/consts/button'

export default {
  components: {
    AButton,
  },

  props: {
    title: {
      type: String,
      required: true,
      default: '',
    },
    isNew: {
      type: Boolean,
      required: true,
      default: false,
    },
    isEditing: {
      type: Boolean,
      required: true,
      default: false,
    },
    // ボタン表示
    isDisplayBackBtn: {
      type: Boolean,
      required: true,
      default: false,
    },
    isDisplayDeleteBtn: {
      type: Boolean,
      required: true,
      default: false,
    },
    isDisplayChangePasswordBtn: {
      type: Boolean,
      required: true,
      default: false,
    },
  },

  data: () => ({
    BUTTON,
  }),
}
</script>

<style lang="scss" scoped>
.header-area {
  border-bottom: 4px solid $Main;
}
</style>
