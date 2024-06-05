<template>
  <div class="container">
    <div class="dataCont">
      <h2 class="dataTitle">Datos de {{selectedTable.esp}}</h2>
      <div class="data">
        <p>Número total de {{ selectedTable.esp }}: {{ items.length }}</p>
        <p>Número total de {{ selectedTable.esp }}: {{ items.length }}</p>
      </div>
    </div>
    <div class="tableCont">
      <div class="tableHeader">
        <div class="selector">
          <select v-model="selectedTable" >
            <option v-for="(elm, indx) in tables" :key="indx" :value="elm">
              {{ elm.esp }}
            </option>
          </select>
        </div>
        <div class="filter">
          <select v-model="searchField" >
            <option value="" disabled>Filtrar por</option>
            <option v-for="(elm, indx) in headers" :key="indx" :value="elm.value">
              {{ elm.text }}
            </option>
          </select>
          <input type="text" class="filterText" placeholder="Introduzca el valor a buscar " v-model="searchText" >
          <div class="searchButton" @click="clickSearch" >
            <font-awesome-icon icon="magnifying-glass"/>
          </div>
        </div>
        <div class="resetFilter"  >
            <font-awesome-icon icon="rotate-left" class="resetIcon" @click="resetFilter" />
          </div>
      </div>
      
      <EasyDataTable class="table"
        v-model:items-selected="itemsSelected"
        table-class-name="customize-table"
        :headers="headers"
        :items="items"
        :rows-per-page="rowsPerPage"
        :loading="isLoading"
        :searchField="searchField"
        :searchValue="searchValue"
        :tableHeight="460"
      />
      <div class="buttons">
        <div class="deleteBtn" v-if="itemsSelected.length > 0"  @click="deleteItems">
          Eliminar seleccionados: {{ itemsSelected.length }}
        </div>
      </div>
      
    </div>
  </div>
</template>

<script setup lang='ts'>
import { ref, onMounted, watch } from 'vue';
import type { Header, Item } from "vue3-easy-data-table";
import { getData } from '@/utils/crudAxios';
import type Table from '@/interfaces/table';

//

const tables = ref<Table[]>([ 
  { esp: 'Almacenes' , ing: 'warehouses', icon: '' },
  { esp: 'Productos' , ing: 'products', icon: '' },
  { esp: 'Secciones' , ing: 'sections', icon: '' },
  { esp: 'Estanterías' , ing: 'shelf', icon: '' },
  { esp: 'Almacenes' , ing: 'Warehouses', icon: '' },
])
const headers = ref<Header[]>([ //TENDRÉ QUE HACER UN DICCIONARIO PARA CADA TABLA. POR EL CASO EN EL QUE ME TRAIGA UN ARRAY VACIO
  { text: "Jugador", value: "player", },
  { text: "Equipo", value: "team"},
  { text: "Número", value: "number"},
  { text: "Posición", value: "position"},
  { text: "Altura", value: "indicator.height"},
  { text: "Peso (lbs)", value: "indicator.weight", sortable: true},
  { text: "Úiltimo equipo", value: "lastAttended", width: 200},
  { text: "País", value: "country"},
]);

const headersWarehouses: Header[] = [ 
  { text: "Hola", value: "player", },
  { text: "CosaPrueba", value: "team"},
  { text: "Probando", value: "number"},
  { text: "Josito", value: "position"},
];
const headersProducts: Header[] = [ 
  { text: "Hola", value: "player", },
  { text: "CosaPrueba", value: "team"},
  { text: "Probando", value: "number"},
  { text: "Josito", value: "position"},
];
const headersSections: Header[] = [ 
  { text: "Hola", value: "player", },
  { text: "CosaPrueba", value: "team"},
  { text: "Probando", value: "number"},
  { text: "Josito", value: "position"},
];
const headersShelf: Header[] = [ 
  { text: "Hola", value: "player", },
  { text: "CosaPrueba", value: "team"},
  { text: "Probando", value: "number"},
  { text: "Josito", value: "position"},
];

