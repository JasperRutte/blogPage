<template>
    <div id="container-center">
        <form>
            <h1 class="display-6">Login</h1>
            <label  for="email">email</label><br>
            <input placeholder="johndoe@example.example" v-model="loginDetails.email"><br><br>
            <label for="Password">password</label><br>
            <input type="password" v-model="loginDetails.password" placeholder="YouShallNotPass">
        </form>
        <br>
        <button class="btn btn-primary" @click="userLogin()">Login</button>


    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            loginDetails: {
                email: "",
                password: ""
            }
        }

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
                        console.log(userResponse);
                        })
                        .catch(error =>{
                            console.log(error);
                        })
                })
                .catch(error => {
                    console.log(error)
                })
        },
    }
}

</script>

<style>

</style>
