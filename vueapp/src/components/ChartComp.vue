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
                    Onleave
                </v-tab>

                <v-tab href="#tab-2">
                    Late
                </v-tab>
                </v-tabs>
            </v-col>
            <v-col>
                <v-tabs-items v-model="tab" style="background: #F8FCC7;">
                    <v-tab-item
                        :value="'tab-1'"
                        >
                                <v-row>
                                        <v-dialog
                                            ref="dialog"
                                            v-model="modal"
                                            :return-value.sync="month"
                                            persistent
                                            width="290px"
                                        >
                                            <template v-slot:activator="{ on }">
                                            <v-text-field
                                                v-model="month"
                                                label="Picker A Date"
                                                append-icon="mdi-calendar"
                                                readonly
                                                v-on="on"
                                                
                                                outlined
                                            ></v-text-field>
                                            </template>
                                            <v-date-picker
                                                year-icon="mdi-calendar-blank"
                                                prev-icon="mdi-skip-previous"
                                                next-icon="mdi-skip-next"
                                                v-model="month" 
                                                range
                                                scrollable>
                                            <v-spacer></v-spacer>
                                                <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                                                <v-btn text color="primary" @click="$refs.dialog.save(month);listening()">OK</v-btn>
                                            </v-date-picker>
                                        </v-dialog>
                                </v-row>
                                <v-row style="justify-content: center;">
                                    <line-chart :chart-data="datacollection"></line-chart>
                                </v-row>
                                        <!-- <mdb-pie-chart :data="pieChartData" :options="pieChartOptions" :bind='true' :width="600" :height="300"></mdb-pie-chart> -->
                    </v-tab-item>
                    <v-tab-item
                        :value="'tab-2'"
                        >
                        <v-row>
                        <v-dialog
                            ref="dialog"
                            v-model="modallate"
                            :return-value.sync="latemonth"
                            persistent
                            width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="latemonth"
                                label="Picker A Date"
                                append-icon="mdi-calendar"
                                readonly
                                v-on="on"       
                                outlined
                            ></v-text-field>
                            </template>
                            <v-date-picker
                                year-icon="mdi-calendar-blank"
                                prev-icon="mdi-skip-previous"
                                next-icon="mdi-skip-next"
                                v-model="latemonth"
                                type='month'
                                scrollable>
                            <v-spacer></v-spacer>
                                <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                                <v-btn text color="primary" @click="$refs.dialog.save(latemonth);getLate()">OK</v-btn>
                            </v-date-picker>
                        </v-dialog>
                        </v-row>
                        <v-row style="justify-content: center;">
                            <line-chart :chart-data="latecollection"></line-chart>
                        </v-row>
                    </v-tab-item>
                </v-tabs-items>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import Chart from 'chart.js';
// import { mdbPieChart, mdbContainer } from 'mdbvue';
import LineChart from './Line';
const getDaysInMonth = date =>
  new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

