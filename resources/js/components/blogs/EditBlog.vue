<template>
    <div class="container mt-5">
        <h2>Edit blog.</h2>
        <div class="bigCard rounded p-3">
            <form>
                <label>Title</label>
                <input v-model="blogPost.title" class="form-control"><br>
                <label>contents</label>
                <textarea v-model="blogPost.contents" class="form-control"></textarea>
            </form>

            <p @click="updateBlog" class="text-primary mt-4" style="cursor: pointer">Update</p>
        </div>
        <div class="alert alert-danger" role="alert" v-if="error">
            <p>Please fill in the form correctly.</p>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data(){
        return {
            blogPost: [],
            error: false,
        }
    },

    mounted() {
        axios.get(`/api/blog/`+this.$route.params.id)
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
                axios.put(`/api/blog/${this.$route.params.id}/update`, this.blogPost)
                    .then(response => {
                        console.log("success", response)
                        this.$router.push("/blog");
                    })
                    .catch(error => {
                        this.error = true
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
