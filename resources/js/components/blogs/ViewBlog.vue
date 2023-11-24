<template>
    <div class="container">
        <div class="bigCard mt-5 p-3">
            <h1>{{blogPost.title}}</h1><br>
            <p>{{blogPost.body}}</p><br>
            <div class="row">
                <p class="text-danger col-1" @click="removeBlog" v-if="user" style="cursor: pointer">Delete</p>
                <p class="text-warning col" @click="this.$router.push('/EditBlog/' + blogPost.id)" v-if="user" style="cursor: pointer">Edit</p>
            </div>

<!--            <button class="btn btn-danger" @click="removeBlog" v-if="user">Delete</button>-->
<!--            <button class="btn btn-secondary" @click="this.$router.push('/EditBlog/' + blogPost.id)" v-if="user">edit</button>-->
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
       axios.get(`/api/show/`+this.$route.params.id+`/blog`)
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
                axios.delete(`/api/delete/${this.$route.params.id}/blog`)
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