export default {
    name: "ChartsComp",
    components: {
    //   mdbPieChart,
    //   mdbContainer,
      LineChart
    },
    data() {
        return {
            modal:false,
            modallate: false,
            latemonth: new Date().toISOString().substr(0, 7), 
            month: [],
            datasetofchart: null,
            option:null,
            chartpop:null,
            datacollection: null,
            tab:null,
            late:[],
            latecollection:null
        }
    },
    methods: {
        async listening(){
            // let data = [];
            // this.month.forEach(element=>{
            //     console.log(element);
            //     let a = new Date(element);
            //     let form = {
            //         date: a.getDate(),
            //         month: a.getMonth()+1,
            //         year: a.getFullYear(),
            //     }
            //     data.push(form);
            // });
            
            // console.log(data);
            let result = await axios.post('http://localhost:8000/api/getchart',this.month)
                .then(r =>{
                console.log(r);
                this.calculatetype(r);
            });
            return result;
        },
        calculatetype(data1){
            let array = [
                {name:'week1',value:0},
                {name:'week2',value:0},
                {name:'week3',value:0},
                {name:'week4',value:0},
            ];
            let array1 =  data1.data;
            array1.forEach(element => {
               let a = new Date(element.length_date[0][0],element.length_date[0][1], 0).getDate();
               let dp = element.length_date[0][2] /(7.2) ;
               let dataset = (a - element.length_date[0][2] );
               if( dp > 0 && dp <=1 ){
                   array[3].value++;
                   array[2].value++;
                   array[1].value++;
                   array[0].value++;
               }else if( dp > 1 && dp <=2 ){
                   array[3].value++;
                   array[2].value++;
                   array[1].value++;
               }else if( dp > 2 && dp <=3 ){
                   array[3].value++;
                   array[2].value++;
               }else if( dp > 3 ){
                   array[3].value++;
               }else{
                   alert('fail chart');
               }
            });
        this.datasetofchart = [];
        array.forEach(element => {
            this.datasetofchart.push(element.value);
        });
        // for (let index = 0; index < array.length; index++) {
        //     this.pieChartData.datasets[0].data[index] = this.datasetofchart[index];
        // }
        this.chartpop = this.datasetofchart;
            this.datacollection = {
                labels: ['Week1','Week2','Week3','Week4'],
                datasets: [
                    {
                    backgroundColor: ['#FACB65','#ED7235','#6EFB1D','#73FA94'],
                    data: this.chartpop
                    }
                ],
                options: {
                    responsive: false,
                }
            }
        },
        getLate(){
            axios.post('http://localhost:8000/api/latechart',this.latemonth)
                .then(r =>{
                    console.log(r);
                    this.LateChart(r);
            })
        },
        LateChart(request){
            console.log(request);
            let weeklate = [
                {name:'week1',value:0},
                {name:'week2',value:0},
                {name:'week3',value:0},
                {name:'week4',value:0},
            ];
            request.data.forEach(element => {
                let pass = new Date(element.latedate);
                let datedays = new Date(pass.getFullYear(),pass.getMonth()+1,0).getDate();
                console.log(pass, datedays);
                console.log(pass.getDate() / 7.2);
                console.log(datedays - pass.getDate());
                let dp = 0;
                dp = pass.getDate() / 7.2;
                if( dp > 0 && dp <=1 ){
                //    weeklate[3].value++;
                //    weeklate[2].value++;
                //    weeklate[1].value++;
                   weeklate[0].value++;
               }else if( dp > 1 && dp <=2 ){
                //    weeklate[3].value++;
                //    weeklate[2].value++;
                   weeklate[1].value++;
               }else if( dp > 2 && dp <=3 ){
                //    weeklate[3].value++;
                   weeklate[2].value++;
               }else if( dp > 3 ){
                   weeklate[3].value++;
               }else{
                   alert('fail chart');
               }
            });
            let data = []
            weeklate.forEach(element => {
                data.push(element.value)
            });
            this.late = data;
            this.latecollection = {
                labels: ['Week1','Week2','Week3','Week4'],
                datasets: [
                    {
                    backgroundColor: ['#FACB65','#ED7235','#6EFB1D','#73FA94'],
                    data: this.late
                    }
                ],
                options: {
                    responsive: false,
                }
            }
        }

    },
    mounted() {
        // let first = new Date();
        // let get = {
        //     year: first.getFullYear(),
        //     month: first.getMonth()+1,
        //     date: first.getDate()
        // }
        // let sec = new Date(get.year,get.month,get.date);
        // let arr = [ first,sec ];
        // console.log(arr);
        
    },
    beforeMount() {
        let a = new Date('2019-10-31');
        let b = new Date(a.getFullYear(),a.getMonth()+1,a.getDate()).toISOString().substr(0, 10);
        a = a.toISOString().substr(0, 10);
        let arr = [a,b];
        console.log(arr);
        this.month = arr;
      this.listening();
      this.getLate();
    },
}
</script>