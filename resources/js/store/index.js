import Vue from 'vue'
import Vuex from 'vuex'

import createPersistedState from 'vuex-persistedstate'

import userModule from './userModule'
import footerModule from './footerModule'

Vue.use(Vuex)
const store = new Vuex.Store({
  modules: { userModule, footerModule },
  plugins: [
    createPersistedState({
      storage: window.localStorage,
    }),
  ],
})

export default store
