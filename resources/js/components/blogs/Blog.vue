<template>
    <div class="container">
        <div class="row mt-5">

        </div>
        <h2 class="display-5">Blogs.</h2>
        <div class="row">
            <div v-for="blog in blogPosts" class="p-2 col-sm-5 col-xl-3 " @click="this.$router.push('/ViewBlog/' + blog.id)" >
                <div class="card card-body">
                    <h2 class="col-12 text-truncate">{{blog.title}}</h2>
                    <p class="col-12 text-truncate"> {{blog.contents}}</p>
                    <p class="small text-secondary"></p>
                </div>
            </div>

            <div class="p-2 col-sm-5 col-xl-3" @click="this.$router.push('/CreateBlog')">
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
        axios.get('/api/blogs')
            .then(response => {
                this.blogPosts = response.data
            })
    },
}

</script>

<style>
    .card {
        height: 200px;
        background-color: #313131;
        box-shadow: 0 2px 3px black;
        transition: all 0.1s ease;
        cursor: pointer;
    }

    .card:hover{
        box-shadow: 5px 6px 6px 2px black;
        transform: scale(1.1);
    }



</style>
