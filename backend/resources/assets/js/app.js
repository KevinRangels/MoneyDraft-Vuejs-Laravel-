require('./bootstrap');
// toastr.info('mensaje informativo');


import Toasted from 'vue-toasted';
import BlockUI from 'vue-blockui';
window.Vue = require('vue');
import VueMoment from 'vue-moment';



Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('navbar', require('./components/NavbarComponent.vue'));
Vue.component('aside-left', require('./components/AsideComponent.vue'));
Vue.component('login-form', require('./components/LoginFormComponent.vue'));
Vue.component('content-home', require('./components/ContentHomeComponente.vue'));
Vue.component('content-testimonies', require('./components/ContentTestimoniesComponent.vue'));


const app = new Vue({
    el: '#app'
});
Vue.use(Toasted)
Vue.use(BlockUI)
Vue.use(VueMoment)

