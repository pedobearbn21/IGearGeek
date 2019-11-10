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
        },
        {
          path: "onleave",
          name: "onleave",
          component: () =>
            import(/* webpackChunkName: "about" */ "@/views/Onleave.vue")
        },
        {
          path: "late",
          name: "late",
          component: () =>
            import(/* webpackChunkName: "about" */ "@/views/Late.vue")
        },
        {
          path: "register",
          name: "register",
          component: Register
        },
        {
          path: "login",
          name: "login",
          component: Login
        },
        {
          path: "charts",
          name: "charts",
          component: () =>
            import(/* */ "@/components/ChartComp.vue")
        },
        {
          path: "updatestatusorleave",
          name: "updatestatusorleave",
          component: () =>
            import(/* webpackChunkName: "about" */ "@/views/updatestatusorleave")
        },
        {
          path: "showempdata",
          name: "showempdata",
          component: () =>
            import(/* webpackChunkName: "about" */ "@/views/showempdata")
        }
      ]
    }
  ]
});
