/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router';
import UserCreate from './components/users/user-create-component.vue'
import UserIndex from './components/users/user-index-component.vue'

window.Vue=Vue;
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

 const files = require.context('./', true, /\.vue$/i)
 files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('new-service-component', require('./components/services/new-service-component.vue').default);
Vue.component('service-modal-component', require('./components/services/service-modal-component.vue').default);
Vue.component('user-index-component', require('./components/users/user-index-component.vue').default);
Vue.component('user-create-component', require('./components/users/user-create-component.vue').default);
Vue.use(VueRouter);
const routes = [
    { path: '/user-index', component: UserIndex },
  ]

  // You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes // short for `routes: routes`
  })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app =new Vue({
    router,
    el:'#app'
});
