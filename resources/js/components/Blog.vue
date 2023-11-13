<template>
    <div class="row" id="container-center">
        <h1>Blogs.</h1>
            <div v-for="blog in blogPosts" id="blogPost" @click="this.$router.push('/ViewBlog/' + blog.id)">
                <h1>{{blog.title}}</h1>
                <p>{{blog.body}}</p>
            </div>
            <div v-if="user" id="blogPost" @click="this.$router.push('/CreateBlog')">
                <div class="align-middle">
                    <h1 class="text-center">+</h1>
                </div>
            </div>
        </div>

</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            blogData: {
                title: "",
                contents: ""
            },
            blogPosts: []
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

<style>
    #blogPost {
        margin: 20px 20px;
        width: 300px;
        height: 330px;
        background-color: #F4F4F4;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 2px 3px darkgrey;
    }
</style>
