<template>
    <div class="container">
        <div>
            <h1>Hey,</h1>
            <h2>Welcome to my site...</h2>
            <p>My name Jasper Rutte and I’m a starting software developer. I’m currently primarily using VueJS and Laravel. <br>I can also work pretty well in vanilla JavaScript, vanilla php, python, html, css, bootstap and tailwind!</p>
        </div>

            <h2>Most recent Blogs.</h2>

        <div class="row" >
            <div v-for="(blog, index) in recentPosts" :key="blog" class="col-md-3 mb-2" @click="this.$router.push('/ViewBlog/' + blog.id)">
                <div class="card card-body">
                    <h2>{{blog.title}}</h2>
                    <p>{{blog.body}}</p>
                </div>
            </div>
            <router-link class="nav-item nav-link" to="/blog">See more.</router-link>
        </div>
    </div>



</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            blogPosts: []
        }
    },

    computed: {
        recentPosts() {
            return this.blogPosts.slice(-4)
        }
    },

    mounted() {
        axios.get('/api/index')
            .then(response => {
                this.blogPosts = response.data
            })
    },

}


</script>
