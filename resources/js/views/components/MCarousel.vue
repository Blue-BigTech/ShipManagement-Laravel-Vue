<template>
  <div
    v-if="images.length"
    id="carouselExampleIndicators"
    class="carousel slide col-11 mx-auto"
    data-bs-ride="carousel"
  >
    <div class="carousel-indicators">
      <button
        v-for="(image, i) in images"
        :key="i"
        :class="{ active: i == 0 }"
        class="notification-card py-2 px-3"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        :data-bs-slide-to="i"
        :aria-current="{ true: i == 0 }"
        :aria-label="`Slide${i}`"
      ></button>
    </div>
    <div class="carousel-inner">
      <div v-for="(image, i) in images" :key="i" :class="{ active: i == 0 }" class="carousel-item">
        <img :src="image" class="d-block m-auto" />
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    images: {
      type: Array,
      required: true,
      default: () => [],
    },
  },
}
</script>

<style lang="scss" scoped></style>
