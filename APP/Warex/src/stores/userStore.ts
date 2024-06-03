import { defineStore } from 'pinia';
import axios from 'axios';
import { ref } from 'vue';
import router from '@/router/index';
import { loginAPI, saveData } from '@/utils/crudAxios';

interface User {
  id: string;
  DNI: string;
  username: string;
  email: string;
  idCompany: string;
  permissions: string;
}

export const useUserStore = defineStore('user', () => {
  const user = ref<User | null>(null);
  const isAuthenticated = ref<boolean>(false);

  const setToken = (token: string) => {
    localStorage.setItem('token', token);
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
  };

  const login = async (userData: { DNI: string, password: string, companyNIF: string }) => {
    try {
      const response = await loginAPI(userData);
      console.log(response)
      // const { token } = response.data;
      // setToken(token);
      // await fetchUserData();
      isAuthenticated.value = true;
      router.push('/');
    } catch (error) {
      console.error('Error Inicio Sesión', error);
      return false
    }
  };

  const signup = async (userData: { DNI: string, UserName: string, Name: string, LastName: string, Permissions: string, Password: string, CompanyID: string }) => {
    try {
      const response = await saveData('access?accion=signup',userData);
      console.log(response)
      if(response.Error){
        return false
      }
      return true
    } catch (error) {
      console.error('Error Registro Usuario', error);
      return false
    }
  };

  const fetchUserData = async () => {
    try {
      const token = localStorage.getItem('token');
      const headers = {
        Authorization: `Bearer ${token}`
      };
      const response = await axios.get('/api/user', { headers });
      user.value = response.data;
      isAuthenticated.value = true;

    } catch (error) {
      console.error('Failed to fetch user data', error);
      logout();
    }
  };

  const logout = () => {
    //user.value = null;
    //localStorage.removeItem('token');
    //delete axios.defaults.headers.common['Authorization'];
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
    signup,
    login,
    logout,
    initialize
  };
});