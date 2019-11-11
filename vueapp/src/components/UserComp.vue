<template>
<div>
  <div v-if="user">
    <p>Welcome : {{ user.user.name }}</p>
  </div>
  <div>
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
