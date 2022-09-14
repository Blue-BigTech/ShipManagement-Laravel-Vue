<template>
  <ul v-if="breadcrumbData.length > 1" class="nav pull-right nav-pills">
    <li v-for="(data, i) in breadcrumbData" :key="i" class="breadcrumb__item">
      <span
        :class="i === breadcrumbData.length - 1 ? 'text-muted' : ''"
        class="breadcrumb__item-text"
        @click="$router.push(data.link)"
      >
        {{ data.title }}
        <i
          v-if="i !== breadcrumbData.length - 1"
          class="fas fa-chevron-right px-2 text-muted breadcrumb__item-arrow"
        ></i>
      </span>
    </li>
  </ul>
</template>

<script>
import BUTTON from '@/consts/button'

export default {
  component: {
    BUTTON,
  },

  props: {
    breadcrumbData: {
      type: Array,
      required: true,
      default: () => [],
    },
  },
}
</script>

<style lang="scss" scoped>
.breadcrumb {
  &__item {
    list-style: none;

    &-text {
      color: $Main;
      cursor: pointer;
      font-size: 12px;
    }

    &-arrow {
      font-size: 12px;
    }
  }
}
</style>
