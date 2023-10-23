<template>
    <nav class="navbar navbar-expand navbar-dark bg-light shadow p-3 bg-white">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <router-link class="nav-item nav-link text-black" to="/App">About</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-item nav-link text-black" to="/Blog">Blog</router-link>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg">
        <div>
            <div class="navbar-nav">
                <router-link class="nav-item nav-link text-white" to="/App">About</router-link>
                <router-link class="nav-item nav-link text-white" to="/Blog">Blog</router-link>
                <router-link class="nav-item nav-link text-white" to="/Links">Links</router-link>
                <router-link class="nav-item nav-link  text-white" to="/Login">Login</router-link>
            </div>
        </div>
    </nav>

    <router-view></router-view>
</template>

<script>
import axios from "axios";
export default {
    name: "App",
    mounted() {
    }
}
</script>

<style>
body {
    background-color: #0c1213;
}

h1, h2, h3, p {
    color: white;
}


nav {
    box-shadow: 0 0 1px ghostwhite;
    background-color: #0c1213;
}

</style>
