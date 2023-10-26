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
        <button class="btn btn-primary" @click="test()">Login</button>


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
        test() {
            axios.post('/api/login', this.loginDetails)
                .then(response => {
                    // console.log(response.data.accessToken)
                    const token = response.data.accessToken
                    axios.defaults.headers.common = {'Authorization': `Bearer ${token}`}
                    console.log(axios.defaults.headers.common)
                    console.log("test")
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}

</script>

<style>

</style>
