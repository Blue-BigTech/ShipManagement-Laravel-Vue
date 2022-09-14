<template>
  <div>
    <RouterView />
  </div>
</template>

<script>
import { mapState } from 'vuex'

// import ONavbar from '@/views/lender/components/ONavbar.vue'

export default {
  components: {
    // ONavbar,
  },
  data: () => ({}),
  computed: {
    ...mapState('userModule', ['user', 'isAdminUser']),
  },
}
</script>
