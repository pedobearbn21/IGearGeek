<template>
  <v-app>
    <v-app-bar app>
      <v-toolbar-title class="headline text-uppercase">
        <span>Vuetify</span>
        <span class="font-weight-light">MATERIAL DESIGN</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </v-app-bar>

    <v-content class="text-center" v-if="user">
      <router-view></router-view>
    </v-content>
    <v-content class="text-center" v-else>
      <LoginComp></LoginComp>
    </v-content>
  </v-app>
</template>

<script>
import HelloWorld from "./components/HelloWorld";
import LoginComp from "./views/Login";
import { sync, call } from "vuex-pathify";


export default {
  name: "App",
  components: {
    HelloWorld,
    LoginComp
  },
  computed: {
    ...sync("user/*")
  }
};
</script>
