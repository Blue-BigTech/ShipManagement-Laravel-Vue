<template>
  <div>
    <template
      v-if="form_item.required == 1"
    >
      <ValidationProvider
        :name="form_item.lang_title"
        :rules="{
          required: true,
        }"
        :bails="false"
        v-slot="{ invalid, touched, validated, failedRules }"
        slim
      >
        <input
          type="text"
          @input="handleNameInput"
          id="your_name"
          name="your_name"
          :class="{
            invalid: invalid,
            touched: touched,
            validated: validated,
            confirmMode: confirmMode,
          }"
          class="form__input"
          v-model="nameValue"
        />
        <span v-if="confirmMode">
          {{ nameValue }}
        </span>
        <div v-if="failedRules.required" class="validateError">
          {{ form_item.required_error_msg }}
        </div>
      </ValidationProvider>
      <ValidationProvider
        name="name_and_furigana"
        :rules="{
          InputRestriction: InputRestriction,
          required: true,
        }"
        :bails="false"
        v-slot="{ invalid, touched, validated, failedRules }"
        slim
      >
      <div class="partsFormitem name_and_furigana">
        <div class="name">
          <template
            v-if="HiraganaOrKatakana"
          >
            ふりがな
          </template>
          <template
            v-else
          >
            フリガナ
          </template>
          <span class="partsRed inReq">※</span>
        </div>
          <input
            type="text"
            id="name_and_furigana"
            name="name_and_furigana"
            :class="{
              invalid: invalid,
              touched: touched,
              validated: validated,
              confirmMode: confirmMode,
            }"
            class="form__input"
            v-model="furiganaValue"
          />
          <span v-if="confirmMode">
            {{ furiganaValue }}
          </span>
          <div v-if="failedRules.required" class="validateError">
            <template
              v-if="HiraganaOrKatakana"
            >
              ふりがなを入力してください
            </template>
            <template
              v-else
            >
              フリガナを入力してください
            </template>
          </div>
          <div v-if="failedRules.InputRestriction" class="validateError">{{ form_item.restriction_error_msg }}</div>
          <!-- <div v-if="failedRules.TextCountLimit" class="validateError">{{ form_item.length_error_msg }}</div>
          <div v-if="failedRules.ProhibitedText" class="validateError">{{ form_item.forbidden_characters }}は入力できません。</div> -->
        </div>
      </ValidationProvider>
    </template>
    <template
      v-if="form_item.required == 0"
    >
      <ValidationProvider
        :name="form_item.lang_title"
        :bails="false"
        v-slot="{ invalid, touched, validated }"
        slim
      >
        <input
          type="text"
          @input="handleNameInput"
          id="your_name"
          name="your_name"
          :class="{
            invalid: invalid,
            touched: touched,
            validated: validated,
            confirmMode: confirmMode,
          }"
          class="form__input"
          v-model="nameValue"
        />
        <span v-if="confirmMode">
          {{ nameValue }}
        </span>
      </ValidationProvider>
      <ValidationProvider
        name="name_and_furigana"
        :rules="{
          InputRestriction: InputRestriction,
        }"
        :bails="false"
        v-slot="{ invalid, touched, validated, failedRules }"
        slim
      >
        <div class="partsFormitem name_and_furigana">
          <div class="name">
            <template
              v-if="HiraganaOrKatakana"
            >
              ふりがな
            </template>
            <template
              v-else
            >
              フリガナ
            </template>
          </div>
          <input
            type="text"
            @input="onInput"
            @blur="onBlur"
            @focus="onFocus"
            id="name_and_furigana"
            name="name_and_furigana"
            :class="{
              invalid: invalid && active,
              touched: touched,
              validated: validated,
              confirmMode: confirmMode,
            }"
            class="form__input"
            v-model="furiganaValue"
          />
          <span v-if="confirmMode">
            {{ furiganaValue }}
          </span>
          <div v-if="failedRules.InputRestriction && active" class="validateError">{{ form_item.restriction_error_msg }}</div>
          <!-- <div v-if="failedRules.InputRestriction" class="validateError">{{ form_item.restriction_error_msg }}</div>
          <div v-if="failedRules.TextCountLimit" class="validateError">{{ form_item.length_error_msg }}</div>
          <div v-if="failedRules.ProhibitedText" class="validateError">{{ form_item.forbidden_characters }}は入力できません。</div> -->
        </div>
      </ValidationProvider>
    </template>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required } from "vee-validate/dist/rules";
import * as AutoKana from 'vanilla-autokana';


extend("required", required);

//入力制限
extend("InputRestriction", {
  validate(value) {
    return false;
  },
});

let autokana;

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
      nameValue: "",
      furiganaValue: "",
      active: false,
    };
  },
  mounted() {
    const form_item = this.form_item;
    if (form_item.restriction == "hiragana") {
      autokana = AutoKana.bind("#your_name", "#name_and_furigana");
      return
    }
    autokana = AutoKana.bind("#your_name", "#name_and_furigana", {
      katakana: true,
    });
  },
  methods: {
    handleNameInput: function () {
      this.furiganaValue = autokana.getFurigana();
    },
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
      const furiganaValue = this.furiganaValue;
      if (
        (this.active && !furiganaValue) ||
        furiganaValue == undefined ||
        furiganaValue == ""
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
    HiraganaOrKatakana: function() {
      const form_item = this.form_item;
      if (form_item.restriction == "hiragana") {
        return true;
      }
      return false;
    },
    InputRestriction: function () {
      const form_item = this.form_item;
      const furiganaValue = this.furiganaValue;
      if (form_item.restriction !== "hiragana" && form_item.restriction !== "katakana") {
        return false;
      }
      //ふりがな
      if (form_item.restriction == "hiragana") {
        if (!furiganaValue || furiganaValue == undefined || furiganaValue == "") {
          return false;
        }
        if (furiganaValue.match(/^[ぁ-んー　]+$/)) {
          return false;
        } else {
          return true;
        }
      }
      //カタカナ
      if (form_item.restriction == "katakana") {
        if (!furiganaValue || furiganaValue == undefined || furiganaValue == "") {
          return false;
        }
        if (furiganaValue.match(/^[ァ-ヶー　]*$/)) {
          //"ー"の後ろの文字は全角スペースです。
          return false;
        } else {
          return true;
        }
      }
    },
  },
};
</script>
<style>
.name_and_furigana{
  margin-top: 70px;
}
@media only screen and (max-width: 767px)
{
  .name_and_furigana {
    margin-top: 35px;
  }
}
</style>



