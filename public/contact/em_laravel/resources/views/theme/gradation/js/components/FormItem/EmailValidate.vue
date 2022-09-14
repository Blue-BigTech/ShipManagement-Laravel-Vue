<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      rules="required|email"
      :bails="false"
      v-slot="{ invalid, touched, validated, failedRules }"
      slim
    >
      <input
        type="email"
        :id="form_item.html_id"
        :name="form_item.name"
        :placeholder="form_item.placeholder"
        :class="{
          invalid: invalid,
          touched: touched,
          validated: validated,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="emailValue"
      />
      <span v-if="confirmMode">
        {{ emailValue }}
      </span>
      <div
        v-if="failedRules.required && failedRules.email"
        class="validateError"
      >
        {{ form_item.required_error_msg }}
      </div>
      <div v-else-if="failedRules.required" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
      <div v-else-if="failedRules.email" class="validateError">
        {{ form_item.restriction_error_msg }}
      </div>
    </ValidationProvider>
    <ValidationProvider
      v-if="form_item.required == 0"
      :name="form_item.lang_title"
      rules="email"
      :bails="false"
      v-slot="{ invalid, touched, failedRules }"
      slim
    >
      <input
        type="email"
        :id="form_item.html_id"
        :name="form_item.name"
        :placeholder="form_item.placeholder"
        :class="{
          invalid: invalid,
          touched: touched,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="emailValue"
      />
      <span v-if="confirmMode">
        {{ emailValue }}
      </span>
      <div v-if="failedRules.email" class="validateError">
        {{ form_item.restriction_error_msg }}
      </div>
    </ValidationProvider>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required, email } from "vee-validate/dist/rules";

extend("required", required);
extend("email", email);

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
