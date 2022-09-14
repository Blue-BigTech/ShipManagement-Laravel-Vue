<template>
  <button
    type="button"
    class="btn_style"
    :class="[`btn-${color}`, 'font-sm px-2 py-2', className]"
    :style="{ width: `${width} !important` }"
    :disabled="disabled"
    @click="$emit('onClick')"
  >
    <i v-if="`${iconFront}`" :class="`${iconFront}`" class="mr-2"></i>
    {{ label }}
  </button>
</template>

<script>
export default {
  props: {
    color: {
      type: String,
      required: false,
      default: 'main',
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
    // スタイル
    iconFront: {
      type: String,
      required: false,
      default: '',
    },
    width: {
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

<style lang="scss" scoped>
/*-------------------------------------------*/
/*  ボタン共通
/*-------------------------------------------*/
.btn_style {
  border-radius: 5px;
  &:disabled {
    color: white;
    background-color: $Gray !important;
    border: 2px solid $Gray;
    font-weight: bold;
  }
}
/*-------------------------------------------*/
/*  normal
/*-------------------------------------------*/
.btn-main {
  color: $White;
  background-color: $Main !important;
  transition: background-color 0.3s ease-in-out 0s;
  border: 2px solid $Main;
  &:hover {
    color: $Main;
    background-color: $White !important;
    font-weight: bold;
  }
  &:disabled {
    color: white;
    background-color: $Gray !important;
    border: 2px solid $Gray;
    font-weight: bold;
  }
}

.btn-main-dark {
  color: $White;
  border: 2px solid $MainDark;
  background-color: $MainDark !important;
  transition: background-color 0.3s ease-in-out 0s;
  &:hover {
    color: $MainDark;
    background-color: $White !important;
    font-weight: bold;
  }
  &:disabled {
    color: white;
    background-color: $Gray !important;
    border: 2px solid $Gray;
    font-weight: bold;
  }
}

.btn-main-light {
  color: $White;
  background-color: $MainLight !important;
  transition: background-color 0.3s ease-in-out 0s;
  border: 2px solid $MainLight;
  &:hover {
    color: $MainLight;
    background-color: $White !important;
    font-weight: bold;
  }
}

.btn-primary {
  color: $White;
  background-color: $Primary !important;
  transition: background-color 0.3s ease-in-out 0s;
  border: 2px solid $Primary;
  font-weight: bold;
  &:hover {
    color: $Primary;
    background-color: $White !important;
    border: 2px solid $Primary;
    font-weight: bold;
  }
  &:active {
    color: $White;
    background-color: $Primary !important;
    border: 2px solid $Primary;
  }
  &:focus {
    color: $White;
    background-color: $Primary !important;
    border: 2px solid $Primary;
  }
  &:disabled {
    color: white;
    background-color: $Gray !important;
    border: 2px solid $Gray;
    font-weight: bold;
  }
}

.btn-gray {
  color: $White;
  background-color: $Gray;
  transition: background-color 0.3s ease-in-out 0s;
  border: 2px solid $Gray;
  font-weight: bold;
  &:hover {
    color: $Gray;
    background-color: $White;
    border: 2px solid $Gray;
    font-weight: bold;
  }
}

.btn-danger {
  color: $White;
  background-color: $Danger;
  transition: background-color 0.3s ease-in-out 0s;
  border: 2px solid $Danger;
  font-weight: bold;
  &:hover {
    color: $Danger;
    background-color: $White;
    border: 2px solid $Danger;
    font-weight: bold;
  }
}
</style>
