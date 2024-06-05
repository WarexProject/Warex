import { defineStore } from 'pinia';
import axios from 'axios';
import { ref } from 'vue';
import router from '@/router/index';
import { loginAPI, getData } from '@/utils/crudAxios';
import type User from '@/interfaces/user';

export const useUserStore = defineStore('user', () => {
  const user = ref<User | null>(null);
  const isAuthenticated = ref<boolean>(false);

  const setToken = (token: string) => {
    localStorage.setItem('WarexToken', token);
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
  };

  const login = async (userData: { DNI: string, password: string}) => {
    try {
      const response = await loginAPI(userData);
      if(response.data){
        const  token  = response.token;
        setToken(token);
        user.value = response.data
        isAuthenticated.value = true;
        return true;
      }else{
        return false
      }
    } catch (error) {
      console.error('Error Inicio Sesión', error);
      return false
    }
  };

  const fetchUserData = async () => {
    try {
      const token = localStorage.getItem('WarexToken');
      const headers = {
        Authorization: `Bearer ${token}`
      };
      const query = await axios.get('http://localhost/API/access?accion=token', { headers });
      const response = query.data
      if(response.data){
        user.value = response.data
        return true
      }
      else{
        return false
      }
      
    } catch (error) {
      console.error('Failed to fetch user data', error);
      return false
    }
  };

  const logout = () => {
    user.value = null;
    localStorage.removeItem('WarexToken');
    delete axios.defaults.headers.common['Authorization'];
    isAuthenticated.value = false;
    router.push('/auth');
  };

  const initialize = () => {
    const token = localStorage.getItem('token');
    if (token) {
      setToken(token);
      fetchUserData();
    } else {
      router.push('/login');
    }
  };

  return {
    user,
    isAuthenticated,
    fetchUserData,
    login,
    logout,
    initialize
  };
});