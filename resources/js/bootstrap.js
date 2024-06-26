import '@quasar/extras/roboto-font/roboto-font.css';
import '@quasar/extras/material-icons/material-icons.css';
import 'quasar/dist/quasar.css';

import { setDefaultHeaders, setBaseUrl } from './composables/fetchApi.js';

export const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';

setDefaultHeaders({'X-CSRF-TOKEN': csrfToken});

setBaseUrl(document.querySelector('meta[name="api-base-url"]')?.getAttribute('content') ?? '');

export default {
  plugins: {},
  config: {
    brand: { negative: 'tomato' },
    dark: 'auto',
  },
};