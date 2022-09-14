<template>
  <div>
    <MBaseDetail
      :title="pageTitle"
      :is-new="isNew"
      :is-editing="isEditing"
      :is-display-back-btn="false"
      :is-display-delete-btn="false"
      :is-display-change-password-btn="false"
      @onEdit="onEdit"
      @onSave="onSave"
      @onBackList="onBackList"
      @onCancel="onCancelEdit"
      @onDelete="onOpenDeleteModal"
    >
      <template #breadcrumb>
        <MBreadcrumb :breadcrumb-data="breadcrumbData"></MBreadcrumb>
      </template>

      <template #content>
        <div class="mb-4">
          <ADropdown
            id="prefecture_id"
            v-model="form.prefecture_id"
            item-name="都道府県"
            :options="prefectureList"
            :required="true"
            :searchable="true"
            label-key="id"
            label="prefecture_name"
            :disabled="!isEditing"
          />
          <span v-if="errors && errors.city_name" class="error-message">{{
            errors.city_name[0]
          }}</span>
        </div>
        <div class="mb-4">
          <AInputForm
            id="city_name"
            v-model="form.city_name"
            :required="true"
            label="市区町村"
            :disabled="!isEditing"
          />
          <span v-if="errors && errors.city_name" class="error-message">{{
            errors.city_name[0]
          }}</span>
        </div>
        <div class="mb-4">
          <AInputForm
            id="city_name_kana"
            v-model="form.city_name_kana"
            :required="true"
            label="市区町村（かな）"
          />
          <span v-if="errors && errors.city_name_kana" class="error-message">{{
            errors.city_name_kana[0]
          }}</span>
        </div>
        <div class="mb-4">
          <AInputForm
            id="url_param"
            v-model="form.url_param"
            :required="true"
            label="市区町村URL"
          />
          <span v-if="errors && errors.city_name_kana" class="error-message">{{
            errors.city_name_kana[0]
          }}</span>
        </div>
        <div class="mb-4">
          <ATextArea
            id="comment"
            v-model="form.comment"
            :value="form.comment ? form.comment : ''"
            :required="false"
            :disabled="!isEditing"
            label="コメント"
            height="200px"
          />
        </div>
        <div class="mb-4">
          <span v-if="errors && errors.comment" class="error-message">{{ errors.comment[0] }}</span>
        </div>
      </template>
    </MBaseDetail>
    <MDeleteModal :target-name="form.city_name" @noCancel="onDeleteCancel" @onDelete="deleteCity" />
  </div>
</template>

<script>
import { mapState } from 'vuex'

import AInputForm from '@/views/components/AInputForm.vue'
import ATextArea from '@/views/components/ATextArea.vue'

import MBaseDetail from '@/views/admin/components/MBaseDetail.vue'
import MDeleteModal from '@/views/components/MDeleteModal.vue'
import MBreadcrumb from '@/views/admin/components/MBreadcrumb.vue'
import ADropdown from '@/views/components/ADropdown.vue'

import BUTTON from '@/consts/button'
import HTTP_STATUS from '@/consts/httpStatus'
import TOAST from '@/consts/toast'
import ROUTE from '@/consts/route'

import { RepositoryFactory } from '@/repositories/repositoryFactory'

const PrefectureRepository = RepositoryFactory.get('prefectures')
const cityRepository = RepositoryFactory.get('cities')

