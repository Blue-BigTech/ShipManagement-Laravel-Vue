<template>
  <div id="Wrapper" class="lender post">
    <div class="lender-inner">
      <MHeader :title="'釣果情報登録'" />
      <main class="main">
        <div class="main-form">
          <div class="main-form-element">
            <AInputForm
              id="title"
              v-model="form.title"
              :required="false"
              label="タイトル"
              :disabled="false"
              placeholder=""
              class-name="ex-input"
              type="text"
            />
            <span v-if="errors && errors[`title`]" class="error-message">{{
              errors[`title`][0]
            }}</span>
          </div>

          <div class="ex-collapses">
            <MCollapse id="Method" label="釣り方" class-name="main-form-element">
              <ACheckBox
                v-for="(item, index) in fishingOptionList"
                :id="`fishing-option-${index}`"
                :key="index"
                :value="item.id"
                :ex-selected-ids="selectedFishingOptionIds"
                :label="item.fishing_option_name"
                :required="false"
                :disabled="false"
                class-name="ex-check col-6"
                @change="selectedFishingOptionIds = $event"
              />
            </MCollapse>

            <MCollapse id="Target" label="魚種" class-name="main-form-element">
              <ACheckBox
                v-for="(item, index) in targetList"
                :id="`target-${index}`"
                :key="index"
                :value="item.id"
                :ex-selected-ids="selectedTargetIds"
                :label="item.target_name"
                :required="false"
                :disabled="false"
                class-name="ex-check col-4"
                @change="selectedTargetIds = $event"
              />
            </MCollapse>
          </div>

          <div class="main-form-element">
            <ATextArea
              id="comment"
              v-model="form.comment"
              label="文章"
              height="60px"
              :disabled="false"
              :required="false"
              class-name="ex-input"
              placeholder=""
            />
            <span v-if="errors && errors[`comment`]" class="error-message">{{
              errors[`comment`][0]
            }}</span>
          </div>

          <div class="main-form-element ex-separate">
            <label>写真登録</label>

            <div class="main-form-element-images container">
              <span v-if="errors && errors[`image_list.0.image_src`]" class="error-message">{{
                errors[`image_list.0.image_src`][0]
              }}</span>
              <AFileUpImages
                id="post_img"
                save-folder-name="post"
                accept="image/png, image/jpeg, image/gif"
                :ex-image-list="imageList"
                :is-s-b-s-layout="true"
                :is-editing="true"
                @uploadImage="onUploadImage"
                @deleteImage="onDeleteImage"
              />
            </div>
          </div>

          <div class="main-form-element ex-separate">
            <AButton
              :label="isNew ? '保存する' : '更新する'"
              :disabled="false"
              class-name="ex-button ex-confirm"
              @onClick="onSave"
            />
          </div>
          <div v-if="!isNew" class="main-form-element ex-separate">
            <AButton
              label="削除する"
              :disabled="false"
              class-name="ex-button ex-confirm"
              @onClick="onDelete"
            />
          </div>
        </div>
      </main>
      <MFooter />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import AButton from '@/views/components/AButton.vue'
import AFileUpImages from '@/views/components/AFileUpImages.vue'
import AInputForm from '@/views/components/AInputForm.vue'
import MCollapse from '@/views/components/MCollapse.vue'
import ACheckBox from '@/views/components/ACheckBox.vue'
import ATextArea from '@/views/components/ATextArea.vue'
import MHeader from '@/views/lender/components/MHeader.vue'
import MFooter from '@/views/lender/components/MFooter.vue'

// repository
import { RepositoryFactory } from '@/repositories/repositoryFactory'

// const
import HTTP_STATUS from '@/consts/httpStatus'
import ROUTE from '@/consts/route'
import TOAST from '@/consts/toast'

const fishingOptionRepository = RepositoryFactory.get('fishingOptions')
const targetRepository = RepositoryFactory.get('targets')
const lenderPostRepository = RepositoryFactory.get('lenderPosts')

