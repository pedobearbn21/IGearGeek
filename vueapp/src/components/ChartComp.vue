<template>
    <v-container>
        <v-row>
            <v-col>
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
                        type="month"
                        scrollable>
                    <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog.save(month);listening()">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                <line-chart :chart-data="datacollection"></line-chart>
                <!-- <mdb-pie-chart :data="pieChartData" :options="pieChartOptions" :bind='true' :width="600" :height="300"></mdb-pie-chart> -->
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import Chart from 'chart.js';
// import { mdbPieChart, mdbContainer } from 'mdbvue';
import LineChart from './Line';
const getDaysInMonth = date =>
  new Date(date.getFullYear, date.getMonth + 1, 0).getDate;

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
            month: new Date().toISOString().substr(0, 7),
            datasetofchart: null,
            option:null,
            chartpop:null,
            datacollection: null
        }
    },
    methods: {
        async listening(){
            let a = new Date(this.month);
            let form = {
                month: a.getMonth()+1,
                year: a.getFullYear(),
            }
            console.log(form);
            let result = await axios.post('http://localhost:8000/api/getchart',form)
                .then(r =>{
                this.calculatetype(r,form);
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
                labels: ['week1','week2','week3','week4'],
                datasets: [
                    {
                    label: ['week1','week2','week3','week4'],
                    backgroundColor: ['#f87979','#f87979','#f87979','#f87979'],
                    data: this.chartpop
                    }
                ]
            }
        }

    },
    mounted() {
        this.listening();
    },
}
</script>