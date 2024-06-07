<template>
  <div class="individual-container-wrapper">
    <div class="divTitle">
      <font-awesome-icon icon="wrench" class="wrenchIcon"/>
      <h2 class="title">Opciones de administrador</h2>
    </div>
    <div>
      <hr>
    </div>
    <div class="generalDiv">
      <div class="individual-container">
        <h2 class="individual-container-title">Operaciones individuales</h2>
        <hr>
        <div class="divBotones">
          <button @click="showModal('company')" class="action-button">Agregar nueva empresa</button>
          <button @click="showModal('user')" class="action-button">Agregar nuevo usuario</button>
          <button @click="showModal('deleteUser')" class="action-button">Eliminar usuario</button>
          <button @click="showModal('updatePasswd')" class="action-button">Cambiar contraseña</button>
        </div>
      </div>

      <div class="individual-container">
        <h2 class="individual-container-title">Carga masiva de ficheros</h2>
        <hr>
        <div class="divBotones">
          <input type="file" ref="inputFileEXCEL" @change="handleFileChange"/>
          <div class="btn-descargar">
            <button class="action-button" @click="downloadTemplate('access')">Descargar plantilla ACCESS</button>
            <button class="action-button" @click="downloadTemplate('company')">Descargar plantilla COMPANY</button>
          </div>
          <button class="action-button" @click="uploadFile">Subir EXCEL</button>
        </div>
      </div>
    </div>

    <!-- Modal para agregar una empresa -->
    <Modal v-if="isModalVisible && modalType === 'company'" @close="closeModal">
      <h3 class="modal-title">AGREGAR NUEVA EMPRESA</h3>
      <input v-model="newNIF" class="input-space" placeholder="NIF de la empresa" />
      <input v-model="newCompanyName" class="input-space" placeholder="Nombre de la empresa" />
      <button @click="addCompany" class="confirm-button">Agregar empresa</button>
      <button @click="closeModal" class="exit-button">Cancelar</button>
    </Modal>
  
    <!-- Modal para agregar un usuario -->
    <Modal v-if="isModalVisible && modalType === 'user'" @close="closeModal">
      <h3 class="modal-title">AGREGAR NUEVO USUARIO</h3>
      <input v-model="newDNI" class="input-space" placeholder="DNI" />
      <input v-model="newLastName" class="input-space" placeholder="Apellidos" />
      <input v-model="newName" class="input-space" placeholder="Nombre" />
      <input v-model="newUserName" class="input-space" placeholder="Nombre de usuario" />
      <input v-model="newPassword" type="password" class="input-space" placeholder="Contraseña" />
      <select v-model="newPermissions" class="input-space">
        <option value="" disabled selected>Seleccionar permisos</option>
        <option value="READ">READ</option>
        <option value="ALL">ALL</option>
      </select>
      <input v-model="newCompanyID" class="input-space" placeholder="NIF de la empresa" />
      <button @click="addUser" class="confirm-button">Agregar usuario</button>
      <button @click="closeModal" class="exit-button">Cancelar</button>
    </Modal>

     <!-- Modal para eliminar a un usuario -->
     <Modal v-if="isModalVisible && modalType === 'deleteUser'" @close="closeModal">
      <h3 class="modal-title">ELIMINAR USUARIO</h3>
      <input v-model="deletedUserDNI" class="input-space" placeholder="DNI del Usuario" />
      <button @click="deleteUser" class="confirm-button">Eliminar usuario</button>
      <button @click="closeModal" class="exit-button">Cancelar</button>
      </Modal>


       <!-- Modal para modificar contraseña de usuario -->
      <Modal v-if="isModalVisible && modalType === 'updatePasswd'" @close="closeModal">
      <h3 class="modal-title">ACTUALIZAR CONTRASEÑA USUARIO</h3>
      <input v-model="updatePasswdDNI" class="input-space" placeholder="DNI del usuario" />
      <input v-model="updatePAsswd" class="input-space" placeholder="Nueva contraseña" />
      <button @click="changePasswd" class="confirm-button">Confirmar cambio</button>
      <button @click="closeModal" class="exit-button">Cancelar</button>
      </Modal>

  </div>
</template>

<script setup lang='ts'>
import { ref } from 'vue';
import Modal from '@/components/ModalComp.vue';
import axios from 'axios';
import { saveData, updateData, deleteData } from '@/utils/crudAxios';

const isModalVisible = ref(false);
const modalType = ref('');

const newNIF = ref('')
const newCompanyName = ref('')

const newDNI = ref('');
const newName = ref('');
const newLastName = ref('');
const newUserName = ref('');
const newPermissions = ref('');
const newCompanyID = ref('');
const newPassword = ref('');


const deletedUserDNI = ref('')
const updatePasswdDNI = ref('')
const updatePAsswd = ref('')

