import axios from 'axios'

const resource = '/facilities'

export default {
  fetchFacilityList() {
    return axios.get(`${resource}/list`)
  },
}
