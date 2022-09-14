<template>
  <label :class="className">
    <input
      v-model="selectedIds"
      type="checkbox"
      :disabled="disabled"
      :value="value"
      @change="onChange"
    />
    <!-- @change="$emit('change', $event.target.checked)" -->
    <span class="box"></span>
    {{ label }}
  </label>
</template>

<script>
export default {
  props: {
    id: {
      type: [String, Number],
      required: true,
      default: '',
    },
    value: {
      type: Number,
      required: true,
      default: null,
    },
    label: {
      type: String,
      required: false,
      default: '',
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
    exSelectedIds: {
      type: Array,
      required: false,
      default: () => [],
    },
    className: {
      type: String,
      required: false,
      default: '',
    },
  },

  data: () => ({
    selectedId: null,
    selectedIds: [],
  }),

  watch: {
    value: {
      handler(date) {
        this.selectedId = date
      },
      immediate: true,
    },
    exSelectedIds: {
      handler(date) {
        this.selectedIds = date
      },
      immediate: true,
    },
  },

  methods: {
    onChange() {
      this.$emit('change', this.selectedIds)
    },
  },
}
</script>

<style lang="scss" scoped>
input[type='checkbox'] {
  display: none;
}

input[type='checkbox'] + .box:before,
input[type='checkbox'] + .box:after {
  transition: all 0.2s;
}

input[type='checkbox'] + .box:after {
  position: absolute;
  left: 4px;
  top: 6px;
  margin-top: -5px;
  margin-left: -4px;
  display: inline-block;
  content: ' ';
  width: 20px;
  height: 20px;
  border: 2px solid #999;
  border-radius: 2px;
  background-color: #fff;
}

input[type='checkbox']:disabled + .box:after {
  background-color: #e9ecef;
}

input[type='checkbox']:checked + .box:after {
  background-color: $Main !important;
  border-color: $Main !important;
}

input[type='checkbox']:checked + .box:before {
  transform: rotate(45deg);
  position: absolute;
  left: 7px;
  top: 3px;
  width: 6px;
  height: 13px;
  border-width: 2px;
  border-style: solid;
  border-top: 0;
  border-left: 0;
  border-color: #fff;
  content: '';
  z-index: 1;
}
</style>
