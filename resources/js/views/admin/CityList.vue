<template>
  <MBaseList
    title="市町村 一覧"
    :pagination-data="paginationData"
    @onRegister="onRegister"
    @getPagination="getPaginationResults"
  >
    <template #breadcrumb></template>
    <template #search>
      <!-- フェーズ2以降で使うので残しておく 2022/6/5 -->
      <!-- <div class="my-3">
        <ASearchBox placeholder="市町村名,コメント" @search="onSearch"></ASearchBox>
      </div> -->
    </template>
    <template #content>
      <div class="table-wrapper">
        <table ref="table" class="table table-hover">
          <thead>
            <tr>
              <th scope="col" class="sort-header" @click="onSort('id')">ID</th>
              <th scope="col" class="sort-header" @click="onSort('city_name')">市区町村</th>
              <th scope="col" class="sort-header" @click="onSort('url_param')">URL</th>
              <th scope="col" class="sort-header" @click="onSort('comment')">コメント</th>
              <th scope="col" class="sort-header" @click="onSort('create_at')">登録日</th>
              <th scope="col" class="sort-header" @click="onSort('created_user_name')">登録者</th>
              <th scope="col" class="sort-header" @click="onSort('updated_at')">更新日</th>
              <th scope="col" class="sort-header" @click="onSort('updated_user_name')">更新者</th>
              <th scope="col" class="sort-header">アクション</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(city, i) in cityIndexData" :key="i">
              <td class="align-middle py-1 pointer" @click="onDetail(city.id)">
                {{ city.id }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(city.id)">
                {{ city.city_name }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(city.id)">
                {{ city.url_param }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(city.id)">
                {{ city.comment }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(city.id)">
                {{ city.created_at ? city.created_at : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(city.id)">
                {{ city.created_user_name ? city.created_user_name : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(city.id)">
                {{ city.updated_at ? city.updated_at : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(city.id)">
                {{ city.updated_user_name ? city.updated_user_name : '' }}
              </td>
              <td class="d-flex justify-content-around align-middle py-1">
                <AButton
                  label="詳細"
                  width="96px"
                  class="ml-2"
                  :color="BUTTON.COLOR.MAIN_DARK"
                  @onClick="onDetail(city.id)"
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
// import ASearchBox from '@/views/components/ASearchBox.vue' /フェーズ2以降で使うので残しておく 2022/6/5
import MBaseList from '@/views/admin/components/MBaseList'

import BUTTON from '@/consts/button'
import ROUTE from '@/consts/route'
import HTTP_STATUS from '@/consts/httpStatus'

import { RepositoryFactory } from '@/repositories/repositoryFactory'

const CityRepository = RepositoryFactory.get('cities')

export default {
  components: {
    AButton,
    // ASearchBox, /フェーズ2以降で使うので残しておく 2022/6/5
    MBaseList,
  },
  data: () => ({
    BUTTON,
    page: 1,
    keyword: '',
    sortKey: 'id',
    isAsc: true,
    paginationData: {},
    cityIndexData: [],
  }),

  created() {
    this.showLoader()
    this.fetchCityIndex()
    this.hideLoader()
  },

  methods: {
    async fetchCityIndex() {
      const orderBy = this.isAsc ? 'asc' : 'desc'
      await CityRepository.fetchCityIndex(this.page, this.sortKey, orderBy, this.keyword)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.paginationData = res.data
          this.cityIndexData = res.data.data
          this.cityIndexData.forEach(x => {
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
        name: ROUTE.ADMIN.CITY.DETAIL.name,
        params: { id: 'new' },
      })
    },

    onDetail(id) {
      this.$router.push({
        name: ROUTE.ADMIN.CITY.DETAIL.name,
        params: { id },
      })
    },
    /*-------------------------------------------*/
    /* 一覧共通
    /*-------------------------------------------*/
    async getPaginationResults(page) {
      this.page = page
      this.showLoader()
      await this.fetchCityIndex()
      this.hideLoader()
    },
    async onSort(key) {
      this.isAsc = this.sortKey === key ? !this.isAsc : true
      this.sortKey = key

      this.showLoader()
      await this.fetchCityIndex()
      this.hideLoader()
    },
    async onSearch(keyword) {
      this.keyword = keyword
      this.showLoader()
      await this.fetchCityIndex()
      this.hideLoader()
    },
  },
}
</script>
