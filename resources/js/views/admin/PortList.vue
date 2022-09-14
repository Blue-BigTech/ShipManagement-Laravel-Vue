<template>
  <MBaseList
    title="港 一覧"
    :pagination-data="paginationData"
    @onRegister="onRegister"
    @getPaginationResults="getPaginationResults"
  >
    <template #breadcrumb> </template>
    <!-- フェーズ2以降で使うので残しておく 2022/6/5 -->
    <!-- <template #search>
      <div class="my-3">
        <ASearchBox placeholder="港名,コメント" @search="onSearch"></ASearchBox>
      </div>
    </template> -->
    <template #content>
      <div class="table-wrapper">
        <table ref="table" class="table table-hover">
          <thead>
            <tr>
              <th scope="col" class="sort-header" @click="onSort('id')">ID</th>
              <th scope="col" class="sort-header" @click="onSort('prefecture_name')">都道府県</th>
              <th scope="col" class="sort-header" @click="onSort('city_name')">市町村</th>
              <th scope="col" class="sort-header" @click="onSort('port_name')">港名</th>
              <th scope="col" class="sort-header" @click="onSort('comment')">コメント</th>
              <th scope="col" class="sort-header" @click="onSort('created_at')">
                登録日
              </th>
              <th scope="col" class="sort-header" @click="onSort('created_user_name')">
                登録者
              </th>
              <th scope="col" class="sort-header" @click="onSort('updated_at')">
                更新日
              </th>
              <th scope="col" class="sort-header" @click="onSort('updated_user_name')">
                更新者
              </th>
              <th scope="col" class="sort-header">アクション</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(port, i) in portIndexData" :key="i">
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.id }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.prefecture_name }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.city_name }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.port_name }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.comment }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.created_at ? port.created_at : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.created_user_name ? port.created_user_name : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.updated_at ? port.updated_at : '' }}
              </td>
              <td class="align-middle py-1 pointer" @click="onDetail(port.id)">
                {{ port.updated_user_name ? port.updated_user_name : '' }}
              </td>
              <td class="d-flex justify-content-around align-middle py-1">
                <AButton
                  label="詳細"
                  width="96px"
                  class="ml-2"
                  :color="BUTTON.COLOR.MAIN_DARK"
                  @onClick="onDetail(port.id)"
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
// import util from '@/functions/util'
// import store from '@/store'

import AButton from '@/views/components/AButton.vue'

// import ASearchBox from '@/views/components/ASearchBox.vue' // フェーズ2以降で使うので残しておく 2022/6/5
import MBaseList from '@/views/admin/components/MBaseList.vue'

import BUTTON from '@/consts/button'
import ROUTE from '@/consts/route'
import HTTP_STATUS from '@/consts/httpStatus'

import { RepositoryFactory } from '@/repositories/repositoryFactory'

const PortRepository = RepositoryFactory.get('ports')

export default {
  components: {
    AButton,
    // ASearchBox, // フェーズ2以降で使うので残しておく 2022/6/5
    MBaseList,
  },

  data: () => ({
    BUTTON,
    portIndexData: [],
    page: 1,
    keyword: '',
    sortKey: 'id',
    isAsc: true,
    paginationData: {},
  }),

  created() {
    this.showLoader()
    this.fetchPortIndex()
    this.hideLoader()
  },

  methods: {
    async fetchPortIndex() {
      const orderBy = this.isAsc ? 'asc' : 'desc'
      console.log(this.sortKey, orderBy)
      await PortRepository.fetchPortIndex(this.page, this.keyword, this.sortKey, orderBy)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.paginationData = res.data
          this.portIndexData = res.data.data
          this.portIndexData.forEach(x => {
            if (x.created_at) x.created_at = moment(x.created_at).format('YYYY-MM-DD')
            if (x.updated_at) x.updated_at = moment(x.updated_at).format('YYYY-MM-DD')
          })
        })
        .catch(async err => {
          console.log(err)
        })
    },

    onRegister() {
      this.$router.push({
        name: ROUTE.ADMIN.PORT.DETAIL.name,
        params: { id: 'new' },
      })
    },

    onDetail(id) {
      this.$router.push({
        name: ROUTE.ADMIN.PORT.DETAIL.name,
        params: { id },
      })
    },

    /*-------------------------------------------*/
    /* 一覧共通
    /*-------------------------------------------*/
    async getPaginationResults(page) {
      this.page = page
      this.showLoader()
      await this.fetchPortIndex()
      this.hideLoader()
    },
    async onSort(key) {
      this.isAsc = this.sortKey === key ? !this.isAsc : true
      this.sortKey = key

      this.showLoader()
      await this.fetchPortIndex()
      this.hideLoader()
    },
    async onSearch(keyword) {
      this.keyword = keyword
      this.showLoader()
      await this.fetchPortIndex()
      this.hideLoader()
    },
  },
}
</script>
