<script setup lang="ts">
import vueClock from '@/components/ClockComp.vue';
import {DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import {ref, onMounted} from 'vue';
import type User from '@/interfaces/user.ts';
import {getData} from '@/utils/crudAxios';
import {useUserStore} from '@/stores/userStore'

const userStore = useUserStore();

const date = new Date();

const companyName = ref();
const warehouseTotal = ref();
const productTotal = ref();

const fetchCompanyName = async () => {
  try {
    const response = await getData('companies', 'NIF', userStore.user.CompanyID);
    if (response && response.length > 0) {
      companyName.value = response[0].CompanyName
    }
  } catch (e) {
    console.log(e);
  }
};

const fetchWarehouseNumber = async () => {
  try {
    const response = await getData('warehouses','CompanyID',userStore.user.CompanyID);
    warehouseTotal.value = response
    warehouseTotal.value  = warehouseTotal.value.length
 
  } catch (e) {
    console.log(e);
  }
};

const fetchProductNumber = async () => {
  try {
    const response = await getData('products','CompanyID',userStore.user.CompanyID);
    productTotal.value = response
    productTotal.value  = productTotal.value.length
  } catch (e) {
    console.log(e);
  }
};

onMounted(() => {
  fetchCompanyName();
  fetchWarehouseNumber();
  fetchProductNumber()
});

</script>

<template>
  <div class="home-container">

    <div class="components-panel">
      <DatePicker class="calendar" v-model="date" style="font-weight:bolder; color: var(--color-green-light);"></DatePicker>
      <vueClock class="clock"></vueClock>
      <div class="userCard">
        <font-awesome-icon icon="user" class="userDataIcon"/>
        <hr>
        <div class="userData">
          <p class="userName">{{ userStore.user?.UserName}}</p>
          <p class="companyName">{{ companyName }}</p>
        </div>
      </div>
    </div>

    <div class="info-panel">
      <div class="show-info-panel">
        <div class="infoHeader">
          <img src="@/assets/img/information-icon.png" alt="" class="info-icon">
          <h2 id="info-titulo" style="text-align: center;">Información general</h2>
        </div>
        <div class="info-item">
          <font-awesome-icon icon="building" class="buildingIcon infoItemIcon"/>
          <h2><strong>Tu empresa</strong></h2>
          <h3 style="color: green">{{ companyName }}</h3>
        </div>
        <hr>
        <div class="info-item">
          <font-awesome-icon icon="warehouse" class="warehouseIcon infoItemIcon"/>
          <h2><strong>Almacenes registrados</strong></h2>
          <h3 style="color: green">{{ warehouseTotal }} almacenes</h3>
        </div>
        <hr>
        <div class="info-item">
          <font-awesome-icon icon="box" class="boxIcon infoItemIcon"/>
          <h2><strong>Productos almacenados</strong></h2>
          <h3 style="color: green">{{ productTotal }} productos</h3>
        </div>
      </div>
    </div>
  </div>

</template>

<style>

/*Estilos*/

.home-container {
  display: flex;
  flex-direction: row;
  padding: 20px;
  gap: 30px;
  justify-content: center;
}

.info-panel {
  background-color: #ffffff;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 90%;
}

.infoHeader{
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
}

.info-titulo{
  width: 100%;
  text-align: center;
}

.info-icon {
  width: 45px;
}


.show-info-panel {
  display: flex; 
  gap: 10px;
  flex-direction: column; 
  height: 100%; 
}

.info-item {
  display: flex;
  align-items: center;
  width: 100%;
  gap: 10%;
}

.infoItemIcon{
  color: var(--color-green-light); 
  width: 10%;
  height: 30px;
}

.info-item h2 {
  margin: 0;
  width: 40%;
}

.info-item h3 {
  width: 30%;
}

.components-panel {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
  gap: 20px;
  width: 30%;
  height: 80%;
}

.clock {
  background-color: white;
  padding: 20px;
  width: 80%;
  height: 100px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
  border-radius: 20%;
}

.userCard{
  background-color: white;
  padding: 20px;
  width: 80%;
  height: 100px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
  border-radius: 20px;
}

.userDataIcon{
  color: var(--color-green-light); 
  width: 10%;
  height: 25px;
}

.userData{
  display: flex;
  flex-direction: column;
  margin-top: 15px;
  gap: 8px;
}
.userData p{
  margin: 0;
  padding: 0;
}
.userData .userName{
  font-size: x-large;
}

.calendar {
  background-color: white;
  padding: 10px;
  border-radius: 10px;
  width: 90%;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

@media (max-width: 600px) {
  .home-container {
    flex-direction: column;
    align-items: center;
  }

  .components-panel {
    width: 50%;
    margin-top: 20px;
  }

  .info-panel {
    width: 40%;
  }
}
</style>


