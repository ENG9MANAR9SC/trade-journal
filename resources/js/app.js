import './bootstrap';
import { createApp } from 'vue';


import hello from './components/hello.vue'

const app = createApp()
app.component('hello', hello)
app.mount('#app');



