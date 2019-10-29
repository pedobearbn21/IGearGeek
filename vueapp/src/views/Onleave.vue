<template>
    <v-container>
        ส่งคำขอลา
        <v-row>
            <div class="col">
                <v-select
                    :items="items"
                    label="ประเภทการลา"
                    outlined
                ></v-select>
            </div>
        </v-row>
        <v-row>
            <v-col class="col">
                <v-dialog
                    ref="dialog"
                    v-model="modal"
                    :return-value.sync="date"
                    persistent
                    width="290px"
                >
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
                        <v-btn text color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="col">
            <v-dialog
                ref="dialog2"
                v-model="modal2"
                :return-value.sync="date1"
                persistent
                width="290px"
            >
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
        <v-row>
            <v-col class="col">
                <v-file-input label="File input"  outlined dense></v-file-input>
                <!-- <v-btn rounded color="primary" type='file' dark>Rounded Button</v-btn> -->
            </v-col>
        </v-row>
        <v-row>
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
        <v-row justify='center' align="center">
            <v-btn-toggle>
                <v-btn color="primary">Cancel</v-btn>
                <v-btn color="primary">Submit</v-btn>
            </v-btn-toggle>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            items: ['a','b','c'],
            date: '',
            date1: '',
            modal: false,
            modal2: false,
            textarea: ''
        }
    },

}
</script>