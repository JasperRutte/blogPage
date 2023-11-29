<template>
    <div class="container">
        <div class="bigCard mt-5 p-3" style=" word-wrap: break-word;">
            <h1>{{blogPost.title}}</h1><br>
            <p>{{blogPost.contents}}</p><br>
            <div class="row">
                <p class="text-danger col-1" @click="removeBlog" v-if="user" style="cursor: pointer">Delete</p>
                <p class="text-warning col" @click="this.$router.push('/EditBlog/' + blogPost.id)" v-if="user" style="cursor: pointer">Edit</p>
            </div>
        </div>
    </div>

</template>

<script>

import blog from "./Blog.vue";

export default {
    data(){
        return {
            blogPost: [],
            hasLoaded: false
        }
    },
   mounted() {
       axios.get(`/api/blog/` + this.$route.params.id)
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
        removeBlog() {
            if (confirm("Are you sure?")){
                axios.delete(`/api/blog/${this.$route.params.id}/delete`)
                    .then(response => {
                        console.log("success");
                        this.$router.push("/Blog");
                    })
                    .catch(error => {
                        console.log("failed");
                        console.error(error);
                    });
            } else {
                console.log("Test")
            }
    }

} }

</script>

