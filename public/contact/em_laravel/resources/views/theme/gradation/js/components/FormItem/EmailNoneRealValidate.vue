<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      rules="required|email"
      :bails="false"
      v-slot="{ passed, failedRules }"
      slim
    >
      <input
        type="email"
        :id="form_item.html_id"
        :name="form_item.name"
        :placeholder="form_item.placeholder"
        :class="{
          validationMode: validationMode,
          passed: passed,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="emailValue"
      />
      <span v-if="confirmMode">
        {{ emailValue }}
      </span>
      <div
        v-if="failedRules.required && failedRules.email && validationMode"
        class="validateError"
      >
        {{ form_item.required_error_msg }}
      </div>
      <div v-else-if="failedRules.required && validationMode" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
      <div v-else-if="failedRules.email && validationMode" class="validateError">
        {{ form_item.restriction_error_msg }}
      </div>
    </ValidationProvider>
    <ValidationProvider
      v-if="form_item.required == 0"
      :name="form_item.lang_title"
      rules="email"
      :bails="false"
      v-slot="{ passed, failedRules }"
      slim
    >
      <input
        type="email"
        :id="form_item.html_id"
        :name="form_item.name"
        :placeholder="form_item.placeholder"
        :class="{
          validationMode: validationMode,
          passed: passed,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="emailValue"
      />
      <span v-if="confirmMode">
        {{ emailValue }}
      </span>
      <div v-if="failedRules.email && validationMode" class="validateError">
        {{ form_item.restriction_error_msg }}
      </div>
    </ValidationProvider>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required, email } from "vee-validate/dist/rules";
import { setInteractionMode } from 'vee-validate';

extend("required", required);
extend("email", email);

// インタラクションモードをセット(グローバルで適用)
setInteractionMode('eager');

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
      emailValue: "",
    };
  },
  watch: {
    emailValue: function(str) {
      const form_item = this.form_item;
      if(form_item.hankaku_zenkaku_automatic_conversion == "default"){
        return false;
      }
      if( form_item.hankaku_zenkaku_automatic_conversion == "hankaku") {
        this.emailValue = this.toHankaku(str);
      }
      if( form_item.hankaku_zenkaku_automatic_conversion == "zenkaku") {
        this.emailValue = this.toZenkaku(str);
      }
    },
  },
};
</script>
