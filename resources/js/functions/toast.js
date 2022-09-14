import Vue from 'vue'
import Toasted from 'vue-toasted'

Vue.use(Toasted)

export default {
  successToast(message) {
    const options = {
      type: 'success',
      theme: 'bubble',
      position: 'bottom-center',
      duration: 5000,
      fullWidth: false,
    }
    this.showToasted(message, options)
  },

  errorToast(message = 'エラーが発生しました') {
    const options = {
      type: 'error',
      theme: 'bubble',
      position: 'bottom-center',
      duration: 5000,
      fullWidth: false,
    }
    this.showToasted(message, options)
  },

  validationErrorToast(
    message = '</br>入力内容に不備があります。</br> エラーの表示をご確認ください。</br>　'
  ) {
    const options = {
      type: 'error',
      theme: 'bubble',
      position: 'bottom-center',
      duration: 6000,
      fullWidth: false,
    }
    this.showToasted(message, options)
  },

  showToasted(message, options) {
    Vue.toasted.show(message, options)
  },
}
