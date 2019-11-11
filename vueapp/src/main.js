import Vue from "vue";
import store from "./stores";

import App from "./App.vue";
import router from "./routers";

import axios from "axios";
import vuetify from "./plugins/vuetify";
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue);
window.axios = axios;
Vue.config.productionTip = false;

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
