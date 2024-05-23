<template>
  <div class="clock">
    <img src="@/assets/img/clock-icon.png" alt="" width="25px">
    <hr>
    <h3>{{ currentTime }}</h3>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';

const currentTime = ref('');

const updateTime = () => {
  const now = new Date();
  currentTime.value = `${formatTime(now.getHours())}:${formatTime(now.getMinutes())}:${formatTime(now.getSeconds())}`;
};

const formatTime = (time: number): string => {
  return time < 10 ? `0${time}` : time.toString();
};

onMounted(() => {
  updateTime();
  setInterval(() => {
    updateTime();
  }, 1000);
});
</script>

<style scoped>
:root {
  --color-blue-electric: #3A61F7;
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
.clock {
  font-size: 0.9rem;
  font-weight: bold;
  color: var(--color-green);
  border-radius: 80px;
}
</style>
