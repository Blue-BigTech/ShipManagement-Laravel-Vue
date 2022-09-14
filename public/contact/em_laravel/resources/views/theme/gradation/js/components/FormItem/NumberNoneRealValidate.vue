<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      rules="required|numeric"
      :bails="false"
      v-slot="{ passed, failedRules }"
      slim
    >
      <input
        type="number"
        :id="form_item.html_id"
        :name="form_item.name"
        :class="{
          validationMode: validationMode,
          passed: passed,
          confirmMode: confirmMode,
        }"
        :placeholder="form_item.placeholder"
        class="form__input"
        v-model="numberValue"
      />
      <span v-if="confirmMode">
        {{ numberValue }}
      </span>
      <div
        v-if="failedRules.required && failedRules.numeric && validationMode"
        class="validateError"
      >
        {{ form_item.required_error_msg }}
      </div>
      <div v-else-if="failedRules.required && validationMode" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
      <div v-else-if="failedRules.numeric && validationMode" class="validateError">
        {{ form_item.restriction_error_msg }}
      </div>
    </ValidationProvider>
    <ValidationProvider
      v-if="form_item.required == 0"
      :name="form_item.lang_title"
      rules="numeric"
      :bails="false"
      v-slot="{ passed, failedRules }"
      slim
    >
      <input
        type="number"
        :id="form_item.html_id"
        :name="form_item.name"
        class="form__input"
        :class="{ validationMode: validationMode, passed: passed, confirmMode: confirmMode }"
        :placeholder="form_item.placeholder"
        v-model="numberValue"
      />
      <span v-if="confirmMode">
        {{ numberValue }}
      </span>
      <div v-if="failedRules.numeric && validationMode" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
    </ValidationProvider>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required, numeric } from "vee-validate/dist/rules";

extend("required", required);
extend("numeric", numeric);

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
      numberValue: "",
    };
  },
  watch: {
    numberValue: function(str) {
      const form_item = this.form_item;
      if(form_item.hankaku_zenkaku_automatic_conversion == "default"){
        return false;
      }
      if( form_item.hankaku_zenkaku_automatic_conversion == "hankaku") {
        this.numberValue = this.toHankaku(str);
      }
      if( form_item.hankaku_zenkaku_automatic_conversion == "zenkaku") {
        this.numberValue = this.toZenkaku(str);
      }
    },
  },
};
</script>


