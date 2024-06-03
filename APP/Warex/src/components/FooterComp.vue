<template>
  <footer class="footer">
      <p class="copy" >&copy; {{ currentYear }} Warex&trade;. Todos los derechos reservados.</p>
      <div class="socialMedia">
        <a v-for="(elm, indx) in socialMedia" :key="indx" :href="elm.link" target="_blank" rel="noopener noreferrer">
          <font-awesome-icon :icon="elm.icon" />
        </a>
      </div>
  </footer>
</template>

<script setup lang="ts">
  const currentYear = new Date().getFullYear()

  const socialMedia = [
    { link: 'https://github.com/WarexProject/Warex', icon: 'fa-brands fa-github' },
    { link: 'https://x.com/WarexProject', icon: 'fa-brands fa-twitter' },
    { link: 'https://www.instagram.com/warexproject/', icon: 'fa-brands fa-instagram' },
    { link: 'https://www.linkedin.com/in/warex-s-l-837722310/', icon: 'fa-brands fa-linkedin' },
    { link: 'https://github.com/WarexProject/Warex', icon: 'fa-brands fa-discord' },
  ]

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
  display: flex;
  width: 100%;
  margin-top: 50px;    
  align-items: center;
  justify-content: space-between;
}

.copy{
  padding: 0 20px;
}

.socialMedia{
  padding: 0 20px;
  display: flex;
  gap: 20px;
  font-size: large;
}

.socialMedia a{
text-decoration: none;
color: #ffff;
font-size: large;
padding: 5px 8px;
border-radius: 5px;
transition-duration: 300ms;
}

.socialMedia a:hover{
color: var(--color-gray-dark);
background-color: var(--color-gray-ultralight);
font-size: large;
padding: 5px 8px;
}

</style>
