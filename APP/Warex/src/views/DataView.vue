<template>
  <div class="container">
    <div class="dataCont">
      <div class="dataShow" v-if="selectedTable.ing == 'warehouses'">
        <h2 class="dataTitle">Datos de Almacén</h2>
        <div class="data">
          <p>ID Almacén: {{ selectedWarehouse?.WarehouseID }}</p>
          <p>ID Compañía: {{ selectedWarehouse?.CompanyID }}</p>
          <p>Cámara Frigorífica: {{ selectedWarehouse?.RefrigeratingChamber }}</p>
        </div>
      </div>
      <div class="dataShow" v-else-if="selectedTable.ing == 'products'">
        <h2 class="dataTitle">Datos de Producto</h2>
        <div class="data">
          <p>ID Producto: {{ selectedProduct?.ProductID }}</p>
          <p>ID Compañía: {{ selectedProduct?.CompanyID }}</p>
          <p>Nombre de Producto: {{ selectedProduct?.ProductName }}</p>
          <p>Descripción: {{ selectedProduct?.Description }}</p>
          <p>Cantidad Total: {{ selectedProduct?.TotalProductQuantity }}</p>
          <p>Precion Unitario: {{ selectedProduct?.UnitPrice }}</p>
          <p>Fecha de Expiración: {{ selectedProduct?.ExpiryDate }}</p>
        </div>
      </div>
      <div class="dataShow" v-else-if="selectedTable.ing == 'section'">
        <h2 class="dataTitle">Datos de Sección</h2>
        <div class="data">
          <p>ID Sección: {{ selectedSection?.SectionID }}</p>
          <p>ID Almacén: {{ selectedSection?.WarehouseID }}</p>
          <p>Nombre de Sección: {{ selectedSection?.SectionName }}</p>
        </div>
      </div>
      <div class="dataShow" v-else-if="selectedTable.ing == 'shelf'">
        <h2 class="dataTitle">Datos de Estantería</h2>
        <div class="data">
          <p>ID Estantería: {{ selectedShelf?.ShelfID }}</p>
          <p>ID Sección: {{ selectedShelf?.SectionID }}</p>
          <p>Nombre de Estantería: {{ selectedShelf?.ShelfName }}</p>
        </div>
      </div>
      <div class="buttonCont">
        <div class="deleteBtn addBtnModal" @click="clickEdit">Modificar Elemento</div>
        <div class="deleteBtn" @click="clickDeleteSingleItem">Eliminar elemento</div>
      </div>
    </div>
    <div class="tableCont">
      <div class="tableHeader">
        <div class="selector">
          <select v-model="selectedTable">
            <option v-for="(elm, indx) in tables" :key="indx" :value="elm">
              {{ elm.esp }}
            </option>
          </select>
        </div>
        <div class="filter">
          <select v-model="searchField">
            <option value="" disabled>Filtrar por</option>
            <option v-for="(elm, indx) in headers" :key="indx" :value="elm.value">
              {{ elm.text }}
            </option>
          </select>
          <input type="text" class="filterText" placeholder="Introduzca el valor a buscar " v-model="searchText" />
          <div class="searchButton" @click="clickSearch">
            <font-awesome-icon icon="magnifying-glass" />
          </div>
        </div>
        <div class="resetFilter">
          <font-awesome-icon icon="rotate-left" class="resetIcon" @click="resetFilter" />
        </div>
      </div>

      <EasyDataTable class="table" v-model:items-selected="itemsSelected" table-class-name="customize-table"
        :headers="headers" :items="items" :rows-per-page="rowsPerPage" :loading="isLoading" :searchField="searchField"
        :searchValue="searchValue" :tableHeight="460" @clickRow="clickRow" />
      <div class="buttons">
        <div class="deleteBtn" v-if="itemsSelected.length > 0" @click="deleteItems">
          Eliminar seleccionados: {{ itemsSelected.length }}
        </div>
        <div class="deleteBtn addBtn" @click="openModal">
          Añadir Elemento
        </div>
      </div>
    </div>
  </div>
  <div class="modalOverlay" @click.self="closeModal" v-if="showModal">
    <div class="modalCont">
      <div class="modalData" v-if="selectedTable.ing == 'warehouses'">
        <h2 class="modalTitle">Añadir Almacén</h2>
        <div class="modalInputs">
          <div class="inputLine">
            <div class="inputTitle">ID Almacén: </div>
            <div class="inputDiv">Se pondrá automáticamente </div>
          </div>
          <div class="inputLine">
            <div class="inputTitle">ID Compañía: </div>
            <div class="inputDiv">{{ userStore.user?.CompanyID }}</div>
          </div>
          <div class="inputLine">
            <div class="inputTitle">Cámara Frigorífica: </div>
            <div class="inputDiv">
              <input type="checkbox" class="checkbox" v-model="newWarehouse.RefrigeratingChamber">
            </div>
          </div>
        </div>
      </div>
      <div class="modalData" v-if="selectedTable.ing == 'products'">
        <h2 class="modalTitle">Añadir Producto</h2>
        <div class="modalInputs">
          <div class="inputLine">
            <div class="inputTitle">ID Compañía: </div>
            <div class="inputDiv">{{ userStore.user?.CompanyID }}</div>
          </div>
          <div class="inputLine">
            <div class="inputTitle">Nombre Producto: </div>
            <div class="inputDiv">
              <input type="text" class="inputText" v-model="newProduct.ProductName"/>
            </div>
          </div>
          <div class="inputLine">
              <div class="inputTitle">Descripción: </div>
              <div class="inputDiv">
                <input type="text" class="inputText" v-model="newProduct.Description">
              </div>
          </div>
          <div class="inputLine">
              <div class="inputTitle">Precio Unitario: </div>
              <div class="inputDiv">
                <input type="number" class="inputText" v-model="newProduct.UnitPrice">
              </div>
          </div>
          <div class="inputLine">
              <div class="inputTitle">Fecha Expiración: </div>
              <div class="inputDiv">
                <input type="date" class="inputText" v-model="newProduct.ExpiryDate">
              </div>
          </div>
          <div class="inputLine">
              <div class="inputTitle">Cantidad Total: </div>
              <div class="inputDiv">
                <input type="number" class="inputText" v-model="newProduct.TotalProductQuantity">
              </div>
          </div>
        </div>
      </div>
      <div class="modalData" v-if="selectedTable.ing == 'section'">
          <h2 class="modalTitle">Añadir Sección</h2>
          <div class="modalInputs">
            <div class="inputLine">
              <div class="inputTitle">ID Sección: </div>
              <div class="inputDiv">Se pondrá automáticamente </div>
            </div>
            <div class="inputLine">
              <div class="inputTitle">ID Almacén: </div>
              <div class="inputDiv">
                <input type="text" class="inputText" v-model="newSection.WarehouseID">
              </div>
            </div>
            <div class="inputLine">
              <div class="inputTitle">Nombre Sección: </div>
              <div class="inputDiv">
                <input type="text" class="inputText" v-model="newSection.SectionName">
              </div>
            </div>
          </div>
      </div>
      <div class="modalData" v-if="selectedTable.ing == 'shelf'">
          <h2 class="modalTitle">Añadir Estantería</h2>
          <div class="modalInputs">
            <div class="inputLine">
              <div class="inputTitle">ID Estantería: </div>
              <div class="inputDiv">Se pondrá automáticamente </div>
            </div>
            <div class="inputLine">
              <div class="inputTitle">ID Sección: </div>
              <div class="inputDiv">
                <input type="text" class="inputText" v-model="newShelf.SectionID">
              </div>
            </div>
            <div class="inputLine">
              <div class="inputTitle">Nombre Estantería: </div>
              <div class="inputDiv">
                <input type="text" class="inputText" v-model="newShelf.ShelfName">
              </div>
            </div>
          </div>
      </div>
      <div class="modalButtons">
        <div class="deleteBtn addBtnModal" @click="clickAddElement" v-if="!isEditing">Añadir Elemento</div>
        <div class="deleteBtn addBtnModal" @click="clickEditElement" v-if="isEditing">Modificar Elemento</div>
        <div class="deleteBtn" @click="closeModal">Cancelar</div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, watch } from 'vue'
