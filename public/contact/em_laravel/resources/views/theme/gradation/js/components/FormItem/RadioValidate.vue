<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      :rules="{ required: { allowFalse: false } ,radioValidate: radioValidate}"
      :bails="false"
      v-slot="{ failedRules }"
      slim
    >
      <div class="btnList">
        <ul class="row">
          <li
            v-for="(val, index) in radio"
            :key="index"
            class="col-12"
            :class="[columns, { confirmMode: confirmMode }]"
          >
            <label :for="form_item.html_id + index" class="radioStyle">
              <img
                v-if="val.image"
                class="choice_img"
                :src="`em_laravel/storage/app/form_item_image/${val.image}`"
              />
              <input
                type="radio"
                :name="form_item.name"
                v-model="radioValue"
                :value="val.label_text"
                :id="form_item.html_id + index"
                :class="form_item.html_class"
              />
              <span class="ico"></span>
              {{ val.label_text }}
            </label>
          </li>
        </ul>
      </div>
      <span v-if="confirmMode">
        {{ radioValue }}
      </span>
      <div v-if="failedRules.required && radioValidate" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
    </ValidationProvider>
    <template v-if="form_item.required == 0">
      <div class="btnList">
        <ul class="row">
          <li
            v-for="(val, index) in radio"
            :key="index"
            class="col-12"
            :class="[columns, { confirmMode: confirmMode }]"
          >
            <label :for="form_item.html_id + index" class="radioStyle">
              <img
                v-if="val.image"
                class="choice_img"
                :src="`em_laravel/storage/app/form_item_image/${val.image}`"
              />
              <input
                type="radio"
                :name="form_item.name"
                v-model="radioValue"
                :value="val.label_text"
                :id="form_item.html_id + index"
                :class="form_item.html_class"
              />
              <span class="ico"></span>
              {{ val.label_text }}
            </label>
          </li>
        </ul>
      </div>
      <span v-if="confirmMode">
        {{ radioValue }}
      </span>
    </template>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required } from "vee-validate/dist/rules";

extend("required", required);

extend('radioValidate', {
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
    choices: {
      type: Array,
    },
  },
  data() {
    return {
      radioValue: "",
    };
  },
  computed: {
    radioValidate: function() {
      if(this.radioValue) {
        return false
      }
      return true
    },
    radio: function () {
      let choices = this.choices;
      let form_item = this.form_item;

      const checkboxFilter = choices.filter(function (type) {
        return type.choice_type === "radio";
      });
      const result = checkboxFilter.filter(function (id) {
        return id.block_id == form_item.form_block_id;
      });
      return result;
    },
    columns: function () {
      const form_item = this.form_item;
      if (!form_item.columns) {
        return false;
      }
      return "col-md-" + 12 / form_item.columns;
    },
  },
};
</script>
