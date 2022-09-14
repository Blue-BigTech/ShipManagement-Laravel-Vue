import axios from 'axios'

const resource = '/operations'

export default {
  fetchOperationList() {
    return axios.get(`${resource}/list`)
  },
}
