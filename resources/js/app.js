import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory } from "vue-router";

// import components
import App from "./components/App.vue";
import JasperRutte from "./components/JasperRutte.vue";
import Account from "./components/Account.vue";

import Links from "./components/links/Link.vue";
import createLink from "./components/links/CreateLink.vue";
import ViewLink from "./components/links/ViewLink.vue";
import EditLink from "./components/links/EditLink.vue";

import Blog from "./components/blogs/Blog.vue";
import CreateBlog from "./components/blogs/CreateBlog.vue"
import ViewBlog from "./components/blogs/ViewBlog.vue";
import EditBlog from "./components/blogs/EditBlog.vue";

import axios from "axios";

// route components
const routes = [
    {
        path: "/JasperRutte",
        component: JasperRutte
    },
    {
        path: "/app",
        component: App
    },
    {
        path: "/account",
        component: Account
    },

    //blogs
    {
        path: "/blog",
        component: Blog
    },
    {
        path: "/CreateBlog",
        component: CreateBlog
    },
    {
        path: "/ViewBlog/:id",
        component: ViewBlog
    },
    {
        path: "/EditBlog/:id",
        component: EditBlog
    },

    //links
    {
        path: "/links",
        component: Links
    },
    {
        path: "/CreateLinks",
        component: createLink
    },
    {
        path: "/ViewLink/:id",
        component: ViewLink
    },
    {
      path: "/EditLink/:id",
        component: EditLink
    },
];


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
        createLink,
        ViewBlog,
        EditBlog,
        JasperRutte,
        ViewLink,
        EditLink
    }
});

app.use(router);
app.mixin(userMixin)
app.mount("#app");

const savedToken = localStorage.getItem('token');
axios.defaults.headers.common = {'Authorization': `Bearer ${savedToken}`};


