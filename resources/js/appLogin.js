import { createApp } from 'vue';
import { Quasar } from 'quasar';
import App from './AppLogin.vue';

import '@quasar/extras/roboto-font/roboto-font.css'
import '@quasar/extras/material-icons/material-icons.css'

import 'quasar/dist/quasar.css';

const myApp = createApp(App)
myApp.use(Quasar, {plugins: {}});
myApp.mount('#app');