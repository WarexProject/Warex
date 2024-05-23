<template>
  <footer class="footer">
    <div class="container">
      <p>&copy; {{ currentYear }} Warex. Todos los derechos reservados.</p>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'CorporateFooter',
  data() {
    return {
      currentYear: new Date().getFullYear()
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
.footer {
  background-color: var(--color-gray-medium);
  color: #fff;
  padding: 20px 0;
  text-align: center;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva,
    Verdana, sans-serif;
  margin-top: 6%;
}
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}
</style>
