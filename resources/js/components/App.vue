<template>


    <nav class="navbar navbar-expand-lg" >
        <div class="navbar-nav">
            <router-link class="nav-item nav-link text-white" to="/">About</router-link>
            <router-link class="nav-item nav-link text-white" to="/blog">Blog</router-link>
            <router-link class="nav-item nav-link text-white" to="/links">Links</router-link>
            <router-link class="nav-item nav-link text-white" to="/account">Account</router-link>
        </div>
    </nav>

    <button @click="userData">userData</button>



    <router-view></router-view>
</template>

<script>
import axios from "axios";
export default {
    name: "App",
    data(){
    },

    mounted() {
    },
    methods: {
        userData() {
            axios.get('api/user')
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                })
        },
    },
}
</script>

<style>
#container-center {
    margin: 50px auto auto;
    width: 500px;
    background-color: #679198;
    padding: 10px;
    border-radius: 5px;
}

#blogPost {
    margin: 20px;
    width: 150px;
    height: 150px;
    background-color: #8eacb0;
    padding: 10px;
    border-radius: 10px;
}

body {
    background-color: #151d1e;
}

h1, h2, h3, p {
    color: white;
}


nav {
    box-shadow: 0 0 1px ghostwhite;
    background-color: #0c1213;
}

</style>
