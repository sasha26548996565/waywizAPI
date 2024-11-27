import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import Index from './components/Index.vue';
import axios from 'axios';

const token = localStorage.getItem('auth_token');

if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

const app = createApp(Index);

app.use(router);

app.mount('#app');
