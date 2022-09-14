<template>
  <MModalBase name="password-change-modal" header-text="パスワード変更" size="small">
    <template #content>
      <div class="mb-4">
        <AInputForm
          id="password"
          v-model="form.password"
          type="password"
          label="新しいパスワード"
          :is-display-password="true"
        />
        <p v-if="passwordErrorMessage" class="error-message">{{ passwordErrorMessage }}</p>
      </div>
      <div class="mb-4">
        <AInputForm
          id="password-confirmation"
          v-model="form.password_confirmation"
          type="password"
          label="新しいパスワード（確認）"
          :is-display-password="true"
        />
        <p v-if="passwordConfErrorMessage" class="error-message">{{ passwordConfErrorMessage }}</p>
        <p v-if="passwordValidErrorMessage" class="error-message">
          {{ passwordValidErrorMessage }}
        </p>
      </div>

      <MPasswordCheck :password="form.password" @passedValidate="passedValidate" />
    </template>
    <template #buttons>
      <AButton label="キャンセル" :color="BUTTON.COLOR.GRAY" width="96px" @onClick="onCancel" />
      <AButton
        label="変更"
        :color="canChange ? BUTTON.COLOR.MAIN_DARK : BUTTON.COLOR.GRAY"
        width="96px"
        :disabled="!canChange"
        @onClick="onSave"
      />
    </template>
  </MModalBase>
</template>

<script>
import AInputForm from '@/views/components/AInputForm.vue'
import AButton from '@/views/components/AButton.vue'
import MModalBase from '@/views/components/MModalBase.vue'
import MPasswordCheck from '@/views/components/MPasswordCheck.vue'

import VALIDATE from '@/consts/validate'
import BUTTON from '@/consts/button'

export default {
  components: {
    AInputForm,
    AButton,
    MModalBase,
    MPasswordCheck,
  },

  props: {
    passwordValidErrorMessage: {
      type: String,
      required: false,
      default: '',
    },
  },

  data: () => ({
    BUTTON,
    form: {
      password: '',
      password_confirmation: '',
    },
    passwordErrorMessage: '',
    passwordConfErrorMessage: '',
    isValidPassword: false,
    canChange: false,
  }),

  watch: {
    'form.password': {
      handler(password) {
        this.form.password_confirmation = ''
        if (!password) {
          this.passwordErrorMessage = `新しいパスワード${VALIDATE.MESSAGE.REQUIRED}`
        } else {
          if (!VALIDATE.RULE.PASSWORD.test(password)) {
            this.passwordErrorMessage = '不正な文字が含まれています'
            return
          }
          this.passwordErrorMessage = ''
          this.passwordConfErrorMessage = ''
          this.canChange = this.isValidPassword && password === this.form.password_confirmation
        }
      },
    },

    'form.password_confirmation': {
      handler(passwordConfirmation) {
        if (!passwordConfirmation) {
          this.passwordConfErrorMessage = `新しいパスワード（確認）${VALIDATE.MESSAGE.REQUIRED}`
        } else {
          if (!VALIDATE.RULE.PASSWORD.test(passwordConfirmation)) {
            this.passwordConfErrorMessage = '不正な文字が含まれています'
            return
          }
          this.passwordConfErrorMessage = ''

          if (passwordConfirmation !== this.form.password) {
            this.passwordConfErrorMessage = 'パスワードが一致しません'
            this.canChange = false
          } else if (this.isValidPassword) {
            this.canChange = true
          } else {
            this.canChange = false
          }
        }
      },
    },
  },

  updated() {
    this.form = {
      password: '',
      password_confirmation: '',
    }
  },

  methods: {
    onSave() {
      this.$emit('onChange', this.form)
    },

    onCancel() {
      this.form = {
        password: '',
        password_confirmation: '',
      }
      this.passwordErrorMessage = ''
      this.passwordConfErrorMessage = ''
      this.$emit('onCancel')
    },

    passedValidate(result) {
      this.isValidPassword = result
    },
  },
}
</script>
<style lang="scss" scoped></style>
