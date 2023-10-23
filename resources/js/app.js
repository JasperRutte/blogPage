import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory} from "vue-router";

// import components
import App from "./components/App.vue";
import Blog from "@/components/Blog.vue";
import Links from "@/components/Links.vue";
import Login from "@/components/Login.vue";

// route components
const routes = [
    {
        path: "/App",
        component: App
    },
    {
        path: "/Blog",
        component: Blog
    },
    {
        path: "/Links",
        component: Links
    },
    {
        path: "/Login",
        component: Login
    },
];


// const router = createRouter({
//     history: createWebHistory(),
//     mode: "history",
// });


const app = createApp({
    components: {
        App,
        Blog,
        Links,
        Login
    }
});

// app.use(router);

app.mount("#app");
