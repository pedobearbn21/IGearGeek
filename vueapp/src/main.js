import Vue from "vue";
import store from "./stores";

import App from "./App.vue";
import router from "./routers";

import axios from 'axios';

window.axios = axios;


Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
