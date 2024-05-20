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
        currentYear: new Date().getFullYear(),
      };
    },
  };
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
  .footer {
    background-color: var(--color-gray-medium);
    color: #fff;
    padding: 20px 0;
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  }
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
  }
  </style>
  