import type { Header, Item, ClickRowArgument } from 'vue3-easy-data-table'
import { deleteData, getData, saveData, updateData } from '@/utils/crudAxios'
import type Table from '@/interfaces/table'
import { useUserStore } from '@/stores/userStore'
import type Warehouse from '@/interfaces/warehouse'
import type Product from '@/interfaces/product'
import type Section from '@/interfaces/section'
import type Shelf from '@/interfaces/shelf'

//

const userStore = useUserStore()

const tables = ref<Table[]>([
  { esp: 'Productos', ing: 'products', icon: '' },
  { esp: 'Almacenes', ing: 'warehouses', icon: '' },
  { esp: 'Secciones', ing: 'section', icon: '' },
  { esp: 'Estanterías', ing: 'shelf', icon: '' }
])
const headers = ref<Header[]>([])

const headersWarehouses: Header[] = [
  { text: 'ID Almacén', value: 'WarehouseID' },
  { text: 'ID Compañía', value: 'CompanyID' },
  { text: 'Cámara frigorífica', value: 'RefrigeratingChamber' }
]
const headersProducts: Header[] = [
  { text: 'ID Producto', value: 'ProductID' },
  { text: 'Producto', value: 'ProductName' },
  { text: 'Descripción', value: 'Description' },
  { text: 'Precio Unitario', value: 'UnitPrice' },
  { text: 'Fecha Expración', value: 'ExpiryDate' }
]
const headersSections: Header[] = [
  { text: 'ID Sección', value: 'SectionID' },
  { text: 'ID Almacén', value: 'WarehouseID' },
  { text: 'Sección', value: 'SectionName' }
]
const headersShelf: Header[] = [
  { text: 'ID Estantería', value: 'ShelfID' },
  { text: 'ID Sección', value: 'SectionID' },
  { text: 'Estantería', value: 'ShelfName' }
]