export default {
  components: {
    AButton,
    AInputForm,
    ATextArea,
    MCollapse,
    AFileUpImages,
    ACheckBox,
    MHeader,
    MFooter,
  },

  props: {
    id: {
      type: [Number, String],
      required: true,
      default: null,
    },
  },

  data: () => ({
    form: {},
    isNew: false,
    isEditing: false,
    // データリスト
    fishingOptionList: [],
    targetList: [],
    imageList: [],
    deleteImageList: [],
    // 選択済ID
    selectedFishingOptionIds: [],
    selectedTargetIds: [],
    // error
    errors: {},
  }),

  computed: {
    ...mapState('userModule', ['lenderUser']),
  },

  watch: {
    $route: {
      async handler() {
        this.isNew = this.id === 'new'
        if (this.isNew) this.isEditing = true
      },
      immediate: true,
    },
  },

  async created() {
    this.showLoader()
    // 初期選択肢データ取得
    await Promise.all([
      fishingOptionRepository.fetchFishingOptionList(),
      targetRepository.fetchList(),
    ])
      .then(([fishingOptionRes, targetRes]) => {
        this.fishingOptionList = fishingOptionRes.data
        this.targetList = targetRes.data
      })
      .catch(async err => {
        if (err.response) {
          await this.$errHandling.lenderCatch(err.response.status)
          return
        }
        this.$toast.errorToast()
      })
    // 新規登録時
    if (this.isNew) {
      for (let i = 1; i <= 5; i += 1) {
        const data = { image_src: '', image_name: '', save_path: '' }
        this.imageList.push(data)
      }
      this.hideLoader()
      return
    }
    // 編集時
    await this.fetchLenderPostShow()
    this.hideLoader()
  },

  methods: {
    /*-------------------------------------------*/
    /* 基本処理
    /*-------------------------------------------*/
    // 詳細取得
    async fetchLenderPostShow() {
      await lenderPostRepository
        .show(this.id)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.form = res.data
          this.selectedFishingOptionIds = this.form.fishing_options.map(x => x.id)
          this.selectedTargetIds = this.form.targets.map(x => x.id)
          for (let i = 1; i <= 5; i += 1) {
            const column = `post_img_${i}`
            const data = {
              image_src: this.form[column],
              image_name: this.form[column], // 将来的に名前を表示するとなった時のため
              save_path: this.form[column],
            }
            this.imageList.push(data)
          }
        })
        .catch(async err => {
          if (err.response) {
            await this.$errHandling.lenderCatch(err.response.status)
            return
          }
          this.$toast.errorToast()
        })
    },
    // 保存取得
    async storeLenderPost() {
      await lenderPostRepository
        .store(this.form)
        .then(res => {
          if (res.status !== HTTP_STATUS.CREATED) {
            this.$toast.errorToast()
            return
          }
          this.$router.push({
            name: ROUTE.LENDER.POST.LIST.name,
          })
          this.$toast.successToast(TOAST.SUCCESS.CREATED)
        })
        .catch(async err => {
          console.log(err)
          if (err.response) {
            await this.$errHandling.lenderCatch(err.response.status)
            this.errors = err.response.data.errors
            return
          }
          this.$toast.errorToast()
        })
    },
    // 更新取得
    async updateLenderPost() {
      this.showLoader()
      await lenderPostRepository
        .update(this.id, this.form)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.$toast.successToast(TOAST.SUCCESS.UPDATED)
        })
        .catch(async err => {
          console.log(err.response)
          if (err.response) {
            await this.$errHandling.lenderCatch(err.response.status)
            this.errors = err.response.data.errors
            return
          }
          this.deleteImageList = []
          this.$toast.errorToast()
        })
      this.hideLoader()
    },
    // 削除処理
    async destroyLenderPost() {
      const param = { delete_image_list: this.imageList }
      await lenderPostRepository
        .delete(this.id, param)
        .then(async res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.$router.push({
            name: ROUTE.LENDER.POST.LIST.name,
          })
          this.$toast.successToast(TOAST.SUCCESS.DELETED)
        })
        .catch(async err => {
          if (err.response) {
            await this.$errHandling.lenderCatch(err.response.status)
            return
          }
          this.$toast.errorToast()
        })
    },
    /*-------------------------------------------*/
    /* イベント
    /*-------------------------------------------*/
    onSave() {
      this.form.lender_id = this.lenderUser.lender_id
      this.form.updated_user_id = this.lenderUser.id
      this.form.image_list = this.imageList
      this.form.selected_fishing_option_ids = this.selectedFishingOptionIds
      this.form.selected_target_ids = this.selectedTargetIds
      if (this.isNew) {
        this.form.created_user_id = this.lenderUser.id
        this.storeLenderPost()
      } else {
        this.form.delete_image_list = this.deleteImageList
        this.updateLenderPost()
      }
    },
    onDelete() {
      this.destroyLenderPost()
    },
    // 画像処理
    onUploadImage(event) {
      this.imageList = event
    },
    onDeleteImage(event) {
      this.imageList = event.image_list
      this.deleteImageList = event.delete_image_list
    },
  },
}
</script>

<style lang="scss" src="@/../sass/lender/common.scss"></style>
<style lang="scss" src="@/../sass/lender/post.scss"></style>
