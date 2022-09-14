/* eslint no-shadow: ["error", { "allow": ["state"] }] */
import { RepositoryFactory } from '@/repositories/repositoryFactory'
import HTTP_STATUS from '@/consts/httpStatus'

const regionRepository = RepositoryFactory.get('regions')

const state = {
  footerRegionList: null,
}

const getters = {
  isFooterRegionList: state => !!state.footerRegionList,
}

const mutations = {
  SET_FOOTER(state, data) {
    state.footerRegionList = data
  },
}

const actions = {
  async fetchRegionWithPrefectureList(context) {
    const response = await regionRepository
      .fetchRegionWithPrefectureList()
      .then(async res => {
        console.log(res)
        if (res.status !== HTTP_STATUS.OK) return Promise.reject(res)
        await context.commit('SET_FOOTER', res.data)
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
