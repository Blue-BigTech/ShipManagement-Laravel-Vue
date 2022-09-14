import Vue from 'vue'

import VueCookies from 'vue-cookies'

Vue.use(VueCookies)

export default {
  // see: https://github.com/cmp-cc/vue-cookies/
  setCookie(key, value) {
    Vue.$cookies.set(key, value, 60 * 60 * 1)
  },

  getCookie(key) {
    return Vue.$cookies.get(key)
  },

  removeCookie(key) {
    Vue.$cookies.remove(key)
  },
}
