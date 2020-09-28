import Vue from 'vue'

import router from './router'
import App from './components/App.vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter)

new Vue({
  el: '#app',
  router,
  components: {
    App
  },
  render: h => h(App)
});