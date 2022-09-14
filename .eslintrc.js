module.exports = {
  parserOptions: {
    parser: 'babel-eslint',
    sourceType: 'module',
  },
  env: {
    browser: true,
    node: true,
  },
  extends: [
    'eslint:recommended',
    'airbnb-base',
    'plugin:prettier/recommended',
    'plugin:vue/recommended',
    'prettier/vue',
  ],
  plugins: ['vue', 'prettier'],
  rules: {
    // prettierの設定
    'prettier/prettier': [
      'error',
      {
        printWidth: 100,
        singleQuote: true,
        trailingComma: 'es5',
        tabWidth: 2,
        semi: false
      }
    ],
    // eslintの設定
    'global-require': 0,
    'import/no-unresolved': 0,
    'no-param-reassign': 0,
    'import/no-extraneous-dependencies': ['error', {'devDependencies': true}],
    "no-console": "off",
  },
}