const items = ref<Item[]>([])

const rowsPerPage = 8
const itemsSelected = ref<Item[]>([])
const isLoading = ref(true)

const selectedTable = ref<Table>(tables.value[0])
const searchField = ref('')
const searchValue = ref('')
const searchText = ref('')

const isEditing = ref(false)

//Objeto a mostrar en la izquierda
const selectedWarehouse = ref<Warehouse | undefined | Item>()
const selectedProduct = ref<Product | undefined>()
const selectedSection = ref<Section | undefined>()
const selectedShelf = ref<Shelf | undefined>()

const clickSearch = () => {
  searchValue.value = searchText.value
}
const resetFilter = () => {
  searchValue.value = ''
  searchText.value = ''
  searchField.value = ''
}

const clickRow = (item: ClickRowArgument) => {
  switch (selectedTable.value.ing) {
    case 'warehouses':
      selectedWarehouse.value = item
      break
    case 'products':
      selectedProduct.value = item
      break
    case 'section':
      selectedSection.value = item
      break
    case 'shelf':
      selectedShelf.value = item
      break

    default:
      break
  }
}

//FUNCION QUE CARGA EL ARRAY DE COLUMNAS Y LOS DATOS

const getItems = async () => {
  switch (selectedTable.value.ing) {
    case 'warehouses':
      headers.value = headersWarehouses
      items.value = await getData('warehouses', 'CompanyID', userStore.user.CompanyID)
      selectedWarehouse.value = items.value[0]
      break
    case 'products':
      headers.value = headersProducts
      items.value = await getData('products', 'CompanyID', userStore.user.CompanyID)
      selectedProduct.value = items.value[0]
      break
    case 'section':
      headers.value = headersSections
      items.value = await getData('section', '', '') //HAY QUE HACER CONSULTA COMPLEJA PARA TRAER SOLO LOS DE LOS ALMACENES DE NUESTRA COMPANY
      selectedSection.value = items.value[0]
      break
    case 'shelf':
      headers.value = headersShelf
      items.value = await getData('shelf', '', '')
      selectedShelf.value = items.value[0]
      break

    default:
      break
  }
}

const deleteItems = () => {
  items.value = items.value.filter(
    (item) => !itemsSelected.value.some((selectedItem) => selectedItem.player === item.player)
  )
  itemsSelected.value = [] // Limpiar la selección después de borrar
}

watch(selectedTable, (newValue, oldValue) => {
  isLoading.value = true
  setTimeout(() => {
    getItems()
    resetFilter()
    isLoading.value = false
  }, 2000)
})

onMounted(() => {
  setTimeout(async () => {
    getItems()
    isLoading.value = false
  }, 2000)
})

//EDITAR Y MODIFICAR UN ELEMENTO
const clickEdit = () => {
  switch (selectedTable.value.ing) {
    case 'warehouses':
      newWarehouse.value = selectedWarehouse.value
      break
    case 'products':
      newProduct.value = selectedProduct.value
      break
    case 'section':
      newSection.value = selectedSection.value
      break
    case 'shelf':
      newShelf.value = selectedShelf.value
      break

    default:
      break;
  }
  isEditing.value = true
  openModal()
}
const clickDeleteSingleItem = async () => {
  let deleted
  switch (selectedTable.value.ing) {
    case 'warehouses':
      deleted = await deleteData('warehouses', 'WarehouseID', selectedWarehouse.value?.WarehouseID)
      break
    case 'products':
      deleted = await deleteData('products', 'ProductID', selectedProduct.value?.ProductID)
      break
    case 'section':
      deleted = await deleteData('section', 'SectionID', selectedSection.value?.SectionID)
      break
    case 'shelf':
      deleted = await deleteData('shelf', 'ShelfID', selectedShelf.value?.ShelfID)
      break
    default:
      break
  }
  getItems()
  resetFilter()
}


