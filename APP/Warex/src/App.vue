<script setup lang="ts">
import { onMounted } from 'vue';
import { RouterView, useRoute, useRouter } from 'vue-router'
import FooterComp from '@/components/FooterComp.vue'
import HeaderComp from '@/components/HeaderComp.vue'
import { useUserStore } from './stores/userStore';

const route = useRoute()
const router = useRouter()
const userStore = useUserStore()



onMounted(async() => {
  if(await userStore.fetchUserData()){
    userStore.isAuthenticated = true
    router.push('/')
  }
});


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
