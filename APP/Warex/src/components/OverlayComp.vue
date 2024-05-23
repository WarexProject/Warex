<template>
  <BtnSocialMedia
    class="BtnSocialMedia"
    link="https://github.com/WarexProject/Warex"
    name="Ver Proyecto"
    txtColor="black"
    bgColor="white"
    icon="fa-brands fa-github"
  />
  <img
    class="imgOverlay"
    src="@/assets/img/overlayAuth.jpg"
    alt="background"
  />
  <div class="backgroundOverlay"></div>
</template>

<script setup lang="ts">
  import BtnSocialMedia from '@/components/BtnSocialMedia.vue'

</script>

<style scoped>

    .BtnSocialMedia{
      position: absolute; 
      top: 0; 
      right: 0; 
      margin: 1.25rem; 
      transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
      transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
      transition-duration: 300ms; 
      transition-duration: 300ms; 
      transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); 
    }

    .BtnSocialMedia:hover{
      transform: scale(1.03);
    }

    .imgOverlay{
      position: fixed; 
      top: 0; 
      left: 0; 
      width: 100%; 
      height: 100%; 
      background-position: center; 
      background-size: cover; 
      z-index: -2;
    }

    .backgroundOverlay{
      position: fixed; 
      top: 0; 
      left: 0; 
      width: 100%; 
      height: 100%; 
      opacity: 0.8; 
      z-index: -1;
      background-color: #1E1E1E;
    }

</style>
