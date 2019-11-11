<template>
  <v-container>
      <v-card>
        <v-row class="margin:0px;">
            <v-col cols='12'>
                <v-tabs
                    v-model="tab"
                    centered 
                    
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
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Startdate</th>
                                    <th class="text-center">Enddate</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">ImageFile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in dataonleave" :key="item" >
                                <td>{{ item.id }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.status }}</td>
                                <td>{{ item.start_date }}</td>
                                <td>{{ item.end_date }}</td>
                                <td>{{ item.description }}</td>
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
                                <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datalate" :key="item.id">
                                <td>{{ item.id }}</td>
                                <td>{{ item.latedate }}</td>
                                <td>{{ item.timeselect }}</td>
                                <td>{{ item.description }}</td>
                                <td>{{ item.status }}</td>
                                </tr>
                            </tbody>
                            </template>
                        </v-simple-table>
                    </v-tab-item>
                </v-tabs-items>
            </v-col>
        </v-row>
      </v-card>
    </v-container>
</template>

<script>
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
            axios.get('http://localhost:8000/api/getallonleaves')
                .then(r =>{
                    this.dataonleave = r.data;
                }
            );
        },
        getlate(){
            axios.get('http://localhost:8000/api/getallworklate')
                .then(r =>{
                this.datalate = r.data;
                });
        },
    },
    mounted() {
        this.getreport();
        this.getlate();
    },
}
</script>
