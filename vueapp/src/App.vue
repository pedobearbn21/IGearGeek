<template>
  <v-app style="background: #F8FCC7">
     <NavComp/>
    <v-container style="background: #F8FCC7">
      <v-row
        align="center"
        justify="center"
      >
        <!-- <v-btn
          color="pink"
          dark
          style="height:100px;"
          @click.stop="drawertoogle = !drawertoogle"
        >
          Toggle
        </v-btn> -->
        <v-content class="text-center container">
              <router-view></router-view>
        </v-content>
      </v-row>
    </v-container>

    <v-navigation-drawer
      v-model="drawertoogle"
      absolute
      temporary
    >
      <ItemnavComp/>
    </v-navigation-drawer>
        
  </v-app>
</template>

<script>
import HelloWorld from "./components/HelloWorld";
import LoginComp from "./views/Login";
import NavComp from './components/NavComp';
import ItemnavComp from './components/ItemnavComp';
import { sync, call } from "vuex-pathify";


export default {
  name: "App",
  components: {
    HelloWorld,
    LoginComp,
    NavComp,
    ItemnavComp
  },data() {
    return {
      items: [
                { title: 'Home', icon: 'dashboard' },
                { title: 'About', icon: 'question_answer' },
            ],
    }
  },
  computed: {
    ...sync("user/*")
  },
};
</script>
