require('./bootstrap');

window.Vue = require('vue');

//引入路由
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import router from './routes.js'

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
