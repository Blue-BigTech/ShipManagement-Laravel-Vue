import './bootstrap'
import Vue from 'vue'
import gv from './mixins/globalValiables'
Vue.mixin(gv)
import { ValidationObserver, setInteractionMode } from 'vee-validate'
import TextValidate from './components/FormItem/TextValidate'
import TextNoneRealValidate from './components/FormItem/TextNoneRealValidate'
import NumberValidate from './components/FormItem/NumberValidate'
import NumberNoneRealValidate from './components/FormItem/NumberNoneRealValidate'
import TextareaValidate from './components/FormItem/TextareaValidate'
import TextareaNoneRealValidate from './components/FormItem/TextareaNoneRealValidate'
import EmailValidate from './components/FormItem/EmailValidate'
import EmailNoneRealValidate from './components/FormItem/EmailNoneRealValidate'
import TelValidate from './components/FormItem/TelValidate'
import TelNoneRealValidate from './components/FormItem/TelNoneRealValidate'
import DateValidate from './components/FormItem/DateValidate'
import DateNoneRealValidate from './components/FormItem/DateNoneRealValidate'
import DatetimeValidate from './components/FormItem/DatetimeValidate'
import DatetimeNoneRealValidate from './components/FormItem/DatetimeNoneRealValidate'
import MonthValidate from './components/FormItem/MonthValidate'
import MonthNoneRealValidate from './components/FormItem/MonthNoneRealValidate'
import TimeValidate from './components/FormItem/TimeValidate'
import TimeNoneRealValidate from './components/FormItem/TimeNoneRealValidate'
import PasswordValidate from './components/FormItem/PasswordValidate'
import PasswordNoneRealValidate from './components/FormItem/PasswordNoneRealValidate'
import UrlValidate from './components/FormItem/UrlValidate'
import UrlNoneRealValidate from './components/FormItem/UrlNoneRealValidate'
import ZipValidate from './components/FormItem/ZipValidate'
import ZipNoneRealValidate from './components/FormItem/ZipNoneRealValidate'
import SelectValidate from './components/FormItem/SelectValidate'
import SelectNoneRealValidate from './components/FormItem/SelectNoneRealValidate'
import MultiselectValidate from './components/FormItem/MultiselectValidate'
import MultiselectNoneRealValidate from './components/FormItem/MultiselectNoneRealValidate'
import RadioValidate from './components/FormItem/RadioValidate'
import RadioNoneRealValidate from './components/FormItem/RadioNoneRealValidate'
import CheckboxValidate from './components/FormItem/CheckboxValidate'
import CheckboxNoneRealValidate from './components/FormItem/CheckboxNoneRealValidate'
import FileValidate from './components/FormItem/FileValidate'
import FileNoneRealValidate from './components/FormItem/FileNoneRealValidate'
import FullnameValidate from './components/FormItem/FullnameValidate'
import FullnameNoneRealValidate from './components/FormItem/FullnameNoneRealValidate'
import NameAndFuriganaValidate from './components/FormItem/NameAndFuriganaValidate'
import NameAndFuriganaNoneRealValidate from './components/FormItem/NameAndFuriganaNoneRealValidate'
import SubmitButton from './components/Button/SubmitButton'

// インタラクションモードをセット(グローバルで適用)
setInteractionMode('eager');

const app = new Vue({
  el: '#app',
  components: {
    ValidationObserver,
    TextValidate,
    TextNoneRealValidate,
    NumberValidate,
    NumberNoneRealValidate,
    TextareaValidate,
    TextareaNoneRealValidate,
    EmailValidate,
    EmailNoneRealValidate,
    TelValidate,
    TelNoneRealValidate,
    DateValidate,
    DateNoneRealValidate,
    DatetimeValidate,
    DatetimeNoneRealValidate,
    MonthValidate,
    MonthNoneRealValidate,
    TimeValidate,
    TimeNoneRealValidate,
    PasswordValidate,
    PasswordNoneRealValidate,
    UrlValidate,
    UrlNoneRealValidate,
    ZipValidate,
    ZipNoneRealValidate,
    SelectValidate,
    SelectNoneRealValidate,
    MultiselectValidate,
    MultiselectNoneRealValidate,
    RadioValidate,
    RadioNoneRealValidate,
    CheckboxValidate,
    CheckboxNoneRealValidate,
    FileValidate,
    FileNoneRealValidate,
    FullnameValidate,
    FullnameNoneRealValidate,
    NameAndFuriganaValidate,
    NameAndFuriganaNoneRealValidate,
    SubmitButton
  },
  data: function () {
    return {
      confirmMode: false,  //入力画面と確認画面の切り替え
      validationMode: false, //一度でも確認ボタンを押すとtrueになる(リアルタイムなしの項目に対応)
    }
  },
  methods: {
    // 確認ボタン
    confirm(e) {
      if (!this.$refs.observer.flags.valid) {
        this.$refs.observer.validate();
        this.confirmMode = false;
        this.validationMode = true;
        this.scrollTop();
        return;
      }
      if (!this.confirmMode) {

        //プラグイン追加時の対応
        let js_conf_control = Array.from(document.getElementsByClassName("js_conf_control"));
        js_conf_control = Array.from(js_conf_control);
        js_conf_control.forEach(el => el.style.display = "block");

        let js_input_control = document.getElementsByClassName("js_input_control");
        js_input_control = Array.from(js_input_control);
        js_input_control.forEach(el => el.style.display = "none");


        this.confirmMode = true;
        this.scrollTop();
        e.preventDefault();
      }
    },
    // 「戻る」ボタンクリック時
    back() {
      this.confirmMode = false;

      //プラグイン追加時の対応
      let js_conf_control = Array.from(document.getElementsByClassName("js_conf_control"));
      js_conf_control = Array.from(js_conf_control);
      js_conf_control.forEach(el => el.style.display = "none");

      let js_input_control = document.getElementsByClassName("js_input_control");
      js_input_control = Array.from(js_input_control);
      js_input_control.forEach(el => el.style.display = "block");

      this.scrollTop();
    },
  },
});
