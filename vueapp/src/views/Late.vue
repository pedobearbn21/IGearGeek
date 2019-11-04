<template>
    <v-div>
        <h2>ส่งคำขอเข้างานสาย</h2><br>
        <v-card class="mx-auto"
                height="500"
                width="700">
        <v-row class = "container">
            <v-col class="col">
            <v-dialog
                ref="dialog2"
                v-model="modal2"
                :return-value.sync="date1"
                persistent
                width="290px">
                <template v-slot:activator="{ on }">
                <v-text-field
                    v-model="date1"
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
                v-model="date1" 
                scrollable>
                <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal2 = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.dialog2.save(date1)">OK</v-btn>
                </v-date-picker>
            </v-dialog>
            </v-col>
        </v-row>
        <br>
         <v-row class = "container">
            <v-col>
            <v-textarea
                name="input-7-1"
                label="Description"
                v-model="textarea"
                rows="1"
                auto-grow   
            ></v-textarea>
            </v-col>
        </v-row>
        <br>

        <mdb-container>
            <mdb-row>
                <mdb-col col="6">
                <mdb-time-picker
                        label="icon"
                        icon="clock"
                        @getValue="getPickerValue"/>
                </mdb-col>
            </mdb-row>
        </mdb-container>
     
        <v-row justify='center' align="center" class = "container">
            <v-btn-toggle>
                <v-btn color="white">Cancel</v-btn>
                &nbsp;&nbsp;
                <v-btn color="primary">Submit</v-btn>
            </v-btn-toggle>
        </v-row>

        </v-card>
    </v-div>
</template>

<script>
export default {

}
</script>
