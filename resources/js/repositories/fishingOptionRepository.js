import axios from 'axios'

const resource = '/fishing-options'

export default {
  fetchFishingOptionList() {
    return axios.get(`${resource}/list`)
  },
}
