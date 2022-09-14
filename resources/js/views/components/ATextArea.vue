<template>
  <div class="form-outline d-flex flex-column">
    <label v-if="label" class="form-label" :for="id"
      >{{ label }}<span v-if="required" class="text-danger pl-2">※</span></label
    >
    <textarea
      :id="id"
      :class="className"
      class="form-control"
      :value="value"
      :placeholder="placeholder.replace('\\n', '\n')"
      :style="`height :${height}!important;`"
      :disabled="disabled"
      @input="$emit('input', $event.target.value)"
      @change="$emit('changeValue', $event.target.value)"
    ></textarea>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      required: true,
      default: '',
    },
    value: {
      type: String,
      required: false,
      default: '',
    },
    label: {
      type: String,
      required: false,
      default: '',
    },
    required: {
      type: Boolean,
      required: false,
      default: false,
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
    height: {
      type: String,
      required: false,
      default: '50px',
    },
    placeholder: {
      type: String,
      required: false,
      default: '',
    },
    className: {
      type: String,
      required: false,
      default: '',
    },
  },
}
</script>
