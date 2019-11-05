<template>
    <div class="container">
        <h2>ส่งคำขอเข้างานสาย</h2>
        <v-card class="container">
        <v-row>
            <v-col cols='8'>
            <v-dialog
                ref="dialog2"
                v-model="modal"
                :return-value.sync="date"
                persistent
                width="290px">
                <template v-slot:activator="{ on }">
                <v-text-field
                    v-model="date"
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
                v-model="date" 
                scrollable>
                <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.dialog2.save(date)">OK</v-btn>
                </v-date-picker>
            </v-dialog>
            </v-col>
            <v-col cols='4'>
                <v-text-field
                v-model="timepick"
                label="Picker A Time"
                append-icon="mdi-clock"
                type='time'
                v-on="on"
                outlined
            ></v-text-field>
            </v-col>
        </v-row>
         <v-row>
            <v-col>
            <v-textarea
                label="Description"
                v-model="textarea"
                rows="1"
                auto-grow   
            ></v-textarea>
            </v-col>
        </v-row>
        <br>
     
        <v-row justify='center' align="center" >
            <v-btn-toggle>
                <v-btn color="white">Cancel</v-btn>
                <v-btn color="primary" @click="sentlate">Submit</v-btn>
            </v-btn-toggle>
        </v-row>

        </v-card>
    </div>
</template>

<script>
import { sync } from "vuex-pathify";
export default {
    data() {
        return {
            date: '',
            modal: false,
            textarea: '',
            timepick: '',
        }
    },
    computed: {
    ...sync("user/*")
    },
    methods: {
        async sentlate(){
            let dataform = {
                employee_id: this.user.user.id,
                latedate: this.date,
                timeselect: this.timepick,
                description: this.textarea
            }
            let result = await axios
                .post('http://localhost:8000/api/sentlate',dataform)
                .then(r=>{
                    console.log(r);
                });
        }
    },

}
</script>
