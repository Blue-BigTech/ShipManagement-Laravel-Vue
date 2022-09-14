<template>
  <div class="form-outline">
    <label v-if="label" class="form-label" :for="id"
      >{{ label }}<span v-if="required" class="text-danger ml-2 required-info">必須</span></label
    >
    <vuejs-datepicker
      v-model="selectedDate"
      :disabled-dates="disabledDates"
      :placeholder="placeholder"
      :disabled="disabled"
      format="yyyy-MM-dd"
      input-class="form-date_picker"
      wrapper-class="uk-inline"
      :language="ja"
      :clear-button="isClearButton"
      @selected="changeDate"
    >
      <span slot="afterDateInput" class="animated-placeholder">
        <i class="fa fa-calendar-minus"></i>
      </span>
    </vuejs-datepicker>
  </div>
</template>

<script>
import moment from 'moment'

import Datepicker from 'vuejs-datepicker'
import { ja } from 'vuejs-datepicker/dist/locale'

export default {
  components: {
    'vuejs-datepicker': Datepicker,
  },

  props: {
    id: {
      type: String,
      required: true,
      default: '',
    },
    value: {
      type: String,
      required: false,
      default: '',
    },
    disabledDates: {
      type: Object,
      required: false,
      default: () => {},
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
    label: {
      type: String,
      required: false,
      default: '',
    },
    required: {
      type: Boolean,
      required: false,
      default: false,
    },
    isClearButton: {
      type: Boolean,
      required: false,
      default: false,
    },
    placeholder: {
      type: String,
      required: false,
      default: '',
    },
    selectDate: {
      type: String,
      required: false,
      default: '',
    },
    index: {
      type: Number,
      required: false,
      default: null,
    },
  },

  data: () => ({
    selectedDate: '',
    firstLoad: true,
  }),
  computed: {
    ja() {
      return ja
    },
  },

  watch: {
    selectDate: {
      handler(date) {
        this.selectedDate = date
      },
      immediate: true,
    },
  },

  methods: {
    changeDate(val) {
      this.$emit('changeDate', moment(val).format('YYYY-MM-DD'), this.index)
    },
  },
}
</script>

<style>
.form-date_picker {
  padding: 0.375rem 0.75rem;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}
.form-date_picker:disabled {
  background-color: #f9f9f9;
}
.vdp-datepicker__clear-button {
  margin-left: -20px;
  margin-right: 6px;
}
</style>
