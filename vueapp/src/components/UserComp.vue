<template>
  <div v-if="user">
    <p>{{ user.user.name }}</p>
    <p>Role:{{ user.role }}</p>
    <div  v-if='user.role == `owner`'>
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
  created() {
    this.logged();
  },
  computed: {
    ...sync("user/*"),
    // username: sync("user/username")
  },
  methods: {
    ...call("user/*"),
  },
};
</script>
