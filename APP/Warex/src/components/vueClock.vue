<template>
  <div class="clock">
    <img src="@/assets/img/clock-icon.png" alt="" width="25px" />
    <hr />
    <h3>{{ currentTime }}</h3>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentTime: ''
    }
  },
  mounted() {
    this.updateTime()
    setInterval(() => {
      this.updateTime()
    }, 1000)
  },
  methods: {
    updateTime() {
      const now = new Date()
      this.currentTime = `${this.formatTime(now.getHours())}:${this.formatTime(now.getMinutes())}:${this.formatTime(now.getSeconds())}`
    },
    formatTime(time) {
      return time < 10 ? `0${time}` : time
    }
  }
}
</script>

<style scoped>
:root {
  --color-blue-electric: #3a61f7;
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
.clock {
  font-size: 0.9rem;
  font-weight: bold;
  color: var(--color-green);
  border-radius: 80px;
}
</style>
