<template>
  <div class="containerExcel">
    <!-- Primera celda -->
    <div class="first-cell">
      <div class="image-section">
        <img
          v-if="selectedOption === 'WAREHOUSES'"
          src="@/assets/img/EjemploWAREHOUSES.png"
          alt="Imagen"
        />
        <img
          v-if="selectedOption === 'PRODUCTS'"
          src="@/assets/img/EjemploPRODUCTS.png"
          alt="Imagen"
        />
        <img
          v-if="selectedOption === 'SECTION'"
          src="@/assets/img/EjemploSECTION.png"
          alt="Imagen"
        />
        <img v-if="selectedOption === 'SHELF'" src="@/assets/img/EjemploSHELF.png" alt="Imagen" />
        <div class="list-section" v-if="selectedOption === 'LOCATION'">
          <ol>
            <li>
              <span>Selecciona un WAREHOUSES:</span> En este desplegable tienes que seleccionar el
              almacén donde deseas guardar el producto.
            </li>
            <li>
              <span>Selecciona un SECTION:</span> En este desplegable tienes que seleccionar en qué
              sección del almacén deseas guardar el producto.
            </li>
            <li>
              <span>Selecciona un SHELF:</span> En este desplegable tienes que seleccionar a qué
              estanteria de la sección indicada del almacén deseas guardar el producto.
            </li>
            <li>
              <span>Selecciona un PRODUCTS:</span> En este desplegable tienes que seleccionar el
              producto que deseas almacenar en el alamcén indicado.
            </li>
            <li>
              <span>CANTIDAD DEL PRODUCTO:</span> Indica la cantidad de productos que deseas
              almacenar en el lamcén indicado.
            </li>
            <li>
              <span>EXPLICACIÓN:</span> En esta opción de pestaña podrás indicar a qué almacén, qué
              sección en concreto de ese almacén y en qué estantería de la sección indicada quieres
              guardar el producto seleccionado, así como la cantidad de ese producto que quieres
              almacenar.
            </li>
          </ol>
        </div>
      </div>
      <!-- Lista de WAREHOUSES -->
      <div class="list-section" v-if="selectedOption == 'WAREHOUSES'">
        <ol>
          <li>
            <span>COMPANY ID:</span> Este campo debe completarse con el DNI o NIF de la empresa.
          </li>
          <li>
            <span>TOTAL PRODUCT QUANTITY:</span> Este campo debe completarse con la cantidad total
            de productos que pueden ingresarse en el almacén.
          </li>
          <li>
            <span>REFRIGERATING CHAMBER:</span> Este campo debe completarse indicando si el almacén
            es una cámara frigorífica o, en su defecto, si puede almacenar objetos que necesiten
            mantenerse a una temperatura exacta.
          </li>
        </ol>
      </div>
      <!-- Lista de PRODUCTS -->
      <div class="list-section" v-if="selectedOption == 'PRODUCTS'">
        <ol>
          <li>
            <span>COMPANY ID:</span> Este campo debe completarse con el DNI o NIF de la empresa.
          </li>
          <li>
            <span>PRODUCT NAME:</span> Este campo debe completarse con el nombre del procucto.
          </li>
          <li>
            <span>TOTAL PRODUCT QUANTITY:</span> Este campo debe completarse con la cantidad total
            de productos que hay.
          </li>
          <li>
            <span>DESCRIPTION:</span> Este campo es OPCIONAL. Si deseas completarlo, debes hacerlo
            indicando una breve descripción del producto.
          </li>
          <li>
            <span>UNIT PRICE:</span> Este campo debe completarse con la el valor unitario del
            producto.
          </li>
          <li>
            <span>EXPIRY DATE:</span> Este campo es OPCIONAL. Si deseas completarlo, debes hacerlo
            indicando la fecha de caducidad del producto en formato año/mes/día.
          </li>
        </ol>
      </div>
      <!-- Lista de SECTION -->
      <div class="list-section" v-if="selectedOption == 'SECTION'">
        <ol>
          <li>
            <span>SECTION NAME:</span> Este campo debe completarse con el en nombre de la sección
            del almacén.
          </li>
        </ol>
      </div>
      <!-- Lista de SHELF -->
      <div class="list-section" v-if="selectedOption == 'SHELF'">
        <ol>
          <li>
            <span>SHELF NAME:</span> Este campo debe completarse con el en nombre de la estantería
            del almacén.
          </li>
        </ol>
      </div>
    </div>

    <!-- Segunda celda -->
    <div class="second-cell">
      <div class="file-input-section" v-if="selectedOption !== 'LOCATION'">
        <form @submit.prevent="uploadFile">
          <label for="">Selecciona tu archivo EXCEL de {{ selectedOption }}</label>
          <input type="file" ref="inputFileEXCEL" @change="handleFileUpload" />
        </form>
      </div>
      <div class="file-input-section" v-if="selectedOption === 'LOCATION'">
        <input
          type="number"
          placeholder="CANTIDAD DEL PRODUCTO"
          id="CatPro"
          v-model="cantidadProduct"
          style="width: 100%; text-align: center"
        />
      </div>
      <div class="button-section">
        <button type="submit" v-if="selectedOption !== 'LOCATION'" @click="uploadFile">
          Subir EXCEL de {{ selectedOption }}
        </button>
        <button v-if="selectedOption === 'LOCATION'" @click="guardarEstanteria">Guardar producto en la estantería</button>
      </div>
    </div>

    <!-- Tercera celda -->
    <div class="third-cell">
      <div class="dropdown-section" @change="handleChange">
        <select v-model="selectedOption">
          <option value="WAREHOUSES">WAREHOUSES</option>
          <option value="PRODUCTS">PRODUCTS</option>
          <option value="SECTION">SECTION</option>
          <option value="SHELF">SHELF</option>
          <option value="LOCATION">LOCATION</option>
        </select>
      </div>
      <div class="right-button-section">
        <button v-if="selectedOption !== 'LOCATION'" @click="downloadTemplate(selectedOption)">
          Descargar plantilla de EXCEL de {{ selectedOption }}
        </button>
      </div>
      <div class="dropdown-section" v-if="selectedOption === 'SECTION'">
        <select v-model="selectedOptionSECTION">
          <option disabled value="Selecciona un WAREHOUSES">Selecciona un WAREHOUSES</option>
          <option
            v-for="warehouse in warehouses"
            :key="warehouse.WarehouseID"
            :value="warehouse.WarehouseID"
          >
            {{ warehouse.WarehouseID }}
          </option>
        </select>
      </div>
      <div class="dropdown-section" v-if="selectedOption === 'SHELF'">
        <select v-model="selectedOptionSHELF_WAREHOUSES" @change="llamadaSHELF(selectedOptionSHELF_WAREHOUSES)">
          <option disabled value="Selecciona un WAREHOUSES">Selecciona un WAREHOUSES</option>
          <option
            v-for="warehouse in warehouses"
            :key="warehouse.WarehouseID"
            :value="warehouse.WarehouseID"
          >
            {{ warehouse.WarehouseID }}
          </option>
        </select>
      </div>
      <div class="dropdown-section" v-if="selectedOption === 'SHELF'">
        <select v-model="selectedOptionSHELF">
          <option disabled value="Selecciona un SECTION">Selecciona un SECTION</option>
          <option v-for="sections in section" :key="sections.SectionID" :value="sections.SectionID">
            {{ sections.SectionName }}
          </option>
        </select>
      </div>
      <div class="dropdown-section" v-if="selectedOption === 'LOCATION'">
        <select v-model="selectedOptionLOCATION_WAREHOUSES" @change="llamadaLOCATION_SECTION(selectedOptionLOCATION_WAREHOUSES)">
          <option disabled value="Selecciona un WAREHOUSES">Selecciona un WAREHOUSES</option>
          <option
            v-for="warehouse in warehouses"
            :key="warehouse.WarehouseID"
            :value="warehouse.WarehouseID"
          >
            {{ warehouse.WarehouseID }}
          </option>
        </select>
      </div>
      <div class="dropdown-section" v-if="selectedOption === 'LOCATION'">
        <select v-model="selectedOptionLOCATION_SECTION" @change="llamadaLOCATION_SHELF(selectedOptionLOCATION_SECTION)">
          <option disabled value="Selecciona un SECTION">Selecciona un SECTION</option>
          <option v-for="sections in section" :key="sections.SectionID" :value="sections.SectionID">
            {{ sections.SectionName }}
          </option>
        </select>
      </div>
      <div class="dropdown-section" v-if="selectedOption === 'LOCATION'">
        <select v-model="selectedOptionLOCATION_SHELF" @change="llamadaPRODUCTS()">
          <option disabled value="Selecciona un SHELF">Selecciona un SHELF</option>
          <option v-for="shelfs in shelf" :key="shelfs.ShelfID" :value="shelfs.ShelfID">
            {{ shelfs.ShelfName }}
          </option>
        </select>
      </div>
      <div class="dropdown-section" v-if="selectedOption === 'LOCATION'">
        <select v-model="selectedOptionLOCATION_PRODUCTS">
          <option disabled value="Selecciona un PRODUCTS">Selecciona un PRODUCTS</option>
          <option v-for="products in product" :key="products.ProductID" :value="products.ProductID">
            {{ products.ProductName }}
          </option>
        </select>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import axios from 'axios'
