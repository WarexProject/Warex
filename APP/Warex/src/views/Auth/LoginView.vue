<template>
    <div class="mainLoginCont">
        <img src="@/assets/logos/LOGO_BIG_NOBG.png" alt="logo" class="logo">
        <div class="loginCont">
            <div class="welcomeCont">
                <p class="welcomeText">¡Bienvenido!</p>
                <p class="welcomeSubText">Inicia sesión para empezar a usar Warex</p>
            </div>
            <div class="inputsCont">
                <div class="inputLogin">
                    <input type="text" placeholder="usuario" v-model="username">
                </div>
                <div class="inputLogin">
                    <input :type="showPassword ? 'text' : 'password'" placeholder="contraseña" v-model="password">
                    <font-awesome-icon class="eye" :icon="showPassword ? 'eye-slash' : 'eye'"
                        @click="showPassword = !showPassword" />
                </div>
            </div>
            <p class="errorMsj" v-if="isError">{{ errorMsj }}</p>
            <button
                class="btnLogin"
                @click.prevent="logIn()">
                Iniciar Sesión
            </button>
            <p>¿Aún no tienes una cuenta?. <RouterLink class="signUpLink" to="/signup">Regístrate
                </RouterLink>
            </p>
        </div>
    </div>
    <RouterLink to="/auth"><font-awesome-icon icon="arrow-left" class="btnBack" /></RouterLink>
    <OverlayComp />
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useUserStore } from '@/stores/userStore';
import { RouterLink, useRouter } from 'vue-router'
import OverlayComp from '@/components/OverlayComp.vue'

//
const userStore = useUserStore();
const router = useRouter();
const username = ref('')
const password = ref('')

const showPassword = ref(false)
const isError = ref(false)
const errorMsj = ref('')

//

const logIn = () => {
    const user = {
        username: username.value,
        password: password.value
    }
    if(notEmpty()){userStore.login(user)}
    
}


const notEmpty = () => {
    if(username.value.trim().length > 0 && password.value.trim().length > 0){
        isError.value = false
        return true
    }
    else{
        errorMsj.value = 'Error. Debes rellenar todos los campos'
        isError.value = true
        return false
    }
}

</script>

<style scoped>



/*QUITAR ESTILOS POR DEFECTO*/
p{
    margin: 0;
    padding: 0;;
}


.btnLogin{
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}

.mainLoginCont {
    display: flex;
    gap: 10rem;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #ffffff;
}


.loginCont{
    display: flex; 
    padding: 1.25rem; 
    flex-direction: column; 
    gap: 2.5rem; 
    justify-content: center; 
    align-items: center; 
    border-radius: 1rem; 
    width: 30%;
    height: 85%;
    background-color: #484C5A;
}

.welcomeCont{
    margin-bottom: 2.5rem; 
    font-weight: 700; 
    text-align: center; 
}

.welcomeText{
    font-size: 2.25rem;
    line-height: 2.5rem; 
}

.welcomeSubText{
    font-size: 1.25rem;
    line-height: 1.75rem; 
}

.inputsCont{
    display: flex; 
    flex-direction: column; 
    gap: 0.75rem;
    color: #1E1E1E;
    align-items: center; 
    width: 45%;
}

.inputLogin{
    color: #1E1E1E ;
    display: flex; 
    padding-top: 0.25rem;
    padding-bottom: 0.25rem; 
    padding-left: 0.5rem;
    padding-right: 0.5rem; 
    gap: 0.5rem; 
    align-items: center; 
    border-radius: 1.5rem;
    width: 100%; 
    background-color: #ffffff; 
}


input {
    display: flex; 
    padding: 0.25rem; 
    width: 100%;
    border:#fff;
    font-size: medium;
}
input:focus{
    outline-style: none; 
}

.logo{
    width: 30%;
}


.eye{
    cursor: pointer;
}
.btnLogin{
    background-color: rgb(255, 185, 56);
    color: #1E1E1E;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem; 
    padding-left: 3.5rem;
    padding-right: 3.5rem; 
    border-radius: 0.75rem; 
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

.btnLogin:hover{
    background-color: #ff7f00;
    transform: scale(1.03);
}


.btnBack {
    position: fixed;
    top: 0;
    left: 0;
    margin: 2.5rem;
    font-size: 1.5rem;
    line-height: 2rem;
    color: #ffffff;
}

.signUpLink{
    font-weight: 700;
    text-decoration: none;
    color: #ffffff; 
}

.signUpLink:hover{
    text-decoration: underline; 
}

.errorMsj{
    color: #e0e0e0
}

</style>