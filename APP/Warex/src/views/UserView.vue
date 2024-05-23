<script setup lang="ts">
import { ref } from 'vue'
import Modal from '@/components/vueModal.vue'

const isModalVisible = ref(false)
const modalType = ref('')
const newUsername = ref('')
const newPassword = ref('')
const email = ref('')
const successMessage = ref('')

function showModal(type: string) {
  modalType.value = type
  isModalVisible.value = true
}

function closeModal() {
  isModalVisible.value = false
  newUsername.value = ''
  newPassword.value = ''
  email.value = ''
}

function confirmChange(type: string) {
  //lógica que no sirve para nada, simplemente es una falsa confirmación
  //falta por añadir la lógica para cambiar el nombre de user o password
  if (type === 'username') {
    successMessage.value = `Nombre de usuario cambiado a ${newUsername.value} con éxito.`
  } else if (type === 'password') {
    successMessage.value = `Contraseña cambiada con éxito.`
  }
  closeModal()
}
</script>

<template>
  <div class="user-container">
    <div class="divBotones">
      <button @click="showModal('username')" class="action-button">
        Cambiar nombre de usuario
      </button>
      <button @click="showModal('password')" class="action-button">Cambiar contraseña</button>
    </div>

    <!-- Mandar correo -->
    <div class="divCorreo">
      <h4>¿Tienes alguna duda? Contacta con nosotros:</h4>
      <button class="btnSendEmail">
        <a href="mailto:warexdaw@gmail.com">Enviar correo</a>
      </button>
      <h4>¡Te responderemos lo antes posible!</h4>
    </div>
  </div>

  <!-- Modal para cambiar nombre de usuario -->
  <Modal v-if="isModalVisible && modalType === 'username'" @close="closeModal">
    <h3 class="modal-title">CAMBIAR NOMBRE DE USUARIO</h3>
    <input v-model="newUsername" class="input-space" placeholder="Nuevo nombre de usuario" />
    <button @click="confirmChange('username')" class="confirm-button">Confirmar</button>
    <button @click="closeModal" class="exit-button">Cancelar</button>
  </Modal>

  <!-- Modal para cambiar contraseña -->
  <Modal v-if="isModalVisible && modalType === 'password'" @close="closeModal">
    <h3 class="modal-title">CAMBIAR CONTRASEÑA</h3>
    <input
      v-model="newPassword"
      type="password"
      class="input-space"
      placeholder="Nueva contraseña"
    />
    <button @click="confirmChange('password')" class="confirm-button">Confirmar</button>
    <button @click="closeModal" class="exit-button">Cancelar</button>
  </Modal>
</template>

<style scoped>
:root {
  --color-blue-electric: #3a61f7;
  --color-blue-userLink: #5694f0;
  --color-blue-middle: #64708b;
  --color-blue-ultralight: #eef0f8;
  --color-gray-dark: #212121;
  --color-gray-medium: #484c5a;
  --color-gray-middle: #9da3b5;
  --color-gray-ultralight: #e6e8ec;
  --color-red: #dc2843;
  --color-green: #08cc74;
  --color-green-light: #60ca9a;
  --color-orange: rgb(255, 185, 56);
  --color-orange-dark: #ff7f00;
}

.action-button {
  padding: 10px 20px;
  font-size: 16px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  background-color: var(--color-green-light);
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.action-button:hover {
  background-color: var(--color-orange);
  color: var(--color-green);
}

.user-container {
  display: block;
  gap: 20px;
  background-color: var(--color-blue-ultralight);
  padding: 20px;
  border-radius: 10px;
}

.divBotones {
  flex-direction: column;
  align-items: center;
  gap: 10px;
  width: 100%;
  display: flex;
  gap: 40px;
  margin-top: 20px;
}

.divCorreo {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
  width: 100%;
  align-items: center;
}

.btnSendEmail {
  padding: 10px 20px;
  font-size: 16px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  background-color: var(--color-green-light);
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  width: 200px;
}

.btnSendEmail:hover {
  background-color: var(--color-orange);
  color: var(--color-green);
}

.btnSendEmail a {
  text-decoration: none;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
  color: white;
}

/* Modal */
.modal-title {
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
  color: var(--color-green-light);
}
.input-space {
  height: 30px;
  border: 2px solid var(--color-green-light);
  border-radius: 5px;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
  text-align: center;
}

.confirm-button {
  width: fit-content;
  background-color: var(--color-green-light);
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 10px;
  align-self: center;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.confirm-button:hover {
  background-color: var(--color-green);
}
.exit-button {
  width: fit-content;
  background-color: var(--color-orange-dark);
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 10px;
  align-self: center;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.exit-button:hover {
  background-color: red;
}
</style>
