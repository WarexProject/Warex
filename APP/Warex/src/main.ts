import '@/assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import { faEye, faArrowLeft, faEyeSlash, faDatabase, faHome, faCloudUploadAlt, faChartBar, faUser } from '@fortawesome/free-solid-svg-icons';
import { faGithub } from '@fortawesome/free-brands-svg-icons';
library.add(faGithub, faEye, faEyeSlash, faArrowLeft, faHome, faDatabase, faCloudUploadAlt, faChartBar, faUser )

const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon);
app.use(createPinia())
app.use(router)


app.mount('#app')
