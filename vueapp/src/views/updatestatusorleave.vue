<template>
<v-container>
  <h2>List Late Report</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-center">Id</th>
          <th class="text-center">Latedate</th>
          <th class="text-center">Time</th>
          <th class="text-center">Descripton</th>
          
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in desserts" :key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.latedate }}</td>
          <td>{{ item.timeselect }}</td>
          <td><v-btn  color="secondary"  @click="updatestatus(item.id,status.status = 'success')" >allow</v-btn><v-btn  color="error" @click="updatestatus(item.id,status.status = 'cancel')" >cancel</v-btn></td>
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
        status: {
          status: ''
        }
      }
    },
    methods: {
      getlate(){
        axios.get('http://localhost:8000/api/getreport')
            .then(r =>{
              this.desserts = r.data;
            });
      },
      updatestatus(id,word){
        axios.post('http://localhost:8000/api/updatestatuslate/'+id,this.status)
            .then(r =>{
              this.getlate();
            });
      }
    },
    mounted() {
      this.getlate();
    },
  }
</script>
