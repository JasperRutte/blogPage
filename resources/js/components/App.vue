<template>

    <nav class="navbar navbar-expand-lg justify-content-between px-5 shadow-lg p-2 rounded sticky-top">
        <router-link to="/JasperRutte" class="nav-link"><h2>Jasper Rutte</h2> </router-link>
        <div class="navbar-nav" >
<!--            <router-link class="nav-item nav-link " to="/">About</router-link>-->
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
                console.log(response);
            })
            .catch(error => {
                console.log(error);
                if (localStorage.getItem("token")) {
                    axios.defaults.headers.common = null
                    localStorage.removeItem('token');
                    localStorage.removeItem('userData');
                }
            })
    //
    //     axios.post('/api/authCheck')
    //         .then(response => {
    //             console.log(response)
    //         })
    //         .catch(error => {
    //             console.log(error)
    //             this.$router.push("/Account")
    //         })
    },
}
</script>

<style>

body {
    background-color: #FFFFFF;
}

</style>
