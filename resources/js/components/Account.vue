<template>
    <div id="container-center">
        <div v-if="!loggedIn">
            <form>
                <h1 class="display-6">Login</h1>
                <label  for="email">email</label><br>
                <input placeholder="johndoe@example.example" v-model="loginDetails.email"><br><br>
                <label for="Password">password</label><br>
                <input type="password" v-model="loginDetails.password" placeholder="YouShallNotPass"><br>
            </form>
            <button class="btn btn-primary" @click="userLogin()">Login</button>
        </div>
        <div v-else-if="loggedIn">
            <h1>{{userDetails.name}}</h1>
            <p>mail: {{userDetails.email}}</p>
            <button @click="UserLogout" class="btn btn-danger">Logout</button>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            loggedIn: localStorage.getItem('token'),
            userDetails: {
                name: localStorage.getItem('name'),
                email: localStorage.getItem('email')
            },
            loginDetails: {
                email: "",
                password: ""
            },
        }

    },
    mounted(){

    },
    methods: {
        userLogin() {
            axios.post('/api/login', this.loginDetails)
                .then(response => {
                    const token = response.data.accessToken;
                    axios.defaults.headers.common = {'Authorization': `Bearer ${token}`}
                    localStorage.setItem('token', token);
                    axios.get('/api/user')
                        .then(userResponse => {
                            localStorage.setItem('name', userResponse.data.name)
                            localStorage.setItem('email', userResponse.data.email)
                            this.$router.go()
                        })
                        .catch(error =>{
                            console.log(error);
                        })
                })
                .catch(error => {
                    console.log(error)
                })
        },
        UserLogout() {
            axios.post('api/logout')
                .then(response => {
                    axios.defaults.headers.common = null
                    localStorage.removeItem('token');
                    localStorage.removeItem('userData');
                    this.$router.go()
                })
                .catch(error => {
                    console.log(error);
                })
        },
    }
}

</script>

<style>

</style>
