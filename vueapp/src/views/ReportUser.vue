<template>
  <v-container>
        <v-row class="margin:0px;">
            <v-col cols='12'>
                <v-tabs
                    v-model="tab"
                    centered 
                    background-color='#F8FCC7'
                    >
                <v-tabs-slider ></v-tabs-slider>

                <v-tab href="#tab-1">
                    <h2>Onleave</h2>
                </v-tab>

                <v-tab href="#tab-2">
                    <h2>Late</h2>
                </v-tab>
                </v-tabs>
            </v-col>
            <v-col>
                <v-tabs-items v-model="tab" style="background: #F8FCC7;">
                    <v-tab-item
                        :value="'tab-1'"
                        >
                        <v-simple-table>
                            <template v-slot:default>
                            <thead>
                                <tr>
                                <th class="text-center">id</th>
                                <th class="text-center">Onleave_startdate</th>
                                <th class="text-center">Onleave_enddate</th>
                                <th class="text-center">Descripton</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">ImageFile</th>
                                <th class="text-center">Button</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in dataonleave" :key="item" >
                                <td>{{ item.id }}</td>
                                <td>{{ item.start_date }}</td>
                                <td>{{ item.end_date }}</td>
                                <td>{{ item.description }}</td>
                                <td>{{ item.status }}</td>
                                <td>
                                    <b-button v-b-modal="`modal-`+item.id">เอกสารเพิ่มเติม</b-button>

                                    <b-modal :id='`modal-`+item.id' class="justify-content-center">
                                    <div v-if="item.file">
                                        <img
                                        :src='path+item.file'
                                        width="100%"
                                        height="100%"
                                        >
                                    </div>
                                    <div v-else class="text-center">
                                        No Image
                                    </div>
                                    </b-modal>
                                </td>
                                <td><v-btn  color="error" @click="deleteonleave(item.id)">cancel</v-btn></td>
                                </tr>
                            </tbody>
                            
                            </template>
                        </v-simple-table>
                    </v-tab-item>
                    <v-tab-item
                        :value="'tab-2'"
                        >
                        <v-simple-table>
                            <template v-slot:default>
                            <thead>
                                <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Latedate</th>
                                <th class="text-center">Time</th>
                                <th class="text-center">Descripton</th>
                                <th class="text-center">Button</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datalate" :key="item.id">
                                <td>{{ item.id }}</td>
                                <td>{{ item.latedate }}</td>
                                <td>{{ item.timeselect }}</td>
                                <td>{{ item.description }}</td>
                                <td><v-btn  color="error" @click="deletelate(item.id)" >cancel</v-btn></td>
                                </tr>
                            </tbody>
                            </template>
                        </v-simple-table>
                    </v-tab-item>
                </v-tabs-items>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import { sync } from "vuex-pathify";
export default {
    data() {
        return {
            dataonleave: [
            ],
            dialog:false,
            path: 'http://localhost:8000',
            status: {
            status: ''
            },
            tab:null,
            datalate:[]
        }
    },
    methods: {
        getreport(){
            console.log(this.user.user.id);
            axios.get('http://localhost:8000/api/getreportonleaves/'+this.user.user.id)
                .then(r =>{
                    console.log(r);
                    this.dataonleave = r.data;
                }
            );
        },
        getlate(){
            axios.get('http://localhost:8000/api/getreportworklate/'+this.user.user.id)
                .then(r =>{
                    console.log(r);
                this.datalate = r.data;
                });
        },
        deletelate(id){
            axios.delete('http://localhost:8000/api/deletelate/'+id)
                .then(r => {
                    console.log('success');
                });
        },
        deleteonleave(id){
            axios.delete('http://localhost:8000/api/deleteonleave/'+id)
                .then(r => {
                    console.log(r);
                });
        }
    },
    mounted() {
        this.getreport();
        this.getlate();
    },
    computed: {
        ...sync("user/*")
    },
}
</script>
