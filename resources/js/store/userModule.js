/* eslint no-shadow: ["error", { "allow": ["state"] }] */
import { RepositoryFactory } from '@/repositories/repositoryFactory'
import HTTP_STATUS from '@/consts/httpStatus'
import ROLE from '@/consts/role'
import util from '@/functions/util'

const authRepository = RepositoryFactory.get('auth')
const userRepository = RepositoryFactory.get('users')

const state = {
  adminUser: null,
  lenderUser: null,
  viewerUser: null,
  userRole: null,
  isLoginPage: false,
}

const getters = {
  isLogin: state => !!state.user,
  isAdminLogin: state => !!state.adminUser,
  isLenderLogin: state => !!state.LenderUser,
}

const mutations = {
  SET_ADMIN_USER(state, data) {
    state.adminUser = data
  },

  SET_LENDER_USER(state, data) {
    state.lenderUser = data
  },

  SET_VIEWER_USER(state, data) {
    state.viewerUser = data
  },

  SET_USER_ROLE(state, data) {
    state.userRole = data.role_id
  },

  SET_IS_LOGIN_PAGE(state, data) {
    state.isLoginPage = data
  },
}

const actions = {
  /*-------------------------------------------*/
  /*  actions) ログイン
  /*-------------------------------------------*/
  async adminLogin(context, data) {
    const response = await authRepository
      .adminLogin(data)
      .then(async res => {
        if (res.status !== HTTP_STATUS.OK) return Promise.reject(res)
        await context.commit('SET_ADMIN_USER', res.data)
        await util.setCookie('access-token', res.data.access_token)
        return Promise.resolve(res)
      })
      .catch(e => {
        return Promise.reject(e)
      })
    return response
  },

  async lenderLogin(context, data) {
    data.is_admin_login = false
    const response = await authRepository
      .lenderLogin(data)
      .then(async res => {
        if (res.status !== HTTP_STATUS.OK) return Promise.reject(res)
        await context.commit('SET_LENDER_USER', res.data)
        await util.setCookie('access-token', res.data.access_token)
        return Promise.resolve(res.data)
      })
      .catch(e => {
        return Promise.reject(e)
      })

    return response
  },

  /*-------------------------------------------*/
  /*  actions) ログアウト
  /*-------------------------------------------*/
  async logout(context, userId) {
    const response = await authRepository
      .logout(userId)
      .then(async res => {
        if (res.status !== HTTP_STATUS.OK) return Promise.reject(res)
        await context.commit('SET_ADMIN_USER', null)
        await context.commit('SET_LENDER_USER', null)
        await context.commit('SET_VIEWER_USER', null)
        await util.removeCookie('access-token')
        return Promise.resolve(res)
      })
      .catch(e => {
        return Promise.reject(e)
      })

    return response
  },

  /*-------------------------------------------*/
  /*  actions) 詳細取得
  /*-------------------------------------------*/
  async fetchLoginUser(context) {
    const response = await userRepository
      .fetchLoginUser()
      .then(async res => {
        if (res.status !== HTTP_STATUS.OK) return Promise.reject(res)
        await util.setCookie('access-token', res.data.access_token)
        if (res.data.role_id === ROLE.TYPE.ADMIN) {
          await context.commit('SET_ADMIN_USER', res.data)
          await context.commit('SET_USER_ROLE', res.data.role_id)
        }
        if (res.data.role_id === ROLE.TYPE.LENDER) {
          console.log('TODO:ログインOK')
          console.log(res.data)
          await context.commit('SET_LENDER_USER', res.data)
          await context.commit('SET_USER_ROLE', res.data.role_id)
        }
        // if (res.data.role_id === ROLE.TYPE.VIEWER) {
        //   await context.commit('SET_USER', res.data)
        //   await context.commit('SET_USER_ROLE', res.data.role_id)
        // }
        return Promise.resolve(res)
      })
      .catch(e => {
        return Promise.reject(e)
      })

    return response
  },
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
}
