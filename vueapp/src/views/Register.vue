<template>
    <v-container>
        <h1>register</h1>
        <v-card>
            <v-card-text>
             <v-row class="mx-2 my-2">
                <v-col cols='12' class="my-0 py-0">
                    <v-text-field
                        label="Username"
                        v-model="form.name"
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols='12' class="my-0 py-0">
                    <v-text-field
                        label="E-mail"
                        v-model="form.email"
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols='12' class="my-0 py-0">
                    <v-text-field
                        label="Password"
                        type='password'
                        v-model="form.password"
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols='12' class="my-0 py-0">
                    <v-text-field
                        label="ConfirmPassword"
                        type='password'
                        v-model="form.c_password"
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols='12' class="my-0 py-0">
                    <v-btn large  color="primary"  @click="signup">register</v-btn>
                </v-col>
            </v-row>
            </v-card-text>
        </v-card>
       
        <!-- username : <input type="text" v-model="form.name" /><br />
        email : <input type="email" v-model="form.email" /><br />
        password : <input type="password" v-model="form.password" /><br />
        confirmpassword : <input type="password" v-model="form.c_password" /><br />
        <button type="button" @click="signup">register</button> -->
    </v-container>
  
</template>

<script>
import { sync, call, dispatch } from "vuex-pathify";
export default {
  computed: {
    ...sync("user/*")
  },
  data: ()=>({
      form: {
        name: '',
        email: '',
        password: '',
        c_password: '',
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
