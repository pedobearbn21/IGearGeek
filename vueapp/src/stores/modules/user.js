import { make } from "vuex-pathify";

const state = {
  drawertoogle: false,
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
  logouted: async function({ state }) {
    let a = await localStorage.removeItem('user');
    state.user = null;
    // let result = axios
    //   .post("http://localhost:8000/api/auth/logout")
    //   .then(r => {
    //     return true;
    //   })
    //   .catch(err => {
    //     console.log(err);
    //   });
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
