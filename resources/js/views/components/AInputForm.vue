<template>
  <div class="form-outline">
    <label v-if="label" class="form-label" :for="id"
      >{{ label }}<span v-if="required" class="text-danger pl-2">※</span></label
    >
    <!-- パスワード -->
    <template v-if="isDisplayPassword">
      <div class="position-relative">
        <input
          :id="id"
          :type="inputType"
          :placeholder="placeholder"
          :value="value"
          :maxlength="maxlength"
          :disabled="disabled"
          class="form-control"
          @input="$emit('input', $event.target.value)"
        />
        <i
          v-if="inputType === 'password'"
          class="far fa-eye pl-2 password-display-mark"
          @click="inputType = 'text'"
        ></i>
        <i
          v-if="inputType === 'text'"
          class="far fa-eye-slash pl-2 password-display-mark"
          @click="inputType = 'password'"
        ></i>
      </div>
    </template>
    <!-- 汎用的 -->
    <template v-else>
      <div class="d-flex align-items-center">
        <input
          :id="id"
          :type="inputType"
          :class="className"
          :placeholder="placeholder"
          :value="value"
          :maxlength="maxlength"
          :disabled="disabled"
          class="form-control"
          @input="$emit('input', $event.target.value)"
        />
        <p v-if="behindUnit" class="mx-2 my-0">{{ behindUnit }}</p>
      </div>
    </template>
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
      type: null,
      required: false,
      default: null,
    },
    type: {
      type: String,
      required: false,
      default: 'text',
    },
    label: {
      type: String,
      required: false,
      default: '',
    },
    placeholder: {
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
    isDisplayPassword: {
      type: Boolean,
      required: false,
      default: false,
    },
    // デザイン用
    behindUnit: {
      type: String,
      required: false,
      default: '',
    },
    className: {
      type: String,
      required: false,
      default: '',
    },
    maxlength: {
      type: String,
      required: false,
      default: '',
    },
  },

  data: () => ({
    inputType: '',
  }),

  mounted() {
    this.inputType = this.type
  },
}
</script>

<style lang="scss" scoped>
label {
  margin-bottom: 0.3rem !important;
}
.password-display-mark {
  cursor: pointer;
  position: absolute;
  right: 3%;
  top: 50%;
  transform: translate(0, -50%);
  color: #212529;
}
</style>
