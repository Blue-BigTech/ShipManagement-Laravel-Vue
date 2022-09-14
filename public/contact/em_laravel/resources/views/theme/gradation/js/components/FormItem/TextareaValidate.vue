<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      :rules="{
        TextCountLimit: TextCountLimit,
        ProhibitedText: ProhibitedText,
        required: true,
      }"
      :bails="false"
      v-slot="{ validated,invalid, touched, failedRules }"
      slim
    >
      <textarea
        type="text"
        :id="form_item.html_id"
        :name="form_item.name"
        :class="{
          invalid: invalid,
          touched: touched,
          validated:validated,
          confirmMode: confirmMode,
        }"
        class="form__textArea"
        v-model="textareaValue"
      />
      <span v-if="confirmMode" class="u-pre-wrap">
        {{ textareaValue }}
      </span>
      <div v-if="failedRules.required" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
      <div v-if="failedRules.TextCountLimit" class="validateError">
        {{ form_item.length_error_msg }}
      </div>
      <div v-if="failedRules.ProhibitedText" class="validateError">
        {{ form_item.forbidden_characters }}は入力できません。
      </div>
    </ValidationProvider>
    <ValidationProvider
      v-if="form_item.required == 0"
      :name="form_item.lang_title"
      :rules="{
        TextCountLimit: TextCountLimit,
        ProhibitedText: ProhibitedText,
      }"
      :bails="false"
      v-slot="{ validated, failedRules }"
      slim
    >
      <textarea
        type="text"
        @input="onInput"
        @blur="onBlur"
        @focus="onFocus"
        :id="form_item.html_id"
        :name="form_item.name"
        :class="{
          validated: validated,
          confirmMode: confirmMode,
          ProhibitedText: ProhibitedText,
        }"
        class="form__textArea"
        v-model="textareaValue"
      />
      <span v-if="confirmMode" class="u-pre-wrap">
        {{ textareaValue }}
      </span>
      <div v-if="failedRules.TextCountLimit && active" class="validateError">
        {{ form_item.length_error_msg }}
      </div>
      <div v-if="failedRules.ProhibitedText && active" class="validateError">
        {{ form_item.forbidden_characters }}は入力できません。
      </div>
    </ValidationProvider>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required } from "vee-validate/dist/rules";

extend("required", required);

//入力文字数
extend("TextCountLimit", {
  // エラーメッセージを設定する
  validate(value) {
    return false;
  },
});
//禁止文字
extend("ProhibitedText", {
  // エラーメッセージを設定する
  validate(value) {
    return false;
  },
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
  data() {
    return {
      textareaValue: "",
      active: false,
    };
  },
  methods: {
    onInput: function () {
      if (
        (this.active && this.InputRestriction) ||
        this.TextCountLimit ||
        this.ProhibitedText
      ) {
        return false;
      }
      this.active = false;
    },
    onFocus: function () {
      const textValue = this.textValue;
      if (
        (this.active && !textValue) ||
        textValue == undefined ||
        textValue == ""
      ) {
        this.active = false;
        return;
      }
    },
    onBlur: function () {
      this.active = true;
    },
  },
  computed: {
    TextCountLimit: function () {
      const form_item = this.form_item;
      const textareaValue = this.textareaValue;
      if (!textareaValue || textareaValue == undefined || textareaValue == "") {
        return false;
      }
      if (form_item.min_length > 0 && form_item.max_length > 0) {
        if (
          textareaValue.length < form_item.min_length ||
          textareaValue.length > form_item.max_length
        ) {
          return true;
        } else {
          return false;
        }
      }
      if (form_item.min_length > 0) {
        if (textareaValue.length < form_item.min_length) {
          return true;
        } else {
          return false;
        }
      }
      if (form_item.max_length > 0) {
        if (textareaValue.length > form_item.max_length) {
          return true;
        } else {
          return false;
        }
      }
      return false;
    },
    ProhibitedText: function () {
      const form_item = this.form_item;
      const textareaValue = this.textareaValue;
      if (!textareaValue || textareaValue == undefined || textareaValue == "") {
        return false;
      }
      if (form_item.forbidden_characters) {
        if (textareaValue === form_item.forbidden_characters) {
          return true;
        } else {
          return false;
        }
      }
      return false;
    },
  },
};
</script>



