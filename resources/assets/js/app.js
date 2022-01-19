/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';

window.Vue = require('vue');

import VueRouter from 'vue-router';
import router from './route';
import VueMask from 'v-mask';

import "@progress/kendo-ui";
import "@progress/kendo-theme-default/dist/all.css";
import { Grid, GridInstaller } from "@progress/kendo-grid-vue-wrapper";
import { DataSourceInstaller } from "@progress/kendo-datasource-vue-wrapper";
// import { TimePicker } from 'uiv'
import "@progress/kendo-ui/js/messages/kendo.messages.fa-IR.js";
import * as uiv from "uiv";

import VueIziToast from 'vue-izitoast';
import "izitoast/dist/css/iziToast.min.css";
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
import {MultiSelect,DropdownsInstaller} from '@progress/kendo-dropdowns-vue-wrapper';
import VueFormWizard from 'vue-form-wizard';
import 'vue-form-wizard/dist/vue-form-wizard.min.css';


Vue.use(VueFormWizard);
Vue.use(uiv);
Vue.use(VueIziToast);
Vue.use(GridInstaller);
Vue.use(VueMask);
Vue.use(DataSourceInstaller);
Vue.use(DropdownsInstaller);
Vue.component('date-picker', VuePersianDatetimePicker);
import VeeValidate, { Validator } from "vee-validate";

import fa from 'vee-validate/dist/locale/fa';



const locale = {
    name: "fa",
    messages: fa.messages,
    attributes: {
        'name':'نام',
        'post_code':'کد پستی',
        'ssn':'کد ملی',
        'address':'آدرس',
        'email':'ایمیل',
        'mobile':'شماره موبایل',
        'password':'رمز عبور',
        'confirm_password':'تکرار پسورد',
        'state':'استان',
        'city':'شهر',
        'name_fa':'نام',
        'name_en':'نام',
        'progress':'درصد پیشرفت',
        'date':'تاریخ',
        'price':'قیمت',
        'text':'متن',
        'title ':'عنوان',
        'link':'لینک',
        'kelas':'مقطع',
        'gender':'جنسیت',
        'family_name':'نام خانوادگی',
        'student_father_name':'نام پدر',
        'meli_code':'کد ملی',
        'serial_ssn':'سریال شناسنامه',
        'city_ssn':'محل صدور',
        'several_children':'چندمین فرزند',
        'father_type':'نوع والد',
        'father_name':'نام پدر',
        
    }
};


Validator.extend("irani", {
  getMessage: (field) => field + " صحیح نمی باشد.",
  validate: (code) => {
    var L = code.length;
    if (L != 10 || parseInt(code, 10) == 0) return false;
    code = ("0000" + code).substr(L + 4 - 10);
    if (parseInt(code.substr(3, 6), 10) == 0) return false;
    var c = parseInt(code.substr(9, 1), 10);
    var s = 0;
    for (var i = 0; i < 9; i++) s += parseInt(code.substr(i, 1), 10) * (10 - i);
    s = s % 11;
    return (s < 2 && c == s) || (s >= 2 && c == 11 - s);
  },
});



Vue.use(VeeValidate, {locale: "fa", fieldsBagName: 'formFields' });
Validator.localize('fa', locale);
Vue.use(VueRouter);

// this.$i18n.locale = 'fr'
// router.beforeEach((to, from, next) => {
//   if (to.name) {
//       if (to.name!="" && !Acl.checkAbility("view", to.name) && to.path != "/") {
//           next('/');
//           return;
//       }
//   }

  // full screen pages
  // if(to.path.startsWith("/posts/pishkan")){
  //   $("body").addClass("mini-navbar");
  // }
//   next();
// });

const app = new Vue({
  el: "#wrapper",
  router,
  components: {
    Grid,
  },
  created() {
    $(".main-loader").hide();
  },
});