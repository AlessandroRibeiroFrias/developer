<template>
  <div id="app">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
      <router-link to="/" class="navbar-brand">CRUD Developer</router-link>
      <div class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link to="/developers" class="nav-link">Inicio</router-link>
        </li>
      </div>
    </nav>

    <div class="container mt-1">
      <router-view />
    </div>
  </div>
</template>
<style scoped>
    @import './assets/css/developerList.css';
    @import 'https://fonts.googleapis.com/css?family=Roboto|Varela+Round';
    @import 'https://fonts.googleapis.com/icon?family=Material+Icons';
    @import 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
</style>
<script>
export default {
  name: "app"
};
</script>
