<script setup lang="ts">
import { RouterView, useRoute } from 'vue-router'
import FooterComp from '@/components/FooterComp.vue'
import HeaderComp from '@/components/HeaderComp.vue'


const route = useRoute()

</script>

<template>
  <HeaderComp v-if="route.meta.authRequired" />

  <div class="view">
    <RouterView />
  </div>

  <FooterComp v-if="route.meta.authRequired" />


</template>

<style scoped>
</style>
