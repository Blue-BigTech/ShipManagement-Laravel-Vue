import axios from 'axios'

const resource = '/boats'

export default {
  /*-------------------------------------------*/
  /* ADMIN/LENDER
  /*-------------------------------------------*/
  /*-------------------------------------------*/
  /* VIEWER *認証なし
  /*-------------------------------------------*/
  viewerIndex(page, sortKey, orderBy, prefectureParam, cityParam) {
    return axios.get(
      `${resource}/viewer/index?page=${page}&sort_key=${sortKey}&order_by=${orderBy}&prefecture_param=${prefectureParam}&city_param=${cityParam}`
    )
  },
  viewerShow(id) {
    return axios.get(`${resource}/viewer/show/${id}`)
  },
}
