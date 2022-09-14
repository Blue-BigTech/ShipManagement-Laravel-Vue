import axios from 'axios'

const resource = '/lender-posts'

export default {
  /*-------------------------------------------*/
  /* ADMIN/LENDER
  /*-------------------------------------------*/
  index(lenderId) {
    return axios.get(`${resource}?lender_id=${lenderId}`)
  },
  show(id) {
    return axios.get(`${resource}/${id}`)
  },
  store(params) {
    return axios.post(`${resource}`, params)
  },
  update(id, params) {
    return axios.patch(`${resource}/${id}`, params)
  },
  delete(id, params) {
    return axios.post(`${resource}/delete/${id}`, params)
  },
  /*-------------------------------------------*/
  /* VIEWER *認証なし
  /*-------------------------------------------*/
  viewerIndex(lenderId, page) {
    return axios.get(`${resource}/viewer/index?page=${page}&lender_id=${lenderId}`)
  },
  viewerList(count) {
    return axios.get(`${resource}/viewer/list?count=${count}`)
  },
}
