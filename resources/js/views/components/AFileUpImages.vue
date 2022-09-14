<template>
  <div :class="isSBSLayout ? 'row' : ''">
    <div
      v-for="(image, index) in imageList"
      :key="index"
      :class="['ex-file', isSBSLayout ? 'col-4' : 'my-3']"
    >
      <div>
        <div v-if="isEditing" class="ex-file-inner">
          <label v-if="label" class="form-label" :for="`${id}${index}`"
            >{{ label }}<span v-if="required" class="text-danger pl-2">※</span></label
          >
          <span>アップロードする</span>
          <input
            :id="`${id}-${index}`"
            type="file"
            class="custom-file-input"
            :accept="accept"
            @change="uploadImage($event, index)"
          />
        </div>

        <!-- プレビュー -->
        <div v-if="image.image_src" class="ex-preview">
          <div class="ex-preview-inner">
            <img :src="`${image.image_src}`" :title="image.image_name" />
            <div v-if="isEditing" class="ex-preview-close" @click="onDeleteImage(index)">削除</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment'

export default {
  props: {
    id: {
      type: String,
      required: true,
      default: '',
    },
    label: {
      type: String,
      required: false,
      default: '',
    },
    required: {
      type: Boolean,
      required: false,
      default: false,
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
    accept: {
      type: String,
      required: false,
      default: 'image/png,image/jpg',
    },
    exImageList: {
      type: Array,
      required: false,
      default: () => [],
    },
    saveFolderName: {
      type: String,
      required: false,
      default: '',
    },
    isSBSLayout: {
      type: Boolean,
      required: true,
      default: true,
    },
    isEditing: {
      type: Boolean,
      required: false,
      default: true,
    },
  },

  data: () => ({
    errorMessage: '',
    deleteImageList: [],
    imageList: [],
  }),

  created() {
    this.imageList = this.exImageList
  },

  methods: {
    // 画像アップロード
    uploadImage(event, index) {
      console.log('uploadImage', event)
      this.errorMessage = ''
      const reader = new FileReader()
      const file = event.target.files[0]
      const fileName = file.name

      // 選択された画像が複数枚だった場合
      if (event.target.files.length > 1) {
        this.errorMessage = '画像は1枚ずつ選択してください。'
      }
      // 選択されたファイルの取得
      if (!file) {
        return
      }
      // 画像が大きすぎるとエラーを表示
      if (file.size > 3145728) {
        this.errorMessage = '画像の容量は3MB以下にしてください。'
        return
      }
      // Base64に変換する
      if (file) {
        reader.readAsDataURL(file)
      }
      // Base64への変換が終わったら実行
      reader.onload = () => {
        const imageBase64 = reader.result
        const dateTime = moment().format('YmdHis')
        // uploadされている画像を（削除して）更新する場合
        if (this.imageList[index].image_src && !this.imageList[index].image_src.match(/base64/)) {
          this.deleteImageList.push(this.imageList[index])
        }
        const data = {
          image_src: imageBase64,
          image_name: fileName,
          save_path: `/storage/images/${this.saveFolderName}/${dateTime}_${fileName}`,
        }
        this.$set(this.imageList, index, data)
        this.$emit('uploadImage', this.imageList)
      }
    },

    // 削除ボタン押下
    onDeleteImage(index) {
      console.log('削除ボタンクリック')
      // すでにuploadされている画像だった場合
      if (!this.imageList[index].image_src.match(/base64/)) {
        this.deleteImageList.push(this.imageList[index])
      }
      this.$set(this.imageList, index, { image_src: '', image_name: '', save_path: '' })
      // 親にイベントを伝える
      const event = { delete_image_list: this.deleteImageList, image_list: this.imageList }
      this.$emit('deleteImage', event)
    },
  },
}
</script>
