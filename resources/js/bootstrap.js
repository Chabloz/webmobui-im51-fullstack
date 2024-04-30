import '@quasar/extras/roboto-font/roboto-font.css';
import '@quasar/extras/material-icons/material-icons.css';
import 'quasar/dist/quasar.css';

import { setDefaultHeaders, setBaseUrl } from './composables/fetchApi.js';

setDefaultHeaders({
  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '',
});

setBaseUrl(document.querySelector('meta[name="api-base-url"]')?.getAttribute('content') ?? '');

export default {
  plugins: {},
  config: {
    brand: { negative: 'tomato' },
    dark: 'auto',
  },
};