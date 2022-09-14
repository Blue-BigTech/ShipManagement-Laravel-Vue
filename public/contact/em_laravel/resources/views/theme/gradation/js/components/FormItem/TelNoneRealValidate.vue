<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      :rules="{
        InputRestriction: InputRestriction,
        TextCountLimit: TextCountLimit,
        ProhibitedText: ProhibitedText,
        required: true,
      }"
      :bails="false"
      v-slot="{ passed, failedRules }"
      slim
    >
      <input
        type="tel"
        id="tel"
        :placeholder="form_item.placeholder"
        :name="form_item.name"
        :class="{
          validationMode: validationMode,
          passed: passed,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="telValue"
      />
      <span v-if="confirmMode">
        {{ telValue }}
      </span>
      <div v-if="failedRules.required && validationMode" class="validateError">
        {{ form_item.required_error_msg }}
      </div>
      <div v-if="InputRestriction && validationMode" class="validateError">
        {{ form_item.restriction_error_msg }}
      </div>
      <div v-if="TextCountLimit && validationMode" class="validateError">
        {{ form_item.length_error_msg }}
      </div>
      <div v-if="ProhibitedText && validationMode" class="validateError">
        {{ form_item.forbidden_characters }}は入力できません。
      </div>
    </ValidationProvider>
    <ValidationProvider
      v-if="form_item.required == 0"
      :name="form_item.lang_title"
      :rules="{
        InputRestriction: InputRestriction,
        TextCountLimit: TextCountLimit,
        ProhibitedText: ProhibitedText,
      }"
      :bails="false"
      v-slot="{ passed }"
      slim
    >
      <input
        type="tel"
        id="tel"
        :placeholder="form_item.placeholder"
        :name="form_item.name"
        :class="{
          validationMode: validationMode,
          passed: passed,
          confirmMode: confirmMode,
        }"
        class="form__input"
        v-model="telValue"
      />
      <span v-if="confirmMode">
        {{ telValue }}
      </span>
      <div v-if="InputRestriction && validationMode" class="validateError">
        {{ form_item.restriction_error_msg }}
      </div>
      <div v-if="TextCountLimit && validationMode" class="validateError">
        {{ form_item.length_error_msg }}
      </div>
      <div v-if="ProhibitedText && validationMode" class="validateError">
        {{ form_item.forbidden_characters }}は入力できません。
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


//入力制限
extend("InputRestriction", {
  validate(value) {
    return false;
  },
});
//入力文字数
extend("TextCountLimit", {
  validate(value) {
    return false;
  },
});
//禁止文字
extend("ProhibitedText", {
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
    validationMode: {
      type: Boolean,
    },
  },
  data() {
    return {
      telValue: "",
    };
  },
  watch: {
    telValue: function(str) {
      const form_item = this.form_item;
      if(form_item.hankaku_zenkaku_automatic_conversion == "default"){
        return false;
      }
      if( form_item.hankaku_zenkaku_automatic_conversion == "hankaku") {
        this.telValue = this.toHankaku(str);
      }
      if( form_item.hankaku_zenkaku_automatic_conversion == "zenkaku") {
        this.telValue = this.toZenkaku(str);
      }
    },
  },
  computed: {
    InputRestriction: function () {
      const form_item = this.form_item;
      const telValue = this.telValue;
      if (!form_item.restriction) {
        return false;
      }
      //ひらがな
      if (form_item.restriction == "hiragana") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^[ぁ-んー　]+$/)) {
          return false;
        } else {
          return true;
        }
      }
      //カタカナ
      if (form_item.restriction == "katakana") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^[ァ-ヶー　]*$/)) {
          //"ー"の後ろの文字は全角スペースです。
          return false;
        } else {
          return true;
        }
      }
      //半角数字
      if (form_item.restriction == "num") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^[0-9]*$/)) {
          return false;
        } else {
          return true;
        }
      }
      //半角英数字
      if (form_item.restriction == "alphabet_num") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^[0-9a-zA-Z]*$/)) {
          return false;
        } else {
          return true;
        }
      }
      //半角英字
      if (form_item.restriction == "alphabet") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^[a-zA-Z]*$/)) {
          return false;
        } else {
          return true;
        }
      }
      //半角英数字混在
      if (form_item.restriction == "alphabet_num_mix") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/([0-9].*[a-zA-Z]|[a-zA-Z].*[0-9])/s)) {
          return false;
        }
        let num_flag = false;
        if (telValue.match(/^[0-9]*$/)) {
          num_flag = true;
        }
        let alphabet_flag = false;
        if (telValue.match(/^[a-zA-Z]*$/)) {
          alphabet_flag = true;
        }
        if (num_flag == true && alphabet_flag == true) {
          return true;
        } else {
          return true;
        }
      }
      //半角数字と半角ハイフン
      if (form_item.restriction == "num_hyphen") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^[0-9\-]+$/)) {
          return false;
        } else {
          return true;
        }
      }
      //メールアドレス
      if (form_item.restriction == "email") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (
          telValue.match(
            /^([A-Za-z0-9!"#$%&'()*+,-./:;<=>?@[\]^_`{|}])+([A-Za-z0-9!"#$%&'()*+,-./:;<=>?@[\]^_`{|}\._-])*@([A-Za-z0-9!"#$%&'()*+,-./:;<=>?@[\]^_`{|}_-])+([A-Za-z0-9!"#$%&'()*+,-./:;<=>?@[\]^_`{|}\._-]+)+$/
          )
        ) {
          return false;
        } else {
          return true;
        }
      }
      //電話番号09000000000
      if (form_item.restriction == "tel") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^\d{7,13}$/)) {
          return false;
        } else {
          return true;
        }
      }
      //電話番号090-0000-0000
      if (form_item.restriction == "tel_hyphen") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^(\d{2,3}-){0,1}\d{1,4}-\d{2,4}-\d{2,4}$/)) {
          return false;
        } else {
          return true;
        }
      }
      //郵便番号1001111
      if (form_item.restriction == "zip") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^\d{7}$/)) {
          return false;
        } else {
          return true;
        }
      }
      //郵便番号100-1111
      if (form_item.restriction == "zip_hyphen") {
        if (!telValue || telValue == undefined || telValue == "") {
          return false;
        }
        if (telValue.match(/^\d{3}$|^\d{3}-\d{2}$|^\d{3}-\d{4}$/)) {
          return false;
        } else {
          return true;
        }
      }
    },
    TextCountLimit: function () {
      const form_item = this.form_item;
      const telValue = this.telValue;
      if (!telValue || telValue == undefined || telValue == "") {
        return false;
      }
      if (form_item.min_length > 0 && form_item.max_length > 0) {
        if (
          telValue.length < form_item.min_length ||
          telValue.length > form_item.max_length
        ) {
          return true;
        } else {
          return false;
        }
      }
      if (form_item.min_length > 0) {
        if (telValue.length < form_item.min_length) {
          return true;
        } else {
          return false;
        }
      }
      if (form_item.max_length > 0) {
        if (telValue.length > form_item.max_length) {
          return true;
        } else {
          return false;
        }
      }
      return false;
    },
    ProhibitedText: function () {
      const form_item = this.form_item;
      const telValue = this.telValue;
      if (!telValue || telValue == undefined || telValue == "") {
        return false;
      }
      if (form_item.forbidden_characters) {
        if (telValue === form_item.forbidden_characters) {
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

