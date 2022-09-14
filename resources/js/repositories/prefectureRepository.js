import axios from 'axios'

const resource = '/prefectures'

export default {
  /*-------------------------------------------*/
  /* ADMIN/LENDER
  /*-------------------------------------------*/
  fetchPrefectureIndex(page, keyword, sortKey, orderBy) {
    return axios.get(
      `${resource}?page=${page}&keyword=${keyword}&sort_key=${sortKey}&order_by=${orderBy}`
    )
  },

  fetchPrefectureShow(id) {
    return axios.get(`${resource}/${id}`)
  },

  storePrefecture(params) {
    return axios.post(`${resource}`, params)
  },

  updatePrefecture(id, params) {
    return axios.patch(`${resource}/${id}`, params)
  },

  deletePrefecture(id) {
    return axios.delete(`${resource}/${id}`)
  },

  fetchPrefectureList() {
    return axios.get(`${resource}/fetch/list`)
  },

  fetchAreaLists() {
    return axios.get(`${resource}/fetch/lists/with-city-port`)
  },
  /*-------------------------------------------*/
  /* VIEWER *認証なし
  /*-------------------------------------------*/
  fetchPrefectureWithCityViewer(prefectureParam) {
    return axios.get(`${resource}/viewer/${prefectureParam}`)
  },
}
