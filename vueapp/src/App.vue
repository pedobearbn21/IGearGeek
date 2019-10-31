<template>
  <v-app>
      <v-app-bar app>
      <v-toolbar-title class="headline text-uppercase">
        <span>IGEARGEEK</span>

        <span class="font-weight-light"></span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <router-link to="/">Home</router-link> |
      <router-link to="/onleave">Onleave</router-link> |
      <router-link to="/late">Late</router-link> |
      <router-link to="/login">login</router-link> |
      <router-link to="/register">register</router-link> |
      <router-link to="/"><button @click="logout">logout</button></router-link>
    </v-app-bar>

    <v-content class="text-center">
      <router-view></router-view>
    </v-content>
  </v-app>
</template>

<script>
import HelloWorld from "./components/HelloWorld";
import LoginComp from "./views/Login";
import { sync, call } from "vuex-pathify";


export default {
  name: "App",
  mounted() {
  },
  components: {
    HelloWorld,
    LoginComp
  },
  computed: {
    ...sync("user/*")
  },
  methods: {
    ...call("user/*"),
    logout(){
      this.logouted();
    }
  },
};
</script>
