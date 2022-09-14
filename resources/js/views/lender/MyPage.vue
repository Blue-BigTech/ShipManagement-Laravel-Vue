<template>
  <div id="Wrapper" class="lender mypage">
    <div class="lender-inner">
      <MHeader :title="'マイページ'" />
      <h1 class="headline">{{ lenderUser.boat[0].boat_name }}</h1>

      <MMenu />

      <main class="main">
        <section class="main-news">
          <h2 class="main-news-headline">新着情報</h2>
          <dl v-for="(item, index) in news" :key="index" class="main-news-item">
            <dd class="main-news-item-date">{{ item.date }}</dd>
            <dt class="main-news-item-title">{{ item.title }}</dt>
          </dl>
        </section>

        <section class="main-feature">
          <h2 class="main-feature-headline">遊漁船サーチ認定遊漁船の特徴</h2>
          <table class="main-feature-detail">
            <thead>
              <tr>
                <th></th>
                <th>有料会員</th>
                <th>無料会員</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>料金</th>
                <td>
                  <div class="ex-special">
                    オープン記念価格<span class="ex-annotation">※1</span>
                  </div>
                  <del class="ex-standard">15,000円/月</del>
                  12,000円/月
                </td>
                <td>0円/月</td>
              </tr>
              <tr>
                <th>掲載</th>
                <td>〇</td>
                <td>〇</td>
              </tr>
              <tr>
                <th>釣果投稿</th>
                <td>〇</td>
                <td>〇</td>
              </tr>
              <tr>
                <th>優先表示</th>
                <td>〇</td>
                <td>×</td>
              </tr>
              <tr>
                <th>認定マーク</th>
                <td><img class="ex-mark" src="/images/lender/icon_mark.svg" /></td>
                <td>×</td>
              </tr>
              <tr>
                <th>
                  他社ページでの<br />
                  オススメ表示
                </th>
                <td>〇</td>
                <td>×</td>
              </tr>
              <tr>
                <th>LINE広告</th>
                <td>10回/月<span class="ex-annotation">※2</span></td>
                <td>1回/月</td>
              </tr>
            </tbody>
          </table>
          <ul class="main-feature-annotation">
            <li>※1 オープン記念会員様は解約がない限りこちらの料金となります。</li>
            <li>※2 LINE広告回数は変動する場合があります。</li>
          </ul>
        </section>

        <section class="main-presentation">
          <h3 class="main-presentation-headline ex-increase">
            「圧倒的に集客」するなら<br />
            <strong class="ex-strong">“優先表示が必須”</strong>
          </h3>
          <p class="main-presentation-explain ex-increase">
            有料会員になれば、<br />
            あなたの遊漁船が優先して表示されます。<br />
            多くの人に見てもらえて<br />
            <strong class="ex-point">予約率の大幅UP</strong>が見込めます。
          </p>
          <div class="main-presentation-cut ex-increase">
            <img src="/images/lender/cut_increase.svg" />
          </div>

          <h3 class="main-presentation-headline ex-line">
            釣り好きが集まる<br />
            公式LINEアカウントで<br />
            <strong class="ex-strong">残り人数の募集</strong>や<br />
            <strong class="ex-strong">自慢の釣果</strong>を宣伝できる
          </h3>
          <div class="main-presentation-cut ex-line">
            <img src="/images/lender/cut_line.png" />
          </div>

          <h3 class="main-presentation-headline ex-mark">
            <strong class="ex-strong">遊漁船サーチ認定マーク</strong><br />
            とは？
          </h3>
          <p class="main-presentation-explain ex-mark">
            認定遊漁船（有料会員）は認定マークが付与され、<br />
            <strong class="ex-point">お客様へのアピール</strong>が可能です。<br />
            遊漁船サーチ認定マークがあると、閲覧者に安心感が<br />
            与えられ、<strong class="ex-point">予約につながりやすく</strong>なります。
          </p>
          <div class="main-presentation-cut ex-mark">
            <img src="/images/lender/cut_mark.svg" />
          </div>
        </section>

        <section class="main-howto">
          <h3 class="main-howto-headline">遊漁船サーチの効果的な使い方</h3>
          <div class="main-howto-video">
            <iframe
              width="560"
              height="315"
              src="https://www.youtube.com/embed/IqKz0SfHaqI"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
          </div>
        </section>

        <section class="main-poweredby">
          <h3 class="main-poweredby-headline">運営会社</h3>
          <h4 class="main-poweredby-logo"><img src="/images/lender/logo_technav.png" /></h4>

          <div class="main-poweredby-items container-fluid">
            <dl class="main-poweredby-item row">
              <dt class="col-4">屋号</dt>
              <dd class="col-8">TechNAV（テックナブ）</dd>
            </dl>
            <dl class="main-poweredby-item row">
              <dt class="col-4">代表</dt>
              <dd class="col-8">大田黒 響</dd>
            </dl>
            <dl class="main-poweredby-item row">
              <dt class="col-4">オフィス</dt>
              <dd class="col-8">
                福岡県福岡市博多区網場町4-15<br />
                サン21-201号
              </dd>
            </dl>
            <dl class="main-poweredby-item row">
              <dt class="col-4">tel</dt>
              <dd class="col-8">050-5373-4453（平日11：00〜18：00）</dd>
            </dl>
            <dl class="main-poweredby-item row">
              <dt class="col-4">ホームページ</dt>
              <dd class="col-8">https://technav.jp</dd>
            </dl>
          </div>
        </section>

        <section class="main-lineup">
          <h3 class="main-lineup-headline">
            <span class="main-lineup-headline-caption"><span>遊漁船業者様のIT部門は</span></span>
            <img
              class="main-lineup-headline-logo"
              src="/images/lender/logo_technav.png"
            />にお任せ！！
          </h3>
          <div class="main-lineup-items">
            <dl class="main-lineup-item">
              <dt class="main-lineup-item-copy">ホームページは今の時代に欠かせない</dt>
              <dd class="main-lineup-item-banner ex-website">
                <a href="#">
                  <img class="ex-website" src="/images/lender/icon_website.svg" />
                  <span>ホームページ制作</span>
                </a>
              </dd>
            </dl>
            <dl class="main-lineup-item">
              <dt class="main-lineup-item-copy">今ホームページより重要と言われる</dt>
              <dd class="main-lineup-item-banner ex-google">
                <a href="#">
                  <img class="ex-google" src="/images/lender/icon_google.svg" />
                  <span>Google My business</span>
                </a>
              </dd>
            </dl>
            <dl class="main-lineup-item">
              <dt class="main-lineup-item-copy">若者向けの発信をしていきたいなら</dt>
              <dd class="main-lineup-item-banner ex-sns">
                <a href="#">
                  <img class="ex-facebook" src="/images/lender/icon_facebook.svg" />
                  <img class="ex-instagram" src="/images/lender/icon_instagram.svg" />
                  <span>SNS運用代行</span>
                  <img class="ex-twitter" src="/images/lender/icon_twitter.svg" />
                </a>
              </dd>
            </dl>
            <dl class="main-lineup-item">
              <dt class="main-lineup-item-copy">リピーターを囲い込むなら</dt>
              <dd class="main-lineup-item-banner ex-line">
                <a href="#">
                  <img class="ex-instagram" src="/images/lender/icon_instagram.svg" />
                  <span>公式LINE構築代行</span>
                </a>
              </dd>
            </dl>
          </div>
        </section>
      </main>
      <MFooter />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

import MHeader from '@/views/lender/components/MHeader.vue'
import MFooter from '@/views/lender/components/MFooter.vue'
import MMenu from '@/views/lender/components/MMenu.vue'

export default {
  components: {
    MHeader,
    MFooter,
    MMenu,
  },

  data() {
    return {
      news: [
        { date: '2022.00.00', title: 'ホームページリリースしました' },
        { date: '2022.00.00', title: '遊漁船情報が追加されました' },
        { date: '2022.00.00', title: 'ホームページリリースしました' },
      ],
    }
  },

  computed: {
    ...mapState('userModule', ['lenderUser']),
  },
}
</script>

<style lang="scss" src="@/../sass/lender/common.scss"></style>
<style lang="scss" src="@/../sass/lender/extra.scss"></style>
<style lang="scss" src="@/../sass/lender/mypage.scss"></style>
