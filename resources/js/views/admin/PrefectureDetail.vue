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
            <AInputForm
              id="prefecture_name"
              v-model="form.prefecture_name"
              :required="true"
              label="都道府県名"
              :disabled="!isEditing"
            />
            <span v-if="errors && errors.prefecture_name" class="error-message">{{
              errors.prefecture_name[0]
            }}</span>
          </div>
          <div class="mb-4">
            <AInputForm
              id="prefecture_name_kana"
              v-model="form.prefecture_name_kana"
              :required="true"
              label="都道府県名（かな）"
              :disabled="!isEditing"
            />
            <span v-if="errors && errors.prefecture_name_kana" class="error-message">{{
              errors.prefecture_name_kana[0]
            }}</span>
          </div>
          <div class="mb-4">
            <AInputForm
              id="url_param"
              v-model="form.url_param"
              :required="true"
              label="URLディレクトリ名"
              :disabled="!isEditing"
            />
            <span v-if="errors && errors.url_param" class="error-message">{{
              errors.url_param[0]
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
      :target-name="form.prefecture_name"
      @onCancel="onCloseModal('delete-modal')"
      @onDelete="deletePrefecture"
    />
  </div>
</template>

<script>
import { mapState } from 'vuex'
// import error from '@/functions/error'

// component
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

const prefectureRepository = RepositoryFactory.get('prefectures')

export default {
  components: {
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
    pageTitle: '都道府県 詳細',
    isNew: false,
    isEditing: false,
    form: {},
    errors: {},
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
          this.pageTitle = '都道府県 新規登録'
        }
        if (!this.isNew && this.isEditing) {
          this.pageTitle = '都道府県 編集'
        }
        if (!this.isNew && !this.isEditing) {
          this.pageTitle = '都道府県 詳細'
        }
      },
      immediate: true,
    },
  },

  created() {
    this.setBreadcrumbData()
    if (this.isNew) return
    this.fetchPrefectureShow()
  },

  methods: {
    /*-------------------------------------------*/
    /* 詳細取得処理 管理者画面
    /*-------------------------------------------*/
    async fetchPrefectureShow() {
      this.showLoader()

      await prefectureRepository
        .fetchPrefectureShow(this.id)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.form = res.data
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
        this.storePrefecture()
      } else {
        this.updatePrefecture()
      }
    },
    // 新規登録
    async storePrefecture() {
      this.form.created_user_id = this.adminUser.id
      this.form.updated_user_id = this.adminUser.id

      this.showLoader()

      await prefectureRepository
        .storePrefecture(this.form)
        .then(res => {
          if (res.status !== HTTP_STATUS.CREATED) {
            this.$toast.errorToast()
            return
          }
          // 成功時の処理
          this.$toast.successToast(TOAST.SUCCESS.CREATED)
          this.pageTitle = '都道府県 詳細'
          this.isNew = false
          this.isEditing = false
          this.errors = {}
          this.setBreadcrumbData()
          // this.$router.push({
          //   name: ROUTE.ADMIN.PREFECTURE.DETAIL.name,
          //   param: { id: res.data.id },
          // })
          this.$router.push({
            name: ROUTE.ADMIN.PREFECTURE.LIST.name,
          })
        })
        .catch(async err => {
          this.errors = err.response.data.errors
          await this.$errHandling.adminCatch(err.response.status)
        })
      this.hideLoader()
    },
    // 更新
    async updatePrefecture() {
      this.form.updated_user_id = this.adminUser.id

      this.showLoader()

      await prefectureRepository
        .updatePrefecture(this.id, this.form)
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
            name: ROUTE.ADMIN.PREFECTURE.DETAIL.name,
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
    // async deletePrefecture() {
    //   this.showLoader()

    //   await prefectureRepository
    //     .deletePrefecture(this.form.id)
    //     .then(res => {
    //       if (res.status !== HTTP_STATUS.OK) {
    //         this.$toast.errorToast()
    //         return
    //       }

    //       this.$toast.successToast(TOAST.SUCCESS.DELETED)

    //       this.isEditing = false
    //       this.errors = {}
    //       this.$router.push({ name: ROUTE.ADMIN.PREFECTURE.LIST.name })
    //     })
    //     .catch(async err => {
    //       await this.$errHandling.adminCatch(err.response.status)
    //     })

    //   this.hideLoader()
    // },
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
        this.fetchPrefectureShow()
      }
    },
    setBreadcrumbData() {
      this.breadcrumbData = [
        {
          title: '都道府県 一覧',
          link: { name: ROUTE.ADMIN.PREFECTURE.LIST.name },
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
