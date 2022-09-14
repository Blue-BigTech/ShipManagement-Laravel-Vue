<template>
  <div>
    <template v-if="form_item.required == 1">
      <div :class="{ confirmMode: confirmMode }" class="addrSection">
        <div class="inBox">
          <ValidationProvider
            name="zip"
            :rules="{ required: true, regex: /^(\d{3})-?(\d{4})/, max: 8 }"
            :bails="false"
            v-slot="{ passed, failedRules }"
            slim
          >
            <div class="flexBox addrBox01">
              <div class="txt">郵便番号</div>
              <input
                type="tel"
                id="zip"
                name="zip"
                :class="{
                  validationMode: validationMode,
                  passed: passed,
                  confirmMode: confirmMode,
                }"
                :placeholder="form_item.placeholder"
                v-model="zip"
              />
            </div>
            <div
              v-if="failedRules.required && failedRules.regex && validationMode"
              class="validateError"
            >
              郵便番号を入力してください。
            </div>
            <div
              v-else-if="failedRules.regex && validationMode"
              class="validateError"
            >
              郵便番号を入力してください。
            </div>
            <div
              v-else-if="failedRules.max && validationMode"
              class="validateError"
            >
              郵便番号を入力してください。
            </div>
          </ValidationProvider>
        </div>
        <div class="inBox">
          <ValidationProvider
            name="pref"
            rules="required"
            :bails="false"
            v-slot="{ passed, failedRules }"
            slim
          >
            <div class="flexBox addrBox01">
              <div class="txt">都道府県</div>
              <select
                name="pref"
                :class="{
                  validationMode: validationMode,
                  passed: passed,
                  confirmMode: confirmMode,
                }"
                v-model="pref"
              >
                <option value="">都道府県</option>
                <option
                  v-for="pref_choice in pref_choices"
                  :key="pref_choice.label_text"
                  :value="pref_choice.label_text"
                >
                  {{ pref_choice.label_text }}
                </option>
              </select>
            </div>
            <div
              v-if="failedRules.required && validationMode"
              class="validateError"
            >
              都道府県を選択してください。
            </div>
          </ValidationProvider>
        </div>
        <div class="inBox">
          <ValidationProvider
            name="address"
            rules="required"
            :bails="false"
            v-slot="{ passed, failedRules }"
            slim
          >
            <span>住所</span>
            <input
              type="text"
              name="address"
              :class="{
                validationMode: validationMode,
                passed: passed,
                confirmMode: confirmMode,
              }"
              :placeholder="form_item.placeholder"
              v-model="address"
            />
            <div
              v-if="failedRules.required && validationMode"
              class="validateError"
            >
              {{ form_item.required_error_msg }}
            </div>
          </ValidationProvider>
        </div>
      </div>
      <span v-if="confirmMode">
        〒 {{ zip }}<br />{{ pref }}{{ address }}
      </span>
    </template>
    <template v-if="form_item.required == 0">
      <div :class="{ confirmMode: confirmMode }" class="addrSection">
        <div class="inBox">
          <ValidationProvider
            :name="form_item.lang_title"
            :rules="{ regex: /^(\d{3})-?(\d{4})/, max: 8 }"
            :bails="false"
            v-slot="{ passed, validationMode, failedRules }"
            slim
          >
            <div class="flexBox addrBox01">
              <div class="txt">郵便番号</div>
              <input
                type="tel"
                id="zip"
                name="zip"
                :class="{
                  validationMode: validationMode,
                  passed: passed,
                  confirmMode: confirmMode,
                }"
                :placeholder="form_item.placeholder"
                v-model="zip"
              />
            </div>
            <div v-if="failedRules.regex && validationMode" class="validateError">
              郵便番号を入力してください。
            </div>
            <div
              v-else-if="failedRules.max && validationMode"
              class="validateError"
            >
              郵便番号を入力してください。
            </div>
          </ValidationProvider>
        </div>
        <div class="inBox">
          <div class="flexBox addrBox01">
            <div class="txt">都道府県</div>
            <select
              name="pref"
              :class="{ confirmMode: confirmMode }"
              v-model="pref"
            >
              <option value="">都道府県</option>
              <option
                v-for="pref_choice in pref_choices"
                :key="pref_choice.label_text"
                :value="pref_choice.label_text"
              >
                {{ pref_choice.label_text }}
              </option>
            </select>
          </div>
        </div>
        <div class="inBox">
          <span class="">住所</span>
          <input
            type="text"
            name="address"
            :class="{ confirmMode: confirmMode }"
            :placeholder="form_item.placeholder"
            v-model="address"
          />
        </div>
      </div>
      <span v-if="confirmMode">
        〒 {{ zip }}<br />{{ pref }}{{ address }}
      </span>
    </template>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required, regex, max } from "vee-validate/dist/rules";
import { setInteractionMode } from 'vee-validate'

extend("required", required);
extend("regex", regex);
extend("max", max);

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
    pref_choices: {
      type: Array,
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
      zip: "",
      pref: document.getElementById("pref")
        ? document.getElementById("pref").value
        : "",
      address: "",
    };
  },
  watch: {
    zip: function (zip) {
      let _this = this;
      new YubinBango.Core(zip, function (addr) {
        _this.pref = addr.region; // 都道府県ID
        _this.address = addr.locality; // 市区町村
        _this.address += addr.street; // 町域
      });
    },
  },
};
</script>



