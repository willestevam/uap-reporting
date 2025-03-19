require('./bootstrap');

import Vue from 'vue';
import Home from 'components/Home.vue';

Vue.component('home', Home);

const app = new Vue({
    el: '#app',
});