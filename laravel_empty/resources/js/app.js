require('./bootstrap.js');

import { createApp } from 'vue';
import router from './router.js';
import store from './store.js';
import AppComponent from '../components/AppComponent.vue';
import VueCookies from "vue-cookies";

createApp({
    components: {
        AppComponent,
    }
})
    .use(router)
    .use(store)
    .use(VueCookies)
    .mount("#app");