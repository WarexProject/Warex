<template>
  <div class="container">
    <!-- Primera celda -->
    <div class="first-cell">
      <div class="image-section">
        <img src="../utils/img/img1.png" alt="Imagen" />
      </div>
      <div class="list-section">
        <ol>
          <li>Elemento 1</li>
          <li>Elemento 2</li>
          <li>Elemento 3</li>
          <li>Elemento 4</li>
          <li>Elemento 5</li>
          <li>Elemento 6</li>
          <li>Elemento 7</li>
          <li>Elemento 8</li>
          <li>Elemento 9</li>
        </ol>
      </div>
    </div>

    <!-- Segunda celda -->
    <div class="second-cell">
      <div class="file-input-section">
        <input id="file-upload" type="file" />
      </div>
      <div class="button-section">
        <button>Subir EXCEL de </button>
      </div>
    </div>

    <!-- Tercera celda -->
    <div class="third-cell">
      <div class="dropdown-section">
        <select>
          <option value="opcion1">Opción 1</option>
          <option value="opcion2">Opción 2</option>
          <option value="opcion3">Opción 3</option>
        </select>
      </div>
      <div class="right-button-section">
        <button>Descargar plantilla de EXCEL de </button>
      </div>
    </div>
  </div>
</template>

<script setup lang='ts'>
// Aquí puedes agregar tu lógica de Vue si es necesario
</script>

<style scoped>
.container {
  display: grid;
  grid-template-columns: 3fr 1fr;
  grid-template-rows: 1fr auto;
  height: 70vh; /* Ajustar la altura total del contenedor */
  gap: 20px; /* Ajustar la separación entre las celdas */
  padding: 10px;
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
  border: 1px solid #ccc;
  padding: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-section img {
  object-fit: contain;
  width: 95%;
  height: 100%;
}

.list-section {
  flex: 1 1 40%;
  border: 1px solid #ccc;
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
}

.file-input-section input {
  width: auto;
  height: 30px;
}

.button-section {
  display: flex;
  justify-content: center;
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

.dropdown-section, .right-button-section {
  display: flex;
  justify-content: center;
}

.dropdown-section select, .right-button-section button {
  width: 100%;
  height: 35px;
}

.right-button-section button {
  margin-top: 0;
  height: 50px;
}
</style>