export default {
  components: {
    AInputForm,
    ADropdown,
    ATextArea,
    MBaseDetail,
    MDeleteModal,
    MBreadcrumb,
  },
  props: {
    id: {
      type: null,
      required: true,
      default: null,
    },
  },
  data: () => ({
    BUTTON,
    pageTitle: '市町村区 詳細',
    isNew: false,
    isEditing: false,
    form: {},
    errors: {},
    prefectureList: [],
  }),
  computed: {
    ...mapState('userModule', ['adminUser']),
  },

  watch: {
    $route: {
      async handler() {
        this.isNew = this.id === 'new'
        if (this.isNew) this.isEditing = true
      },
      immediate: true,
    },
    isEditing: {
      async handler() {
        if (this.isNew && this.isEditing) {
          this.pageTitle = '市区町村 新規登録'
        }
        if (!this.isNew && this.isEditing) {
          this.pageTitle = '市区町村 編集'
        }
        if (!this.isNew && !this.isEditing) {
          this.pageTitle = '市区町村 詳細'
        }
      },
      immediate: true,
    },
  },

  async created() {
    this.setBreadcrumbData()
    await this.fetchPrefectureList()
    if (this.isNew) {
      this.pageTitle = '市区町村 新規登録'
      return
    }
    await this.fetchCityShow()
  },

  methods: {
    async fetchCityShow() {
      this.showLoader()
      await cityRepository
        .fetchCityShow(this.id)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.form = res.data
        })
        .catch(async err => {
          await this.$errHandling.adminCatch(err.response.status)
        })

      this.hideLoader()
    },
    onSave() {
      if (this.isNew) {
        this.storeCity()
      } else {
        this.updateCity()
      }
    },

    // 新規登録
    async storeCity() {
      this.form.created_user_id = this.adminUser.id
      this.form.updated_user_id = this.adminUser.id
      this.showLoader()

      await cityRepository
        .storeCity(this.form)
        .then(res => {
          if (res.status !== HTTP_STATUS.CREATED) {
            this.$toast.errorsToast()
            return
          }
          // 成功時の処理
          this.$toast.successToast(TOAST.SUCCESS.CREATED)
          this.pageTitle = '市町村区詳細'
          this.isNew = false
          this.isEditing = false
          this.errors = {}
          this.setBreadcrumbData()
          // this.$router.push({
          //   name: ROUTE.ADMIN.CITY.DETAIL.name,
          //   param: { id: res.data.id },
          // })
          this.$router.push({
            name: ROUTE.ADMIN.CITY.LIST.name,
          })
        })
        .catch(async err => {
          this.errors = err.response.data.errors
          await this.$errHandling.adminCatch(err.response.status)
        })
      this.hideLoader()
    },
    // 更新
    async updateCity() {
      this.form.updated_user_id = this.adminUser.id
      this.showLoader()

      await cityRepository
        .updateCity(this.id, this.form)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          // 成功時の処理
          this.$toast.successToast(TOAST.SUCCESS.UPDATED)
          this.form = res.data
          this.isEditing = false
          this.errors = {}
          this.$router.push({
            name: ROUTE.ADMIN.CITY.DETAIL.name,
            param: { id: res.data.id },
          })
        })
        .catch(async err => {
          this.errors = err.response.data.errors
          await this.$errHandling.adminCatch(err.response.status)
        })
      this.hideLoader()
    },

    // 削除
    async deleteCity() {
      this.showLoader()

      await cityRepository
        .deleteCity(this.form.id)
        .this(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorsToast()
            return
          }
          this.$toast.successToast(TOAST.SUCCESS.DELETED)

          this.isEditing = false
          this.is.errors = {}
          this.$route.push({ name: ROUTE.ADMIN.CITY.LEST.name })
        })
        .catch(async err => {
          await this.$errHandling.adminCatch(err.response.status)
        })
      this.handler()
    },

    /*-------------------------------------------*/
    /* 都道府県のリスト取得
    /*-------------------------------------------*/

    async fetchPrefectureList() {
      await PrefectureRepository.fetchPrefectureList()
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.prefectureList = res.data
        })
        .catch(async err => {
          if (err.response) {
            await this.$errHandling.adminCatch(err.response.status)
            return
          }
          this.$toast.errorToast()
        })
    },

    /*-------------------------------------------*/
    /* 詳細共通
    /*-------------------------------------------*/
    onEdit() {
      this.isEditing = true
    },

    onBackList() {
      this.$router.push.back()
    },

    onCancelEdit() {
      this.isEditing = false
      this.errors = {}
      if (this.isNew) {
        this.form = {}
      } else {
        this.fetchCityShow()
      }
    },

    onOpenDeleteModal() {
      this.$modal.show('delete-management')
    },

    onDeleteCancel() {
      this.$modal.hide('delete-management')
    },

    setBreadcrumbData() {
      if (this.isNew) {
        this.pageTitle = '市区町村 新規登録'
      }
      this.breadcrumbData = [
        {
          title: '市区町村 一覧',
          link: { name: ROUTE.ADMIN.CITY.LIST.name },
        },
        {
          title: this.pageTitle,
          link: '',
        },
      ]
    },
  },
}
</script>
