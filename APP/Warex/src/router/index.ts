import { createRouter, createWebHistory } from 'vue-router'
import AuthHomeView from '@/views/Auth/AuthHomeView.vue'
import LoginView from '@/views/Auth/LoginView.vue'
import SignupView from '@/views/Auth/SignupView.vue'
import HomeView from '@/views/HomeView.vue'
import DataView from '@/views/DataView.vue'
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
      path: '/signup',
      name: 'signup',
      component: SignupView,
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
  ]
})

export default router