const items = ref<Item[]>([
  { player: "Stephen Curry", team: "GSW", number: 30, position: 'G', indicator: {"height": '6-2', "weight": 185}, lastAttended: "Davidson", country: "USA"},
  { player: "LeBron James", team: "LAL", number: 6, position: 'F', indicator: {"height": '6-9', "weight": 250}, lastAttended: "St. Vincent-St. Mary HS (OH)", country: "USA"},
  { player: "Kevin Durant", team: "BKN", number: 7, position: 'F', indicator: {"height": '6-10', "weight": 240}, lastAttended: "Texas-Austin", country: "USA"},
  { player: "Giannis Antetokounmpo", team: "MIL", number: 34, position: 'F', indicator: {"height": '6-11', "weight": 242}, lastAttended: "Filathlitikos", country: "Greece"},
  { player: "James Harden", team: "PHI", number: 1, position: 'G', indicator: {"height": '6-5', "weight": 220}, lastAttended: "Arizona State", country: "USA"},
  { player: "Luka Dončić", team: "DAL", number: 77, position: 'G', indicator: {"height": '6-7', "weight": 230}, lastAttended: "Real Madrid", country: "Slovenia"},
  { player: "Kawhi Leonard", team: "LAC", number: 2, position: 'F', indicator: {"height": '6-7', "weight": 225}, lastAttended: "San Diego State", country: "USA"},
  { player: "Damian Lillard", team: "POR", number: 0, position: 'G', indicator: {"height": '6-2', "weight": 195}, lastAttended: "Weber State", country: "USA"},
  { player: "Anthony Davis", team: "LAL", number: 3, position: 'F-C', indicator: {"height": '6-10', "weight": 253}, lastAttended: "Kentucky", country: "USA"},
  { player: "Jayson Tatum", team: "BOS", number: 0, position: 'F', indicator: {"height": '6-8', "weight": 210}, lastAttended: "Duke", country: "USA"},
  { player: "Joel Embiid", team: "PHI", number: 21, position: 'C', indicator: {"height": '7-0', "weight": 280}, lastAttended: "Kansas", country: "Cameroon"},
  { player: "Nikola Jokić", team: "DEN", number: 15, position: 'C', indicator: {"height": '6-11', "weight": 284}, lastAttended: "Mega Basket", country: "Serbia"},
  { player: "Kyrie Irving", team: "DAL", number: 11, position: 'G', indicator: {"height": '6-2', "weight": 195}, lastAttended: "Duke", country: "USA"},
  { player: "Chris Paul", team: "GSW", number: 3, position: 'G', indicator: {"height": '6-0', "weight": 175}, lastAttended: "Wake Forest", country: "USA"},
  { player: "Russell Westbrook", team: "LAC", number: 0, position: 'G', indicator: {"height": '6-3', "weight": 200}, lastAttended: "UCLA", country: "USA"},
  { player: "Jimmy Butler", team: "MIA", number: 22, position: 'F', indicator: {"height": '6-7', "weight": 230}, lastAttended: "Marquette", country: "USA"},
  { player: "Devin Booker", team: "PHX", number: 1, position: 'G', indicator: {"height": '6-5', "weight": 206}, lastAttended: "Kentucky", country: "USA"},
  { player: "Trae Young", team: "ATL", number: 11, position: 'G', indicator: {"height": '6-1', "weight": 180}, lastAttended: "Oklahoma", country: "USA"},
  { player: "Donovan Mitchell", team: "CLE", number: 45, position: 'G', indicator: {"height": '6-1', "weight": 215}, lastAttended: "Louisville", country: "USA"},
  { player: "Paul George", team: "LAC", number: 13, position: 'F', indicator: {"height": '6-8', "weight": 220}, lastAttended: "Fresno State", country: "USA"},
  { player: "Klay Thompson", team: "GSW", number: 11, position: 'G', indicator: {"height": '6-6', "weight": 215}, lastAttended: "Washington State", country: "USA"},
  { player: "Karl-Anthony Towns", team: "MIN", number: 32, position: 'C', indicator: {"height": '7-0', "weight": 248}, lastAttended: "Kentucky", country: "USA"},
  { player: "Bradley Beal", team: "PHX", number: 3, position: 'G', indicator: {"height": '6-4', "weight": 207}, lastAttended: "Florida", country: "USA"},
  { player: "Zion Williamson", team: "NOP", number: 1, position: 'F', indicator: {"height": '6-6', "weight": 284}, lastAttended: "Duke", country: "USA"},
  { player: "Brandon Ingram", team: "NOP", number: 14, position: 'F', indicator: {"height": '6-8', "weight": 190}, lastAttended: "Duke", country: "USA"},
  { player: "Rudy Gobert", team: "MIN", number: 27, position: 'C', indicator: {"height": '7-1', "weight": 258}, lastAttended: "Cholet", country: "France"},
  { player: "Jrue Holiday", team: "BOS", number: 21, position: 'G', indicator: {"height": '6-5', "weight": 205}, lastAttended: "UCLA", country: "USA"},
  { player: "Bam Adebayo", team: "MIA", number: 13, position: 'C', indicator: {"height": '6-9', "weight": 255}, lastAttended: "Kentucky", country: "USA"},
  { player: "Ja Morant", team: "MEM", number: 12, position: 'G', indicator: {"height": '6-3', "weight": 174}, lastAttended: "Murray State", country: "USA"},
  { player: "Jaylen Brown", team: "BOS", number: 7, position: 'F', indicator: {"height": '6-6', "weight": 223}, lastAttended: "California", country: "USA"},
  { player: "Zach LaVine", team: "CHI", number: 8, position: 'G', indicator: {"height": '6-5', "weight": 200}, lastAttended: "UCLA", country: "USA"},
  { player: "De'Aaron Fox", team: "SAC", number: 5, position: 'G', indicator: {"height": '6-3', "weight": 185}, lastAttended: "Kentucky", country: "USA"},
  { player: "Pascal Siakam", team: "TOR", number: 43, position: 'F', indicator: {"height": '6-9', "weight": 230}, lastAttended: "New Mexico State", country: "Cameroon"},
  { player: "Shai Gilgeous-Alexander", team: "OKC", number: 2, position: 'G', indicator: {"height": '6-6', "weight": 180}, lastAttended: "Kentucky", country: "Canada"}
]);

