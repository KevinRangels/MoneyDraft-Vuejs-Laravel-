import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import Toasted from 'vue-toasted';

import '../node_modules/swiper/css/swiper.min.css'
import axios from 'axios'
import VueAxios from 'vue-axios'
 import money from 'v-money'
import VueCurrencyFilter from 'vue-currency-filter'


Vue.use(VueCurrencyFilter,
{
  thousandsSeparator: '.',
  fractionCount: 0,
  fractionSeparator: ',',
  symbolSpacing: true
})


// register directive v-money and component <money>
Vue.use(money, {precision: 0, decimal: ',',   thousands: '.'})
Vue.use(VueAxios, axios)
Vue.use(VueAwesomeSwiper)
Vue.use(Toasted)
Vue.use(require('vue-moment'));
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
