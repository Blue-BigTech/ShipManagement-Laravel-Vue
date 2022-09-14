import axios from 'axios'

const resource = '/member-types'

export default {
  fetchMemberTypeList() {
    return axios.get(`${resource}/list`)
  },
}
