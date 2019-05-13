require('./bootstrap');

window.Vue = require('vue');

//引入路由
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import router from './routes.js'
import App from './components/App'

import zn_CN from 'vee-validate/dist/locale/zh_CN';
import VeeValidate, { Validator } from 'vee-validate';

Vue.use(VeeValidate);
Validator.localize('zn_CN', zn_CN);

Vue.component('app',App);
const app = new Vue({
    el: '#app',
    router
});
