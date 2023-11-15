<template>
    <div id="container">
        <div v-if="user">
            <h1>{{ user.name }}</h1>
            <p>mail: {{user.email}}</p>
            <button @click="UserLogout" class="btn btn-danger">Logout</button>
        </div>

        <div v-else>
            <form>
                <h1 class="display-6">Login</h1>
                <label  for="email">email</label><br>
                <input placeholder="johndoe@example.example" v-model="loginDetails.email" class="form-control"><br><br>
                <label for="Password">password</label><br>
                <input type="password" v-model="loginDetails.password" placeholder="YouShallNotPass" class="form-control"><br>
            </form>
            <button class="btn btn-primary" @click="userLogin()">Login</button>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {

    data() {
        return {
            loggedIn: false,
            loginDetails: {
                email: "bins.chaya@example.net",
                password: "test123",
                loadPage: false,
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
                            console.log(userResponse)
                            console.log(response)
                            localStorage.setItem('userData', JSON.stringify(userResponse.data));
                            location.reload()
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
                    location.reload()
                })
                .catch(error => {
                    console.log(error);
                })
        },
    }
}

</script>
