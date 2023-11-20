<template>
    <div class="container">
        <div class="row">

        </div>
        <h1>Blogs.</h1>
        <div class="row">
            <div v-for="blog in blogPosts" class="p-2 col-sm-5 col-xl-3 " @click="this.$router.push('/ViewBlog/' + blog.id)">
                <div class="card card-body text-truncate">
                    <h2>{{blog.title}}</h2>
                    <p>{{blog.body}}</p>
                </div>
            </div>

            <div class="p-2 col-sm-5 col-xl-3" v-if="user" @click="this.$router.push('/CreateBlog')">
                <div class="card card-body">
                    <h2 class="text-center">+</h2>

                </div>
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
    .card {
        height: 200px;
        background-color: #F4F4F4;
        box-shadow: 0 2px 3px darkgrey;
        transition: all 0.1s ease;
        cursor: pointer;
        word-break: break-all;
    }

    .card:hover{
        box-shadow: 5px 6px 6px 2px #e9ecef;
        transform: scale(1.1);
    }

    .card-body:hover {

    }
</style>