/*---------------------- MODAL LOGIC--------------------*/
const showModal = ref<Boolean>(false)

const openModal = () => {
  showModal.value = true
}
const closeModal = () => {
  showModal.value = false
  isEditing.value = false
  resetInputs()
}

const newWarehouse = ref({
  CompanyID: userStore.user?.CompanyID,
  TotalProductQuantity: 0,
  RefrigeratingChamber: false
})
const newProduct = ref({
  CompanyID: userStore.user?.CompanyID,
  ProductName: '',
  TotalProductQuantity: 0,
  Description: '',
  UnitPrice: 0,
  ExpiryDate: '',
})
const newSection = ref({
  WarehouseID: '',
  SectionName: ''
})
const newShelf = ref({
  SectionID: '',
  ShelfName: ''
})


const clickAddElement = async () => {
  let response;
  switch (selectedTable.value.ing) {
    case 'warehouses':
      newWarehouse.value.RefrigeratingChamber = newWarehouse.value.RefrigeratingChamber ? 1 : 0
      response = await saveData('warehouses', newWarehouse.value)
      break
    case 'products':
      response = await saveData('products', newProduct.value)
      break
    case 'section':
      response = await saveData('section', newSection.value)
      break
    case 'shelf':
      response = await saveData('shelf', newShelf.value)
      break

    default:
      break;
  }
  if(response.result == 'ok'){
    alert('Añadido correctamente')
    resetInputs()
    closeModal()
    getItems()
    resetFilter()
    
  }
  else{
    alert('Debes rellenar todos los campos correctamente')
  }
  
}


const clickEditElement = async () => {
  let response;
  switch (selectedTable.value.ing) {
    case 'warehouses':
      newWarehouse.value.RefrigeratingChamber = newWarehouse.value.RefrigeratingChamber ? '1' : '0'
      response = await updateData('warehouses', selectedWarehouse.value?.WarehouseID, 'WarehouseID' ,newWarehouse.value)
      break
    case 'products':
      response = await updateData('products', selectedProduct.value?.ProductID, 'ProductID' ,newProduct.value)
      break
    case 'section':
      response = await updateData('section', selectedSection.value?.SectionID, 'SectionID' ,newSection.value)
      break
    case 'shelf':
      response = await updateData('shelf', selectedShelf.value?.ShelfID, 'ShelfID' ,newShelf.value)
      break

    default:
      break;
  }
  if(response.result == 'ok'){
    alert('Modificado correctamente')
    resetInputs()
    closeModal()
    getItems()
    resetFilter()
  }
  else{
    alert('Debes rellenar todos los campos correctamente')
  }
  
}

const resetInputs = () => {
  newWarehouse.value = {
    CompanyID: userStore.user?.CompanyID,
    TotalProductQuantity: 0,
    RefrigeratingChamber: false
  }
  newProduct.value = {
    CompanyID: userStore.user?.CompanyID,
    ProductName: '',
    TotalProductQuantity: 0,
    Description: '',
    UnitPrice: 0,
    ExpiryDate: '',
  }
  newSection.value = {
    WarehouseID: '',
    SectionName: ''
  }
  newShelf.value = {
    SectionID: '',
    ShelfName: ''
  }
}

const resetUpdateInputs = () => {

}

</script>

