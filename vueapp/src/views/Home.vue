<template>
  <div class="home">
    <h1><UserComp></UserComp></h1>
    <img src="@/assets/igg.png" alt="IGEARGEEK" >
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from "@/components/HelloWorld.vue";
import { sync, call } from "vuex-pathify";
import UserComp from "@/components/UserComp";

export default {
  name: "home",
  components: {
    UserComp,
    HelloWorld
  },
  computed: {
    username: sync("user/username")
  }
};
</script>
