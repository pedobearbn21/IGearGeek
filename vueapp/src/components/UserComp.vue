<template>
  <div>
    <p>{{ user.name }}</p>
    <p>Role:{{ user.role }}</p>
    <div v-if='user.role == `owner`'>
      owner success
    </div>
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
