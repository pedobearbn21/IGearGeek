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
                        @change="listening"
                        type="month"
                        scrollable>
                    <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog.save(month)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </v-col>
            <canvas id="myChart" width="200" height="50"></canvas>
        </v-row>
    </v-container>
</template>

<script>
import Chart from 'chart.js'

export default {
    name: "ChartsComp",
    data() {
        return {
            typebar: 'bar',
            myChart: null,
            modal:false,
            month: new Date().toISOString().substr(0, 7),
        }
    },
    methods: {
        listening(){
            let result = axios.get('http://localhost:8000/api/getchart').then(r =>{
                this.calculatetype(r);
            });
            return result;
        },
        chartsrun(){
        const ctx = document.getElementById('myChart')
        this.myChart = new Chart(ctx, {
            type: this.typebar,
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Page A',
                    data: [61, 70, 80, 50],
                    backgroundColor: ['#3e95cd', '#8e5ea2', '#3cba9f', '#e8c3b9']
                }]
            },
            options: {
                scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
                }
            }
        })
        },
        calculatetype(data){
            let array = [
                {name:'a',value:0},
                {name:'b',value:0},
                {name:'c',value:0}
            ];
        }

    },
    mounted() {
        this.chartsrun();
    },
        


}
</script>