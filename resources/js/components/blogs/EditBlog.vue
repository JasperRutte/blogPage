<template>
    <div class="container mt-5">
        <h2>Edit blog</h2>
        <form>
            <input v-model="blogPost.title" class="form-control"><br>
            <textarea v-model="blogPost.body" class="form-control"></textarea>


        </form>
        <button @click="updateBlog" class="btn btn-primary">Update</button>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data(){
        return {
            blogPost: [],
        }
    },

    mounted() {
        axios.get(`/api/show/`+this.$route.params.id+`/blog`)
            .then(response => {
                this.blogPost = response.data.blog;
                console.log(this.blogPost)
            })
            .catch(error => {
                console.error(error);
            });
    },

    methods: {
        updateBlog(){
            if (confirm("Are you sure?")) {
                axios.put(`/api/update/blog/${this.$route.params.id}`, this.blogPost)
                    .then(response => {
                        console.log("success", response)
                        this.$router.push("/blog");
                    })
                    .catch(error => {
                        console.log("failed", error)
                    })
            } else {
                console.log("failed")
            }
        },
        test(){
            console.log(this.blogPost)
        }
    }
}

</script>