import { getData, saveData } from '@/utils/crudAxios'

const selectedOption = ref('WAREHOUSES')
let selectedOptionSECTION = ref('Selecciona un WAREHOUSES')
let selectedOptionSHELF = ref('Selecciona un SECTION')
let selectedOptionSHELF_WAREHOUSES = ref('Selecciona un WAREHOUSES')
let selectedOptionLOCATION_WAREHOUSES = ref('Selecciona un WAREHOUSES')
let selectedOptionLOCATION_SECTION = ref('Selecciona un SECTION')
let selectedOptionLOCATION_SHELF = ref('Selecciona un SHELF')
let selectedOptionLOCATION_PRODUCTS = ref('Selecciona un PRODUCTS')
const selectedFile = ref<File | null>(null)
const inputFileEXCEL = ref<HTMLInputElement | null>(null)

const warehouses = ref()
const section = ref()
const shelf = ref()
const product = ref()
let cantidadProduct = ref('')

const handleChange = () => {
  console.log(selectedOption.value)
  if (selectedOption.value === 'SECTION') {
    llamadaSECTION()
    selectedOptionSECTION = ref('Selecciona un WAREHOUSES')
  } else if (selectedOption.value === 'SHELF') {
    llamadaSECTION()
    selectedOptionSHELF_WAREHOUSES = ref('Selecciona un WAREHOUSES')
  } else if (selectedOption.value === 'LOCATION') {
    llamadaSECTION()
    selectedOptionSHELF_WAREHOUSES = ref('Selecciona un WAREHOUSES')
  }
}

