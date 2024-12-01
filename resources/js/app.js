import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import Index from './components/Index.vue';
import axios from 'axios';
import dayjs from 'dayjs';

const token = localStorage.getItem('auth_token');

if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

const app = createApp(Index);

app.use(router);
app.config.globalProperties.$dayjs = dayjs;

app.mount('#app');