const rowsPerPage = 8
const itemsSelected = ref<Item[]>([]);
const isLoading = ref(true)

const selectedTable = ref<Table>(tables.value[0]);
const searchField = ref('')
const searchValue = ref('')
const searchText = ref('')

const clickSearch = () => {
  searchValue.value = searchText.value
}
const resetFilter = () => {
  searchValue.value = ''
  searchText.value = ''
  searchField.value = ''
}

//FUNCION QUE CARGA EL ARRAY DE COLUMNAS Y LOS DATOS
const getItems = () => {
  changeHeaders()
}

const changeHeaders = () => {
  switch (selectedTable.value.ing) {
    case 'warehouses':
      headers.value = headersWarehouses
      break;
    case 'products':
      headers.value = headersProducts
      break;
    case 'sections':
      headers.value = headersSections
      break;
    case 'shelf':
      headers.value = headersShelf
      break;
  
    default:
      break;
  }
}

const deleteItems = () => {
  items.value = items.value.filter(item => 
    !itemsSelected.value.some(selectedItem => selectedItem.player === item.player)
  );
  itemsSelected.value = []; // Limpiar la selección después de borrar
};

watch(selectedTable, (newValue, oldValue) => {
  isLoading.value = true
  setTimeout(() => {
    getItems()
    isLoading.value = false;
  }, 2000);
});

onMounted(() => {
  setTimeout(() => {
    isLoading.value = false;
  }, 2000);
});
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  width: 100%;
  min-height: 60vh;
  gap: 30px;
}

.dataCont{
  display: flex;
  flex-direction: column;
  background-color: #ffffff;
  padding: 10px 20px;
  gap: 10px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 20%;
}

.dataTitle{
  text-align: center;
}

.tableCont{
  display: flex;
  flex-direction: column;
  background-color: #ffffff;
  padding: 20px;
  gap: 10px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 70%;
}

.tableHeader{
  display: flex;
  align-items: center;
  width: 100%;
  height: 50px;
}

.selector{
  width: 30%;
  height: 100%;
  padding-right: 5px;
  background-color: #2d3a4f ;
  border-radius: 5px;
}
.selector select{
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

.selector select:focus{
  outline-style: none;
}

.filter{
  display: flex;
  width: 55%;
  height: 100%;
  background-color: #2d3a4f ;
  border-radius: 5px;
  gap: 5px;
  margin-left: 10%;
}

.filter select{
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

.filter select:focus{
  outline-style: none;
}

.filterText{
    width: 62%;
    border:none;
    border-left: 2px solid #fff;
    background-color: #2d3a4f;
    color: #fff; 
    font-size: large;
    padding-left: 10px;
}
.filterText:focus{
    outline-style: none;
}

.searchButton{
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

.searchButton:hover{
  background-color: var(--color-orange);
}

.resetFilter{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 4%;
  height: 100%;
  color: #000;
}

.resetIcon{
  cursor: pointer;
}

.table{
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
  --easy-table-scrollbar-thumb-color: #4c5d7a;;
  --easy-table-scrollbar-corner-color: #2d3a4f;

  --easy-table-loading-mask-background-color: #2d3a4f;
  --easy-table-loading-mask-opacity: 0.8;
}

.buttons{
  display: flex;
  width: 100%;
  height: 30px;
}

.deleteBtn{
  display: flex;
  align-items: center;
  background-color: #eee;
  border-radius: 5px;
  cursor: pointer;
  padding: 10px;
}
</style>
