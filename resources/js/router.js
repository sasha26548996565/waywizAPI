import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/login',
        name: 'login',
        component: () => import('./components/Auth/Login.vue'),
        beforeEnter: (to, from, next) => {
            const token = localStorage.getItem('auth_token');
            if (token) {
                next({ name: 'admin.index' });
            } else {
                next();
            }
        },
    },
    {
        path: '/admin',
        name: 'admin.index',
        component: () => import('./components/Admin/Index.vue'),
        beforeEnter: (to, from, next) => {
            const token = localStorage.getItem('auth_token');

            if (! token) {
                next({ name: 'login' });
            } else {
                next();
            }
        },
        children: [
            {
                path: 'users',
                name: 'admin.user.index',
                component: () => import('./components/Admin/User/Index.vue'),
            },
            {
                path: 'messages',
                name: 'admin.message.index',
                component: () => import('./components/Admin/Message/Index.vue'),
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;
