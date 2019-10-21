<template>
    <div>
        <h1>register</h1>
        username : <input type="text" v-model="form.name" /><br />
        email : <input type="email" v-model="form.email" /><br />
        password : <input type="password" v-model="form.password" /><br />
        confirmpassword : <input type="password" v-model="form.c_password" /><br />
        <button type="button" @click="signup">register</button>
    </div>
  
</template>

<script>
import { sync, call, dispatch } from "vuex-pathify";
export default {
  computed: {
    ...sync("user/*")
  },
  data: ()=>({
      form: {
        name: 'username',
        email: 'exmaple@example.com',
        password: 'password',
        c_password: 'confirm password',
      }
    
  }),
  methods: {
    ...call("user/*"),
    signup: async function(){
        console.log(this.form);
        let register = await this.register(this.form);
        if( register ){
            alert('Register Success');
        }
        else {
            alert('Register Failed');
        }
    }
  }

}
</script>
