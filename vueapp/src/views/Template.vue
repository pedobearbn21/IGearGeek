<template>
  <div>
    <div id="nav">
      
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from "@/components/HelloWorld.vue";
import { sync, call } from "vuex-pathify";
import UserComp from "@/components/UserComp";

export default {
  name: "home",
  components: {},
  computed: {}
};
</script>
