<script setup lang="ts">
import vueClock from '@/components/ClockComp.vue';
import {DatePicker } from 'v-calendar';
import 'v-calendar/style.css';

const date = new Date()
</script>

<template>
  <div class="home-container">

    <div class="components-panel">
      <DatePicker class="calendar" v-model="date" style="font-weight:bolder; color: var(--color-green-light);"></DatePicker>
      <vueClock class="clock"></vueClock>
    </div>

    <div class="info-panel">
      <img src="@/assets/img/information-icon.png" alt="" class="info-icon">
      <div class="show-info-panel">
        <h2 id="info-titulo" style="text-align: center;">Información general</h2>
        <div class="info-item">
          <font-awesome-icon icon="building" class="buildingIcon" style="color: var(--color-green-light); font-size: 30px; margin-left: 5px"/>
          <h2 style="margin-left: -550px;"><strong>Tu empresa</strong></h2>
          <h3 style="color: green">Empresa 1</h3>
        </div>
        <hr>
        <div class="info-item">
          <font-awesome-icon icon="warehouse" class="warehouseIcon" style="color: var(--color-green-light); font-size: 30px;"/>
          <h2 style="margin-left: -410px;"><strong>Almacenes registrados</strong></h2>
          <h3 style="color: green">5 almacenes</h3>
        </div>
        <hr>
        <div class="info-item">
          <font-awesome-icon icon="box" class="boxIcon" style="color: var(--color-green-light); font-size: 30px;"/>
          <h2 style="margin-left: -350px;"><strong>Productos almacenados</strong></h2>
          <h3 style="color: green">1.200 productos</h3>
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
  align-items: flex-start;
}

.info-panel {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 90%;
  height: 430px;
}

.info-icon {
  width: 45px;
  transform: translateX(820px)
}

.show-info-panel {
  width: 100%;
  height: 100%;
  justify-content: space-around;
  margin-top: 5px;
}

.info-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 0;
}


.info-item h3 {
  margin: 0;
  transform: translateY(25px);
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
  border-radius: 80%;
  width: 100px;
  height: 100px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
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


