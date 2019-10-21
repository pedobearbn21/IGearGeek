import { make } from "vuex-pathify";

const state = {
  user: null,
  username: "John Doe",
  loginForm: {
    email: "",
    password: ""
  }
};
const mutations = {
  ...make.mutations(state)
};
const actions = {
  login: async function({ state }, event) {
    let result = axios
      .post("http://localhost:8000/api/auth/login", state.loginForm)
      .then(r => {
        state.user = r.data;
        return r.data;
      })
      .catch(err => {
        //handle error
      });

    return result;
  },
  alertUsername: function({ state }, data) {
    alert(state.username);
  },
  alertSomething: function({}, { text }) {
    alert(text);
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
