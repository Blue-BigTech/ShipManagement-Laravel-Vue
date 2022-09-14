<template>
  <div class="w-100 mx-auto px-5 py-3">
    <div class="header-area mb-1">
      <div class="header-area--title">{{ title }}</div>
    </div>

    <slot name="breadcrumb"></slot>

    <slot name="search"></slot>

    <div class="d-flex justify-content-between my-4">
      <!-- フェーズ2以降で使うので残しておく 2022/6/5 -->
      <!-- <div>
        全<span class="px-2 mx-1 total-count">{{ paginationData.total }}</span
        >件
      </div> -->
      <div>
        <AButton
          v-if="isNeedRegisterBtn"
          label="登録する"
          class="shadow"
          width="128px"
          :color="BUTTON.COLOR.MAIN_DARK"
          @onClick="$emit('onRegister')"
        />
        <AButton
          v-if="isNeedCsvImport"
          label="CSVインポート"
          class="shadow"
          width="128px"
          :color="BUTTON.COLOR.PRIMARY"
          @onClick="$emit('onCsvImport')"
        />
        <AButton
          v-if="isNeedCsvExport"
          label="CSVエクスポート"
          class="shadow"
          width="128px"
          :color="BUTTON.COLOR.PRIMARY"
          @onClick="$emit('onCsvExport')"
        />
      </div>
    </div>

    <slot name="content"></slot>

    <MPagination :pagination-data="paginationData" @getPaginationResults="getPaginationResults" />
  </div>
</template>

<script>
import AButton from '@/views/components/AButton.vue'
import MPagination from '@/views/components/MPagination.vue'

// const
import BUTTON from '@/consts/button'
import { ja } from 'vuejs-datepicker/dist/locale'

export default {
  components: {
    AButton,
    MPagination,
  },

  props: {
    title: {
      type: String,
      required: true,
      default: '',
    },
    totalRecordCount: {
      type: Number,
      required: false,
      default: 0,
    },
    paginationData: {
      type: Object,
      required: false,
      default: () => {},
    },
    // ボタン必要の有無
    isNeedRegisterBtn: {
      type: Boolean,
      required: false,
      default: true,
    },
    isNeedCsvImport: {
      type: Boolean,
      required: false,
      default: false,
    },
    isNeedCsvExport: {
      type: Boolean,
      required: false,
      default: false,
    },
  },

  data: () => ({
    BUTTON,
    ja,
    // DatePickerFormat: 'yyyy-MM-dd',
  }),

  methods: {
    getPaginationResults(page) {
      this.$emit('getPaginationResults', page)
    },

    search(keyword, keyword2, fromOperation, toOperation, sendStatus, postStatus) {
      this.$emit('search', keyword, keyword2, fromOperation, toOperation, sendStatus, postStatus)
    },
  },
}
</script>

<style lang="scss" scoped>
.header-area {
  border-bottom: 4px solid $Main;
}

.total-count {
  color: $White;
  background: $Main;
  border-radius: 5px;
}
.w-15 {
  width: 15% !important;
}
</style>
