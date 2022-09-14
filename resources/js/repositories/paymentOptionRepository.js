import axios from 'axios'

const resource = '/payment-options'

export default {
  fetchPaymentOptionList() {
    return axios.get(`${resource}/list`)
  },
}
