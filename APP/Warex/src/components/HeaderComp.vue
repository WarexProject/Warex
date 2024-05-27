<template>
  <div class="headerComp">
      <header>
          <div class="userMenuContainer">
              <RouterLink to="/user" class="userLink">
                  <font-awesome-icon icon="user" class="userIcon" style="color: #ffffff;" />
              </RouterLink>
              <div class="userMenu">
                  <RouterLink to="/user" class="userMenuItem">Mi Perfil</RouterLink>
                  <button @click="logout" class="userMenuBtn">Cerrar sesión</button>
              </div>
          </div>
          <div class="div-title">
              <img alt="Warex logo" class="logo" src="@/assets/img/logo_txt_only.png" width="350" height="125" />
              <h4 class="slogan" style="color:#ff7f00">
                  <span style="color: #60ca9a">Tus Datos.</span> Nuestra Responsabilidad.
              </h4>
          </div>
      </header>

      <div class="nav-container">
          <nav class="mainMenu">
              <RouterLink v-for="(elm, indx) in menu" class="navLink" :key="indx" :to="elm.route" >
                <font-awesome-icon :icon="elm.icon" />
                {{ elm.name }}
              </RouterLink>
          </nav>
      </div>


  </div>

</template>

<script setup lang="ts">
import { useUserStore } from '@/stores/userStore';
import { RouterLink, useRouter } from 'vue-router'

const userStore = useUserStore()
const router = useRouter();

const menu = [ 
{route : '/', name: 'Inicio', icon: 'home'},
{route : '/data', name: 'Datos', icon: 'database'}, 
{route : '/excel', name: 'Importar Excel', icon: 'cloud-upload-alt'},  
{route : '/stats', name: 'Gráficos', icon: 'chart-bar'}, 
]
const logout = () => {
    userStore.logout()
};
</script>

<style scoped>

.headerComp{
display: flex;
flex-direction:column;
flex-wrap: wrap;
width: 100%;
height: 100%;
padding-block: 20px 5px;
}

header {
width: 100%;
display: flex;
justify-content: space-between;
align-items: center;
}

.nav-container{ 
display: flex; 
padding-inline: 10px;
align-items: center ;
}

.userMenuContainer {
position: fixed;
z-index: 5000;
}

.userMenu {
display: none;
flex-direction: column;
position: absolute;
right: 0; 
background-color: var(--color-green-light);
color: white;
border-radius: 4px;
padding: 10px;
left: 50px;
width: 200px;
margin-top: -20px;
border-radius: 10px;
font-size: 15px;
border: 2px solid #ffffff;
}

.userMenuItem {
color: #ffffff;
padding: 8px 12px;
text-decoration: none;
display: block;
cursor: pointer;
border-radius: 10px;
text-align: center;
}

.userMenuBtn {
color: #ffffff;
padding: 8px 12px;
text-decoration: none;
display: block;
cursor: pointer;
border-radius: 10px;
border: none;
background-color: var(--color-green-light);
font-size: 15px;
height: fit-content;
width: 100%;
}

.userMenuItem:hover {
background-color: var(--color-orange);
color: var(--color-green);
}

.userMenuBtn:hover {
background-color: var(--color-orange);
color: var(--color-green);
}

.userLink:hover + .userMenu,
.userMenu:hover {
display: flex;
}
.div-title {
width: 100%;
display: block;
flex-direction: column;
flex-wrap: wrap;
align-items: center;
text-align: center;
}

.slogan {
font-family:monospace;
font-size: 14px; 
color: var(--color-gray-dark); 
margin-top: -35px; 
text-align: center; 
line-height: 1.2; 
margin-left: 150px;

}

.userLink {
background-color: var(--color-green-light);
color: white;
transition: background-color 0.3s ease; 
display: flex;
justify-content: center;
align-items: center;
width: 40px;
height: 35px;
border-radius: 25px;
border: 2px solid #ffffff;
color: #ffffff;
text-decoration: none;
margin-top:-60px;
margin-left: 10px;
}

.userIcon {
font-size: 15px;
}



/*Menú principal*/

.wrapper {
 background-color: var(--color-green-light);
 border-radius: 20px;
 margin-top:5px;
 margin-bottom: 20px;
 display: flex;
 flex-direction:column;
 flex-wrap:wrap;
}

.mainMenu {
 display: flex;
 justify-content: space-around; 
 width: 100%; 
 background-color: var(--color-green-light);
 border-radius: 20px;
}

.navLink {
 text-decoration: none;
 padding: 10px 5px;
 border-radius: 5px;
 background-color: var(--color-green-light);
 color: white;
 transition: background-color 0.3s ease; 
 width: 25%;
 text-align: center;
 border-radius: 20px;
}

.navLink:hover {
 background-color: var(--color-orange);
 color: var(--color-green); 
}

.icono-db{
margin-right: 5px;
}

.userLink:hover {
background-color: var(--color-orange);
color: var(--color-green); 
}
</style>