<style scoped>
.modalOverlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 6000;
  background: rgba(0, 0, 0, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modalCont {
  display: flex;
  flex-direction: column;
  background-color: #e1e3e7;
  padding: 10px 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 22%;
  height: 60%;
  gap: 15px;
}

.modalTitle {
  text-align: center;
  height: 20%;
}

.modalData {
  height: 70%;
  width: 100%;
}

.modalInputs {
  display: flex;
  flex-direction: column;
  gap: 30px;
  height: 90%;
  padding-inline: 10px;
}

.inputLine {
  display: flex;
  align-items: center;
}

.inputDiv {
  width: 70%;
  display: flex;
  align-items: center;
}


.inputTitle {
  width: 50%;
  font-weight: bold;
}

.modalButtons {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 15px;
  flex-direction: column;
  height: 30%;
  width: 100%;
}

.deleteBtn.addBtnModal {
  background-color: #2d3a4f;
  color: white;
}


.checkbox {
  width: 40px;
  height: 20px
}

.inputText {
  width: 100%;
  padding: 2px
}

/*----------------------------------------------------------------*/
.container {
  display: flex;
  justify-content: center;
  width: 100%;
  min-height: 60vh;
  gap: 30px;
}

.dataCont {
  display: flex;
  flex-direction: column;
  background-color: #ffffff;
  padding: 10px 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 20%;
  gap: 20px;
}

.dataShow {
  display: flex;
  flex-direction: column;
  gap: 10px;
  height: 70%;
}

.dataTitle {
  text-align: center;
}

.data {
  display: flex;
  flex-direction: column;
  width: 100%;
  padding-left: 20px;
}

.buttonCont {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 30%;
  gap: 15px;
}

.tableCont {
  display: flex;
  flex-direction: column;
  background-color: #ffffff;
  padding: 20px;
  gap: 10px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 70%;
}

.tableHeader {
  display: flex;
  align-items: center;
  width: 100%;
  height: 50px;
}

.selector {
  width: 30%;
  height: 100%;
  padding-right: 5px;
  background-color: #2d3a4f;
  border-radius: 5px;
}

.selector select {
  border: none;
  width: 100%;
  height: 100%;
  padding: 10px;
  font-size: large;
  background-color: #2d3a4f;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  border-left: 7px solid var(--color-green-light);
}

.selector select:focus {
  outline-style: none;
}

.filter {
  display: flex;
  width: 55%;
  height: 100%;
  background-color: #2d3a4f;
  border-radius: 5px;
  gap: 5px;
  margin-left: 10%;
}

.filter select {
  border: none;
  width: 30%;
  height: 100%;
  padding: 10px;
  font-size: large;
  background-color: #2d3a4f;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  border-left: 7px solid var(--color-green-light);
}

.filter select:focus {
  outline-style: none;
}

.filterText {
  width: 62%;
  border: none;
  border-left: 2px solid #fff;
  background-color: #2d3a4f;
  color: #fff;
  font-size: large;
  padding-left: 10px;
}

.filterText:focus {
  outline-style: none;
}

.searchButton {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 8%;
  height: 100%;
  color: #fff;
  background-color: var(--color-green-light);
  border-radius: 0px 5px 5px 0px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.searchButton:hover {
  background-color: var(--color-orange);
}

.resetFilter {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 4%;
  height: 100%;
  color: #000;
}

.resetIcon {
  cursor: pointer;
}

.table {
  width: 100%;
}

.customize-table {
  --easy-table-header-font-size: 17px;
  --easy-table-header-height: 50px;
  --easy-table-header-font-color: #fff;
  --easy-table-header-background-color: #2d3a4f;

  --easy-table-header-item-padding: 10px 15px;

  --easy-table-body-even-row-font-color: #fff;
  --easy-table-body-even-row-background-color: #4c5d7a;

  --easy-table-body-row-font-color: #000;
  --easy-table-body-row-height: 50px;
  --easy-table-body-row-font-size: 14px;

  --easy-table-body-row-hover-font-color: #2d3a4f;
  --easy-table-body-row-hover-background-color: #eee;

  --easy-table-body-item-padding: 10px 15px;

  --easy-table-footer-background-color: #2d3a4f;
  --easy-table-footer-font-color: #c0c7d2;
  --easy-table-footer-font-size: 14px;
  --easy-table-footer-padding: 0px 10px;
  --easy-table-footer-height: 50px;

  --easy-table-rows-per-page-selector-width: 70px;
  --easy-table-rows-per-page-selector-option-padding: 10px;
  --easy-table-rows-per-page-selector-z-index: 1;

  --easy-table-scrollbar-track-color: #2d3a4f;
  --easy-table-scrollbar-color: #2d3a4f;
  --easy-table-scrollbar-thumb-color: #4c5d7a;
  --easy-table-scrollbar-corner-color: #2d3a4f;

  --easy-table-loading-mask-background-color: #2d3a4f;
  --easy-table-loading-mask-opacity: 0.8;
}

.buttons {
  display: flex;
  width: 100%;
  height: 30px;
  height: auto;
}

.deleteBtn {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #eee;
  border-radius: 5px;
  cursor: pointer;
  padding: 10px;
  width: 180px;
  transition-duration: 300ms;
}

.deleteBtn.addBtn {
  margin-left: auto;
  background-color: #2d3a4f;
  color: white;
}

.deleteBtn:hover {
  transform: scale(1.05);
}
</style>
