<template>
  <div>
    <ValidationProvider
      v-if="form_item.required == 1"
      :name="form_item.lang_title"
      rules="required"
      :bails="false"
      v-slot="{ invalid, touched, validated, failedRules }"
      slim
    >
    <div class="selectWrap mw630">
      <select multiple
        :name="`${form_item.name}[]`"
        :class="{invalid: invalid ,touched: touched, validated:validated, confirmMode:confirmMode}"
        v-model="selectValue"
        class="h-auto">
        <option value="">{{ form_item.title }}</option>
        <option
          v-for="val in select"
          :key="val.label_text"
          :value="val.label_text"
        >
          {{ val.label_text }}
        </option>
      </select>
      <span
        v-if="confirmMode"
      >
        <template
          v-for="value in selectValue"
        >
          {{ value }}
        </template>
      </span>
      <div v-if="failedRules.required" class="validateError">{{ form_item.required_error_msg }}</div>
    </div>
    </ValidationProvider>
    <template v-if="form_item.required == 0">
      <div class="selectWrap mw630">
        <select multiple
          :name="`${form_item.name}[]`"
          :class="{confirmMode:confirmMode}"
          v-model="selectValue"
          class="h-auto">
          <option value="">{{ form_item.title }}</option>
          <option
            v-for="val in select"
            :key="val.label_text"
            :value="val.label_text"
          >
            {{ val.label_text }}
          </option>
        </select>
        <span
          v-if="confirmMode"
        >
          <template
            v-for="value in selectValue"
          >
            {{ value }}
          </template>
        </span>
      </div>
    </template>
  </div>
</template>

<script>
import Vue from "vue";
import { ValidationProvider, localize, extend } from "vee-validate";
import { required } from 'vee-validate/dist/rules'

extend('required', required)


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
    choices: {
      type: Array,
    }
  },
  data(){
    return {
      selectValue: [],
    }
  },
  computed: {
    select: function() {
      let choices = this.choices;
      let form_item = this.form_item;

      const checkboxFilter = choices.filter(
        function (type) {
          return type.choice_type ==="select";
      })
      const result = checkboxFilter.filter(
        function (id) {
          return id.block_id == form_item.form_block_id;
      })
      return result;
    },
  }
};
</script>
