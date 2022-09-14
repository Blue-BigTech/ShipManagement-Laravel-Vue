<template>
  <!-- @see: https://euvl.github.io/vue-js-modal/ -->
  <modal
    :name="name"
    :scrollable="true"
    :height="height"
    :width="modalWidth"
    :click-to-close="clickToClose"
    class="middle"
  >
    <div v-if="headerText" class="modal-header font-md p-4">
      {{ headerText }}
    </div>
    <div class="modal-body p-4">
      <slot name="content"></slot>
    </div>
    <div class="modal-buttons">
      <slot name="buttons"></slot>
    </div>
  </modal>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      required: true,
      default: '',
    },
    headerText: {
      type: String,
      required: false,
      default: '',
    },
    height: {
      type: String,
      required: false,
      default: 'auto',
    },
    size: {
      type: String,
      required: false,
      default: 'small',
    },
    clickToClose: {
      type: Boolean,
      required: false,
      default: true,
    },
  },

  data: () => ({
    width: window.innerWidth,
  }),

  computed: {
    modalWidth() {
      if (this.size === 'small' && this.width > 480) {
        return '480px'
      }
      if (this.size === 'small' && this.width <= 480) {
        return '100%'
      }
      if (this.size === 'middle' && this.width > 680) {
        return '680px'
      }
      if (this.size === 'middle' && this.width <= 680) {
        return '100%'
      }
      if (this.size === 'large' && this.width > 880) {
        return '880px'
      }
      if (this.size === 'large' && this.width <= 880) {
        return '100%'
      }
      if (this.size === 'large-large' && this.width > 1280) {
        return '1280px'
      }
      if (this.size === 'large-large' && this.width <= 1280) {
        return '100%'
      }
      return `${this.width}px`
    },
  },

  mounted() {
    window.addEventListener('resize', this.handleResize)
  },

  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize)
  },

  methods: {
    handleResize() {
      this.width = window.innerWidth
    },
  },
}
</script>

<style lang="scss" scoped>
.modal-header {
  font-weight: 400;
  font-stretch: normal;
  font-style: normal;
  line-height: 1;
  letter-spacing: normal;
  text-align: left;
  color: #191919;
}

.modal-buttons {
  padding: 32px;
  float: right;
}

@media screen and (min-width: 680px) {
  .middle {
    width: 100% !important;
  }
}
</style>
