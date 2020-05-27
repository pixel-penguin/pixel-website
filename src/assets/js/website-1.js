
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
 
Vue.use(VueAxios, axios);

import VueSweetalert2 from 'vue-sweetalert2'; 
Vue.use(VueSweetalert2);

Vue.component('globalcomponent-cartnavigation', require('./components-1/website-1/global-components/Cart-Navigation.vue').default);
Vue.component('globalcomponent-show-item', require('./components-1/website-1/global-components/Show-Item.vue').default);


Vue.component('product-show-item', require('./components-1/website-1/product/Show-Item.vue').default);

Vue.component('product-directory-show', require('./components-1/website-1/product/Show-Directory.vue').default);

Vue.component('cart-view', require('./components-1/website-1/cart/View.vue').default);
Vue.component('cart-checkout', require('./components-1/website-1/cart/Checkout.vue').default);


Vue.component('contact.contact1', require('./components-1/website-1/contact/Contact1.vue').default);

window.Hub = new Vue({
    el: '#app'
});
