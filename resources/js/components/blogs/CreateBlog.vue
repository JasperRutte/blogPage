<template>
    <div class="container mt-5">
        <h1>Create blog</h1>
        <form>
            <label>Title</label><br>
            <input v-model="blogData.title" class="form-control"><br>
            <label>Contents</label><br>
            <textarea v-model="blogData.contents" class="form-control"></textarea>
        </form>
        <button @click="createBlog" class="btn btn-primary mt-3">submit</button>
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

    methods: {
        createBlog() {
            axios.post('/api/create/blog', this.blogData)
                .then(response => {
                    console.log("works")
                    console.log(response)
                    this.$router.push("/Blog");
                })
                .catch(error => {
                    console.log("error")
                    console.log(error)
                })
        }
    }
}


</script>
