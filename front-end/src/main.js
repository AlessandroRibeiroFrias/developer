import Vue from 'vue';
import Vuelidate from 'vuelidate';
import App from './App.vue';
import router from './router';
import FlashMessage from "@smartweb/vue-flash-message";

Vue.use(Vuelidate);
Vue.use(FlashMessage);

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
