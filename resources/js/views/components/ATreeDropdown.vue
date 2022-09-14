<template>
  <div>
    <label v-if="itemName" class="form-label"
      >{{ itemName }}<span v-if="required" class="text-danger pl-2">※</span></label
    >
    <!-- searchable="searchable" 文字入力の可不可-->
    <treeselect
      v-model="currentValue"
      :options="options"
      :value="currentValue"
      :normalizer="normalizer"
      :placeholder="placeholder"
      :disable-branch-nodes="isDisableBranchNode"
      :searchable="searchable"
      :disabled="disabled"
    />
  </div>
</template>

<script>
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

export default {
  components: { Treeselect },

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
    parentKey: {
      type: String,
      required: false,
      default: '',
    },
    childKey: {
      type: String,
      required: false,
      default: '',
    },
    placeholder: {
      type: String,
      required: false,
      default: '選択してください',
    },
    isGrouping: {
      type: Boolean,
      required: false,
      default: false,
    },
    isDisableBranchNode: {
      type: Boolean,
      required: false,
      default: false,
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
  },

  data: () => ({
    currentValue: null,
  }),

  watch: {
    currentValue(v) {
      this.$emit('input', v)
    },

    value(v) {
      if (v) {
        if (this.parentKey || this.childKey) {
          if (v.includes(`${this.childKey}_`)) {
            const options = []
            this.options.forEach(x => {
              x.subOptions.forEach(y => {
                options.push(y)
              })
            })
            const value = v.replace(`${this.childKey}_`, '')
            const target = options.find(x => x[this.label] === value)
            this.currentValue = `${this.childKey}_${target[this.labelKey]}`
            return
          }
          if (v.includes(`${this.parentKey}_`)) {
            const value = v.replace(`${this.parentKey}_`, '')
            const target = this.options.find(x => x[this.label] === value)
            this.currentValue = `${this.parentKey}_${target[this.labelKey]}`
            return
          }
        }

        const target = this.options.find(x => x[this.label] === this.value)
        if (target) this.currentValue = target[this.labelKey]
      } else {
        this.currentValue = null
      }
    },
  },

  methods: {
    normalizer(node) {
      if (this.isGrouping) {
        // eslint-disable-next-line no-prototype-builtins
        if (node.hasOwnProperty('subOptions')) {
          return {
            id: `${this.parentKey}_${node[this.labelKey]}`,
            label: node[this.label],
            children: node.subOptions,
          }
        }
        return {
          id: `${this.childKey}_${node[this.labelKey]}`,
          label: node[this.label],
          children: node.subOptions,
        }
      }
      return {
        id: node[this.labelKey],
        label: node[this.label],
        children: node.subOptions,
      }
    },
  },
}
</script>
