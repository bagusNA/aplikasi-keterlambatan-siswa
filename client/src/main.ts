import { createApp } from 'vue';
import { createPinia } from 'pinia';

import App from './App.vue';
import router from './router';

import 'beercss';
import '@/assets/theme.css'

export const endpoint = 'http://127.0.0.1:8000';
const app = createApp(App);

app.use(createPinia());
app.use(router);
app.provide('endpoint', endpoint);

app.mount('#app');
