import util from '@/functions/util'
import toast from '@/functions/toast'
import store from '@/store'

import HTTP_STATUS from '@/consts/httpStatus'

export default {
  async adminCatch(errStatus) {
    if (errStatus === HTTP_STATUS.UNAUTHORIZED) {
      await store.commit('userModule/SET_ADMIN_USER', null)
      await util.removeCookie('access-token')
    }
    if (errStatus === HTTP_STATUS.UNPROCESSABLE_ENTITY) {
      toast.validationErrorToast()
    } else {
      toast.errorToast()
    }
  },

  async lenderCatch(errStatus) {
    if (errStatus === HTTP_STATUS.UNAUTHORIZED) {
      await store.commit('userModule/SET_LENDER_USER', null)
      await util.removeCookie('access-token')
    }
    if (errStatus === HTTP_STATUS.UNPROCESSABLE_ENTITY) {
      toast.validationErrorToast()
    } else {
      toast.errorToast()
    }
  },
}
