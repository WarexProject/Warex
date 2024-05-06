import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/LoginView.vue'
import SignupView from '@/views/SignupView.vue'
import HomeView from '@/views/HomeView.vue'
import DataView from '@/views/DataView.vue'
import UserView from '@/views/UserView.vue'
import ExcelView from '@/views/ExcelView.vue'
import StatsView from '@/views/StatsView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/signup',
      name: 'signup',
      component: SignupView
    },
    {
      path: '/home',
      name: 'home',
      component: HomeView
    },
    {
      path: '/user',
      name: 'user',
      component: UserView
    },
    {
      path: '/data',
      name: 'data',
      component: DataView
    },
    {
      path: '/excel',
      name: 'excel',
      component: ExcelView
    },
    {
      path: '/stats',
      name: 'stats',
      component: StatsView
    },
  ]
})

export default router
