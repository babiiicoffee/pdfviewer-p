<template>
  <!-- <v-app >
    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app> -->

  <div>
      <router-view></router-view>
  </div>

</template>

<script>
import Vue from 'vue'


    export default {}
    
new Vue({
  el: '#app',
  data: {color: 'BLUE'}
})

</script>