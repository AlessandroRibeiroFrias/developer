import Vue from "vue";
import Router from "vue-router";

Vue.use(Router);

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
      path: "/tutorials/:id",
      name: "tutorial-details",
      component: () => import("./components/Tutorial")
    },
    {
      path: "/add",
      name: "add",
      component: () => import("./components/AddTutorial")
    }
  ]
});
