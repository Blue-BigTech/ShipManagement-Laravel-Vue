import axios from 'axios'

const resource = '/targets'

export default {
  /*-------------------------------------------*/
  /* ADMIN/LENDER
  /*-------------------------------------------*/
  fetchList() {
    return axios.get(`${resource}/fetch/list`)
  },
}
