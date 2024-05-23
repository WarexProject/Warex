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
import { defineProps, defineEmits } from 'vue'

const props = defineProps({
  show: {
    type: Boolean,
    required: true
  }
})

const emit = defineEmits(['close'])

function close() {
  emit('close')
}
</script>

<style scoped>
:root {
  --color-blue-electric: #3a61f7;
  --color-blue-userLink: #5694f0;
  --color-blue-middle: #64708b;
  --color-blue-ultralight: #eef0f8;
  --color-gray-dark: #212121;
  --color-gray-medium: #484c5a;
  --color-gray-middle: #9da3b5;
  --color-gray-ultralight: #e6e8ec;
  --color-red: #dc2843;
  --color-green: #08cc74;
  --color-green-light: #60ca9a;
  --color-orange: rgb(255, 185, 56);
  --color-orange-dark: #ff7f00;
}

.modal-overlay {
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
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
  padding: 20px;
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
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
  font-weight: bold;
  font-size: 20px;
  background-color: var(--color-red);
  color: white;
  position: absolute;
  top: 10px;
  right: 10px;
  border: none;
  cursor: pointer;
  border-radius: 18px;
  transition: background-color 0.3s ease;
  padding: 3px 8px;
}

.close-button:hover {
  background-color: var(--color-red);
}

.modal-content {
  text-align: center;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
</style>
