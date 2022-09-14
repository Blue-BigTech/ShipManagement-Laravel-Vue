<template>
  <div id="Wrapper" class="provider container-fluid">
    <MHeader />
    <ONavbar />

    <main class="main">
      <nav class="main-navi" aria-label="breadcrumb">
        <ol class="main-navi-breadcrumbs breadcrumb">
          <li class="main-navi-breadcrumbs-item breadcrumb-item">
            <router-link :to="{ name: ROUTE.VIEWER.HOME.name }">遊漁船サーチ</router-link>
          </li>
          <li class="main-navi-breadcrumbs-item breadcrumb-item">
            <router-link :to="'/boats/list/' + prefectureParam + '/all'">{{
              boatDetail.lender.prefecture.prefecture_name
            }}</router-link>
          </li>
          <li class="main-navi-breadcrumbs-item breadcrumb-item active">
            {{ boatDetail.lender.port.port_name }}
          </li>
        </ol>
      </nav>

      <section class="main-summary">
        <dl class="main-summary-overview">
          <dt class="main-summary-overview-name">{{ boatDetail.boat_name }}</dt>
          <dd class="main-summary-overview-port">
            {{ boatDetail.lender.port.port_name }}
            <span class="main-summary-overview-port-address">{{ boatDetail.lender.address }}</span>
          </dd>
          <dd class="main-summary-overview-review">★★★★☆</dd>
        </dl>

        <div
          id="OverviewImages"
          class="main-summary-slides carousel slide"
          data-ride="carousel"
          data-touch="true"
          data-wrap="true"
        >
          <div v-if="imageList.length" class="carousel-inner">
            <div
              v-for="(image, index) in imageList"
              :key="index"
              class="main-summary-slide carousel-item"
              :class="{ active: index == 0 }"
            >
              <div class="main-summary-slide-item">
                <div class="main-summary-slide-item-inner">
                  <img :src="image" />
                </div>
              </div>
            </div>
          </div>
          <span
            v-if="imageList.length >= 2"
            class="main-summary-slides-arrow ex-prev carousel-control-prev"
            data-target="#OverviewImages"
            role="button"
            data-slide="prev"
          >
            <span class="sr-only">Previous</span>
          </span>
          <span
            v-if="imageList.length >= 2"
            class="main-summary-slides-arrow ex-next carousel-control-next"
            data-target="#OverviewImages"
            role="button"
            data-slide="next"
          >
            <span class="sr-only">Next</span>
          </span>
        </div>

        <!-- ファシリティ -->
        <div class="main-summary-facilities">
          <div class="row">
            <dl
              v-for="(facility, fIndex) in boatDetail.facilities"
              :key="fIndex"
              class="main-summary-facility col"
            >
              <dd class="main-summary-facility-icon">
                <img :src="facility.icon_img" :alt="facility.facility_name" />
              </dd>
              <dt class="main-summary-facility-name">{{ facility.facility_name }}</dt>
            </dl>
          </div>
        </div>
        <!-- 業種、所在地、代表者名、電話番号... -->
        <div class="main-summary-information">
          <div class="main-summary-information-items container-fluid">
            <dl class="main-summary-information-item row">
              <dt class="col-3">業種</dt>
              <dd class="col-9">{{ operations }}</dd>
            </dl>
            <dl class="main-summary-information-item row">
              <dt class="col-3">所在地</dt>
              <dd class="col-9">
                〒 {{ boatDetail.lender.zip_code }}<br />{{
                  boatDetail.lender.prefecture.prefecture_name
                }}{{ boatDetail.lender.city.city_name }}{{ boatDetail.lender.address }}
              </dd>
            </dl>
            <dl class="main-summary-information-item row">
              <dt class="col-3">代表者名</dt>
              <dd class="col-9">{{ boatDetail.lender.user.name }}</dd>
            </dl>
            <dl class="main-summary-information-item row">
              <dt class="col-3">電話番号</dt>
              <dd class="col-9">
                <a :href="'tel:' + boatDetail.lender.phone">{{ boatDetail.lender.phone }}</a>
              </dd>
            </dl>
            <div class="main-summary-information-tell">「遊漁船サーチをみた」とお伝えください</div>
          </div>
          <div class="main-summary-information-call">
            <a :href="'tel:' + boatDetail.lender.phone"
              ><img src="/images/common/icon_call.svg" alt="電話をかける"
            /></a>
          </div>
        </div>
      </section>

      <!-- タブ- 基本情報 -->
      <ul class="main-tabs nav nav-tabs">
        <li class="main-tab nav-item">
          <div data-target="#Information" class="main-tab-link nav-link active" data-toggle="tab">
            基本情報
          </div>
        </li>
        <li class="main-tab nav-item">
          <div data-target="#Plan" class="main-tab-link nav-link" data-toggle="tab">プラン</div>
        </li>
        <li class="main-tab nav-item">
          <div data-target="#Result" class="main-tab-link nav-link" data-toggle="tab">釣果</div>
        </li>
        <li class="main-tab nav-item">
          <div data-target="#Access" class="main-tab-link nav-link" data-toggle="tab">アクセス</div>
        </li>
      </ul>

      <div class="main-tab tab-content">
        <section id="Information" class="main-tab-information tab-pane fade show active">
          <dl class="main-tab-information-comment">
            <dt class="main-tab-information-comment-headline ex-headline">
              <span>船長から一言</span>
            </dt>
            <dd class="main-tab-information-comment-content">{{ boatDetail.caption_comment }}</dd>
          </dl>

          <dl class="main-tab-information-target">
            <dt class="main-tab-information-target-headline ex-headline">
              <span>ターゲット</span>
            </dt>
            <dd class="main-tab-information-target-items container-fluid">
              <dl
                v-for="(target, tIndex) in targetAllSeasonList"
                :key="tIndex"
                class="main-tab-information-target-item row"
              >
                <dt v-if="tIndex !== 0" class="main-tab-information-target-item-index col-1">
                  {{ SEASON.NAME[tIndex] }}
                </dt>
                <dd class="main-tab-information-target-item-value col-11">{{ target }}</dd>
              </dl>
              <dl></dl>
            </dd>
          </dl>

          <dl class="main-tab-information-other">
            <dt class="main-tab-information-other-headline ex-headline"><span>その他情報</span></dt>
            <dd class="main-tab-information-other-items container-fluid">
              <dl class="main-tab-information-other-item row">
                <dt class="main-tab-information-other-item-index col-4">対応エリア</dt>
                <dd class="main-tab-information-other-item-value col-8">
                  {{ boatDetail.fishing_area }}
                </dd>
              </dl>
              <dl class="main-tab-information-other-item row">
                <dt class="main-tab-information-other-item-index col-4">最大定員</dt>
                <dd class="main-tab-information-other-item-value col-8">
                  {{ boatDetail.capacity }}名
                </dd>
              </dl>
              <dl class="main-tab-information-other-item row">
                <dt class="main-tab-information-other-item-index col-4">出港時間</dt>
                <dd class="main-tab-information-other-item-value col-8">
                  {{ boatDetail.departure }}
                </dd>
              </dl>
              <dl class="main-tab-information-other-item row">
                <dt class="main-tab-information-other-item-index col-4">釣り座の決め方</dt>
                <dd class="main-tab-information-other-item-value col-8">
                  {{ boatDetail.fishing_point }}
                </dd>
              </dl>
              <dl class="main-tab-information-other-item row">
                <dt class="main-tab-information-other-item-index col-4">料金</dt>
                <dd class="main-tab-information-other-item-value col-8">
                  {{ boatDetail.lender.price }}
                </dd>
              </dl>
              <dl class="main-tab-information-other-item row">
                <dt class="main-tab-information-other-item-index col-4">支払方法</dt>
                <dd class="main-tab-information-other-item-value col-8">{{ paymentOptions }}</dd>
              </dl>
              <!-- <dl
                v-for="(other, oIndex) in provider.others"
                :key="oIndex"
                class="main-tab-information-other-item row"
              >
                <dt class="main-tab-information-other-item-index col-4">{{ oIndex }}</dt>
                <dd class="main-tab-information-other-item-value col-8">{{ other }}</dd>
              </dl> -->
            </dd>
          </dl>
        </section>

        <!-- タブ- プラン -->
        <section id="Plan" class="main-tab-plan tab-pane fade">
          <div v-for="(plan, pIndex) in plans" :key="pIndex" class="main-tab-plan-inner">
            <h3 class="ex-headline">
              <span>{{ plan.name }}</span>
            </h3>

            <div class="main-tab-plan-items container-fluid">
              <dl class="main-tab-plan-item row">
                <dt class="col-3">ターゲット</dt>
                <dd class="col-9">{{ plan.target }}</dd>
              </dl>
              <dl class="main-tab-plan-item row">
                <dt class="col-3">時期</dt>
                <dd class="col-9">{{ plan.season }}</dd>
              </dl>
              <dl class="main-tab-plan-item row">
                <dt class="col-3">業種</dt>
                <dd class="col-9">{{ plan.industry }}</dd>
              </dl>
              <dl class="main-tab-plan-item row">
                <dt class="col-3">料金</dt>
                <dd class="col-9">{{ plan.price }}</dd>
              </dl>
            </div>
            <div class="main-tab-plan-view" data-toggle="modal" :data-target="'#Plan' + pIndex">
              このプランを見る
            </div>

            <div :id="'Plan' + pIndex" class="main-tab-plan-modal modal fade" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="main-tab-plan-modal-content modal-body">
                  <div class="main-tab-plan-modal-content-close" data-dismiss="modal">
                    <img src="/images/common/icon_close.svg" />
                  </div>
                  <p class="main-tab-plan-modal-content-explain">{{ plan.explain }}</p>

                  <div class="main-tab-plan-modal-content-items container-fluid">
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">ターゲット</dt>
                      <dd class="col-8">{{ plan.target }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">時期</dt>
                      <dd class="col-8">{{ plan.season }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">業種</dt>
                      <dd class="col-8">{{ plan.industry }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">料金</dt>
                      <dd class="col-8">{{ plan.price }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">料金に含まれるもの</dt>
                      <dd class="col-8">{{ plan.include }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">準備が必要なもの</dt>
                      <dd class="col-8">{{ plan.required }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">出航時間</dt>
                      <dd class="col-8">{{ plan.start }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">集合時間</dt>
                      <dd class="col-8">{{ plan.meeting }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">帰港時間</dt>
                      <dd class="col-8">{{ plan.end }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">予約方法</dt>
                      <dd class="col-8">{{ plan.reserve }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">支払い方法</dt>
                      <dd class="col-8">{{ plan.payment }}</dd>
                    </dl>
                    <dl class="main-tab-plan-modal-content-item row">
                      <dt class="col-4">釣り方</dt>
                      <dd class="col-8">{{ plan.method }}</dd>
                    </dl>
                  </div>

                  <dl class="main-tab-plan-modal-content-note">
                    <dt>備考</dt>
                    <dd>
                      {{ plan.note }}
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- タブ- 釣果情報 -->
        <section id="Result" class="main-tab-result tab-pane fade">
          <div
            v-if="lenderPostIndex.length === 0"
            class="mx-5 font-weight-bold d-flex justify-content-center align-items-center"
          >
            釣果情報は投稿されておりません。
          </div>
          <div
            v-for="(result, rIndex) in lenderPostIndex"
            :key="rIndex"
            class="main-tab-result-inner"
          >
            <div class="main-tab-result-items container-fluid">
              <dl class="main-tab-result-date row">
                <dt class="col-2">日時：</dt>
                <dd class="col-10">{{ result.updated_at }}</dd>
              </dl>
              <h3 class="main-tab-result-headline col-12">{{ result.title }}</h3>
              <dl class="main-tab-result-item row">
                <dt class="col-2">釣り方</dt>
                <dd class="col-10">{{ result.fishing_option_names }}</dd>
              </dl>
              <dl class="main-tab-result-item row">
                <dt class="col-2">魚種</dt>
                <dd class="col-10">{{ result.target_names }}</dd>
              </dl>
            </div>
            <p>
              {{ result.explain }}
            </p>

            <div
              :id="'ResultImages' + rIndex"
              class="main-tab-result-slides carousel slide"
              data-ride="carousel"
              data-touch="true"
              data-wrap="true"
            >
              <div class="carousel-inner">
                <div
                  v-for="(image, iIndex) in result.post_images"
                  :key="iIndex"
                  class="main-tab-result-slide carousel-item"
                  :class="{ active: iIndex === 0 }"
                >
                  <div class="main-tab-result-slide-item">
                    <div class="main-tab-result-slide-item-inner">
                      <img :src="image" />
                    </div>
                  </div>
                </div>
              </div>
              <span
                v-if="result.post_images.length >= 2"
                class="main-tab-result-slides-arrow ex-prev carousel-control-prev"
                :data-target="'#ResultImages' + rIndex"
                role="button"
                data-slide="prev"
              >
                <span class="sr-only">Previous</span>
              </span>
              <span
                v-if="result.post_images.length >= 2"
                class="main-tab-result-slides-arrow ex-next carousel-control-next"
                :data-target="'#ResultImages' + rIndex"
                role="button"
                data-slide="next"
              >
                <span class="sr-only">Next</span>
              </span>
            </div>
          </div>
          <MPagination
            class="mb-5"
            :pagination-data="postPaginationData"
            @getPaginationResults="getPaginationResults"
          />
        </section>

        <!-- タブ-アクセス -->
        <section id="Access" class="main-tab-access tab-pane fade">
          <p class="main-tab-access-explain">
            {{ boatDetail.lender.zip_code }}<br />{{ boatDetail.lender.prefecture.prefecture_name
            }}{{ boatDetail.lender.city.city_name }}{{ boatDetail.lender.address }}
          </p>
          <div class="main-tab-access-map">
            <iframe
              :src="boatDetail.lender.map_url"
              width="600"
              height="450"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
            ></iframe>
          </div>
        </section>
      </div>

      <section class="ex-recommend">
        <h3 class="ex-recommend-headline"><span>その他オススメ遊漁船一覧</span></h3>

        <MRecommend :paid-members-data="recommendList" />
      </section>

      <section class="ex-search ex-bottom">
        <ASelectArea
          :id="'AreaChoice'"
          :label="`${boatDetail.lender.prefecture.prefecture_name}のエリアで絞り込む`"
          :city-list="[1, 2, 3]"
          @onList="onSearchList"
        />
      </section>
    </main>
    <MFooter />
  </div>
</template>

<script>
import moment from 'moment'

// component
import ASelectArea from '@/views/viewer/components/ASelectArea.vue'
import MHeader from '@/views/viewer/components/MHeader.vue'
import MFooter from '@/views/viewer/components/MFooter.vue'
import MRecommend from '@/views/viewer/components/MRecommend.vue'
import MPagination from '@/views/components/MPagination.vue'
import ONavbar from '@/views/viewer/components/ONavbar.vue'
// const
import ROUTE from '@/consts/route'
import HTTP_STATUS from '@/consts/httpStatus'
import SEASON from '@/consts/season'
// repository
import { RepositoryFactory } from '@/repositories/repositoryFactory'

const boatRepository = RepositoryFactory.get('boats')
const cityRepository = RepositoryFactory.get('cities')
const lenderPostRepository = RepositoryFactory.get('lenderPosts')

export default {
  components: {
    ASelectArea,
    MHeader,
    MFooter,
    MRecommend,
    MPagination,
    ONavbar,
  },

  props: {
    id: {
      type: null,
      required: true,
      default: null,
    },
  },

  data() {
    return {
      recommendList: [
        {
          name: '瀬渡し船ニュー大漁丸',
          port: '安瀬港',
          review: '★★★★☆',
          industry: '〇〇〇〇〇〇',
          address: '〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇',
          method: '〇〇〇〇〇〇〇〇〇',
          boat_img_1: '/storage/images/dummy/dummy.png',
          tel: '0120-777-777',
          comment:
            '本文（自由入力）今日は干潮前30分から良型が集中したらしく30cmオーバー数釣でした。今日は干潮前30分から良型が集中し',
          url: '#',
        },
        {
          name: '瀬渡し船ニュー大漁丸',
          port: '安瀬港',
          review: '★★★★☆',
          industry: '〇〇〇〇〇〇',
          address: '〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇',
          method: '〇〇〇〇〇〇〇〇〇',
          boat_img_1: '/storage/images/dummy/dummy.png',
          tel: '0120-777-777',
          comment:
            '本文（自由入力）今日は干潮前30分から良型が集中したらしく30cmオーバー数釣でした。今日は干潮前30分から良型が集中し',
          url: '#',
        },
      ],
      plans: [
        {
          name: '（プラン名）玄界灘沖ジギングプラン',
          target: '〇〇〇、〇〇〇、〇〇〇',
          season: '00〜00月',
          industry: '乗合',
          price: '1人 00,000円',
          include: '〇〇〇〇〇〇〇〇〇',
          bringing: '〇〇〇〇〇〇〇〇〇',
          start: '00：00',
          meeting: '00:00',
          end: '00：00',
          reserve: '〇〇〇〇〇〇〇〇〇',
          payment: '〇〇〇〇〇〇〇〇〇',
          method: '〇〇〇〇〇〇〇〇〇',
          note:
            '●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇\n●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇\n●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇\n●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇\n●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇',
          explain:
            'プラン紹介（自由入力）\n今日は干潮前30分から良型が集中したらしく30cmオーバー数釣でした。今日は干潮前30分から良型が集中したらしく30cmオーバー数釣でした。今日は干潮前30分から良型が集中したらしく30cmオーバー数釣でした。今日は干潮前30分から良型が集中したらしく30cmオーバー数',
        },
        {
          name: '（プラン名）玄界灘沖ジギングプラン',
          target: '〇〇〇、〇〇〇、〇〇〇',
          season: '00〜00月',
          industry: '乗合',
          price: '1人 00,000円',
          include: '〇〇〇〇〇〇〇〇〇',
          bringing: '〇〇〇〇〇〇〇〇〇',
          start: '00：00',
          meeting: '00:00',
          end: '00：00',
          reserve: '〇〇〇〇〇〇〇〇〇',
          payment: '〇〇〇〇〇〇〇〇〇',
          method: '〇〇〇〇〇〇〇〇〇',
          note:
            '●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇\n●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇\n●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇\n●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇\n●〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇',
          explain:
            'プラン紹介（自由入力）\n今日は干潮前30分から良型が集中したらしく30cmオーバー数釣でした。今日は干潮前30分から良型が集中したらしく30cmオーバー数釣でした。今日は干潮前30分から良型が集中したらしく30cmオーバー数釣でした。今日は干潮前30分から良型が集中したらしく30cmオーバー数',
        },
      ],
      ROUTE,
      SEASON,
      page: 1,
      postPaginationData: {},
      boatDetail: {
        facilities: {},
        fishing_options: {},
        operations: {},
        targets: {},
        lender: { prefecture: {}, city: {}, port: {}, user: {}, payment_options: {} },
      },
      imageList: [],
      cityList: [],
      targetAllSeasonList: [],
      lenderPostIndex: [],
      paymentOptions: '',
      operations: '',
      prefectureParam: null,
    }
  },

  async created() {
    this.showLoader()
    await this.fetchBoatShowViewer(this.id)
    await this.fetchCityListByPrefecture(this.boatDetail.lender.prefecture.id)
    await this.fetchLenderPostIndex()
    this.hideLoader()
  },

  methods: {
    /*-------------------------------------------*/
    /* 詳細取得処理 管理者画面
    /*-------------------------------------------*/
    async fetchBoatShowViewer(id) {
      this.showLoader()

      await boatRepository
        .viewerShow(id)
        .then(res => {
          console.log('詳細データチェック', res.data)
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.boatDetail = res.data
          const targetList = this.boatDetail.targets
          const paymentOptionList = this.boatDetail.lender.payment_options
          const operationList = this.boatDetail.operations
          // 都道府県ID
          this.prefectureParam = this.boatDetail.lender.prefecture.url_param
          // 画像配列作成
          if (this.boatDetail.boat_img_1) this.imageList.push(this.boatDetail.boat_img_1)
          if (this.boatDetail.boat_img_2) this.imageList.push(this.boatDetail.boat_img_2)
          if (this.boatDetail.boat_img_3) this.imageList.push(this.boatDetail.boat_img_3)
          if (this.boatDetail.boat_img_4) this.imageList.push(this.boatDetail.boat_img_4)
          if (this.boatDetail.boat_img_5) this.imageList.push(this.boatDetail.boat_img_5)
          // 支払い方法を文字列に変換
          this.paymentOptions = paymentOptionList
            .map(x => {
              return x.payment_option_name
            })
            .join('、')
          // 業種を文字列に変換
          this.operations = operationList
            .map(x => {
              return x.operation_name
            })
            .join('、')
          // ターゲットを季節毎の文字列配列に変換
          if (targetList) {
            this.targetAllSeasonList[SEASON.SPRING] = targetList
              .filter(x => x.pivot.season_id === SEASON.SPRING)
              .map(x => {
                return x.target_name
              })
              .join('、')
            this.targetAllSeasonList[SEASON.SUMMER] = targetList
              .filter(x => x.pivot.season_id === SEASON.SUMMER)
              .map(x => {
                return x.target_name
              })
              .join('、')
            this.targetAllSeasonList[SEASON.AUTUMN] = targetList
              .filter(x => x.pivot.season_id === SEASON.AUTUMN)
              .map(x => {
                return x.target_name
              })
              .join('、')
            this.targetAllSeasonList[SEASON.WINTER] = targetList
              .filter(x => x.pivot.season_id === SEASON.WINTER)
              .map(x => {
                return x.target_name
              })
              .join('、')
          }
        })
        .catch(async err => {
          if (err.response) {
            await this.$errHandling.lenderCatch(err.response.status)
            return
          }
          this.$toast.errorToast()
        })

      this.hideLoader()
    },
    /*-------------------------------------------*/
    /* 釣果情報
    /*-------------------------------------------*/
    async fetchLenderPostIndex() {
      await lenderPostRepository
        .viewerIndex(this.id, this.page)
        .then(res => {
          this.postPaginationData = res.data
          this.lenderPostIndex = res.data.data
          this.lenderPostIndex.forEach(x => {
            if (x.created_at) x.created_at = moment(x.created_at).format('YYYY-MM-DD')
            if (x.updated_at) x.updated_at = moment(x.updated_at).format('YYYY-MM-DD')
            const postImages = []
            if (x.post_img_1) postImages.push(x.post_img_1)
            if (x.post_img_2) postImages.push(x.post_img_2)
            if (x.post_img_3) postImages.push(x.post_img_3)
            if (x.post_img_4) postImages.push(x.post_img_4)
            if (x.post_img_5) postImages.push(x.post_img_5)
            if (x.post_img_6) postImages.push(x.post_img_6)
            x.post_images = postImages
          })
        })
        .catch(err => {
          console.log(err)
        })
    },
    // lenderPostIndex
    /*-------------------------------------------*/
    /* 都道府県 情報取得
    /*-------------------------------------------*/
    // 都道府県IDのpropsが渡ってきてる場合
    async fetchCityListByPrefecture(prefectureId) {
      await cityRepository
        .viewerFetchCityListByPrefectureId(prefectureId)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.cityList = res.data
        })
        .catch(() => {
          this.$toast.errorToast()
        })
    },
    /*-------------------------------------------*/
    /* その他
    /*-------------------------------------------*/
    onSearchList(cityParam) {
      this.$router.push({
        name: ROUTE.VIEWER.BOAT.LIST.name,
        params: { prefectureParam: this.prefectureParam, cityParam },
      })
    },
    async getPaginationResults(page) {
      this.page = page
      this.showLoader()
      await this.fetchLenderPostIndex()
      this.hideLoader()
    },
  },
}
</script>

<style lang="scss" src="@/../sass/viewer/common.scss"></style>
<style lang="scss" src="@/../sass/viewer/extra.scss"></style>
<style lang="scss" src="@/../sass/viewer/boatDetail.scss"></style>
