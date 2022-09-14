import axios from 'axios'

const resource = '/regions'

export default {
  /*-------------------------------------------*/
  /* ADMIN/LENDER
  /*-------------------------------------------*/

  /*-------------------------------------------*/
  /* VIEWER *認証なし
  /*-------------------------------------------*/
  fetchRegionWithPrefectureList() {
    return axios.get(`${resource}/viewer/list`)
  },
}
