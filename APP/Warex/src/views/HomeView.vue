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
          <h2><strong>Tu empresa</strong></h2>
          <h3 style="color: green">Empresa 1</h3>
        </div>
        <hr>
        <div class="info-item">
          <font-awesome-icon icon="warehouse" class="warehouseIcon" style="color: var(--color-green-light); font-size: 30px;"/>
          <h2><strong>Almacenes registrados</strong></h2>
          <h3 style="color: green">5 almacenes</h3>
        </div>
        <hr>
        <div class="info-item">
          <font-awesome-icon icon="box" class="boxIcon" style="color: var(--color-green-light); font-size: 30px;"/>
          <h2><strong>Productos almacenados</strong></h2>
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
  position: relative; /* Asegura que los elementos absolutos se posicionen relativos a este */
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 90%;
  height: 430px;
}

.info-icon {
  position: absolute;
  top: 0;
  right: 0;
  margin-top: 20px; /* Ajusta según sea necesario */
  margin-right: 20px; /* Ajusta según sea necesario */
  width: 45px;
}

.show-info-panel {
  display: flex; /* Utilizamos flexbox para distribuir los elementos */
  flex-direction: column; /* Columna para apilar los elementos verticalmente */
  justify-content: space-between; /* Espaciado entre los elementos */
  height: 90%; /* Para que ocupe toda la altura del contenedor */
}

.info-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 0;
}

.info-item h2 {
  margin: 0;
  margin-left: 10px; /* Espacio entre el icono y el h2 */
  flex: 1; /* El h2 ocupará todo el espacio restante */
}

.info-item h3 {
  margin-top: 30px;
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


