<script language="ts">
import vueClock from '@/components/vueClock.vue';
import {DatePicker } from 'v-calendar';
import 'v-calendar/style.css';

export default {
  components: {
    vueClock,
    DatePicker
  },
  data() {
    return {
      date: new Date(),
    };
  },
}
</script>

<template>
  <div class="home-container">

    <div class="components-panel">
      <DatePicker class="calendar" v-model="date"></DatePicker>
      <vueClock class="clock"></vueClock>
    </div>

    <div class="info-panel">
      <img src="@/assets/img/information-icon.png" alt="" width="30%" class="info-icon">
      <h2><strong>Tu empresa:</strong></h2> 
      <h3>Empresa 1</h3>
      <hr>
      <h2><strong>Número de almacenes actual:</strong></h2> 
      <h3>5</h3>
      <hr>
      <h2><strong>Número de productos almacenados:</strong></h2> 
      <h3>1.200</h3>
    </div>

  </div>
</template>

<style>

/*Pantalla Home*/

.home-container {
  display: flex;
  flex-direction: column;
  padding: 20px;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  margin-bottom: 40px;
  gap: 10px;
}

.info-panel {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  grid-row: span 8;
  width: 80%;
  align-items: center;
  width: 80%;
  text-align: center;
  grid-column: span 6;
  align-self: center;
  height: 100%;
  gap: 20px;
}

.info-icon {
  width: 30%;
}

.components-panel {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  gap: 30px;
  text-align: center;
  width: 100%;
  margin-top: -20px;
}

.clock {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 7%;
    height: fit-content;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.calendar-panel {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  left: 80%;
}


@media (max-width: 600px) {
  .home-container {
    display: flex;
    flex-direction: column;
  }

  .info-panel,
  .components-panel {
    grid-column: span 12;
  }

  .components-panel {
    margin-top: 20px;
  }
}


</style>


