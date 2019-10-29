import { make } from "vuex-pathify";

const state = {
  user: null,
  username: "John Doe",
  loginForm: {
    email: "",
    password: ""
  },
  token: ""
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
        localStorage.setItem('user', JSON.stringify(r.data));
        // state.token = r.data.token.token;
        // console.log('Bearer '+ state.token);
        // localStorage.setItem('token', r.data.token.token);
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
        console.log(r.data);
        state.user = r.data;
        return r.data;
      })
      .catch(err => {
        console.log(err);
      });
  },
  alertUsername: function({ state }, data) {
    alert(state.username);
  },
  alertSomething: function({}, { text }) {
    alert(text);
    state.username = text;
  },
  logged: () => {
    state.user = JSON.parse(localStorage.getItem('user'));
    console.log(state.user);
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
