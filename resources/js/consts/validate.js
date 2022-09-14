const VALIDATE = {
  RULE: {
    // eslint-disable-next-line no-useless-escape
    EMAIL: /^[A-Za-z0-9]{1}[A-Za-z0-9\+_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/,
    PASSWORD: /[a-zA-Z0-9!-/:-@\\[-`{-~]$/,
    TEL: new RegExp('^0[0-9]{9,10}$'),
    FAX: new RegExp('^(0[0-9]{9,10})?$'),
    ALPHABET: new RegExp('[a-z]'),
    NUMBER: new RegExp('[0-9]'),
    // UPPER_CASE: new RegExp('[A-Z]'),
    // LOWER_CASE: new RegExp('[a-z]'),
    ZIPCODE: new RegExp('^[0-9]{7}$'),
  },
  MESSAGE: {
    EMAIL: '正しいメールアドレスを入力してください',
    REQUIRED: 'を入力してください',
    NUMBER: '半角数字で入力してください',
    TEL: '正しい電話番号を入力してください',
    FAX: '正しいFAX番号を入力してください',
  },
}

export default VALIDATE