function handleFileUpload(event: Event) {
  const target = event.target as HTMLInputElement
  if (target.files && target.files.length > 0) {
    selectedFile.value = target.files[0]
  }
}

async function uploadFile() {
  if (!selectedFile.value) {
    alert('Please select a file first!')
    return
  }
  
  const formData = new FormData()
  formData.append('archivo', selectedFile.value)

  if (selectedOption.value == 'SECTION') {
    formData.append('option', selectedOptionSECTION.value) // Añadir el valor del select al FormData
  } else if (selectedOption.value == 'SHELF') {
    formData.append('option', selectedOptionSHELF.value) // Añadir el valor del select al FormData
  }

  try {
    const response = await axios.post('http://localhost/Excel/IndexExcel.php', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    if (response.data.message === undefined) {
      alert('File uploaded successfully')
    } else {
      alert(response.data.message)
    }
  } catch (error) {
    console.error('Error uploading file:', error)
    alert('Error uploading file. Check console for details.')
  } finally {
    // Limpiar el input file
    if (inputFileEXCEL.value) {
      inputFileEXCEL.value.value = ''
    }
    selectedFile.value = null // También limpiamos el valor reactivo
  }
  
}

const guardarEstanteria = async () => {
  let $locationSHELF = {WarehouseID: selectedOptionLOCATION_WAREHOUSES.value,ProductID: selectedOptionLOCATION_PRODUCTS.value, SectionID: selectedOptionLOCATION_SECTION.value, ShelfID: selectedOptionLOCATION_SHELF.value, TotalProductQuantity: cantidadProduct.value}
  await saveData('location', $locationSHELF)
  console.log($locationSHELF)
  alert('Pruducto almacenado correctamente en la estantería')
}

const llamadaSECTION = async () => {
  //console.log(selectedOptionSECTION.value)
  const respuesta = await getData('warehouses', 'CompanyID', 'T02564753')
  warehouses.value = respuesta
  console.log(warehouses.value)
}

const llamadaSHELF = async (opcion: any) => {
    const opcionSQL = 'opcion01' + opcion
    const respuesta = await getData('sql', 'sql', opcionSQL)
    section.value = respuesta;
  console.log(section.value);
    selectedOptionSHELF = ref('Selecciona un SECTION')
};

const llamadaLOCATION_SECTION = async (opcion: any) => {
    const opcionSQL = 'opcion01' + opcion
    const respuesta = await getData('sql', 'sql', opcionSQL)
    section.value = respuesta;
  console.log(section.value);
    selectedOptionLOCATION_SECTION = ref('Selecciona un SECTION')
};

const llamadaLOCATION_SHELF = async (opcion: any) => {
    const opcionSQL = 'opcion02' + opcion
    const respuesta = await getData('sql', 'sql', opcionSQL)
    shelf.value = respuesta;
  console.log(shelf.value);
    selectedOptionLOCATION_SHELF = ref('Selecciona un SHELF')
};

const llamadaPRODUCTS = async () => {
  //console.log(selectedOptionSECTION.value)
  const respuesta = await getData('products', 'CompanyID', 'T02564753')
  product.value = respuesta
  console.log(product.value)
  selectedOptionLOCATION_PRODUCTS = ref('Selecciona un PRODUCTS')
}

const downloadTemplate = (queFichero: String) => {
  let filePath = ''
  switch (queFichero) {
    case 'WAREHOUSES':
      filePath = 'src/utils/plantillasEXCEL/warehouses.xlsx'
      break
    case 'PRODUCTS':
      filePath = 'src/utils/plantillasEXCEL/products.xlsx'
      break
    case 'SECTION':
      filePath = 'src/utils/plantillasEXCEL/section.xlsx'
      break
    case 'SHELF':
      filePath = 'src/utils/plantillasEXCEL/shelf.xlsx'
      break
    default:
      alert('No hemos encontrado la plantilla seleccionada.')
  }
  const a = document.createElement('a')
  a.href = filePath
  a.download = filePath.split('/').pop() || ''
  document.body.appendChild(a)
  a.click()
  document.body.removeChild(a)
}
</script>

<style scoped>
.image-section img {
  display: none; /* Oculta todas las imágenes por defecto */
}

.image-section img[src$='.png'] {
  display: block; /* Muestra la imagen cuya fuente termina en .png */
}

.containerExcel {
  display: grid;
  grid-template-columns: 3fr 1fr;
  grid-template-rows: 1fr auto;
  height: 70vh; /* Ajustar la altura total del contenedor */
  gap: 20px; /* Ajustar la separación entre las celdas */
  padding: 10px;
  margin-bottom: 150px;
}

.first-cell {
  grid-column: 1 / 2;
  grid-row: 1 / 2;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.image-section {
  flex: 1 1 60%;
  /* border: 1px solid #ccc; */
  padding: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-section img {
  object-fit: contain;
  width: 95%;
  height: 100%;
  border-radius: 15px;
}

.list-section {
  flex: 1 1 40%;
  /* border: 1px solid #ccc; */
  padding: 10px;
  padding-left: 30px;
}

.list-section ol {
  list-style-type: decimal;
  padding: 0;
  margin: 0;
}

.list-section ol li {
  padding: 3px;
}

.second-cell {
  grid-column: 1 / 2;
  grid-row: 2 / 3;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.file-input-section {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px; /* Espacio entre el label y el input */
  width: 100%;
}

.file-input-section input {
  width: auto;
  height: 30px;
  font-family: 'Outfit', sans-serif;
}

.button-section {
  display: flex;
  justify-content: center;
  width: 100%;
}

.button-section button {
  width: 100%;
  height: 50px;
}

.third-cell {
  grid-column: 2 / 3;
  grid-row: 1 / 3;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.dropdown-section,
.right-button-section {
  display: flex;
  justify-content: center;
}

.dropdown-section select,
.right-button-section button {
  width: 100%;
  height: 35px;
}

.right-button-section button {
  margin-top: 0;
  height: 50px;
}

.dropdown-section select {
  cursor: pointer;
  border-radius: 25px;
  text-align: center;
  font-size: medium;
}

.right-button-section button {
  margin-top: 0;
  height: 60px;
}

span {
  color: var(--color-blue-electric);
  font-weight: bold;
}

button {
  border: none;
  border-radius: 25px;
  cursor: pointer;
  background-color: var(--color-green-light);
  color: #fff;
  font-size: larger;
}

button:hover {
  border: none;
  border-radius: 25px;
  cursor: pointer;
  background-color: var(--color-orange);
  color: var(--color-green-light);
  font-size: larger;
}
</style>
