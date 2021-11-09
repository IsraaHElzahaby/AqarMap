import Vue from 'vue'
import VueRouter from 'vue-router'
import config from './config'
import App from './App.vue';
import routes from './routes.js';


Vue.config.productionTip = false
Vue.use(VueRouter)



//global variables
Vue.prototype.$apiUrl = config.apiUrl
const router = new VueRouter({routes, mode: 'history'});


new Vue({
  router : router,
  render: h => h(App)
}).$mount("#app");
