import Vue from "vue";
import Router from "vue-router";
import Home from "@/views/Home.vue";
import Template from "../views/Template";
import Login from "../views/Login";
import Register from "../views/Register";
Vue.use(Router);

export default new Router({
  routes: [
    {
      path: "/",
      component: Template,
      children: [
        {
          path: "",
          name: "home",
          component: Home
        },
        {
          path: "/about",
          name: "about",
          // route level code-splitting
          // this generates a separate chunk (about.[hash].js) for this route
          // which is lazy-loaded when the route is visited.
          component: () =>
            import(/* webpackChunkName: "about" */ "@/views/About.vue")
        }
      ]
    },
    {
      path: "/login",
      name: "login",
      component: Login
    },
    {
      path: "/register",
      name: "register",
      component: Register
    }
  ]
});
