import { createWebHistory, createRouter } from 'vue-router';
import MainComponent from '../components/MainComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import store from './store';

const routes = [
    {
        path: '/',
        redirect: '/main',
    },
    {
        path: '/main',
        component: MainComponent,
    },
    {
        path: '/login',
        component: LoginComponent,
    },
    {
        path: '/registration',
        component: RegistrationComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;