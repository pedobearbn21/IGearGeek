import Vue from "vue";
import store from "./stores";

import App from "./App.vue";
import router from "./routers";

import axios from "axios";
import vuetify from "./plugins/vuetify";

window.axios = axios;
Vue.config.productionTip = false;

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
