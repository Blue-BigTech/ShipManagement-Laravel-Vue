<template>
  <div id="Wrapper" class="about container-fluid">
    <MHeader />
    <ONavibar />

    <main class="main">
      <section>
        <div class="main-logo">
          <img src="/images/about/logo_mv_search.svg" alt="遊漁船サーチ" />
        </div>
        <h2 class="main-headline">
          遊漁船は楽しい！釣れる！<br />
          全国の遊漁船が見つかる<br />
          ポータルサイト
        </h2>
        <p class="main-greeting">
          遊漁船サーチは、〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
        </p>
      </section>

      <section class="main-summary">
        <h3 class="main-summary-headline">
          遊漁船利用ってどこか<br />
          ハードルが高い印象はありませんか？
        </h3>
        <p class="main-summary-explain">
          どの釣船を選べば良いか分からないし、〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
        </p>
      </section>

      <section class="main-purpose">
        <h3 class="main-purpose-headline">
          遊漁船サーチでやりたいこと
        </h3>
        <div class="main-purpose-explain container-fluid">
          <div class="main-purpose-explain-inner row">
            <dl class="col-4">
              <dd class="main-purpose-explain-image">
                <img src="/images/about/cut_purpose1.svg" />
              </dd>
              <dt class="main-purpose-explain-headline">
                遊漁船を<br />
                たくさん掲載
              </dt>
              <dd class="main-purpose-explain-suply">
                全国すべての<br />
                遊漁船を掲載したい
              </dd>
            </dl>
            <dl class="col-4">
              <dd class="main-purpose-explain-image">
                <img src="/images/about/cut_purpose2.svg" />
              </dd>
              <dt class="main-purpose-explain-headline">
                遊漁船<br />
                初心者に優しい
              </dt>
              <dd class="main-purpose-explain-suply">
                全国すべての<br />
                遊漁船を掲載したい
              </dd>
            </dl>
            <dl class="col-4">
              <dd class="main-purpose-explain-image">
                <img src="/images/about/cut_purpose3.svg" />
              </dd>
              <dt class="main-purpose-explain-headline">
                遊漁船の情報を<br />
                わかりやすく
              </dt>
              <dd class="main-purpose-explain-suply">
                全国すべての<br />
                遊漁船を掲載したい
              </dd>
            </dl>
          </div>
        </div>
      </section>

      <section class="main-wanted">
        <dl>
          <dt class="main-wanted-headline">釣り好きのみなさん協力してください</dt>
          <dd class="main-wanted-explain">
            遊漁船サーチは釣り好きみんなで盛り上げるサイトです。<br />
            皆さんのオススメ釣り船をご紹介ください。
          </dd>
          <dd class="main-wanted-overview">
            <MWanted />
          </dd>
        </dl>
      </section>

      <section class="main-reason">
        <h3 class="main-reason-headline">遊漁船サーチを立ち上げたきっかけ</h3>
        <p class="main-reason-explain">
          私は、釣りを始めた時、〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
        </p>
      </section>
    </main>
    <MFooter />
  </div>
</template>

<script>
import MHeader from '@/views/viewer/components/MHeader.vue'
import ONavibar from '@/views/viewer/components/ONavbar.vue'
import MWanted from '@/views/viewer/components/MWanted.vue'
import MFooter from '@/views/viewer/components/MFooter.vue'

export default {
  components: {
    MHeader,
    ONavibar,
    MWanted,
    MFooter,
  },
}
</script>

<style lang="scss" src="@/../sass/viewer/common.scss"></style>
<style lang="scss" src="@/../sass/viewer/extra.scss"></style>
<style lang="scss" src="@/../sass/viewer/about.scss"></style>
