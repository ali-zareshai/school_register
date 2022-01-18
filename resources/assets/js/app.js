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
import VueMask from 'v-mask'


import '@progress/kendo-ui'
import '@progress/kendo-theme-default/dist/all.css'
import { Grid, GridInstaller } from '@progress/kendo-grid-vue-wrapper'
import { DataSourceInstaller } from '@progress/kendo-datasource-vue-wrapper'
// import { TimePicker } from 'uiv'
import * as uiv from 'uiv'

Vue.use(uiv)

Vue.use(GridInstaller)
Vue.use(VueMask)
Vue.use(DataSourceInstaller);
import * as VeeValidate from 'vee-validate';


Validator.extend('irani', {
    getMessage: field => field + ' صحیح نمی باشد.',
    validate: code => {
        var L = code.length;
        if (L != 10 || parseInt(code, 10) == 0) return false;
        code = ('0000' + code).substr(L + 4 - 10);
        if (parseInt(code.substr(3, 6), 10) == 0) return false;
        var c = parseInt(code.substr(9, 1), 10);
        var s = 0;
        for (var i = 0; i < 9; i++)
            s += parseInt(code.substr(i, 1), 10) * (10 - i);
        s = s % 11;
        return (s < 2 && c == s) || (s >= 2 && c == (11 - s));
    }
});

Vue.use(VeeValidate,{fieldsBagName: 'formFields'});


Vue.use(VueRouter);
     

      
        const app = new Vue({
            el: '#wrapper',
            router,
            components: {
                Grid          
            }
        });