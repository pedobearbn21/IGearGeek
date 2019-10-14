<template>
  <div>
    <p>{{username}}</p>
  </div>
</template>

<script>
  import {sync,call} from "vuex-pathify";

export default {
  name: "UserComp",
  props: {
    msg: String
  },
  computed : {
    username : sync("user/username")
  }

};
</script>

