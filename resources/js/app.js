require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)


Vue.component('tramite-user', require('./components/tramiteUsuario.vue').default);



const app = new Vue({
    el: '#app',
    data(){
      return{
        tabIndex: 0
      }
    }
});
