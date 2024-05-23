<template>
    <div class="mainSignUpCont">
        <div class="singUpCont">
            <div class="welcomeCont">
                <p class="welcomeText">¡Bienvenido!</p>
                <p class="welcomeSubText">Regístrate para empezar a usar Warex</p>
            </div>
            <div class="inputsCont">
                <div class="inputSignUp">
                    <input type="text" placeholder="username" v-model="username">
                </div>
                <div class="inputSignUp">
                    <input type="email" placeholder="email" v-model="email">
                </div>
                <div class="inputSignUp">
                    <input :type="showPassword ? 'text' : 'password'" placeholder="password" v-model="password">
                    <font-awesome-icon class="eye" :icon="showPassword ? 'eye-slash' : 'eye'"
                        @click="showPassword = !showPassword" />
                </div>
                <div class="inputSignUp">
                    <input :type="showPassword ? 'text' : 'password'" placeholder="confirm password"
                        v-model="confPassword">
                </div>
            </div>
            <p class="errorMsj" v-if="isError">{{ errorMsj }}</p>
            <button
                class="btnSignUp"
                @click.prevent="signUp()">
                Registrarme
            </button>
            <p>¿Ya tienes una cuenta?. <RouterLink class="loginLink" to="/login">Inicia sesión
                </RouterLink>
            </p>
        </div>
        <img src="@/assets/logos/LOGO_BIG_NOBG.png" alt="logo" class="logo">
    </div>
    <RouterLink to="/auth"><font-awesome-icon icon="arrow-left" class="btnBack" />
    </RouterLink>
    <OverlayComp />
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { RouterLink } from 'vue-router';
import OverlayComp from '@/components/OverlayComp.vue'
//

const username = ref('')
const email = ref('')
const password = ref('')
const confPassword = ref('')

const showPassword = ref(false)
const isError = ref(false)
const errorMsj = ref('')

//

const signUp = () => {

}

</script>

<style scoped>


/*QUITAR ESTILOS POR DEFECTO*/
.btnSignUp{
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}




.mainSignUpCont {
    display: flex;
    gap: 10rem;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #ffffff;
}


.singUpCont{
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
}

.inputSignUp{
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

.logo {
    width: 30%;
}

.eye{
    cursor: pointer;
}


.errorMsj{
    color: #e0e0e0
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

.btnSignUp{
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

.btnSignUp:hover{
    background-color: #ff7f00;
    transform: scale(1.03);
}


.loginLink{
    font-weight: 700; 
    text-decoration: none;
    color: #ffffff; 
}

.loginLink:hover{
    text-decoration: underline; 
}

</style>