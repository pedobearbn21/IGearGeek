import {make} from "vuex-pathify";

const state = {
    username: "John Doe",
    loginForm: {
        username: "",
        password: "",
    }
};
const mutations = {
    ...make.mutations(state),

};
const actions = {

    login: async function ({state}, event) {
        console.log(state.loginForm);
        //return {username : 'xxx'}
        return false;
    },
    alertUsername: function ({state}, data) {
        alert(state.username);
    },
    alertSomething: function ({}, {text}) {
        alert(text)
        state.username = text;
    }

};
const getters = {};

export default {
    namespaced: true,
    state: state,
    mutations: mutations,
    actions: actions,
    getters: getters
};
