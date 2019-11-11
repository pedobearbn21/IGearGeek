<template>
<v-container>
  <h2>List Onleave Report</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Name</th>
          <th class="text-center">Status</th>
          <th class="text-center">Onleave_startdate</th>
          <th class="text-center">Onleave_enddate</th>
          <th class="text-center">ImageFile</th>
          <th class="text-center">Button</th>
          
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in desserts" :key="item" >
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.status }}</td>
          <td>{{ item.start_date }}</td>
          <td>{{ item.end_date }}</td>
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
          <td><v-btn  color="secondary" @click="updatestatus(item.id,status.status = 'success')" >allow</v-btn><v-btn  color="error" @click="updatestatus(item.id,status.status = 'cancel')">cancel</v-btn></td>
        </tr>
      </tbody>
      
    </template>
  </v-simple-table>
  
  
</v-container>   
      
</template>

<script>
  export default {
    data () {
      return {
        desserts: [
        ],
        dialog:false,
        path: 'http://localhost:8000',
        status: {
          status: ''
        }
      }
    },
    methods: {
      close() {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },
      getreport(){
        axios.get('http://localhost:8000/api/getallreport')
            .then(r =>{
              this.desserts = r.data;
            });
      },
      updatestatus(id,word){
        axios.post('http://localhost:8000/api/updatestatusonleave/'+id,this.status)
            .then(r =>{
              this.getreport();
            });
      }
      
    },
    mounted() {
      this.getreport();
    },
  } 
</script>
