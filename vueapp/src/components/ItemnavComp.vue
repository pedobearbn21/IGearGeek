<template>
    <div style="background:#F9FCC7;height:100vh;">
        <v-list-item style="background: #1F5769;height:9%;">
            <v-list-item-content >
            <v-list-item-title><h3 class="text-center"><div v-if='user.user' style="color:yellow;">{{ user.user.name }}</div></h3></v-list-item-title>
            </v-list-item-content>
        </v-list-item>
            <!-- <v-divider style="background: #1F5769;"></v-divider> -->
            <v-list>
                <v-list-item-group v-model="model" mandatory color="indigo">
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title><router-link to="/">Home</router-link></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>
                                <div v-if=" user.role == 'employee' ">
                                    <router-link to="/onleave">Onleave</router-link>
                                </div>
                                <div v-else-if =" user.role == 'admin' ">
                                    <router-link to='/charts'>Charts</router-link>
                                </div>
                                <div v-else>
                                    <router-link to="/login">login</router-link>
                                </div>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>
                                <div v-if=" user.role == 'employee' ">
                                    <router-link to="/late">Late</router-link>
                                </div>
                                <div v-else-if =" user.role == 'admin' ">
                                    <router-link to='/updatestatusorleave'>AcceptLate</router-link>
                                </div>
                                <div v-else>
                                    <router-link to="/register">register</router-link> 
                                </div>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>
                                <div v-if=" user.role == 'employee' ">
                                    <router-link to='/reportuser'>History Report</router-link>
                                </div>
                                <div v-else-if =" user.role == 'admin' ">
                                    <router-link to='/showempdata'>AccepOnleave</router-link>
                                </div>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>
                                <div v-if=" user.role == 'employee' ">
                                    <router-link to="/"><button @click="logout">logout</button></router-link>
                                </div>
                                <div v-else-if =" user.role == 'admin' ">
                                    <router-link to="/history">History</router-link> 
                                </div>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>
                                <div v-if =" user.role == 'admin' ">
                                    <router-link to="/"><button @click="logout">logout</button></router-link> 
                                </div>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>

            <!-- <v-list dense>
                <v-list-item>
                <v-list-item-content>
                     
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
            </v-list> -->















    </div>
    
</template>

<script>
import { sync, call } from "vuex-pathify";
export default {
    name:'ItemnavComp',
    data() {
        return {
            model: null
        }
    },
    computed: {
        ...sync("user/*")
    },
    methods: {
        ...call("user/*"),
        async logout(){
            await this.logouted();
        },
    }
}
</script>