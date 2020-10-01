import Vue from 'vue'

import vuetify from './plugins/vuetify';
import router from './router'
import App from './components/App.vue';
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'
 
Vue.use(VueAxios, axios, VueRouter)

require('./bootstrap');

// Vue.use(VueRouter)

new Vue({
  el: '#app',
  router,
  vuetify,
  components: {
    App
  },
  render: h => h(App)
});