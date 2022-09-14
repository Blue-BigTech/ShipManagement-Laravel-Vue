<template>
  <div :id="id" class="accordion">
    <div class="z-depth-0 borderd">
      <div
        :id="headingId"
        class="card__header"
        :style="{ padding: `${paddingHeader}`, backgroundColor: `${backgroundColor}` }"
      >
        <h5 class="mb-0">
          <button
            class="btn btn-link p-0 d-flex justify-content-between align-items-center"
            type="button"
            data-toggle="collapse"
            :data-target="`#${bodyId}`"
            aria-expanded="true"
            :aria-controls="bodyId"
            style="width: 95%;"
          >
            <div class="d-flex justify-content-center align-items-center">
              <div class="mr-2"><i v-if="headerIcon" :class="headerIcon"></i></div>
              <div style="font-weight: bolder;">{{ title }}</div>
            </div>
            <div>
              <!-- 逆三角のアイコン -->
              <!-- <i v-if="sortDownIcon" class="fas fa-caret-down"></i> -->
              <i class="fas fa-caret-down"></i>
            </div>
          </button>
          <span v-if="isLoader" class="loader"></span>
        </h5>
      </div>
      <div :id="bodyId" class="collapse show" :aria-labelledby="headingId" :data-parent="`#${id}`">
        <div
          class="card__body"
          :style="{
            padding: `${paddingBody}`,
            borderRight: `${borderRight}`,
            borderLeft: `${borderLeft}`,
            borderBottom: `${borderBottom}`,
          }"
        >
          <slot name="content"></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
      default: '',
    },
    id: {
      type: String,
      required: true,
      default: '',
    },
    headingId: {
      type: String,
      required: true,
      default: '',
    },
    bodyId: {
      type: String,
      required: true,
      default: '',
    },
    isDefaultOpen: {
      type: Boolean,
      required: false,
      default: true,
    },
    headerIcon: {
      type: String,
      required: false,
      default: '',
    },
    // sortDownIcon: {
    //   type: String,
    //   required: false,
    //   default: '',
    // },
    isLoader: {
      type: Boolean,
      required: false,
      default: false,
    },
    paddingHeader: {
      type: String,
      required: false,
      default: '',
    },
    paddingBody: {
      type: String,
      required: false,
      default: '',
    },
    fontWeight: {
      type: String,
      required: false,
      default: '',
    },
    backgroundColor: {
      type: String,
      required: false,
      default: '',
    },
    borderLeft: {
      type: String,
      required: false,
      default: '',
    },
    borderRight: {
      type: String,
      required: false,
      default: '',
    },
    borderBottom: {
      type: String,
      required: false,
      default: '',
    },
  },
}
</script>

<style lang="scss" scoped>
// .borderd {
//   border: 1px solid $Main;
// }

.card__header {
  border: 1px solid $Main !important;
}

.accordion-button:after {
  color: $Main;
}

.btn-link {
  color: $MainDark !important;
}

.accordion-item:last-of-type .accordion-button,
.accordion-item:last-of-type .accordion-button.collapsed {
  color: $MainDark;
}

.loader {
  width: 20px;
  height: 20px;
  display: inline-block;
  font-size: 10px;
  margin: auto;
  text-indent: -9999em;
  border-radius: 50%;
  background: $Main;
  background: linear-gradient(to right, rgba($Main, 1) 10%, rgba($Main, 0) 42%);
  position: relative;
  animation: spinner 1.4s infinite linear;
  transform: translateZ(0);
  vertical-align: top;

  &:before {
    width: 50%;
    height: 50%;
    background: $Main;
    border-radius: 100% 0 0 0;
    position: absolute;
    top: 0;
    left: 0;
    content: '';
  }

  &:after {
    background: $White;
    width: 75%;
    height: 75%;
    border-radius: 50%;
    content: '';
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
  }
}

@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
