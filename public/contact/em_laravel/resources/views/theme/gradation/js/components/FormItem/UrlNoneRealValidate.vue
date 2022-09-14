<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      :rules="{
        required: true,
        regex: /https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/,
      }"
      :bails="false"
      v-slot="{ passed, failedRules }"
      slim
    >
      <input
        type="url"
        :id="form_item.html_id"
        :name="form_item.name"
        :placeholder="form_item.placeholder"
        :class="{
          validationMode: validationMode,
          passed: passed,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="urlValue"
      />
      <span v-if="confirmMode">
        {{ urlValue }}
      </span>
      <div v-if="failedRules.required && validationMode" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
      <div
        v-else-if="failedRules.regex && validationMode"
        class="validateError"
      >
        URL形式で入力してください。
      </div>
    </ValidationProvider>
    <ValidationProvider
      v-if="form_item.required == 0"
      :name="form_item.lang_title"
      :rules="{ regex: /https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/ }"
      :bails="false"
      v-slot="{ passed, failedRules }"
      slim
    >
      <input
        type="url"
        :id="form_item.html_id"
        :name="form_item.name"
        :placeholder="form_item.placeholder"
        :class="{
          validationMode: validationMode,
          passed: passed,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="urlValue"
      />
      <span v-if="confirmMode">
        {{ urlValue }}
      </span>
      <div v-if="failedRules.regex && validationMode" class="validateError">
        URL形式で入力してください。
      </div>
    </ValidationProvider>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required, regex } from "vee-validate/dist/rules";

extend("required", required);
extend("regex", regex);

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
    validationMode: {
      type: Boolean,
    },
  },
  data() {
    return {
      urlValue: "",
    };
  },
  watch: {
    urlValue: function(str) {
      const form_item = this.form_item;
      if(form_item.hankaku_zenkaku_automatic_conversion == "default"){
        return false;
      }
      if( form_item.hankaku_zenkaku_automatic_conversion == "hankaku") {
        this.urlValue = this.toHankaku(str);
      }
      if( form_item.hankaku_zenkaku_automatic_conversion == "zenkaku") {
        this.urlValue = this.toZenkaku(str);
      }
    },
  },
};
</script>

