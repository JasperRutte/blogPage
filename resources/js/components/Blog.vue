<template>
    <div class="row">
        <div v-for="blog in blogPosts" id="blogPost" class="col-6" @click="showBlog(blog.id)">
            <h1>{{blog.title}}</h1>
            <p>{{blog.body}}</p>
        </div>
    </div>

    <div v-if="user" id="container-center">
        <form>
            <h1>Create a blog</h1>
            <label>Title</label><br>
            <input class="form-control" v-model="blogData.title"><br>
            <label>Contents</label><br>
            <textarea class="form-control" v-model="blogData.contents"></textarea><br>
        </form>
        <button @click="createBlog" class="btn btn-primary">Submit</button>
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

    methods: {
        createBlog () {
            axios.post('/api/create', this.blogData)
                .then(response => {
                    console.log("works")
                    console.log(response)
                })
                .catch(error => {
                    console.log("error")
                    console.log(error)
                })
        },
        showBlog(blogId){
            axios.post('/api/show', blogId)
                .then(response => {
                    console.log("works")
                    console.log(response)
                })
                .catch(error => {
                    console.log("error")
                    console.log(error)
                })
        }
    }
}

</script>
