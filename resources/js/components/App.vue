<template>


    <nav class="navbar navbar-expand-lg" >
        <div class="navbar-nav">
            <router-link class="nav-item nav-link" to="/">About</router-link>
            <router-link class="nav-item nav-link" to="/blog">Blog</router-link>
            <router-link class="nav-item nav-link" to="/links">Links</router-link>
            <router-link class="nav-item nav-link" to="/account">Account</router-link>
        </div>
    </nav>

    <router-view></router-view>
</template>

<script>
import axios from "axios";

export default {

    name: "App",
    data(){
        return {
        }

    },

    mounted() {
        axios.get('api/user')
            .then(response => {
                localStorage.setItem('userData', JSON.stringify(response.data))
                console.log('test',  JSON.parse(localStorage.getItem('userData')));
                // console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
    },
}
</script>

<style>

body {
    background-color: #FFFFFF;
}

nav {
    box-shadow: 0 0 1px black;
    background-color: #F4F4F4;
}

#container-center {
    margin: 50px auto auto;
    width: 1500px;
    padding: 10px;
    border-radius: 5px;
}

#container {
    margin: 50px auto auto;
    width: 50%;
    background-color: #F4F4F4;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 3px darkgrey;
}
</style>
