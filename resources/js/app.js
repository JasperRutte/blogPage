import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory } from "vue-router";

// import components
import App from "./components/App.vue";
import Blog from "./components/Blog.vue";
import Links from "./components/Links.vue";
import Account from "./components/Account.vue";
import axios from "axios";

// route components
const routes = [
    {
        path: "/app",
        component: App
    },
    {
        path: "/blog",
        component: Blog
    },
    {
        path: "/links",
        component: Links
    },
    {
        path: "/account",
        component: Account
    },
];


const router = createRouter({
    history: createWebHistory(),

    routes,
});


const app = createApp({
    components: {
        App,
        Blog,
        Links,
        Account
    }
});

app.use(router);

app.mount("#app");

const savedToken = localStorage.getItem('token');
axios.defaults.headers.common = {'Authorization': `Bearer ${savedToken}`};
