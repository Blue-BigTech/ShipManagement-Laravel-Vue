import axios from 'axios'

const resource = '/cities'

export default {
  fetchCityIndex(page, sortKey, orderBy, keyword) {
    return axios.get(
      `${resource}?page=${page}&sort_key=${sortKey}&order_by=${orderBy}&keyword=${keyword}`
    )
  },

  fetchCityShow(id) {
    return axios.get(`${resource}/${id}`)
  },

  storeCity(params) {
    return axios.post(`${resource}`, params)
  },

  updateCity(id, params) {
    return axios.patch(`${resource}/${id}`, params)
  },

  /*-------------------------------------------*/
  /* VIEWER *認証なし
  /*-------------------------------------------*/
  // 市町村名から詳細取得
  fetchCityShowViewer(cityParam) {
    return axios.get(`${resource}/viewer/${cityParam}`)
  },
  // あとでかく
  viewerFetchCityListByPrefectureId(prefectureId) {
    return axios.get(`${resource}/viewer/fetch/list/by-prefecture?prefecture_id=${prefectureId}`)
  },
}
