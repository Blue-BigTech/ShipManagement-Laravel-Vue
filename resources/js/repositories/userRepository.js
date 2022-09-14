import axios from 'axios'

const resource = '/users'

export default {
  fetchLoginUser() {
    return axios.get('/login/user')
  },
  changePassword(id, params) {
    return axios.patch(`${resource}/${id}/change/password`, params)
  },
}
