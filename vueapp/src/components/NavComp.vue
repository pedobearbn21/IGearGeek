<template>
    <v-app-bar app  style="background: #1F5769;">
        <img src="@/assets/igg.png" alt="" width="50"  height="50">
        <v-spacer></v-spacer>
        <router-link to="/">Home</router-link> |
        <div v-if=" user.role == 'employee' ">
        <router-link to="/onleave">Onleave</router-link> |
        <router-link to="/late">Late</router-link> |
        <router-link to="/"><button @click="logout">logout</button></router-link>
        </div>
        <div v-else-if =" user.role == 'admin' ">
            <router-link to='/charts'>Charts</router-link> |
            <router-link to='/updatestatusorleave'>AcceptForm</router-link> |
            <router-link to="/"><button @click="logout">logout</button></router-link> 
        </div>
        <div v-else>
            <router-link to="/login">login</router-link> |
            <router-link to="/register">register</router-link> 
        </div>
        <v-app-bar-nav-icon color='yellow' @click.stop="drawertoogle = !drawertoogle"></v-app-bar-nav-icon>
    </v-app-bar>
</template>

<script>
import { sync, call } from "vuex-pathify";
export default {
    name: "NavComp",
    data() {
        return {
            
        }
    },
    computed: {
    ...sync("user/*")
    },
    methods: {
        ...call("user/*"),
        logout(){
        this.logouted();
        },
        modalprop(){
            this.drawer = !this.drawer
        }
    }

}
</script>