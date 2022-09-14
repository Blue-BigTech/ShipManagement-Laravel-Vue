import Vue from 'vue'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'

Vue.use(Loading)
Vue.component('Loading', Loading)

export default {
  data: () => ({
    // isLoading: null,
    loading: null,
    isLoading: false,
  }),

  methods: {
    showLoader() {
      if (this.isLoading) return

      // this.isLoading = this.$loading.show({
      //   container: null,
      //   color: '#2e7dc1',
      //   backgroundColor: 'rgba(0, 0, 0, .5)',
      //   loader: 'spinner',
      //   width: 100,
      //   height: 100,
      //   zIndex: 9999,
      // })

      this.loading = this.$loading.show({
        container: null,
        color: '#2e7dc1',
        backgroundColor: 'rgba(0, 0, 0, .5)',
        loader: 'spinner',
        width: 100,
        height: 100,
        zIndex: 9999,
      })
      this.isLoading = true
    },

    hideLoader() {
      if (!this.isLoading) return

      // this.isLoading.hide()

      this.loading.hide()
      this.isLoading = false
    },
  },
}
