import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from './components/Dashboard.vue';
import Comment from './components/Comment.vue';
import ArticleForm from './components/ArticleForm.vue';

Vue.use(VueRouter)

const routes = [
	{ path: '/', component: Dashboard },
    { path: '/article/comment', component: Comment },
    { path: '/article/add', component: ArticleForm },
]
export default routes;
