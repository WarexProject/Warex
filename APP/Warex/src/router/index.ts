import { createRouter, createWebHistory } from 'vue-router'
import { useUserStore } from '@/stores/userStore'
import AuthHomeView from '@/views/Auth/AuthHomeView.vue'
import LoginView from '@/views/Auth/LoginView.vue'
import HomeView from '@/views/HomeView.vue'
import DataView from '@/views/DataView.vue'
import AdminView from '@/views/AdminView.vue'
import UserView from '@/views/UserView.vue'
import ExcelView from '@/views/ExcelView.vue'
import StatsView from '@/views/StatsView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: { 
        authRequired: true 
      }
    },
    {
      path: '/auth',
      name: 'AuthHome',
      component: AuthHomeView,
      meta: { 
        authRequired: false 
      }
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      meta: { 
        authRequired: false 
      }
    },
    {
      path: '/user',
      name: 'user',
      component: UserView,
      meta: { 
        authRequired: true 
      }
    },
    {
      path: '/data',
      name: 'data',
      component: DataView,
      meta: { 
        authRequired: true 
      }
    },
    {
      path: '/excel',
      name: 'excel',
      component: ExcelView,
      meta: { 
        authRequired: true 
      }
    },
    {
      path: '/stats',
      name: 'stats',
      component: StatsView,
      meta: { 
        authRequired: true 
      }
    },
    {
      path: '/admin',
      name: 'admin',
      component: AdminView,
      meta: { 
        authRequired: true 
      }
    },
  ]
})


router.beforeEach((to, from, next) => {
  const userStore = useUserStore();

  if (userStore.isAuthenticated) {
    if (to.matched.some((record) => record.meta.authRequired)) {
      next();
    } else {
      next('/');
    }
  } else {
    if (to.matched.some((record) => record.meta.authRequired)) {
      next('/auth');
    } else {
      next();
    }
  }
});


/*ENCONTRAR FORMA DE ALMACENAR EN EL LOCAL STORAGE UNA VARIABLE CON LA ULTIMA RUTA VISITADA, DE TAL FORMA QUE ME INTENTE LLEVAR AHI CADA VEZ QUE SE HAGA REFRESH*/

export default router
