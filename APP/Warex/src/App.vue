<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import Footer from '@/components/vueFooter.vue' 
import { library } from '@fortawesome/fontawesome-svg-core';
import { faHome, faUser, faDatabase, faCloudUploadAlt, faChartBar } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

// Agrega los iconos que necesitas al library
library.add(faHome, faUser, faDatabase, faCloudUploadAlt,faChartBar);

const logout = () => {
  // Aquí falta la lógica para cerrar sesión 
};
</script>

<template>
<div class="main-container">

<header>
  <div class="userMenuContainer">
    <RouterLink to="/user" class="userLink"> 
      <font-awesome-icon icon="user" class="userIcon" style="color: #ffffff;" />
    </RouterLink>
    <div class="userMenu">
      <RouterLink to="/user" class="userMenuItem">Panel de usuario</RouterLink>
      <button @click="logout" class="userMenuBtn">Cerrar sesión</button>
    </div>
  </div>
  <div class="div-title">
    <img alt="Warex logo" class="logo" src="@/assets/img/logo_txt_only.png" width="350" height="125" />
    <h4 class="slogan" style="color:#ff7f00">
      <span style="color: #60ca9a">Your data.</span> Our responsibility.
    </h4>
  </div>
</header>

<navbar class="mainMenu">
  <RouterLink to="/" class="navLink">
    <font-awesome-icon icon="home" style="color: #ffffff;" /> Home
  </RouterLink>
  <RouterLink to="/data" class="navLink">
    <font-awesome-icon icon="database" style="color: #ffffff;" class="icono-db" />Data
  </RouterLink>
  <RouterLink to="/excel" class="navLink">
    <font-awesome-icon icon="cloud-upload-alt" style="color: #ffffff;" /> Upload excel
  </RouterLink>
  <RouterLink to="/stats" class="navLink">
    <font-awesome-icon icon="chart-bar" style="color: #ffffff;" /> Stats
  </RouterLink>
</navbar>

<RouterView />

<Footer></Footer>

</div>

</template>