const selectedFile = ref<File | null>(null)
const inputFileEXCEL = ref<HTMLInputElement | null>(null)

const showModal = (type: string) => {
  modalType.value = type;
  isModalVisible.value = true;
}

const closeModal = () => {
  isModalVisible.value = false;
  newNIF.value = '';
  newCompanyName.value = '';
  newDNI.value = '';
  newName.value = '';
  newLastName.value = '';
  newUserName.value = '';
  newPermissions.value = '';
  newCompanyID.value = '';
  newPassword.value = '';
}


const addCompany = async () => {
  await saveData ('companies', {"NIF": newNIF.value, "CompanyName": newCompanyName.value});
  alert("Se ha creado la nueva empresa con éxito.");
}


const addUser = async () => {
  await saveData ('access?accion=signup', {
    "DNI": newDNI.value,
    "Name": newName.value,
    "LastName": newLastName.value,
    "UserName": newUserName.value,
    "Permissions": newPermissions.value,
    "CompanyID": newCompanyID.value,
    "Password": newPassword.value
})
alert("Nuevo usuario insertado con éxito.")
}


const deleteUser = async () => {
  await deleteData ('access','DNI', deletedUserDNI.value)
  alert("Usuario eliminado con éxito.")
}


const changePasswd = async () => {
  await updateData ('access',updatePasswdDNI.value,'DNI',{"Password": updatePAsswd.value});
  alert("Contraseña modificada con éxito.")
}


const handleFileChange = () => {
  if (inputFileEXCEL.value && inputFileEXCEL.value.files && inputFileEXCEL.value.files.length > 0) {
    selectedFile.value = inputFileEXCEL.value.files[0];
  }
}

async function uploadFile() {
  if (!selectedFile.value) {
    alert('Por favor, selecciona un archivo primero.');
    return;
  }

  const formData = new FormData();
  formData.append('archivo', selectedFile.value);

  try {
    const response = await axios.post('http://localhost/Excel/IndexExcel.php', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
    if (response.data.message === undefined) {
      alert('Archivo subido exitosamente.');
    } else {
      alert(response.data.message);
    }
  } catch (error) {
    console.error('Error al subir el archivo:', error);
    alert('Error al subir el archivo. Revisa la consola para más detalles.');
  } finally {
    // Limpiar el input file
    if (inputFileEXCEL.value) {
      inputFileEXCEL.value.value = '';
    }
    selectedFile.value = null; // También limpiamos el valor reactivo
  }
}

const downloadTemplate = (queFichero: string) => {
  let filePath = '';
  switch (queFichero) {
    case 'access':
      filePath = 'src/utils/plantillasEXCEL/access.xlsx';
      break;
    case 'company':
      filePath = 'src/utils/plantillasEXCEL/companies.xlsx';
      break;
    default:
      alert('No hemos encontrado la plantilla seleccionada.');
  }
  const a = document.createElement('a');
  a.href = filePath;
  a.download = filePath.split('/').pop() || '';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
}
</script>
  
<style scoped>

.individual-container-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  
}

.generalDiv {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 40px;
}

.divTitle {
  display: flex;
  flex-direction: row;    
  align-items: center; 
  gap: 20px;
  background-color: white;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 600px;
  height: 20px;
}

.title {
  color: var(--color-green-light);
  text-align: center;
  margin-right: 200px;
}

.wrenchIcon {
  color: var(--color-green-light);
  text-align: center;
  font-size: 50px;
  margin: 0 auto;
  margin-left: 150px;
}

.individual-container-title {
  color: var(--color-green-light);
  align-items: center;
}

hr {
  margin-bottom: 40px;
}

.linea {
  color: var(--color-green-light);
  margin-top: -15px;
}
.individual-container {
  background-color: white;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width:50%;
  text-align: center;
  width: 50%;
  margin-left: 10px;
  height: 460px;
}

.btn-descargar {
  display: flex;
  flex-direction: row;
  gap: 20px;
}

.action-button {
  padding: 10px 20px;
  font-size: 16px;
  background-color: var(--color-green-light);
  color: white;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  width: 100%;
}

.action-button:hover {
  background-color: var(--color-orange);
  color: white;
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

/* Modal */
.modal-title {
  color: var(--color-green-light);
}
.input-space {
    height: 30px;
    border: 2px solid var(--color-green-light);
    border-radius: 5px;
    text-align: center;
}


.confirm-button {
    width: fit-content;
    background-color: var(--color-green-light);
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
.exit-button  {
  width: fit-content;
    background-color: var(--color-orange-dark);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 10px;
    align-self: center;
    cursor: pointer;
    transition: background-color 0.3s ease; 
}

.exit-button:hover  {
    background-color: red;
}
</style>
  