import axios from 'axios'

const resource = '/ports'

export default {
  fetchPortIndex(page, keyword, sortKey, orderBy) {
    return axios.get(
      `${resource}?page=${page}&keyword=${keyword}&sort_key=${sortKey}&order_by=${orderBy}`
    )
  },
  fetchPortShow(id) {
    return axios.get(`${resource}/${id}`)
  },
  storePort(params) {
    return axios.post(`${resource}`, params)
  },
  updatePort(id, params) {
    return axios.patch(`${resource}/${id}`, params)
  },
  deletePort(id) {
    return axios.delete(`${resource}/${id}`)
  },
}
