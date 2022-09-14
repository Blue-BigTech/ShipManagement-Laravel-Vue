import axios from 'axios'

const resource = '/lenders'

export default {
  /**
   * 貸船業者一覧取得
   */
  indexWithBoat(page, keyword, sortKey, orderBy) {
    return axios.get(
      `${resource}?page=${page}&keyword=${keyword}&sort_key=${sortKey}&order_by=${orderBy}`
    )
  },
  /**
   * 貸船業者/船 詳細情報取得
   */
  showWithBoat(id) {
    return axios.get(`${resource}/${id}`)
  },
  /**
   * 貸船業者/船 登録
   */
  storeWithBoat(params) {
    return axios.post(`${resource}`, params)
  },
  /**
   * 貸船業者/船 更新
   */
  updateWithBoat(id, params) {
    return axios.patch(`${resource}/${id}`, params)
  },
  /**
   * 貸船業者/船 削除
   */
  deleteWithBoat(id) {
    return axios.delete(`${resource}/${id}`)
  },
}
