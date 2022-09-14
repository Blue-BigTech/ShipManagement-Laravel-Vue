import axios from 'axios'

export default {
  adminLogin(params) {
    return axios.post('/admin/login', params)
  },

  lenderLogin(params) {
    return axios.post('/lender/login', params)
  },

  logout(userId) {
    return axios.post(`/users/${userId}/logout`)
  },
}
