<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      :rules="{ required : true , fileExt : fileExt , fileSize : fileSize }"
      :bails="false"
      v-slot="{ invalid , touched , validated , failedRules }"
      slim
    >
      <input type="hidden" v-model="img_name" name="form_item.lang_title">
      <input
        type="file"
        :id="form_item.html_id"
        :name="form_item.name"
        :class="{invalid: invalid ,touched: touched, validated: validated ,confirmMode:confirmMode}"
        :placeholder="form_item.placeholder"
        :accept="form_item.file_type"
        @change="onFileChange"
      />
      <span
        v-show="!confirmMode && uploadedImage"
        @click="remove"
        class="file_remove"
      >×</span>
      <template v-if="form_item.file_capacity_limit > 0">
        <span v-if="!confirmMode" >{{ form_item.file_capacity_limit / 1024 }}MB以下の制限があります。</span>
      </template>
      <template v-if="form_item.file_type">
        <span v-if="!confirmMode">{{ form_item.file_type }}のファイル形式を選択</span>
      </template>
      <span
        v-if="confirmMode && onFileChange"
      >
        {{ img_name }}
      </span>
      <img
        v-show="confirmMode && uploadedImage"
        class="preview-item-file"
        :src="uploadedImage"
        alt=""
      />
      <div v-if="failedRules.required" class="validateError">{{ form_item.required_error_msg }}</div>
      <div v-if="fileExt" class="validateError">有効なファイル形式ではありません。</div>
      <div v-if="fileSize" class="validateError">ファイルの上限サイズを超えています。</div>
    </ValidationProvider>
    <ValidationProvider
      v-if="form_item.required == 0"
      :name="form_item.lang_title"
      :rules="{ fileExt : fileExt , fileSize : fileSize }"
      :bails="false"
      v-slot="{ validated }"
      slim
    >
      <input type="hidden" v-model="img_name" name="form_item.lang_title">
      <input
        type="file"
        :id="form_item.html_id"
        :name="form_item.name"
        :class="{ validated: validated , confirmMode:confirmMode }"
        :placeholder="form_item.placeholder"
        :accept="form_item.file_type"
        @change="onFileChange"
      />
      <span
        v-show="!confirmMode && uploadedImage"
        @click="remove"
        class="file_remove"
      >×</span>
      <template v-if="form_item.file_capacity_limit > 0">
        <span v-if="!confirmMode" >{{ form_item.file_capacity_limit / 1024 }}MB以下の制限があります。</span>
      </template>
      <template v-if="form_item.file_type">
        <span v-if="!confirmMode">{{ form_item.file_type }}のファイル形式を選択</span>
      </template>
      <span
        v-if="confirmMode && onFileChange"
      >
        {{ img_name }}
      </span>
      <img
        v-show="confirmMode && uploadedImage"
        class="preview-item-file"
        :src="uploadedImage"
        alt=""
      />
      <div v-if="fileExt" class="validateError">有効なファイル形式ではありません。</div>
      <div v-if="fileSize" class="validateError">ファイルの上限サイズを超えています。</div>
    </ValidationProvider>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required } from 'vee-validate/dist/rules'

extend('required', required)

//拡張子のバリデーション
extend('fileExt', {
  validate(value) {
    return false;
  }
});
//ファイルサイズのバリデーション
extend('fileSize', {
  validate(value) {
    return false;
  }
});

// 日本語化
import ja from "vee-validate/dist/locale/ja";
localize("ja", ja);

// コンポーネント設定
Vue.component("ValidationProvider", ValidationProvider);

export default {
  props: {
    form_item: {
      type: Object,
    },
    confirmMode: {
      type: Boolean,
    },
  },
  data(){
    return{
      uploadedImage: '',
      img_name: "",
      img_size: "",
    }
  },
  methods: {
    onFileChange(e) {
      const files = e.target.files || e.dataTransfer.files;
      this.createImage(files[0]);
      this.img_name = files[0].name;
      this.img_size = files[0].size;
    },

    // アップロードした画像を表示
    createImage(file) {
      const reader = new FileReader();
      reader.onload = e => {
        this.uploadedImage = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    remove() {
      this.img_name = "";
      this.img_size = "";
      this.uploadedImage = "";
      this.$el.querySelector('input[type="file"]').value = null;
    },
  },
  computed: {
    fileName: function() {
      const form_item = this.form_item;
      if(!form_item.file_type) {
        return false;
      }

      const file_type = form_item.file_type.split('.').join('');
      return file_type;

    },
    fileExt: function() {
      const form_item = this.form_item;
      const img_name = this.img_name;
      let img_ext = img_name.split('.').pop();

      if(!form_item.file_type) {
        return false;
      }

      if(form_item.file_type) {
        const file_type = form_item.file_type.split('.').join('');

        if (file_type.indexOf(img_ext) === -1) {
          return true;
        }
        return false;
      }
      return false;
    },
    fileSize: function() {
      const form_item = this.form_item;
      const img_size = this.img_size;

      if( !form_item.file_capacity_limit ) {
        return false;
      }

      if( img_size / 1024 > form_item.file_capacity_limit ) {
        return true;
      }
      return false;
    },
  }
};
</script>



