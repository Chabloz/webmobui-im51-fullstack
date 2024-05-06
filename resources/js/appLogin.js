import { createApp } from 'vue/dist/vue.esm-bundler';
import { Quasar } from 'quasar';
// import App from './AppChat.vue';
import QuasarConfig from './bootstrap.js';
import TheLoginForm from './components/TheLoginForm.vue';

const myApp = createApp({});
myApp.use(Quasar, QuasarConfig);
myApp.component("the-login-form", TheLoginForm);
myApp.mount('#app');