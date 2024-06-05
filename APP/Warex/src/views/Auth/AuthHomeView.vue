<template>
  <div class="mainAuthCont">
    <div class="authCont">
      <img src="@/assets/logos/LOGO_BIG_NOBG.png" alt="logo" class="logo">
      <p class="text">Bienvenido a Warex. Tu plataforma asistente para gestionar tu negocio. </p>
      <div class="buttons">
        <RouterLink class="btnLogin" to="/login">Iniciar Sesión
        </RouterLink>
        <p>¿Aún no tienes una cuenta?. Un administrador de tu empresa deberá registrarte.
        </p>
      </div>
    </div>
  </div>
  <OverlayComp />
</template>

<script setup lang='ts'>
import OverlayComp from '@/components/OverlayComp.vue'
</script>

<style scoped>
.mainAuthCont {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100vh;
  color: #fff
}

.authCont {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  align-items: center;
  width: 40%;
}

.logo {
  width: 24rem;
}

.text {
  font-size: 1.125rem;
  line-height: 1.75rem;
}


.buttons {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  justify-content: center;
  align-items: center;
}

.btnLogin {
  background-color: rgb(255, 185, 56);
  text-decoration: none;
  color: #1E1E1E;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  padding-left: 3.5rem;
  padding-right: 3.5rem;
  border-radius: 1.5rem;
  width: fit-content;
  font-size: 1.125rem;
  line-height: 1.75rem;
  font-weight: 700;
  text-align: center;
  transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 300ms;
  transition-duration: 300ms;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

.btnLogin:hover {
  background-color: #ff7f00;
}

.signUpLink {
  color: #fff;
  text-decoration: none;
  font-weight: 700;
}
.signUpLink:hover {
  text-decoration: underline;
}
</style>