import Vue from "vue";
import Vuex from "vuex";
import pathify from 'vuex-pathify'

import user from "./modules/user";

Vue.use(Vuex);

export default new Vuex.Store({
    plugins: [pathify.plugin], // activate plugin
    state: {
        username: "WORLD",
    },
    mutations: {},
    actions: {},
    modules: {
        user: user,
    },
});
