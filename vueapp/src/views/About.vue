<template>
    <div class="about">
       <h1>Login</h1>
      username : <input type="text" v-model="loginForm.username"/><br/>
      password : <input type="password" v-model="loginForm.password"/><br/>
      <button type="button" @click="btnLoginClick">Login</button>
    </div>
</template>
<script>

    import {sync, call, dispatch} from "vuex-pathify";

    export default {
        name: "about",
        computed: {
            ...sync('user/*')
        },
        data: () => ({
            myusername: "TEST",
            mytext: "TEST"
        }),
        methods: {
            ...call('user/*'),
            btnLoginClick : async function(){
              let result = await this.login();
              console.log(result);
              if(result) {
                alert('login สำเร็จ');
                this.$router.push({name : 'home'})
              }else {
                alert('login ผิดพลาด')
              }


            },
            alertText: function () {
                dispatch("user/alertSomething", {text : this.mytext})
            }
        }
    };
</script>
