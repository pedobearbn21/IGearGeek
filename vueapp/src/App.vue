<template>
<<<<<<< HEAD
  <v-app style="background: #F8FCC7">
      <v-app-bar app  style="background: #1F5769;">
      <img src="@/assets/igg.png" alt="" width="50"  height="50">
=======
  <v-app>
      <v-app-bar app>
      <v-toolbar-title class="headline text-uppercase">
        <span>IGEARGEEK</span>

        <span class="font-weight-light"></span>
      </v-toolbar-title>
>>>>>>> 43fcd432de258775c7e9ce20f0028acdaa0427ed
      <v-spacer></v-spacer>
      
      <router-link to="/" style="color:white"><v-btn text small color="white" @click="Home">Home</v-btn></router-link>
      &nbsp;&nbsp;
      <router-link to="/onleave" style="color:white"><v-btn text small color="white" @click="Onleave">Onleave</v-btn></router-link>
      &nbsp;&nbsp;
      <router-link to="/late" style="color:white"><v-btn text small color="white" @click="Late">Late</v-btn></router-link>
      &nbsp;&nbsp;
      <router-link to="/login" style="color:white"><v-btn text small color="white" @click="login">login</v-btn></router-link>
      &nbsp;&nbsp;
      <router-link to="/register" style="color:white"><v-btn depressed color="green" @click="register">register</v-btn></router-link>
      &nbsp;&nbsp;
      <router-link to="/" style="color:white"><v-btn depressed large color="error" @click="logout">logout</v-btn></router-link>
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
