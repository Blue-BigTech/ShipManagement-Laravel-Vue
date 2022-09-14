<template>
  <dl :class="'ex-collapse ' + className">
    <dt class="ex-collapse collapsed" data-toggle="collapse" :data-target="'#' + id">
      {{ label }}
    </dt>
    <dd :id="id" class="collapse container-fluid">
      <div class="row ex-collapse-inner">
        <slot></slot>
      </div>
    </dd>
  </dl>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      required: true,
      default: '',
    },
    label: {
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
