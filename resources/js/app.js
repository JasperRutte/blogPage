import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory } from "vue-router";

// import components
import App from "./components/App.vue";
import Blog from "./components/Blog.vue";
import Links from "./components/Links.vue";
import Account from "./components/Account.vue";
import CreateBlog from "./components/CreateBlog.vue"
import ViewBlog from "./components/ViewBlog.vue";
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
    {
        path: "/CreateBlog",
        component: CreateBlog
    },
    {
        path: "/ViewBlog/:id",
        component: ViewBlog
    },
];

// vue mixin
// computed: {
//     user() {
//         return localStorage.getItem("userData")
//     }
//

export const userMixin = {
    computed: {
        user() {
        return JSON.parse(localStorage.getItem('userData'))
        }
    }
}



const router = createRouter({
    history: createWebHistory(),

    routes,
});


const app = createApp({
    components: {
        App,
        Blog,
        Links,
        Account,
        CreateBlog,
        ViewBlog
    }
});

app.use(router);
app.mixin(userMixin)
app.mount("#app");

const savedToken = localStorage.getItem('token');
axios.defaults.headers.common = {'Authorization': `Bearer ${savedToken}`};


