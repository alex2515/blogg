
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import Vue from 'vue';
import router from './routes';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('nav-bar', require('./components/NavBar'));
Vue.component('post-header', require('./components/PostHeader'));
Vue.component('posts-list', require('./components/PostsList'));
Vue.component('posts-list-item', require('./components/PostsListItem'));
Vue.component('category-link', require('./components/CategoryLink'));
Vue.component('post-link', require('./components/PostLink'));
Vue.component('disqus-comments', require('./components/DisqusComments'));
Vue.component('paginator', require('./components/Paginator'));
Vue.component('pagination-links', require('./components/PaginationLinks'));

const app = new Vue({
	router,
	el: '#app'
});
