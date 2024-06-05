import '@/assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import { faEye, faArrowLeft, faEyeSlash, faDatabase, faHome, faCloudUploadAlt, faChartBar, faUser, faBuilding, faWarehouse, faBox, faMagnifyingGlass, faRotateLeft } from '@fortawesome/free-solid-svg-icons';
import { faDiscord, faLinkedin, faGithub, faInstagram, faTwitter } from '@fortawesome/free-brands-svg-icons';
library.add(faGithub, faLinkedin, faTwitter, faInstagram, faDiscord, faEye, faEyeSlash, faArrowLeft, faHome, faDatabase, faCloudUploadAlt, faChartBar, faUser, faBuilding,  faWarehouse, faBox, faMagnifyingGlass, faRotateLeft )

const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon);
app.component('EasyDataTable', Vue3EasyDataTable);
app.use(createPinia())
app.use(router)


app.mount('#app')
