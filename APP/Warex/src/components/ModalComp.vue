<template>
  <div class="modal-overlay" @click.self="close">
    <div class="modal">
      <button class="close-button" @click="close">&times;</button>
      <div class="modal-content">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">

const emit = defineEmits(['close']);

function close() {
  emit('close');
}
</script>

<style scoped>
:root {
    --color-blue-electric: #3A61F7;
    --color-blue-userLink: #5694f0;
    --color-blue-middle: #64708B;
    --color-blue-ultralight: #EEF0F8;
    --color-gray-dark: #212121;
    --color-gray-medium: #484C5A;
    --color-gray-middle: #9DA3B5;
    --color-gray-ultralight: #E6E8EC;
    --color-red: #DC2843;
    --color-green: #08cc74;
    --color-green-light: #60ca9a;
    --color-orange: rgb(255, 185, 56);
    --color-orange-dark: #ff7f00;
}

.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal {
  background: var(--color-gray-ultralight);
  padding: 80px 50px;
  border-radius: 8px;
  max-width: 500px;
  width: 100%;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  position: relative;
  display: flex;
  flex-direction: column;
  border: 3px solid var(--color-green-light);
}

.close-button {
  text-decoration: none;
  font-weight: bold;
  font-size: 30px;
  color: var(--color-red);
  position: absolute;
  background-color: var(--color-gray-ultralight);
  top: 10px;
  right: 10px;
  border: none;
  cursor: pointer;
  border-radius: 18px;
  transition: background-color 0.3s ease;
  padding: 3px 8px;
}

.close-button:hover {
}

.modal-content {
  text-align: center;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
</style>
