/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './App.vue';
Vue.use(VueAxios, axios);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

import TopComponent from './components/TopComponent.vue';
import HistoryComponent from './components/HistoryComponent.vue';
import SkillComponent from './components/SkillComponent.vue';
import ProductsComponent from './components/ProductsComponent.vue';
import BlogComponent from './components/BlogComponent.vue';
import BlogDetailComponent from './components/BlogDetailComponent.vue';
import ChatComponent from './components/demo/ChatComponent.vue';

const routes = [
    {
        name: 'top',
        path: '/',
        component: TopComponent
    },
    {
        name: 'history',
        path: '/history',
        component: HistoryComponent
    },
    {
        name: 'skill',
        path: '/skill',
        component: SkillComponent
    },
    {
        name: 'products',
        path: '/products',
        component: ProductsComponent
    },
    {
        name: 'blog',
        path: '/blog',
        component: BlogComponent
    },
    {
        name: 'blog-detail',
        path: '/blog-detail/:name',
        component: BlogDetailComponent
    },
    {
        name: 'chat',
        path: '/chat',
        component: ChatComponent
    },
];
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter(
    { mode: 'history', routes: routes}
);
const app = new Vue(
    Vue.util.extend(
        { router }, App
    )
).$mount('#app');
