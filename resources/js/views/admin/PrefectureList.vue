<template>
  <MBaseList
    title="都道府県 一覧"
    :pagination-data="paginationData"
    :is-need-register-btn="false"
    @onRegister="onRegister"
    @getPaginationResults="getPaginationResults"
  >
    <template #breadcrumb> </template>
    <!-- フェーズ2以降で使うので残しておく 2022/6/5 -->
    <!-- <template #search>
      <div class="my-3">
        <ASearchBox placeholder="都道府県名,コメント" @search="onSearch"></ASearchBox>
      </div>
    </template> -->
    <template #content>
      <div class="table-wrapper">
        <table ref="table" class="table table-hover">
          <thead>
            <tr>
              <th scope="col" class="sort-header" @click="onSort('id')">ID</th>
              <th scope="col" class="sort-header" @click="onSort('region_name')">地域名</th>
              <th scope="col" class="sort-header" @click="onSort('prefecture_name')">都道府県名</th>
              <th scope="col" class="sort-header" @click="onSort('comment')">コメント</th>
              <th scope="col" class="sort-header" @click="onSort('created_at')">登録日</th>
              <th scope="col" class="sort-header" @click="onSort('created_user_name')">登録者</th>
              <th scope="col" class="sort-header" @click="onSort('updated_at')">更新日</th>
              <th scope="col" class="sort-header" @click="onSort('updated_user_name')">更新者</th>
              <th scope="col" class="sort-header">アクション</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(prefecture, i) in prefectureIndexData" :key="i">
              <td class="align-middle py-1 pointer" @click="onDetail(prefecture.id)">
                {{ prefecture.id }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(prefecture.id)">
                {{ prefecture.region_name }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(prefecture.id)">
                {{ prefecture.prefecture_name }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(prefecture.id)">
                {{ prefecture.comment }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(prefecture.id)">
                {{ prefecture.created_at ? prefecture.created_at : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(prefecture.id)">
                {{ prefecture.created_user_name ? prefecture.created_user_name : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(prefecture.id)">
                {{ prefecture.updated_at ? prefecture.updated_at : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(prefecture.id)">
                {{ prefecture.updated_user_name ? prefecture.updated_user_name : '' }}
              </td>
              <td class="d-flex justify-content-around align-middle py-1">
                <AButton
                  label="詳細"
                  width="96px"
                  class="ml-2"
                  :color="BUTTON.COLOR.MAIN_DARK"
                  @onClick="onDetail(prefecture.id)"
                />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
  </MBaseList>
</template>

<script>
import moment from 'moment'

import AButton from '@/views/components/AButton.vue'
// import ASearchBox from '@/views/components/ASearchBox.vue' //フェーズ2以降で使うので残しておく 2022/6/5
import MBaseList from '@/views/admin/components/MBaseList.vue'

import BUTTON from '@/consts/button'
import ROUTE from '@/consts/route'
import HTTP_STATUS from '@/consts/httpStatus'

import { RepositoryFactory } from '@/repositories/repositoryFactory'

const PrefectureRepository = RepositoryFactory.get('prefectures')

export default {
  components: {
    AButton,
    // ASearchBox, //フェーズ2以降で使うので残しておく 2022/6/5
    MBaseList,
  },

  data: () => ({
    BUTTON,
    page: 1,
    keyword: '',
    sortKey: 'id',
    isAsc: true,
    paginationData: {},
    prefectureIndexData: [],
  }),

  created() {
    this.showLoader()
    this.fetchPrefectureIndex()
    this.hideLoader()
  },

  methods: {
    async fetchPrefectureIndex() {
      const orderBy = this.isAsc ? 'asc' : 'desc'
      await PrefectureRepository.fetchPrefectureIndex(
        this.page,
        this.keyword,
        this.sortKey,
        orderBy
      )
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.paginationData = res.data
          this.prefectureIndexData = res.data.data
          this.prefectureIndexData.forEach(x => {
            if (x.created_at) x.created_at = moment(x.created_at).format('YYYY-MM-DD')
            if (x.updated_at) x.updated_at = moment(x.updated_at).format('YYYY-MM-DD')
          })
        })
        .catch(async err => {
          if (err.response) {
            await this.$errHandling.adminCatch(err.response.status)
            return
          }
          this.$toast.errorToast()
        })
    },

    onRegister() {
      this.$router.push({
        name: ROUTE.ADMIN.PREFECTURE.DETAIL.name,
        params: { id: 'new' },
      })
    },

    onDetail(id) {
      this.$router.push({
        name: ROUTE.ADMIN.PREFECTURE.DETAIL.name,
        params: { id },
      })
    },
    /*-------------------------------------------*/
    /* 一覧共通
    /*-------------------------------------------*/
    async getPaginationResults(page) {
      this.page = page
      this.showLoader()
      await this.fetchPrefectureIndex()
      this.hideLoader()
    },
    async onSort(key) {
      this.isAsc = this.sortKey === key ? !this.isAsc : true
      this.sortKey = key

      this.showLoader()
      await this.fetchPrefectureIndex()
      this.hideLoader()
    },
    async onSearch(keyword) {
      this.keyword = keyword
      this.showLoader()
      await this.fetchPrefectureIndex()
      this.hideLoader()
    },
  },
}
</script>
