<template>
  <div class="row text-center">
  <div class="col-12">
      <img src="@/assets/logo_igeargeek.png" alt="" width="300"  height="100">
  </div>
   <div class="col-12">
     <div align="center">
        <v-col cols="12" sm="4">
              <v-text-field
                type="email"
                v-model="loginForm.email"
                label="username"
                outlined>
              </v-text-field>
              <v-text-field
                type="password"
                v-model="loginForm.password"
                label="password"
                outlined>
              </v-text-field>
          </v-col>
      <v-btn type="button" color="primary" @click="btnLoginClick">Login</v-btn>
    </div>
  </div>
 </div>
</template>
<script>
import { sync, call, dispatch } from "vuex-pathify";

export default {
  name: "login",
  computed: {
    ...sync("user/*")
  },
  data: () => ({
    myusername: "TEST",
    mytext: "TEST",
  }),
  methods: {
    ...call("user/*"),
    btnLoginClick: async function() {
      let result = await this.login();
      console.log(result);
      if (result) {
        alert("login สำเร็จ");
        this.$router.push({ name: "home" });
      } else {
        alert("login ผิดพลาด");
      }
    },
    alertText: function() {
      dispatch("user/alertSomething", { text: this.mytext });
    }
  }
};
</script>
