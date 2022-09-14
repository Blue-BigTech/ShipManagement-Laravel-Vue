<template>
  <footer class="footer">
    <section class="footer-area">
      <div class="footer-area-headline">都道府県から遊漁船を探す</div>
      <div class="footer-area-inner container-fluid p-0">
        <div v-for="(region, ri) in footerRegionList" :key="ri">
          <h5 class="footer-area-category">{{ region.region_name }}</h5>
          <ul class="footer-area-prefs row p-0">
            <li
              v-for="(prefecture, pi) in region.prefectures"
              :key="pi"
              class="footer-area-pref col-2"
            >
              <router-link :to="'/boats/list/' + prefecture.url_param + '/all'">{{
                prefecture.prefecture_name
              }}</router-link>
            </li>
            <!-- <li
              v-for="(prefecture, pi) in region.prefectures"
              :key="pi"
              class="footer-area-pref col-2"
              @click="onBoatList(prefecture.url_param)"
            >
              {{ prefecture.prefecture_name }}
            </li> -->
          </ul>
        </div>
        <!-- <h5 class="footer-area-category">北海道・東北</h5>
        <ul class="footer-area-prefs row p-0">
          <li class="footer-area-pref col-2"><router-link to="#">北海道</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">青森県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">岩手県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">秋田県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">宮城県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">山形県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">福島県</router-link></li>
        </ul>
        <h5 class="footer-area-category">関東</h5>
        <ul class="footer-area-prefs row p-0">
          <li class="footer-area-pref col-2"><router-link to="#">茨城県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">栃木県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">群馬県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">埼玉県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">千葉県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">東京都</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">神奈川県</router-link></li>
        </ul>
        <h5 class="footer-area-category">北陸・甲信越</h5>
        <ul class="footer-area-prefs row p-0">
          <li class="footer-area-pref col-2"><router-link to="#">富山県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">石川県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">福井県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">山梨県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">長野県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">新潟県</router-link></li>
        </ul>
        <h5 class="footer-area-category">東海</h5>
        <ul class="footer-area-prefs row p-0">
          <li class="footer-area-pref col-2"><router-link to="#">岐阜県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">静岡県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">愛知県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">三重県</router-link></li>
        </ul>
        <h5 class="footer-area-category">近畿</h5>
        <ul class="footer-area-prefs row p-0">
          <li class="footer-area-pref col-2"><router-link to="#">滋賀県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">京都府</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">大阪府</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">兵庫県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">奈良県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">和歌山県</router-link></li>
        </ul>
        <h5 class="footer-area-category">中国・四国</h5>
        <ul class="footer-area-prefs row p-0">
          <li class="footer-area-pref col-2"><router-link to="#">鳥取県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">島根県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">岡山県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">広島県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">山口県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">徳島県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">香川県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">愛媛県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">高知県</router-link></li>
        </ul>
        <h5 class="footer-area-category">九州・沖縄</h5>
        <ul class="footer-area-prefs row p-0">
          <li class="footer-area-pref col-2"><router-link to="#">福岡県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">佐賀県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">長崎県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">熊本県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">大分県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">宮崎県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">鹿児島県</router-link></li>
          <li class="footer-area-pref col-2"><router-link to="#">沖縄県</router-link></li>
        </ul> -->
      </div>
    </section>

    <ul class="footer-sns">
      <li>
        <a href="#"><img src="/images/common/icon_sns_twitter.svg"/></a>
      </li>
      <li>
        <a href="#"><img src="/images/common/icon_sns_instagram.svg"/></a>
      </li>
      <li>
        <a href="#"><img src="/images/common/icon_sns_facebook.svg"/></a>
      </li>
      <li>
        <a href="#"><img src="/images/common/icon_sns_line.svg"/></a>
      </li>
    </ul>

    <ul class="footer-menus">
      <li>
        <router-link :to="ROUTE.VIEWER.ABOUT.path" class="footer-menu"
          >遊漁船サーチとは</router-link
        >
        <a href="#" class="footer-menu">遊漁船を探す</a>
        <a :href="ROUTE_HTML.BOOK" class="footer-menu">船釣りの始め方</a>
      </li>
      <li>
        <a :href="ROUTE_HTML.CALL" class="footer-menu">予約電話のコツ</a>
        <a :href="ROUTE_HTML.TO_LENDER" class="footer-menu">遊漁船業者様へ</a>
      </li>
      <li>
        <a :href="ROUTE_HTML.FAQ" class="footer-menu">よくある質問</a>
        <a :href="ROUTE_HTML.CONTACT" class="footer-menu">お問合せ</a>
      </li>
    </ul>

    <div class="footer-links container-fluid">
      <div class="row">
        <div class="col-6">
          <router-link :to="ROUTE.LENDER.LOGIN.path" class="footer-link">業者ログイン</router-link>
          <a :href="ROUTE_HTML.REGIST" class="footer-link">掲載依頼</a>
          <a :href="ROUTE_HTML.COMPANY" class="footer-link">運営会社</a>
          <a :href="ROUTE_HTML.POLICY" class="footer-link">プライバシーポリシー</a>
        </div>
        <div class="col-6">
          <a :href="ROUTE_HTML.LEGAL" class="footer-link">特定商法取引</a>
          <a :href="ROUTE_HTML.AGREEMENT" class="footer-link">利用規約</a>
          <a :href="ROUTE_HTML.MASS" class="footer-link">マスコミの方へ</a>
          <a :href="ROUTE_HTML.LINK" class="footer-link">リンクについて</a>
        </div>
      </div>
    </div>

    <div class="footer-logo">
      <router-link to="/"><img class="mw-100" src="/images/common/logo_footer.svg"/></router-link>
    </div>

    <small class="footer-copyright">copyright©yugyosensearch all rights reserved.</small>
  </footer>
</template>
<script>
import { mapState } from 'vuex'
// const
import ROUTE from '@/consts/route'
import ROUTE_HTML from '@/consts/routePHP'

export default {
  data: () => ({ ROUTE, ROUTE_HTML }),

  computed: {
    ...mapState('footerModule', ['footerRegionList']),
  },

  methods: {
    onBoatList(prefectureParam) {
      this.$router.push({
        name: ROUTE.VIEWER.BOAT.LIST.name,
        params: { prefectureParam, cityParam: 'all' },
      })
    },
  },
}
</script>
