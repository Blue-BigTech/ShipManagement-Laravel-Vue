<template>
  <div>
    <template v-if="form_item.required == 1">
      <div class="col2">
        <ValidationProvider
          name="last_name"
          rules="required"
          :bails="false"
          v-slot="{ passed, failedRules }"
          slim
        >
          <div class="flexBox kanaBox" :class="{ confirmMode: confirmMode }">
            <div class="txt">姓</div>
            <div class="form">
              <input
                type="text"
                name="last_name"
                id="last_name"
                class="form__input name lastName"
                :class="{
                  validationMode: validationMode,
                  passed: passed,
                  confirmMode: confirmMode,
                }"
                :placeholder="form_item.placeholder"
                v-model="lastName"
              />
            </div>
          </div>
          <div v-if="failedRules.required" class="validateError">
            {{ form_item.required_error_msg }}
          </div>
        </ValidationProvider>
        <ValidationProvider
          name="first_name"
          rules="required"
          :bails="false"
          v-slot="{ passed, failedRules }"
          slim
        >
          <div class="flexBox kanaBox" :class="{ confirmMode: confirmMode }">
            <div class="txt">名</div>
            <div class="form">
              <input
                type="text"
                name="first_name"
                id="first_name"
                class="form__input name firstName"
                :class="{
                  validationMode: validationMode,
                  passed: passed,
                  confirmMode: confirmMode,
                }"
                :placeholder="form_item.placeholder"
                v-model="firstName"
              />
            </div>
          </div>
          <div v-if="failedRules.required && validationMode" class="validateError">
            {{ form_item.required_error_msg }}
          </div>
        </ValidationProvider>
      </div>
      <span v-if="confirmMode"> {{ lastName }} {{ firstName }} </span>
    </template>
    <template v-if="form_item.required == 0">
      <div class="col2">
        <div class="flexBox kanaBox" :class="{ confirmMode: confirmMode }">
          <div class="txt">姓</div>
          <div class="form">
            <input
              type="text"
              name="last_name"
              id="last_name"
              class="form__input name lastName"
              :class="{ confirmMode: confirmMode }"
              :placeholder="form_item.placeholder"
              v-model="lastName"
            />
          </div>
        </div>
        <div class="flexBox kanaBox" :class="{ confirmMode: confirmMode }">
          <div class="txt">名</div>
          <div class="form">
            <input
              type="text"
              name="first_name"
              id="first_name"
              class="form__input name firstName"
              :class="{ confirmMode: confirmMode }"
              :placeholder="form_item.placeholder"
              v-model="firstName"
            />
          </div>
        </div>
      </div>
      <span v-if="confirmMode"> {{ lastName }} {{ firstName }} </span>
    </template>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required } from "vee-validate/dist/rules";

extend("required", required);

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
      firstName: "",
      lastName: "",
    };
  },
};
</script>



