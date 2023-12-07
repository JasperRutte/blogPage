<template>
    <div class="container">
        <div class="bigCard mt-5 p-3">
            <div v-if="user">
                <h1>{{ user.name }}</h1>
                <p>mail: {{user.email}}</p>
                <p @click="UserLogout" class="text-danger" style="cursor: pointer">Logout</p>
            </div>

            <div v-else>
                <form>
                    <h1 class="display-6">Login</h1>
                    <label  for="email">email</label><br>
                    <input placeholder="johndoe@example.example" v-model="loginDetails.email" class="form-control"><br><br>
                    <label for="Password">password</label><br>
                    <input type="password" v-model="loginDetails.password" placeholder="YouShallNotPass" class="form-control"><br>
                </form>
                <p class="text-success" @click="userLogin()" style="cursor: pointer">Login</p>
            </div>
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
                email: "tara.volkman@example.net",
                password: "test",
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
                            console.log("dlkawjdlkawjdaw", userResponse.data)
                            console.log(JSON.stringify(userResponse.data))
                            localStorage.setItem('userData', JSON.stringify(userResponse.data));
                            location.reload();
                        })
                        .catch(error =>{
                            console.log(error);
                        })
                })
                .catch(error => {
                    console.log(error);
                })
        },

        UserLogout() {
            axios.post('api/logout')
                .then(response => {
                    axios.defaults.headers.common = null;
                    localStorage.removeItem('token');
                    localStorage.removeItem('userData');
                    location.reload();
                })
                .catch(error => {
                    console.log(error);
                })
        },
    }
}

</script>
