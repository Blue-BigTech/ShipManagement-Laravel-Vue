<template>
  <div class="drop_area" :class="{ enter: isEnter }" @dragenter="dragEnter">
    ファイルアップロード
  </div>
</template>

<script>
// import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

export default {
  // components: { Treeselect },

  props: {
    options: {
      type: Array,
      required: true,
      default: () => [],
    },
    value: {
      type: null,
      required: true,
      default: null,
    },
    label: {
      type: String,
      required: true,
      default: '',
    },
    itemName: {
      type: String,
      required: false,
      default: '',
    },
    required: {
      type: Boolean,
      required: false,
      default: false,
    },
    labelKey: {
      type: String,
      required: true,
      default: '',
    },
    placeholder: {
      type: String,
      required: false,
      default: '選択してください',
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
    searchable: {
      type: Boolean,
      required: false,
      default: false,
    },
    clearable: {
      type: Boolean,
      required: false,
      default: false,
    },
  },

  data: () => ({
    currentValue: null,
  }),

  watch: {
    currentValue(v) {
      this.$emit('input', v)
    },

    value(v) {
      this.currentValue = v
    },
  },

  mounted() {
    this.currentValue = this.value
  },

  methods: {
    normalizer(node) {
      return {
        id: node[this.labelKey],
        label: node[this.label],
        children: node.subOptions,
      }
    },
  },
}
</script>
