<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      rules="required"
      :bails="false"
      v-slot="{ passed, failedRules }"
      slim
    >
      <input
        type="month"
        :id="form_item.html_id"
        :name="form_item.name"
        :class="{
          validationMode: validationMode,
          passed: passed,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="monthValue"
      />
      <span v-if="confirmMode">
        {{ monthValue }}
      </span>
      <div v-if="failedRules.required && validationMode" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
    </ValidationProvider>
    <template v-if="form_item.required == 0">
      <input
        type="month"
        :id="form_item.html_id"
        :name="form_item.name"
        :class="{ confirmMode: confirmMode }"
        class="form__input"
        v-model="monthValue"
      />
      <span v-if="confirmMode">
        {{ monthValue }}
      </span>
    </template>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required, numeric, between } from "vee-validate/dist/rules";

extend("required", required);
extend("numeric", numeric);
extend("between", between);

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
      monthValue: "",
    };
  },
};
</script>
