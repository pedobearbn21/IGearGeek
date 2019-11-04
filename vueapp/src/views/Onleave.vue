<template>
    <v-container>
        <h2>ส่งคำขอลา</h2><br>
        <v-card class="container">
        <v-row>
            <div class="col">
                <v-select
                    :items="items"
                    v-model="form.type"
                    label="ประเภทการลา"
                    outlined
                ></v-select>
            </div>
        </v-row>
        <v-row >
            <v-col class="col">
                <v-dialog
                    ref="dialog"
                    v-model="modal"
                    :return-value.sync="form.date"
                    persistent
                    width="290px"
                >
                    <template v-slot:activator="{ on }">
                    <v-text-field
                        v-model="form.date"
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
                        v-model="form.date" 
                        scrollable>
                    <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog.save(form.date)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </v-col>
        </v-row>
        <v-row >
            <v-col class="col">
            <v-dialog
                ref="dialog2"
                v-model="modal2"
                :return-value.sync="form.date1"
                persistent
                width="290px" >
                <template v-slot:activator="{ on }">
                <v-text-field
                    v-model="form.date1"
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
                v-model="form.date1" 
                scrollable>
                <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal2 = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.dialog2.save(form.date1)">OK</v-btn>
                </v-date-picker>
            </v-dialog>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="col">
                <v-file-input ref="file-input"  label="File input" v-on:change='onImageChange'   outlined dense></v-file-input>
                <!-- <v-btn rounded color="primary" type='file' dark>Rounded Button</v-btn> -->
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                <v-textarea
                    name="input-7-1"
                    label="Description"
                    v-model="form.textarea"
                    rows="1"
                    auto-grow   
                ></v-textarea>
            </v-col>
        </v-row>
        <v-row justify='center' align="center" class = "container">
            <v-btn-toggle>
                <v-btn color="primary" @click="back">Cancel</v-btn>
                <v-btn color="primary" @change="ConfirmForm">Submit</v-btn>
            </v-btn-toggle>
        </v-row>
        <!-- <div v-if="path">
            <img v-bind:src="path">
        </div> -->
        </v-card>
    </v-container>
</template>

<script>
import { sync, call, dispatch } from "vuex-pathify";
import axios from 'axios';
export default {
    data() {
        return {
            form: {
                type:'',
                date: '',
                date1: '',
                textarea: '',
                file: null
            },
            items: ['a','b','c'],
            modal: false,
            modal2: false,
            image: '',
            path: '',
        }
    },
    computed: {
    ...sync("user/*")
    },
    methods: {
        back(){
            this.$router.go(-1)
        },
        onImageChange(e){
                this.image = e;
        },
        async ConfirmForm(){
            let formData = new FormData();
            // formData.file = this.image;
            formData.append('file', this.image);
            formData.append('id', this.user.user.id);
            formData.append('start_date', this.form.date);
            formData.append('end_date', this.form.date1);
            formData.append('type', this.form.type);
            formData.append('description', this.form.textarea);
            let result = await axios
              .post("http://localhost:8000/api/report",formData )
              .then(r => {
                console.log(r);
                return r;
              })
              .catch(err => {
                console.log(err);
              });
            // this.path ='http://localhost:8000'+result.data.path;
            // console.log(this.path);
        }
    },

}
</script>