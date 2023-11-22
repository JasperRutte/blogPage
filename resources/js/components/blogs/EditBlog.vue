<template>
    <form>
        <input v-model="blogPost.title" class="form-control"><br>
        <textarea v-model="blogPost.body" class="form-control"></textarea>


    </form>
    <button @click="updateBlog" class="btn btn-primary">Update</button>
</template>
<script>
import axios from "axios";

export default {
    data(){
        return {
            blogPost: [],
            hasLoaded: false
        }
    },

    mounted() {
        axios.get(`/api/show/`+this.$route.params.id, this.blogPost)
            .then(response => {
                this.blogPost = response.data.blog;
                this.hasLoaded = true
                console.log(this.blogPost)
            })
            .catch(error => {
                console.error(error);
            });
    },

    methods: {
        updateBlog(){
            axios.put(`/api/update/blog/${this.$route.params.id}`, this.blogPost)
                .then(response => {
                    console.log("success", response)
                })
                .catch(error => {
                    console.log("failed", error)
                })
        },
        test(){
            console.log(this.blogPost)
        }
    }
}

</script>
