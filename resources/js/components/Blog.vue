<template>
    <div class="row" id="container-center">
        <h1>Blogs.</h1>
            <div v-for="blog in blogPosts" class="cards card p-3 col-md-5 col-lg-3" @click="this.$router.push('/ViewBlog/' + blog.id)">
                <div class="">
                    <h1>{{blog.title}}</h1>
                    <p>{{blog.body}}</p>
                </div>

                    </div>

            </div>
            <div v-if="user" id="blogPost" class="cards" @click="this.$router.push('/CreateBlog')">
                <div class="align-middle">
                    <h1 class="text-center">+</h1>
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
    .card {
        height: 200px;
        background-color: #F4F4F4;
        box-shadow: 0 2px 3px darkgrey;
        transition: all 0.1s ease;
        cursor: pointer;
    }

    .card:hover{

        box-shadow: 5px 6px 6px 2px #e9ecef;
        transform: scale(1.1);
    }
</style>
