<template>
  <div>
    <div v-for="(confItem, ci) in confItems" :key="ci" class="cts-flex cts-align-items-center">
      <i
        class="fas fa-check-circle icon-field"
        :style="{ color: checkPassword(confItem.key).color }"
      ></i>
      <span class="check-text" :class="{ goodtext: checkPassword(confItem.key).isPassed }">{{
        confItem.text
      }}</span>
    </div>
  </div>
</template>

<script>
import VALIDATE from '@/consts/validate'

const CONF_ITEMS = {
  LENGTH: {
    key: 'length',
    text: '6文字以上24文字以下',
  },
  ALPHABET: {
    key: 'alphabet',
    text: '英語',
  },
  NUMBER: {
    key: 'number',
    text: '数字',
  },
  // LOWER_CASE: {
  //   key: 'lowerCase',
  //   text: '小文字',
  // },
  // UPPER_CASE: {
  //   key: 'upperCase',
  //   text: '大文字',
  // },
}

export default {
  props: {
    password: {
      type: String,
      required: true,
      default: '',
    },
  },

  data: () => ({
    colorName: '#b3b3b3',
    isLengthGood: false,
    hasAlphabet: false,
    hasNumberCase: false,
    // hasLowerCase: false,
    // hasUpperCase: false,
    confItems: [
      {
        text: CONF_ITEMS.LENGTH.text,
        key: CONF_ITEMS.LENGTH.key,
      },
      {
        text: CONF_ITEMS.ALPHABET.text,
        key: CONF_ITEMS.ALPHABET.key,
      },
      {
        text: CONF_ITEMS.NUMBER.text,
        key: CONF_ITEMS.NUMBER.key,
      },
      // {
      //   text: CONF_ITEMS.LOWER_CASE.text,
      //   key: CONF_ITEMS.LOWER_CASE.key,
      // },
      // {
      //   text: CONF_ITEMS.UPPER_CASE.text,
      //   key: CONF_ITEMS.UPPER_CASE.key,
      // },
    ],
  }),

  watch: {
    password(password) {
      this.isLengthGood = password.length > 5 && password.length < 25
      this.hasAlphabet = VALIDATE.RULE.ALPHABET.test(password)
      this.hasNumberCase = VALIDATE.RULE.NUMBER.test(password)
      // this.hasLowerCase = VALIDATE.RULE.LOWER_CASE.test(password)
      // this.hasUpperCase = VALIDATE.RULE.UPPER_CASE.test(password)

      const result = this.isLengthGood && this.hasAlphabet && this.hasNumberCase
      // this.isLengthGood && this.hasLowerCase && this.hasUpperCase && this.hasNumberCase
      this.$emit('passedValidate', result)
    },
  },

  methods: {
    checkPassword(key) {
      const PASSED_COLOR = '#769D3A'
      let color = '#b3b3b3'
      let isPassed = false

      let result = false
      if (key === CONF_ITEMS.LENGTH.key && this.isLengthGood) result = true
      if (key === CONF_ITEMS.ALPHABET.key && this.hasAlphabet) result = true
      if (key === CONF_ITEMS.NUMBER.key && this.hasNumberCase) result = true
      // if (key === CONF_ITEMS.LOWER_CASE.key && this.hasLowerCase) result = true
      // if (key === CONF_ITEMS.UPPER_CASE.key && this.hasUpperCase) result = true

      if (result) {
        color = PASSED_COLOR
        isPassed = true
      }

      return { color, isPassed }
    },
  },
}
</script>

<style lang="scss" scoped>
.check-text {
  font-size: 12px;
  font-weight: normal;
  color: #b3b3b3;
  line-height: 1.67;
  text-align: left;
  padding-left: 8px;
}
.goodtext {
  color: #191919;
}
.icon-field {
  width: 16px;
  color: #b3b3b3;
}
.flex {
  display: flex;
  align-items: center;
}
</style>
