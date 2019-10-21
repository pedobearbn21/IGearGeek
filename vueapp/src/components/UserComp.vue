<template>
  <div>
    <p>{{ user.name }}</p>
  </div>
</template>

<script>
import { sync, call } from "vuex-pathify";

export default {
  name: "UserComp",
  props: {
    msg: String
  },
  computed: {
    ...sync("user/*")
    // username: sync("user/username")
  }
};
</script>
