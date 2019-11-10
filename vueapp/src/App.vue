<template>
  <v-app style="background: #F8FCC7">
     <NavComp/>
    <v-container class="fill-height"  style="background: #F8FCC7">
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
      <v-list-item>
        <v-list-item-avatar>
          <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title>John Leider</v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list dense>

        <v-list-item
          v-for="item in items"
          :key="item.title"
          link
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
        
  </v-app>
</template>

<script>
import HelloWorld from "./components/HelloWorld";
import LoginComp from "./views/Login";
import NavComp from './components/NavComp';
import { sync, call } from "vuex-pathify";


export default {
  name: "App",
  components: {
    HelloWorld,
    LoginComp,
    NavComp
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
