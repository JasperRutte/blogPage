<template>
    <div class="row" id="container-center">
        <h1>Blogs.</h1>
            <div v-for="blog in blogPosts" id="blogPost" class="cards" @click="this.$router.push('/ViewBlog/' + blog.id)">
                    <h1>{{blog.title}}</h1>
                    <p>{{blog.body}}</p>
            </div>
            <div v-if="user" id="blogPost" class="cards" @click="this.$router.push('/CreateBlog')">
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
        word-wrap: break-word;
    }

    .cards{

        transition: all 0.2s ease;
        cursor: pointer;


    }

    .cards:hover{

        box-shadow: 5px 6px 6px 2px #e9ecef;
        transform: scale(1.1);
    }
</style>
