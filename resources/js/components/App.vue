<template>
<div class="container">
    <nav class="navbar navbar-expand-lg justify-content-between px-3 shadow-lg rounded sticky-top mt-3">
        <router-link to="/JasperRutte" class="nav-link"><h2>Jasper Rutte</h2> </router-link>
        <div class="navbar-nav" >
            <router-link class="nav-item nav-link text-white" to="/blog">Blog</router-link>
            <router-link class="nav-item nav-link text-white" to="/links">Links</router-link>
            <router-link class="nav-item nav-link text-white" to="/account">Account</router-link>
        </div>
    </nav>
</div>




    <router-view></router-view>
</template>

<script>
export default {

    name: "App",
    data(){
        return {
        }

    },

}
</script>

<style>
body {
    color: #F4F4F4;
    background-color: #161C1C;
    font-family: Roboto,serif;
}

p {
    font-size: larger;
}

nav {
    background-color: #313131;
    box-shadow: 0 2px 3px black;
}

.bigCard {
    background-color: #313131;
    border: #313131;
    border-radius: 10px;
    box-shadow: 0 2px 3px black;

}

</style>
