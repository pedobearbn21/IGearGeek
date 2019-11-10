<template>
<v-container>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-center">Name</th>
          <th class="text-center">status</th>
          <th class="text-center">date</th>
          
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in desserts" :key="item.name" >
          <td>{{ item.name }}</td>
          <td>{{ item.status }}</td>
          <td>{{ item.date }}</td>
          <td>{{ item.button }}</td>
          <td><v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on }">
            <v-btn color="primary" dark class="mb-2" v-on="on">information</v-btn>
          </template>
          <v-card class="mx-auto" max-width="400">
            <v-img
            class="white--text align-end"
            height="200px"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            >
            <v-card-title>show</v-card-title>
            </v-img>

            <v-card-text>
              
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">close</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog></td>
          
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
          {
            name: 'Frozen Yogurt',
            calories: 159,
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
          },
          {
            name: 'Eclair',
            calories: 262,
          },
          {
            name: 'Cupcake',
            calories: 305,
          },
          {
            name: 'Gingerbread',
            calories: 356,
          },
          {
            name: 'Jelly bean',
            calories: 375,
          },
          {
            name: 'Lollipop',
            calories: 392,
          },
          {
            name: 'Honeycomb',
            calories: 408,
          },
          {
            name: 'Donut',
            calories: 452,
          },
          {
            name: 'KitKat',
            calories: 518,
          },
          
        ],
      }
    },
    close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },
  }
  
    
</script>


<style>

</style>