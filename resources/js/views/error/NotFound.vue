<template>
  <div class="error d-flex justify-content-center align-items-center">
    <div class="">
      <div class="error__status mb-2">404</div>
      <div class="error__message">
        お客様がアクセスしようとしたページはご覧いただけません。<br />
        以下の原因が考えられます。<br />
        <div class="my-3">
          <ul class="error__list-style">
            <li>ページは移動、もしくは削除されいる可能性がございます。</li>
            <li>アクセスいただいたURLが誤っている可能性がございます。今一度ご確認くださいませ。</li>
            <li>
              ログインセッションが切れた可能性がございます。再度ログインをお願いいたします。
            </li>
            <li>IP制限のため、お使いのインターネットからアクセスができない可能性がございます。</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import BUTTON from '@/consts/button'

export default {
  data: () => ({
    BUTTON,
  }),
}
</script>

<style lang="scss" scoped>
.error {
  height: 100vh;
  &__status {
    width: 100%;
    font-size: 120px;
    font-weight: 350;
    color: $Main;
  }
  &__list-style {
    padding-left: 1.3em;
  }
}
</style>
