<template>
  <div class="container">
    <div class="first-cell">
      <div class="column">
        <div class="row"><p>Texto pequeño 1</p></div>
        <div class="row"><p>Texto pequeño 2</p></div>
        <div class="row"><p>Texto pequeño 3</p></div>
      </div>
      <div class="divider"></div>
      <div class="column">
        <div class="row"><p>Texto pequeño 4</p></div>
        <div class="row"><p>Texto pequeño 5</p></div>
        <div class="row"><p>Texto pequeño 6</p></div>
      </div>
    </div>
    <div class="second-cell">
      <div class="row">
        <select>
          <option value="1">Opción 1</option>
          <option value="2">Opción 2</option>
        </select>
      </div>
      <div class="row">
        <img src="https://via.placeholder.com/100" alt="Imagen pequeña">
      </div>
    </div>
    <div class="third-cell">
      <div class="row large-text">Texto grande</div>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Header 1</th>
              <th>Header 2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Data 1</td>
              <td>Data 2</td>
            </tr>
            <tr>
              <td>Data 3</td>
              <td>Data 4</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup lang='ts'>
</script>

<style scoped>
.container {
  display: grid;
  grid-template-areas: 
    "first-cell second-cell"
    "third-cell third-cell";
  grid-template-rows: 0.5fr 1.5fr;
  grid-template-columns: 2fr 1fr;
  height: 100vh;
  gap: 10px;
  padding: 10px;
}

.first-cell {
  grid-area: first-cell;
  display: flex;
  justify-content: space-between;
  border: 1px solid #ccc;
  padding: 10px;
  height: calc(25vh - 10px);
}

.second-cell {
  grid-area: second-cell;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border: 1px solid #ccc;
  padding: 10px;
  height: calc(25vh - 10px);
}

.third-cell {
  grid-area: third-cell;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  border: 1px solid #ccc;
  padding: 10px;
  height: calc(75vh - 20px);
}

.column {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.row {
  display: flex; /* Usar flexbox para centrar verticalmente */
  justify-content: center; /* Centrar horizontalmente */
  padding: 5px 0;
}

.large-text {
  margin-bottom: 20px; /* Separación entre el texto y la tabla */
}

.divider {
  width: 1px;
  background-color: #ccc;
  margin: 0 10px;
}

.table-container {
  flex-grow: 1;
  overflow: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ccc;
  padding: 8px;
  text-align: left;
}

thead {
  background-color: #f9f9f9;
}
</style>
