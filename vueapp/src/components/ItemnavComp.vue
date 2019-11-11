<template>
    <div>
        <v-list-item>
            <v-list-item-content>
            <v-list-item-title>{{user.user.name}}</v-list-item-title>
            </v-list-item-content>
        </v-list-item>

            <v-divider></v-divider>

            <v-list dense>
                <v-list-item>
                <v-list-item-content>
                <router-link to="/">Home</router-link> |
        <div v-if=" user.role == 'employee' ">
        <router-link to="/onleave">Onleave</router-link> |
        <router-link to="/late">Late</router-link> |
        <router-link to='/reportuser'>History Report</router-link> |
        <router-link to="/"><button @click="logout">logout</button></router-link>
        
        </div>
        <div v-else-if =" user.role == 'admin' ">
            <router-link to='/charts'>Charts</router-link> |
            <router-link to='/updatestatusorleave'>AcceptLate</router-link> |
            <router-link to='/showempdata'>AccepOnleave</router-link> |
            <router-link to="/"><button @click="logout">logout</button></router-link> 
        </div>
        <div v-else>
            <router-link to="/login">login</router-link> |
            <router-link to="/register">register</router-link> 
        </div>
                </v-list-item-content>
                </v-list-item>
            </v-list>
    </div>
    
</template>

<script>
import { sync } from "vuex-pathify";
export default {
    name:'ItemnavComp',
    computed: {
        ...sync("user/*")
        },
}
</script>