import { createApp } from 'vue';
import { Quasar } from 'quasar';
import App from './AppLogin.vue';
import QuasarConfig from './bootstrap.js';

const myApp = createApp(App)
myApp.use(Quasar, QuasarConfig);
myApp.mount('#app');