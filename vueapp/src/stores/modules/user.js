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
        console.log(state.user);
        return r.data;
      })
      .catch(err => {
        console.log(err);
      });

    return result;
  },
  register: async function({ state }, dataform) {
    let result = axios
      .post("http://localhost:8000/api/auth/register", dataform)
      .then(r => {
        console.log(r);
      })
      .catch(err => {
        console.log(err);
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
