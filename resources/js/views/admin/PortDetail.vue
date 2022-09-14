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
      @onDelete="onOpenModal('delete-modal')"
    >
      <template #breadcrumb>
        <MBreadcrumb :breadcrumb-data="breadcrumbData"></MBreadcrumb>
      </template>

      <template #content>
        <div class="container my-5">
          <div class="mb-4">
            <ADropdown
              id="prefecture_id"
              v-model="form.prefecture_id"
              item-name="都道府県"
              :options="areaLists"
              :required="false"
              :searchable="true"
              :disabled="!isEditing"
              label="prefecture_name"
              label-key="id"
            />
          </div>
          <div class="mb-4">
            <ADropdown
              id="city_id"
              v-model="form.city_id"
              item-name="市町村"
              :options="cityList"
              :required="false"
              :searchable="true"
              label="city_name"
              label-key="id"
              :disabled="!isEditing"
            />
            <span v-if="errors && errors[`city_id`]" class="error-message">{{
              errors[`city_id`][0]
            }}</span>
          </div>
          <div class="mb-4">
            <AInputForm
              id="port_name"
              v-model="form.port_name"
              :required="true"
              label="港名"
              :disabled="!isEditing"
            />
            <span v-if="errors && errors.port_name" class="error-message">{{
              errors.port_name[0]
            }}</span>
          </div>
          <div class="mb-4">
            <AInputForm
              id="port_name_kana"
              v-model="form.port_name_kana"
              :required="true"
              label="港名（かな）"
              :disabled="!isEditing"
            />
            <span v-if="errors && errors.port_name_kana" class="error-message">{{
              errors.port_name_kana[0]
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
            <span v-if="errors && errors.comment" class="error-message">{{
              errors.comment[0]
            }}</span>
          </div>
        </div>
      </template>
    </MBaseDetail>

    <MDeleteModal
      :target-name="form.port_name"
      @onCancel="onCloseModal('delete-modal')"
      @onDelete="deletePort"
    />
  </div>
</template>

<script>
import { mapState } from 'vuex'
// import error from '@/functions/error'

// component
import ADropdown from '@/views/components/ADropdown.vue'
import AInputForm from '@/views/components/AInputForm.vue'
import ATextArea from '@/views/components/ATextArea.vue'
import MBaseDetail from '@/views/admin/components/MBaseDetail.vue'
import MDeleteModal from '@/views/components/MDeleteModal.vue'
import MBreadcrumb from '@/views/admin/components/MBreadcrumb.vue'
// const
import BUTTON from '@/consts/button'
import HTTP_STATUS from '@/consts/httpStatus'
import TOAST from '@/consts/toast'
import ROUTE from '@/consts/route'
// repository
import { RepositoryFactory } from '@/repositories/repositoryFactory'

const portRepository = RepositoryFactory.get('ports')
const prefectureRepository = RepositoryFactory.get('prefectures')

export default {
  components: {
    ADropdown,
    AInputForm,
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
    pageTitle: '港 詳細',
    isNew: false,
    isEditing: false,
    isFirstLoad: true,
    form: { city_id: null },
    errors: {},
    // リスト
    areaLists: [],
    prefectureId: null,
    cityList: [],
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
          this.pageTitle = '港 新規登録'
        }
        if (!this.isNew && this.isEditing) {
          this.pageTitle = '港 編集'
        }
        if (!this.isNew && !this.isEditing) {
          this.pageTitle = '港 詳細'
        }
      },
      immediate: true,
    },
    'form.prefecture_id': {
      handler(prefectureId, oldPrefectureId) {
        if (!prefectureId) {
          this.cityList = []
          this.form.city_id = null
          return
        }
        if (oldPrefectureId) {
          this.form.city_id = null
        }
        const areaListsRecord = this.areaLists.filter(x => x.id === prefectureId)
        this.cityList = areaListsRecord[0].cities
      },
    },
  },

  async created() {
    await this.setBreadcrumbData()
    await this.fetchAreaLists()
    if (this.isNew) return
    this.fetchPortShow()
  },

  methods: {
    /*-------------------------------------------*/
    /* 詳細取得処理 管理者画面
    /*-------------------------------------------*/
    async fetchPortShow() {
      this.showLoader()

      await portRepository
        .fetchPortShow(this.id)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.form = res.data
          const areaListsRecord = this.areaLists.filter(x => x.id === this.form.prefecture_id)
          this.cityList = areaListsRecord[0].cities
          this.isFirstLoad = false
        })
        .catch(async err => {
          if (err.response) {
            await this.$errHandling.adminCatch(err.response.status)
            return
          }
          this.$toast.errorToast()
        })

      this.hideLoader()
    },
    /*-------------------------------------------*/
    /* 新規登録・更新処理 管理者画面
    /*-------------------------------------------*/
    onSave() {
      if (this.isNew) {
        this.storePort()
      } else {
        this.updatePort()
      }
    },
    // 新規登録
    async storePort() {
      this.form.created_user_id = this.adminUser.id
      this.form.updated_user_id = this.adminUser.id

      this.showLoader()

      await portRepository
        .storePort(this.form)
        .then(res => {
          if (res.status !== HTTP_STATUS.CREATED) {
            this.$toast.errorToast()
            return
          }
          // 成功時の処理
          this.$toast.successToast(TOAST.SUCCESS.CREATED)
          this.pageTitle = '港 詳細'
          this.isNew = false
          this.isEditing = false
          this.errors = {}
          this.setBreadcrumbData()
          // this.$router.push({
          //   name: ROUTE.ADMIN.PORT.DETAIL.name,
          //   param: { id: res.data.id },
          // })
          this.$router.push({
            name: ROUTE.ADMIN.PORT.LIST.name,
          })
        })
        .catch(async err => {
          this.errors = err.response.data.errors
          await this.$errHandling.adminCatch(err.response.status)
        })
      this.hideLoader()
    },
    // 更新
    async updatePort() {
      this.form.updated_user_id = this.adminUser.id

      this.showLoader()

      await portRepository
        .updatePort(this.id, this.form)
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
            name: ROUTE.ADMIN.PORT.DETAIL.name,
            param: { id: res.data.id },
          })
        })
        .catch(async err => {
          this.errors = err.response.data.errors
          await this.$errHandling.adminCatch(err.response.status)
        })

      this.hideLoader()
    },
    /*-------------------------------------------*/
    /* 削除処理 管理者画面
    /*-------------------------------------------*/
    async deletePort() {
      this.showLoader()

      await portRepository
        .deletePort(this.id)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }

          this.$toast.successToast(TOAST.SUCCESS.DELETED)

          this.isEditing = false
          this.errors = {}
          this.$router.push({ name: ROUTE.ADMIN.PORT.LIST.name })
        })
        .catch(async err => {
          await this.$errHandling.adminCatch(err.response.status)
        })

      this.hideLoader()
    },
    /*-------------------------------------------*/
    /* その他
    /*-------------------------------------------*/
    async fetchAreaLists() {
      await prefectureRepository
        .fetchAreaLists()
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.areaLists = res.data
          console.log(res, 'eria')
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
    /* 共通処理 管理者画面
    /*-------------------------------------------*/
    onEdit() {
      this.isEditing = true
    },
    onBackList() {
      this.$router.back()
      // this.$router.go(-1)
    },
    onOpenModal($modalName) {
      this.$modal.show($modalName)
    },
    onCloseModal($modalName) {
      this.$modal.hide($modalName)
    },
    // 呼び出しメソッドが異なるため完全に共通できない。
    onCancelEdit() {
      this.isEditing = false
      this.errors = {}
      if (this.isNew) {
        this.form = {}
      } else {
        this.fetchPortShow()
      }
    },
    setBreadcrumbData() {
      this.breadcrumbData = [
        {
          title: '港 一覧',
          link: { name: ROUTE.ADMIN.PORT.LIST.name },
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
