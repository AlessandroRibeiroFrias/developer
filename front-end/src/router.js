import Vue from "vue";
import Router from "vue-router";
import Vuelidate from 'vuelidate'

Vue.use(Router, Vuelidate);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/",
      alias: "/developers",
      name: "developers",
      component: () => import("./components/DeveloperList")
    },
    {
      path: "/developers/:id",
      name: "developer-details",
      component: () => import("./components/Developer")
    },
    {
      path: "/develelopers/:id",
      name: "develeloper-details",
      component: () => import("./components/Developer")
    },
    {
      path: "/add",
      name: "add",
      component: () => import("./components/AddDeveloper")
    }
  ]
});
