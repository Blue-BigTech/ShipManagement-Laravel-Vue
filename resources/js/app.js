import './bootstrap'
import Vue from 'vue'

import axios from 'axios'

import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'

import smoothScroll from 'vue-smoothscroll'

import VueSidebarMenu from 'vue-sidebar-menu'
import VModal from 'vue-js-modal'
import { Service } from 'axios-middleware'
import VueCookies from 'vue-cookies'

import App from './App.vue'

import 'core-js/stable'
import 'regenerator-runtime/runtime'

import router from './router'

import store from './store'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'

import toast from './functions/toast'
import errHandling from './functions/errHandling'
import common from './functions/common'

import loading from './mixins/loader'

require('./filters/index')

Vue.use(smoothScroll)
Vue.use(Loading)
Vue.use(VueSidebarMenu)
Vue.use(VModal)
Vue.use(VueCookies)

Vue.mixin(loading)

// 全ページで使用可能
Vue.prototype.$toast = toast
Vue.prototype.$errHandling = errHandling
Vue.prototype.$common = common

require('./bootstrap')

axios.defaults.baseURL = '/api'
axios.defaults.headers.post['Access-Control-Allow-Origin'] = '/api'

axios.interceptors.request.use(config => {
  config.headers.common['Content-Type'] = 'application/json'
  config.headers.common.Accept = 'application/json'
  config.headers.common.Authorization = `Bearer ${Vue.$cookies.get('access-token')}`

  return config
})

const service = new Service(axios)

service.register({
  onRequest(config) {
    return config
  },
  onSync(promise) {
    return promise
  },
  onResponse(response) {
    return response
  },
  onResponseError(error) {
    return Promise.reject(error)
  },
})

const createApp = async () => {
  // eslint-disable-next-line no-unused-vars
  const app = new Vue({
    el: '#app',
    router,
    store,
    components: { App },
    template: '<App />',
  })
}

createApp()
