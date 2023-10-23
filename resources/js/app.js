import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
// import { createRouter, createWebHistory} from "vue-router";

// import components
import App from "./components/App.vue";

// route components
// const routes = [
//     {
//
//     }
// ];


// const router = createRouter({
//     history: createWebHistory(),
//     mode: "history",
// });


const app = createApp({
    components: {
        App,
    }
});

// app.use(router);

app.mount("#app");
